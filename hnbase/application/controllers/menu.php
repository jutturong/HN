<?php    ob_start();    ?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Menu extends CI_Controller {
	var  $title="กลุ่มงานสร้างเสริมสุขภาพ โรงงพยาบาลขอนแก่น";
	var  $title_admin="ระบบ backoffice  กลุ่มงานสร้างเสริมสุขภาพ โรงงพยาบาลขอนแก่น";
	var   $check_login='';
    var   $limit_list=8; //จำนวน limit  รายการต่อหน้าที่แสดงใน HOME

	function __construct()
	{
		      parent::__construct();
               // $this->load->helper('url'); set เป็น auto แล้ว
			   //$this->load->helper('html');
			   $this->load->model('menusystem');
			   $this->load->helper('ckeditor');
			   $this->load->library('upload');
			   $this->load->helper('date');
			   $this->load->model('querymodels');
			  // $this->load->model('import_');
			  $this->load->model('uploadmodels');
			  
			   $CI =& get_instance();  //การใช้ CI
			   $CI->load->helper('gen_string');
			   //$CI->load->helper('my_upload'); //ใช้สำหรับ upload รูปภาพ
	}
	
	function  ck_login()  //ใช้ check การ login ของระบบ
	{
	          //return    $this->check_login= "t";
		      return     $this->check_login=$this->menusystem->session_login();
	}
	
     function  crt_id_user()  //ใช้ check การ login ของระบบ
	{
	          //return    $this->check_login= "t";
		      return     $this->check_login=$this->menusystem->session_id_user();
	}


   function  load_menu_uri() //แก้ปัญหาโหลดหน้า ส่งค่าแบบ  URI
   {
	     	if(  $this->ck_login()  ==   1    )  // echo    $this->ck_login();
			{	 //if    ck
                            // $choice=$this->input->get_post('choice'); //ตัวเลือกในการ load
		  					//echo  "testing load menu";
							//http://localhost/hostKKHP/index.php/backoffice/admin_menu/3/3
					 		$choice=$this->uri->segment(3);
		                     switch($choice)
							 {
							          case 1:  //โหลดหน้าเพื่อ insert ข้อมูลในหัวรายการหลัก
									  {
									        $this->load->view('admin/leftmenu/insert_headmainmenu');
									       break;
									  } 
									  case 2:  //โหลดหน้ารวมของ headmenu   => left_menu_allcontent.php
									  {
									        $data['query_leftmenu']=$this->querymodels->query_leftmenu('');  //model ดึงเพื่อแสดงเนื้อหาของ left menu ทั้งหมด
											$this->load->view('admin/leftmenu/left_menu_allcontent',$data);
									         break;
									  }
									  case 3:  //โหลดหน้า  form update  menu
									  {
										               $tb="tb_head_leftmenu";
													   $id_name="id_head_leftmenu";
										               $id=$this->input->get_post('id');
										               if( $id > 0  ||  $id  != ''  )
													   {
													          $query  =  $this->db->get_where($tb,array($id_name=>$id));
															   //$query  =  $this->db->get($tb);
															  $check  = $query->num_rows();
															  if( $check > 0 )
															  {
															         $row=$query->row();
																	  $data['headmenu']=$row->headmenu;
																	  $data['id']=$id;
																	  $data['menu_enable']=$row->menu_enable;
																	  $this->load->view('admin/leftmenu/update_headmainmenu',$data);
															  }
													   }
									        break;
									  }
									  case 4: //โหลดหน้า  insert  MAIN MENU
									  {
									         $this->load->view('admin/leftmenu/insert_mainmenu.php');
									         break;
									  }
									   case 5: //โหลดหน้า  รวม  MAIN MENU
									  {
									        $data['query_mainmenu']=$this->querymodels->query_mainmenu();  //model ดึงเพื่อแสดงเนื้อหาของ left menu ทั้งหมด
											$this->load->view('admin/leftmenu/left_menu_allcontent_tab2',$data);
									        break;
									  }
									  case  6:  //โหลดหน้า  form   main menu  เพื่อทำการแก้ไข  update
									  {
									  		   $id=$this->input->get_post('id');
											           //##==== ตัวแปร
													              $tb="tb_mainmenu";
																  $id_field="id_mainmenu";
											                     // $field_name="titlemenu";
										       $data['titlemenu']=$this->querymodels->query_table($tb,$id,$id_field,"titlemenu");//ดึงข้อมูลแสดงเพื่อ update ข้อมูล
											   $data['linkmenu']=$this->querymodels->query_table($tb,$id,$id_field,"linkmenu");//ดึงข้อมูลแสดงเพื่อ update ข้อมูล
											   $data['mainmenu_enable']=$this->querymodels->query_table($tb,$id,$id_field,"mainmenu_enable");//ดึงข้อมูลแสดงเพื่อ update ข้อมูล
											   $this->load->view('admin/leftmenu/update_mainmenu',$data);
									           break;
									  }

									  
							 }
							 
		  	}	//if   ck			
			else
			{
				   redirect('home/page_login');
			}
   }
	
	function  load_menu()// ใช้load menu
	{
	     	if(  $this->ck_login()  ==   1    )  // echo    $this->ck_login();
			{	 //if    ck
                             $choice=$this->input->get_post('choice'); //ตัวเลือกในการ load
		  					//echo  "testing load menu";
							//http://localhost/hostKKHP/index.php/backoffice/admin_menu/3/3
		                     switch($choice)
							 {
							          case 1:  //โหลดหน้าเพื่อ insert ข้อมูลในหัวรายการหลัก
									  {
									        $this->load->view('admin/leftmenu/insert_headmainmenu');
									       break;
									  } 
									  case 2:  //โหลดหน้ารวมของ headmenu   => left_menu_allcontent.php
									  {
									        $data['query_leftmenu']=$this->querymodels->query_leftmenu('');  //model ดึงเพื่อแสดงเนื้อหาของ left menu ทั้งหมด
											$this->load->view('admin/leftmenu/left_menu_allcontent',$data);
									         break;
									  }
									  case 3:  //โหลดหน้า  form update  menu
									  {
										               $tb="tb_head_leftmenu";
													   $id_name="id_head_leftmenu";
										               $id=$this->input->get_post('id');
										               if( $id > 0  ||  $id  != ''  )
													   {
													          $query  =  $this->db->get_where($tb,array($id_name=>$id));
															   //$query  =  $this->db->get($tb);
															  $check  = $query->num_rows();
															  if( $check > 0 )
															  {
															         $row=$query->row();
																	  $data['headmenu']=$row->headmenu;
																	  $data['id']=$id;
																     //  $data['id_mainmenu']=$id;
																	  $data['menu_enable']=$row->menu_enable;
																	  $this->load->view('admin/leftmenu/update_headmainmenu',$data);
															  }
													   }
									        break;
									  }
									  case 4: //โหลดหน้า  insert  MAIN MENU
									  {
									         $this->load->view('admin/leftmenu/insert_mainmenu');
									         break;
									  }
									   case 5: //โหลดหน้า  รวม  MAIN MENU
									  {
									        $data['query_mainmenu']=$this->querymodels->query_mainmenu();  //model ดึงเพื่อแสดงเนื้อหาของ left menu ทั้งหมด
											$this->load->view('admin/leftmenu/left_menu_allcontent_tab2',$data);
									        break;
									  }
									  case  6:  //โหลดหน้า  form   main menu  เพื่อทำการแก้ไข  update
									  {
									  		                 // echo    $id=$this->input->get_post('id_mainmenu');
															$id_mainmenu= $this->input->get_post('id_mainmenu');
															$id=$id_mainmenu;
											           //##==== ตัวแปร
													              $tb="tb_mainmenu";
																  $id_field="id_mainmenu";
											                     // $field_name="titlemenu";
														    	$data['id_mainmenu']=$id_mainmenu;
																$data['id_head_leftmenu']=$this->querymodels->query_table($tb,$id,$id_field,"id_head_leftmenu");//ดึงข้อมูลแสดงเพื่อ update ข้อมูล				 
															   $data['titlemenu']=$this->querymodels->query_table($tb,$id,$id_field,"titlemenu");//ดึงข้อมูลแสดงเพื่อ update ข้อมูล
															   $data['linkmenu']=$this->querymodels->query_table($tb,$id,$id_field,"linkmenu");//ดึงข้อมูลแสดงเพื่อ update ข้อมูล
															   $data['mainmenu_enable']=$this->querymodels->query_table($tb,$id,$id_field,"mainmenu_enable");//ดึงข้อมูลแสดงเพื่อ update ข้อมูล
															   $this->load->view('admin/leftmenu/update_mainmenu',$data);
									           break;
									  }
									 case  7:  //ค้นหาตามรายการหัวข้อหลัก
									 {
									 		 //$data['query_mainmenu']=$this->querymodels->query_mainmenu();  //model ดึงเพื่อแสดงเนื้อหาของ left menu ทั้งหมด
										   $id_head_leftmenu=$this->input->get_post('id_head_leftmenu');
											 $data['query_mainmenu']=$this->querymodels->search_query_mainmenu($id_head_leftmenu);
											 $this->load->view('admin/leftmenu/left_menu_allcontent_tab2',$data);
											 //http://localhost/hostKKHP/index.php/backoffice/admin_menu/3/3/3
									        break;
									 }
							 }
							 
		  	}	//if   ck			
			else
			{
				   redirect('home/page_login');
			}
	}
	function  insert_head_leftmenu() //insert  main menu
	{
		     	if(  $this->ck_login()  ==   1    )  // echo    $this->ck_login();
			    {	 //if    ck
                                 $headmenu=trim($this->input->get_post('headmenu'));
                                  //  $this->crt_id_user();
								  
								 //   $datestring = "%Y-%m-%d %d:%h:%i";
								//	 $time = time();
	   							 //   $DMY=mdate($datestring,$time);
		                          // $this->querymodels->DATE_TIME();
								  $tb="tb_head_leftmenu";
								  $id_field="headmenu";
								  
								  $query=$this->db->get_where($tb,array('headmenu'=>$id_field));
								  $check=$query->num_rows();
								 if( strlen( $headmenu ) > 0  &&  $check == 0   )
								 {
											$data_insert=array (
																		'id_head_leftmenu'=>NULL,
																		'headmenu'=>$headmenu,
																		'DMY'=>$this->querymodels->DATE_TIME(),
																		 'id_user'=>$this->crt_id_user(),
																		 'menu_enable'=>1,
																		 'delete_status'=>1
																			   );
												//echo "T";							   
								         	$record_tb_new=$this->db->insert($tb,$data_insert);  // insert   tb_new
										  if(  $record_tb_new == true  )
										  {
										  		//echo "T";	
												//http://localhost/hostKKHP/index.php/backoffice/admin_menu/3/3/2
												redirect('backoffice/admin_menu/3/3/3');
										  }	
										  else
										  {
										       //echo "F";	
											   // redirect('backoffice/admin_menu/3/3');
											    redirect('backoffice/admin_menu/3/3/3');
										  }
								 }
			  	}	//if   ck			
			else
			{
				   redirect('home/page_login');
			}
	}

     function  update_headmenu()//ส่ง form update menu
	 {
	 		    if(  $this->ck_login()  ==   1    )  // echo    $this->ck_login();
			    {	 //if    ck
						     $id=$this->input->get_post('id');
						     $headmenu=trim($this->input->get_post('headmenu'));
							 $menu_enable=$this->input->get_post('menu_enable');
							  $data_update=array (
																		'headmenu'=>$headmenu,
																		 'id_user'=>$this->crt_id_user(),
																		 'menu_enable'=>$menu_enable
																   );
																   
												 $tb="tb_head_leftmenu";
								                 $id_field="id_head_leftmenu";
												 
										 $this->db->where($id_field,$id);
								         $check_update=$this->db->update($tb,$data_update); 
										// redirect('backoffice/admin_menu/3/3/2');
										 redirect('backoffice/admin_menu/3/3/2');
										 //menu/load_menu',{  'choice':2 }); 
										// redirect('');
	 			}	//if   ck			
			else
			{
				   redirect('home/page_login');
			}
	 }
	 function  delete_headmenu()// delete  tb_head_leftmenu
	 {
	 	   if(  $this->ck_login()  ==   1    )  // echo    $this->ck_login();
			{	 //if    ck
                              // $id= $this->input->get_post('id');
							  $id=$this->uri->segment(3);
							  if( $id > 0 )
							  {
							      //echo  $id;
								  //echo br();  
								  
								   $tb="tb_head_leftmenu"; 
								   $id_name="id_head_leftmenu";
								  									
															//##====== delete=====
																//	$this->db->where($id_name,$id);
																//	$this->db->delete($tb);
															//##===  แก้ไขโดยการเพิ่ม field  delete_status  ,1=show,0=delete	
																
														   $data_delete=array(  'delete_status'=>0 );	
														   $id_field="id_head_leftmenu";
														   
														    $this->db->where($id_field,$id);
														    $check_update=$this->db->update($tb, $data_delete); 	
																	//http://localhost/hostKKHP/index.php/backoffice/admin_menu/3/3/2
															if(  $check_update  )
															{		
										                         //  echo "T";
																   redirect('backoffice/admin_menu/3/3/2');
															}	
															else
															{
															       //  echo "F";
																	  redirect('backoffice/admin_menu/3/3/2');
															}   
							  }
	 	 	}	//if   ck			
			else
			{
				   redirect('home/page_login');
			}
	 }
	 function   del_multi_processer() //ลบทัั้งหมดพร้อมกัน
	 {
	 	 	   if(  $this->ck_login()  ==   1    )  // echo    $this->ck_login();
			   {	 //if    ck
                              $tb="tb_head_leftmenu"; 
							  $id_name="id_head_leftmenu";
						     
							 //##==================  DELETE
							  $id = $this->input->get_post('array_delete');
							  $check_size=sizeof($id);
							  if( $check_size >= 1 )
							  { 
									    foreach($id as $value)
										{
				                                     if(  $value >= 1  )
													 {
																// echo  $value;
																// echo br();
																				//	$this->db->where($id_name,$value);
																				//	$this->db->delete($tb);
																			$data_delete=array(  'delete_status'=>0 );	
																			$this->db->where($id_name,$value);
																		    $check_update=$this->db->update($tb, $data_delete); 	
																			if(  $check_update  )
																			{		
																				  //echo "TRUE";
																				    redirect('backoffice/admin_menu/3/3/2');
																			}	
																			else
																			{
																					//echo "FALSE";
																					  redirect('backoffice/admin_menu/3/3/2');
																			}  
													 }	//end if	
										 }
							  }//end if
							  
							  ##==================== ON/OFF
							  $id_on_off=$this->input->get_post('array_on_off');
							   $check_size_on_off=sizeof( $id_on_off);
							   if( $check_size_on_off > 1 )
							  { 
									    foreach( $id_on_off as $value)
										{
										        if(   $value >= 1 )
												{
																		// echo  $value;
																		// echo br();
																						//	$this->db->where($id_name,$value);
																						//	$this->db->delete($tb);
																					$data_delete=array(  'menu_enable'=>1 );	
																					$this->db->where($id_name,$value);
																					$check_update=$this->db->update($tb, $data_delete); 	
																					if(  $check_update  )
																					{		
																						   // redirect('backoffice/admin_menu/3/3/2');
																					}	
																					else
																					{
																							echo "FALSE";
																							  //redirect('backoffice/admin_menu/3/3/2');
																					}   
												 }//end if									
										 }
							  }//end if

							  
	 	 	 	}	//if   ck			
			else
			{
				   redirect('home/page_login');
			}
	 }//end function
##================= MAIN MENU=================

	     function  update_mainmenu()//ส่ง form update menu
	 {
	 		    if(  $this->ck_login()  ==   1    )  // echo    $this->ck_login();
			    {	 //if    ck
						   $id=$this->input->get_post('id_mainmenu');
						 	$id_head_leftmenu=$this->input->get_post('id_head_leftmenu');
							 $titlemenu=trim($this->input->get_post('titlemenu'));
							   $mainmenu_enable=$this->input->get_post('mainmenu_enable');
						 $linkmenu=$this->input->get_post('linkmenu');
							 					 $tb="tb_mainmenu";
								                 $id_field="id_mainmenu";
							  $data_update=array (
																		'id_head_leftmenu'=>$id_head_leftmenu,
																		'titlemenu'=>$titlemenu,
																		 'id_user'=>$this->crt_id_user(),
																		 'mainmenu_enable'=>$mainmenu_enable,
																		 'linkmenu'=>$linkmenu
																   );
										 $this->db->where($id_field,$id);
								         $check_update=$this->db->update($tb,$data_update); 
										 if(    $check_update == true  )
										 {
											    redirect('backoffice/admin_menu/3/3/3');
										 }
										 else
										 {
											     redirect('backoffice/admin_menu/3/3/3');
										 }
	 			}	//if   ck			
			else
			{
				   redirect('home/page_login');
			}
	 }
	 function  delete_mainmenu()// delete  tb_head_leftmenu
	 {
	 	   if(  $this->ck_login()  ==   1    )  // echo    $this->ck_login();
			{	 //if    ck
                           $id= $this->input->get_post('id');
						 // $id=$this->uri->segment(3);
							  if( $id > 0 )
							  {
							      //echo  $id;
								  //echo br();  
								   $tb="tb_mainmenu"; 
								   $id_name="id_mainmenu";
								  									
															//##====== delete=====
																	$this->db->where($id_name,$id);
																   $check_delete=$this->db->delete($tb);
																//$check_delete=true;
															if(  $check_delete  )
															{		
										                           //echo "T";
																 //  redirect('backoffice/admin_menu/3/3/2');
																 /*$('#span_load_tab2').load('<?=base_url()?>index.php/menu/load_menu',{  'choice':5 });  */
																   redirect('menu/load_menu_uri/5');
															}	
															else
															{
															        // echo "F";
																	//  redirect('backoffice/admin_menu/3/3/2');
																	   redirect('menu/load_menu_uri/5');
															}   
							  }
	 	 	}	//if   ck			
			else
			{
				   redirect('home/page_login');
			}
	 }
function   mainmenu_multiprocess() //ใช้รับค่ามาจาก models->query_mainmenu()
{
			 if(  $this->ck_login()  ==   1    )  // echo    $this->ck_login();
				   {	 //if    ck
							$tb="tb_mainmenu";
							//##=== process  delete=====
							  $id=$this->input->get_post('array_delete');	
							  $check_size=sizeof($id);
							  if( $check_size > 1 )
							  { 
									    foreach($id as $value)
										{
				                                     if(  $value >= 1  )
													 {
															$this->db->where('id_mainmenu',  $value);
														   // $check_delete  =	$this->db->delete($tb); 
															$this->db->delete($tb); 
													 }	//end if	
										 }//end foreach
									 redirect('backoffice/admin_menu/3/3/3');	 
							  }//end if
							  
							 //##======= process  enable =======
							  $array_onoff=$this->input->get_post('array_on_off'); 
						     $check_size_array_onoff=sizeof($array_onoff);
							  if( $check_size_array_onoff > 1 )
							  { 
									    foreach($array_onoff  as $value)
										{
				                                     if(  $value >= 1  )
													 {
																$data = array(
																								   'mainmenu_enable' =>1,
																						);
																$this->db->where('id_mainmenu',  $value);
																$this->db->update($tb,$data); 
													 }	//end if	
										 }//end foreach
									  redirect('backoffice/admin_menu/3/3/3');	 
							  }//end if

										  
					}	//if   ck			
				else
				{
					   redirect('home/page_login');
				}
}
function load_main_menu() //รายการโหลด MAIN MENU
{
	 	  if(  $this->ck_login()  ==   1    )  // echo    $this->ck_login();
			   {	 //if    ck

	 	 	 	}	//if   ck			
			else
			{
				   redirect('home/page_login');
			}
}	
	function  insert_mainmenu() //insert  main menu
	{
		     	if(  $this->ck_login()  ==   1    )  // echo    $this->ck_login();
			    {	 //if    ck
								 //id_head_leftmenu
								 $id_head_leftmenu=trim($this->input->get_post('id_head_leftmenu'));
								 $titlemenu=trim($this->input->get_post('titlemenu'));
								 $linkmenu=trim($this->input->get_post('linkmenu'));
                                  //  $this->crt_id_user();
								 //   $datestring = "%Y-%m-%d %d:%h:%i";
								//	 $time = time();
	   							  //  $DMY=mdate($datestring,$time);
		                          // $this->querymodels->DATE_TIME();
								  $tb="tb_mainmenu";
								  $id_field="id_mainmenu";
								 if( strlen( $titlemenu ) > 0    )
								 {
											$data_insert2=array (
																		'id_mainmenu'=>NULL,
																		'id_head_leftmenu'=>$id_head_leftmenu,
																		'titlemenu'=>$titlemenu,
																		'DMY'=>$this->querymodels->DATE_TIME(),
																		 'id_user'=>$this->crt_id_user(),
																		 'mainmenu_enable'=>1,
																		 'linkmenu'=>$linkmenu
																			   );
															   
								         	 $record_tb_new=$this->db->insert($tb,$data_insert2);  // insert   tb_new
											  if(  $record_tb_new == true  )
											  {
													//echo "T";		
													redirect('backoffice/admin_menu/3/3/3');
											  }	
											  else
											  {
													//echo "F";	
													redirect('backoffice/admin_menu/3/3/3');
											  }
										  
								
								 }
			  	}	//if   ck			
			else
			{
				   redirect('home/page_login');
			}
	}
 
	 

}//end class
?>

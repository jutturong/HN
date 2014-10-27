<?php    ob_start();    ?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class PR extends CI_Controller {
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
	function  pr_menu()  //main menu สำหรับ  ประชาสัมพันธ์
	{
	 	 if( 	 $this->ck_login()  ==   1    )  // echo    $this->ck_login();
			{	 //if    ck
                        $choice=$this->uri->segment(3);
						switch( $choice)
						{
						      case  1: //โหลด left menu pr
							  {
							  		 //##============== static var
									  $data['title_admin']=$this->title_admin; //1
									  $data['headleftmenu']="-: ระบบบริหารจัดการ"; //2
								      $data['leftmenu']="admin/left_menuadmin";  //3
									  $data['left1']="+ เพิ่มข่าวประชาสัมพันธ์"; //4
									  $data['link_left1']="pr/pr_menu/2"; //5
									  $data['left2']="+ แก้ไข / ลบ (แสดงเนื้อหาทั้งหมด)";  //6
									  $data['link_left2']="pr/pr_menu/3";  //7
									  $data['right_content']='';  //8  ====>ตัวแปรที่เปลี่ยนไป************************
									    $data['ckeditor']=$this->menusystem->ckediter_style1('content');  //9
									 
									   $this->load->view('admin/home_admin2',$data);  //10
									   break;
							  }
							  case 2: //โหลดหน้าเพิ่มข่าวประชาสัมพันธ์
							  {
									   //##============== static var
									  $data['title_admin']=$this->title_admin; //1
									  $data['headleftmenu']="-: ระบบบริหารจัดการ"; //2
								      $data['leftmenu']="admin/left_menuadmin";  //3
									  $data['left1']="+ เพิ่มข่าวประชาสัมพันธ์"; //4
									  $data['link_left1']="pr/pr_menu/2"; //5
									  $data['left2']="+ แก้ไข / ลบ (แสดงเนื้อหาทั้งหมด)";  //6
									  $data['link_left2']="pr/pr_menu/3";  //7
									  $data['right_content']='admin/PR/insert_PR'; //8  ====>ตัวแปรที่เปลี่ยนไป***********************
									   $data['ckeditor']=$this->menusystem->ckediter_style1('content');  //9
									   $this->load->view('admin/home_admin2',$data);  //10
							         break;
							  }//end case
							  case  3:  //หน้ารวมของข่าวประชาสัมพันธ์
							  {
											  $data['title_admin']=$this->title_admin; //1
											  $data['headleftmenu']="-: ระบบบริหารจัดการ"; //2
											  $data['leftmenu']="admin/left_menuadmin";  //3
											  $data['left1']="+ เพิ่มข่าวประชาสัมพันธ์"; //4
											  $data['link_left1']="pr/pr_menu/2"; //5
											  $data['left2']="+ แก้ไข / ลบ (แสดงเนื้อหาทั้งหมด)";  //6
											  $data['link_left2']="pr/pr_menu/3";  //7
											 $data['right_content']="admin/pr/editpr";//8  ====>ตัวแปรที่เปลี่ยนไป***********************
											 $data['link_anchor_popup']="backoffice/show_popup_picture/";
																	$data['limit']=$this->limit_list;     //จำนวนรายการทีแสดงทั้งหมดในหน้า admin
																	$data['id']="id_tb_pr";
																	$data['tb']="tb_pr";
																	$data['ofset']=0;
																	$data['page']='';
																	$data['sr']="";
										  $this->load->view('admin/home_admin2',$data);
							  }
                             case  4:  //โหลดเพื่อทำการ updte หน้า pr
                                {
															   //##============== static var
																  $data['title_admin']=$this->title_admin; //1
																  $data['headleftmenu']="-: ระบบบริหารจัดการ"; //2
																  $data['leftmenu']="admin/left_menuadmin";  //3
																  $data['left1']="+ เพิ่มข่าวประชาสัมพันธ์"; //4
																  $data['link_left1']="pr/pr_menu/2"; //5
																  $data['left2']="+ แก้ไข / ลบ (แสดงเนื้อหาทั้งหมด)";  //6
																  $data['link_left2']="pr/pr_menu/3";  //7
																  $data['right_content']='admin/PR/update_PR'; //8  ====>ตัวแปรที่เปลี่ยนไป***********************
																   $data['ckeditor']=$this->menusystem->ckediter_style1('content');  //9
																   //$this->load->view('admin/home_admin2',$data);  //10
																   $link_anchor_popup="backoffice/show_popup_picture/";
																   //##------------- query  tb_new ------------------------ 
																	$id=$this->uri->segment(4);							
																									     $tb="tb_pr";
																										 $id_f="id_tb_pr";
																										 $query=$this->db->get_where($tb,array($id_f=>$id));
																										  $num_check = $query->num_rows();
																												  if( $num_check == 1 )
																												  {
																														$row=$query->row();
																														$data['id_tb_pr']=$id;
																														$data['data_title']=$row->title;  //หัวข้อข่าวสาร
																														$data['data_pin_pr']=$row->pin_pr;  //0=ไม่ปัก  1=ปัก
																														$data['data_pr_picture']=$row->pr_picture;  //รูปภาพ
																														$data['alius_pic']=   $link_anchor_popup.''.$data['data_pr_picture'];  
																														 $data['content']=$row->content;  //ข่าวสาร
																														 $data['data_pr_enable']=$row->pr_enable;   //1=show,0=hidden 
																														 $this->load->view('admin/home_admin2',$data);
																												  } 
																					  //##------------- query  tb_new ------------------------ 	

																	break;				  			
                                 }//end case

						    }//end switch
			}	//if   ck			
			else
			{
				   redirect('home/page_login');
			}
	}

##============== insert========================
function   insert_pr()  //เพิ่มข่าวสาร
{
	if( 	 $this->ck_login()  ==   1    )
	{  //if
		  $title=trim($this->input->get_post('title'));
		  $pin_pr=$this->input->get_post('pin_pr');
		  if( $pin_pr == '' ) {  $pin_pr=0;  }   //ปักหมุด
		  
//-----------------------upload  picture function------------------------
  $tumbnail=$_FILES['pr_picture']['tmp_name'];
  $tumbnail_name=$_FILES['pr_picture']['name'];
  $tumbnail_size=$_FILES['pr_picture']['size'];
  $tumbnail_type=$_FILES['pr_picture']['type'];
						if(  $tumbnail_name != '' )
						{
							  $array_last=explode(".",$tumbnail_name);
                             $c=count($array_last) - 1;
                             $lastname=strtolower($array_last[$c]); 
                               if( $lastname == "gif"  ||  $lastname == "png"  ||  $lastname == "jpg"  ||  $lastname == "bmp" )
	                             { 
		                           
		 $images=$tumbnail;
		 $height = 100;
		 $size = getimagesize($images);
		 $width = round( $height*$size[0]/$size[1]);
		 if($size[2] == 1) 
           {
               $images_orig = imagecreatefromgif($images); //resize รูปประเภท GIF
           } 
         else if($size[2] == 2) 
          {
                 $images_orig = imagecreatefromjpeg($images); //resize รูปประเภท JPEG
          }
$photoX = imagesx($images_orig);
$photoY = imagesy($images_orig);
$images_fin = imagecreatetruecolor($width, $height);
imagecopyresampled($images_fin, $images_orig, 0, 0, 0, 0, $width+1, $height+1, $photoX, $photoY);
imagejpeg($images_fin, $images); //ชื่อไฟล์ใหม่
imagedestroy($images_orig);
imagedestroy($images_fin);
								   // copy($tumbnail,'../training/upload/'.$tumbnail_name);
									copy($tumbnail,'picture/'.$tumbnail_name);  //หมายเหตุ  folder   => picture  อยู่นอกสุด
                                 }
						}	
//----------------------------------------------------------------------------------------------------	
        $content=$this->input->get_post('content');
         $datestring = "%Y-%m-%d %d:%h:%i";
		 $time = time();
 	  // echo   $DMY=mdate($datestring,$time);
	       $DMY=DATE_TIME();
	     $this->crt_id_user();
$data = array(
   'id_tb_pr' => NULL,
   'title' =>$title ,
   'pr_picture' => $tumbnail_name,
   'content'=>$content,
   'DMY'=>$DMY,
   'pr_enable'=>1,  //1=show,0=hidden
   'id_user'=>$this->crt_id_user(),
    'pin_pr'=>$pin_pr
);
					
						$record_tb_new=$this->db->insert('tb_pr', $data);  // insert   tb_new
							// $record_tb_new=true;
							if(   $record_tb_new   )
							{
							       //echo  "T";
								     redirect('pr/pr_menu/3');
							}
							elseif(   !$record_tb_new       )
							{
							      // echo  "F";
								  //    redirect('backoffice/admin_leftmenu/1');    
								   redirect('pr/pr_menu/3');
							}



             }	//end  if
			 else
			{
				   redirect('home/page_login');
			}

	
	}// insert_news(

//##========================= change page ADMIN ===========================
function  change_page_admin() //เปลี่ยนหน้าแสดงผลจากหน้า ADMIN
{
       					if( 	 $this->ck_login()  ==   1    )
						{  //if
                                       $page= $this->input->post('page');
									   if(  $page == '' )
									   {        $page=$this->uri->segment(3);       }
								        //==== ดึงค่ามาจาก function=admin_leftmenu/2=====================
																  
/*																  $data['title_admin']=$this->title_admin;
																  $data['headleftmenu']="-: ระบบบริหารจัดการ";
																  $data['leftmenu']="admin/left_menuadmin";
																  $data['left1']="+ เพิ่มข่าวสาร";
																  $data['link_left1']="backoffice/admin_leftmenu/1";
																  $data['left2']="+ แก้ไข / ลบ (แสดงเนื้อหาทั้งหมด)";
																  $data['link_left2']= "backoffice/admin_leftmenu/2";
																  $data['link_anchor_popup']="backoffice/show_popup_picture/";
																  $data['right_content']="admin/pr/editpr";
*/																  
																  
																  $data['title_admin']=$this->title_admin; //1
																  $data['headleftmenu']="-: ระบบบริหารจัดการ"; //2
																  $data['leftmenu']="admin/left_menuadmin";  //3
																  $data['left1']="+ เพิ่มข่าวประชาสัมพันธ์"; //4
																  $data['link_left1']="pr/pr_menu/2"; //5
																  $data['left2']="+ แก้ไข / ลบ (แสดงเนื้อหาทั้งหมด)";  //6
																  $data['link_left2']="pr/pr_menu/3";  //7
																  $data['right_content']="admin/pr/editpr";//8  ====>ตัวแปรที่เปลี่ยนไป***********************
											
																 $data['link_anchor_popup']="backoffice/show_popup_picture/";
																  
																  
																  
																  //##### ------------------  query  เนื้อหาทั้งหมดใน tb_new -----------------------
																//  $query1_pin=$this->db->get_where('tb_new',array('pin_new'=>1));
																//  $query1_unpin=$this->db->get_where('tb_new',array('pin_new'=>0));
															   // $this->querymodels->query_new();
															   
															   	   //###------- ตัวแปร----//query_new($pin_status,$limit,$id,$tb,$ofset)
																	//$data['pin_status'] =1;   //1=ปักหมุด,0=ไม่ปักหมุด
																	$data['limit']=$this->limit_list;     //จำนวนรายการทีแสดงทั้งหมดในหน้า admin
																	$data['id']="id_tb_pr";
																	$data['tb']="tb_pr";
																	$data['ofset']=calc_ofset_page($page,$this->limit_list);  //  limit_list เอามาจาก  var ข้างบน
																	
																	$data['sr']="";
																	
																	$data['page']=$page;
																    $this->load->view('admin/home_admin2',$data); // helper  เขียนเอง  เรียกจาก  gen_string  ส่งค่า offset
						}
						 else
						{
							   redirect('home/page_login');
						}
}

function  search_keyword()// สำหรับการค้นหา  ADMIN
{
     	if( 	 $this->ck_login()  ==   1    )
	   {  //if
                  $sr=$this->input->get_post('search_');
                  //$this->querymodels->search_keyword($sr);  
					 //===== ใส่ตัวแปร
			         $tb="tb_pr";
					// $field="content";
					 $field="title";
					 $limit=5;
					 $id="id_tb_pr";  //ใช้สำหรั้บ order_by
					//$ofset=0;
					
				//	$url_redirect="backoffice/admin_leftmenu/2";
					$url_redirect="pr/pr_menu/3";
					
					$data['page']='';
			
			       	 $this->db->order_by($id, "desc");
				    $this->db->like($field,$sr); 
					//$this->db->limit($limit);
				    $query_search=$this->db->get($tb);
				    $ck_num=$query_search->num_rows();
					if( $ck_num > 0  ||   strlen($sr) > 0  )
					{
                                     //  $this->querymodels->admin_leftmenu_switch_2($sr,$query_search);
									  $this->querymodels->search_pr_show($sr,$query_search);
					//=================function   admin_leftmenu()  //left sub menu     97    
					}
					else
					{
					         //  redirect('backoffice/admin_leftmenu/2');
							     redirect('pr/pr_menu/3');
					
					}
					
		}	      
	  else
			{
							   redirect('home/page_login');
			}
}


function   all_update_form()  //เรียกค่า  จาก form หน้า ข่าวรวม  Admin new
{
					   if( 	 $this->ck_login()  ==   1    )
						{  //if
##-------------------------------------------- new modify  code ------------------------------------------------
		 
/*		    $arr_enable=$this->input->post('check_enable');
            echo   sizeof($arr_enable);
			//echo  nbs(8);
			//print_r($arr_enable);
			//echo  "<hr>";
			foreach($arr_enable as  $key => $val )
			{  //begin  foreach
						  $ex_enable=explode('-',$val);  //3-1,4-1,5-1
						// $ex_enable[0];  //id
						//  $ex_enable[1]; //value
						 $data_enable=array(
						                  								 $field=>$ex_enable[1]
						                                      );
						      $this->db->where($id,$ex_enable[0]);
						       $check_update= $this->db->update($tb, $data_enable); 
						if(  $check_update  )
						{
						     //echo "update success";
							 //echo  br();
							// $this->querymodels->admin_leftmenu_switch_2('','');
							 redirect('backoffice/admin_leftmenu/2');
						}
						else if( !$check_update)
						{
						    echo "update false";
						}
			} //end foreach
*/		    
 			
			         //กำหนดตัวแปร
					 $field="pr_enable";
					 $id="id_tb_pr";
					 $tb="tb_pr";

			      $send_page=$this->input->get_post('send_page_update'); //หน้าที่ส่งมาจะส่งกลับ
				 $id_val=$this->input->get_post('hid_id_tb_pr');
				 $count_id= (count($id_val));
				  $enable=$this->input->post('check_enable');
				  $count_enable=(sizeof($enable));
				  if( $count_id <= 1 ) //ใช้ในกรณีที่มีแค่ 1 รายการ
				  {
				      // echo   $enable[0];  //เป็นค่า value ของ enable
					    $data_enable=array(
																	$field=>$enable[0]
															 );
				  }
			 //echo    sizeof($id_val);
			 //echo br();
			// echo  $id_val[0];
			 //echo br();
			 //echo   sizeof( $enable );
			 if(   sizeof( $enable )  <= 1  ) //กรณี ไม่มีการ check อะไรเลยใน checkbox  enable การแสดงผล
			 {
			      if(     $enable[0] == '' )
				  {
									 $data_enable=array(
																	$field=>0
																		 );
				  }														 
			 }
//##-------------------  udpate ค่า tb_new --------------------------------------------------------------											
						}
						 else
						{
							   redirect('home/page_login');
						}
}

##---------============================= แก้ไขข้อมูล  UPDATE =================================
function    send_editform() //ส่งค่าเพื่อแก้ไข edit form
{
   				if( 	 $this->ck_login()  ==   1    )
					{  //if
                               $tb_check=trim($this->uri->segment(3));  //check  ว่า จะไป form ไหน
							   $id=trim($this->uri->segment(4));  // call   ID table
							   //1=edit_new     switch  แ้ก้ไขข่าว
							    if( strlen($tb_check) > 0 &&   $id  > 0 )
								{
								      switch( $tb_check)
									  {
												  case  1  :     //  //1=edit_new     switch  หน้า  แ้ก้ไขข่าว
																  {
																	  //  ใ้ห้ไปดู่มากจาก  =>admin_leftmenu/1
																	  // จะส่งไปหน้า  admin/new/update_new.php
																					//  $data['title_admin']=$this->title_admin;
																					//  $data['headright_content']="-: ระบบบริหารจัดการ";
																				//	  $data['right_content']="admin/pr/update_pr";
																					  $data['link_anchor_popup']="backoffice/show_popup_picture/";
																				//	  $data['headleftmenu']="-: ระบบบริหารจัดการ";
																				//	  $data['leftmenu']="admin/left_menuadmin";
																				//	  $data['left1']="+ เพิ่มข่าวสาร";
																				//	  $data['link_left1']="backoffice/admin_leftmenu/1";
																				//	  $data['left2']="+ แก้ไข / ลบ (แสดงเนื้อหาทั้งหมด)";
																				//	  $data['link_left2']="backoffice/admin_leftmenu/2";
																					  
																					 $data['title_admin']=$this->title_admin; //1
																					  $data['headleftmenu']="-: ระบบบริหารจัดการ"; //2
																					  $data['leftmenu']="admin/left_menuadmin";  //3
																					  $data['left1']="+ เพิ่มข่าวประชาสัมพันธ์"; //4
																					  $data['link_left1']="pr/pr_menu/2"; //5
																					  $data['left2']="+ แก้ไข / ลบ (แสดงเนื้อหาทั้งหมด)";  //6
																					  $data['link_left2']="pr/pr_menu/3";  //7
																					  $data['right_content']="admin/pr/editpr";//8  ====>ตัวแปรที่เปลี่ยนไป***********************
																					   $data['ckeditor']=$this->menusystem->ckediter_style1('content');
																					    $link_anchor_popup="backoffice/show_popup_picture/";
																					  //##------------- query  tb_new ------------------------ 
																					   			if( $id > 0 )
																									{
																									     $tb="tb_pr";
																										 $id_f="id_tb_pr";
																										 $query=$this->db->get_where($tb,array($id_f=>$id));
																									     $num_check = $query->num_rows();
																										  if( $num_check == 1 )
																										  {
																											//   $this->querymodels->query_pr(1,$limit,$id,$tb,$ofset,$link_anchor_popup); //1=ปักหมุด,ตัวต่อมาคือ limit ในการแสดงผล 
																													$data['limit']=$this->limit_list;     //จำนวนรายการทีแสดงทั้งหมดในหน้า admin
																													$data['id']="id_tb_pr";
																													$data['tb']="tb_pr";
																													$data['ofset']=0;
																													$data['page']='';
																													$data['sr']="";
																											
																												$row=$query->row();
																												$data['id_tb_pr']=$id;
																											    $data['data_title']=$row->title;  //หัวข้อข่าวสาร
																											    $data['data_pin_pr']=$row->pin_pr;  //0=ไม่ปัก  1=ปัก
																												$data['data_pr_picture']=$row->pr_picture;  //รูปภาพ
																												$data['alius_pic']=   $link_anchor_popup.''.$data['data_pr_picture'];  
																												 $data['content']=$row->content;  //ข่าวสาร
																												 $data['data_pr_enable']=$row->pr_enable;   //1=show,0=hidden 


                                                                                                                                                                                                                                 $this->load->view('admin/home_admin2',$data);
																										  } 
																									}
																					  //##------------- query  tb_new ------------------------ 				
																	  break;
																  }
										}						  
								}
								else
								{
								     redirect('home/page_login');
								}  
					}
				 else
				{
					   redirect('home/page_login');
				}
}	

function  query_pr_update()//--- update   tb_new
{
       				if( 	 $this->ck_login()  ==   1    )
					{  //if
                   		        $id_tb_pr=trim($this->input->get_post('id_tb_pr'));
								//echo br();
								  $title=trim($this->input->get_post('title'));
								//echo br();
				/*######### -------------- ระบบรูปภาพ และการ upload ---------------------------- */
				//new_picture
				$tumbnail=$_FILES['pr_picture']['tmp_name'];
  		     	$tumbnail_name=$_FILES['pr_picture']['name'];
			//echo br();
 			 	$tumbnail_size=$_FILES['pr_picture']['size'];
 			 	$tumbnail_type=$_FILES['pr_picture']['type'];
				 //$this->my_upload->my_upload_function($tumbnail_name,100,'picture/');
        		 //$this->my_upload->my_upload_function($name_pict,$height_value,$path_pict);
		 	      //##------------- กำหนดตัวแปร
				  //$name_pict;  //ชื่้อรูปภาพ
				  //$height_value;  //ความสูง
				  //$path_pict;   //path  picture    //$path_pict;   //path  picture  =>   //copy($tumbnail,'picture/'.$tumbnail_name);  //หมายเหตุ  folder   => picture  อยู่นอกสุด
				/*######### -------------- ระบบรูปภาพ และการ upload ---------------------------- */
		 						  $pin_pr=$this->input->get_post('update_pin_pr');
								   if( $pin_pr == '' ) {  $pin_pr=0;  }   //ปักหมุด
								 //echo  $pin_new;
								 //echo  br();
		 	
        $content=$this->input->get_post('content');
        $pr_enable=$this->input->get_post('pr_enable');
	              if(  $pr_enable == '' ) {  $pr_enable =0;  }   //ปักหมุด  //1=show,0=hidden
				   //echo   $new_enable;
         //$datestring = "%Y-%m-%d %d:%h:%i";
		 //$time = time();
	     //$DMY=mdate($datestring,$time);
	     //$this->crt_id_user();
	
if(  $tumbnail_name == '' )  //ไม่เปลี่ยนภาพ
{ 		 
				$data_update = array(
				   'title' =>$title ,   //ok
				  // 'new_picture' => $tumbnail_name,  //ok
				   'content'=>$content, //ok
				  // 'DMY'=>$DMY,
				   'pr_enable'=>$pr_enable,  //1=show,0=hidden
				   'id_user'=>$this->crt_id_user(),
					'pin_pr'=>$pin_pr
				);
}
elseif(  strlen($tumbnail_name) > 0 )  //เปลี่ยนภาพใหม่
{
			    //$this->uploadmodels->my_upload_function($tumbnail_name,100,'picture/');  //copy และ resize ภาพ
			    //my_upload_function($tumbnail_name,100,'picture/');  //copy และ resize ภาพ
//-----------------------upload  picture function------------------------------------------------------------------	
  	          //$name_pict;  //ชื่้อรูปภาพ
			  $height_value=100;  //ความสูง
			  $path_pict='picture/';   //path  picture  =>   //copy($tumbnail,'picture/'.$tumbnail_name);  //หมายเหตุ  folder   => picture  อยู่นอกสุด

									  $tumbnail=$_FILES['pr_picture']['tmp_name'];
										//$tumbnail=$_FILES[$name_pict]['tmp_name'];
									  $tumbnail_name=$_FILES['pr_picture']['name'];
									   //$tumbnail_name=$_FILES[$name_pict]['name'];
									  $tumbnail_size=$_FILES['pr_picture']['size'];
									  //$tumbnail_size=$_FILES[$name_pict]['size'];
									  $tumbnail_type=$_FILES['pr_picture']['type'];
									  //$tumbnail_type=$_FILES[$name_pict]['type'];
  
						if(  $tumbnail_name != '' )
						{
							  $array_last=explode(".",$tumbnail_name);
                             $c=count($array_last) - 1;
                             $lastname=strtolower($array_last[$c]); 
													   if( $lastname == "gif"  ||  $lastname == "png"  ||  $lastname == "jpg"  ||  $lastname == "bmp" )
														 { 
								 $images=$tumbnail;
								 //$height = 100;
								 $height = $height_value;
								 //'picture/'
								 $path_pict='picture/';
								 
								 $size = getimagesize($images);
								 $width = round( $height*$size[0]/$size[1]);
								 if($size[2] == 1) 
								   {
									   $images_orig = imagecreatefromgif($images); //resize รูปประเภท GIF
								   } 
								 else if($size[2] == 2) 
								  {
										 $images_orig = imagecreatefromjpeg($images); //resize รูปประเภท JPEG
								  }
						$photoX = imagesx($images_orig);
						$photoY = imagesy($images_orig);
						$images_fin = imagecreatetruecolor($width, $height);
						imagecopyresampled($images_fin, $images_orig, 0, 0, 0, 0, $width+1, $height+1, $photoX, $photoY);
						imagejpeg($images_fin, $images); //ชื่อไฟล์ใหม่
						imagedestroy($images_orig);
						imagedestroy($images_fin);
														   // copy($tumbnail,'../training/upload/'.$tumbnail_name);
															copy($tumbnail,'picture/'.$tumbnail_name);  //หมายเหตุ  folder   => picture  อยู่นอกสุด
															   // copy($tumbnail,$path_pict.$tumbnail_name);  //หมายเหตุ  folder   => picture  อยู่นอกสุด
														 }
						}	
//---------------- upload function ----------------------------------------------------				
				$data_update = array(
				   'title' =>$title ,   //ok
				   'pr_picture' => $tumbnail_name,  //ok
				   'content'=>$content, //ok
				  // 'DMY'=>$DMY,
				   'pr_enable'=>$pr_enable,  //1=show,0=hidden
				   'id_user'=>$this->crt_id_user(),
					'pin_pr'=>$pin_pr
				);
}				
							      //$record_tb_new=$this->db->insert('tb_new', $data);  // insert   tb_new
                                  //http://localhost/hostKKHP/index.php/http://localhost/hostKKHP/index.php/backoffice/admin_leftmenu/2
								 $this->db->where('id_tb_pr', $id_tb_pr);
								  $check_update=$this->db->update('tb_pr', $data_update); 
								 // $check_update=TRUE;
								  if(  $check_update == TRUE )
								  {
										//redirect('/backoffice/admin_leftmenu/2','refresh');
									 	redirect('pr/pr_menu/3','refresh');
								  }	 
								  else
								  {
										 	$path_change="'pr/send_editform/1/".$id_tb_pr."'";
										  // echo 	$path_change= "backoffice/send_editform";
										  redirect($path_change,'refresh');
								  }
					}
						 else
						{
							     redirect('home/page_login');
						}
}//end  function  query_new_update()
##=================== delete  TABLE============
function   delete_table() //ใช้สำหรับลบค่า field ต่างๆ ใน table   uri(4)  case 1=tb_new
{
       					if( 	 $this->ck_login()  ==   1    )
						{  //if
					                  $id= $this->uri->segment(3);
									   $tb=  $this->uri->segment(4);
									     if( $id>0   )
										 {
														$this->db->where('id_tb_pr',$id);
												    	$this->db->delete($tb);
														   redirect('/pr/pr_menu/3','refresh');
																
										}				
						}
						 else
						{
							  redirect('home/page_login');
						}
}



}//end class PR
?>

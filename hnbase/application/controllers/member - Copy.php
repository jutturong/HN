<?php    ob_start();    ?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Member extends CI_Controller {
	var  $title="กลุ่มงานสร้างเสริมสุขภาพ โรงงพยาบาลขอนแก่น";
	var  $title_admin="ระบบ backoffice  กลุ่มงานสร้างเสริมสุขภาพ โรงงพยาบาลขอนแก่น";
	var   $check_login="";
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
			   
			    $this->load->model('querymember');  //ใช้ query  หน้ารวมของการ เพิ่มสมาชิก

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

	function  member_menu()  //main menu สำหรับ  ประชาสัมพันธ์
	{
	 	 if( 	 $this->ck_login()  ==   1    )  // echo    $this->ck_login();
			{	 //if    ck
                        $choice=$this->uri->segment(3);
						switch( $choice)
						{
						      case  1: //โหลด left menu member
							  {
							  		 //##============== static var
									//echo   DATE_TIME();  ดึงมาจาก helper  
									  $data['title_admin']=$this->title_admin; //1
									  $data['headleftmenu']="-: ระบบบริหารจัดการ"; //2
								      //$data['leftmenu']="admin/left_menuadmin";  //3
									   $data['leftmenu']="admin/left_menuadmin_load";  //3
									  $data['left1']="+ เพิ่มสมาชิก"; //4
									  $data['link_left1']="pr/pr_menu/2"; //5
									  $data['left2']="+ แก้ไข / ลบ (แสดงเนื้อหาทั้งหมด)";  //6
									  $data['link_left2']="pr/pr_menu/3";  //7
									  $data['right_content']='-';  //8  ====>ตัวแปรที่เปลี่ยนไป************************
									//  $data['right_content']='admin/PR/insert_PR'; //8  ====>ตัวแปรที่เปลี่ยนไป***********************
									   $data['ckeditor']=$this->menusystem->ckediter_style1('content');  //9
									   
									   $data['ajax_link_left1']=base_url()."index.php/member/member_menu/2";
									   $data['ajax_link_left2']=base_url()."index.php/member/member_menu/3";
									 
									   $this->load->view('admin/home_admin2_load',$data);  //10
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
//									   $this->load->view('admin/home_admin2',$data);  //10
                                            $this->load->view('admin/member/insert_member',$data);  //10
                                         
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

										
										$data['ajax_link_left1']=base_url()."index.php/member/member_menu/2";
									    $data['ajax_link_left2']=base_url()."index.php/member/member_menu/3";
										  
										   //$data['query_mainmenu']=$this->querymodels->query_mainmenu();  //model ดึงเพื่อแสดงเนื้อหาของ left menu ทั้งหมด
										    $data['query_member']=$this->querymember->query_member(); 
											$this->load->view('admin/member/all_content_member',$data);

										  
							  }
                             case  4:  //โหลดเพื่อทำการ updte หน้า pr
                                {
															 //##============== static var
															//echo   DATE_TIME();  ดึงมาจาก helper  
															  $data['title_admin']=$this->title_admin; //1
															  $data['headleftmenu']="-: ระบบบริหารจัดการ"; //2
															  //$data['leftmenu']="admin/left_menuadmin";  //3
															   $data['leftmenu']="admin/left_menuadmin_load";  //3
															  $data['left1']="+ เพิ่มสมาชิก"; //4
															  $data['link_left1']="pr/pr_menu/2"; //5
															  $data['left2']="+ แก้ไข / ลบ (แสดงเนื้อหาทั้งหมด)";  //6
															  $data['link_left2']="pr/pr_menu/3";  //7
															 // $data['right_content']='-';  //8  ====>ตัวแปรที่เปลี่ยนไป************************
															   $data['right_content']='admin/member/update_member'; //8  ====>ตัวแปรที่เปลี่ยนไป***********************
															   $data['ckeditor']=$this->menusystem->ckediter_style1('content');  //9
															   
															   $data['ajax_link_left1']=base_url()."index.php/member/member_menu/2";
															   $data['ajax_link_left2']=base_url()."index.php/member/member_menu/3";
		  
															  
															  
															   //##============== static var
																  $data['headleftmenu']="-: ระบบบริหารจัดการ"; //2
															//	  $data['leftmenu']="admin/left_menuadmin";  //3
															//	  $data['left1']="+ เพิ่มข่าวประชาสัมพันธ์"; //4
															//	  $data['link_left1']="pr/pr_menu/2"; //5
															//	  $data['left2']="+ แก้ไข / ลบ (แสดงเนื้อหาทั้งหมด)";  //6
															//	  $data['link_left2']="pr/pr_menu/3";  //7
															//	  $data['right_content']='admin/PR/update_PR'; //8  ====>ตัวแปรที่เปลี่ยนไป***********************
																   //$this->load->view('admin/home_admin2',$data);  //10
															//	   $link_anchor_popup="backoffice/show_popup_picture/";
																	
																   //##------------- query  tb_user ------------------------ 
																	$id=$this->uri->segment(4);		
																	                                 //   $id=$this->input->get_post('id');					
																									     $tb="tb_user";
																										 $id_f="id_user";
																										 $query=$this->db->get_where($tb,array($id_f=>$id));
																									  $num_check = $query->num_rows();
																						
																												  if( $num_check == 1 )
																												  {
																														$row=$query->row();
																														//$data['id_user']=$id_user;
																												      	$data['user']=$row->user;  //หัวข้อข่าวสาร
																														$data['birthday']=$row->birthday;  //0=ไม่ปัก  1=ปัก
																														$data['name']=$row->name;  //รูปภาพ
																														$data['lastname']=$row->lastname;  //รูปภาพ
																														 $data['user_enable']=$row->user_enable;  //ข่าวสาร
																														 $data['level_user']=$row->level_user;   //1=show,0=hidden
																														 $data['id_card']=$row->id_card;   //1=show,0=hidden
																														 $data['address']=$row->address;   //1=show,0=hidden
																														  $data['date_record']=$row->date_record;   //1=show,0=hidden
																												        // $data['birthday']=$row->birthday;
																														$data['email']=$row->email;
																														 $dmy_br=$row->birthday;
																												    	  $data['birthday']=DMY_thai_convert2($dmy_br);
																														  $data['user_enable']=$row->user_enable;
																														  $data['id_card']=$row->id_card;
																														  $data['address']=$row->address;
																														  $data['level_user']=$row->level_user;
																													
																														// $this->load->view('admin/home_admin2',$data);
																														
																												  } 
																					  //##------------- query  tb_new ------------------------ 	
																    // $this->load->view('admin/member/update_member',$data);  //10
																   $this->load->view('admin/home_admin2',$data);  //10
																//  $this->load->view('admin/home_admin2_load',$data);
																	break;				  			
                                 }//end case

						    }//end switch
			}	//if   ck			
			else
			{
				   redirect('home/page_login');
			}
	}

##============== insert  MEMBER========================
function   insert_member()  //เพิ่มข่าวสาร
{
	if( 	 $this->ck_login()  ==   1    )
	{  //if
		   $user=trim($this->input->get_post('user'));
		// echo br();
		    $password=md5(trim($this->input->get_post('password')));
		  //echo  br();
		  $b_dmy=trim($this->input->get_post('birthday'));
		   $birthday=DMY_format($b_dmy); //helper
		 // echo   br();
	      $name= trim($this->input->get_post('name')); 
		 // echo   br();
		  $lastname= trim($this->input->get_post('lastname')); 
		  //echo br();
		    $email= trim($this->input->get_post('email')); 
		 //  echo br();
		  $user_enable=trim($this->input->get_post('user_enable')); 
		 // echo  br();
	      $level_user=$this->input->get_post('level_user'); 
		   //echo  sizeof($level_user);
		 //  foreach($level_user as $key=>$val)
			//	{
							//echo  $key;
			//	}
		
		     $id_card=trim($this->input->get_post('id_card')); 
		 //  echo br();
		   $address=trim($this->input->get_post('address')); 
          //echo br();
		  
		     
         $datestring = "%Y-%m-%d %d:%h:%i";
		 $time = time();
	     //$DMY=mdate($datestring,$time);
        
		  //2013-06-29 04:10:10

 	 //   $DMY=mdate($datestring,$time);
	         $date_record=DATE_TIME();
		 //$simu_date="2013-06-28 00:00:00";
		//echo   $date_record=$simu_date;
		// echo   $date_record=mdate($datestring,$time);
	      $addby_user=$this->crt_id_user();
							$data = array(
							   'id_user' => NULL,
							   'user' =>$user ,
							   'password' =>$password,
							   'birthday'=>$birthday,
							    'name'=>$name,
							   'lastname'=>$lastname,  //1=show,0=hidden
							   'email'=>$email,
							   'user_enable'=>$user_enable,
							    'level_user'=>$level_user,
								'id_card'=>$id_card,
								'address'=>$address,
								'date_record'=>$date_record,
								'addby_user'=>$addby_user
							);
						$record_tb_new=$this->db->insert('tb_user', $data);  // insert   tb_new
//							if(   $record_tb_new   )
//							{
//								   echo "T";
//								   //  redirect('pr/pr_menu/3');
//							}
//							elseif(   !$record_tb_new       )
//							{
//								   echo "F";
//								 //  redirect('pr/pr_menu/3');
//							}
             }	//end  if
			 else
			{
				   redirect('home/page_login');
			}
	}// insert_news(

//##======================= DELETE======================
	 function  delete_member()// delete  tb_head_leftmenu
	 {
	 	   if(  $this->ck_login()  ==   1    )  // echo    $this->ck_login();
			{	 //if    ck
                              $id= $this->input->get_post('id');
							 // $id=$this->uri->segment(3);
							  if( $id > 0 )
							  {
								   $tb="tb_user"; 
								   $id_name="id_user";
															//##====== delete=====
																	$this->db->where($id_name,$id);
																	$this->db->delete($tb);
															//##===  แก้ไขโดยการเพิ่ม field  delete_status  ,1=show,0=delete	
							  }
	 	 	}	//if   ck			
			else
			{
				   redirect('home/page_login');
			}
	 }



}//endclass

?>

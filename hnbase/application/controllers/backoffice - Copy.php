<?php    ob_start();    ?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Backoffice extends CI_Controller {
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
			  // $this->load->helper('date');
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
//======================== menu
function   admin_menu() //รายการ  backoffice  admin menu
{
			if( 	 $this->ck_login()  ==   1    )  // echo    $this->ck_login();
			{	 //if    ck
						   $id_menu=$this->uri->segment(3);
							$r_segment=$this->uri->segment(4); //จะกำหนดให้มีการใช้  rigth content
							if( strlen($r_segment) > 0 )
							{ //  if( strlen($r_segment) > 0 )
													   switch($r_segment)
													   {
															case 1:
															{
																
																break;
															}
															case  2:
															{
															
																 break;
															}
															case 3:  //+ เพิ่ม Head Main Menu  
															{
																			//  $right_content_seg4="admin/leftmenu/insert_headmainmenu";
																			   $right_content_seg4="";
																			   $data['load_sub_leftmenu1']="admin/leftmenu/insert_headmainmenu";
																			   
																 break;
															}
															case 4:
															{
																			  $right_content_seg4="admin/vision/form_vision";
															   break;
															}
															case 5:  //  Head  Main menu  หลังจาก insert  tb_head_leftmenu แล้วให้รับโหลดมาหน้านี้
															{
															                  $right_content_seg4="";
																			  $data['load_sub_leftmenu1']="admin/leftmenu/insert_headmainmenu";
																break;
															}
															case  6:
															{
															
															   break;
															}
															case  7:
															{
															
															   break;
															}
															case  8:
															{
															
																break;
															}
															default:
															{
																	//$right_content_seg4="";
															}
						  							 }
							}// end  if( strlen($r_segment) > 0 )
    						elseif(    strlen($r_segment) > 0  ||    $r_segment == '' )
							{
											$right_content_seg4="";
							}

													 
						   switch($id_menu)
						   {
								case 1: //ข่าวสาร (NEWS)
											{
												  $this->menusystem->left_news($this->title_admin,'');  //เรียกค่านี้จาก moduls เ้ป็นค่าตายตัวสำหรับ leftmenu ข่าว
												  break;
											}
											case 2: //กิจกรรมกลุ่มงาน
											{
			
											  break;
											}
											case 3: //MENU
											{
											        				   $data['title_admin']=$this->title_admin;
																	  //$data['title_admin']=$title_admin;
																       //$data['headleftmenu']="-: ระบบบริหารจัดการ";
																	  $data['leftmenu']="admin/leftmenu/left_menuadmin_tab";   //ให้กำหนดเป็นตัวแปร   โหลด menu ฝั่งซ้ายมือ
																      // $data['left1']="+ เพิ่มข่าวสาร";
																	 // $data['link_left1']="backoffice/admin_leftmenu/1";
																	  //$data['left2']="+ แก้ไข / ลบ (แสดงเนื้อหาทั้งหมด)";
															        //$data['link_left2']="backoffice/admin_leftmenu/2";
																	
																	
																	$data['max_tab']=2;
																	//##--   tab ตัวแปร ---
																	     $data['tab1']="Head Main Menu";
																		 $data['tab2']="Main Menu";
																	//##--   load menu จาก --
																	    $data['tab1_content']="admin/leftmenu/left_menuadmin_tab"; //load sub menu 	  
																		 // $data['tab2_content']="ทดสอบ2";	
																		 $data['sub_main_menu1']="+ เพิ่ม Head Main Menu"; 
																		 $data['link_sub_main_menu1']="backoffice/admin_menu/3/3";
																		 
																		 
																		  $data['sub_main_menu2']="+ แก้ไข / ลบ (แสดงเนื้อหาทั้งหมด)"; 
																		  $data['link_sub_main_menu2']="backoffice/admin_menu/3/5";
																	
																	 $right_content=$right_content_seg4;
																	 
																	  if(   strlen($right_content) == 0 )  //เป็น functoin ที่ใช้สำหรับ content ด้านขวามือ
																	  {
																			  $data['right_content']='';
																	  }
																	  else
																	  { 
																			   $data['right_content']=$right_content;  //ตัวนี้รับค่ามาโหลด content ฝั่งขวามือ
																			   
																	   }	
																	        // $data['ckeditor']=$this->ckediter_style1('content');
									 
									 
									                                   $this->load->view('admin/home_admin2',$data);
													                            // $this->load->view('admin/left_menuadmin_tab');
													  break;
											}
											case 4: //วิสัยทัศน์   พันธกิจ  //ทดสอบจะมีการนำ function  switch case กลับมาใช้
											{
											     	  //$data['title_admin']=$title_admin;  //ค่าตายตัว
													  //$data['left1']="+ เพิ่มข่าวสาร";
													  //$data['link_left1']="backoffice/admin_leftmenu/1";
													 // $data['left2']="+ แก้ไข / ลบ (แสดงเนื้อหาทั้งหมด)";
													  //$data['link_left2']="backoffice/admin_leftmenu/2";
													  $left1="+ แก้ไข / ลบ (แสดงเนื้อหาทั้งหมด)";
													  $link_left1="backoffice/admin_menu/4/4";
													  //$link_left1="";
													  $left2='';
													  $link_left2='';
													  $right_content=$right_content_seg4;
													  //$right_content="admin/news/editnew";
													 
													           //##==== ตัวแปร
															      $tb="tb_vision";
																  $id=1;
																  $id_field="id_tb_vision";
																  $field_name="DMY_vision";
																  //query_table($tb,$id,$id_field,$field_name)//ดึงข้อมูลแสดงเพื่อ update ข้อมูล
																 //$data['content_vision']
																 $content_vision=$this->querymodels->query_table($tb,$id,$id_field,"content_vision");   //query  ค่าใน table  
																//  echo   $data['DMY_vision']=$this->querymodels->query_table($tb,$id,$id_field,"DMY_vision");   //query  ค่าใน table
																//   echo  br();
																  // $data['enable_vision']
																 $enable_vision=$this->querymodels->query_table($tb,$id,$id_field,"enable_vision"); 
															
																 // echo  $data['id_user']=$this->querymodels->query_table($tb,$id,$id_field,"id_user"); 
													
												                             $this->menusystem->left_vision($this->title_admin,$right_content,$left1,$link_left1,$left2,$link_left2,$enable_vision,$content_vision);//เมนูซ็ายมือของ  วิสัยทัศน์ (Vision)/พันธกิจ (Mission)  //เรียกค่านี้จาก moduls 
											     break;
											}
											case 5:  //ข่าวประชาสัมพันธ์
											{
											   break;
											}
											case 6:  //สมาชิก
											{
												 $data['title']=$this->title;
												 $this->load->view('contacts',$data);
											   break;
											}
											case 7 :  //เพิ่มเนื้อหาในระบบ
											{
												  //$this->index();
													$this->page_login();
													break;
											}
											case  8:  //logout
											{
													 redirect('home/page_login');
													 break;
											}
											default :
											{
												 $this->index();
												 break;
											}
							}
			}	//if   ck			
			else
			{
				   redirect('home/page_login');
			}

}
function   admin_leftmenu()  //left sub menu    
{
			if( 	 $this->ck_login()  ==   1    )  // echo    $this->ck_login();
			{	 //if    ck
										 $id_sublink=trim($this->uri->segment(3));
										  switch($id_sublink)
										  {  //switch
												 case  1 :  //  ข่าวสาร  เพิ่มข่าวสาร NEWS
												 {
																  $data['title_admin']=$this->title_admin;
																  $data['headright_content']="-: ระบบบริหารจัดการ";
																  $data['right_content']="admin/news/insert_new";
																  $data['link_anchor_popup']="backoffice/show_popup_picture/";
																 
																   $this->menusystem->left_news($this->title_admin,$data['right_content']);  //เรียกค่านี้จาก moduls
													  break;
												 }
												 case   2:  //แก้ไข/ลบ  (แสดงเนื้อหาทั้งหมด) ข่าว  NEWS
												 {
																  $data['title_admin']=$this->title_admin;
																  $data['headleftmenu']="-: ระบบบริหารจัดการ";
																  $data['leftmenu']="admin/left_menuadmin";
																  
																  $data['left1']="+ เพิ่มข่าวสาร";
																  $data['link_left1']="backoffice/admin_leftmenu/1";
																  
																  $data['left2']="+ แก้ไข / ลบ (แสดงเนื้อหาทั้งหมด)";
																  $data['link_left2']= "backoffice/admin_leftmenu/2";
																  
																  $data['link_anchor_popup']="backoffice/show_popup_picture/";
																  
																  $data['right_content']="admin/news/editnew";
																  
																  
																  //##### ------------------  query  เนื้อหาทั้งหมดใน tb_new -----------------------
																//  $query1_pin=$this->db->get_where('tb_new',array('pin_new'=>1));
																//  $query1_unpin=$this->db->get_where('tb_new',array('pin_new'=>0));
															   // $this->querymodels->query_new();
															   
															   	   //###------- ตัวแปร----//query_new($pin_status,$limit,$id,$tb,$ofset)
																	//$data['pin_status'] =1;   //1=ปักหมุด,0=ไม่ปักหมุด
																	$data['limit']=$this->limit_list;     //จำนวนรายการทีแสดงทั้งหมดในหน้า admin
																	$data['id']="id_tb_new";
																	$data['tb']="tb_new";
																	$data['ofset']=0;
																	
																	$data['page']='';
																	$data['sr']="";
																	
																	
																    $this->load->view('admin/home_admin2',$data);
													  break;
												 } 
												 case 3:  //เพิ่ม   กิจกรรมกลุ่มงาน
												 {
												   
												    break;
												 }
												  case 4:  //แก้ไข/ลบ  (แสดงเนื้อหาทั้งหมด) กิจกรรมกลุ่มงาน
												 {
												   
												    break;
												 }
												 case  5: //MENU
												 {
												 
												    break;
												 }
												 case  6:  //MENU
												 {
												 
												      break;
												 }
												 case  7: //แสดง form  วิสัยทัศน์(vision)/พันธกิจ
												 {
                                                             	  $data['title_admin']=$this->title_admin;
																  $data['headright_content']="-: ระบบบริหารจัดการ";
																  $data['right_content']="admin/vision/form_vision";
																  $data['link_anchor_popup']="backoffice/show_popup_picture/";
																 //  $this->menusystem->left_news($this->title_admin,$data['right_content']);  //เรียกค่านี้จาก moduls
												      break;
												 }

										  } //end switch
			}//end  if  
			else
			{
				   redirect('home/page_login');
			}
			
}//end function
//======================== insert
function   insert_news()  //เพิ่มข่าวสาร
{
	if( 	 $this->ck_login()  ==   1    )
	{  //if
		  $title=trim($this->input->get_post('title'));
		  $pin_new=$this->input->get_post('pin_new');
		  if( $pin_new == '' ) {  $pin_new=0;  }   //ปักหมุด
		  
//-----------------------upload  picture function------------------------------------------------------------------	
  $tumbnail=$_FILES['new_picture']['tmp_name'];
  $tumbnail_name=$_FILES['new_picture']['name'];
  $tumbnail_size=$_FILES['new_picture']['size'];
  $tumbnail_type=$_FILES['new_picture']['type'];
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
	     $DMY=mdate($datestring,$time);
	     $this->crt_id_user();
$data = array(
   'id_tb_new' => NULL,
   'title' =>$title ,
   'new_picture' => $tumbnail_name,
   'content'=>$content,
   'DMY'=>$DMY,
   'new_enable'=>1,  //1=show,0=hidden
   'id_user'=>$this->crt_id_user(),
    'pin_new'=>$pin_new
);
							$record_tb_new=$this->db->insert('tb_new', $data);  // insert   tb_new
							// $record_tb_new=true;
							if(   $record_tb_new   )
							{
							          redirect('backoffice/admin_leftmenu/2');
							}
							elseif(   !$record_tb_new       )
							{
							          redirect('backoffice/admin_leftmenu/1');    
							}

             }	//end  if
			 else
			{
				   redirect('home/page_login');
			}

	
	}// insert_news(
	
	
##------------- testing
function   test_lightbox()
{
      $this->load->view('lightbox');
}
function    show_popup_picture() //แสดงรูปภาพ popup
{
				if( 	 $this->ck_login()  ==   1    )
					{  //if
				               $name_picture=  $this->uri->segment(3);
								  if(  strlen($name_picture) > 0 )
								  {
												$image_properties = array(
																								  'src' => 'picture/'.$name_picture,
																								  'alt' => '',
																								  'class' => 'post_images',
																								  'width' => '',
																								  'height' => '',
																								  'title' => '',
																								  'rel' => '',
																								);
											echo  	 img($image_properties);
								  }
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
																		  $data['title_admin']=$this->title_admin;
																		  $data['headright_content']="-: ระบบบริหารจัดการ";
																		  //$data['right_content']="admin/news/insert_new";
																		  $data['right_content']="admin/news/update_new";
																		  $data['link_anchor_popup']="backoffice/show_popup_picture/";
																           //$this->menusystem->left_news($this->title_admin,$data['right_content']);  //เรียกค่านี้จาก moduls
																		   //###------------ แกะค่าออกมาจาก   menusystem->left_news();
																		   			  //$data['title_admin']=$title_admin;
																					  $data['headleftmenu']="-: ระบบบริหารจัดการ";
																					  $data['leftmenu']="admin/left_menuadmin";
																					  $data['left1']="+ เพิ่มข่าวสาร";
																					  $data['link_left1']="backoffice/admin_leftmenu/1";
																					  $data['left2']="+ แก้ไข / ลบ (แสดงเนื้อหาทั้งหมด)";
																					  $data['link_left2']="backoffice/admin_leftmenu/2";
																					 //left_news($title_admin,$right_content)/
//																					  if(   strlen($data['right_content']) == 0 )  //เป็น functoin ที่ใช้สำหรับ content ด้านขวามือ
//																					  {
//																							  $data['right_content']='';
//																					  }
//																					  else
//																					  { 
//																							   $data['right_content']=$right_content;  //ตัวนี้รับค่ามาโหลด content ฝั่งขวามือ
//																							   
//																					   }	
																					   $data['ckeditor']=$this->menusystem->ckediter_style1('content');
																					    $link_anchor_popup="backoffice/show_popup_picture/";
																					  //##------------- query  tb_new ------------------------ 
																					   			if( $id > 0 )
																									{
																									     $tb="tb_new";
																										 $id_f="id_tb_new";
																										 $query=$this->db->get_where($tb,array($id_f=>$id));
																										  $num_check = $query->num_rows();
																										  
																										  if( $num_check == 1 )
																										  {
																												$row=$query->row();
																												$data['id_tb_new']=$id;
																											    $data['data_title']=$row->title;  //หัวข้อข่าวสาร
																											    $data['data_pin_new']=$row->pin_new;  //0=ไม่ปัก  1=ปัก
																												$data['data_new_picture']=$row->new_picture;  //รูปภาพ
																												$data['alius_pic']=   $link_anchor_popup.''.$data['data_new_picture'];  
																												 $data['content']=$row->content;  //ข่าวสาร
																												 $data['data_new_enable']=$row->new_enable;   //1=show,0=hidden 
																												
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
function  query_new_update()//--- update   tb_new
{
       				if( 	 $this->ck_login()  ==   1    )
					{  //if
                   		 		   $id_tb_new=trim($this->input->get_post('id_tb_new'));
								//echo br();
								  $title=trim($this->input->get_post('title'));
								//echo br();
				/*######### -------------- ระบบรูปภาพ และการ upload ---------------------------- */
				//new_picture
				$tumbnail=$_FILES['new_picture']['tmp_name'];
  		     	$tumbnail_name=$_FILES['new_picture']['name'];
			//echo br();
 			 	$tumbnail_size=$_FILES['new_picture']['size'];
 			 	$tumbnail_type=$_FILES['new_picture']['type'];
				 //$this->my_upload->my_upload_function($tumbnail_name,100,'picture/');
        		 //$this->my_upload->my_upload_function($name_pict,$height_value,$path_pict);
		 	      //##------------- กำหนดตัวแปร
				  //$name_pict;  //ชื่้อรูปภาพ
				  //$height_value;  //ความสูง
				  //$path_pict;   //path  picture    //$path_pict;   //path  picture  =>   //copy($tumbnail,'picture/'.$tumbnail_name);  //หมายเหตุ  folder   => picture  อยู่นอกสุด
				/*######### -------------- ระบบรูปภาพ และการ upload ---------------------------- */
		 						  $pin_new=$this->input->get_post('update_pin_new');
								   if( $pin_new == '' ) {  $pin_new=0;  }   //ปักหมุด
								 //echo  $pin_new;
								 //echo  br();
		 	
        $content=$this->input->get_post('content');
        $new_enable=$this->input->get_post('new_enable');
	              if(  $new_enable == '' ) {  $new_enable =0;  }   //ปักหมุด  //1=show,0=hidden
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
				   'new_enable'=>$new_enable,  //1=show,0=hidden
				   'id_user'=>$this->crt_id_user(),
					'pin_new'=>$pin_new
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

  $tumbnail=$_FILES['new_picture']['tmp_name'];
    //$tumbnail=$_FILES[$name_pict]['tmp_name'];
  $tumbnail_name=$_FILES['new_picture']['name'];
   //$tumbnail_name=$_FILES[$name_pict]['name'];
  $tumbnail_size=$_FILES['new_picture']['size'];
  //$tumbnail_size=$_FILES[$name_pict]['size'];
  $tumbnail_type=$_FILES['new_picture']['type'];
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
				   'new_picture' => $tumbnail_name,  //ok
				   'content'=>$content, //ok
				  // 'DMY'=>$DMY,
				   'new_enable'=>$new_enable,  //1=show,0=hidden
				   'id_user'=>$this->crt_id_user(),
					'pin_new'=>$pin_new
				);
}				
							      //$record_tb_new=$this->db->insert('tb_new', $data);  // insert   tb_new
                                  //http://localhost/hostKKHP/index.php/http://localhost/hostKKHP/index.php/backoffice/admin_leftmenu/2
								 $this->db->where('id_tb_new', $id_tb_new);
								  $check_update=$this->db->update('tb_new', $data_update); 
								 // $check_update=TRUE;
								  if(  $check_update == TRUE )
								  {
							       	      //echo "update";
										 //echo  br();
										//  echo  index_page();
									     // redirect('backoffice/admin_leftmenu/2','refresh');
										 //  redirect('backoffice/admin_leftmenu','refresh');
										redirect('/backoffice/admin_leftmenu/2','refresh');
								  }	 
								  else
								  {
								          // echo "false update";
									        ///  http://localhost/hostKKHP/index.php/backoffice/send_editform/1/10
									 		 //send_editform/1/6                                   
										    //$tb_check=trim($this->uri->segment(3)); =>1  ใช้กับตัวนี้    $id_tb_new;    //check  ว่า จะไป form ไหน  //1=edit_new     switch  หน้า  แ้ก้ไขข่าว
							                //$id=trim($this->uri->segment(4)); =>6  // call   ID table
											//echo  br();
										 	$path_change="'backoffice/send_editform/1/".$id_tb_new."'";
										  // echo 	$path_change= "backoffice/send_editform";
										   redirect($path_change,'refresh');
								  }
					}
						 else
						{
							   redirect('home/page_login');
						}
}//end  function  query_new_update()
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
					 $field="new_enable";
					 $id="id_tb_new";
					 $tb="tb_new";

			      $send_page=$this->input->get_post('send_page_update'); //หน้าที่ส่งมาจะส่งกลับ
				 $id_val=$this->input->get_post('hid_id_tb_new');
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

##------------------ delete   table ------------------------------------------------------------
function   delete_table() //ใช้สำหรับลบค่า field ต่างๆ ใน table   uri(4)  case 1=tb_new
{
       					if( 	 $this->ck_login()  ==   1    )
						{  //if
					                   $id= $this->uri->segment(3);
										// echo br();
									   $tb=  $this->uri->segment(4);
										// echo br();
										 /*
										 $tables = array('table1', 'table2', 'table3');
										$this->db->where('id', '5');
										$this->db->delete($tables);
										*/
									//	$this->db->where('id_tb_new', '5');
					   				//	$this->db->delete($tb);
									     if( $id>0 && $tb >0 )
										 {
														switch($tb)
														{
															 case 1:  // uri(4)  case 1=tb_new
															 {
																 $tb_name="tb_new";
																	$this->db->where('id_tb_new',$id);
																	$this->db->delete($tb_name);
																     redirect('/backoffice/admin_leftmenu/2','refresh');
																    break;
															 }
														}
										}				
						}
						 else
						{
							   redirect('home/page_login');
						}
}

//##========================= change page ADMIN ===========================
function  change_page_admin() //เปลี่ยนหน้าแสดงผลจากหน้า ADMIN
{
       					if( 	 $this->ck_login()  ==   1    )
						{  //if
                                       $page= $this->input->post('page');
									   if(  $page == '' )
									   {        $page=$this->uri->segment(3);       }
								        //==== ดึงค่ามาจาก function=admin_leftmenu/2=====================
																  $data['title_admin']=$this->title_admin;
																  $data['headleftmenu']="-: ระบบบริหารจัดการ";
																  $data['leftmenu']="admin/left_menuadmin";
																  
																  $data['left1']="+ เพิ่มข่าวสาร";
																  $data['link_left1']="backoffice/admin_leftmenu/1";
																  
																  $data['left2']="+ แก้ไข / ลบ (แสดงเนื้อหาทั้งหมด)";
																  $data['link_left2']= "backoffice/admin_leftmenu/2";
																  
																  $data['link_anchor_popup']="backoffice/show_popup_picture/";
																  
																  $data['right_content']="admin/news/editnew";
																  
																  //##### ------------------  query  เนื้อหาทั้งหมดใน tb_new -----------------------
																//  $query1_pin=$this->db->get_where('tb_new',array('pin_new'=>1));
																//  $query1_unpin=$this->db->get_where('tb_new',array('pin_new'=>0));
															   // $this->querymodels->query_new();
															   
															   	   //###------- ตัวแปร----//query_new($pin_status,$limit,$id,$tb,$ofset)
																	//$data['pin_status'] =1;   //1=ปักหมุด,0=ไม่ปักหมุด
																	$data['limit']=$this->limit_list;     //จำนวนรายการทีแสดงทั้งหมดในหน้า admin
																	$data['id']="id_tb_new";
																	$data['tb']="tb_new";
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
			         $tb="tb_new";
					// $field="content";
					 $field="title";
					 $limit=5;
					 $id="id_tb_new";  //ใช้สำหรั้บ order_by
					//$ofset=0;
					$url_redirect="backoffice/admin_leftmenu/2";
					
					$data['page']='';
			
			       	 $this->db->order_by($id, "desc");
				    $this->db->like($field,$sr); 
					//$this->db->limit($limit);
				    $query_search=$this->db->get($tb);
				    $ck_num=$query_search->num_rows();
					if( $ck_num > 0  ||   strlen($sr) > 0  )
					{
					//=============function   admin_leftmenu()  //left sub menu     97         
//								  								  $data['title_admin']=$this->title_admin;
//																  $data['headleftmenu']="-: ระบบบริหารจัดการ";
//																  $data['leftmenu']="admin/left_menuadmin";
//																  
//																  $data['left1']="+ เพิ่มข่าวสาร";
//																  $data['link_left1']="backoffice/admin_leftmenu/1";
//																  
//																  $data['left2']="+ แก้ไข / ลบ (แสดงเนื้อหาทั้งหมด)";
//																  $data['link_left2']= "backoffice/admin_leftmenu/2";
//																  
//																  $data['link_anchor_popup']="backoffice/show_popup_picture/";
//																  
//																  $data['right_content']="admin/news/editnew";
//																  
//																	$data['limit']=$this->limit_list;     //จำนวนรายการทีแสดงทั้งหมดในหน้า admin
//																	$data['id']="id_tb_new";
//																	$data['tb']="tb_new";
//																	$data['ofset']=0;
//																	
//																    $data['query_search']=$query_search;
//                                                                    $data['sr']= $sr;
//																	
//																    $this->load->view('admin/home_admin2',$data);
                                                     $this->querymodels->admin_leftmenu_switch_2($sr,$query_search);

					//=================function   admin_leftmenu()  //left sub menu     97    
					}
					else
					{
					        redirect('backoffice/admin_leftmenu/2');
					
					}
					
		}	      
	  else
			{
							   redirect('home/page_login');
			}
}

	}//end class

?>

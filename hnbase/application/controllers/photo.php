<?php    ob_start();    ?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class   Photo extends CI_Controller {
	var  $title="กลุ่มงานสร้างเสริมสุขภาพ โรงงพยาบาลขอนแก่น";
	var  $title_admin="ระบบ backoffice  กลุ่มงานสร้างเสริมสุขภาพ โรงงพยาบาลขอนแก่น";
	var   $check_login="";
    var   $limit_list=8; //จำนวน limit  รายการต่อหน้าที่แสดงใน HOME
	function __construct()
	{  //begin function
		      parent::__construct();
               // $this->load->helper('url'); set เป็น auto แล้ว
			   //$this->load->helper('html');
			   $this->load->model('menusystem');
			   $this->load->helper('ckeditor');
			   $this->load->library('upload');
			   $this->load->helper('date');
			   
			   $this->load->helper(array('form', 'url'));
			   $this->load->library('upload');
			   
			   $this->load->model('querymodels');
			  // $this->load->model('import_');
			  $this->load->model('uploadmodels');
			   $this->load->model('photoallbumdels');  //
			   $CI =& get_instance();  //การใช้ CI
			   $CI->load->helper('gen_string');
			   //$CI->load->helper('my_upload'); //ใช้สำหรับ upload รูปภาพ
			    $this->load->model('querymember');  //ใช้ query  หน้ารวมของการ เพิ่มสมาชิก
	}  //end  function


function  ck_login()  //ใช้ check การ login ของระบบ
	{
		 //return    $this->check_login= "t";
		return     $this->check_login=$this->menusystem->session_login();
	}			
	function    photomenu()  //main menu สำหรับ  ประชาสัมพันธ์
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
									
									  $data['left1']="+ Edit"; //4
									  $data['link_left1']="photo/photomenu/2"; //5
									  
									  $data['left2']="+ All view";  //6
									  //$data['link_left2']="pr/pr_menu/3";  //7
									    $data['link_left2']="photo/photomenu/3";  //7
									  
									  $data['right_content']='';  //8  ====>ตัวแปรที่เปลี่ยนไป************************
									  //photo/edit_formphoto
									    $data['ckeditor']=$this->menusystem->ckediter_style1('content');  //9
									   $this->load->view('admin/home_admin2',$data);  //10
									   break;
							  }
							  case 2: //โหลดหน้าเพิ่มข่าวประชาสัมพันธ์
							  {
									   //##============== static var
//									  $data['title_admin']=$this->title_admin; //1
//									  $data['headleftmenu']="-: ระบบบริหารจัดการ"; //2
//								      $data['leftmenu']="admin/left_menuadmin";  //3
//									  $data['left1']="+ เพิ่มข่าวประชาสัมพันธ์"; //4
//									  $data['link_left1']="pr/pr_menu/2"; //5
//									  $data['left2']="+ แก้ไข / ลบ (แสดงเนื้อหาทั้งหมด)";  //6
//									  $data['link_left2']="pr/pr_menu/3";  //7
//									  $data['right_content']='admin/PR/insert_PR'; //8  ====>ตัวแปรที่เปลี่ยนไป***********************
//									   $data['ckeditor']=$this->menusystem->ckediter_style1('content');  //9
//									   $this->load->view('admin/home_admin2',$data);  //10
//							         break;


									  $data['title_admin']=$this->title_admin; //1
									  $data['headleftmenu']="-: ระบบบริหารจัดการ"; //2
								      $data['leftmenu']="admin/left_menuadmin";  //3
									  $data['left1']="+ Edit"; //4
									  
									  $data['link_left1']="photo/photomenu/2"; //5
									  
									  $data['left2']="+ All view";  //6
									 // $data['link_left2']="pr/pr_menu/3";  //7
									  $data['link_left2']="photo/photomenu/3";  //7
									  
									  
									  $data['right_content']='admin/photo/edit_formphoto';  //8  ====>ตัวแปรที่เปลี่ยนไป************************
									  //photo/edit_formphoto
									    $data['ckeditor']=$this->menusystem->ckediter_style1('content');  //9
									   $this->load->view('admin/home_admin2',$data);  //10
									   break;

							  }//end case
							  case  3:  //หน้ารวมของข่าวประชาสัมพันธ์
							  {
							  
							  
//											  $data['title_admin']=$this->title_admin; //1
//											  $data['headleftmenu']="-: ระบบบริหารจัดการ"; //2
//											  $data['leftmenu']="admin/left_menuadmin";  //3
//											  $data['left1']="+ เพิ่มข่าวประชาสัมพันธ์"; //4
//											  $data['link_left1']="pr/pr_menu/2"; //5
//											  $data['left2']="+ แก้ไข / ลบ (แสดงเนื้อหาทั้งหมด)";  //6
//											  $data['link_left2']="pr/pr_menu/3";  //7
//											 $data['right_content']="admin/pr/editpr";//8  ====>ตัวแปรที่เปลี่ยนไป***********************
//											 $data['link_anchor_popup']="backoffice/show_popup_picture/";
//																	$data['limit']=$this->limit_list;     //จำนวนรายการทีแสดงทั้งหมดในหน้า admin
//																	$data['id']="id_tb_pr";
//																	$data['tb']="tb_pr";
//																	$data['ofset']=0;
//																	$data['page']='';
//																	$data['sr']="";
//										  $this->load->view('admin/home_admin2',$data);

					
									  $data['title_admin']=$this->title_admin; //1
									  $data['headleftmenu']="-: ระบบบริหารจัดการ"; //2
								      $data['leftmenu']="admin/left_menuadmin";  //3
									  $data['left1']="+ All view"; //4
									  
								//	  $data['link_left1']="photo/photomenu/2"; //5
									    $data['link_left1']="photo/photomenu/3"; //5
										
										
									 //$data['left2']="+ All view";  //6
									  $data['left2']="";  //6
									  
									  
									  $data['link_left2']="pr/pr_menu/3";  //7
									  $data['right_content']='admin/photo/folder_view';  //8  ====>ตัวแปรที่เปลี่ยนไป************************
									  //photo/edit_formphoto
									    $data['ckeditor']=$this->menusystem->ckediter_style1('content');  //9
									   $this->load->view('admin/home_admin2',$data);  //10
									   break;
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
	
	
	     function  delete_file() //ลบไฟล์รูปภาพ
		 { //begin  function
		        //echo "delete file";
					     $arr_pic  =  $this->input->get_post('pic');
						##--------------- path  photo  &&  tab_active-----------------------
						echo   $path_photo=$this->input->get_post('path_photo');
						echo  br();
				    	echo   $tab_active=$this->input->get_post('tab_active');
						echo  br(); 
						 
						 $size_arr=  sizeof($arr_pic);
						 //echo     $size_arr;
						    if(    $size_arr   >= 1  )
							{  //begin  if
										  for(  $count   = 0; $count  <  $size_arr ; $count ++ )
										{ //begin for
												//echo  $arr_pic[$count];
												//echo  "<br>";
												 //  $file_pic="photo/photo1/".$arr_pic[$count];  ##  varible
											      $file_pic="photo/".$path_photo."/".$arr_pic[$count];  ##  varible
												//echo  "<br>";
										          $path_direct="photo/photomenu/3/".$tab_active;
										//	    redirect( $path_direct);
//												 if(    !empty($file_pic)     )
//												 {
//												         $check_del=unlink($file_pic);
//														 if (      $check_del     )
//														 {
//														       //echo  "delete file =>  ".$arr_pic[$count];
//															 //  redirect('photo/photomenu/3');   ##  varible
//															      redirect( $path_direct);
//														 }
//														 else
//														 {
//														       //echo  "false";
//															   // redirect('photo/photomenu/3');   ##  varible
//															       redirect( $path_direct);
//														 }
//												 }//end  if
										} //end for
							}//end if			
		 }//end  function
		 
		 
		 function  delete_photo1()
		 {  //begin   delete photo1
		 			     $arr_pic  =  $this->input->get_post('pic');
						##--------------- path  photo  &&  tab_active-----------------------
						echo   $path_photo=$this->input->get_post('path_photo');
						echo  br();
				    	echo   $tab_active=$this->input->get_post('tab_active');
						echo  br(); 
						 $size_arr=  sizeof($arr_pic);
						 //echo     $size_arr;
						    if(    $size_arr   >= 1  )
							{  //begin  if
										  for(  $count   = 0; $count  <  $size_arr ; $count ++ )
										{ //begin for
												//echo  $arr_pic[$count];
												//echo  "<br>";
												 //  $file_pic="photo/photo1/".$arr_pic[$count];  ##  varible
											      $file_pic="photo/".$path_photo."/".$arr_pic[$count];  ##  varible
												//echo  "<br>";
										          $path_direct="photo/photomenu/3/".$tab_active;
										//	    redirect( $path_direct);
//												 if(    !empty($file_pic)     )
//												 {
//												         $check_del=unlink($file_pic);
//														 if (      $check_del     )
//														 {
//														       //echo  "delete file =>  ".$arr_pic[$count];
//															 //  redirect('photo/photomenu/3');   ##  varible
//															      redirect( $path_direct);
//														 }
//														 else
//														 {
//														       //echo  "false";
//															   // redirect('photo/photomenu/3');   ##  varible
//															       redirect( $path_direct);
//														 }
//												 }//end  if
										} //end for
							}//end if			
		 
		 }//end  function
		 
		 function   test_delete_photo()
		 {
					   $arr_pic  =  $this->input->get_post('pic');
						##--------------- path  photo  &&  tab_active-----------------------
				       $path_photo=$this->input->get_post('path_photo');
				       $tab_active=$this->input->get_post('tab_active');
					    $size_arr=  sizeof($arr_pic);
					    $this->photoallbumdels->delete_photo_model($this->input->get_post('pic'),$path_photo,$tab_active);
		 }
		 
		 function   delete_photo1_modify()
		 {
		 			    $arr_pic  =  $this->input->get_post('pic');
						##--------------- path  photo  &&  tab_active-----------------------
				       $path_photo=$this->input->get_post('path_photo');
				       $tab_active=$this->input->get_post('tab_active');
					  //  $size_arr=  sizeof($arr_pic);
					    $this->photoallbumdels->delete_photo_model($arr_pic,$path_photo,$tab_active); //module
		 }
		 function   delete_photo2()
		 {
		 			    $arr_pic  =  $this->input->get_post('pic');
						##--------------- path  photo  &&  tab_active-----------------------
				       $path_photo=$this->input->get_post('path_photo2');
				       $tab_active=$this->input->get_post('tab_active2');
					  //  $size_arr=  sizeof($arr_pic);
					    $this->photoallbumdels->delete_photo_model($arr_pic,$path_photo,$tab_active); //module
		 }
		 function   delete_photo3()
		 {
		 			    $arr_pic  =  $this->input->get_post('pic');
						##--------------- path  photo  &&  tab_active-----------------------
				       $path_photo=$this->input->get_post('path_photo3');
				       $tab_active=$this->input->get_post('tab_active3');
					  //  $size_arr=  sizeof($arr_pic);
					    $this->photoallbumdels->delete_photo_model($arr_pic,$path_photo,$tab_active); //module
		 }
		 
		 function  update_photo1()
		 {//being  function
					 $titlepicture=trim($this->input->get_post('titlepicture'));
					// echo  br();
					 //echo   $folder_picture=$this->input->get_post('folder_picture');
					//echo  br();
				    $id_titlepicture=$this->input->get_post('id_titlepicture');
					//echo  br();
					//tab
				    $tab_active=$this->input->get_post('tab_active');
					//echo  br();
//================= function  upload===================					
//						if(  $tumbnail_name != '' )
//						{ //begin  if
//															  $array_last=explode(".",$tumbnail_name);
//															 $c=count($array_last) - 1;
//															 $lastname=strtolower($array_last[$c]); 
//															   if( $lastname == "gif"  ||  $lastname == "png"  ||  $lastname == "jpg"  ||  $lastname == "bmp" )
//																 { 
//										 $images=$tumbnail;
//										 $height = 140;
//										 $size = getimagesize($images);
//										 $width = round( $height*$size[0]/$size[1]);
//										 if($size[2] == 1) 
//										   {
//											   $images_orig = imagecreatefromgif($images); //resize รูปประเภท GIF
//										   } 
//										 else if($size[2] == 2) 
//										  {
//												 $images_orig = imagecreatefromjpeg($images); //resize รูปประเภท JPEG
//										  }
//								$photoX = imagesx($images_orig);
//								$photoY = imagesy($images_orig);
//								$images_fin = imagecreatetruecolor($width, $height);
//								imagecopyresampled($images_fin, $images_orig, 0, 0, 0, 0, $width+1, $height+1, $photoX, $photoY);
//								imagejpeg($images_fin, $images); //ชื่อไฟล์ใหม่
//								imagedestroy($images_orig);
//								imagedestroy($images_fin);
//																   // copy($tumbnail,'../training/upload/'.$tumbnail_name);
//																	copy($tumbnail,'photo/photo1/'.$tumbnail_name);  //หมายเหตุ  folder   => picture  อยู่นอกสุด
//																 }
//						}	//end  if
##=======ไฟล์ตัวอย่างภาพประกอบ===================
  											$path='photo/photo1/';
											//$path='picture/';
 ##=======ไฟล์ตัวอย่างภาพประกอบ===================
										  $tumbnail=$_FILES['thumpic']['tmp_name'];
								         $tumbnail_name=$_FILES['thumpic']['name'];  //ชื่อไฟล์ที่ต้อง update
								    	  $tumbnail_size=$_FILES['thumpic']['size'];
										  $tumbnail_type=$_FILES['thumpic']['type'];
                                          $h=140;
										  //$path='photo/photo1/';
										 // $this->photoallbumdels->upload_picture($tumbnail,$tumbnail_name,$h,$path);  //ไฟล์เดิมจากการ modify ก่อน 5-10-56
                                                                      // if(is_uploaded_file($tumbnail_name))
                                                                       // {
								             $this->photoallbumdels->upload_picture_tumbnail($tumbnail,$tumbnail_name,$h,$path);
 ##=======Pic1===================                                    //   }   
										  $tumbnail1=$_FILES['pic1']['tmp_name'];
									     $tumbnail_name1=$_FILES['pic1']['name'];  //ชื่อไฟล์ที่ต้อง update
							             $tumbnail_size1=$_FILES['pic1']['size'];
						            	  $tumbnail_type1=$_FILES['pic1']['type'];
                                          $h1=640;
										//  $path='photo/photo1/';
										  $this->photoallbumdels->upload_picture($tumbnail1,$tumbnail_name1,$h1,$path);
 ##=======Pic2===================
									  $tumbnail2=$_FILES['pic2']['tmp_name'];
									  $tumbnail_name2=$_FILES['pic2']['name'];  //ชื่อไฟล์ที่ต้อง update
								      $tumbnail_size2=$_FILES['pic2']['size'];
								      $tumbnail_type2=$_FILES['pic2']['type'];
                                       $h2=640;
										//  $path='photo/photo1/';
										  $this->photoallbumdels->upload_picture($tumbnail2,$tumbnail_name2,$h2,$path);
 ##=======Pic3===================
								     $tumbnail3=$_FILES['pic3']['tmp_name'];
								     $tumbnail_name3=$_FILES['pic3']['name'];  //ชื่อไฟล์ที่ต้อง update
								     $tumbnail_size3=$_FILES['pic3']['size'];
									 $tumbnail_type3=$_FILES['pic3']['type'];
                                          //$h2=640;
										//  $path='photo/photo1/';
										 $this->photoallbumdels->upload_picture($tumbnail3,$tumbnail_name3,$h2,$path);
 ##=======Pic4===================
						           $tumbnail4=$_FILES['pic4']['tmp_name'];
								   $tumbnail_name4=$_FILES['pic4']['name'];  //ชื่อไฟล์ที่ต้อง update
							      $tumbnail_size4=$_FILES['pic4']['size'];
								  $tumbnail_type4=$_FILES['pic4']['type'];
                                          //$h2=640;
										//  $path='photo/photo1/';
										 $this->photoallbumdels->upload_picture($tumbnail4,$tumbnail_name4,$h2,$path);
 ##=======Pic5===================
								 $tumbnail5=$_FILES['pic5']['tmp_name'];
							     $tumbnail_name5=$_FILES['pic5']['name'];  //ชื่อไฟล์ที่ต้อง update
								 $tumbnail_size5=$_FILES['pic5']['size'];
							     $tumbnail_type5=$_FILES['pic5']['type'];
                                          //$h2=640;
										//  $path='photo/photo1/';
							    $this->photoallbumdels->upload_picture($tumbnail5,$tumbnail_name5,$h2,$path);
 ##=======Pic6===================
							     $tumbnail6=$_FILES['pic6']['tmp_name'];
								 $tumbnail_name6=$_FILES['pic6']['name'];  //ชื่อไฟล์ที่ต้อง update
								  $tumbnail_size6=$_FILES['pic6']['size'];
								 $tumbnail_type6=$_FILES['pic6']['type'];
                                          //$h2=640;
										//  $path='photo/photo1/';
								  $this->photoallbumdels->upload_picture($tumbnail6,$tumbnail_name6,$h2,$path);
##================== update===================										 
									if(   !empty($tumbnail_name)   )
									{
										 $data = array(
																		 'titlepicture' =>$titlepicture,
																		  'thumpic' =>$tumbnail_name
																	);
									 }
									 else
									 {
									 	  $data = array(
																		 'titlepicture' =>$titlepicture,
																	);
									 }								
									   //$this->db->update('tb_titlepicture',$data,array('id_titlepicture'=>1));		
										    $this->db->update('tb_titlepicture',$data,array('id_titlepicture'=>$id_titlepicture));		
											$final="photo/photomenu/3/".$tab_active;
											//echo  $final;
										  //  redirect('photo/photomenu/3/0');		
										  redirect($final);							
		 }//end function

	        function  update_photo2()
			{//begin
//------------------------------------------------------------------------------------
					echo   $titlepicture=trim($this->input->get_post('titlepicture2'));
					 echo  br();
					 //echo   $folder_picture=$this->input->get_post('folder_picture');
					//echo  br();
				    echo  $id_titlepicture=$this->input->get_post('id_titlepicture2');
					echo  br();
					//tab
				    echo  $tab_active=$this->input->get_post('tab_active2');
					echo  br();
				    $final="photo/photomenu/3/".$tab_active;
##--------- ACTIVE---------------------------------------------
										##=======ไฟล์ตัวอย่างภาพประกอบ===================
																					$path='photo/photo2/';
																					//$path='picture/';
																					$path_photo='photo/photo2/';
										 ##=======ไฟล์ตัวอย่างภาพประกอบ===================
																				  $tumbnail=$_FILES['thumpic2']['tmp_name'];
																				 $tumbnail_name=$_FILES['thumpic2']['name'];  //ชื่อไฟล์ที่ต้อง update
//																				  $tumbnail_size=$_FILES['thumpic']['size'];
//																				  $tumbnail_type=$_FILES['thumpic']['type'];
																				  $h=140;
																				  $this->photoallbumdels->upload_picture($tumbnail,$tumbnail_name,$h,$path);
										 ##=======Pic1===================
																				  $tumbnail1=$_FILES['pic1b']['tmp_name'];
																				 $tumbnail_name1=$_FILES['pic1b']['name'];  //ชื่อไฟล์ที่ต้อง update
//																				 $tumbnail_size1=$_FILES['pic1']['size'];
//																				  $tumbnail_type1=$_FILES['pic1']['type'];
																				  $h1=640;
																				//  $path='photo/photo1/';
																				  $this->photoallbumdels->upload_picture($tumbnail1,$tumbnail_name1,$h1,$path_photo);
										 ##=======Pic2===================
																			  $tumbnail2=$_FILES['pic2b']['tmp_name'];
																			  $tumbnail_name2=$_FILES['pic2b']['name'];  //ชื่อไฟล์ที่ต้อง update
//																			  $tumbnail_size2=$_FILES['pic2']['size'];
//																			  $tumbnail_type2=$_FILES['pic2']['type'];
																			   $h2=640;
																				//  $path='photo/photo1/';
																				  $this->photoallbumdels->upload_picture($tumbnail2,$tumbnail_name2,$h2,$path_photo);
										 ##=======Pic3===================
																			 $tumbnail3=$_FILES['pic3b']['tmp_name'];
																			 $tumbnail_name3=$_FILES['pic3b']['name'];  //ชื่อไฟล์ที่ต้อง update
//																			 $tumbnail_size3=$_FILES['pic3']['size'];
//																			 $tumbnail_type3=$_FILES['pic3']['type'];
																				  //$h2=640;
																				//  $path='photo/photo1/';
																				 $this->photoallbumdels->upload_picture($tumbnail3,$tumbnail_name3,$h2,$path_photo);
										 ##=======Pic4===================
																		   $tumbnail4=$_FILES['pic4b']['tmp_name'];
																		   $tumbnail_name4=$_FILES['pic4b']['name'];  //ชื่อไฟล์ที่ต้อง update
//																		  $tumbnail_size4=$_FILES['pic4']['size'];
//																		  $tumbnail_type4=$_FILES['pic4']['type'];
																				  //$h2=640;
																				//  $path='photo/photo1/';
																				 $this->photoallbumdels->upload_picture($tumbnail4,$tumbnail_name4,$h2,$path_photo);
										 ##=======Pic5===================
																		 $tumbnail5=$_FILES['pic5b']['tmp_name'];
																		 $tumbnail_name5=$_FILES['pic5b']['name'];  //ชื่อไฟล์ที่ต้อง update
//																		 $tumbnail_size5=$_FILES['pic5']['size'];
//																		 $tumbnail_type5=$_FILES['pic5']['type'];
																				  //$h2=640;
																				//  $path='photo/photo1/';
																		$this->photoallbumdels->upload_picture($tumbnail5,$tumbnail_name5,$h2,$path_photo);
										 ##=======Pic6===================
																		 $tumbnail6=$_FILES['pic6b']['tmp_name'];
																		 $tumbnail_name6=$_FILES['pic6b']['name'];  //ชื่อไฟล์ที่ต้อง update
//																		  $tumbnail_size6=$_FILES['pic6']['size'];
//																		 $tumbnail_type6=$_FILES['pic6']['type'];
																				  //$h2=640;
																				//  $path='photo/photo1/';
																		  $this->photoallbumdels->upload_picture($tumbnail6,$tumbnail_name6,$h2,$path_photo);
										##================== update===================										 
																			if(   !empty($tumbnail_name)   )
																			{
																				 $data = array(
																												 'titlepicture' =>$titlepicture,
																												  'thumpic' =>$tumbnail_name
																											);
																			 }
																			 else
																			 {
																				  $data = array(
																												 'titlepicture' =>$titlepicture,
																											);
																			 }								
																			   //$this->db->update('tb_titlepicture',$data,array('id_titlepicture'=>1));		
																					$this->db->update('tb_titlepicture',$data,array('id_titlepicture'=>$id_titlepicture));		
																			  redirect($final);							
										##--------- ACTIVE---------------------------------------------
//------------------------------------------------------------------------------------			
			}//end
			
			
	        function  update_photo3()
			{//begin
//------------------------------------------------------------------------------------
					echo   $titlepicture=trim($this->input->get_post('titlepicture3'));
					 echo  br();
					 //echo   $folder_picture=$this->input->get_post('folder_picture');
					//echo  br();
				    echo  $id_titlepicture=$this->input->get_post('id_titlepicture3');
					echo  br();
					//tab
				    echo  $tab_active=$this->input->get_post('tab_active3');
					echo  br();
				    $final="photo/photomenu/3/".$tab_active;
##--------- ACTIVE---------------------------------------------
										##=======ไฟล์ตัวอย่างภาพประกอบ===================
																					$path='photo/photo3/';
																					//$path='picture/';
																					$path_photo='photo/photo3/';
										 ##=======ไฟล์ตัวอย่างภาพประกอบ===================
																				  $tumbnail=$_FILES['thumpic3']['tmp_name'];
																				 $tumbnail_name=$_FILES['thumpic3']['name'];  //ชื่อไฟล์ที่ต้อง update
//																				  $tumbnail_size=$_FILES['thumpic']['size'];
//																				  $tumbnail_type=$_FILES['thumpic']['type'];
																				  $h=140;
																				  $this->photoallbumdels->upload_picture($tumbnail,$tumbnail_name,$h,$path);
										 ##=======Pic1===================
																				  $tumbnail1=$_FILES['pic1c']['tmp_name'];
																				 $tumbnail_name1=$_FILES['pic1c']['name'];  //ชื่อไฟล์ที่ต้อง update
//																				 $tumbnail_size1=$_FILES['pic1']['size'];
//																				  $tumbnail_type1=$_FILES['pic1']['type'];
																				  $h1=640;
																				//  $path='photo/photo1/';
																				  $this->photoallbumdels->upload_picture($tumbnail1,$tumbnail_name1,$h1,$path_photo);
										 ##=======Pic2===================
																			  $tumbnail2=$_FILES['pic2c']['tmp_name'];
																			  $tumbnail_name2=$_FILES['pic2c']['name'];  //ชื่อไฟล์ที่ต้อง update
//																			  $tumbnail_size2=$_FILES['pic2']['size'];
//																			  $tumbnail_type2=$_FILES['pic2']['type'];
																			   $h2=640;
																				//  $path='photo/photo1/';
																				  $this->photoallbumdels->upload_picture($tumbnail2,$tumbnail_name2,$h2,$path_photo);
										 ##=======Pic3===================
																			 $tumbnail3=$_FILES['pic3c']['tmp_name'];
																			 $tumbnail_name3=$_FILES['pic3c']['name'];  //ชื่อไฟล์ที่ต้อง update
//																			 $tumbnail_size3=$_FILES['pic3']['size'];
//																			 $tumbnail_type3=$_FILES['pic3']['type'];
																				  //$h2=640;
																				//  $path='photo/photo1/';
																				 $this->photoallbumdels->upload_picture($tumbnail3,$tumbnail_name3,$h2,$path_photo);
										 ##=======Pic4===================
																		   $tumbnail4=$_FILES['pic4c']['tmp_name'];
																		   $tumbnail_name4=$_FILES['pic4c']['name'];  //ชื่อไฟล์ที่ต้อง update
//																		  $tumbnail_size4=$_FILES['pic4']['size'];
//																		  $tumbnail_type4=$_FILES['pic4']['type'];
																				  //$h2=640;
																				//  $path='photo/photo1/';
																				 $this->photoallbumdels->upload_picture($tumbnail4,$tumbnail_name4,$h2,$path_photo);
										 ##=======Pic5===================
																		 $tumbnail5=$_FILES['pic5c']['tmp_name'];
																		 $tumbnail_name5=$_FILES['pic5c']['name'];  //ชื่อไฟล์ที่ต้อง update
//																		 $tumbnail_size5=$_FILES['pic5']['size'];
//																		 $tumbnail_type5=$_FILES['pic5']['type'];
																				  //$h2=640;
																				//  $path='photo/photo1/';
																		$this->photoallbumdels->upload_picture($tumbnail5,$tumbnail_name5,$h2,$path_photo);
										 ##=======Pic6===================
																		 $tumbnail6=$_FILES['pic6c']['tmp_name'];
																		 $tumbnail_name6=$_FILES['pic6c']['name'];  //ชื่อไฟล์ที่ต้อง update
//																		  $tumbnail_size6=$_FILES['pic6']['size'];
//																		 $tumbnail_type6=$_FILES['pic6']['type'];
																				  //$h2=640;
																				//  $path='photo/photo1/';
																		  $this->photoallbumdels->upload_picture($tumbnail6,$tumbnail_name6,$h2,$path_photo);
										##================== update===================										 
																			if(   !empty($tumbnail_name)   )
																			{
																				 $data = array(
																												 'titlepicture' =>$titlepicture,
																												  'thumpic' =>$tumbnail_name
																											);
																			 }
																			 else
																			 {
																				  $data = array(
																												 'titlepicture' =>$titlepicture,
																											);
																			 }								
																			   //$this->db->update('tb_titlepicture',$data,array('id_titlepicture'=>1));		
																					$this->db->update('tb_titlepicture',$data,array('id_titlepicture'=>$id_titlepicture));		
																					  redirect($final);							
										##--------- ACTIVE---------------------------------------------
//------------------------------------------------------------------------------------			
			}//end
			
			
	}//end   class
?>	
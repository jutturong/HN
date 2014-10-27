<?php    ob_start();    ?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Vision extends CI_Controller {
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

	function   update_vision()  //เพิ่มข่าวสาร
   {
				if( 	 $this->ck_login()  ==   1    )
				{  //if
  									     $content_vision=$this->input->get_post('content');
									  
   									       $datestring = "%Y-%m-%d %d:%h:%i";
										   $time = time();
								          $DMY_vision=mdate($datestring,$time);
									     $enable_vision=$this->input->get_post('enable_vision');  //1=enable,0=disable
										  if (   $enable_vision == '' )
										  {
										       $enable_vision=0;
										  } 
										//echo     $enable_vision;
										//echo br();
									 	$id_user=$this->crt_id_user();
														  $data_update=array(
																			 //  'id_tb_vision'=>NULL
																			 'content_vision'=>$content_vision,
																			 'DMY_vision'=>$DMY_vision,
																			 'enable_vision'=>$enable_vision,
																			 'id_user'=>$id_user
																							);
										   $this->db->where('id_tb_vision', 1);
								           $check_update=$this->db->update('tb_vision', $data_update); 
										    $check_update=true;
											if( $check_update == true )
											{
											    //echo  "success update";
											    redirect('backoffice/admin_menu/4/4');
											 } 
											else
											 {
											    //echo  "false";
												  redirect('backoffice/admin_menu/4/4');
											  }
      	       }	//end  if
			 else
			{
				   redirect('home/page_login');
			}
	}//end  update_vision
	
	}//end class		

?>
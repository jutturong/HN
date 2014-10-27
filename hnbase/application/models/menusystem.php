<?php   if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Menusystem extends  CI_Model {
           //var  fix_limit=10;  //limit หน้าในการแสดงผล
    function Menusystem()
    {
        //parent::CI_Model();
		   parent::__construct();
    }
	function   left_news($title_admin,$right_content)//เมนูซ้ายมือของ  ข่าวสาร (NEWS)
	{
									//  $data['title_admin']=$this->title_admin;
									  $data['title_admin']=$title_admin;
									  $data['headleftmenu']="-: ระบบบริหารจัดการ";
								      $data['leftmenu']="admin/left_menuadmin";
									  $data['left1']="+ เพิ่มข่าวสาร";
									  $data['link_left1']="backoffice/admin_leftmenu/1";
									  $data['left2']="+ แก้ไข / ลบ (แสดงเนื้อหาทั้งหมด)";
									  $data['link_left2']="backoffice/admin_leftmenu/2";
									  if(   strlen($right_content) == 0 )  //เป็น functoin ที่ใช้สำหรับ content ด้านขวามือ
									  {
									          $data['right_content']='';
									  }
									  else
									  { 
									           $data['right_content']=$right_content;  //ตัวนี้รับค่ามาโหลด content ฝั่งขวามือ
											   
									   }	
			                           $data['ckeditor']=$this->ckediter_style1('content');
									   $this->load->view('admin/home_admin2',$data);
	}
	function  left_vision($title_admin,$right_content,$left1,$link_left1,$left2,$link_left2,$enable_vision,$content_vision)//เมนูซ็ายมือของ  วิสัยทัศน์ (Vision)/พันธกิจ (Mission)
	{
	         						  $data['title_admin']=$title_admin;  //ค่าตายตัว
									  $data['headleftmenu']="-: ระบบบริหารจัดการ";  //ค่าตายตัว
									  $data['leftmenu']="admin/left_menuadmin"; //ค่าตายตัว
									  
									  //$data['left1']="+ เพิ่มข่าวสาร";
									  $data['left1']=$left1;
									  //$data['link_left1']="backoffice/admin_leftmenu/1";
									  $data['link_left1']=$link_left1;
									 // $data['left2']="+ แก้ไข / ลบ (แสดงเนื้อหาทั้งหมด)";
									   $data['left2']=$left1;
									  //$data['link_left2']="backoffice/admin_leftmenu/2";
									   $data['link_left2']=$link_left2;
									   
									   
									   //##--- เพิ่มเติมในการดึงข้อมูลเพื่อการ udpate ข้อมูล
									  //$enable_vision
									  $data['enable_vision']=$enable_vision;
									  $data['content_vision']=$content_vision;
									   
								 	if(   strlen($right_content) == 0 )  //เป็น functoin ที่ใช้สำหรับ content ด้านขวามือ
									  {
									          $data['right_content']='';
									  }
									  else
									  { 
									           $data['right_content']=$right_content;  //ตัวนี้รับค่ามาโหลด content ฝั่งขวามือ
									   }	
			                           $data['ckeditor']=$this->ckediter_style1('content');
 								       $this->load->view('admin/home_admin2',$data);
	}
	function   session_login()  //สำหรับการ  checklogin ของระบบ
	{
	         return      $this->session->userdata('sess_login');
	}
	function   session_id_user()  //สำหรับการ  checklogin ของระบบ
	{
	         return      $this->session->userdata('sess_id_user');
	}

##---------------------------------------------- fck style ---------------------------------------------------	
	function   ckediter_style1($name) //สำหรับสร้าง ckediter ดึงมาใช้งาน
	{
			//$data['ckeditor'] = array(
		return    $ckeditor = array(
			//ID of the textarea that will be replaced
			'id' 	=> 	''.$name.'',
			'path'	=>	'js/ckeditor',
		
			//Optionnal values
			'config' => array(
				'toolbar' 	=> 	"Full", 	//Using the Full toolbar
				'width' 	=> 	"500px",	//Setting a custom width
				'height' 	=> 	'400px',	//Setting a custom height
					
			),
		
			//Replacing styles from the "Styles tool"
			'styles' => array(
			
				//Creating a new style named "style 1"
				'style 1' => array (
					'name' 		=> 	'Blue Title',
					'element' 	=> 	'h2',
					'styles' => array(
						'color' 			=> 	'Blue',
						'font-weight' 		=> 	'bold'
					)
				),
				
				//Creating a new style named "style 2"
				'style 2' => array (
					'name' 		=> 	'Red Title',
					'element' 	=> 	'h2',
					'styles' => array(
						'color' 			=> 	'Red',
						'font-weight' 		=> 	'bold',
						'text-decoration'	=> 	'underline'
					)
				)				
			)
		);
	}// end  ckediter_style1
	function   ckediter_style2($name) //สำหรับสร้าง ckediter ดึงมาใช้งาน
	{
	     return  	$ckeditor = array(
		
			//ID of the textarea that will be replaced
			'id' 	=> 	''.$name.'',
			'path'	=>	'js/ckeditor',
		
			//Optionnal values
			'config' => array(
				'width' 	=> 	"500px",	//Setting a custom width
				'height' 	=> 	'100px',	//Setting a custom height
				'toolbar' 	=> 	array(		//Setting a custom toolbar
					array('Bold', 'Italic'),
					array('Underline', 'Strike', 'FontSize'),
					array('Smiley'),
					'/'
				)
			),
		
			//Replacing styles from the "Styles tool"
			'styles' => array(
			
				//Creating a new style named "style 1"
				'style 3' => array (
					'name' 		=> 	'Green Title',
					'element' 	=> 	'h3',
					'styles' => array(
						'color' 			=> 	'Green',
						'font-weight' 		=> 	'bold'
					)
				)
								
			)
		);

    }	
}  //end   class  moduls
?>
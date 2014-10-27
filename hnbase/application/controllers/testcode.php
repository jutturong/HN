<?php    ob_start();    ?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Testcode extends CI_Controller {
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
			  
			  $this->load->model('xml_file1');  //ใช้ load file XML ใน modul  ####============
			  
			   $CI =& get_instance();  //การใช้ CI
			   $CI->load->helper('gen_string');
			   //$CI->load->helper('my_upload'); //ใช้สำหรับ upload รูปภาพ

	}
	function  test()//ใช้สำหรับทดสอบ code ต่าง  EXT,js,jquery
	{
			 $this->load->view('testcode/test');
			 // $this->load->view('testcode/testext');
	}
	function   load_xml_php1()  //ใช้สำหรับ load ค่าโดยตรงจาก folder นอก
	{
				$xml = simplexml_load_file("".base_url()."xml_file/test.xml");  //xml_file  เป็นที่เก็บไฟล์ xml
				echo $xml->getName() . "<br />";  //แสดง   node 1 ชื่อ  note
				 foreach($xml->children() as $child) 
				  { 
					   echo $child->getName() . ": " . $child . "<br />"; 
					 // echo $child->getName();
					  // echo  $child;
					
				  } 
	}
	
	function   load_xml_modul1() //ทดสอบโหลดค่า xml  จาก modul
	{
	           $path=$this->xml_file1->example1();
				$movies = new SimpleXMLElement($path);
				echo $movies->movie[0]->plot;
	}



//======= JSON =====================
function  load_form()
{
        $this->load->view('testcode/getJSON1');
}	
function    demo_ajax_json()
{
	      $query=$this->db->get('tb_pr');
          foreach( $query ->result() as $row)
		  {
		         $arr[] = $row;
		  }
		      echo  $result = json_encode($arr);  // ตัวนี้จะใช้งาน
			
}

}//end class

?>

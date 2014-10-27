<?php  ob_start(); ?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Ajax extends CI_Controller {

	var  $title=" .::  HN  system ::. ";
	var  $login_title=" .::  Login  HN  system ::. ";
	var  $title_admin="ระบบ backoffice  กลุ่มงานสร้างเสริมสุขภาพ โรงงพยาบาลขอนแก่น";
	var   $limit_list=8; //จำนวน limit  รายการต่อหน้าที่แสดงใน HOME
	//var   $limit=$this->menusystem->fix_limit();
	function __construct()
	{
		      parent::__construct();
               // $this->load->helper('url'); set เป็น auto แล้ว
			   $this->load->helper('html');
			   $this->load->helper('security');
			  // $this->load->library('encrypt');
			  // $this->load->library('session');
			 // $this->load->model('blogquery');
			   $this->load->model('querymodels');
			   $this->load->model('menusystem');
			    $this->load->model('pr_models');
			     $this->load->model('photoallbumdels');  //
		           $this->load->model('selectmodel'); 
				 $this->load->model('autocomplete'); 
				 
			   $CI =& get_instance();  //การใช้ CI
			   $CI->load->helper('gen_string');
			   
	}

##------------ example 1-------------------
	function  ajax_wait()//รอสำหรับโหลดหน้าโปรแกรม หมุนติ้วๆ
	{
	     $this->load->view('ajax/ajax_complete');
	}
	function  demo_ajax_load() 
	{
	   //echo " AJAX is the art of exchanging data with a server, and update parts of a web page - without reloading the whole page.";
	   echo "send to ajax complete";
	}
	
##------------ example 2 http://www.thaicreate.com/jquery/jquery-ajax-jquery-ajax.html-------------------	
	function  jQueryAjax1()//รอสำหรับโหลดหน้าโปรแกรม หมุนติ้วๆ
	{
	     $this->load->view('ajax/jQueryAjax1');
	}
	function  call_jQueryAjax1()
	{
			echo "name=".$_POST["name"]." , location=".$_POST["location"];
	}
##------------ example 3 ajaxComplete http://api.jquery.com/ajaxComplete/-------------------
    function  load_ajaxComplete()
	{
		$this->load->view('ajax/ajaxComplete2');
	}
		
##------------ example 4 -------------------
    function  ajax_serialize()
	{
		$this->load->view('ajax/ajax_serialize');
	}

    function  ajax_post()
	{
		$this->load->view('ajax/ajax_post');
	}
	
	
##-------ok--http://api.jquery.com/jQuery.post/- example นี้สามารถน้ำไปใช้ได้จริง จากการส่งค่าจากหน้า  ( AJAX )client > php server > client	
	function  ajax_post2()
	{
		$this->load->view('ajax/ajax_post2');
	}
	function  ajax_post_php()
	{
	    echo  $this->input->get_post('FirstName');
		echo "<br>";
		echo   $this->input->get_post('LastName');
		echo "<br>";
		echo   $this->input->get_post('telephone');
	}
	
##--------ok example  AJAX php  json --
    function  view_getjson()
	{
	   $this->load->view('ajax/getJSON');
	}
	function  getjson()
	{
	  ?>
                    { 
              "firstName": "John",
              "lastName": "Doe",
              "age": 25
                    }
      <?
	}
	function getjson_php()
	{
	     $query1=$this->db->get('province');
		 $json=array();
		 foreach($query1->result() as $row)
		 {
		    // $json[]=array( $row->PROVINCE_ID,$row->PROVINCE_NAME ) ;
			  $json[]=$row;
		 }
		 echo json_encode($json);
		 
	}
	function getjson_php2()
	{
			$arr = array('a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5);
			echo json_encode($arr);
	}
	
##==== example getScirpt http://www.w3schools.com/jquery/tryit.asp?filename=tryjquery_ajax_getscript	
	function view_getScript()
	{
	    $this->load->view('ajax/getScript');
	}
	function getScript()
	{
	   ?>
       		//alert("This JavaScript alert was loaded by AJAX");
            "<ul><li>testing getScript<li></ul>";
            
       <?
	}

	
}//end class 
?>	


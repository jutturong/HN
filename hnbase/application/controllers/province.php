<?php  ob_start(); ?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Province extends CI_Controller {

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
	
function  ck_login()  //ใช้ check การ login ของระบบ
{
					  //return    $this->check_login= "t";
					  return     $this->check_login=$this->menusystem->session_login();
}
	
function  call_province()//ค้นหาชื่อของพนักงาน
	{
		 if( 	 $this->ck_login()  ==   1    )  // echo    $this->ck_login();
			{		
				$term=$this->input->get_post("term");
				$field="PROVINCE_NAME";
				$tb="province";
	           	$query=$this->db->like($field,$term);
				 //$query2=$this->db->get('countries');
				 $query2=$this->db->get($tb);
				 foreach($query2->result() as $row)
				 {
				     	 $json[]=array(
									//'value'=> $row->country,
									'value'=> $row->$field,
									//'label'=>$row->country." - ".$row->id
									'label'=>$row->$field
										);
				 }
 					echo  json_encode($json);
			}
		 else
			{
							redirect('home/page_login');
			}
} 


function  call_province2()//ค้นหาชื่อของพนักงาน
	{
		 if( 	 $this->ck_login()  ==   1    )  // echo    $this->ck_login();
			{		
				$term=$this->input->get_post("term");
				$field="PROVINCE_NAME";
				$tb="province";
				//json_autocomplete_mo1
				$this->autocomplete->json_autocomplete($term,$field,$tb);
				//json_autocomplete_mo1($term,$field_id,$field_value,$tb)
			}
		 else
			{
				redirect('home/page_login');
			}
} 


	
}//end class
?>	


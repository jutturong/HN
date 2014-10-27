<?php    ob_start();    ?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Test extends CI_Controller {

	var  $title="กลุ่มงานสร้างเสริมสุขภาพ โรงงพยาบาลขอนแก่น";
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
			  
			   $CI =& get_instance();  //การใช้ CI
			   $CI->load->helper('gen_string');
	}

##=================  JSON with  mysql========================	
    function  test1()
	{
	          // $this->load->view('test/jqeury_test1');
	             $this->load->view('test/test');
	}
	function     demo_ajax_json() // function  ส่งค่า JSON
	{
				  ?>{
                        "CustomerID":"C001",
                        "Name":"Weerachai Nukitram",
                        "Email":"win.weerachai@thaicreate.com",
                        "CountryCode":"TH",
                        "Budget":"1000000",
                        "Used":"600000"
                        }<?PHP
	}
	function    db_json()
	{
	          // $query=$this->db->get('tb_user');
			   $query=$this->db->get('tb_new');  
	           foreach($query->result() as $row)
			   {
			            $arr[] = $row;
			   }
			    echo  $jsonresult = json_encode($arr);  // ตัวนี้จะใช้งาน
	}

##=================  JSON get script   PHP  ========================	
	 function  getScript()
	 {
	        $this->load->view('test/getScript');
	 }
	 function   demo_ajax_script()
	 {
	     ?>
	                 alert("This JavaScript alert was loaded by AJAX");
         <?PHP
	 }
	 function   getScript_serial()
	 {
	     ?>
	                  $("div").text($("form").serialize());
         <?PHP
	 }
	function   getScript_serializeArray()
	 {
	       $data_value=array();
		   ?>
	                 x=$("form").serializeArray();
                     $.each(x, function(i, field){
                            $("#results").append(field.name + ":" + field.value + " ");
                         					  
                                                               });
         <?PHP
	 }

	 
##=================jquery AJAX  serialize =============================	 
	 function  j_serialize()
	 {
	        $this->load->view('test/serialize');
	 }

##=================jquery AJAX  serializeArray()=============================	 
	 function  j_serializeArray()
	 {
	        $this->load->view('test/serializeArray');
	 }
##================ jQuery Callback Functions================
      function callback_function()
	 {
	        $this->load->view('test/callback_function');
	 }
	 
##================= jquery_POST==================
function jqeury_post()
{
      $this->load->view('test/jqeury_post');
}	
function  demo_ajax_gethint()
{
          $key=$this->input->get_post('suggest');
		if( $key != '' )
		{
		       $this->db->like('content', $key); 
			    $query_search=$this->db->get('tb_new');
				$ck_num=$query_search->num_rows();
			    if( $ck_num > 0 )
				{
				    
					 foreach($query_search->result() as $row)
					 {
					        echo  $row->title;
						
					 }
//					      $row= $query_search->row();
//						  echo  $row->title;
				}
		}
} 

##========== jquery_AJAX===========
	function  jquery_ajax()
	{
	      $this->load->view('test/jquery_ajax');
	}
	function  demo_test()  
	{
	?>
                <h2>jQuery and AJAX is FUN!</h2>
            <p id="p1">This is some text in a paragraph.</p>
	<?php
	} 
##============= EXT================
function   EXT_MessageBox()
{
      $this->load->view('test/EXT_MessageBox');

}	 

}
?>
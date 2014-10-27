<?php  ob_start(); ?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home extends CI_Controller {

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
	

	function index() //หน้าหลักของโปรแกรม //ยังไม่สร้าง check login
	{
	     //$this->load->model('blogmodel');
	    // $data['title']="กลุ่มงานสร้างเสริมสุขภาพ โรงงพยาบาลขอนแก่น";
//		     $data['title']=$this->title;
//			 $data['login_hn']=$this->login_title;
		 //$data['arr_topmenu']=array('หน้าหลัก'=>1,'ข้อมูลกลุ่มงานสร้างเสริมสุขภาพ'=>2,'สื่อการเรียนรู้'=>3);
		   //$data['link_homepage']=$this->querymodels->link_homepage();
            // $this->load->view('home',$data);   //ของเดิม
			// $this->load->view('login_hn',$data);   //ของเดิม
//			 $this->load->view('login_system',$data);   //ของเดิม
			
		     //$this->load->view('t1',$data);   //ทดสอบ bootstrap
		//   $this->load->view('home_ext',$data); //extjs
	     //$this->load->view('contacts',$data);
             //$this->load->view('load_content',$data);
             //$this->load->view('admin/login',$data);
			 
			 ## modify ##
//			 $data['title']=$this->title;
//			 $data['login_hn']=$this->login_title;
//			 $this->load->view('login_system',$data);   //ของเดิม
				redirect('home/page_login');

	}
	
	function  test_autocom()  //หน้าหลัก load autocomplete
	{
	    // $this->load->view('test_jquery_autocomplete'); //test demo 1
		 $this->load->view('form_autocom2');
	}
	
	function  json_test2()//ตัวอย่างนี้ใช้งานได้จริง
	{
				 //$term=$_GET["term"];
				 $term=$this->input->get_post("term");
				 $query=mysql_query("SELECT * FROM countries where country like '%".$term."%' order by id ");
				 $json=array();
				 
					while($student=mysql_fetch_array($query))
					{
						 $json[]=array(
									'value'=> $student["country"],
									'label'=>$student["country"]." - ".$student["id"]
										);
  				  }
						 echo json_encode($json);
	}
	
	function  json_test3()//ตัวอย่างนี้ใช้งานได้จริง
	{//begin
				 //$term=$_GET["term"];
				 $term=$this->input->get_post("term");
				 //$query="SELECT * FROM countries where country like '%".$term."%' ";
				 $query=$this->db->like('country',$term);
				 //$query2=$this->db->query($query);
				 $query2=$this->db->get('countries');
				 foreach($query2->result() as $row)
				 {
				     	 $json[]=array(
									//'value'=> $row->country,
									'value'=> $row->country,
									//'label'=>$row->country." - ".$row->id
									'label'=>$row->country
										);
				 }
						 echo json_encode($json);
	}//end
##---------------- ใช้สำหรับทดสอบ AJAX------------	
	function  ajax_wait()//รอสำหรับโหลดหน้าโปรแกรม หมุนติ้วๆ
	{
	     $this->load->view('ajax_complete');
	}
	function  demo_ajax_load() 
	{
	   echo " AJAX is the art of exchanging data with a server, and update parts of a web page - without reloading the whole page.";
	}
##---------------- ใช้สำหรับทดสอบ AJAX------------	
	function  json_test4()
	{
				$term=$this->input->get_post("term");
				$field="country";
				$tb="countries";
	            $this->autocomplete->json_autocomplete($term,$field,$tb);
	}
	function  call_person()//ค้นหาชื่อของพนักงาน
	{
		 if( 	 $this->ck_login()  ==   1    )  // echo    $this->ck_login();
			{		
				$term=$this->input->get_post("term");
				$field="country";
				$tb="countries";
	            $this->autocomplete->json_autocomplete($term,$field,$tb);
			}
		 else
			{
							redirect('home/page_login');
			}
	} 
	
	function  get_autocomplete()
	{//begin
						//$term = trim(strip_tags($_GET['term']));//retrieve the search term that autocomplete sends
						$term=$this->input->get_post('term');
						$qstring = "SELECT * FROM mytable WHERE mystring LIKE '%".$term."%'";
						//$result = mysql_query($qstring);//query the database for entries containing the term
						$result = $this->db->query($qstring);
//						while ($row = mysql_fetch_array($result,MYSQL_ASSOC))//loop through the retrieved values
//						{
//								$row['mystring']=htmlentities(stripslashes($row['mystring']));
//								$row['id']=(int)$row['id'];
//								$row_set[] = $row;//build an array
//						}

						foreach( $result->result() as $row)
						{
						      $send[]=$row;
						}
						      
							  $this -> output -> set_header('Content-Type: application/json; charset=utf-8');
							  echo json_encode($send);//format the array into json data	}//end
	}
	
	function autocomplete()
			{
				//$this->load->model('model','get_data');
				//$query= $this->get_data->get_autocomplete();
				$qstring = "SELECT * FROM mytable WHERE mystring LIKE '%".$term."%'";
				$result = $this->db->query($qstring);
				foreach($result->result() as $row):
					echo "<li id='$row->id'>".$row->id."</li>";
				endforeach;    
			} 

	
	 function ajax_scholarshipNames() 
    {
        $this -> load -> model('querymodels');
        $post = $this -> input -> post();
        $data = $this -> querymodels -> scholarships($post);
        foreach ($data as $d) {
            $value['myData'][] = array(
                'scholID' => $d["id"],
                'scholName' => $d["country"]
            );
        }
        $this -> output -> set_header('Content-Type: application/json; charset=utf-8');
        echo json_encode($value);
    }
	
function suggestions()
{
	$this->load->model('querymodels');
	$term = $this->input->post('term',TRUE);

	if (strlen($term) < 2) break;

	$rows = $this->autocomplete_model->GetAutocomplete(array('keyword' => $term));

	$json_array = array();
	foreach ($rows as $row)
		 array_push($json_array, $row->mystring);

	echo json_encode($json_array);
}
	
	function source_autocomplete()
	{
	       //$q1="";
		   $q1=$this->db->get('mytable');
		   //$results=array();
		   foreach($q1->result() as $row)
		   {
		  			$results[] = $row;
		   }
		  echo json_encode($results);
	}
	
	
	
	
		function  ck_login()  //ใช้ check การ login ของระบบ
			{
					  //return    $this->check_login= "t";
					  return     $this->check_login=$this->menusystem->session_login();
			}



	function  load_content() //ยังไม่สร้าง check login
	{
        if( 	 $this->ck_login()  ==   1    )  // echo    $this->ck_login();
			{	 //if    ck
			  $link=$this->uri->segment(3);
              $data['title']=$this->title;
			  
			  switch( $link )
			  {
//##--- ประวัติพนักงาน--				 
				 case 1:
				 {
					  $data['content']="person/person_form";
					  $data['fieldset']="บันทึกประวัติพนักงาน";
					  break;
				  }
				  case 2:
				  {
				  	  $data['content']="person/relation_form";
				  	  $data['fieldset']="บันทึกประวัติที่เกี่ยวข้อง";
				 	  break;
				  }
				  case 3:
				  {
				      //person_search_form.php
					  $data['content']="person/person_search_form";
				  	  $data['fieldset']="บันทึกประวัติที่เกี่ยวข้อง";
					   break;
				  }
				  case 4: //ข้อมูลทั้งหมด
				  {
				  
				  
				  }
//##--- แนบเอกสารที่เกี่ยวข้อง--			
				  case 5://แนบเอกสารที่เกี่ยวข้อง
				  {
				      $data['content']="document/form_document";
				  	  $data['fieldset']="เอกสารที่เกี่ยวข้อง";
  					 break;
				  }	
//##--- ประสพการณ์ทำงาน--		
				  case 6:
				  {
				      $data['content']="";
				  	  $data['fieldset']="";
  					 break;
				  }

//##--- หนังสือเดินทางและวีซ่า--	
				  case 7:
				  {
				      $data['content']="";
				  	  $data['fieldset']="";
  					 break;
				  }	
//##--- ขออนุญาตทำงาน--	
				  case 8:
				  {
				      $data['content']="permission/form_permission";
				  	  $data['fieldset']="เพิ่มข้อมูลขออนุญาติทำงาน";
  					 break;
				  }	
//##--- ขออนุมัติทำงาน--	
				  case 9:
				  {
				      $data['content']="authorization/form_authorization";
				  	  $data['fieldset']="ขออนุมัติทำงาน";
  					 break;
				  }
//##--- ประกันสังคม--	
				  case 10:
				  {
				      $data['content']="social/form_social";
				  	  $data['fieldset']="เพิ่มข้อมูลประกันสังคม";
  					 break;
				  }	
//##--- ข้อมูลวันลา,ลากิจ,ขาด--	
				  case 11:
				  {
				      $data['content']="leave/form_leave";
				  	  $data['fieldset']="ข้อมูลวันลา,ลากิจ,ขาด";
  					 break;
				  }	
//##--- ความสามารถพิเศษ--	
				  case 12:
				  {
				      $data['content']="talent/form_talent";
				  	  $data['fieldset']="ความสามารถพิเศษ";
  					 break;
				  }	
				  	
	
				  				  
				  default:
				  {
				  
				  
				  }
				  
			  }
			  
              $this->load->view('home',$data);   //ของเดิม
		   }
		   else
		   {
		        redirect('home/page_login');
		   }	  
               
	}
	
        function  select_test()//ใช้ทดสอบ remote combobox json
        {//begin function
            $dataDB = array(
				array(
					"name"=>"MySQL",
					"desc"=>"The world's most popular open source database",	
					"logo"=>"mysql.png"
				),
				array(
					"name"=>"PostgreSQL",
					"desc"=>"The world's advanced open source database",					
					"logo"=>"postgresql.png"
				),
				array(
					"name"=>"Oracle",
					"desc"=>"The world's largest enterprise software company",
					"logo"=>"oracle.png"				
				),
	);
	
	$o = array(
			"num"=>count($dataDB),			
			"data"=>$dataDB
		);
	echo json_encode($o);
        
        }//end function
        
	function   test_json()
	{
        ?>{"results":207,"telai":[{"telaio":"ZAR93200001271042"},{"telaio":"ZLA84000001738127"},{"telaio":"VF3WC9HXC33751301"},{"telaio":"W0L0AHL3555247737"}]}<?PHP
	}
	
	
	
        function  page_login() //โหลดหน้า login
        {
             //$data['title']="กลุ่มงานสร้างเสริมสุขภาพ โรงงพยาบาลขอนแก่น";
			  //$data['title_admin']=$this->title_admin;
			  $data['title_admin']=$this->title_admin;
			  $data['login_hn']=$this->title_admin;
              $data['footer']="  กลุ่มงานส่งเสริมสุขภาพโรงพยาบาลศูนย์ขอนแก่น | Power by จัตุรงค์  เจริญฤทธิ์";
			  $sess_checklogin=array(
										                    'sess_name'=>'',
															'sess_lastname'=>'',
															'sess_login'=>0
										);
			 $this->session->unset_userdata($sess_checklogin);							
             $this->session->sess_destroy();
             //$this->load->view('admin/login',$data);
			// $this->load->view('admin/login',$data);
			 $this->load->view('login_system',$data);  
			 
			 //test_jquery_autocomplete.php  //test autocomplete
        }
		function  checklogin()// check login  เข้าสู่ระบบ backoffice
		{
		      $user=$this->input->get_post('user');
			  $ps=$this->input->get_post('password');
			  $ps=do_hash($ps,'md5');
			  
			  
			   $query=$this->db->get_where('tb_user',array('user'=>$user,'password'=>$ps,'user_enable'=>1));  //user_enable 1=enable,0=disable
			   $num_check=$query->num_rows();  //check  login
			   //$num_check=0;
			    if(  $num_check == 1  )
				{
							    $row=$query->row();
								         $user_name=$row->name;
								         $user_lastname=$row->lastname;
										 $id_user=$row->id_user;
										
										$sess_checklogin=array(
										                    'sess_name'=>$user_name,
															'sess_lastname'=>$user_lastname,
															'sess_login'=>1,
															'sess_id_user'=>$id_user
										);
										
							       // $this->blogquery->query1(); //test การใช้ model
									$data['leftmenu']='';
									$data['right_content']="";
									
								    $this->session->set_userdata($sess_checklogin);  //session for login
									$data['title_admin']=$this->title_admin;
									 $data['title']=$this->title;
									$data['headleftmenu']="-: ระบบบริหารจัดการ";
									 $data['left1']="+ เพิ่มข่าวสาร";
									 $data['left2']="+ แก้ไข / ลบ (แสดงเนื้อหาทั้งหมด)";
									 $data['admin_content']="admin/news/insert_new";
									// $this->load->view('admin/home_admin2',$data);
								 $this->load->view('home',$data);
			     }
				 else
				 {
				          $this->page_login();
				 }
		}
		function  linkmenu()// link เพื่อเชื่อมโยงรายการ menu
		{
		      // $data['title']=$this->title;
			   $id_menu=$this->uri->segment(3);
			   switch($id_menu)
			   {
			        case 1: //หน้าหลัก
                                {
                                    $this->index();
								  break;
                                }
                                case 2: //ข้อมูลกลุ่มงานสร้างเสริมสุขภาพ
                                {

                                  break;
                                }
                                case 3: //สื่อการเรียนรู้
                                {
                                  break;
                                }
								case 4: //บทความ
								{
								   break;
								}
								case 5:  //คลังสุขภาพ
								{
								   break;
								}
								case 6:  //เกี่ยวกับเรา
								{
								     $data['title']=$this->title;
									 $this->load->view('contacts',$data);
								   break;
								}
								case 7 :  //backoffice  Administrator
								{
								      //$this->index();
									    $this->page_login();
									    break;
								}
								default :
								{
									 $this->index();
								     break;
								}
			   
			   }
		
		}//end  function  
		
//##------------------------------------- หน้าหลัก-------------------------------------------------		
		function   link_read_new()//อ่านข่าวรายละเอียด  อ่านจากหน้าหลักที่คลิกเข้ามา
		{
				  $id_tb_new=$this->uri->segment(3);
			 if( strlen( $id_tb_new) > 0 )
			 {	  
				  $query=$this->db->get_where('tb_new',array('id_tb_new'=>$id_tb_new));
				  $row=$query->row();
				  $data['title']=$row->title;
			      $data['content']=$row->content;
				  $data['new_picture']=$row->new_picture; 
				  //echo  $title=$row->title;
				  $this->load->view('load_content',$data); 
			 }	    
		}
		function   new_read_all()//อ่านข่าวทั้งหมดจากหน้าหลัก  ในหัวข้อ  >>อ่านทั้งหมด
		{
		        //$tb=trim($this->uri->segment(3));
				$data['title']="อ่านข่าวสารกลุ่มงานสร้างเสริมสุขภาพทั้งหมด";
				//$this->querymodels->query_new_all_content(); 
				
					  $data['tb']="tb_new";  //ชื่อ table
					  $data['id']="id_tb_new";  //ชื่อ  id  ของ table
					  //echo  $this->menusystem->list_limit();
					  $data['limit']=$this->limit_list;  //จำนวนรายการสูงสุดต่อหน้า (var)
					 //   $data['limit']=$this->menusystem->list_limit();  //จำนวนรายการสูงสุดต่อหน้า (var)
					  $data['ofset']=0;
					  
					  $data['link_control']= base_url()."index.php/home/change_page";  //ตัวแปรในการส่งไป function   home/
					  $data['id_enable']='new_enable';   //ค่ามีแสดงผลได้ โดย admin  สั่งให้แสดงผล
					  $data['va_enable']=1;
					  
                    //  $data['load_content']=$this->querymodels->query_new_all_content($tb,$id,$limit,$ofset);   

			    $this->load->view('load_all_content',$data);  
		}
		
		function   photo_all()//อ่านข่าวทั้งหมดจากหน้าหลัก  ในหัวข้อ  >>อ่านทั้งหมด
		{
				$data['title']=$this->title;
                     $data['dir_file1']="photo/photo1";  //ตัวแปร
					 //jquery_lightbox/photos/image5.jpg
					 $data['dir_file2']="jquery_lightbox/photos/photo1";
					 $data['dir_file3']="photo/photo1";
					 $data['dir_file4']="photo/photo2";
					 //$data['dir1']=$this->photoallbumdels->directroy($dir_file1);
				    $this->load->view('load_all_photo',$data);  
		}
				
	  function   path_photo()//อ่านข่าวทั้งหมดจากหน้าหลัก  ในหัวข้อ  >>อ่านทั้งหมด
		{
				$data['title']=$this->title;
//                     $data['dir_file1']="photo/photo1";  //ตัวแปร
//					 $data['dir_file2']="jquery_lightbox/photos/photo1";
//					 $data['dir_file3']="photo/photo1";
//					 $data['dir_file4']="photo/photo2";
				    $folder=$this->uri->segment(3);
					 if(   $folder   == 1  )
					 {
							 $data['album']="photo/photo1";
					 }
					 elseif(    $folder   == 2    )
					 {
							 $data['album']="photo/photo2";
					 }
					 elseif(    $folder   == 3    )
					 {
							 $data['album']="photo/photo3";
					 }

				   // $this->load->view('load_all_photo',$data);  
					//$data['ph1']="photo/photo1";
					 $this->load->view('photo_folder',$data);  
		}
		
		function   change_page()//เขียนขึ้นมาเพื่อเปลี่ยนหน้า   
		{
		              $data['title']="อ่านข่าวสารกลุ่มงานสร้างเสริมสุขภาพทั้งหมด";
		              //$this->load->view('load_all_content',$data);
			          $page=$this->input->get_post('page');  //หน้าที่ต้องการให้แสดงส่งมา  
				      if(  $page == '' )
					 {        $page=$this->uri->segment(3);       }
					//  $list_limit=$this->input->get_post('list_limit');  //จำนวนสูงสุดที่แสดงได้ต่อ/หน้า
					  $list_limit=$this->limit_list;  //จำนวนสูงสุดที่แสดงได้ต่อ/หน้า
				 	  $data['tb']="tb_new";  //ชื่อ table
					  $data['id']="id_tb_new";  //ชื่อ  id  ของ table
					  $data['limit']=$this->limit_list;  //จำนวนรายการสูงสุดต่อหน้า
					  //$data['ofset']=0;
                      $data['ofset']=calc_ofset_page($page,$list_limit);  // helper  เขียนเอง  เรียกจาก  gen_string  ส่งค่า offset
					 
					  $data['link_control']= base_url()."index.php/home/change_page";  //ตัวแปรในการส่งไป function   home/
					  $data['id_enable']='new_enable';   //ค่ามีแสดงผลได้ โดย admin  สั่งให้แสดงผล
					  $data['va_enable']=1;
			         $this->load->view('load_all_content',$data);  
		}
//##====================== PR ============================================
		function   link_read_pr()//อ่านข่าวรายละเอียด  อ่านจากหน้าหลักที่คลิกเข้ามา
		{
				  $id_tb_pr=$this->uri->segment(3);
			 if( strlen( $id_tb_pr) > 0 )
			 {	  
				  $query=$this->db->get_where('tb_pr',array('id_tb_pr'=>$id_tb_pr));
				  $row=$query->row();
				  $data['title']=$row->title;
			      $data['content']=$row->content;
				  $data['pr_picture']=$row->pr_picture; 
				  //echo  $title=$row->title;
				  $this->load->view('load_content',$data); 
			 }	    
		}
		
		
		
	  function   pr_read_all()//อ่านข่าวทั้งหมดจากหน้าหลัก  ในหัวข้อ  >>อ่านทั้งหมด
		{
		        //$tb=trim($this->uri->segment(3));
				$data['title']="อ่านข่าวสารกลุ่มงานสร้างเสริมสุขภาพทั้งหมด";
				//$this->querymodels->query_new_all_content(); 
				
					  $data['tb']="tb_pr";  //ชื่อ table
					  $data['id']="id_tb_pr";  //ชื่อ  id  ของ table
					  //echo  $this->menusystem->list_limit();
					  $data['limit']=$this->limit_list;  //จำนวนรายการสูงสุดต่อหน้า (var)
					 //   $data['limit']=$this->menusystem->list_limit();  //จำนวนรายการสูงสุดต่อหน้า (var)
					  $data['ofset']=0;
					  
					  $data['link_control']= base_url()."index.php/home/change_page";  //ตัวแปรในการส่งไป function   home/
					  $data['id_enable']='pr_enable';   //ค่ามีแสดงผลได้ โดย admin  สั่งให้แสดงผล
					  $data['va_enable']=1;
			         $this->load->view('pr_load_all_content',$data);  
		}

//================= เนื้อหาบทความจาก article========
		function   link_read_article()//อ่านข่าวรายละเอียด  อ่านจากหน้าหลักที่คลิกเข้ามา
		{
				  $id_tb_pr=$this->uri->segment(3);
			 if( strlen( $id_tb_pr) > 0 )
			 {	  
				  $query=$this->db->get_where('tb_content_article',array('id_content_article'=>$id_tb_pr));
				  $row=$query->row();
				  $data['title']=$row->title;
			      $data['content']=$row->content;
				  $data['picture_content_article']=$row->picture_content_article; 
				  //echo  $title=$row->title;
				  $this->load->view('load_content',$data); 
			 }	    
		}
		
//================= แสดงเนื้อหาจากหน้าหลักจากการเลือก tab menu========		
		function   link_read_content()//อ่านข่าวรายละเอียด  อ่านจากหน้าหลักที่คลิกเข้ามา
		{
				 // $id_tb_pr=$this->uri->segment(3);
				  $id_article=$this->uri->segment(3);
				  $tb="tb_content_article";
			 if( strlen( $id_article  ) > 0 )
			 {	  
				  //$query=$this->db->get_where('tb_content_article',array('id_content_article'=>$id_tb_pr));
				  $this->db->order_by('id_content_article','desc');
				 // $this->db->limit(0,1);
				  $query=$this->db->get_where($tb,array('id_article'=>$id_article,'content_enable'=>1),1,0);
				  $count_row=$query->num_rows();
						  if(  $count_row > 0 )
						  {
										  $row=$query->row();
										  $data['title']=$row->title;
										  $data['content']=$row->content;
										  $data['picture_content_article']=$row->picture_content_article; 
										  //echo  $title=$row->title;
										 $this->load->view('load_content',$data); 
						  }				 
			 }	    
		}


		function  show_404()
		{
		            echo "<h1>404 - not found</h1>";
		}
   		

}//end class
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */


?>
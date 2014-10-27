<?php  ob_start(); ?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home extends CI_Controller {

	var  $title=" HMP-Recruitment System ";
	var  $login_title="HMP-Recruitment System";
	var  $title_admin="ระบบ backoffice บริหารจัดการ";
	var   $limit_list=10; //จำนวน limit  รายการต่อหน้าที่แสดงใน HOME
	//var   $limit=$this->menusystem->fix_limit();
	function __construct()
	{
		      parent::__construct();
               // $this->load->helper('url'); set เป็น auto แล้ว
			   $this->load->helper('html');
            $this->load->helper('form');
			   $this->load->helper('security');
			   $this->load->helper('date');
			  // $this->load->library('encrypt');
			  // $this->load->library('session');
			 // $this->load->model('blogquery');
			   $this->load->helper('gen_string_helper');
			   
			   $this->load->model('querymodels');
			   $this->load->model('menusystem');
			    $this->load->model('pr_models');
			     $this->load->model('photoallbumdels');  //
		           $this->load->model('selectmodel'); 
				 $this->load->model('autocomplete'); 
                                 
                                 //this->load->library('encrypt');
                                 
                                 $this->load->library('table');
				// $this->load->library('javascript');
                                 
				//$this->load->model('tableQuerymodel');  // TableQuerymodel //table สำหรับ query จาก table ต่างๆ
				$this->load->model('tbload'); 
			   $CI =& get_instance();  //การใช้ CI
			   $CI->load->helper('gen_string');
                                        $CI->load->library('encrypt');
                                        $CI->load->model('documentmodels');
			   
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
	
	function  test_home()
	{
	     $this->load->view('test_home');
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
				//$field="country";
                                $field="name";
                                //$field_id="id_tb_person";
				//$tb="countries";
                                $tb="tb_person";  //ของเดิม
                                // $tb="tb_employee";  //modify
                                // $this->autocomplete->json_autocomplete($term,$field,$tb);
                                $this->autocomplete->json_autocomplete_person($term,$field,$tb);//ตัวอย่างนี้ใช้งานได้จริง
			}
		 else
			{
							redirect('home/page_login');
			}
	} 
        
        function  call_employee()//ค้นหาชื่อของพนักงาน
	{
		 if( 	 $this->ck_login()  ==   1    )  // echo    $this->ck_login();
			{		
				$term=$this->input->get_post("term");
                                                   $field="firstname";                                                                 
                                                   $tb="tb_employee"; 
                                                   $va="id_employee";
                                               //    $lab=$row->firstname;
                                 $fr="firstname";
                                 $ls="lastname";
                                                  // $this->autocomplete->json_autocomplete_person($term,$field,$tb);//ตัวอย่างนี้ใช้งานได้จริง
			$this->autocomplete->json_autocomplete_employee($term,$field,$tb,$va,$fr,$ls);                                               
                        }
		 else
			{
							redirect('home/page_login');
			}
	}
        
        
        function  call_nickname()//ค้นหาชื่อของพนักงาน
	{
		 if( 	 $this->ck_login()  ==   1    )  // echo    $this->ck_login();
			{		
				$term=$this->input->get_post("term");
				//$field="country";
                                $field="nickname";
                                //$field_id="id_tb_person";
				//$tb="countries";
                                $tb="tb_person";
                                // $this->autocomplete->json_autocomplete($term,$field,$tb);
                                $this->autocomplete->json_autocomplete_call($term,$field,$tb);//ตัวอย่างนี้ใช้งานได้จริง
			}
		 else
			{
							redirect('home/page_login');
			}
	}
        function  call_id_person()//ค้นหาชื่อของพนักงาน
	{
		 if( 	 $this->ck_login()  ==   1    )  // echo    $this->ck_login();
			{		
				$term=$this->input->get_post("term");
				//$field="country";
                                $field="id_peson";
                                //$field_id="id_tb_person";
				//$tb="countries";
                                $tb="tb_person";
                                // $this->autocomplete->json_autocomplete($term,$field,$tb);
                                $this->autocomplete->json_autocomplete_call($term,$field,$tb);//ตัวอย่างนี้ใช้งานได้จริง
			}
		 else
			{
							redirect('home/page_login');
			}
	}
        function  call_id_passport()//ค้นหาชื่อของพนักงาน
	{
		 if( 	 $this->ck_login()  ==   1    )  // echo    $this->ck_login();
			{		
				$term=$this->input->get_post("term");
				//$field="country";
                                $field="id_passport";
                                //$field_id="id_tb_person";
				//$tb="countries";
                                $tb="tb_person";
                                // $this->autocomplete->json_autocomplete($term,$field,$tb);
                                $this->autocomplete->json_autocomplete_call($term,$field,$tb);//ตัวอย่างนี้ใช้งานได้จริง
			}
		 else
			{
							redirect('home/page_login');
			}
	}
        function  call_id_code_person()//ค้นหาชื่อของพนักงาน
	{
		 if( 	 $this->ck_login()  ==   1    )  // echo    $this->ck_login();
			{		
				$term=$this->input->get_post("term");
				//$field="country";
                                $field="id_code_person";
                                //$field_id="id_tb_person";
				//$tb="countries";
                                $tb="tb_person";
                                // $this->autocomplete->json_autocomplete($term,$field,$tb);
                                $this->autocomplete->json_autocomplete_call($term,$field,$tb);//ตัวอย่างนี้ใช้งานได้จริง
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

	//if (strlen($term) < 2) break;

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
                function  ck_permission() //ตรวจสอบสิทธิ์การ login 1=admin,2=user
                {
                    return    $this->menusystem->session_id_user();
                    
                }
                
##---- ปรับปุรงระบบใหม่หลังจากได้แบบฟอร์มมาใหม่ ----------------
function  new_form_person() //โหลด form content ใหม่
{//being function
   if(  $this->ck_login() == 1 )
     {
//##--- ประวัติพนักงาน--
         $link=$this->uri->segment(3);	
         $data['title']=$this->title;
                                 switch($link)
                                 {//begin switch
                                 case 1:
                                 {
			 $data['content']="person/new_form1";
                                       // $data['content']="person/person_form"; //ของเดิม
		              $data['fieldset']="Form Record (แบบบันทึกข้อมูลพนักงาน)";
                                       break;
                                 }
                                 default:
                                 {
                                     
                                 }
                                     
                                 }//end switch
		     
       $this->load->view('home',$data);   //โหลดหน้าหลัก         
            
  
     }  
     else
     {
         redirect('home/page_login');
     }
}//end function 
function insert_employee()//บันทึกข้อมูล tb_employee
{
   if(  $this->ck_login() == 1 )
   {
       
          
        echo  $firstname=trim($this->input->get_post('firstname'));
       echo br();
       echo  $lastname=trim($this->input->get_post('lastname'));
       echo br();
       echo  $callname=trim($this->input->get_post('callname'));
       echo br();
             $birthday=trim($this->input->get_post('birthday'));
              
       echo  $conv_birthday= convert_eng_DMY($birthday); //convert to ENG
       echo br(); 
       echo  $birth_place=trim($this->input->get_post('birth_place'));
       echo br();  
       echo  $tr38_1=trim($this->input->get_post('tr38_1'));
       echo br();
       echo  $address=trim($this->input->get_post('address'));
       echo br();
       echo  $mobile=trim($this->input->get_post('mobile'));
       echo br();
       echo $friends_relatives=trim($this->input->get_post('friends_relatives'));
       echo br();
       echo $mobile_contact=trim($this->input->get_post('mobile_contact'));
       echo br();
       echo $notice=trim($this->input->get_post('notice'));
       echo br();
       echo  $PASSPORT_NO=trim($this->input->get_post('PASSPORT_NO'));
       echo br();
         $iss_passport=trim($this->input->get_post('iss_passport'));
       echo $conv_iss_passport=convert_eng_DMY($iss_passport);
       echo br();
       
       $exp_passport=trim($this->input->get_post('exp_passport'));
       echo  $conv_exp_passport=convert_eng_DMY($exp_passport);
        echo br();
       
        $iss_visa=trim($this->input->get_post('iss_visa'));
        echo  $conv_iss_visa=convert_eng_DMY($iss_visa);
        echo br();
        
        $exp_visa=trim($this->input->get_post('exp_v'));
        echo $conv_exp_visa=convert_eng_DMY($exp_visa);
        echo br();
        
        
        
        
          $register_date=trim($this->input->get_post('register_date'));
          echo $conv_register_date=convert_eng_DMY($register_date);
          echo br();
          
           $next_register_date=trim($this->input->get_post('next_register_date'));
          echo $conv_next_register_date=convert_eng_DMY($next_register_date);
          echo br();
       
          echo $hm_code=trim($this->input->get_post('hm_code'));
          echo br();
          
          echo $line_section=trim($this->input->get_post('line_section'));
          echo br();
          
             $start_work_date=trim($this->input->get_post('start_work_date'));
          echo  $conv_start_work_date=convert_eng_DMY($start_work_date);
           echo br();
           
           echo $work_permit=trim($this->input->get_post('work_permit'));
           echo br();
           
             $iss_date_workpermit=trim($this->input->get_post('iss_date_workpermit'));
             echo $conv_iss_date_workpermit=convert_eng_DMY($iss_date_workpermit);
             echo br();
             
             $exp_date_workpermit=trim($this->input->get_post('exp_date_workpermit'));
             echo $conv_exp_date_workpermit=convert_eng_DMY($exp_date_workpermit);
             echo br();
             
             echo $number_social_security=trim($this->input->get_post('number_social_security'));
             echo br();
             
              $date_signup=trim($this->input->get_post('date_signup'));
              echo $conv_date_signup=convert_eng_DMY($date_signup);
              echo br();
              
              //2014-09-08 05:16:34 format  //time_record
              $datestring = "%Y-%m-%d %H:%i:%s";
              $time = time();
              echo $time_record = mdate($datestring,$time);
              
          
       $data=array(
          //'id_employee'=>'NULL',
          'firstname'=>$firstname,
          'lastname'=>$lastname,
          'callname'=>$callname,
          'birth_date'=>$conv_birthday,
          'birth_place'=>$birth_place,
          'tr38_1'=>$tr38_1,
          'address'=>$address,
          'mobile'=>$mobile,
          'friends_relatives'=>$friends_relatives,
          'mobile_contact'=>$mobile_contact,
          'notice'=>$notice,
          'PASSPORT_NO'=>$PASSPORT_NO,
          'iss_passport'=>$conv_iss_passport,
          'exp_passport'=>$conv_exp_passport,   
          'iss_visa'=>$conv_iss_visa,
          'exp_visa'=>$conv_exp_visa,
          'register_date'=>$conv_register_date,
          'next_register_date'=>$conv_next_register_date,
          'hm_code'=>$hm_code,
          'line_section'=>$line_section,
          'start_work_date'=>$conv_start_work_date,
          'work_permit'=>$work_permit,
          'iss_date_workpermit'=>$conv_iss_date_workpermit,
          'exp_date_workpermit'=>$conv_exp_date_workpermit,
          'number_social_security'=>$number_social_security,
          'date_signup'=>$conv_date_signup,
          'time_record'=>$time_record
       );
       
           $tb="tb_employee";   
           $this->db->insert($tb,$data);
       
       
   }else {
        redirect('home/page_login');
   }
 
}
function  show_employee()//แสดงข้อมุลจากตารางหลังจากที่ทำการบันทึก
{
  if(  $this->ck_login() == 1 )
     {
         $tb="tb_employee";                 
          $data['content']="person/tb_employee";
          $data['title']=$this->title;
          $data['fieldset']="Form Record (แบบบันทึกข้อมูลพนักงาน)";     
          $this->db->order_by("id_employee","desc");
          $data['query']=$this->db->get($tb);
          $data['numrows']=$data['query']->num_rows();
          $this->load->view('home',$data);   //โหลดหน้าหลัก      
  }
  else
  {
      redirect('home/page_login');
  }
}
function  show_document() // แสดงข้อมูลของ document upload
{
  if(  $this->ck_login() == 1 )
     {
             // echo "testing";
             $id_employee=trim($this->uri->segment(3));          
             if( !empty($id_employee)  )
             {
                 $tb="tb_document";
                 $tb_join="tb_employee";
                 $eq= $tb.".id_tb_person=".$tb_join.".id_employee";
               $str="SELECT *  FROM  $tb  ";
               $str .=  "INNER JOIN  $tb_join";
               $str .=  "  ON  $eq ";
               $str .= "  WHERE   ".$tb.".id_tb_person=".$id_employee.";";
               $query= $this->db->query($str);
               $data['query']= $query;
               $check=$query->num_rows();
                     if( $check >= 1 )            
                     {
                         $data['title']=$this->title;   
                         $data['sum']=$check;
                         $this->load->view('document/detail_document1',$data);
                     }
                     else
                     {
                         echo " No file !!!";
                     }
             }
             else
             {
                 ?>
<script type="text/javascript">
   $function()
   {
        myWindow = window.open("", "myWindow", "width=200, height=100");
       myWindow.close();
   }
</script>
                <?PHP
             }
  }
  else
  {
      redirect('home/page_login');
  }
}//end function

function  update_tb_employee()
{//begin
     if(  $this->ck_login() == 1 )
     { 
          $tb="tb_employee";
          
          $id_employee=trim($this->input->get_post('id_employee'));  
        // echo br();
         $firstname=trim($this->input->get_post('firstname'));
       //echo br();
        $lastname=trim($this->input->get_post('lastname'));
       //echo br();
        $callname=trim($this->input->get_post('callname'));
       //echo br();
        
        
        $birth_place=trim($this->input->get_post('birth_place'));
       //echo br();  
        $tr38_1=trim($this->input->get_post('tr38_1'));
       //echo br();
       $address=trim($this->input->get_post('address'));
       //echo br();
       $mobile=trim($this->input->get_post('mobile'));
       //echo br();
       $friends_relatives=trim($this->input->get_post('friends_relatives'));
       //echo br();
       $mobile_contact=trim($this->input->get_post('mobile_contact'));
       //echo br();
       $notice=trim($this->input->get_post('notice'));
      // echo br();
        $PASSPORT_NO=trim($this->input->get_post('PASSPORT_NO'));
      // echo br();
         $hm_code=trim($this->input->get_post('hm_code'));
        //  echo br();
       $line_section=trim($this->input->get_post('line_section'));
          //echo br();
      $work_permit=trim($this->input->get_post('work_permit'));
           //echo br();
      $number_social_security=trim($this->input->get_post('number_social_security'));
            // echo br();     
       
        //  ####========= update  DATE tb_employee
        
       // Birth Date (วัน-เดือน-ปี เกิด)
        $birthday=trim($this->input->get_post('birthday'));
       $conv_birthday= convert_eng_DMY($birthday); //convert to ENG  
                                 $f_name="birth_date";
                                 $v_name=$conv_birthday;
                                 $id_update="id_employee";
                                 $id_value=$id_employee;
                                 echo br();
           if( $conv_birthday  != ""   )   
           {  
                $this->documentmodels->date_update($tb,$f_name,$v_name,$id_update,$id_value);    
           }    
      // echo br();
       
       
        $iss_passport=trim($this->input->get_post('iss_passport'));
        $conv_iss_passport=convert_eng_DMY($iss_passport);                          
                                 $f_name="iss_passport";
                                 $v_name=$conv_iss_passport;
                                 $id_update="id_employee";
                                 $id_value=$id_employee;                         
        if( $conv_iss_passport   != ""   )   
           {  
                $this->documentmodels->date_update($tb,$f_name,$v_name,$id_update,$id_value);    
           }   
       echo br();
       
       
       $exp_passport=trim($this->input->get_post('exp_passport'));       
       $conv_exp_passport=convert_eng_DMY($exp_passport);
                                 $f_name="exp_passport";
                                 $v_name=$conv_exp_passport;
                                 $id_update="id_employee";
                                 $id_value=$id_employee;                         
        if( $conv_exp_passport   != ""   )   
           {  
                $this->documentmodels->date_update($tb,$f_name,$v_name,$id_update,$id_value);    
           }   
       echo br();
        
       
        $iss_visa=trim($this->input->get_post('iss_visa'));
        $conv_iss_visa=convert_eng_DMY($iss_visa);
                                 $f_name="iss_visa";
                                 $v_name=$conv_iss_visa;
                                 $id_update="id_employee";
                                 $id_value=$id_employee;                         
        if( $conv_iss_visa   != ""   )   
           {  
                $this->documentmodels->date_update($tb,$f_name,$v_name,$id_update,$id_value);    
           }         
        echo br();
       
       $exp_visa=trim($this->input->get_post('exp_v'));
       $conv_exp_visa=convert_eng_DMY($exp_visa);
                                         $f_name="exp_passport";
                                 $v_name=$conv_exp_visa;
                                 $id_update="id_employee";
                                 $id_value=$id_employee;                      
        if( $conv_exp_visa   != ""   )   
           {  
                $this->documentmodels->date_update($tb,$f_name,$v_name,$id_update,$id_value);    
           }   
        echo br();
        

          $register_date=trim($this->input->get_post('register_date'));
          $conv_register_date=convert_eng_DMY($register_date);
                                 $f_name="register_date";
                                 $v_name=$conv_register_date;
                                 $id_update="id_employee";
                                 $id_value=$id_employee;                      
        if( $conv_register_date   != ""   )   
           {  
                $this->documentmodels->date_update($tb,$f_name,$v_name,$id_update,$id_value);    
           }        
          echo br();
          
          
           $next_register_date=trim($this->input->get_post('next_register_date'));
           $conv_next_register_date=convert_eng_DMY($next_register_date);
          //next_register_date
                                           $f_name="next_register_date";
                                 $v_name=$conv_next_register_date;
                                 $id_update="id_employee";
                                 $id_value=$id_employee;                      
        if( $conv_next_register_date  != ""   )   
           {  
                $this->documentmodels->date_update($tb,$f_name,$v_name,$id_update,$id_value);    
           }  
          echo br();
       


          
             $start_work_date=trim($this->input->get_post('start_work_date'));
            $conv_start_work_date=convert_eng_DMY($start_work_date);
          //start_work_date
                                 $f_name="start_work_date";
                                 $v_name=$conv_start_work_date;
                                 $id_update="id_employee";
                                 $id_value=$id_employee;                      
        if( $conv_start_work_date  != ""   )   
           {  
                $this->documentmodels->date_update($tb,$f_name,$v_name,$id_update,$id_value);    
           }  
           echo br();
           
       
           
           
             $iss_date_workpermit=trim($this->input->get_post('iss_date_workpermit'));
             $conv_iss_date_workpermit=convert_eng_DMY($iss_date_workpermit);
             //iss_date_workpermit
                                 $f_name="iss_date_workpermit";
                                 $v_name= $conv_iss_date_workpermit;
                                 $id_update="id_employee";
                                 $id_value=$id_employee;                      
        if(  $conv_iss_date_workpermit  != ""   )   
           {  
                $this->documentmodels->date_update($tb,$f_name,$v_name,$id_update,$id_value);    
           }  
             echo br();
             
             
             
             $exp_date_workpermit=trim($this->input->get_post('exp_date_workpermit'));
             $conv_exp_date_workpermit=convert_eng_DMY($exp_date_workpermit);
             //exp_date_workpermit
                                 $f_name="exp_date_workpermit";
                                 $v_name= $conv_exp_date_workpermit;
                                 $id_update="id_employee";
                                 $id_value=$id_employee;                      
        if(  $conv_exp_date_workpermit != ""   )   
           {  
                $this->documentmodels->date_update($tb,$f_name,$v_name,$id_update,$id_value);    
           }  
             echo br();
             
            
             
              $date_signup=trim($this->input->get_post('date_signup'));
              $conv_date_signup=convert_eng_DMY($date_signup);
              //date_signup
                                 $f_name="date_signup";
                                 $v_name= $conv_date_signup;
                                 $id_update="id_employee";
                                 $id_value=$id_employee;                      
        if(  $conv_date_signup != ""   )   
           {  
                $this->documentmodels->date_update($tb,$f_name,$v_name,$id_update,$id_value);    
           } 
              echo br();
              
              
              
         
        
           $data_update=array(   
          'firstname'=>$firstname, 
          'lastname'=>$lastname, 
          'callname'=>$callname,      
          'birth_place'=>$birth_place,
          'tr38_1'=>$tr38_1,
          'address'=>$address,
          'mobile'=>$mobile,
          'friends_relatives'=>$friends_relatives,
          'mobile_contact'=>$mobile_contact,
          'notice'=>$notice,
          'PASSPORT_NO'=>$PASSPORT_NO,
          'iss_passport'=>$conv_iss_passport,
          'hm_code'=>$hm_code,
          'line_section'=>$line_section,      
          'work_permit'=>$work_permit,
          'number_social_security'=>$number_social_security,
                                          );
          
                 $data['title']=$this->title;
                 $data['fieldset']="Update Record (แบบบันทึกข้อมูลพนักงาน)"; //PASS Iss. (วันที่ออกพาสปอร์ต )
               
                    $this->db->where('id_employee',$id_employee);
                    $check_data_update=$this->db->update($tb,$data_update); 
                    if(  $check_data_update )
                    {
                           echo "update complete";
                          // $this->load->view('import_jqueryui'); 
                    }
             
                          ?>
                          <script type="text/javascript">
                              //alert('test');
                              window.close();
                         </script>                   
                         <?php
                    
            //   redirect('home/update_employee/'.$id_employee);      
                    
         }
  else
  {
      redirect('home/page_login');
  } 
}//end 

function update_employee()//บันทึกข้อมูล tb_employee
{
   if(  $this->ck_login() == 1 )
     {  
             $id_employee=$this->uri->segment(3);
           //echo br();
             $data['id_employee']=$id_employee;
           $tb="tb_employee";
           $arr=array('id_employee'=>$id_employee);
           $query = $this->db->get_where($tb,$arr);
           $check=$query->num_rows();
             if( $check > 0 )
             {
                   $row=$query->row();
                 $data['firstname']=$row->firstname;
                 $data['lastname']=$row->lastname;
                 $data['callname']=$row->callname;
                 $data['birth_place']=$row->birth_place;
                 $data['tr38_1']=$row->tr38_1;
                 $data['address']=$row->address;
                 $data['mobile']=$row->mobile;
                 $data['friends_relatives']=$row->friends_relatives;
                 $data['mobile_contact']=$row->mobile_contact;
                 $data['notice']=$row->notice;
                 $data['PASSPORT_NO']=$row->PASSPORT_NO;
                 $data['iss_passport']=$row->iss_passport;
                 $data['hm_code']=$row->hm_code;
                 $data['line_section']=$row->line_section;
                 $data['work_permit']=$row->work_permit;
                 $data['number_social_security']=$row->number_social_security;
                 
                 
   
                 
                 
                 ##==== DATE ============
                  $birth_date=$row->birth_date;                         
                  $data['birth_date']=convert_thai_DMY($birth_date); //Birth Date (วัน-เดือน-ปี เกิด) :
                  $iss_passport=$row->iss_passport;               
                  $data['iss_passport']=convert_thai_DMY($iss_passport); //PASS Iss. (วันที่ออกพาสปอร์ต )
                  $exp_passport=$row->exp_passport;
                    $data['exp_passport']=convert_thai_DMY($exp_passport); //PASS Exp. (วันที่หมดอายุพาสปอร์ต ) :
                  
                   $iss_visa=$row->iss_visa;                 
                   $data['iss_visa']=convert_thai_DMY($iss_visa);//VISA Iss. (วันที่ออกวีซ่า ) 
                   $exp_visa=$row->exp_visa;                  
                   $data['exp_visa']=convert_thai_DMY($exp_visa); //VISA Exp. (วันที่หมดอายุวีซ่า ) :
                   
                   
                   $register_date=$row->register_date; //90 Report Date. (วันที่รายงานตัว ) 
                     $data['register_date']=convert_thai_DMY($register_date);
                   $next_register_date=$row->next_register_date;//Next 90 Report Date. (วันที่รายงานตัวครั้งต่อไป ) 
                      $data['next_register_date']=convert_thai_DMY($next_register_date);                  
                   $start_work_date=$row->start_work_date;//Start Work Date (วันที่เข้าทำงาน ) :
                     $data['start_work_date']=convert_thai_DMY($start_work_date);
                   $iss_date_workpermit=$row->iss_date_workpermit; //Work Permit Iss. Date (วันที่ขออนุญาตทำงน ) :
                    $data['start_work_date']=convert_thai_DMY($iss_date_workpermit);
                   $exp_date_workpermit=$row->exp_date_workpermit; //Work Permit Exp. Date (วันที่ใบอนุญาตทำงานหมดอายุ )
                    $data['exp_date_workpermit']=convert_thai_DMY( $exp_date_workpermit);
                   $date_signup=$row->date_signup; //(วันที่ขึ้นทะเบียน ) 
                    $data['date_signup']=convert_thai_DMY( $date_signup);
                   
             //   echo   $register_date=$row->register_date;
            //   echo br();    
                 
                 $data['title']=$this->title;
                 $data['fieldset']="Update Record (แบบบันทึกข้อมูลพนักงาน)"; //PASS Iss. (วันที่ออกพาสปอร์ต )
                 $this->load->view('person/update_employee',$data);
             }
     }
  else
  {
      redirect('home/page_login');
  } 
}//end 

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
				  case 3://ค้นหาข้อมูลเกี่ยวพนักงาน
				  {
				      //person_search_form.php
					  $data['content']="person/person_search_form";
				  	  $data['fieldset']="ค้นหาข้อมูลของพนักงาน";
                                      
					   break;
				  }
				  case 4: //โหลดข้อมูลของการกรอกประวัติพนักงานใน case1
				  {
                                          
                                    //  $count_list=2;
                                      
					 //##section1##
                                        //$this->db->order_by("id_tb_person", "desc");    
                                       // $data['query']=$this->db->get($data['tb']);
					// $data['content']="person/tb_person_form";
					// $data['fieldset']="ข้อมูลการกรอกประวัติของพนักงาน";
                                         //##section2##
                                         //$data['query']=$this->db->get($data['tb']);
                                         /*
                                       echo  $data['query_relation_person']=$this->db->query("select * from `tb_relation_person` 
                                                                                              left join
                                                                                              `tb_person`  on `tb_relation_person`.`id_tb_person` =`tb_person`.`id_tb_person`   
                                                                                                ");
                                          */ 
                                 
                                         $data['limit_list']=$this->limit_list;
                                         $limit_list=$this->limit_list;
                                         $data['tb']="tb_person"; 
                                          
                                          
                                 $send_page=$this->uri->segment(4);
                                 $data['send_page']=$this->uri->segment(4);
                                 if( empty($send_page) ||  $send_page == 'undefined' )
                                 {
                                     $page=0;
                                      $data['send_page']=1;
                                     
                                 }
                                 elseif( !empty($send_page) )
                                 {
                                      $cal_page1=$send_page*$limit_list;
                                      $page=$cal_page1-$limit_list;                                 
                                 }
                                   // echo br();     
                                     //echo $limit_list;        
                                        
                                         
                                         
                                         $this->db->order_by("id_tb_person", "desc"); 
                                         // $this->db->order_by("id_tb_person", "asc"); 
                                         //$this->db->limit(10, 20);
                                         // Produces: LIMIT 20, 10 (in MySQL. Other databases have slightly different syntax)
                                         //page คือ ลำดับที่
                                          
                                           
                                           //$this->tableQuerymodel->page_table($data['tb'],$limit_list,$name_select);
                                         
                                          
                                          $this->db->limit($limit_list,$page); //$limit_list คือจำนวนรายการต่อ page
                                         // $this->db->limit($limit_list,3); 
                                         $data['query_relation_person']=$this->db->get_where($data['tb'],array('person_enable'=>1));                          
					 $data['content']="person/tb_person_form";
					 $data['fieldset_relation']="ประวัติที่เกี่ยวข้องของพนักงาน";
                                         
				   break;
				  }
//##--- แนบเอกสารที่เกี่ยวข้อง--			
				  case 5://แนบเอกสารที่เกี่ยวข้อง
				  {
				      $data['content']="document/form_document";
				      $data['fieldset']="Add Document";
  					 break;
				  }	
//##--- ประสพการณ์ทำงาน--		
				  case 6:
				  {
				      $data['content']="experience/form_experience";
				  	  $data['fieldset']="ประสพการณ์ทำงาน";
  					 break;
				  }

//##--- หนังสือเดินทางและวีซ่า--	
				  case 7:
				  {
				      $data['content']="visa/form_visa";
				      $data['fieldset']="ข้อมูลหนังสือเดินทางและวีซ่า";
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
//##--- passport--	
				  case 13:
				  {
				      $data['content']="passport/form_passport";
				  	  $data['fieldset']="ความสามารถพิเศษ";
  					 break;
				  }
                                 case 14: //แสดงการค้นหาจากรายการ search ของบุคคล
                                 {
                                     /*
                                     $data['tb']="tb_person";
					 //##section1##
                                      $this->db->order_by("id_tb_person", "desc");    
                                     $data['query']=$this->db->get($data['tb']);
					 $data['content']="person/tb_person_form";
					 $data['fieldset']="ข้อมูลการกรอกประวัติของพนักงาน";
                                         //##section2##
                                         //$data['query']=$this->db->get($data['tb']);
                                         $data['query_relation_person']=$this->db->query("select * from `tb_relation_person` left join
`tb_person`  on `tb_relation_person`.`id_tb_person` =`tb_person`.`id_tb_person`");
					 $data['content']="person/tb_person_form";
					 $data['fieldset_relation']="ประวัติที่เกี่ยวข้องของพนักงาน";
                                      */
                                     
                                    $id_tb_person=$this->input->get_post('id_tb_person'); 
                                    if( is_numeric($id_tb_person) )
                                    {        
                                      $data['tb']="tb_person";
                                      $data['query']=$this->db->get_where($data['tb'],array('id_tb_person'=>$id_tb_person)); 
                                        // echo $check =  $data['query']->num_rows();
                                          $data['content']="person/tb_person_form";
                                          $data['fieldset_relation']="ประวัติที่เกี่ยวข้องของพนักงาน";
                                    }
                                    else
                                    {
                                        redirect('home/load_content/4');                                        
                                    }
                                    break;
                                 }
                                 case 15:  //search  ชื่อเล่น
                                 {
                                        $nickname=$this->input->get_post('nickname');
                                        if(!empty($nickname) )
                                        {
                                            $data['tb']="tb_person";
                                            $data['query']=$this->db->get_where($data['tb'],array('id_tb_person'=>$nickname)); 
                                            // echo $check =  $data['query']->num_rows();
                                            $data['content']="person/tb_person_form";
                                            $data['fieldset_relation']="ประวัติที่เกี่ยวข้องของพนักงาน";
                                        }
                                        else
                                        {
                                            redirect('home/load_content/4');
                                        }
                                        break;
                                 }
                                 case 16:  // search ID(ประกอบเอกสาร)
                                 {
                                        $id_peson=$this->input->get_post('id_peson');
                                        if(!empty($id_peson) )
                                        {
                                            $data['tb']="tb_person";
                                            $data['query']=$this->db->get_where($data['tb'],array('id_tb_person'=>$id_peson)); 
                                            // echo $check =  $data['query']->num_rows();
                                            $data['content']="person/tb_person_form";
                                            $data['fieldset_relation']="ประวัติที่เกี่ยวข้องของพนักงาน";
                                        }
                                        else
                                        {
                                            redirect('home/load_content/4');
                                        }
                                        break;
                                 }
                                 case 17:  //search เลขที่พาสปอร์ต
                                 {
                                        $id_passport=$this->input->get_post('id_passport');
                                        if(!empty($id_passport) )
                                        {
                                            $data['tb']="tb_person";
                                            $data['query']=$this->db->get_where($data['tb'],array('id_tb_person'=>$id_passport)); 
                                            // echo $check =  $data['query']->num_rows();
                                            $data['content']="person/tb_person_form";
                                            $data['fieldset_relation']="ประวัติที่เกี่ยวข้องของพนักงาน";
                                        }
                                        else
                                        {
                                            redirect('home/load_content/4');
                                        }
                                        break;
                                 }
                                 case 18:  //search รหัสพนักงาน
                                 {
                                        $id_code_person=$this->input->get_post('id_code_person');
                                        if(!empty($id_code_person) )
                                        {
                                            $data['tb']="tb_person";
                                            $data['query']=$this->db->get_where($data['tb'],array('id_tb_person'=>$id_code_person)); 
                                            // echo $check =  $data['query']->num_rows();
                                            $data['content']="person/tb_person_form";
                                            $data['fieldset_relation']="ประวัติที่เกี่ยวข้องของพนักงาน";
                                        }
                                        else
                                        {
                                            redirect('home/load_content/4');
                                        }
                                        break;
                                 }
                                 case 19: //โหลดข้อมูลของการกรอกประวัติพนักงานใน 
				  {                               
                                         $data['limit_list']=$this->limit_list;
                                         $limit_list=$this->limit_list;
                                         $data['tb']="tb_person";                                          
                                         $send_page=$this->uri->segment(4);
                                         $data['send_page']=$this->uri->segment(4);
                                            if( empty($send_page) ||  $send_page == 'undefined' )
                                            {
                                                 $page=0;
                                                 $data['send_page']=1;
                                            }
                                            elseif( !empty($send_page) )
                                            {
                                                 $cal_page1=$send_page*$limit_list;
                                                 $page=$cal_page1-$limit_list;                                 
                                            }                                    
                                            $this->db->order_by("id_tb_person", "desc");                                           //$this->tableQuerymodel->page_table($data['tb'],$limit_list,$name_select);                                         
                                            $this->db->limit($limit_list,$page); //$limit_list คือจำนวนรายการต่อ page                                       
                                            $data['query_relation_person']=$this->db->get_where($data['tb'],array('person_enable'=>1));                          
                                            $data['content']="document/tb_document_form";
                                            $data['field_set']="เอกสารที่เกี่ยวข้อง"; 
                                                  //$field_name="id_document";
                                                  //$tb_check="tb_document";
                                            $data['field_name']="id_document";
                                            $data['tb_check']="tb_document";
                                            //$link_operator
                                            $data['link_operator']="document/detail_document/";
                                            $data['link_update']=base_url()."index.php/person/update_tb_person/";
                                            $data['link_delete']=base_url()."index.php/person/delete_tb_person/";
                                            /* window.location.assign("<?=base_url()?>index.php/home/load_content/19/" + $(this).val() + ""); */
                                            $data['redirect_page']=base_url().'index.php/home/load_content/19/';
                                            
                                            break;
				  }
                                  case 20: //โหลดข้อมูลประสพการทำงาน
				  {                               
                                         $data['limit_list']=$this->limit_list;
                                         $limit_list=$this->limit_list;
                                         $data['tb']="tb_person";                                          
                                         $send_page=$this->uri->segment(4);
                                         $data['send_page']=$this->uri->segment(4);
                                            if( empty($send_page) ||  $send_page == 'undefined' )
                                            {
                                                 $page=0;
                                                 $data['send_page']=1;
                                            }
                                            elseif( !empty($send_page) )
                                            {
                                                 $cal_page1=$send_page*$limit_list;
                                                 $page=$cal_page1-$limit_list;                                 
                                            }                                    
                                            $this->db->order_by("id_tb_person", "desc");                                           //$this->tableQuerymodel->page_table($data['tb'],$limit_list,$name_select);                                         
                                            $this->db->limit($limit_list,$page); //$limit_list คือจำนวนรายการต่อ page                                       
                                            $data['query_relation_person']=$this->db->get_where($data['tb'],array('person_enable'=>1));                          
                                            $data['field_name']="id_tb_person";//**check rows  FIX varible
                                            //## dynamic varible 
                                            $data['content']="experience/tb_experience_form";//**
                                            $data['field_set']="ประสพการณ์ทำงาน";//** 
                                                                                    
                                            $data['tb_check']="tb_experience";//**check rows
                                          //  $data['tb_check']="tb_person";//**check rows
                                            
                                            
                                            $data['link_operator']="experience/detail/";//**                                          
                                            $data['link_update']=base_url()."index.php/experience/update_tb_person/";//**
                                            $data['link_delete']=base_url()."index.php/experience/delete_tb_person/";//**
                                            /* window.location.assign("<?=base_url()?>index.php/home/load_content/19/" + $(this).val() + ""); */
                                            $data['redirect_page']=base_url().'index.php/home/load_content/20/';//**
                                            //## dynamic varible                                         
                                            break;
				  }
                                  case 21: //โหลดข้อมูลความสามารถพิเศษ 
				  {                               
                                         $data['limit_list']=$this->limit_list;
                                         $limit_list=$this->limit_list;
                                         $data['tb']="tb_person";                                          
                                         $send_page=$this->uri->segment(4);
                                         $data['send_page']=$this->uri->segment(4);
                                            if( empty($send_page) ||  $send_page == 'undefined' )
                                            {
                                                 $page=0;
                                                 $data['send_page']=1;
                                            }
                                            elseif( !empty($send_page) )
                                            {
                                                 $cal_page1=$send_page*$limit_list;
                                                 $page=$cal_page1-$limit_list;                                 
                                            }                                    
                                            $this->db->order_by("id_tb_person", "desc");                                           //$this->tableQuerymodel->page_table($data['tb'],$limit_list,$name_select);                                         
                                            $this->db->limit($limit_list,$page); //$limit_list คือจำนวนรายการต่อ page                                       
                                            $data['query_relation_person']=$this->db->get_where($data['tb'],array('person_enable'=>1));                          
                                            $data['field_name']="id_tb_person";//**check rows  FIX varible
                                                                                        
                                            //## dynamic varible 
                                            
                                            $data['content']="talent/tb_talent_form";//**
                                            $data['field_set']="ความสามารถพิเศษ ";//** 
                                                                                    
                                            $data['tb_check']="tb_talent";//**check rows
                                            
                                            $data['link_operator']="talent/detail/";//**                                          
                                            $data['link_update']=base_url()."index.php/talent/update_tb/";//**
                                            $data['link_delete']=base_url()."index.php/talent/delete_tb/";//**
                                            /* window.location.assign("<?=base_url()?>index.php/home/load_content/19/" + $(this).val() + ""); */
                                            $data['redirect_page']=base_url().'index.php/home/load_content/21/';//**
                                            //## dynamic varible 
                                            
                                            break;
				  }
                                  case 22: //โหลดข้อมูลข้อมูลประกันสังคม
				  {                               
                                         $data['limit_list']=$this->limit_list;
                                         $limit_list=$this->limit_list;
                                         $data['tb']="tb_person";                                          
                                         $send_page=$this->uri->segment(4);
                                         $data['send_page']=$this->uri->segment(4);
                                            if( empty($send_page) ||  $send_page == 'undefined' )
                                            {
                                                 $page=0;
                                                 $data['send_page']=1;
                                            }
                                            elseif( !empty($send_page) )
                                            {
                                                 $cal_page1=$send_page*$limit_list;
                                                 $page=$cal_page1-$limit_list;                                 
                                            }                                    
                                            $this->db->order_by("id_tb_person", "desc");                                           //$this->tableQuerymodel->page_table($data['tb'],$limit_list,$name_select);                                         
                                            $this->db->limit($limit_list,$page); //$limit_list คือจำนวนรายการต่อ page                                       
                                            $data['query_relation_person']=$this->db->get_where($data['tb'],array('person_enable'=>1));                          
                                            $data['field_name']="id_tb_person";//**check rows  FIX varible
                                           
                                            //## dynamic varible                                           
                                            $data['content']="talent/tb_social_form";//**
                                            $data['field_set']="ความสามารถพิเศษ";//** 
                                                                                    
                                            $data['tb_check']="tb_social_security";//**check rows
                                            
                                            $data['link_operator']="social/detail/";//**                                          
                                            $data['link_update']=base_url()."index.php/social/update_tb/";//**
                                            $data['link_delete']=base_url()."index.php/social/delete_tb/";//**
                                            /* window.location.assign("<?=base_url()?>index.php/home/load_content/19/" + $(this).val() + ""); */
                                            $data['redirect_page']=base_url().'index.php/home/load_content/22/';//**
                                            //## dynamic varible 
                                            
                                            break;
				  }
                                  case 23: //โหลดข้อมูลข้อมูลวันลา,ลากิจ,ขาด
				  {                               
                                         $data['limit_list']=$this->limit_list;
                                         $limit_list=$this->limit_list;
                                         $data['tb']="tb_person";                                          
                                         $send_page=$this->uri->segment(4);
                                         $data['send_page']=$this->uri->segment(4);
                                            if( empty($send_page) ||  $send_page == 'undefined' )
                                            {
                                                 $page=0;
                                                 $data['send_page']=1;
                                            }
                                            elseif( !empty($send_page) )
                                            {
                                                 $cal_page1=$send_page*$limit_list;
                                                 $page=$cal_page1-$limit_list;                                 
                                            }                                    
                                            $this->db->order_by("id_tb_person", "desc");                                           //$this->tableQuerymodel->page_table($data['tb'],$limit_list,$name_select);                                         
                                            $this->db->limit($limit_list,$page); //$limit_list คือจำนวนรายการต่อ page                                       
                                            $data['query_relation_person']=$this->db->get_where($data['tb'],array('person_enable'=>1));                          
                                            $data['field_name']="id_tb_person";//**check rows  FIX varible
                                           
                                            //## dynamic varible                                           
                                            $data['content']="leave/tb_leave_form";//**
                                            $data['field_set']="ข้อมูลวันลา,ลากิจ,ขาด";//** 
                                                                                    
                                            $data['tb_check']="tb_leave_work";//**check rows
                                            
                                            $data['link_operator']="leave/detail/";//**                                          
                                            $data['link_update']=base_url()."index.php/leave/update_tb/";//**
                                            $data['link_delete']=base_url()."index.php/leave/delete_tb/";//**
                                            /* window.location.assign("<?=base_url()?>index.php/home/load_content/19/" + $(this).val() + ""); */
                                            $data['redirect_page']=base_url().'index.php/home/load_content/23/';//**
                                            //## dynamic varible 
                                            
                                            break;
				  }
                                  case 24: //เพิ่มข้อมูลขออนุมัติการทำงาน
				  {                               
                                         $data['limit_list']=$this->limit_list;
                                         $limit_list=$this->limit_list;
                                         $data['tb']="tb_person";                                          
                                         $send_page=$this->uri->segment(4);
                                         $data['send_page']=$this->uri->segment(4);
                                            if( empty($send_page) ||  $send_page == 'undefined' )
                                            {
                                                 $page=0;
                                                 $data['send_page']=1;
                                            }
                                            elseif( !empty($send_page) )
                                            {
                                                 $cal_page1=$send_page*$limit_list;
                                                 $page=$cal_page1-$limit_list;                                 
                                            }                                    
                                            $this->db->order_by("id_tb_person", "desc");                                           //$this->tableQuerymodel->page_table($data['tb'],$limit_list,$name_select);                                         
                                            $this->db->limit($limit_list,$page); //$limit_list คือจำนวนรายการต่อ page                                       
                                            $data['query_relation_person']=$this->db->get_where($data['tb'],array('person_enable'=>1));                          
                                            $data['field_name']="id_tb_person";//**check rows  FIX varible
                                           
                                            //## dynamic varible                                           
                                            $data['content']="authorization/tb_authorization_form";//**
                                            $data['field_set']="ขออนุมัติทำงาน";//** 
                                                                                    
                                            $data['tb_check']="tb_authorization";//**check rows
                                            
                                            $data['link_operator']="authorization/detail/";//**                                          
                                            $data['link_update']=base_url()."index.php/authorization/update_tb/";//**
                                            $data['link_delete']=base_url()."index.php/authorization/delete_tb/";//**
                                            /* window.location.assign("<?=base_url()?>index.php/home/load_content/19/" + $(this).val() + ""); */
                                            $data['redirect_page']=base_url().'index.php/home/load_content/24/';//**
                                            //## dynamic varible 
                                            
                                            break;
				  }
                                  case 25: //เพิ่มข้อมูลขออนุมัติการทำงาน
				  {                               
                                         $data['limit_list']=$this->limit_list;
                                         $limit_list=$this->limit_list;
                                         $data['tb']="tb_person";                                          
                                         $send_page=$this->uri->segment(4);
                                         $data['send_page']=$this->uri->segment(4);
                                            if( empty($send_page) ||  $send_page == 'undefined' )
                                            {
                                                 $page=0;
                                                 $data['send_page']=1;
                                            }
                                            elseif( !empty($send_page) )
                                            {
                                                 $cal_page1=$send_page*$limit_list;
                                                 $page=$cal_page1-$limit_list;                                 
                                            }                                    
                                            $this->db->order_by("id_tb_person", "desc");                                           //$this->tableQuerymodel->page_table($data['tb'],$limit_list,$name_select);                                         
                                            $this->db->limit($limit_list,$page); //$limit_list คือจำนวนรายการต่อ page                                       
                                            $data['query_relation_person']=$this->db->get_where($data['tb'],array('person_enable'=>1));                          
                                            $data['field_name']="id_tb_person";//**check rows  FIX varible
                                           
                                            //## dynamic varible                                           
                                            $data['content']="permission/tb_permission_form";//**
                                            $data['field_set']="ขออนุมัติการทำงาน";//** 
                                                                                    
                                            $data['tb_check']="tb_permission";//**check rows
                                            
                                            $data['link_operator']="permission/detail/";//**                                          
                                            $data['link_update']=base_url()."index.php/permission/update_tb/";//**
                                            $data['link_delete']=base_url()."index.php/permission/delete_tb/";//**
                                            /* window.location.assign("<?=base_url()?>index.php/home/load_content/19/" + $(this).val() + ""); */
                                            $data['redirect_page']=base_url().'index.php/home/load_content/25/';//**
                                            //## dynamic varible 
                                            
                                            break;
				  }
                                  case 26: //เพิ่มข้อมูลvisa
				  {                               
                                         $data['limit_list']=$this->limit_list;
                                         $limit_list=$this->limit_list;
                                         $data['tb']="tb_person";                                          
                                         $send_page=$this->uri->segment(4);
                                         $data['send_page']=$this->uri->segment(4);
                                            if( empty($send_page) ||  $send_page == 'undefined' )
                                            {
                                                 $page=0;
                                                 $data['send_page']=1;
                                            }
                                            elseif( !empty($send_page) )
                                            {
                                                 $cal_page1=$send_page*$limit_list;
                                                 $page=$cal_page1-$limit_list;                                 
                                            }                                    
                                            $this->db->order_by("id_tb_person", "desc");                                           //$this->tableQuerymodel->page_table($data['tb'],$limit_list,$name_select);                                         
                                            $this->db->limit($limit_list,$page); //$limit_list คือจำนวนรายการต่อ page                                       
                                            $data['query_relation_person']=$this->db->get_where($data['tb'],array('person_enable'=>1));                          
                                            $data['field_name']="id_tb_person";//**check rows  FIX varible
                                           
                                            //## dynamic varible                                           
                                            $data['content']="visa/tb_visa_form";//**
                                            $data['field_set']="ข้อมูลvisa";//** 
                                                                                    
                                            $data['tb_check']="tb_visa";//**check rows
                                            
                                            $data['link_operator']="visa/detail/";//**                                          
                                            $data['link_update']=base_url()."index.php/visa/update_tb/";//**
                                            $data['link_delete']=base_url()."index.php/visa/delete_tb/";//**
                                            /* window.location.assign("<?=base_url()?>index.php/home/load_content/19/" + $(this).val() + ""); */
                                            $data['redirect_page']=base_url().'index.php/home/load_content/26/';//**
                                            //## dynamic varible 
                                            
                                            break;
				  }
                                  case 27: //เพิ่มข้อมู passport
				  {                               
                                         $data['limit_list']=$this->limit_list;
                                         $limit_list=$this->limit_list;
                                         $data['tb']="tb_person";                                          
                                         $send_page=$this->uri->segment(4);
                                         $data['send_page']=$this->uri->segment(4);
                                            if( empty($send_page) ||  $send_page == 'undefined' )
                                            {
                                                 $page=0;
                                                 $data['send_page']=1;
                                            }
                                            elseif( !empty($send_page) )
                                            {
                                                 $cal_page1=$send_page*$limit_list;
                                                 $page=$cal_page1-$limit_list;                                 
                                            }                                    
                                            $this->db->order_by("id_tb_person", "desc");                                           //$this->tableQuerymodel->page_table($data['tb'],$limit_list,$name_select);                                         
                                            $this->db->limit($limit_list,$page); //$limit_list คือจำนวนรายการต่อ page                                       
                                            $data['query_relation_person']=$this->db->get_where($data['tb'],array('person_enable'=>1));                          
                                            $data['field_name']="id_tb_person";//**check rows  FIX varible
                                           
                                            //## dynamic varible                                           
                                            $data['content']="passport/tb_passport_form";//**
                                            $data['field_set']="ข้อมูลpassport";//** 
                                                                                    
                                            $data['tb_check']="tb_passport";//**check rows
                                            
                                            $data['link_operator']="passport/detail/";//**                                          
                                            $data['link_update']=base_url()."index.php/passport/update_tb/";//**
                                            $data['link_delete']=base_url()."index.php/passport/delete_tb/";//**
                                            /* window.location.assign("<?=base_url()?>index.php/home/load_content/19/" + $(this).val() + ""); */
                                            $data['redirect_page']=base_url().'index.php/home/load_content/27/';//**
                                            //## dynamic varible 
                                            
                                            break;
				  }
                                 case 28: //report all content
                                 {
                                          $data['limit_list']=$this->limit_list;
                                         $limit_list=$this->limit_list;
                                         $data['tb']="tb_person"; 
                                          
                                          
                                 $send_page=$this->uri->segment(4);
                                 $data['send_page']=$this->uri->segment(4);
                                 if( empty($send_page) ||  $send_page == 'undefined' )
                                 {
                                     $page=0;
                                      $data['send_page']=1;
                                     
                                 }
                                 elseif( !empty($send_page) )
                                 {
                                      $cal_page1=$send_page*$limit_list;
                                      $page=$cal_page1-$limit_list;                                 
                                 }                                        
                                       
                                         $this->db->order_by("id_tb_person", "desc");                                          
                                         $this->db->limit($limit_list,$page); //$limit_list คือจำนวนรายการต่อ page
                                         // $this->db->limit($limit_list,3); 
                                         $data['link_report']='../../../../report_pdf/hnbase_report/report_app.php';
                                         $data['query_relation_person']=$this->db->get_where($data['tb'],array('person_enable'=>1));                          
					 $data['content']="report/tb_report_form";
					 $data['fieldset_relation']="แสดงผลรายงาน";
                                         
                                       break;
                                 }
                                 case 29: //เพิ่มผู้ใช้งานในระบบ
				  {                               
                                      $data['content']="member/form_member";
				      $data['fieldset']="เพิ่มข้อมูลผู้ใช้ระบบ";                                           
                                            break;
				  }
                                  case 30: //ข้อมูลของผู้ใช้ระบบทั้งหมด
				  {                               
                                         $data['limit_list']=$this->limit_list;
                                         $limit_list=$this->limit_list;
                                         $data['tb']="tb_person";                                          
                                         $send_page=$this->uri->segment(4);
                                         $data['send_page']=$this->uri->segment(4);
                                            if( empty($send_page) ||  $send_page == 'undefined' )
                                            {
                                                 $page=0;
                                                 $data['send_page']=1;
                                            }
                                            elseif( !empty($send_page) )
                                            {
                                                 $cal_page1=$send_page*$limit_list;
                                                 $page=$cal_page1-$limit_list;                                 
                                            }                                    
                                            $this->db->order_by("id_tb_person", "desc");                                           //$this->tableQuerymodel->page_table($data['tb'],$limit_list,$name_select);                                         
                                            $this->db->limit($limit_list,$page); //$limit_list คือจำนวนรายการต่อ page                                       
                                            $data['query_relation_person']=$this->db->get_where($data['tb'],array('person_enable'=>1));                          
                                            $data['content']="document/tb_document_form";
                                            $data['field_set']="เอกสารที่เกี่ยวข้อง"; 
                                                  //$field_name="id_document";
                                                  //$tb_check="tb_document";
                                            $data['field_name']="id_document";
                                            $data['tb_check']="tb_document";
                                            //$link_operator
                                            $data['link_operator']="document/detail_document/";
                                            $data['link_update']=base_url()."index.php/person/update_tb_person/";
                                            $data['link_delete']=base_url()."index.php/person/delete_tb_person/";
                                            /* window.location.assign("<?=base_url()?>index.php/home/load_content/19/" + $(this).val() + ""); */
                                            $data['redirect_page']=base_url().'index.php/home/load_content/19/';
                                            
                                            break;
				  }case 31: //โหลดข้อมูลข้อมูลวันลา,ลากิจ,ขาด
				  {                               
                                         $data['limit_list']=$this->limit_list;
                                         $limit_list=$this->limit_list;
                                         $data['tb']="tb_person";                                          
                                         $send_page=$this->uri->segment(4);
                                         $data['send_page']=$this->uri->segment(4);
                                            if( empty($send_page) ||  $send_page == 'undefined' )
                                            {
                                                 $page=0;
                                                 $data['send_page']=1;
                                            }
                                            elseif( !empty($send_page) )
                                            {
                                                 $cal_page1=$send_page*$limit_list;
                                                 $page=$cal_page1-$limit_list;                                 
                                            }                                    
                                            $this->db->order_by("id_tb_person", "desc");                                           //$this->tableQuerymodel->page_table($data['tb'],$limit_list,$name_select);                                         
                                            $this->db->limit($limit_list,$page); //$limit_list คือจำนวนรายการต่อ page                                       
                                            $data['query_relation_person']=$this->db->get_where($data['tb'],array('person_enable'=>1));                          
                                            $data['field_name']="id_tb_person";//**check rows  FIX varible
                                           
                                            //## dynamic varible    
                                             $data['tb_user']='tb_user';
                                            
                                            $data['content']="member/tb_member_form";//**
                                            $data['field_set']="ผู้ดูแลระบบ(ADMIN)";//** 
                                                                                    
                                            //$data['tb_check']="tb_leave_work";//**check rows
                                            $data['tb_check']="tb_user";//**check rows
                                            
                                            $data['link_operator']="member/detail/";//**                                          
                                            $data['link_update']=base_url()."index.php/member/update/";//**
                                            $data['link_delete']=base_url()."index.php/member/delete/";//**
                                            /* window.location.assign("<?=base_url()?>index.php/home/load_content/19/" + $(this).val() + ""); */
                                            $data['redirect_page']=base_url().'index.php/home/load_content/31/';//**
                                            //## dynamic varible 
                                            
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
			  $data['login_hn']=$this->title;
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
		      //$ps=do_hash($ps,'md5');
                      $ps=md5($ps);           
			  
			   $query=$this->db->get_where('tb_user',array('user'=>$user,'password'=>$ps,'user_enable'=>1));  //user_enable 1=enable,0=disable
			   $num_check=$query->num_rows();  //check  login
			   //$num_check=0;
			    if(  $num_check == 1  )
				{
							    $row=$query->row();
							    $user_name=$row->name;
							    $user_lastname=$row->lastname;
							    $id_user=$row->id_user;
                                                            $level_user=$row->level_user;
                                                            
							    $sess_checklogin=array(
							       'sess_name'=>$user_name,
							       'sess_lastname'=>$user_lastname,
							       'sess_login'=>1,
							       'sess_id_user'=>$id_user,
                                                               'sess_level_user'=>$level_user  //1=admin,2=user    
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
		
##--<<<<<<<<<<<<<---------- person-------------------------------
		function  insert_person()//insert person ประวัติพนักงาน
		{//begin
		       if( 	 $this->ck_login()  ==   1  && $this->ck_permission() == 1   )  // echo    $this->ck_login();
					{
					    //echo "testing recording";
						/*
						คำนำหน้าชื่อ=prename
						ชื่อ=name
						นามสกุล=lastname
						ชื่อเล่น=nickname
						เอกสารประกอบ=id_peson
						เลขที่พาสปอร์ต=id_passport
						รหัสพนักงาน=id_code_person
						*/
						 $prename=$this->input->get_post('prename');
						//echo  br();
						 $name=$this->input->get_post('name');
						//echo  br();
						 $lastname=$this->input->get_post('lastname');
						//echo  br();
						 $nickname=$this->input->get_post('nickname');
						//echo  br();
						 $id_peson=$this->input->get_post('id_peson');
						//echo  br();
						$id_passport=$this->input->get_post('id_passport');
						//echo  br();
						$id_code_person=$this->input->get_post('id_code_person');
						//echo  br();
						$tb="tb_person";	
						$data_table = array(
								   'id_tb_person'=>NULL,
								   'prename' =>$prename ,
								   'name' =>$name ,
								   'lastname' => $lastname,
								   'nickname'=>$nickname,
								   'id_peson' =>$id_peson,
								   'id_passport'=>$id_passport,
								   'id_code_person'=>$id_code_person,
                                                                    'person_enable'=>1
										);
								   $insert=$this->db->insert($tb,$data_table);
								  if( $insert   )
								  {
								     echo "บันทึกข้อมูลแล้ว";
								  }
								  elseif( !$insert )
								  {
								     echo "เกิดข้อผิดพลาดในการบันทึกข้อมูล";
								  } 
					}
			     else
					{
									redirect('home/page_login');
					}
				
		}//end function
##======> บันทึกประวัติที่เกี่ยวข้อง
                function  insert_relation_person()//insert person ประวัติพนักงาน
		{//begin
		       //echo   $check_permission=$this->ck_permission() ;
                     //&& $this->ck_permission() == 1;
                    //echo $this->ck_login();
                    if(  $this->ck_login()  ==   1   &&  $this->ck_permission() == 1 )  // echo    $this->ck_login();
					{
					    //echo "testing recording";
						/*
						คำนำหน้าชื่อ=prename
						ชื่อ=name
						นามสกุล=lastname
						ชื่อเล่น=nickname
						เอกสารประกอบ=id_peson
						เลขที่พาสปอร์ต=id_passport
						รหัสพนักงาน=id_code_person
						*/
                                                  
                                                 //echo br();
						 $id_tb_person=$this->input->get_post('id_tb_person');
						//echo  br();
						 $address_origin=$this->input->get_post('address_origin');
						//echo  br();
						 $telephone=$this->input->get_post('telephone');
						//echo  br();
						 $address_in_thai=$this->input->get_post('address_in_thai');
						//echo  br();
						 $friend=$this->input->get_post('friend');
						//echo  br();
						  $phone_friend=$this->input->get_post('phone_friend');
						//echo  br();
						 $relative_address=$this->input->get_post('relative_address');
						//echo  br();
						//$tb="tb_person";
                                                 
                                           // if(is_numeric($id_tb_person) )
                                           // {//begin
                                                $tb="tb_relation_person";
						$data_table = array(
								   'id_tb_relation_person'=>NULL,
								   'id_tb_person' =>$id_tb_person ,
								   'address_origin' =>$address_origin ,
								   'telephone' =>$telephone,
								   'address_in_thai'=>$address_in_thai,
								   'friend' =>$friend,
								   'phone_friend'=>$phone_friend,
								   'relative_address'=>$relative_address
										);
                                             
								 
                                                                $insert=$this->db->insert($tb,$data_table);
								  if( $insert   )
								  {
								     echo "บันทึกข้อมูลแล้ว";
								  }
								  elseif( !$insert )
								  {
								     echo "เกิดข้อผิดพลาดในการบันทึกข้อมูล";
								  }                                                 
                                           // }//end if  
                                            
                                                                  
					}
			     else
					{
									redirect('home/page_login');
					}
				
		}//end function
function  search_person()
{//begin function
    if(  $this->ck_login()  ==   1 ) 
    {        
         $data['title']=$this->title;  
         $id_tb_person=$this->input->get_post('id_tb_person');       
         $tb_check=$this->input->get_post('tb_check');  
         $data['tb']="tb_person";      
         $query=$this->db->get_where($data['tb'],array('person_enable'=>1,'id_tb_person'=>$id_tb_person));        
         $count_row=$query->num_rows();
         
         
         $tb1='tb_document';//เอกสารที่เกี่ยวข้อง
         $tb2='tb_experience';//ประสพการณ์ทำงาน 
         $tb3='tb_talent';//ความสามารถพิเศษ
         $tb4='tb_visa'; //วีซ่า
         $tb5='tb_passport'; //พาสปอร์ต
         $tb6='tb_permission'; //ขออนุญาติทำงาน
         $tb7='tb_authorization'; //ขออนุมัติทำงาน
         $tb8='tb_social_security'; //เพิ่มข้อมูลประกันสังคม
         $tb9='tb_leave_work'; //ข้อมูลวันลา,ลากิจ,ขาด
         $tb10='report'; //แสดงผล report
         
         //$tb3='tb_experience';//
        /* arrray */ $arr_tb=array('tb_person',$tb1,$tb2,$tb3,$tb4,$tb5,$tb6,$tb7,$tb8,$tb9,$tb10); 
        
         $data['limit_list']=$this->limit_list;
                                 $limit_list=$this->limit_list;
                                 $data['tb']="tb_person";                                                                                  
                                 $send_page=$this->uri->segment(4);
                                 $data['send_page']=$this->uri->segment(4);
                                 if( empty($send_page) ||  $send_page == 'undefined' )
                                 {
                                    $page=0;
                                    $data['send_page']=1;                                    
                                 }
                                 elseif( !empty($send_page) )
                                 {
                                     $cal_page1=$send_page*$limit_list;
                                     $page=$cal_page1-$limit_list;                                 
                                 }                                                                                              
         if(   $count_row  > 0  ) 
         {           
             if( $tb_check ==  $data['tb'] )//ประวัติพนักงาน (Person)
             {
                  $this->db->order_by("id_tb_person", "desc");                                          
                  $this->db->limit($limit_list,$page); //$limit_list คือจำนวนรายการต่อ page                                
                  $data['query_relation_person']=$query; 
		  $data['content']="person/tb_person_form";
		  $data['fieldset_relation']="ประวัติที่เกี่ยวข้องของพนักงาน";             
             }
             elseif( $tb_check == $arr_tb[1]  )//เอกสาร
             {
                  $this->db->order_by("id_tb_person", "desc");                                          
                  $this->db->limit($limit_list,$page); //$limit_list คือจำนวนรายการต่อ page                                
                  $data['query_relation_person']=$query; 
                 // $data['query_relation_person']=$this->db->get_where($arr_tb[1],'id_tb_person');
		  
		  $data['fieldset_relation']="เอกสารแนบที่เกี่ยวข้อง";                 
                  $data['field_set']="เอกสารที่เกี่ยวข้อง";
                  //$data['field_name']="id_document";
                  $data['field_name']="id_tb_person";
                  
                  
                  $data['content']="document/tb_document_form";
                  $data['tb_check']="tb_document";                
                  $data['link_operator']="document/detail_document/";
                  $data['link_update']=base_url()."index.php/person/update_tb_person/";
                  $data['link_delete']=base_url()."index.php/person/delete_tb_person/";
                  /* window.location.assign("<?=base_url()?>index.php/home/load_content/19/" + $(this).val() + ""); */
                  $data['redirect_page']=base_url().'index.php/home/load_content/19/';
             }
             elseif($tb_check == $arr_tb[2])//ประสพการณ์ทำงาน
             {
                  $this->db->order_by("id_tb_person", "desc");                                          
                  $this->db->limit($limit_list,$page); //$limit_list คือจำนวนรายการต่อ page                                
                  $data['query_relation_person']=$query; 
                 // $data['query_relation_person']=$this->db->get_where($arr_tb[1],'id_tb_person');
		  
		  $data['fieldset_relation']="ประสพการณ์ทำงาน";                 
                  $data['field_set']="ประสพการณ์ทำงาน";
                  
                                                           //$this->tableQuerymodel->page_table($data['tb'],$limit_list,$name_select);                                         
                    $data['field_name']="id_tb_person";
                 // $data['field_name']="id_tb_experience";
                    
                    
                 
                  $data['tb_check']=$arr_tb[2];   
                  
                  $data['content']="experience/tb_experience_form";
                  $data['link_operator']="experience/detail/";//**                                          
                  $data['link_update']=base_url()."index.php/experience/update_tb_person/";//**
                  $data['link_delete']=base_url()."index.php/experience/delete_tb_person/";//**
                  /* window.location.assign("<?=base_url()?>index.php/home/load_content/19/" + $(this).val() + ""); */
                  $data['redirect_page']=base_url().'index.php/home/load_content/20/';//**
             
             }
              elseif($tb_check == $arr_tb[3] )//ความสามารถพิเศษ
              {
                  $this->db->order_by("id_tb_person", "desc");                                          
                  $this->db->limit($limit_list,$page); //$limit_list คือจำนวนรายการต่อ page                                
                  $data['query_relation_person']=$query; 
                 // $data['query_relation_person']=$this->db->get_where($arr_tb[1],'id_tb_person');
		 
		  $data['fieldset_relation']="ประสพการณ์ทำงาน";                 
                  $data['field_set']="ประสพการณ์ทำงาน";
                  
                  $data['field_name']="id_tb_person";
                  
                  //## dynamic varible 
                  $data['tb_check']=$arr_tb[3];//**check rows
                                
                   $data['content']="talent/tb_talent_form";
                  $data['link_operator']="talent/detail/";//**                                          
                  $data['link_update']=base_url()."index.php/talent/update_tb/";//**
                  $data['link_delete']=base_url()."index.php/talent/delete_tb/";//**
                  /* window.location.assign("<?=base_url()?>index.php/home/load_content/19/" + $(this).val() + ""); */
                  $data['redirect_page']=base_url().'index.php/home/load_content/21/';//**
                  
                                          
              }
              elseif($tb_check == $arr_tb[4] )//วีซ่า
              {
                  $this->db->order_by("id_tb_person", "desc");                                          
                  $this->db->limit($limit_list,$page); //$limit_list คือจำนวนรายการต่อ page                                
                  $data['query_relation_person']=$query; 
                 // $data['query_relation_person']=$this->db->get_where($arr_tb[1],'id_tb_person');
		  
		  $data['fieldset_relation']="วีซ่า(visa)";                 
                  $data['field_set']="วีซ่า(visa)";
                  
                  $data['field_name']="id_tb_person";
                   
                   //## dynamic varible 
                  $data['content']="talent/tb_talent_form";
                  $data['tb_check']=$arr_tb[4];//**check rows
                  $data['link_operator']="visa/detail/";//**                                          
                  $data['link_update']=base_url()."index.php/visa/update_tb/";//**
                  $data['link_delete']=base_url()."index.php/visa/delete_tb/";//**
                  /* window.location.assign("<?=base_url()?>index.php/home/load_content/19/" + $(this).val() + ""); */                                         
                  $data['redirect_page']=base_url().'index.php/home/load_content/26/';//**                                         
              }
              elseif($tb_check == $arr_tb[5] )//passport
              {
                  $this->db->order_by("id_tb_person", "desc");                                          
                  $this->db->limit($limit_list,$page); //$limit_list คือจำนวนรายการต่อ page                                
                  $data['query_relation_person']=$query; 
                 // $data['query_relation_person']=$this->db->get_where($arr_tb[1],'id_tb_person');
		  
		  $data['fieldset_relation']="พาสปอร์ต (passport)";                 
                  $data['field_set']="พาสปอร์ต (passport)";
                  
                  $data['field_name']="id_tb_person";
                   
                   //## dynamic varible 
                  $data['tb_check']=$arr_tb[5];//**check rows
                  $data['content']="passport/tb_passport_form";
                  $data['link_operator']="passport/detail/";//**                                          
                  $data['link_update']=base_url()."index.php/passport/update_tb/";//**
                  $data['link_delete']=base_url()."index.php/passport/delete_tb/";//**
                  /* window.location.assign("<?=base_url()?>index.php/home/load_content/19/" + $(this).val() + ""); */
                  $data['redirect_page']=base_url().'index.php/home/load_content/27/';//**                                       
              }
               elseif($tb_check == $arr_tb[6] )//เพิ่มข้อมูลขออนุญาติทำงาน
              {
                  $this->db->order_by("id_tb_person", "desc");                                          
                  $this->db->limit($limit_list,$page); //$limit_list คือจำนวนรายการต่อ page                                
                  $data['query_relation_person']=$query; 
                 // $data['query_relation_person']=$this->db->get_where($arr_tb[1],'id_tb_person');
		  
		  $data['fieldset_relation']="ขออนุญาติทำงาน";                 
                  $data['field_set']="ขออนุญาติทำงาน";
                  
                  $data['field_name']="id_tb_person";
                   
                   //## dynamic varible 
                  $data['tb_check']=$arr_tb[6];//**check rows
                  $data['content']="permission/tb_permission_form";
                  $data['link_operator']="permission/detail/";//**                                          
                  $data['link_update']=base_url()."index.php/permission/update_tb/";//**
                  $data['link_delete']=base_url()."index.php/permission/delete_tb/";//**
                  /* window.location.assign("<?=base_url()?>index.php/home/load_content/19/" + $(this).val() + ""); */
                  $data['redirect_page']=base_url().'index.php/home/load_content/25/';//**                                       
              }
              elseif($tb_check == $arr_tb[7] )//ขออนุมัติทำงาน
              {
                  $this->db->order_by("id_tb_person", "desc");                                          
                  $this->db->limit($limit_list,$page); //$limit_list คือจำนวนรายการต่อ page                                
                  $data['query_relation_person']=$query; 
                 // $data['query_relation_person']=$this->db->get_where($arr_tb[1],'id_tb_person');
		  
		  $data['fieldset_relation']="ขออนุญาติทำงาน";                 
                  $data['field_set']="ขออนุญาติทำงาน";
                  
                  $data['field_name']="id_tb_person";
                   
                   //## dynamic varible 
                  $data['tb_check']=$arr_tb[7];//**check rows
                  $data['content']="authorization/tb_authorization_form";
                  $data['link_operator']="authorization/detail/";//**                                          
                  $data['link_update']=base_url()."index.php/authorization/update_tb/";//**
                  $data['link_delete']=base_url()."index.php/authorization/delete_tb/";//**
                  /* window.location.assign("<?=base_url()?>index.php/home/load_content/19/" + $(this).val() + ""); */
                  $data['redirect_page']=base_url().'index.php/home/load_content/24/';//**                                       
              }
                  elseif($tb_check == $arr_tb[8] )//เพิ่มข้อมูลประกันสังคม
              {
                  $this->db->order_by("id_tb_person", "desc");                                          
                  $this->db->limit($limit_list,$page); //$limit_list คือจำนวนรายการต่อ page                                
                  $data['query_relation_person']=$query; 
                 // $data['query_relation_person']=$this->db->get_where($arr_tb[1],'id_tb_person');
		  
		  $data['fieldset_relation']="ข้อมูลประกันสังคม";                 
                  $data['field_set']="ข้อมูลประกันสังคม";
                  
                  $data['field_name']="id_tb_person";
                   
                   //## dynamic varible 
                  $data['tb_check']=$arr_tb[8];//**check rows
                  $data['content']="social/tb_social_form";
                  $data['link_operator']="social/detail/";//**                                          
                  $data['link_update']=base_url()."index.php/social/update_tb/";//**
                  $data['link_delete']=base_url()."index.php/social/delete_tb/";//**
                  /* window.location.assign("<?=base_url()?>index.php/home/load_content/19/" + $(this).val() + ""); */
                  $data['redirect_page']=base_url().'index.php/home/load_content/21/';//**                                       
              }
              elseif($tb_check == $arr_tb[9] )//เพิ่มข้อมูลประกันสังคม
              {
                  $this->db->order_by("id_tb_person", "desc");                                          
                  $this->db->limit($limit_list,$page); //$limit_list คือจำนวนรายการต่อ page                                
                  $data['query_relation_person']=$query; 
                 // $data['query_relation_person']=$this->db->get_where($arr_tb[1],'id_tb_person');
		  
		  $data['fieldset_relation']="ข้อมูลประกันสังคม";                 
                  $data['field_set']="ข้อมูลประกันสังคม";
                  
                  $data['field_name']="id_tb_person";
                   
                   //## dynamic varible 
                  $data['tb_check']=$arr_tb[9];//**check rows
                  $data['content']="leave/tb_leave_form";
                  $data['link_operator']="leave/detail/";//**                                          
                  $data['link_update']=base_url()."index.php/leave/update_tb/";//**
                  $data['link_delete']=base_url()."index.php/leave/delete_tb/";//**
                  /* window.location.assign("<?=base_url()?>index.php/home/load_content/19/" + $(this).val() + ""); */
                  $data['redirect_page']=base_url().'index.php/home/load_content/23/';//**                                       
              }
              elseif($tb_check == $arr_tb[10] )//เพิ่มข้อมูลประกันสังคม
              {
                  $this->db->order_by("id_tb_person", "desc");                                          
                  $this->db->limit($limit_list,$page); //$limit_list คือจำนวนรายการต่อ page                                
                  $data['query_relation_person']=$query; 
                 // $data['query_relation_person']=$this->db->get_where($arr_tb[1],'id_tb_person');
		  
		  $data['fieldset_relation']="ข้อมูลประกันสังคม";                 
                  $data['field_set']="ข้อมูลประกันสังคม";
                  
                  $data['field_name']="id_tb_person";
                   
                   //## dynamic varible 
                  $data['tb_check']=$arr_tb[10];//**check rows
                  $data['content']="report/tb_report_form";
                  $data['link_operator']="leave/detail/";//**                                          
                  $data['link_update']=base_url()."index.php/report/update_tb/";//**
                  $data['link_delete']=base_url()."index.php/leave/delete_tb/";//**
                  /* window.location.assign("<?=base_url()?>index.php/home/load_content/19/" + $(this).val() + ""); */
                  $data['redirect_page']=base_url().'index.php/home/load_content/28/';//**                                       
              }
            $this->load->view('home',$data);   //ของเดิม 
         }
         else
         {
              $this->load->view('home',$data); 
         }
      
    }     
}//end function

   		

}//end class
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */


?>
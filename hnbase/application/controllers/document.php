<?php  ob_start(); ?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Document extends CI_Controller {

	var  $title=" .::  HN  system ::. ";
	var  $login_title=" .::  Login  HN  system ::. ";
	var  $title_admin="ระบบ backoffice  กลุ่มงานสร้างเสริมสุขภาพ โรงงพยาบาลขอนแก่น";
	var   $limit_list=8; //จำนวน limit  รายการต่อหน้าที่แสดงใน HOME
	//var   $limit=$this->menusystem->fix_limit();
	function __construct()
	{
		      parent::__construct();
               // $this->load->helper('url'); set เป็น auto แล้ว
			   //$this->load->helper('html');
                                    // $this->load->helper('form');
                                     
                                     $this->load->helper(array('form', 'url'));
                                     
			   $this->load->helper('security');
			  // $this->load->library('encrypt');
			  // $this->load->library('session');
			 // $this->load->model('blogquery');
			   $this->load->model('querymodels');
			   $this->load->model('menusystem');
			   $this->load->model('pr_models');
			   $this->load->model('photoallbumdels');  //
		           $this->load->model('selectmodel'); 
                           $this->load->model('uploadmodels');
	                   $this->load->model('autocomplete'); 
				 //tableQuerymodel
                          // $this->load->model('tableQuerymodel');
                           $this->load->model('tbload');
			   $CI =& get_instance();  //การใช้ CI
			   $CI->load->helper('gen_string');
			   
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
        function upload_file()
        {//begin
          if(  $this->ck_login()  ==   1   &&  $this->ck_permission() == 1  )
            {//if  
                $id_tb_person=trim($this->input->get_post('id_tb_person'));
                //echo br();               
                //$doc_38_1=$_FILES['doc_38_1'];             
                 $path="upload/";  
                 
                if(  isset($_FILES['doc_38_1'])  )//##======= picture ==แนบเอกสาร ทร. ๓๘/๑ :
                {//if
                    echo "testing";  
                    /*check file*/
                          
                         /*
                         echo "name: ".$_FILES['doc_38_1']['name'].br();
                         echo "size: ".$_FILES['doc_38_1']['size'] .br();
                         echo "temp name: ".$_FILES['doc_38_1']['tmp_name'].br();
                         echo "type: ".$_FILES['doc_38_1']['type'].br();
                         echo "error: ".$_FILES['doc_38_1']['error'].br();
                         */
                         
                          $doc_38_1=$_FILES["doc_38_1"]["name"];
                                               
                        /*check file*/ 
                         /*
                          $source = $_FILES['doc_38_1']['tmp_name'];
                          $target = "upload/".$_FILES['doc_38_1']['name'];
                          $upload_1=move_uploaded_file( $source, $target );// or die ("Couldn't copy");
                        */
                          //$size = getImageSize( $target );
                          // $imgstr = "<p><img width=\"$size[0]\" height=\"$size[1]\" ";
                          // $imgstr  = "src=\"$target\" alt=\"uploaded image\" /></p>";
                          //print $imgstr;
                         /* if(  $upload_1  )
                          {
                            echo "uploaded image";  
                          }
                          */ 
                    
                         
                                              
                          //$file_wd1=$_FILES['doc_38_1']['tmp_name'];  
                          $file_wd1="doc_38_1";  
                          $this->uploadmodels->upload_file_hn($file_wd1,$path);                       
                }//end if
                if( isset($_FILES['doc_passport']) )//4.สำเนาพาสปอร์ต
                {
                     $file_wd2="doc_passport";  
                     $this->uploadmodels->upload_file_hn($file_wd2,$path);  
                       $doc_passport=$_FILES['doc_passport']['name'];
                }
                if(  !empty($_FILES['doc_visa']) )//สำเนาวีซ่า
                {
                     $file_wd3="doc_visa";  
                     $this->uploadmodels->upload_file_hn($file_wd3,$path);   
                      $doc_visa=$_FILES['doc_visa']['name'];
                }
                if(  !empty($_FILES['doc_for_permission']) )//ใบขออนุญาตการทำงาน 
                {
                     $file_wd4="doc_for_permission";  
                     $this->uploadmodels->upload_file_hn($file_wd4,$path); 
                      //$doc_for_permission=$_FILES['doc_for_permission']['name'];
                       $doc_pay_permission=$_FILES['doc_pay_permission']['name'];
                }
                 if(  !empty($_FILES['doc_pay_permission']) )//ใบเสร็จรับเงินอนุญาตทำงาน
                {
                     $file_wd5="doc_pay_permission";  
                     $this->uploadmodels->upload_file_hn($file_wd5,$path); 
                     $doc_pay_permission=$_FILES['doc_pay_permission']['name'];
                }
                //doc_pay_permission
                
              //  $doc_38_1=$_FILES["doc_38_1"]["name"];
               
            
              
               
                //echo br();
                
                //echo br();
                
                //echo br();
                
                // echo br();
                 
                //echo br();
                
                $tb="tb_document";
                $data_doc=array(
                    'id_document'=>NULL,
                    'id_tb_person'=>$id_tb_person,
                    'doc_38_1'=>$doc_38_1,
                    'doc_passport'=>$doc_passport,
                    'doc_visa'=>$doc_visa,
                    'doc_for_permission'=>$doc_for_permission,
                    'doc_pay_permission'=>$doc_pay_permission,
                    'doc_permission'=>$doc_permission
                    
                );
                               $insert=$this->db->insert($tb,$data_doc);
				if( $insert   )
				{
					echo "บันทึกข้อมูลแล้ว";
				}
				 elseif( !$insert )
				{
					echo "เกิดข้อผิดพลาดในการบันทึกข้อมูล";
				}
                    redirect('home/load_content/19');           
            }//end if
            else
             {//if
                redirect('home/page_login');             
             }//endif
        }//end function
##=============== modify upload=======================================
        function upload_file_mo1()
        {//begin
          if(  $this->ck_login()  ==   1   &&  $this->ck_permission() == 1  )
            {//if  
                $path="upload/";  
              echo  $id_tb_person=trim($this->input->get_post('id_tb_person'));
              
              ## note หลักการตั้งชื่อไฟล์ที่จะ upload ต้องไม่มี . (จุด)
              /*
            
             echo "name: ".$_FILES['doc_38_1']['name'].br();
              echo "size: ".$_FILES['doc_38_1']['size'] .br();
              echo "temp name: ".$_FILES['doc_38_1']['tmp_name'].br();
            echo "type: ".$_FILES['doc_38_1']['type'].br();
              echo "error: ".$_FILES['doc_38_1']['error'].br();          
               */
              
                echo "<hr>";
              if( isset($_FILES['doc_38_1'])  )
              {
                   //echo "testing";  
                  echo  $doc_38_1=$_FILES["doc_38_1"]["name"];
                    $file_wd1="doc_38_1";  
                    $this->uploadmodels->upload_file_hn($file_wd1,$path);
                    echo "<hr>";
              }
               if( isset($_FILES['doc_passport']) )//4.สำเนาพาสปอร์ต
                {
                     $file_wd2="doc_passport";  
                     $this->uploadmodels->upload_file_hn($file_wd2,$path);  
                    echo   $doc_passport=$_FILES['doc_passport']['name'];
                    echo "<hr>";
                }
              if(  isset($_FILES['doc_visa']) )//สำเนาวีซ่า
                {
                     $file_wd3="doc_visa";  
                     $this->uploadmodels->upload_file_hn($file_wd3,$path);   
                     echo $doc_visa=$_FILES['doc_visa']['name'];
                     echo "<hr>";
                }
                 if(  isset($_FILES['doc_for_permission']) )//ใบขออนุญาตการทำงาน 
                {
                     $file_wd4="doc_for_permission";  
                     $this->uploadmodels->upload_file_hn($file_wd4,$path); 
                      echo $doc_for_permission=$_FILES['doc_for_permission']['name'];
                     // echo $doc_pay_permission=$_FILES['doc_pay_permission']['name'];
                      echo "<hr>";
                }
                 if(  isset($_FILES['doc_pay_permission']) )//ใบเสร็จรับเงินอนุญาตทำงาน
                {
                     $file_wd5="doc_pay_permission";  
                     $this->uploadmodels->upload_file_hn($file_wd5,$path); 
                    echo $doc_pay_permission=$_FILES['doc_pay_permission']['name'];
                    echo "<hr>";
                }
                
              echo  $doc_permission=trim($this->input->get_post('doc_permission'));
                echo "<hr>";
                
                $tb="tb_document"; 
                $data_doc=array(
                    'id_document'=>NULL,
                    'id_tb_person'=>$id_tb_person,
                    'doc_38_1'=>$doc_38_1,
                    'doc_passport'=>$doc_passport,
                    'doc_visa'=>$doc_visa,
                    'doc_for_permission'=>$doc_for_permission,
                    'doc_pay_permission'=>$doc_pay_permission,
                    'doc_permission'=>$doc_permission
                    
                );
                               $insert=$this->db->insert($tb,$data_doc);
				if( $insert   )
				{
					echo "บันทึกข้อมูลแล้ว";
				}
				 elseif( !$insert )
				{
					echo "เกิดข้อผิดพลาดในการบันทึกข้อมูล";
				}
                   
                       redirect('home/load_content/19');        
            }//end if
        }//end function
    
  function upload_file_mo2()
        {//begin
          if(  $this->ck_login()  ==   1   &&  $this->ck_permission() == 1  )
            {//if  
                $path="upload/";  
                $id_tb_person=trim($this->input->get_post('id_tb_person'));
              
              echo br();
                      $ex = explode("-",$id_tb_person);
                      echo  $id = $ex[0];
                      echo br();
              
              ## note หลักการตั้งชื่อไฟล์ที่จะ upload ต้องไม่มี . (จุด)
              /*
            
             echo "name: ".$_FILES['doc_38_1']['name'].br();
              echo "size: ".$_FILES['doc_38_1']['size'] .br();
              echo "temp name: ".$_FILES['doc_38_1']['tmp_name'].br();
            echo "type: ".$_FILES['doc_38_1']['type'].br();
              echo "error: ".$_FILES['doc_38_1']['error'].br();          
               */
              
                echo "<hr>";
              if( isset($_FILES['doc_38_1'])  )
              {
                   //echo "testing";  
                  echo  $doc_38_1=$_FILES["doc_38_1"]["name"];
                    $file_wd1="doc_38_1";  
                    $this->uploadmodels->upload_file_hn($file_wd1,$path);
                    echo "<hr>";
              }
               if( isset($_FILES['doc_passport']) )//4.สำเนาพาสปอร์ต
                {
                     $file_wd2="doc_passport";  
                     $this->uploadmodels->upload_file_hn($file_wd2,$path);  
                    echo   $doc_passport=$_FILES['doc_passport']['name'];
                    echo "<hr>";
                }
              if(  isset($_FILES['doc_visa']) )//สำเนาวีซ่า
                {
                     $file_wd3="doc_visa";  
                     $this->uploadmodels->upload_file_hn($file_wd3,$path);   
                     echo $doc_visa=$_FILES['doc_visa']['name'];
                     echo "<hr>";
                }
                 if(  isset($_FILES['doc_for_permission']) )//ใบขออนุญาตการทำงาน 
                {
                     $file_wd4="doc_for_permission";  
                     $this->uploadmodels->upload_file_hn($file_wd4,$path); 
                      echo $doc_for_permission=$_FILES['doc_for_permission']['name'];
                     // echo $doc_pay_permission=$_FILES['doc_pay_permission']['name'];
                      echo "<hr>";
                }
                 if(  isset($_FILES['doc_pay_permission']) )//ใบเสร็จรับเงินอนุญาตทำงาน
                {
                     $file_wd5="doc_pay_permission";  
                     $this->uploadmodels->upload_file_hn($file_wd5,$path); 
                    echo $doc_pay_permission=$_FILES['doc_pay_permission']['name'];
                    echo "<hr>";
                }
                
              echo  $doc_permission=trim($this->input->get_post('doc_permission'));
                echo "<hr>";
                
                $tb="tb_document"; 
                $data_doc=array(
                    'id_document'=>NULL,
                   // 'id_tb_person'=>$id_tb_person,
                     'id_tb_person'=>$id,
                    'doc_38_1'=>$doc_38_1,
                    'doc_passport'=>$doc_passport,
                    'doc_visa'=>$doc_visa,
                    'doc_for_permission'=>$doc_for_permission,
                    'doc_pay_permission'=>$doc_pay_permission,
                    'doc_permission'=>$doc_permission
                    
                );
                               $insert=$this->db->insert($tb,$data_doc);
                    //  $insert=true;
				if( $insert   )
				{
					echo "บันทึกข้อมูลแล้ว";
				}
				 elseif( !$insert )
				{
					echo "เกิดข้อผิดพลาดในการบันทึกข้อมูล";
				}
                   
                       // redirect('home/load_content/19');    //ของเดิม    
                       redirect('home/show_employee/');     //ของใหม่ ปรับปรุง
            }//end if
        }//end function
##=============== modify upload=======================================
        
        
        
        
        function   detail_document()//เรียกดูข้อมูลของพนักงานทั้งหมดจาก popup หน้ารวม
        {
              if(  $this->ck_login()  ==   1 )
              {              
                  $id_tb_person=$this->uri->segment(3);
                  $send_page=$this->uri->segment(4);
                   if( is_numeric($id_tb_person) )
                   {//if
                        
                         /*
                         $query="select * from  `tb_person`  left join `tb_relation_person`
          on  `tb_person`.id_tb_person=`tb_relation_person`.id_tb_person where tb_relation_person.id_tb_person=".$id_tb_person."";
                             //$data['data_query']=$this->db->query($query);
                          */ 
                       $tb="tb_document"; 
                       $data['path']="upload/";
                       // $fieldset="";
                       $this->db->order_by("id_document", "desc");
                       $query=$this->db->get_where($tb,array('id_tb_person'=>$id_tb_person));
                       //$query->num_rows();                                                                         
                       $this->load->view('import_css_table'); 
                       //$this->tableQuerymodel->tb_relation_person_models_popup($data_query,$send_page);
                      // $this->tableQuerymodel->tb_document_models_popup($query,$send_page);
                       $this->tbload->tb_document_models_popup($query,$send_page);
                   } //end if                
              }
              else
               {
		 redirect('home/page_login');
                }           
        }
        
        function  delete_tb_document()
        {//begin function
            //echo  $this->ck_permission();
            //echo $this->ck_login();
            if(  $this->ck_login()  ==   1  && $this->ck_permission() == 1   )
             {
                    $id_document=trim($this->uri->segment(3));
                    $send_page=trim($this->uri->segment(4));
                   //echo br();
                   if (is_numeric($id_document)) 
                   {
                       //echo "T";
                       //person_enable
                       $tb="tb_document";
                      // $data_update=array('person_enable'=>0);
                     //  $this->db->where('id_document', $id_document);
                     //  $this->db->update($tb,$data_update);
                       $this->db->where('id_document', $id_document);
                       $check=$this->db->delete($tb);                       
                       if( $check )
                       {
                          echo "T";
                       }else
                       {
                          echo "F";
                       }                                            
                  //     redirect('home/load_content/19/'.$send_page);
                       ?>
     <script>
     window.close();
     </script>
                         <?PHP
                   }
             }
             else
		{
		   redirect('home/page_login');
		}
        
        }//end function
	
}//end class
?>	

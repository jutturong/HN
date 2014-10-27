<?php  ob_start(); ?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Authorization extends CI_Controller {

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
             
             
       function insert_file()
        {//begin
          if(  $this->ck_login()  ==   1   &&  $this->ck_permission() == 1  )
            {//if  
                //echo  $id_tb_experience=trim($this->input->get_post('id_tb_experience'));
                //echo br();  
                $id_tb_person=trim($this->input->get_post('id_tb_person'));
               //echo br();                                                                   
               $resign=trim($this->input->get_post('resign'));
               //echo br();             
               $date_resign=trim($this->input->get_post('date_resign'));//2014-01-21 sample
               //echo br();   
                $convert_date_resign=DMY_format3($date_resign);
               //echo br();                          
                 $date_authorization=trim($this->input->get_post('date_authorization'));//2014-01-21 sample 
               //echo br();  
                 $convert_date_authorization=DMY_format3($date_authorization);
              // echo br();  
                $because_resign=trim($this->input->get_post('because_resign'));//2014-01-21 sample 
               //echo br();  
                 $date_inform_resign=trim($this->input->get_post('date_inform_resign'));//2014-01-21 sample 
                //echo br(); 
                 $convert_date_inform_resign=DMY_format3($date_inform_resign);
                //echo br(); 
                $remark=trim($this->input->get_post('remark'));//2014-01-21 sample
               //echo br(); 
                
                $tb="tb_authorization";                             
                $data_doc=array(
                    'id_authorization'=>NULL,
                    'id_tb_person'=>$id_tb_person,
                    'resign'=>$resign,
                    'date_resign'=>$convert_date_resign,
                    'date_authorization'=>$convert_date_authorization,
                    'because_resign'=>$because_resign,
                    'date_inform_resign'=>$convert_date_inform_resign,
                    'remark'=>$remark
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

                                                
                   redirect('home/load_content/24');           
            }//end if
            else
             {//if
                redirect('home/page_login');             
             }//endif
        }//end function
 function   detail()//เรียกดูข้อมูลของพนักงานทั้งหมดจาก popup หน้ารวม
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
                       
                    /*dynamic*/ $tb="tb_authorization"; 
                       //$data['path']="upload/";
                       // $fieldset="";
                    /*dynamic*/ $this->db->order_by("id_authorization", "desc"); 
                       $query=$this->db->get_where($tb,array('id_tb_person'=>$id_tb_person));
                       //$query->num_rows();                                                                         
                       $this->load->view('import_css_table'); 
                       //$this->tableQuerymodel->tb_relation_person_models_popup($data_query,$send_page);
                   /*dynamic*/    $link_delete=base_url()."index.php/authorization/delete_tb/";
                      // $this->tableQuerymodel->tb_authorization_models_popup($query,$send_page,$link_delete);
                        $this->tbload->tb_authorization_models_popup($query,$send_page,$link_delete);
                   } //end if                
              }
              else
               {
		 redirect('home/page_login');
                }           
        }//end function  
        function  delete_tb()
        {//begin function
            //echo  $this->ck_permission();
            //echo $this->ck_login();
            if(  $this->ck_login()  ==   1  && $this->ck_permission() == 1   )
             {
                 /*#dynamic*/   $id_authorization=trim($this->uri->segment(3));
                    $send_page=trim($this->uri->segment(4));
                   
                  /*#dynamic*/  if (is_numeric($id_authorization)) 
                   {                      
                      /*#dynamic*/ $tb="tb_authorization";                    
                    /*#dynamic*/   $this->db->where('id_authorization', $id_authorization);
                       $check=$this->db->delete($tb);                       
                       if( $check )
                       {
                          echo "T";
                       }else
                       {
                          echo "F";
                       }                                          
                      // redirect('home/load_content/20/'.$send_page);
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


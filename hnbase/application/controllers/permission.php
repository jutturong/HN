<?php  ob_start(); ?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Permission extends CI_Controller {

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
                $id_tb_person=trim($this->input->get_post('id_tb_person'));
               //echo br();               
                $date_permission=trim($this->input->get_post('date_permission'));//date
               //echo br();                
                $convert_date_permission=DMY_format3($date_permission);
               //echo br();                           
                $authoriz_sjj=trim($this->input->get_post('authoriz_sjj'));//2014-01-21 sample
               //echo br();                          
                $authoriz_sjk=trim($this->input->get_post('authoriz_sjk'));
               //echo br();              
               $date_shot=trim($this->input->get_post('date_shot'));//2014-01-21 sample 
               //echo br();  
               $convert_date_shot=DMY_format3($date_shot);
               //echo br();              
               $remark=trim($this->input->get_post('remark'));
               //echo br();  
               $study=trim($this->input->get_post('study'));//2014-01-21 sample 
               //echo br();  
               $academy=trim($this->input->get_post('academy'));//2014-01-21 sample 
               //echo br();
               $aptitude=trim($this->input->get_post('aptitude'));                
                $tb="tb_permission";                             
                $data_doc=array(
                    'id_permission'=>NULL,
                    'id_tb_person'=>$id_tb_person,
                    'date_permission'=>$convert_date_permission,
                    'authoriz_sjj'=>$authoriz_sjj,
                    'authoriz_sjk'=>$authoriz_sjk,
                    'date_shot'=>$convert_date_shot,
                    'remark'=>$remark,
                    'study'=>$study,
                    'academy'=>$academy,
                    'aptitude'=>$aptitude,
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
                   redirect('home/load_content/25');           
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
                       
                    /*dynamic*/ $tb="tb_permission"; 
                       //$data['path']="upload/";
                       // $fieldset="";
                    /*dynamic*/ $this->db->order_by("id_permission", "desc"); 
                       $query=$this->db->get_where($tb,array('id_tb_person'=>$id_tb_person));
                       //$query->num_rows();                                                                         
                       $this->load->view('import_css_table'); 
                       //$this->tableQuerymodel->tb_relation_person_models_popup($data_query,$send_page);
                   /*dynamic*/    $link_delete=base_url()."index.php/permission/delete_tb/";
                       //$this->tableQuerymodel->tb_permission_models_popup($query,$send_page,$link_delete);
                       $this->tbload->tb_permission_models_popup($query,$send_page,$link_delete);
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
                 /*#dynamic*/   $id_permission=trim($this->uri->segment(3));
                    $send_page=trim($this->uri->segment(4));
                   
                  /*#dynamic*/  if (is_numeric($id_permission)) 
                   {                      
                      /*#dynamic*/ $tb="tb_permission";                    
                    /*#dynamic*/   $this->db->where('id_permission', $id_permission);
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


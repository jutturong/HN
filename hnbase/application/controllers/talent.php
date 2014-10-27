<?php  ob_start(); ?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Talent extends CI_Controller {

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
                           //$this->load->model('tableQuerymodel');
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
                 $communication_skills=trim($this->input->get_post('communication_skills'));
                //echo br(); 
                 $other=trim($this->input->get_post('other'));
                //echo br(); 
                $tb="tb_talent";                                         
                $data_doc=array(
                    'id_tb_talent'=>NULL,
                    'id_tb_person'=>$id_tb_person,
                    'communication_skills'=>$communication_skills,
                    'other'=>$other                                                    
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
                     redirect('home/load_content/21');           
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
                       $tb="tb_talent"; //##dynamic
                       //$data['path']="upload/";
                       // $fieldset="";
                       $this->db->order_by("id_tb_talent", "desc");//##dynamic
                       $query=$this->db->get_where($tb,array('id_tb_person'=>$id_tb_person));
                       //$query->num_rows();                                                                         
                       $this->load->view('import_css_table'); 
                       //$this->tableQuerymodel->tb_relation_person_models_popup($data_query,$send_page);
                       $link_delete=base_url()."index.php/talent/delete_tb/";
                       //$this->tableQuerymodel->tb_talent_models_popup($query,$send_page,$link_delete);
                       $this->tbload->tb_talent_models_popup($query,$send_page,$link_delete);
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
                    $id_tb_experience=trim($this->uri->segment(3));
                    $send_page=trim($this->uri->segment(4));
                   //echo br();
                   if (is_numeric($id_tb_experience)) 
                   {
                       //echo "T";
                       //person_enable
                       $tb="tb_talent"; //## dynamic
                      // $data_update=array('person_enable'=>0);
                     //  $this->db->where('id_document', $id_document);
                     //  $this->db->update($tb,$data_update);
                       $this->db->where('id_tb_talent', $id_tb_experience);
                       $check=$this->db->delete($tb);                       
                       if( $check )
                       {
                          echo "ลบข้อมูลแล้ว";
                       }else
                       {
                          echo "ไม่สามารถลบข้อมูลได้";
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

?>
             


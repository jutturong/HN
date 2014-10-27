<?php  ob_start(); ?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Visa extends CI_Controller {

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
               // echo br(); 
                
                 $date_visa_expire_begin=trim($this->input->get_post('date_visa_expire_begin'));
                //echo br();
                 $convert_date_visa_expire_begin=DMY_format3($date_visa_expire_begin);
                //echo br();                         
                                          
               //* จำนวนวันของวีซ่า
               
                $count_date_visa=trim($this->input->get_post('count_date_visa'));
                //echo $convert_count_date_visa=DMY_format3($count_date_visa);
                // echo  br(); 
                
                
                 $place_visa=trim($this->input->get_post('place_visa'));
                //echo br();
                
                  $date_visa_expire=trim($this->input->get_post('date_visa_expire'));
                 // echo br();
                 $convert_date_visa_expire=DMY_format3($date_visa_expire);
                //echo br();
                
                
                $date_visa=trim($this->input->get_post('date_visa'));
                //echo br();
                 $convert_date_visa=DMY_format3($date_visa);
                //echo br();
                
                
                 $date_report=trim($this->input->get_post('date_report'));
                //echo br();
                 $convert_date_report=DMY_format3($date_report);
                //echo br();
               
               
                $tb="tb_visa";                                         
                $data_doc=array(
                    'id_visa'=>NULL,
                    'id_tb_person'=>$id_tb_person,
                    'date_visa_expire_begin'=>$convert_date_visa_expire_begin,
                    'count_date_visa'=>$count_date_visa,
                    'place_visa'=>$place_visa,
                    'date_visa_expire'=>$convert_date_visa_expire,
                    'date_visa'=>$convert_date_visa,
                    'date_report'=>$convert_date_report
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
                              
                             
                    redirect('home/load_content/26');
                
                           
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
                       $tb="tb_visa"; //##dynamic
                       //$data['path']="upload/";
                       // $fieldset="";
                       $this->db->order_by("id_visa", "desc");//##dynamic
                       $query=$this->db->get_where($tb,array('id_tb_person'=>$id_tb_person));
                       //$query->num_rows();                                                                         
                       $this->load->view('import_css_table'); 
                       //$this->tableQuerymodel->tb_relation_person_models_popup($data_query,$send_page);
                       $link_delete=base_url()."index.php/visa/delete_tb/";
                       //$this->tableQuerymodel->tb_visa_models_popup($query,$send_page,$link_delete); //##dynamic
                       $this->tbload->tb_visa_models_popup($query,$send_page,$link_delete); //##dynamic
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
                    $id_visa=trim($this->uri->segment(3));
                    $send_page=trim($this->uri->segment(4));
                   //echo br();
                   if (is_numeric($id_visa)) 
                   {
                       //echo "T";
                       //person_enable
                       $tb="tb_visa"; //## dynamic
                      // $data_update=array('person_enable'=>0);
                     //  $this->db->where('id_document', $id_document);
                     //  $this->db->update($tb,$data_update);
                    /*#dynamic*/   $this->db->where('id_visa', $id_visa);
                       $check=$this->db->delete($tb);                       
                       if( $check )
                       {
                          echo "ลบข้อมูลแล้ว";
                       }else
                       {
                          echo "ไม่สามารถลบข้อมูลได้!!";
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
        
        
        function check_date()//นับจำนวนวันที่เหลือ
        {//begin function
            /*
            $badwords = array("fuck", "kuay", "dog", "ควย", "เฮี้ย", "แม่ง", "ห่า");
            $inputword = $_POST["inputword"];
              if(in_array($inputword, $badwords))
                {
                     echo "พบคำหยาบ";
                }else
                {
                     echo "ไม่พบคำหยาบ";
                }
            */
            //echo $inputword = $_POST["inputword"];
            //date_visa_expire_begin:$('#date_visa_expire_begin').val(),date_visa_expire:$('#date_visa_expire').val()
            //echo br();
            
             $date_visa_expire_begin=trim($_POST['date_visa_expire_begin']);//format = 02/17/2014
             $date_visa_expire=trim($_POST['date_visa_expire']);//format=02/12/2014
             
             /*
             $startTimeStamp = strtotime("2011/07/01");
$endTimeStamp = strtotime("2011/07/17");

$timeDiff = abs($endTimeStamp - $startTimeStamp);

$numberDays = $timeDiff/86400;  // 86400 seconds in one day

// and you might want to convert to integer
$numberDays = intval($numberDays);
              */ 
            
              /*
             $con1=  explode('/',$date_visa_expire_begin);
             $con2= $con1[2].'/'.$con1[0].'/'.$con1[1];
             $startTimeStamp =  strtotime($con2);
             
             $con_end1=  explode('/',$date_visa_expire);
             $con_end2=$con_end1[2].'/'.$con_end1[0].'/'.$con_end1[1];;
             $endTimeStamp =  strtotime($con_end2);
             
             $timeDiff=abs($endTimeStamp - $startTimeStamp);
             
             $numberDays = $timeDiff/86400;  // 86400 seconds in one day
             return $count_date=round($numberDays);
               */ 
            echo   MY_cal_date_expire($date_visa_expire_begin,$date_visa_expire);
           
        }//end function
}//end class

?>
             


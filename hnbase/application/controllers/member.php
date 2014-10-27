<?php    ob_start();    ?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Member extends CI_Controller {
	var  $title="กลุ่มงานสร้างเสริมสุขภาพ โรงงพยาบาลขอนแก่น";
	var  $title_admin="ระบบ backoffice  กลุ่มงานสร้างเสริมสุขภาพ โรงงพยาบาลขอนแก่น";
	var   $check_login="";
    var   $limit_list=8; //จำนวน limit  รายการต่อหน้าที่แสดงใน HOME
	function __construct()
	{
		      parent::__construct();
               // $this->load->helper('url'); set เป็น auto แล้ว
			   $this->load->helper('html');
			   $this->load->helper('security');
			  // $this->load->library('encrypt');
			  // $this->load->library('session');
			 // $this->load->model('blogquery');
                           $this->load->helper('date');
                          // $this->load->helper('gen_string');
			   $this->load->model('querymodels');
			   $this->load->model('menusystem');
			    $this->load->model('pr_models');
			     $this->load->model('photoallbumdels');  //
		           $this->load->model('selectmodel'); 
				 $this->load->model('autocomplete'); 
                                 
                                 $this->load->library('table');
				// $this->load->library('javascript');
                                 
				//$this->load->model('tableQuerymodel');  // TableQuerymodel //table สำหรับ query จาก table ต่างๆ
			$this->load->model('tbload'); 	 
			   $CI =& get_instance();  //การใช้ CI
			   $CI->load->helper('gen_string');
                          // $CI->load->library('encrypt');
                          
                           
	}
function  ck_login()  //ใช้ check การ login ของระบบ
	{
		 //return    $this->check_login= "t";
		 return     $this->check_login=$this->menusystem->session_login();
	}
function  crt_id_user()  //ใช้ check การ login ของระบบ
	{
		 //return    $this->check_login= "t";
		return     $this->check_login=$this->menusystem->session_id_user();
	}
function  ck_permission() //ตรวจสอบสิทธิ์การ login 1=admin,2=user
             {
                    return    $this->menusystem->session_id_user();
                    
             }
   //##============calss 14-35-57  hnbase program
   function insert_file()
        {//begin
       if(  $this->ck_login()  ==   1   &&  $this->ck_permission() == 1  )
            {//if  
               /*                                       
               $id_tb_person=trim($this->input->get_post('id_tb_person'));
               $date_passport_expire_begin=trim($this->input->get_post('date_passport_expire_begin')); 
               $convert_date_passport_expire_begin=DMY_format3($date_passport_expire_begin);  
               $count_date_passport=trim($this->input->get_post('count_date_passport'));               
               $place_passport=trim($this->input->get_post('place_passport'));
               $date_passport_expire=trim($this->input->get_post('date_passport_expire'));
               $convert_date_passport_expire=DMY_format3($date_passport_expire);
               $date_passport=trim($this->input->get_post('date_passport'));
               $convert_date_passport=DMY_format3($date_passport);               
               $date_report=trim($this->input->get_post('date_passport'));
               $convert_date_report=DMY_format3($date_report);
               */
                            /*
                $tb="tb_passport";                                         
                $data_doc=array(
                    'id_passport'=>NULL,
                    'id_tb_person'=>$id_tb_person,
                    'date_passport_expire_begin'=>$convert_date_passport_expire_begin,
                    'count_date_passport'=>$count_date_passport,
                    'place_passport'=>$place_passport,
                    'date_passport_expire'=>$convert_date_passport_expire,
                    'date_passport'=>$convert_date_passport,
                    'date_report'=>$convert_date_report
                );                    
              */
                            /*
                $insert=$this->db->insert($tb,$data_doc);
				if( $insert   )
				{
					echo "บันทึกข้อมูลแล้ว";
				}
				 elseif( !$insert )
				{
					echo "เกิดข้อผิดพลาดในการบันทึกข้อมูล";
				}
                            
                   // redirect('home/load_content/27');
                */             
             $user=trim($this->input->get_post('user'));
             //echo br();
	     $password=md5(trim($this->input->get_post('password')));
            //echo $password_encry=$this->encrypt->encode($password); // encry class codeigniter             
             //echo br();
	     $birthday=trim($this->input->get_post('birthday'));	
             $convert_birthday=DMY_format3($birthday);
	       //$birthday=DMY_format($b_dmy); //helper
             //echo br();
	     $name= trim($this->input->get_post('name')); 
             //echo br();
	     $lastname= trim($this->input->get_post('lastname')); 
             //echo br();
	     $email= trim($this->input->get_post('email')); 
             //echo br();
	     $user_enable=trim($this->input->get_post('user_enable')); 
             //echo br();
	     $level_user=$this->input->get_post('level_user'); 
             //echo br();
	     $id_card=trim($this->input->get_post('id_card')); 
             //echo br();
	     $address=trim($this->input->get_post('address')); 
             //echo br();
             $datestring = "%Y-%m-%d %d:%h:%i";
	       $time = time();	
	      $date_record=DATE_TIME();
                
                   $data=array(
                       'id_user'=>NULL,
                       'user'=>$user,
                       'password'=>$password,
                       'birthday'=>$convert_birthday,
                       'name'=>$name,
                       'lastname'=>$lastname,
                       'email'=>$email,
                       'user_enable'=>$user_enable,
                       'level_user'=>$level_user,
                       'id_card'=>$id_card,
                       'address'=>$address,
                       'date_record'=>$date_record,
                       'addby_user'=>$level_user,
                   );
                  
                   $tb="tb_user";
                   $insert=$this->db->insert($tb,$data);
				if( $insert   )
				{
					echo "บันทึกข้อมูลแล้ว";
				}
				 elseif( !$insert )
				{
					echo "เกิดข้อผิดพลาดในการบันทึกข้อมูล";
				} 
                                
                                redirect('home/load_content/31');
        
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
                   $id_user=$this->uri->segment(3);
                  //$send_page=$this->uri->segment(4);
                   if( is_numeric($id_user) && $id_user > 0 )
                   {//if
                       $tb="tb_user"; //##dynamic
                       $query=$this->db->get_where($tb,array('id_user'=>$id_user));
                       $check_row=$query->num_rows;
                       if(  $check_row > 0 )
                       {//if
                           $row=$query->row();
                           $data['id_user']=$id_user;
                           $data['name']=$row->name;                         
                           $data['lastname']=$row->lastname;
                           $data['user']=$row->user; 
                           $data['password']=$row->password; 
                           $birthday=$row->birthday;
                           $data['convert_birthday']=convert_thai_DMY($birthday);
                           $data['email']=$row->email;
                           $data['user_enable']=$row->user_enable;//1=enable 0=disabled
                           $data['level_user']=$row->level_user;//1=admin,2=user
                           $data['id_card']=$row->id_card; //เลขที่บัตรประชาชน
                           $data['address']=$row->address;
                           $this->load->view('member/form_update_member',$data);
                           //$this->load->view('import_css_table'); 
                       //$this->tableQuerymodel->tb_relation_person_models_popup($data_query,$send_page);                     
                       //$link_delete=base_url()."index.php/passport/delete_tb/";                      
                       //$this->tableQuerymodel->tb_passport_models_popup($query,$send_page,$link_delete); //##dynamic
                   
                       }//end if
                   } //end if                
              }
              else
               {
		 redirect('home/page_login');
                }           
        }//end function         
function  delete()
        {//begin function
            //echo  $this->ck_permission();
            //echo $this->ck_login();
            if(  $this->ck_login()  ==   1  && $this->ck_permission() == 1   )
             {
                   $id_user=trim($this->uri->segment(3));
                    //$send_page=trim($this->uri->segment(4));
                   //echo br();
                   if (is_numeric( $id_user)) 
                   {
                       //echo "T";
                       //person_enable
                       $tb="tb_user"; //## dynamic
                      // $data_update=array('person_enable'=>0);
                     //  $this->db->where('id_document', $id_document);
                     //  $this->db->update($tb,$data_update);
                    /*#dynamic*/   $this->db->where('id_user', $id_user);
                      
                     
                      $check=$this->db->delete($tb);                       
                       if( $check )
                       {
                          echo "ลบข้อมูลผู้ใช้คนนี้แล้ว";
                       }else
                       {
                          echo "ไม่สามารถลบข้อมูลได้!!";
                       } 
                       
                        redirect('home/load_content/31/'.$send_page);
                                 
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
        
function update()
        {//begin
       if(  $this->ck_login()  ==   1   &&  $this->ck_permission() == 1  )
            {//if  
               
             $id_user=trim($this->input->get_post('id_user'));  
             $user=trim($this->input->get_post('user'));
             //echo br();
             
	     $password=md5(trim($this->input->get_post('password')));
            //echo $password_encry=$this->encrypt->encode($password); // encry class codeigniter             
             //echo br();
	     
             
             //$birthday=trim($this->input->get_post('birthday'));	
            
             /*##ของเดิม
                echo  $convert_birthday=DMY_format2($birthday);
	        //$birthday=DMY_format($b_dmy); //helper
                echo br();          
             */ 
             
             /*## modify code 16-3-57 */
             $birthday=trim($this->input->get_post('birthday'));	
             $convert_birthday=DMY_format3($birthday);
             
             
             
	     $name= trim($this->input->get_post('name')); 
             //echo br();
	     $lastname= trim($this->input->get_post('lastname')); 
             //echo br();
	     $email= trim($this->input->get_post('email')); 
             //echo br();
	     $user_enable=trim($this->input->get_post('user_enable')); 
            
             /*
             if($user_enable == '')
             {
                $user_enable=0; 
             }
             */
             
            // echo $user_enable;
            // echo br();
	     $level_user=$this->input->get_post('level_user'); 
             //echo br();
	     $id_card=trim($this->input->get_post('id_card')); 
             //echo br();
	     $address=trim($this->input->get_post('address')); 
             //echo br();
             $datestring = "%Y-%m-%d %d:%h:%i";
	       $time = time();	
	      $date_record=DATE_TIME();
                
                           if( !empty($password)  )
                           {   
                                $data=array(
                                   // 'id_user'=>NULL,
                                    'user'=>$user,
                                    'password'=>$password,
                                    //'birthday'=>$convert_birthday,
                                    'birthday'=>$convert_birthday,
                                    'name'=>$name,
                                    'lastname'=>$lastname,
                                    'email'=>$email,
                                    'user_enable'=>$user_enable,
                                    'level_user'=>$level_user,
                                    'id_card'=>$id_card,
                                    'address'=>$address
                                    //'date_record'=>$date_record,
                                    //'addby_user'=>$level_user,
                                );
                           } 
                           elseif( empty($password) )
                           {
                               $data=array(
                                   // 'id_user'=>NULL,
                                    'user'=>$user,
                                    //'password'=>$password,
                                    'birthday'=>$convert_birthday,
                                    'name'=>$name,
                                    'lastname'=>$lastname,
                                    'email'=>$email,
                                    'user_enable'=>$user_enable,
                                    'level_user'=>$level_user,
                                    'id_card'=>$id_card,
                                    'address'=>$address
                                    //'date_record'=>$date_record,
                                    //'addby_user'=>$level_user,
                                );
                               
                           }   
                  
                   $tb="tb_user";
                  // $insert=$this->db->insert($tb,$data);
                   //$this->db->where('id_user', $id_user);
                   $update=$this->db->update($tb,$data,array('id_user'=>$id_user));                           
				if( $update   )
				{
					echo "update ข้อมูลแล้ว";
				}
				 elseif( !$update )
				{
					echo "เกิดข้อผิดพลาดในการ update ข้อมูล";
				}                                                
                              //  redirect('home/load_content/31');
                          ?>
     <script>
         window.close();
     </script>
                         <?
                    
            }//end if
            else
             {//if
                redirect('home/page_login');             
             }//endif
}//end function


}//endclass

?>

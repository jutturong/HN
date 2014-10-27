<?php  ob_start(); ?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Person extends CI_Controller {

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
				 
				//$this->load->model('tableQuerymodel');  // TableQuerymodel //table สำหรับ query จาก table ต่างๆ
                                $this->load->model('tbload');  // TableQuerymodel //table สำหรับ query จาก table ต่างๆ
				 
			   $CI =& get_instance();  //การใช้ CI
			   $CI->load->helper('gen_string');
			   
	}//end function
        function  ck_login()  //ใช้ check การ login ของระบบ
                {
		    //return    $this->check_login= "t";
		    return     $this->check_login=$this->menusystem->session_login();
                }
        function  ck_permission() //ตรวจสอบสิทธิ์การ login 1=admin,2=user
                {
                    return    $this->menusystem->session_id_user();                  
                }
        function   detail_person()//เรียกดูข้อมูลของพนักงานทั้งหมดจาก popup หน้ารวม
        {
              if(  $this->ck_login()  ==   1 )
              {              
                  $id_tb_person=$this->uri->segment(3);
                  $send_page=$this->uri->segment(4);
                   if( is_numeric($id_tb_person) )
                   {//if
                            $query="select * from  `tb_person`  left join `tb_relation_person`
          on  `tb_person`.id_tb_person=`tb_relation_person`.id_tb_person where tb_relation_person.id_tb_person=".$id_tb_person."";
                             //$data['data_query']=$this->db->query($query);
                             $data_query=$this->db->query($query);
                            // $fieldset="";
                             $this->load->view('import_css_table'); 
                            // $this->tableQuerymodel->tb_relation_person_models_popup($data_query,$send_page);
                              $this->tbload->tb_relation_person_models_popup($data_query,$send_page);
                   } //end if                
              }
              else
               {
		 redirect('home/page_login');
                }           
        }
        function update_tb_person()//update ข้อมูลของพนักงาน
        {
             if(  $this->ck_login()  ==   1   &&  $this->ck_permission() == 1 )
             {
                 $id_tb_person=trim($this->uri->segment(3));
                 $data['send_page']=trim($this->uri->segment(4));
                 $data['id_tb_person']=$id_tb_person;
                 if(  is_numeric($id_tb_person) )
                 {
                     $data['title']=$this->title;                
                     $data['tb']="tb_person";
                                      $data['query']=$this->db->get_where($data['tb'],array('id_tb_person'=>$id_tb_person));
                                      foreach($data['query']->result() as $row)
                                      {
                                          // $data['id_tb_person']=$row->$id_tb_person; 
                                          $data['prename']=$row->prename;
                                           $data['name']=$row->name;
                                           $data['lastname']=$row->lastname;
                                           $data['nickname']=$row->nickname;
                                           $data['id_peson']=$row->id_peson;
                                           $data['id_passport']=$row->id_passport;
                                           $data['id_code_person']=$row->id_code_person;
                                      }
                                          //$check =  $data['query']->num_rows();
                                            
                                      $data['content']="person/person_update_form";
                                          $data['fieldset']="แก้ไขประวัติที่เกี่ยวข้องของพนักงาน";
                                          $this->load->view('home',$data);
                 }                     
             }
             else
             {
               redirect('home/page_login');             
             }
        }
        function  delete_tb_person()
        {
            //echo  $this->ck_permission();
            //echo $this->ck_login();
            if(  $this->ck_login()  ==   1  && $this->ck_permission() == 1   )
             {
                    $id_tb_person=trim($this->uri->segment(3));
                    $send_page=trim($this->uri->segment(4));
                   //echo br();
                   if (is_numeric($id_tb_person)) 
                   {
                      // echo "T";
                       //person_enable
                       $tb="tb_person";
                       $data_update=array('person_enable'=>0);
                       $this->db->where('id_tb_person', $id_tb_person);
                       $check=$this->db->update($tb,$data_update);
                       if( $check )
                       {
                           echo "ลบข้อมูลแล้ว";
                       }else
                       {
                           echo "ไม่สามารถลบข้อมูลได้!!";
                       }                                         
                       redirect('home/load_content/4/'.$send_page);
                   }
             }
             else
		{
		   redirect('home/page_login');
		}        
        }
        function  query_update_tb_person()
        {
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
                                                 $id_tb_person=$this->input->get_post('id_tb_person');
                                                 //$send_page=$this->input->get_post('send_page');
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
								   //'id_tb_person'=>NULL,
								   'prename' =>$prename ,
								   'name' =>$name ,
								   'lastname' => $lastname,
								   'nickname'=>$nickname,
								   'id_peson' =>$id_peson,
								   'id_passport'=>$id_passport,
								   'id_code_person'=>$id_code_person
										);
								   //$insert=$this->db->insert($tb,$data_table);
                                                                      $this->db->where('id_tb_person', $id_tb_person);
                                                                      $update=$this->db->update($tb,$data_table); 
								  if( $update   )
								  {
								     echo "แก้ไขข้อมูลแล้ว";
								  }
								  elseif( !$update )
								  {
								     echo "เกิดข้อผิดพลาดในการแก้ไขข้อมูล";
								  } 
					}
			     else
					{
									redirect('home/page_login');
					}
            
            
        }
        
  //###============ relation person table=====
        function form_update_relation_person()//update ข้อมูลของพนักงาน
        {
             if(  $this->ck_login()  ==   1   &&  $this->ck_permission() == 1 )
             {
                $data['id_tb_relation_person']=trim($this->uri->segment(3));
                //echo br();
                 $data['send_page']=trim($this->uri->segment(4));                 
                 if(  is_numeric($data['id_tb_relation_person']) )
                 {
                     $data['title']=$this->title;                
                     $data['tb']="tb_relation_person";                                        
                     $data['query']=$this->db->get_where($data['tb'],array('id_tb_relation_person'=>$data['id_tb_relation_person']));
                                      foreach($data['query']->result() as $row)
                                      {
                                          // $data['id_tb_person']=$row->$id_tb_person; 
                                          /*
                                          'id_tb_relation_person'=>NULL,
								   'id_tb_person' =>$id_tb_person ,
								   'address_origin' =>$address_origin ,
								   'telephone' =>$telephone,
								   'address_in_thai'=>$address_in_thai,
								   'friend' =>$friend,
								   'phone_friend'=>$phone_friend,
								   'relative_address'=>$relative_address
                                          */
                                          
                                           $data['address_origin']=$row->address_origin;
                                           $data['telephone']=$row->telephone;
                                           $data['address_in_thai']=$row->address_in_thai;
                                           $data['friend']=$row->friend;
                                           $data['phone_friend']=$row->phone_friend;
                                           $data['relative_address']=$row->relative_address;
                                           //$data['id_code_person']=$row->id_code_person;
                                      }                                       
                                          //$check =  $data['query']->num_rows();                                         
                                          $data['content']="person/person_update_form";
                                          $data['fieldset']="แก้ไขประวัติที่เกี่ยวข้องของพนักงาน";
                                          $this->load->view('person/relation_form_update',$data);                                                            
                 }                     
             }
             else
             {
               redirect('home/page_login');             
             }        
        }//end function
        function  update_relation_person()//insert person ประวัติพนักงาน
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
                                                $id_tb_relation_person=$this->input->get_post('id_tb_relation_person'); 
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
						//$tb="tb_relation_person";
                                                 
                                           // if(is_numeric($id_tb_person) )
                                           // {//begin
                                                $tb="tb_relation_person";
						$data_table = array(
								   //'id_tb_relation_person'=>NULL,
								   //'id_tb_person' =>$id_tb_person ,
								   'address_origin' =>$address_origin ,
								   'telephone' =>$telephone,
								   'address_in_thai'=>$address_in_thai,
								   'friend' =>$friend,
								   'phone_friend'=>$phone_friend,
								   'relative_address'=>$relative_address
										);
                                             
								      $this->db->where('id_tb_relation_person',$id_tb_relation_person);
                                                                      $update=$this->db->update($tb,$data_table); 
                                                             
                                                //  $update=$this->db->insert($tb,$data_table);
                                                               
								  if( $update   )
								  {
								     echo "แก้ไขข้อมูลแล้ว";
								  }
								  elseif( !$update )
								  {
								     echo "เกิดข้อผิดพลาดในการแก้ไขข้อมูล";
								  }                                                                                                          
					}
			     else
					{
									redirect('home/page_login');
					}				
		}//end function
          function delete_relation_person()
          {//begin
                if(  $this->ck_login()  ==   1   &&  $this->ck_permission() == 1 )  // echo    $this->ck_login();
	        {
                   $id_tb_relation_person=trim($this->uri->segment(3));  
                   if(is_numeric($id_tb_relation_person)  )
                   {    
                          $tb="tb_relation_person";                  
                          $this->db->where('id_tb_relation_person',$id_tb_relation_person);
                          $this->db->delete($tb); 
                   }                    
                }else
		{
		         redirect('home/page_login');
		}
                ?>
<script>
    window.close();
</script>
                 <?PHP             
          }//end        
}//end class    
?>


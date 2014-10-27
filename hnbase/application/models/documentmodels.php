<?php   if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Documentmodels extends  CI_Model {

    function Documentmodels()
    {
        //parent::CI_Model();
	 parent::__construct();
    }
	function  attach_file($doc_38_1,$icon,$path) //แสดงไฟล์ที่แนบใน document
	{	   
                     if(  !empty($doc_38_1)   )
                     {
                     ?>
                     <!--<span class="glyphicon glyphicon-paperclip"></span>-->
                             <a href="<?php echo $path; ?>"  target="_blank"  ><span class="<?php  echo $icon; ?>"></span></a>
                     <?php
                     }else{
                         echo nbs(2);
                     }
                   
	}//end function
        
         function  icon_attach($id,$tb,$id_field,$id_value) //แสดง icon ที่มีไฟล์ แนบ ใน document
         {
             if( $id > 0  )
             {   
                 $query=$this->db->get_where($tb,array($id_field=>$id_value));
                 $check=$query->num_rows();
                  if( $check > 0 )
                  {
                 ?>
                        <span class="glyphicon glyphicon-paperclip"></span>
                 <?php
                  }//end if
             }
         }//end function
         
         function  date_update($tb,$f_name,$v_name,$id_update,$id_value) //update ค่า 
         {
             //if( !empty($f_name)  &&  !empty($v_name )  )
             if( $id_value > 0  )
             {
                                 
                 $data_update=array(  
                     $f_name=>$v_name                  
                          );
                   
                    $this->db->where($id_update,$id_value);
                    $check_data_update=$this->db->update($tb,$data_update); 
                   if(   $check_data_update   )
                   {
                       //echo $f_name;
                       //echo br();                      
                       //echo "Update complete"; 
                       //echo br();                     
                      return   $check_data_update;
                   }
                   else
                   {
                       echo  "Can't update MySQL server!!!";
                   }
             }
         }
         
         function  update_dmy($tb,$id_f,$id_va,$name_dmy,$va_dmy) //ปรับปุรงจาก date_update
         {//begin           
               //$tb="tb_employee";
              // $id_f="start_work_date";
              // $id_va="2014-01-14";               
               $data=array(
                     //  'start_work_date'=>'2014-01-14'  
                         $name_dmy=>$va_dmy           
                          );                      
              // $this->db->where('id_employee',29); 
               $this->db->where($id_f,$id_va); 
               $check=$this->db->update($tb,$data);  
               if($check)
               {
                     echo "true update";
                     return $check;               
               }          
               else {
               	echo "false update";
               	
               }
         }//end
         
}//end class

?>


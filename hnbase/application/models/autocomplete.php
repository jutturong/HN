<?php   if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Autocomplete extends  CI_Model {

    function Autocomplete()  //model  การ query ทั้งหมด
    {
        //parent::CI_Model();
		   parent::__construct();
    }
	
	function  json_autocomplete($term,$field,$tb)//ตัวอย่างนี้ใช้งานได้จริง
	{//begin
				 
				 //$term=$this->input->get_post("term");
				 //$query=$this->db->like('country',$term);
				 $query=$this->db->like($field,$term);
				 //$query2=$this->db->get('countries');
				 $query2=$this->db->get($tb);
				 foreach($query2->result() as $row)
				 {
				     	 $json[]=array(
									//'value'=> $row->country,
									'value'=> $row->$field,
									//'label'=>$row->country." - ".$row->id
									'label'=>$row->$field
										);
				 }
						 echo  json_encode($json);
	}//end
	
	
    function  json_autocomplete_mo1($term,$field_id,$field_value,$tb)//ตัวอย่างนี้ใช้งานได้จริง
	{//begin
				 
				 //$term=$this->input->get_post("term");
				 //$query=$this->db->like('country',$term);
				 $query=$this->db->like($field,$term);
				 //$query2=$this->db->get('countries');
				 $query2=$this->db->get($tb);
				 foreach($query2->result() as $row)
				 {
				     	 $json[]=array(
									//'value'=> $row->country,
									'value'=> $row->$field_id,
									//'label'=>$row->country." - ".$row->id
									'label'=>$row->$field_value
										);
				 }
						 echo  json_encode($json);
	}//end

function  json_autocomplete_person($term,$field,$tb)//ตัวอย่างนี้ใช้งานได้จริง
	{//begin
				 
				 //$term=$this->input->get_post("term");
				 //$query=$this->db->like('country',$term);
				 $query=$this->db->like($field,$term);
				 //$query2=$this->db->get('countries');
				 $query2=$this->db->get($tb);
                                 
				 foreach($query2->result() as $row)
				 {
				     	 $json[]=array(
									//'value'=> $row->country,
					//'value'=>$row->$field." ".$row->lastname,
                                      //  'value'=>$this->autocomplete->switch_prename($row->prename).$row->$field." ".$row->lastname,
					'value'=>$row->id_tb_person,				
                                                                        ////'label'=>$row->country." - ".$row->id
                                        //id_tb_person,     
					'label'=>$this->autocomplete->switch_prename($row->prename).$row->$field." ".$row->lastname
										);
				 }
					echo  json_encode($json);
	}//end
        
        function  json_autocomplete_employee($term,$field,$tb,$va,$fr,$ls)//ตัวอย่างนี้ใช้งานได้จริง
	{//begin
                               $array=array($field=>$term);                              
                               $this->db->like($array);
		     $query2=$this->db->get($tb);                 
                             //  $query2=$this->db->query("SELECT  *  FROM  $tb  WHERE  $field  LIKE('%$term%') ;");
                              $check =$query2->num_rows();                               
                              foreach($query2->result() as $row )
                              {
				     	 $json[]=array(				         	
                                                  'value'=>$row->$va.'-'.$row->$fr.'-'.$row->$ls,	
                                                  'label'=>$row->$fr."-".$row->$ls	                                                                                                  	
                                                                                  );
                                                  
                              }                             
					echo  json_encode($json);                                                       
	}//end
        
        function  json_autocomplete_call($term,$field,$tb)//ตัวอย่างนี้ใช้งานได้จริง
	{//begin
				 
				 //$term=$this->input->get_post("term");
				 //$query=$this->db->like('country',$term);
				 $query=$this->db->like($field,$term);
				 //$query2=$this->db->get('countries');
				 $query2=$this->db->get($tb);
                                 
				 foreach($query2->result() as $row)
				 {
				     	 $json[]=array(
									//'value'=> $row->country,
					//'value'=>$row->$field." ".$row->lastname,
                                      //  'value'=>$this->autocomplete->switch_prename($row->prename).$row->$field." ".$row->lastname,
					'value'=>$row->id_tb_person,				
                                                                        ////'label'=>$row->country." - ".$row->id
                                        //id_tb_person,     
					'label'=>$row->$field
										);
				 }
					echo  json_encode($json);
	}//end
function  switch_prename($id_prename)//switch prename คำนำหน้าชื่อ
{
    switch($id_prename)
	{ //begin
                
             
        /*
        case 1:
		{
		   return "boy";
		   break;
		}
		case 2:
		{
		   return "Mr.";
		   break;
		}
		case 3:
		{
		   return "girl";
		   break;
		}
		case 4:
		{
		   return "Ms.";
		   break;
		}
		case 5:
		{
		   return "Mrs.";
		   break;
		}
        default :
		{   
                   return "ไม่ระบุ";     
		}
      */
        
                
        
		case 1:
		{
		   return "Mr.";
		   break;
		}
		case 2:
		{
		   return "Ms.";
		   break;
		}
		case 3:
		{
		   return "Mrs.";
		   break;
		}
        default :
		{   
                   return "ไม่ระบุ";     
		}
                
                
                
	}//end	
}	
	}//end class
	
?>	

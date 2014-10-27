<?php   if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Pr_models extends  CI_Model {

    function Pr_models()  //model  การ query ทั้งหมด
    {
        //parent::CI_Model();
		   parent::__construct();
    }

//##====== HOME PR ข่าวประชาสัมพันธ์========	
	function  show_pr_home($pin,$limit) //แสดงข่าวประชาสัมพันธ์ หน้าหลัก
	{
	       #===ตัวแปร
			$this->db->order_by("id_tb_pr", "desc"); 
        	$query=$this->db->get_where('tb_pr',array('pr_enable'=>1,'pin_pr'=>$pin),$limit,0);
				//$query=$this->db->get_where('tb_pr',array('pr_enable'=>1,'pin_pr'=>$pin),0,$limit);
			  $num_check=$query->num_rows();
			if( $num_check  > 0 )  //เปลี่ยนแปลงทีหลัง
			{//if
			         foreach($query->result() as $row)  //ตรงนี้ต้องเปลี่ยนด้วย
					 {//begin foreach
								$id_tb_pr=$row->id_tb_pr;
							    $pr_picture=$row->pr_picture;
								$title=$row->title;		
								$content=$row->content;											
                                $DMY=$row->DMY;
						    	$pin_pr=$row->pin_pr;
								$limit_content=substr($content,0,200);
				          ?>
				                 <p style="font-style:italic;">
                                                     <p><img width="100" height="100" alt="" src="<?=base_url()?>picture/<?=$pr_picture?>" style="float: left; margin-right: 20px;" /></p>
                                                   <?php
                                                    if(  $pin_pr  == 1   )  //ปักหมุด
                                                                                  {
                                                                                      ?>
                                                                                               <img    alt="" src="<?=base_url()?>images/add-bookmark.gif"  />
                                                                                       <?php
                                                                                  }
                                                    ?>							  
                                                    <b><?=$title?> </b>
                                                    <br>
                                                       <?php   //echo  $limit_content;  ?>
                                                    <p><a href="<?=base_url()?>index.php/home/link_read_pr/<?=$id_tb_pr?>" class="art-button" target="_blank">เนื้อหาเพิ่มเติม</a></p>
                                                    <br>
     						   </p>
				         <?php
					 }	//end  foreach	
					 ?>
                     <?php
		 }//end if
	}

}//end class

?>

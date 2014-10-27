<?php   if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Queryarticle extends  CI_Model {

    function Queryarticle()  //model  การ query ทั้งหมด
    {
        //parent::CI_Model();
		   parent::__construct();
    }
	
	function   select_id_article() //เลือก  select id_article
	{
	       $tb="tb_article";
	       $query=$this->db->get($tb);
		   ?>
               <select name="id_article" id="id_article">
           <?PHP
		   foreach($query->result() as $row)
		   {
		          $id_article=$row->id_article;
				  $article=$row->article_content;
				  ?>
                     <option value="<?=$id_article?>"><?=$article?></option>     
                  <?PHP
		   }
		   ?>
               </select>
           <?PHP
	}
	
		function   select_id_article_va_update($id_va) //เลือก  select id_article
	{
	       $tb="tb_article";
	       $query=$this->db->get($tb);
		   ?>
               <select name="id_article" id="id_article">
           <?PHP
		   foreach($query->result() as $row)
		   {
		          $id_article=$row->id_article;
				  $article=$row->article_content;
				  if( $id_va ==  $id_article )
				  {
				  ?>
                     <option value="<?=$id_va?>" selected="selected"><?=$article?></option>     
                  <?PHP
				  }
				  else
				  {
				    ?>
				      <option value="<?=$id_article?>" ><?=$article?></option>   
                    <?PHP
				  }
		   }
		   ?>
               </select>
           <?PHP
	}

	
	function  query_article_sr($tb,$query_search,$link_anchor_popup)  //  Admin ข่าวสาร NEWS  query  ข่าว  1=ปักหมุด,0=ไม่ปักหมุด   
	{
           //###------- ตัวแปร------
		        //$pin_status=1;    //1=ปักหมุด,0=ไม่ปักหมุด    
			//	echo  br();
		       // $limit=10;     //จำนวนรายการทีแสดงทั้งหมดในหน้า admin
			  //  $id="id_tb_new";
				
			//	$ofset=0;
			//$link_anchor_popup="backoffice/show_popup_picture/";     //link  ที่ใช้ดึงภาพมาแสดง  popup  
		//    $this->db->order_by($id, "desc"); 
			//$query = $this->db->get_where('mytable', array('id' => $id), $limit, $offset);
			//$query=$this->db->get_where($tb,array('pin_pr'=>$pin_status),$limit,$ofset);
			 
			   $tb_join="tb_article";
			   $join_query=$tb.".id_article=".$tb_join.".id_article";
			   $this->db->join($tb_join,$join_query,'left');
			   $query=$this->db->get($tb);
			   //$query=$this->db->get_where($tb,array('pin_content'=>1),$limit,$ofset);
			
            $num_check=$query->num_rows();
			if( $num_check  > 0 )  //เปลี่ยนแปลงทีหลัง
			{//if
			       $image_properties_nopicture = array(  //ใช้ในกรณีไม่ได้ใส่รูปภาพประกอบเนื้อหา
          'src' => 'picture/no_picture5.jpg',
          'alt' => '',
          'class' => '',
          'width' => '50',
          //'height' => '50',
          'title' => '',
          'rel' => 'lightbox',
																				);	

				     foreach($query->result() as $row)  //ตรงนี้ต้องเปลี่ยนด้วย
					 { //##------------ begin foreach-----------------------------------------------
					        $id_content_article=$row->id_content_article;
							?>
							<input name="hid_id_tb_pr[]" id="hid_id_tb_pr[]" type="hidden" value="<?php echo $id_content_article; ?>" />
                            <?php
							$picture_content_article=$row->picture_content_article;
						    //$article=$row->article;
						      $article=$row->article_content;
							$id_article=$row->id_article;
							
							
							$alius_pic  =   $link_anchor_popup.''.$picture_content_article;
							$image_properties = array(
          'src' => 'picture/'.$picture_content_article,
          'alt' => '',
          'class' => '',
          'width' => '50',
          'height' => '50',
          'title' => '',
          'rel' => 'lightbox',
																				);		
								$title=$row->title;													
                                $DMY=$row->DMY; 
			        
					
		     $content_enable	=$row->content_enable;  //แสดงผล  0=ไม่แสดง,1=แสดง
			 $pin_content=$row->pin_content;   //1=ปักหมุด, 0=ไม่ปักหมุด

			 $data_checkbox_delete = array(
    'name'        => 'checkbox_del',
    'id'          => 'checkbox_del',
    'value'       =>$id_content_article ,
    'checked'     => FALSE,
    'style'       => 'margin:10px',
    );

 					
					
						  ?>
<!--<tr onmouseover="this.style.backgroundColor='#ffff66';" onmouseout="this.style.backgroundColor='#d4e3e5';">
-->
<tr onmouseover="this.style.backgroundColor='#ffff66';" onmouseout="this.style.backgroundColor='#FFFFFF';">
<td><?php echo  $id_content_article; ?></td>
<td>
<!--<img src="<?php echo base_url();?>picture/<?php echo  $picture_content_article;  ?>" width="50" border="1">-->
<?php   

if( $picture_content_article != "" )
{
			?>
                <img src="<?php echo  base_url(); ?>picture/<?php   echo  $picture_content_article;  ?>" width="50" height="50"/>
            <?php
}
else
{
           //echo  img($image_properties_nopicture);  //ถ้าไม่มีรูปภาพประกอบเนื้อหา
		    ?>
                <img src="<?php echo  base_url(); ?>picture/no_picture5.jpg" width="50"/>
            <?php
}			
?>
</td>
<td>
<?php 
echo  substr($title,0,150); 
?>
<?php echo br(); ?>

<?php
$image_edit_properties = array(
          'src' => 'images/ed1-re.jpg',
          'alt' => '',
          'class' => '',
          'width' => '13',
          'height' => '13',
          'title' => '',
          'rel' => 'lightbox',
);
 echo  img($image_edit_properties);
 echo  nbs(1);
?>
<!--<a href="<?=base_url()?>index.php/pr/send_editform/1/<?php echo   $id_content_article;  ?>">แก้ไข</a>-->
<!--<a href="<?=base_url()?>index.php/pr/pr_menu/4/<?php echo   $id_content_article;  ?>">แก้ไข</a>-->
<a href="<?=base_url()?>index.php/article/article_menu/4/<?php echo   $id_content_article;  ?>">แก้ไข</a>


<?php
$image_edit_properties = array(
          'src' => 'images/de4-re.jpg',
          'alt' => '',
          'class' => '',
          'width' => '13',
          'height' => '13',
          'title' => '',
          'rel' => 'lightbox',
);
   echo  img($image_edit_properties);
   echo  nbs(1);
?>


<!--<a href="#"  onclick="check_del(<?php echo  $id_content_article;  ?>)"  >ลบ</a>-->
<!--<a href="<?=base_url()?>index.php/pr/delete_table/<?php echo  $id_content_article;  ?>/tb_pr"  onclick="check_del()"  >ลบ</a>-->
<a href="#"  onclick="check_del(<?php echo  $id_content_article;  ?>)"  >ลบ</a>

 

 <?php
$image_edit_properties = array(
          'src' => 'images/pre5-re.jpg',
          'alt' => '',
          'class' => '',
          'width' => '20',
          'height' => '20',
          'title' => '',
          'rel' => 'lightbox',
);
 echo  img($image_edit_properties);
 echo  nbs(1);
?>

<!--<a href="<?=base_url()?>index.php/home/link_read_pr/<?=$id_content_article?>" target="_blank" >แสดงตัวอย่าง</a>-->
<a href="<?=base_url()?>index.php/home/link_read_article/<?=$id_content_article?>" target="_blank" >แสดงตัวอย่าง</a>


  <?php
$image_edit_properties = array(
          'src' => 'images/vi1-re.jpg',
          'alt' => '',
          'class' => '',
          'width' => '15',
          'height' => '15',
          'title' => '',
          'rel' => 'lightbox',
);
// echo  img($image_edit_properties);
// echo  nbs(1);
?>

<?php       //##----------  แสดงตัวอย่างภาพ ---------
									$pic_open = array(
												  'width'      => '220',
												  'height'     => '120',
												  'scrollbars' => 'yes',
												  'status'     => 'yes',
												  'resizable'  => 'yes',
												  'screenx'    => '300',
												  'screeny'    => '300'
												);
										if(   strlen($picture_content_article) > 0 )
										{
				                    			    echo  img($image_edit_properties);
												     echo  nbs(1);
												     echo   MY_anchor_popup($alius_pic, 'ตัวอย่างรูปภาพ', $pic_open);
										}
										else
										{
									       	//echo  "ตัวอย่างรูปภาพ";		
											       echo  img($image_edit_properties);	
												   echo  nbs(1);
												   echo   "ตัวอย่างรูปภาพ";
										}	 
?>
<!--<a href="#" onclick="dia1();" >ตัวอย่างรูปภาพ</a>-->

</td>

<td>  <!--หัวข้อหลักที่จะแสดงในหน้าเวปที่ต้องเพิ่ม-->
<?PHP    
echo   $article;    
//echo  $id_article;
//echo    $article_content;
?>
</td>

<td><?php  echo $DMY; ?></td>

<td>
<?php 
/*if(		$new_enable  == 0 )
{
			$data_checkbox_enable = array(
    'name'        => 'check_enable[]',
    'id'          => 'check_enable[]',
    'value'       => '1',
    'checked'     => FALSE,
    'style'       => 'margin:10px',
    );
}	
elseif(  $new_enable  == 1   )
{
			$data_checkbox_enable = array(
    'name'        => 'check_enable[]',
    'id'          => 'check_enable[]',
    'value'       => '1',
    'checked'     => TRUE,
    'style'       => 'margin:10px',
    );
}
//echo form_checkbox($data_checkbox);  // check_enable[] ปักหมุด 
*/
?>
<?php      // ปักหมุด  1=ปักหมุด, 0=ไม่ปัก
			 if( $pin_content == 1  )
             {
?>
					<input name="check_pin[]" id="check_pin[]" type="checkbox"    value="1" checked="checked" />
<?php
             }
             else
			 {
?>
                    <input name="check_pin[]" id="check_pin[]" type="checkbox"    value="0"  />
<?php
            }
?>
</td>


<td>
<?php  if( $content_enable  == 1  )    // 1=แสดงผล,0=ไม่แสดงผล
      {
?>
<input name="check_enable[]" id="check_enable[]" type="checkbox"    value="1" checked="checked" />
<?php   
       }
	   else
	   {
?>
<input name="check_enable[]" id="check_enable[]" type="checkbox"    value="1"  />
<?php
        }
?>
</td>


<!--<td>     
<input name="check_delete[]" id="check_delete[]" type="checkbox"    value="1"  />
</td>
-->


</tr>
                          <?php
					 }//end foreach##-----------------------------------------------
					
?>
			<script type="text/javascript">  //javacript  สำหรับส่งค่าไปลบค่าใน table ออก
              function  check_del(ck)  //check  ก่อนจะส่งไปลบ
			  {
				
//					if(  confirm('คุณต้องการลบใช่หรือไม่') == true )
//					 {
//							   alert(''+ck);
//						    //  window.location="<?=base_url()?>index.php/pr/delete_table/" +  ck  + "/tb_pr";
//						}
//						else
//						{
//						       window.close();
//							   return false;
//						}
						
					var   r=	 confirm('คุณต้องการลบใช่หรือไม่');
					if(  r == true)
					{
					        //   alert('t');
						   // window.location="<?=base_url()?>index.php/pr/delete_table/" +  ck  + "/tb_pr";
						    window.location="<?=base_url()?>index.php/article/delete_table/" +  ck  + "/tb_content_article";
					}
					else
					{
					       

						   return false;
					}
					
			  }
 			</script>
<?php
			} //endif
	}//end  function

	
	function  query_article($pin_status,$limit,$id,$tb,$ofset,$link_anchor_popup)  //  Admin ข่าวสาร NEWS  query  ข่าว  1=ปักหมุด,0=ไม่ปักหมุด   
	{
           //###------- ตัวแปร------
		        //$pin_status=1;    //1=ปักหมุด,0=ไม่ปักหมุด    
			//	echo  br();
		       // $limit=10;     //จำนวนรายการทีแสดงทั้งหมดในหน้า admin
			  //  $id="id_tb_new";
			//	$tb="tb_new";
			//	$ofset=0;
			//$link_anchor_popup="backoffice/show_popup_picture/";     //link  ที่ใช้ดึงภาพมาแสดง  popup  
			
			   $tb_join="tb_article";
			   $join_query=$tb.".id_article=".$tb_join.".id_article";
			   $this->db->join($tb_join,$join_query,'left');
			
		    $this->db->order_by($id, "desc"); 
			//$query = $this->db->get_where('mytable', array('id' => $id), $limit, $offset);
			$query=$this->db->get_where($tb,array('pin_content'=>$pin_status),$limit,$ofset);
            $num_check=$query->num_rows();
			if( $num_check  > 0 )  //เปลี่ยนแปลงทีหลัง
			{//if
			       $image_properties_nopicture = array(  //ใช้ในกรณีไม่ได้ใส่รูปภาพประกอบเนื้อหา
          'src' => 'picture/no_picture5.jpg',
          'alt' => '',
          'class' => '',
          'width' => '50',
          //'height' => '50',
          'title' => '',
          'rel' => 'lightbox',
																				);	

				     foreach($query->result() as $row)  //ตรงนี้ต้องเปลี่ยนด้วย
					 { //##------------ begin foreach-----------------------------------------------
					        $id_content_article=$row->id_content_article;
							?>
							<input name="hid_id_tb_pr[]" id="hid_id_tb_pr[]" type="hidden" value="<?php echo $id_content_article; ?>" />
                            <?php
							$picture_content_article=$row->picture_content_article;
							$alius_pic  =   $link_anchor_popup.''.$picture_content_article;
							$image_properties = array(
          'src' => 'picture/'.$picture_content_article,
          'alt' => '',
          'class' => '',
          'width' => '50',
          'height' => '50',
          'title' => '',
          'rel' => 'lightbox',
																				);		
								$title=$row->title;													
                                $DMY=$row->DMY; 
			        
					
		     $content_enable	=$row->content_enable;  //แสดงผล  0=ไม่แสดง,1=แสดง
			 $pin_content=$row->pin_content;   //1=ปักหมุด, 0=ไม่ปักหมุด

			 $data_checkbox_delete = array(
    'name'        => 'checkbox_del',
    'id'          => 'checkbox_del',
    'value'       =>$id_content_article ,
    'checked'     => FALSE,
    'style'       => 'margin:10px',
    );
	
	        $article=$row->article_content;
           
						  ?>
<!--<tr onmouseover="this.style.backgroundColor='#ffff66';" onmouseout="this.style.backgroundColor='#d4e3e5';">
-->
<tr onmouseover="this.style.backgroundColor='#ffff66';" onmouseout="this.style.backgroundColor='#FFFFFF';">
<td><?php echo  $id_content_article; ?></td>
<td>
<!--<img src="<?php echo base_url();?>picture/<?php echo  $picture_content_article;  ?>" width="50" border="1">-->
<?php   

if( $picture_content_article != "" )
{
			?>
                <img src="<?php echo  base_url(); ?>picture/<?php   echo  $picture_content_article;  ?>" width="50" height="50"/>
            <?php
}
else
{
           //echo  img($image_properties_nopicture);  //ถ้าไม่มีรูปภาพประกอบเนื้อหา
		    ?>
                <img src="<?php echo  base_url(); ?>picture/no_picture5.jpg" width="50"/>
            <?php
}			
?>
</td>
<td>
<?php 
echo  substr($title,0,150); 
?>
<?php echo br(); ?>

<?php
$image_edit_properties = array(
          'src' => 'images/ed1-re.jpg',
          'alt' => '',
          'class' => '',
          'width' => '13',
          'height' => '13',
          'title' => '',
          'rel' => 'lightbox',
);
 echo  img($image_edit_properties);
 echo  nbs(1);
?>
<!--<a href="<?=base_url()?>index.php/pr/send_editform/1/<?php echo   $id_content_article;  ?>">แก้ไข</a>-->
<a href="<?=base_url()?>index.php/article/article_menu/4/<?php echo   $id_content_article;  ?>">แก้ไข</a>
<?php
$image_edit_properties = array(
          'src' => 'images/de4-re.jpg',
          'alt' => '',
          'class' => '',
          'width' => '13',
          'height' => '13',
          'title' => '',
          'rel' => 'lightbox',
);
   echo  img($image_edit_properties);
   echo  nbs(1);
?>


<!--<a href="#"  onclick="check_del(<?php echo  $id_content_article;  ?>)"  >ลบ</a>-->
<!--<a href="<?=base_url()?>index.php/pr/delete_table/<?php echo  $id_content_article;  ?>/tb_pr"  onclick="check_del()"  >ลบ</a>-->
<a href="#"  onclick="check_del(<?php echo  $id_content_article;  ?>)"  >ลบ</a>

 

 <?php
$image_edit_properties = array(
          'src' => 'images/pre5-re.jpg',
          'alt' => '',
          'class' => '',
          'width' => '20',
          'height' => '20',
          'title' => '',
          'rel' => 'lightbox',
);
 echo  img($image_edit_properties);
 echo  nbs(1);
?>

<!--<a href="<?=base_url()?>index.php/home/link_read_pr/<?=$id_content_article?>" target="_blank" >แสดงตัวอย่าง</a>-->
<a href="<?=base_url()?>index.php/home/link_read_article/<?=$id_content_article?>" target="_blank" >แสดงตัวอย่าง</a>

  <?php
$image_edit_properties = array(
          'src' => 'images/vi1-re.jpg',
          'alt' => '',
          'class' => '',
          'width' => '15',
          'height' => '15',
          'title' => '',
          'rel' => 'lightbox',
);
// echo  img($image_edit_properties);
// echo  nbs(1);
?>

<?php       //##----------  แสดงตัวอย่างภาพ ---------
									$pic_open = array(
												  'width'      => '220',
												  'height'     => '120',
												  'scrollbars' => 'yes',
												  'status'     => 'yes',
												  'resizable'  => 'yes',
												  'screenx'    => '300',
												  'screeny'    => '300'
												);
										if(   strlen($picture_content_article) > 0 )
										{
				                    			    echo  img($image_edit_properties);
												     echo  nbs(1);
												     echo   MY_anchor_popup($alius_pic, 'ตัวอย่างรูปภาพ', $pic_open);
										}
										else
										{
									       	//echo  "ตัวอย่างรูปภาพ";		
											       echo  img($image_edit_properties);	
												   echo  nbs(1);
												   echo   "ตัวอย่างรูปภาพ";
										}	 
?>
<!--<a href="#" onclick="dia1();" >ตัวอย่างรูปภาพ</a>-->

</td>

<td>  <!--หัวข้อหลักที่เพิ่มเข้ามา-->
<?=$article?>
</td>

<td><?php  echo $DMY; ?></td>

<td>
<?php 
/*if(		$new_enable  == 0 )
{
			$data_checkbox_enable = array(
    'name'        => 'check_enable[]',
    'id'          => 'check_enable[]',
    'value'       => '1',
    'checked'     => FALSE,
    'style'       => 'margin:10px',
    );
}	
elseif(  $new_enable  == 1   )
{
			$data_checkbox_enable = array(
    'name'        => 'check_enable[]',
    'id'          => 'check_enable[]',
    'value'       => '1',
    'checked'     => TRUE,
    'style'       => 'margin:10px',
    );
}
//echo form_checkbox($data_checkbox);  // check_enable[] ปักหมุด 
*/
?>
<?php      // ปักหมุด  1=ปักหมุด, 0=ไม่ปัก
			 if( $pin_content == 1  )
             {
?>
					<input name="check_pin[]" id="check_pin[]" type="checkbox"    value="1" checked="checked" />
<?php
             }
             else
			 {
?>
                    <input name="check_pin[]" id="check_pin[]" type="checkbox"    value="0"  />
<?php
            }
?>
</td>


<td>
<?php  if( $content_enable  == 1  )    // 1=แสดงผล,0=ไม่แสดงผล
      {
?>
<input name="check_enable[]" id="check_enable[]" type="checkbox"    value="1" checked="checked" />
<?php   
       }
	   else
	   {
?>
<input name="check_enable[]" id="check_enable[]" type="checkbox"    value="1"  />
<?php
        }
?>
</td>


<!--<td>     
<input name="check_delete[]" id="check_delete[]" type="checkbox"    value="1"  />
</td>
-->


</tr>
                          <?php
					 }//end foreach##-----------------------------------------------
					
?>
			<script type="text/javascript">  //javacript  สำหรับส่งค่าไปลบค่าใน table ออก
              function  check_del(ck)  //check  ก่อนจะส่งไปลบ
			  {
				
//					if(  confirm('คุณต้องการลบใช่หรือไม่') == true )
//					 {
//							   alert(''+ck);
//						    //  window.location="<?=base_url()?>index.php/pr/delete_table/" +  ck  + "/tb_pr";
//						}
//						else
//						{
//						       window.close();
//							   return false;
//						}
						
					var   r=	 confirm('คุณต้องการลบใช่หรือไม่');
					if(  r == true)
					{
					        //   alert('t');
						  window.location="<?=base_url()?>index.php/article/delete_table/" +  ck  + "/tb_content_article";
					}
					else
					{
					       
						   return false;
					}
					
			  }
 			</script>
<?php
			} //endif
	}//end  function


  function    search_article_show($sr,$query_search)//backoffice/admin_leftmenu/2
  {
                                                       //##----  ตัวแปร
													   //$sr=  $sr=$this->input->get_post('search_');  มาจาก textbox ในการค้นหา
													   // $query_search  มาจาก   	 $this->db->order_by($id, "desc");  $this->db->like($field,$sr);   $query_search=$this->db->get($tb);
// 																  $data['title_admin']=$this->title_admin;
//																  $data['headleftmenu']="-: ระบบบริหารจัดการ";
//																  $data['leftmenu']="admin/left_menuadmin";
//																  $data['left1']="+ เพิ่มข่าวสาร";
//																  $data['link_left1']="backoffice/admin_leftmenu/1";
//																  $data['left2']="+ แก้ไข / ลบ (แสดงเนื้อหาทั้งหมด)";
//																  $data['link_left2']= "backoffice/admin_leftmenu/2";
//																  $data['link_anchor_popup']="backoffice/show_popup_picture/";
//																  $data['right_content']="admin/news/editnew";
																  
											// $data['title_admin']=$this->title_admin; //1
											
										   $data['title_admin']="กลุ่มงานสร้างเสริมสุขภาพ โรงงพยาบาลขอนแก่น";
//											  $data['headleftmenu']="-: ระบบบริหารจัดการ"; //2
//											  $data['leftmenu']="admin/left_menuadmin";  //3
//											  $data['left1']="+ เพิ่มข่าวประชาสัมพันธ์"; //4
//											  $data['link_left1']="pr/pr_menu/2"; //5
//											  $data['left2']="+ แก้ไข / ลบ (แสดงเนื้อหาทั้งหมด)";  //6
//											  $data['link_left2']="pr/pr_menu/3";  //7
//											 $data['right_content']="admin/pr/editpr";//8  ====>ตัวแปรที่เปลี่ยนไป***********************
										
										
									  $data['link_anchor_popup']="backoffice/show_popup_picture/";
									  $data['headleftmenu']="-: ระบบบริหารจัดการ"; //2
								      $data['leftmenu']="admin/left_menuadmin";  //3
									  $data['left1']="+ เพิ่มเนิ้อหาในระบบ"; //4
									  $data['link_left1']="article/article_menu/2"; //5
									  
									  $data['left2']="+ แก้ไข / ลบ (แสดงเนื้อหาทั้งหมด)";  //6
									  $data['link_left2']="article/article_menu/3";  //7
									  
									 $data['right_content']='admin/article/editArticle'; 



																  //##### ------------------  query  เนื้อหาทั้งหมดใน tb_new -----------------------
																//  $query1_pin=$this->db->get_where('tb_new',array('pin_new'=>1));
																//  $query1_unpin=$this->db->get_where('tb_new',array('pin_new'=>0));
															   // $this->querymodels->query_new();
															   	   //###------- ตัวแปร----//query_new($pin_status,$limit,$id,$tb,$ofset)
																	//$data['pin_status'] =1;   //1=ปักหมุด,0=ไม่ปักหมุด
																	$data['limit']=10;     //จำนวนรายการทีแสดงทั้งหมดในหน้า admin
																	$data['id']="id_content_article";
																	$data['tb']="tb_content_article";
																	$data['ofset']=0;
																	//$data['query_search']=$query_search;
																	$data['sr']=$sr; //เพิ่มเข้ามาใหม่ในการค้นหา
																	$data['query_search']=$query_search;  //เพิ่มเข้ามาใหม่ในการค้นหา
																    $this->load->view('admin/home_admin2',$data);  //เพิ่มเข้ามาใหม่ในการค้นหา
																	
						//#=================================
  }


}//end class


?>

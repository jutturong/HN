<?php   if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Querymodels extends  CI_Model {

    function Querymodels()  //model  การ query ทั้งหมด
    {
        //parent::CI_Model();
		   parent::__construct();
    }
//##------------##################------------  syte,css,javascript ----------------------------------------	
   function  DATE_TIME() //date time เวลาในการบันทึก
   {
   			$datestring = "%Y-%m-%d %d:%h:%i";
		    $time = time();
	        return   mdate($datestring,$time);
   }
   
   
    function   jquery_import() // import css,js  jquery
	{
         ?>	
                                     <link rel="stylesheet" href="<?php   echo  base_url(); ?>jquery_ui_1.9.2/dev/themes/ui-lightness/jquery-ui.css" />
                                     <script src="<?php   echo  base_url(); ?>jquery_ui_1.9.2/js/jquery-1.8.3.js"></script>
                                     <script src="<?php   echo  base_url(); ?>jquery_ui_1.9.2/dev/ui/jquery.ui.core.js"></script>
                                     <script src="<?php   echo  base_url(); ?>jquery_ui_1.9.2/dev/ui/jquery-ui.custom.js"></script>
           <?php
	}
	function    import_css() // สำหรับหน้า   css template   website  ทั้งหมด
	{
	      ?>
								 <!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
								 <script src="<?=base_url()?>js_IE9/html5.js"></script>
								 <!--[if lte IE 7]><link rel="stylesheet" href="style.ie7.css" media="screen" /><![endif]-->
								 <!--<script src="<?=base_url()?>js_IE7/style.ie7.css"></script>-->
								<link rel="stylesheet" href="<?=base_url()?>style.css" media="screen">
								<link rel="stylesheet" href="<?=base_url()?>style.responsive.css" media="all">
								 <script src="<?=base_url()?>jquery.js"></script>
								<script src="<?=base_url()?>script.js"></script>
								<script src="<?=base_url()?>script.responsive.js"></script>
            <?php
	}
	function   import_style()   // สำหรับหน้า   css template   website  ทั้งหมด
	{
	         ?>
					    <style>
						.art-content .art-postcontent-0 .layout-item-0 { margin-bottom: 20px;  }
						.art-content .art-postcontent-0 .layout-item-1 { color: #133239; background: #E4EFF1;  }
						.art-content .art-postcontent-0 .layout-item-2 { color: #C2E2EB; background: #44526F; padding: 0px;  }
						.art-content .art-postcontent-0 .layout-item-3 { color: #C2E2EB; background: #44526F; padding: 20px;  }
						.art-content .art-postcontent-0 .layout-item-4 { margin-bottom: 5px;  }
						.art-content .art-postcontent-0 .layout-item-5 { border-right-style:Dotted;border-right-width:1px;border-right-color:#CCCCCC; padding-right: 20px;padding-left: 20px;  }
						.art-content .art-postcontent-0 .layout-item-6 { padding-right: 20px;padding-left: 20px;  }
						.art-content .art-postcontent-0 .layout-item-7 { margin-top: 20px;  }
						.art-content .art-postcontent-0 .layout-item-8 { padding: 20px;  }
						.art-content .art-postcontent-0 .layout-item-9 { color: #112B32; background: #CCCCCC; padding: 20px;  }
						.ie7 .post .layout-cell {border:none !important; padding:0 !important; }
						.ie6 .post .layout-cell {border:none !important; padding:0 !important; }
						</style>
						<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	         <?php
	}
//##----------------------- การส่งค่า query ใน function  switch  ของ admin_leftmenu()  //left sub menu  case   2:  //แก้ไข/ลบ  (แสดงเนื้อหาทั้งหมด)	
  function    admin_leftmenu_switch_2($sr,$query_search)//backoffice/admin_leftmenu/2
  {
                                                       //##----  ตัวแปร
													   //$sr=  $sr=$this->input->get_post('search_');  มาจาก textbox ในการค้นหา
													   // $query_search  มาจาก   	 $this->db->order_by($id, "desc");  $this->db->like($field,$sr);   $query_search=$this->db->get($tb);
 																  $data['title_admin']=$this->title_admin;
																  $data['headleftmenu']="-: ระบบบริหารจัดการ";
																  $data['leftmenu']="admin/left_menuadmin";
																  
																  $data['left1']="+ เพิ่มข่าวสาร";
																  $data['link_left1']="backoffice/admin_leftmenu/1";
																  
																  $data['left2']="+ แก้ไข / ลบ (แสดงเนื้อหาทั้งหมด)";
																  $data['link_left2']= "backoffice/admin_leftmenu/2";
																  
																  $data['link_anchor_popup']="backoffice/show_popup_picture/";
																  
																  $data['right_content']="admin/news/editnew";
																  
																  //##### ------------------  query  เนื้อหาทั้งหมดใน tb_new -----------------------
																//  $query1_pin=$this->db->get_where('tb_new',array('pin_new'=>1));
																//  $query1_unpin=$this->db->get_where('tb_new',array('pin_new'=>0));
															   // $this->querymodels->query_new();
															   
															   	   //###------- ตัวแปร----//query_new($pin_status,$limit,$id,$tb,$ofset)
																	//$data['pin_status'] =1;   //1=ปักหมุด,0=ไม่ปักหมุด
																	$data['limit']=$this->limit_list;     //จำนวนรายการทีแสดงทั้งหมดในหน้า admin
																	$data['id']="id_tb_new";
																	$data['tb']="tb_new";
																	$data['ofset']=0;
																	//$data['query_search']=$query_search;
																	$data['sr']=$sr; //เพิ่มเข้ามาใหม่ในการค้นหา
																	$data['query_search']=$query_search;  //เพิ่มเข้ามาใหม่ในการค้นหา
																    $this->load->view('admin/home_admin2',$data);  //เพิ่มเข้ามาใหม่ในการค้นหา
  }
//##################  query  ข่าวหน้ารวม  แก้ไข/ลบ แสดงเนื้อหาทั้งหมด  NEWS  Admin page   ###############################
    function  news($query,$link_anchor_popup) //เป็นหน้ารวม  ค้นหา,แก้ไข,ลบ   ของหน้า ADMIN
	{
				   //##---------- ตัวแปรที่ต้องใช้
				  //$link_anchor_popup="backoffice/show_popup_picture/";
				  
				     foreach($query->result() as $row)  //ตรงนี้ต้องเปลี่ยนด้วย
					 { //##------------ begin foreach-----------------------------------------------
					        $id_tb_new=$row->id_tb_new;
							?>
							<input name="hid_id_tb_new[]" id="hid_id_tb_new[]" type="hidden" value="<?php echo $id_tb_new; ?>" />
                            <?php
							$new_picture=$row->new_picture;
							$alius_pic  =   $link_anchor_popup.''.$new_picture;
							$image_properties = array(
          'src' => 'picture/'.$new_picture,
          'alt' => '',
          'class' => '',
          'width' => '50',
          'height' => '50',
          'title' => '',
          'rel' => 'lightbox',
																				);		
								$title=$row->title;													
                                $DMY=$row->DMY; 
			        
					
		     $new_enable	=$row->new_enable;  //แสดงผล  0=ไม่แสดง,1=แสดง
			 $pin_new=$row->pin_new;   //1=ปักหมุด, 0=ไม่ปักหมุด

			 $data_checkbox_delete = array(
    'name'        => 'checkbox_del',
    'id'          => 'checkbox_del',
    'value'       =>$id_tb_new ,
    'checked'     => FALSE,
    'style'       => 'margin:10px',
    );

					
						  ?>
<!--<tr onmouseover="this.style.backgroundColor='#ffff66';" onmouseout="this.style.backgroundColor='#d4e3e5';">
-->
<tr onmouseover="this.style.backgroundColor='#ffff66';" onmouseout="this.style.backgroundColor='#FFFFFF';">
<td><?php echo  $id_tb_new; ?></td>
<td>
<!--<img src="<?php echo base_url();?>picture/<?php echo  $new_picture;  ?>" width="50" border="1">-->
<?php   

if( $new_picture != "" )
{
			?>
                <img src="<?php echo  base_url(); ?>picture/<?php   echo  $new_picture;  ?>" width="50" height="50"/>
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
<a href="<?=base_url()?>index.php/backoffice/send_editform/1/<?php echo   $id_tb_new;  ?>">แก้ไข</a>    

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
<a href="#"  onclick="check_del(<?php echo  $id_tb_new;  ?>)"  >ลบ</a>


 

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

<a href="<?=base_url()?>index.php/home/link_read_new/<?=$id_tb_new?>" target="_blank" >แสดงตัวอย่าง</a>

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
										if(   strlen($new_picture) > 0 )
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
			 if( $pin_new == 1  )
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
<?php  if( $new_enable  == 1  )    // 1=แสดงผล,0=ไม่แสดงผล
      {
?>
<input name="check_enable[]" id="check_enable[]" type="checkbox"    value="1" checked="checked" />
<?php   
       }
	   else
	   {
?>
<input name="check_enable[]" id="check_enable[]" type="checkbox"    value="0"  />
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
	}
	
##======================================= ADMIN  NEW  operation ============================================	
	function  query_new($pin_status,$limit,$id,$tb,$ofset,$link_anchor_popup)  //  Admin ข่าวสาร NEWS  query  ข่าว  1=ปักหมุด,0=ไม่ปักหมุด   
	{
           //###------- ตัวแปร------
		        //$pin_status=1;    //1=ปักหมุด,0=ไม่ปักหมุด    
			//	echo  br();
		       // $limit=10;     //จำนวนรายการทีแสดงทั้งหมดในหน้า admin
			  //  $id="id_tb_new";
			//	$tb="tb_new";
			//	$ofset=0;
			//$link_anchor_popup="backoffice/show_popup_picture/";     //link  ที่ใช้ดึงภาพมาแสดง  popup  
		    $this->db->order_by($id, "desc"); 
			//$query = $this->db->get_where('mytable', array('id' => $id), $limit, $offset);
			$query=$this->db->get_where($tb,array('pin_new'=>$pin_status),$limit,$ofset);
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
					        $id_tb_new=$row->id_tb_new;
							?>
							<input name="hid_id_tb_new[]" id="hid_id_tb_new[]" type="hidden" value="<?php echo $id_tb_new; ?>" />
                            <?php
							$new_picture=$row->new_picture;
							$alius_pic  =   $link_anchor_popup.''.$new_picture;
							$image_properties = array(
          'src' => 'picture/'.$new_picture,
          'alt' => '',
          'class' => '',
          'width' => '50',
          'height' => '50',
          'title' => '',
          'rel' => 'lightbox',
																				);		
								$title=$row->title;													
                                $DMY=$row->DMY; 
			        
					
		     $new_enable	=$row->new_enable;  //แสดงผล  0=ไม่แสดง,1=แสดง
			 $pin_new=$row->pin_new;   //1=ปักหมุด, 0=ไม่ปักหมุด

			 $data_checkbox_delete = array(
    'name'        => 'checkbox_del',
    'id'          => 'checkbox_del',
    'value'       =>$id_tb_new ,
    'checked'     => FALSE,
    'style'       => 'margin:10px',
    );

					
						  ?>
<!--<tr onmouseover="this.style.backgroundColor='#ffff66';" onmouseout="this.style.backgroundColor='#d4e3e5';">
-->
<tr onmouseover="this.style.backgroundColor='#ffff66';" onmouseout="this.style.backgroundColor='#FFFFFF';">
<td><?php echo  $id_tb_new; ?></td>
<td>
<!--<img src="<?php echo base_url();?>picture/<?php echo  $new_picture;  ?>" width="50" border="1">-->
<?php   

if( $new_picture != "" )
{
			?>
                <img src="<?php echo  base_url(); ?>picture/<?php   echo  $new_picture;  ?>" width="50" height="50"/>
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
<a href="<?=base_url()?>index.php/backoffice/send_editform/1/<?php echo   $id_tb_new;  ?>">แก้ไข</a>    

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
<a href="#"  onclick="check_del(<?php echo  $id_tb_new;  ?>)"  >ลบ</a>


 

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

<a href="<?=base_url()?>index.php/home/link_read_new/<?=$id_tb_new?>" target="_blank" >แสดงตัวอย่าง</a>

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
										if(   strlen($new_picture) > 0 )
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
			 if( $pin_new == 1  )
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
<?php  if( $new_enable  == 1  )    // 1=แสดงผล,0=ไม่แสดงผล
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
						 //var  count = $(ck).length;
						 //var  val=$(ck).val();
						 //var   th=$(ck);
						 // alert(''+val);
						if(  confirm('คุณต้องการลบใช่หรือไม่') )
						{
							  // alert(''+ck);
							 // window.location="<?=base_url()?>index.php/backoffice/delete_table/<?=$id_tb_new?>/tb_new";
							   window.location="<?=base_url()?>index.php/backoffice/delete_table/" +  ck  + "/1";
						}
			  }
 			</script>
<?php
			} //endif
	}//end  function
	
	function  home_query_new($pin,$limit) //#######หน้าหลัก ข่าวสารกลุ่มงานสร้างเสริมสุขภาพ  ( home  )   
	{
			$this->db->order_by("id_tb_new", "desc"); 
        	$query=$this->db->get_where('tb_new',array('new_enable'=>1,'pin_new'=>$pin),$limit,0);
			 $num_check=$query->num_rows();
			if( $num_check  > 0 )  //เปลี่ยนแปลงทีหลัง
			{//if
			         foreach($query->result() as $row)  //ตรงนี้ต้องเปลี่ยนด้วย
					 {
								$id_tb_new=$row->id_tb_new;
							    $new_picture=$row->new_picture;
								$title=$row->title;													
                                $DMY=$row->DMY; 
								//$new_enable=$row->new_enable;
								 ?>
                                 <?php
								     if(  strlen($new_picture) > 0  )
									 {
								 ?>
								 <p><img width="100" height="100" alt="" src="<?=base_url()?>picture/<?php echo $new_picture; ?>" style="float: left; margin-right: 20px; " /></p>
                                  <?php
								      }
								     elseif(    strlen($new_picture)  == 0       )
									 {
								 ?>
								 <p><img width="100" height="100" alt="" src="<?=base_url()?>picture/no_picture5.jpg" style="float: left; margin-right: 20px; " /></p>
                                  <?php
								      }
								  ?>
                                 <?php
								  echo "<p style=\"font-weight: bold;\">".DMY_thai_convert($DMY)."</p>";    //DMY_thai_convert($DMY);  //MY_helpers  
								   echo "<p>";
								  if(  $pin  == 1   )  //ปักหมุด
															  {
															      ?>
															               <img width="30" height="30" alt="" src="<?=base_url()?>images/pin3.gif"  />
                                                                   <?php
															  }
															  
							    $check_length_title=strlen($title); //ตรวจสอบความยาวของ title เพื่อเพิ่มความยาวไม่ให้ข้อความเบียดกัน
							    $limit_title=substr($title,0,150);
								
								
								
								//index.php/home/link_read_new/id_new_table
								
								  echo "<img src=\"".base_url()."images/dot1.gif\">";  
								  echo   nbs(1);
								
							    echo   "<a href=\"".base_url()."index.php/home/link_read_new/".$id_tb_new."\"  target=\"_blank\"  >".$limit_title."</a>";
								echo  br();
								//echo  $check_length_title;
								echo  br();
								if(  $check_length_title  < 10 )
								{
								      for($a=1;$a<=5;$a++)
									  {
									       echo  nbs($a);
										  // echo  "<hr>";
										   //echo br();
									  }	   
								}
								
								echo   "</p>";
								//echo  nbs(1);
								?>
								<!--<p><a href="<?=base_url()?>index.php/home/link_read_new/<?php  echo  $id_tb_new;  ?>" class="art-button" target="_blank">อ่านเพิ่ม</a></p>-->
								<?php  echo   br();  ?>
						        <?php
                        }//end foreach
						?>
						<?php
			  }//end  if					
	}//end  function
	
	function     query_new_all_content_check_pin($pin,$tb,$id,$limit,$ofset)//หน้า    ข่าวรวม   อ่านข่าวทั้งหมดจากหน้าหลัก    แต่มีข้อแม้ในการปักหมุด
	{
	       			//##----------  ตัวแปร ------------
					   //$pin  => 1 ปักหมุด  ,0 ไม่ปักหมุด
					//  $tb="tb_new";  //ชื่อ table
					 //  $id="id_tb_new";  //ชื่อ  id  ของ table
					 //  $limit=3;  
					 //  $ofset=1;
					  //##----------  ตัวแปร ------------ 
					    $no_picture="no_picture5.jpg";
						
						 $this->db->order_by($id, "desc");
						 $query=$this->db->get_where($tb,array('new_enable'=>1,'pin_new'=>$pin), $limit,$ofset);
						
					   $row_check=$query->num_rows();
						if( $row_check  > 0 )
						{
													   foreach($query->result() as $row)
													   {
															   $id_tb_new=$row->id_tb_new;
															   $title=$row->title;
															   $new_picture=$row->new_picture;
															   $content=$row->content;
																$DMY=$row->DMY;
															  
																if( strlen($new_picture) > 0 )  //###############------------------- รูปภาพ
																{
																				echo "<p>";
																				echo"<img width=\"100\" height=\"100\" alt=\"\" src=\"".base_url()."picture/".$new_picture."\" style=\"float:left;margin-right:10px;\" />";
																				echo  "</p>";
																}
																else  //#####------------ กรณีไม่ได้ up รูปภาพตัวอย่าง
																{
																				echo "<p>";
																				echo"<img width=\"100\" height=\"100\" alt=\"\" src=\"".base_url()."picture/".$no_picture."\" style=\"float:left;margin-right:10px;\" />";
																				echo  "</p>";
								
																}	
																
																
															 echo "<p style=\"font-weight: bold;\">".DMY_thai_convert($DMY)."</p>";    //DMY_thai_convert($DMY);  //MY_helpers    วัน เดือน ปี  เวลา
								
															  echo  "<p>";   //###------------------------- หัวข้อ
															  echo "<img src=\"".base_url()."images/dot1.gif\">";  
															  echo  nbs(1);
															  echo     "<a href=\"".base_url()."index.php/home/link_read_new/".$id_tb_new."/home/test/\"   target=_blank  >".$title."</a>";
															  //echo  "</p>";
								
																
																//echo"<p>";  //#####------------------- เนื้อหาข่าว content
																//echo   substr($content,0,100);
																//echo"</p>";
																
																if(  $pin  == 1   )  //ปักหมุด
																							  {
																								  ?>
																										   <img width="30" height="30" alt="" src="<?=base_url()?>images/pin3.gif"  />
																								   <?php
																							  }
																							  
																 echo  "</p>";							  
																
																for($i=0;$i<=4;$i++)   //##----------------- ขึ้นบรรทัดใหม่
																{
																			echo br(); 
																}
													   }//end foreach
									}//end  if				   
	}
	
	
		function     query_new_all_content($tb,$id,$limit,$ofset)//หน้า    ข่าวรวม   อ่านข่าวทั้งหมดจากหน้าหลัก    ไม่มีการเลือกว่าปักหมุดหรือไม่ปัก
	{
	       			//##----------  ตัวแปร ------------
					//  $tb="tb_new";  //ชื่อ table
					 //  $id="id_tb_new";  //ชื่อ  id  ของ table
					 //  $limit=3;  
					 //  $ofset=1;
					  //##----------  ตัวแปร ------------ 
					     $no_picture="no_picture5.jpg";
						 $this->db->order_by($id, "desc");
						//echo  $limit;
						//echo  $ofset;
						if( $ofset  < 0 ) {  $ofset = 0;  }
						 $query=$this->db->get_where($tb,array('new_enable'=>1), $limit,$ofset);
						 
					   $row_check=$query->num_rows();
						if( $row_check  > 0 )
						{
													   foreach($query->result() as $row)
													   {
															   $id_tb_new=$row->id_tb_new;
															   $title=$row->title;
															   $new_picture=$row->new_picture;
															   $content=$row->content;
																$DMY=$row->DMY;
															  
																if( strlen($new_picture) > 0 )  //###############------------------- รูปภาพ
																{
																				echo "<p>";
																				echo"<img width=\"100\" height=\"100\" alt=\"\" src=\"".base_url()."picture/".$new_picture."\" style=\"float:left;margin-right:10px;\" />";
																				echo  "</p>";
																}
																else  //#####------------ กรณีไม่ได้ up รูปภาพตัวอย่าง
																{
																				echo "<p>";
																				echo"<img width=\"100\" height=\"100\" alt=\"\" src=\"".base_url()."picture/".$no_picture."\" style=\"float:left;margin-right:10px;\" />";
																				echo  "</p>";
								
																}	
																
																
															 echo "<p style=\"font-weight: bold;\">".DMY_thai_convert($DMY)."</p>";    //DMY_thai_convert($DMY);  //MY_helpers    วัน เดือน ปี  เวลา
								
															  echo  "<p>";   //###------------------------- หัวข้อ
															  echo "<img src=\"".base_url()."images/dot1.gif\">";  
															  echo  nbs(1);
															  echo     "<a href=\"".base_url()."index.php/home/link_read_new/".$id_tb_new."/home/test/\"   target=_blank  >".$title."</a>";
															  //echo  "</p>";
								
																
																//echo"<p>";  //#####------------------- เนื้อหาข่าว content
																//echo   substr($content,0,100);
																//echo"</p>";
																
/*																if(  $pin  == 1   )  //ปักหมุด
																							  {
																								  ?>
																										   <img width="30" height="30" alt="" src="<?=base_url()?>images/pin3.gif"  />
																								   <?php
																							  }
*/																							  
																							  
																							  
																 echo  "</p>";							  
																
																for($i=0;$i<=4;$i++)   //##----------------- ขึ้นบรรทัดใหม่
																{
																			echo br(); 
																}
													   }//end foreach
									}//end  if				   
	}

	
	function   change_page($tb,$list_limit,$link_control,$id_enable,$va_enable)//เปลี่ยนหน้าของเนื้อหา  ใช้สำหรับหน้า  HOME
	{
			   //##----- นิยามตัวแปร
			         //  $tb   //ตาราง
				     //  $list_limit=3;   //แสดงรายการสูงสุดต่อหน้า  ทั้งปักหมุดและไม่ปักหมุด
			        //   $link_control= base_url()."index.php/home/change_page";  //ตัวแปรในการส่งไป function   home/
					 // $id_enable='new_enable';   //ค่ามีแสดงผลได้ โดย admin  สั่งให้แสดงผล
					//  $va_enable=1;
					
				
				//echo "<p>";
				
				echo   form_open($link_control);
				//echo   "<input  name=\"begin_page\"   id=\"begin_page\"   value=\"1\"  type=\"image\" src=\"".base_url()."images/previous.png\"  width=\"25\"/>";
			    //echo  nbs(2);
				
			   $query_page=$this->db->get_where($tb,array($id_enable=>$va_enable)); //var
			   $max_row= $query_page->num_rows();  //จำนวนสูงสุดของ row ใน table
		      
			   $page=ceil( $max_row/$list_limit);   //ได้จำนวนหน้า
			   //echo  ceil(35/10);
				
				echo  "<select   id=\"page\"  name=\"page\"  >";
				echo   "<option  value=\"\"> : เลือกหน้า : </option>";
				for($i=1;$i<=$page;$i++)
				{
						echo  "<option value=".$i.">".$i."</option>";
				}
				 echo  "</select>";
				
				//echo nbs(2);
				//echo   "<input name=\"finish_page\"   id=\"finish_page\"    type=\"image\" src=\"".base_url()."images/next.png\"  width=\"25\"  value=\"55\"  />";
				echo   nbs(2);
				
				 //echo   "<input name=\"\"  id=\"\"  type=\"image\" src=\"".base_url()."images/repeat.png\"  width=\"25\"    />";
				 //echo  nbs(2);
	             echo   "จำนวนทั้งหมด";	
				 echo  nbs(1);
				 echo     $max_row;	
				 echo  nbs(1);
				 echo  "รายการ";
				echo  form_close();
				//echo  "</p>";  
			
				?>
                         <script type="text/javascript">
									   $(function()
											   {
															$('#page').change(function()
															       {
																         var  send_link=''+ '<?=$link_control?>/' + $(this).val();
																		 //alert(send_link);
																		  window.location=send_link;
																   }
																);   
											   }
									   );
                         </script>
                <?php
	}
//##------------------- การ update  NEW ทั้งหมด
function  send_update($page)// ส่งไป form //echo   form_open_multipart('backoffice/all_update_form'); เพื่อ update ข้อมูลทั้งหมด
{
   				//ตัวแปร
				    //$page=2;
					
				?>
                <input type="submit" value="บันทึก" />
                <input type="reset" value="ล้าง" />
				<input name="send_page_update"  id="send_page_update"  type="hidden" value="<?=$page?>" />
                <?php
}	
//##########--------------------------- การค้นหา-------------------------------	
function    search_query($url)//สำหรับการค้นหาค่าต่าง  ADMIN
{
				//###--------  ค่าของตัวแปร
				//$url="backoffice/search_keyword/";
	             echo   form_open($url);
				 echo form_label('ค้นหา : ', '');
        ?>
                    <input name="search_"   value=""   type="text"  id="name=" size="10" maxlength="10" />
                 <?php   echo  form_close();  ?>
                    <script type="text/javascript">
                           $(function()
						   {
                                        $(document).keypress(function(e) {
											if(e.which == 13) {
												//alert('You pressed enter!');
												var   url_link='<?=$url?>';
												//alert(''+url_link);
												  window.location=url_link;
											}
										});
						   }
						   );
                    </script>
        <?php
}
function  search_keyword($sr)  //การ query  ในการค้นหา
{
		     //===== ใส่ตัวแปร
			         $tb="tb_new";
					 $field="title";
					 $limit=5;
					 $id="id_tb_new";  //ใช้สำหรั้บ order_by
					//$ofset=0;
					$url_redirect="backoffice/admin_leftmenu/2";
					 
			  if(  strlen($sr)  > 0 )
			  {
			       	 $this->db->order_by($id, "desc");
				    $this->db->like($field,$sr); 
				    $query=$this->db->get($tb);
					$this->db->limit($limit);
				    $ck_num=$query->num_rows();
					//$ck_num=0;
					if(  $ck_num  > 0 )
					{
					        
					}
					else
					{
					     ?>
                               <script type="text/javascript">
                                         alert('ไม่พบรายการที่ค้นหา');
                               </script>
                         <?php       redirect($url_redirect);
					}
					
			  }
}
##========== VISON วิสัยทัศน์(vision)/พันธกิจ==================================
function  query_table($tb,$id,$id_field,$field_name)//ดึงข้อมูลแสดงเพื่อ update ข้อมูล
{
          //##==== ตัวแปร
			//          $tb="tb_vision";
			//		  $id=1;
			//		  $id_field="id_tb_vision";
			//		  $field_name="DMY_vision";
			
		  $query=$this->db->get_where($tb,array($id_field=>$id));
		  $check_rows=$query->num_rows();
		  if( $check_rows > 0 )
		  {
		                $row= $query->row_array();
				    	return     $row[$field_name];
		  }
}

function  query_vision_enable($tb,$id,$id_field,$field_name)//ดึงข้อมูลแสดงเพื่อ update ข้อมูล
{
          //##==== ตัวแปร
			//          $tb="tb_vision";
			//		  $id=1;
			//		  $id_field="id_tb_vision";
			//		  $field_name="DMY_vision";
			
		  $query=$this->db->get_where($tb,array($id_field=>$id,'enable_vision'=>1));
		  $check_rows=$query->num_rows();
		  if( $check_rows > 0 )
		  {
		                $row= $query->row_array();
				    	return     $row[$field_name];
		  }
}

//####===================LEFT MENU ADMIN=========
function   query_leftmenu()
{
		                    //###------- ตัวแปร------
		        //$pin_status=1;    //1=ปักหมุด,0=ไม่ปักหมุด    
			//	echo  br();
		       // $limit=10;     //จำนวนรายการทีแสดงทั้งหมดในหน้า admin
			  //  $id="id_tb_new";
			//	$tb="tb_new";
			//	$ofset=0;
			//$link_anchor_popup="backoffice/show_popup_picture/";     //link  ที่ใช้ดึงภาพมาแสดง  popup  

				 //##=== ตัวแปร
				  $tb="tb_head_leftmenu";
				  $id="id_head_leftmenu";
				  $limit=10;     //จำนวนรายการทีแสดงทั้งหมดในหน้า admin 
			       $ofset=0;
				   $link_form="menu/del_multi_processer";
				   
?>
<?php      echo   form_open($link_form);     ?>
<script type="text/javascript">
      $(function()
	  {
	        $('#save_form').button({         icons:{  primary:"ui-icon-clipboard" }         });
			$('#reset_form').button({         icons:{  primary:"ui-icon-clipboard" }         });
	  }
	  );
</script>
<table class="imagetable" cellpadding="0" cellspacing="0">
<tr>
<td colspan="3">
</td>
<td colspan="4">
<button id="save_form" type="submit">Save</button>
<button id="reset_form" type="reset">Reset</button>
</td>
</tr>
<tr>
	<th colspan="2">หัวข้อข่าวสาร</th>
<!--    <th>ลำดับที่</th>
    <th>รูปภาพประกอบ</th>
    <th>หัวข้อข่าวสาร (NEWS)</th>
-->    
    <th>วันที่/เวลา</th>
  <!--  <th>ปักหมุด</th>-->
   <!-- <th>แสดงผล</th>-->
    <th>สถานะ</th>
    <th>สถานะ ON/OFF</th>
  <!--  <th>Show/hidden</th>-->
     <th>ลบ</th>
    
</tr>
         <?php
				     //  $this->db->order_by($id, "desc");  
				 // $this->db->limit($limit,$ofset);
				   $query=$this->db->get_where($tb,array('delete_status'=>1));
				  //   $query=$this->db->get($tb);
				   $check = $query->num_rows();
				   if(   $check > 0 )
				   {
							   foreach( $query->result() as $row)
							   {
								       $id_head_leftmenu=$row->id_head_leftmenu;
									    $headmenu=$row->headmenu;
									   $DMY=$row->DMY;
									   
									   $menu_enable=$row->menu_enable; //1=แสดงผล 0=ไม่แสดงผล
									   
									   $delete_status=$row->delete_status;  //0=delte,1=show
									   
									   switch($menu_enable)
									   {
									       case 0:
										   {
										         $enable_icon="wrong.jpg";
										        break;
										   }
										   case 1:
										   {
										           $enable_icon="right.jpg";
										        break;
										   }
									   }
									   
									   //echo   DMY_thai_convert($DMY);  //helper
									  ?>
								   <tr>
                                     <td><?=$id_head_leftmenu?></td>
                                      <td>
									  <?=$headmenu?>
                               
							   <?=br();?>              
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
                                <a href="#" id="edit<?=$id_head_leftmenu?>">แก้ไข</a>    
                                      
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
									<a href="#"  id="check_del<?=$id_head_leftmenu?>"  >ลบ</a>

                                     
                                      </td>
                                      <td><?=DMY_thai_convert($DMY)?></td>
                                     
                                      <td>
                                                 <img src="<?=base_url()?>images/<?=$enable_icon?>"  width="30" />
                                      </td>
                                      
                                       <td>
                                       <?php
									     if( $menu_enable == 1 )
										 {
									   ?>
                                       <input name="array_on_off[]" type="checkbox" value="<?=$id_head_leftmenu?>"  checked="checked"/>
                                       <?php
									     }elseif( $menu_enable== 0 )
										 {
									   ?>
                                      <input name="array_on_off[]" type="checkbox" value="<?=$id_head_leftmenu?>"  />
                                       <?php
									      }
									   ?>
                                       
                                       </td>
                                      
                                       
                                      
                                        
                                       <td><input name="array_delete[]" type="checkbox" value="<?=$id_head_leftmenu?>" /></td>
                                   
                                   </tr>
                                      
									  <script type="text/javascript">
									                $(function()
													{
													            $('#edit<?=$id_head_leftmenu?>').click(function()
																          {  
																		           //alert('t');  
																				   $('#span_load_tab1').load('<?=base_url()?>index.php/menu/load_menu',{  'choice':3 ,'id':'<?=$id_head_leftmenu?>'});
																				   return  false;
																		   });
																
																  $('#check_del<?=$id_head_leftmenu?>').click(function()
																          {  
																				   Ext.MessageBox.confirm(' แจ้งเตือน ',' คุณต้องการลบข้อมูลหรือไม่ !! ' ,
																						   function(btn,text)
																						   {
																						          if( btn == 'yes')
																								  {
																								         //alert('T');
																										 //$('#span_load_tab1').load('<?=base_url()?>index.php/menu/delete_headmenu',{  'id':'<?=$id_head_leftmenu?>'});
																										 window.location="<?=base_url()?>index.php/menu/delete_headmenu/<?=$id_head_leftmenu?>";
																										 return  false;
																								  }
																								  else
																								  {
																								         // alert('abort');
																										 return  false;
																								  }
																						   }
																				    );
																				    
																		   });
																		   
													}
													);
									  </script>
									  <?php
							   }//end foreach
					}		   
		 ?>
</table>
<?php   echo   form_close(); ?>
<?php
}

//##============================ MAIN MENU================================
function  search_query_mainmenu($id_head_leftmenu)  //ค้นหา MAIN MENU
{
			  if(  is_numeric($id_head_leftmenu) > 0  &&  $id_head_leftmenu > 0    )  //ให้ดึงมาจาก  function   query_leftmenu()  987
			  {
//#########################################################################################################
				 //##=== ตัวแปร
				  $tb="tb_mainmenu";
				  $id="id_head_leftmenu";
				 //  $link_form="menu/del_multi_processer";
				   //mainmenu_multiprocess()
				   $link_form="menu/mainmenu_multiprocess"; 
				   //== join  และการใช้ left join  
				   $tb_join="tb_head_leftmenu";
				//  $join_query=$tb_join.".id_head_leftmenu=".$tb.".id_head_leftmenu";
				  $join_query=$tb.".id_head_leftmenu=".$tb_join.".id_head_leftmenu";
				  //query ตามการเลือกหัวข้อ
				  $id_query1="id_head_leftmenu";
				//  $id_query1_va='';
?>
<?php      echo   form_open($link_form);     ?>
<script type="text/javascript">
      $(function()
	  {
	        $('#main_save_form').button({         icons:{  primary:"ui-icon-clipboard" }         });
			$('#main_reset_form').button({         icons:{  primary:"ui-icon-clipboard" }         });
			$('#search_mainmenu').button({         icons:{  primary:"ui-icon-zoomin" }         }).click(function()
			                    {    
								            
										if(   $('#id_head_leftmenu').val() > 0 )
										{
														//alert('t');
														  $('#span_load_tab2').load('<?=base_url()?>index.php/menu/load_menu',{  'choice':7,'id_head_leftmenu':$('#id_head_leftmenu').val() }); 
															return false;   
										}
										else
										{
										                   Ext.MessageBox.alert('Error status','ระบุรายการที่ค้นหาก่อน');
													    	return false;   
										}					
								});
	  }
	  );
</script>
<table class="imagetable" cellpadding="0" cellspacing="0">
<tr>
<td colspan="5">
       ค้นหาจากหัวข้อรายการหลัก :
       
            <select id="id_head_leftmenu" name="id_head_leftmenu" >
               <?php   
						$this->option_2_query_blank();
				 ?>
           </select>
        <button id="search_mainmenu">Search</button>  

</td>
<td colspan="3">
<button id="main_save_form" type="submit">Save</button>
<button id="main_reset_form" type="reset">Reset</button>

</td>
</tr>
<tr>
	<th colspan="2">หัวข้อ Main Menu</th>
<!--    <th>ลำดับที่</th>
    <th>รูปภาพประกอบ</th>
    <th>หัวข้อข่าวสาร (NEWS)</th>
-->    
    <th>link</th>
    <th>หัวข้อ</th>
    <th>วันที่/เวลา</th>
  <!--  <th>ปักหมุด</th>-->
   <!-- <th>แสดงผล</th>-->
    <th>สถานะ</th>
    <th>สถานะ ON/OFF</th>
  <!--  <th>Show/hidden</th>-->
     <th>ลบ</th>
    
</tr>
         <?php
				   // $limit=10;     //จำนวนรายการทีแสดงทั้งหมดในหน้า admin 
			        //$ofset=0;
				     //  $this->db->order_by($id, "desc");  
				 // $this->db->limit($limit,$ofset);
				     $this->db->join($tb_join,$join_query,'left');
			         $query=$this->db->get_where($tb,array($tb.'.'.$id_query1=>$id_head_leftmenu));
				   $check = $query->num_rows();
				   if(   $check > 0 )
				   {
							   foreach( $query->result() as $row)
							   {
								       $id_mainmenu=$row->id_mainmenu;
									   $id_head_leftmenu=$row->id_head_leftmenu;
									    $titlemenu=$row->titlemenu;
									   $DMY=$row->DMY;
									   $linkmenu=$row->linkmenu;
									   $mainmenu_enable=$row->mainmenu_enable;   //1=show,0=hidden
									   $headmenu=$row->headmenu;  //หัวข้อรายการหลัก menu
									   switch($mainmenu_enable)
									   {
									       case 0:
										   {
										         $enable_icon="wrong.jpg";
										        break;
										   }
										   case 1:
										   {
										           $enable_icon="right.jpg";
										        break;
										   }
									   }
									   
									   //echo   DMY_thai_convert($DMY);  //helper
									  ?>
								   <tr>
                                     <td><?=$id_mainmenu?></td>
                                      <td>
									  <?=$titlemenu?>
                               
							   <?=br();?>              
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
                                <a href="#" id="edit<?=$id_mainmenu?>">แก้ไข</a>    
                                      
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
									<a href="#"  id="check_del<?=$id_mainmenu?>"  >ลบ</a>
                                      </td>
                                      <td>
										  <?php		  MY_strpos_link($linkmenu);  //helper->gen_string    ?>
                                      </td>
                                      <td><?php  echo   $headmenu; ?></td>
                                      <td><?=DMY_thai_convert($DMY)?></td>
                                     
                                      <td>
                                                 <img src="<?=base_url()?>images/<?=$enable_icon?>"  width="30" />
                                      </td>
                                      
                                       <td>
                                       <?php
									     if($mainmenu_enable == 1 )
										 {
									   ?>
                                       <input name="array_on_off[]" type="checkbox" value="<?=$id_mainmenu?>"  checked="checked"/>
                                       <?php
									     }elseif( $mainmenu_enable == 0 )
										 {
									   ?>
                                      <input name="array_on_off[]" type="checkbox" value="<?=$id_mainmenu?>"  />
                                       <?php
									      }
									   ?>
                                       </td>
                                       
                                       <td><input name="array_delete[]" type="checkbox" value="<?=$id_mainmenu?>" /></td>
                                   
                                   </tr>
                                      
									  <script type="text/javascript">
									                $(function()
													{
													            $('#edit<?=$id_mainmenu?>').click(function()
																          {  
																		           //alert('t');  
																				   $('#span_load_tab2').load('<?=base_url()?>index.php/menu/load_menu',{  'choice':6 ,'id_mainmenu':'<?=$id_mainmenu?>'});
																				   return  false;
																		   });
																
																  $('#check_del<?=$id_mainmenu?>').click(function()
																          {  
																				   Ext.MessageBox.confirm(' แจ้งเตือน ',' คุณต้องการลบข้อมูลหรือไม่ !! ' ,
																						   function(btn,text)
																						   {
																						          if( btn == 'yes')
																								  {
																								         //alert('T');
																										 //$('#span_load_tab1').load('<?=base_url()?>index.php/menu/delete_headmenu',{  'id':'<?=$id_mainmenu?>'});
																										// window.location="<?=base_url()?>index.php/menu/delete_mainmenu/<?=$id_mainmenu?>";
																										 $('#span_load_tab2').load('<?=base_url()?>index.php/menu/delete_mainmenu',{  'id':'<?=$id_mainmenu?>'});
																										 return  false;
																								  }
																								  else
																								  {
																								         // alert('abort');
																										 return  false;
																								  }
																						   }
																				    );
																				    
																		   });
																		   
													}
													);
									  </script>
									  <?php
							   }//end foreach
					}		   
		 ?>
</table>
<?php   echo   form_close(); ?>
<?php
//#########################################################################################################
			  }
}
function   query_mainmenu() //แสดงรายการทั้งหมด  MAIN MENU
{ //begin function
				 //##=== ตัวแปร
				  $tb="tb_mainmenu";
				  $id="id_head_leftmenu";
				  $limit=10;     //จำนวนรายการทีแสดงทั้งหมดในหน้า admin 
			       $ofset=0;
				 //  $link_form="menu/del_multi_processer";
				   //mainmenu_multiprocess()
				   $link_form="menu/mainmenu_multiprocess"; 
				   //== join  และการใช้ left join  
				   $tb_join="tb_head_leftmenu";
				//  $join_query=$tb_join.".id_head_leftmenu=".$tb.".id_head_leftmenu";
				  $join_query=$tb.".id_head_leftmenu=".$tb_join.".id_head_leftmenu";
				  //query ตามการเลือกหัวข้อ
				  $id_query1="id_head_leftmenu";
				//  $id_query1_va='';
?>
<?php      echo   form_open($link_form);     ?>
<script type="text/javascript">
      $(function()
	  {
	        $('#main_save_form').button({         icons:{  primary:"ui-icon-clipboard" }         });
			$('#main_reset_form').button({         icons:{  primary:"ui-icon-clipboard" }         });
			$('#search_mainmenu').button({         icons:{  primary:"ui-icon-zoomin" }         }).click(function()
			                    {    
								            
										if(   $('#id_head_leftmenu').val() > 0 )
										{
														//alert('t');
														  $('#span_load_tab2').load('<?=base_url()?>index.php/menu/load_menu',{  'choice':7,'id_head_leftmenu':$('#id_head_leftmenu').val() }); 
															return false;   
										}
										else
										{
										                   Ext.MessageBox.alert('Error status','ระบุรายการที่ค้นหาก่อน');
													    	return false;   
										}					
								});
	  }
	  );
</script>
<table class="imagetable" cellpadding="0" cellspacing="0">
<tr>
<td colspan="5">
       ค้นหาจากหัวข้อรายการหลัก :
       
            <select id="id_head_leftmenu" name="id_head_leftmenu" >
               <?php   
						$this->option_2_query_blank();
				 ?>
           </select>
        <button id="search_mainmenu">Search</button>  

</td>
<td colspan="3">
<button id="main_save_form" type="submit">Save</button>
<button id="main_reset_form" type="reset">Reset</button>

</td>
</tr>
<tr>
	<th colspan="2">หัวข้อ Main Menu</th>
<!--    <th>ลำดับที่</th>
    <th>รูปภาพประกอบ</th>
    <th>หัวข้อข่าวสาร (NEWS)</th>
-->    
    <th>link</th>
    <th>หัวข้อ</th>
    <th>วันที่/เวลา</th>
  <!--  <th>ปักหมุด</th>-->
   <!-- <th>แสดงผล</th>-->
    <th>สถานะ</th>
    <th>สถานะ ON/OFF</th>
  <!--  <th>Show/hidden</th>-->
     <th>ลบ</th>
    
</tr>
         <?php
				     //  $this->db->order_by($id, "desc");  
				 // $this->db->limit($limit,$ofset);
				  $this->db->join($tb_join,$join_query,'left');
				  
			//	  if( $id_query1_va  == '' )
		//		  {
				  		 //$query=$this->db->get_where($tb,array('mainmenu_enable'=>1));
						  $query=$this->db->get_where($tb);
		//		   }
//				   elseif( $id_query1_va >= 1 )
//				   {
//				         $query=$this->db->get_where($tb,array('mainmenu_enable'=>1,$id_query1=>$id_query1_value));
//				   }
				   
				  //   $query=$this->db->get($tb);
				   $check = $query->num_rows();
				   if(   $check > 0 )
				   {
							   foreach( $query->result() as $row)
							   {
								       $id_mainmenu=$row->id_mainmenu;
									   $id_head_leftmenu=$row->id_head_leftmenu;
									    $titlemenu=$row->titlemenu;
									   $DMY=$row->DMY;
									   $linkmenu=$row->linkmenu;
									   $mainmenu_enable=$row->mainmenu_enable;   //1=show,0=hidden
									   $headmenu=$row->headmenu;  //หัวข้อรายการหลัก menu
									   switch($mainmenu_enable)
									   {
									       case 0:
										   {
										         $enable_icon="wrong.jpg";
										        break;
										   }
										   case 1:
										   {
										           $enable_icon="right.jpg";
										        break;
										   }
									   }
									   
									   //echo   DMY_thai_convert($DMY);  //helper
									  ?>
								   <tr>
                                     <td><?=$id_mainmenu?></td>
                                      <td>
									  <?=$titlemenu?>
                               
							   <?=br();?>              
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
                                <a href="#" id="edit<?=$id_mainmenu?>">แก้ไข</a>    
                                      
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
									<a href="#"  id="check_del<?=$id_mainmenu?>"  >ลบ</a>
                                      </td>
                                      <td>
										  <?php		  MY_strpos_link($linkmenu);  //helper->gen_string    ?>
                                      </td>
                                      <td><?php  echo   $headmenu; ?></td>
                                      <td><?=DMY_thai_convert($DMY)?></td>
                                     
                                      <td>
                                                 <img src="<?=base_url()?>images/<?=$enable_icon?>"  width="30" />
                                      </td>
                                      
                                       <td>
                                       <?php
									     if($mainmenu_enable == 1 )
										 {
									   ?>
                                       <input name="array_on_off[]" type="checkbox" value="<?=$id_mainmenu?>"  checked="checked"/>
                                       <?php
									     }elseif( $mainmenu_enable == 0 )
										 {
									   ?>
                                      <input name="array_on_off[]" type="checkbox" value="<?=$id_mainmenu?>"  />
                                       <?php
									      }
									   ?>
                                       </td>
                                       
                                       <td><input name="array_delete[]" type="checkbox" value="<?=$id_mainmenu?>" /></td>
                                   
                                   </tr>
                                      
									  <script type="text/javascript">
									                $(function()
													{
													            $('#edit<?=$id_mainmenu?>').click(function()
																          {  
																		           //alert('t');  
																				   $('#span_load_tab2').load('<?=base_url()?>index.php/menu/load_menu',{  'choice':6 ,'id_mainmenu':'<?=$id_mainmenu?>'});
																				   return  false;
																		   });
																
																  $('#check_del<?=$id_mainmenu?>').click(function()
																          {  
																				   Ext.MessageBox.confirm(' แจ้งเตือน ',' คุณต้องการลบข้อมูลหรือไม่ !! ' ,
																						   function(btn,text)
																						   {
																						          if( btn == 'yes')
																								  {
																								         //alert('T');
																										 //$('#span_load_tab1').load('<?=base_url()?>index.php/menu/delete_headmenu',{  'id':'<?=$id_mainmenu?>'});
																										// window.location="<?=base_url()?>index.php/menu/delete_mainmenu/<?=$id_mainmenu?>";
																										 $('#span_load_tab2').load('<?=base_url()?>index.php/menu/delete_mainmenu',{  'id':'<?=$id_mainmenu?>'});
																										 return  false;
																								  }
																								  else
																								  {
																								         // alert('abort');
																										 return  false;
																								  }
																						   }
																				    );
																				    
																		   });
																		   
													}
													);
									  </script>
									  <?php
							   }//end foreach
					}		   
		 ?>
</table>
<?php   echo   form_close(); ?>
<?php
}//end  function

function    option_2_query_blank() //ดึง  option  เพื่อการ query  ใช้ได้กับ 1 เงืือนไข
{
        //##==== ตัวแปร
        $tb="tb_head_leftmenu";
		$id_field="menu_enable";
		$id=1;
		$id_field2="delete_status";
		$id2=1;
		$query=$this->db->get_where($tb,array($id_field=>$id,$id_field2=>$id2));
	    $check= $query->num_rows();
		if( $check > 0 )
		{
		                ?>
                                      <option value="">:: SELECT ::</option>
                        <?php
			   foreach($query->result() as $row)
			   {
			             $id_head_leftmenu=$row->id_head_leftmenu;
					     $headmenu=$row->headmenu;
					   ?>
                                           <option value="<?=$id_head_leftmenu?>"><?=$headmenu?></option>
                       <?php
			   }
		}
}

function    option_2_query($tb,$id_field,$id,$id_field2,$id2) //ดึง  option  เพื่อการ query  ใช้ได้กับ 1 เงืือนไข
{
        //##==== ตัวแปร
//        $tb="tb_head_leftmenu";
//		$id_field="menu_enable";
//		$id=1;
//		$id_field2="delete_status";
//		$id2=1;
		
		$query=$this->db->get_where($tb,array($id_field=>$id,$id_field2=>$id2));
	    $check= $query->num_rows();
		if( $check > 0 )
		{
		                ?>
                                      <option value="">:: SELECT ::</option>
                        <?php
			   foreach($query->result() as $row)
			   {
			             $id_head_leftmenu=$row->id_head_leftmenu;
					     $headmenu=$row->headmenu;
					   ?>
                                           <option value="<?=$id_head_leftmenu?>"><?=$headmenu?></option>
                       <?php
			   }
		}
}

function    option_2_query_select($tb,$id_field,$id,$id_field2,$id2,$id_select) //ดึง  option  เพื่อการ query  ใช้ได้กับ 1 เงืือนไข
{
        //##==== ตัวแปร
			//        $tb="tb_head_leftmenu";
			//		$id_field="menu_enable";
			//		$id=1;
			//		$id_field2="delete_status";
			//		$id2=1;
			//		$id_select=1;  //ตัวเลือกหลังจากการ fetch
		$query=$this->db->get_where($tb,array($id_field=>$id,$id_field2=>$id2));
	    $check= $query->num_rows();
		if( $check > 0 )
		{
		                ?>
                                      <option value="">:: SELECT ::</option>
                        <?php
			   foreach($query->result() as $row)
			   {
			             $id_head_leftmenu=$row->id_head_leftmenu;
					     $headmenu=$row->headmenu;
						 if(   $id_head_leftmenu== $id_select    )
						 {
							   ?>
												   <option value="<?=$id_head_leftmenu?>" selected="selected"><?=$headmenu?></option>
							   <?php
					    }
						else
						{
								  ?>
									  			 <option value="<?=$id_head_leftmenu?>"><?=$headmenu?></option>
								 <?php
						}
			   }
		}
}

##========= LINK HOME =================
function   sub_mainmenu($id1)  //http://127.0.0.1/hostKKHP/
{
         $tb="tb_mainmenu";
	     $id1_f="mainmenu_enable";
		 $va1_f=1;
		 $id2_f="id_head_leftmenu";
		 $va2_f=1;

		 $query=$this->db->get_where($tb,array($id1_f=>$va1_f,$id2_f=>$id1));
		 foreach($query->result() as $row)
		 {
		        $id_mainmenu=$row->id_mainmenu;
				$titlemenu=$row->titlemenu;
				$linkmenu=$row->linkmenu;
				?>
                		 <ul>
                   						 <li><a href="<?=$linkmenu?>"><?=$titlemenu?></a></li>
                   		 </ul>
                <?php
		 }
}
function     link_homepage()//หน้า link สำหรับ home page  
{
         $tb="tb_head_leftmenu";
		 $id1_f="menu_enable";
		 $va1_f=1;
		 $id2_f="delete_status";
		 $va2_f=1;
		 $query=$this->db->get_where($tb,array($id1_f=>$va1_f,$id2_f=>$va2_f));
		 foreach($query->result() as $row)
		 {
		       		     $id_head_leftmenu=$row->id_head_leftmenu;
						  $headmenu  = $row->headmenu;
						  ?>
                            	 <b><?=$headmenu?></b>
                                				<?php    $this->sub_mainmenu($id_head_leftmenu);  ?>
                          <?php
	  	 }
}
	
}//end class models==================================	

?>
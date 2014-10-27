<style type="text/css">
  @import url("<?php  echo  base_url(); ?>table_images/style_table.css");
  /*@import url "import2.css";*/
</style>

<?php   //$this->querymodels->jquery_import(); 	 //// import css,js   jquery   ?>
<?php    //$this->load->view('import_jqueryui');  ?>
<?php     //$this->import_->yoxview();  ?>
<?php      $this->import_->import_jquery_api(); 	 //// import css,js   jquery   ?>


<!--<script type="text/javascript" src="<?php  echo  base_url();  ?>js_dev/dialog_code.js">
</script>	
-->

<?php  //echo  $page;  //ทดสอบการเรียกค่าการส่งหน้า ?>


<div class="art-layout-cell layout-item-5" style="width: 34%" >
<?php    echo   form_open_multipart('pr/all_update_form');	  ?>
<!--<table class="hovertable">-->
<table class="imagetable" cellpadding="0" cellspacing="0">
<tr>
<td colspan="7">
<?php
      // echo  nbs(130);
	 // $this->querymodels->send_update($page); // ส่งไป form //echo   form_open_multipart('backoffice/all_update_form'); เพื่อ update ข้อมูลทั้งหมด
	  ?>
<?php
//======================  เปลี่ยนหน้าตาม page ของจำนวนfiled
			   //##----- นิยามตัวแปร
					$tb="tb_pr";
					$link_control=base_url()."index.php/pr/change_page_admin"; 
					$id_enable='pr_enable';
				    $va_enable=1;
                   $this->querymodels->change_page($tb,$limit,$link_control,$id_enable,$va_enable);  //-----เปลี่ยนหน้า 
?>
<?php  //###-------- การค้นหา
                //###--------  ค่าของตัวแปร
				  $url="pr/search_keyword/";
                  $this->querymodels->search_query($url);  //สำหรับการค้นหาใน ADMIN  
				 
?>
<?php
$data = array(
    'name' => '',
    'id' => '',
    'value' => 'true',
    'type' => 'submit',
    'content' => 'บันทึก'
);
//echo form_button($data);
?>

<?php
$data = array(
    'name' => '',
    'id' => '',
    'value' => 'true',
    'type' => 'reset',
    'content' => 'ล้าง'
);
//echo form_button($data);
?>
</td>
</tr>



<tr>
	<th colspan="3">หัวข้อข่าวประชาสัมพันธ์</th>
<!--    <th>ลำดับที่</th>
    <th>รูปภาพประกอบ</th>
    <th>หัวข้อข่าวสาร (NEWS)</th>
-->    
    <th>วันที่/เวลา</th>
    <th>ปักหมุด</th>
    <th>แสดงผล</th>
    <!--<th>ลบ</th>-->
</tr>

<!--<tr onmouseover="this.style.backgroundColor='#ffff66';" onmouseout="this.style.backgroundColor='#d4e3e5';">
	<td>Item 1A</td>
    <td>Item 1B</td>
    <td>Item 1C</td>
    <td>Item 1A</td>
    <td>Item 1B</td>
    <td>Item 1C</td>
	<td>Item 1C</td>
</tr>
-->

 <?php  
				 //   ดึงค่ามาจาก  index.php/backoffice/admin_leftmenu/2
				// 	  $data['limit']=10;     //จำนวนรายการทีแสดงทั้งหมดในหน้า admin
				//	  $data['id']="id_tb_new";
				//	   $data['tb']="tb_new";
				//		$data['ofset']=0;
if( $sr == '' )
{				
      $this->querymodels->query_pr(1,$limit,$id,$tb,$ofset,$link_anchor_popup); //1=ปักหมุด,ตัวต่อมาคือ limit ในการแสดงผล  
      $this->querymodels->query_pr(0,$limit,$id,$tb,$ofset,$link_anchor_popup); //0=ไม่ปักหมุด,ตัวต่อมาคือ limit ในการแสดงผล 
}
elseif ( strlen($sr) > 0 )
{
     $link_anchor_popup="backoffice/show_popup_picture/";
	 //$this->querymodels->news($query_search,$link_anchor_popup);    //ERROR จากตรงนี้
	 $this->querymodels->query_pr_sr($query_search,$link_anchor_popup);    //ERROR จากตรงนี้
}	  
	  //echo   $key_search;
  ?>

<!--<tr onmouseover="this.style.backgroundColor='#ffff66';" onmouseout="this.style.backgroundColor='#d4e3e5';">
	<td>Item 2A</td><td>Item 2B</td><td>Item 2C</td>
</tr>
<tr onmouseover="this.style.backgroundColor='#ffff66';" onmouseout="this.style.backgroundColor='#d4e3e5';">
	<td>Item 3A</td><td>Item 3B</td><td>Item 3C</td>
</tr>
<tr onmouseover="this.style.backgroundColor='#ffff66';" onmouseout="this.style.backgroundColor='#d4e3e5';">
	<td>Item 4A</td><td>Item 4B</td><td>Item 4C</td>
</tr>
<tr onmouseover="this.style.backgroundColor='#ffff66';" onmouseout="this.style.backgroundColor='#d4e3e5';">
	<td>Item 5A</td><td>Item 5B</td><td>Item 5C</td>
</tr>
-->


</table>
<?php  echo  form_close(); ?>
</div>

<!--##------  ทดสอบ picture view -------
-->

<!--<div class="yoxview">
    <a href="img/01.jpg"><img src="img/thumbnails/01.jpg" alt="First" title="First image" /></a>
    <a href="img/02.jpg"><img src="img/thumbnails/02.jpg" alt="Second" title="Second image" /></a>
</div>
-->

<?php   //$this->querymodels->jquery_import(); 	 //// import css,js   jquery   ?>

<style type="text/css">
  @import url("<?php  echo  base_url(); ?>table_images/style_table.css");
  /*@import url "import2.css";*/
</style>

<script type="text/javascript" src="<?php  echo  base_url();  ?>js_dev/dialog_code.js">
</script>	


<div class="art-layout-cell layout-item-5" style="width: 34%" >
<?php    echo  form_open();    ?>
<!--<table class="hovertable">-->
<table class="imagetable" cellpadding="0" cellspacing="0">
<tr>
<td colspan="7">
<?php   echo nbs(20); ?>
<?php
echo form_label('เลือกจำนวนรายการที่ต้องการแสดง : ', '');
?>
<?php
$options = array(
                  5  => '5',
                  10    => '10',
                  15   => '15',
                   30 => '30',
				   'all'  =>  'ALL'
                );
//$new_option = array('limit', 15);
echo form_dropdown('limit', $options,15);  //limit  คือชื่อ,15 คือเลือก option
?>
<?php
$data = array(
    'name' => '',
    'id' => '',
    'value' => 'true',
    'type' => 'submit',
    'content' => 'บันทึก'
);
echo form_button($data);
?>
<?php
$data = array(
    'name' => '',
    'id' => '',
    'value' => 'true',
    'type' => 'reset',
    'content' => 'ล้าง'
);
echo form_button($data);
?>
<?php
echo  nbs(1);
echo form_label('ค้นหา : ', '');
$data = array(
              'name'        => 'username',
              'id'          => 'username',
              'value'       => '',
              'maxlength'   => '50',
              'size'        => '20',
              'style'       => 'width:20%',
            );

echo form_input($data);
?>
<?php
$data = array(
    'name' => '',
    'id' => '',
    'value' => 'true',
    'type' => 'submit',
    'content' => 'ค้นหา'
);
echo form_button($data);
?>


</td>
</tr>
<tr>
	<th colspan="3">หัวข้อข่าวสาร</th>
<!--    <th>ลำดับที่</th>
    <th>รูปภาพประกอบ</th>
    <th>หัวข้อข่าวสาร (NEWS)</th>
-->    
    <th>วันที่/เวลา</th>
    <th>ปักหมุด</th>
    <th>แสดงผล</th>
    <th>ลบ</th>
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
      $this->querymodels->query_new(1,$limit,$id,$tb,$ofset); //1=ปักหมุด,ตัวต่อมาคือ limit ในการแสดงผล  
      $this->querymodels->query_new(0,$limit,$id,$tb,$ofset); //0=ไม่ปักหมุด,ตัวต่อมาคือ limit ในการแสดงผล 
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
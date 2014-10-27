       <div class="art-layout-cell layout-item-5" style="width: 34%" >
  
 <?php  echo  form_open_multipart('pr/insert_pr')?>
  <!--     <h3>Our Mission</h3>-->
       <b>-: เพิ่มข่าวสารในหน้าหลัก</b>
        <p>
        หัวข้อข่าวประชาสัมพันธ์ <font color="#FF0000">*</font> : 
        <?php  nbs(1);   ?>
        <?php
 $data1 = array(
              'name'        => 'title',
              'id'          => 'title',
              'value'       => '',
              'maxlength'   => '100',
              'size'        => '50',
              'style'       => 'width:50%',
            );
			echo form_input($data1);         
        ?>
        </p>
        <p>
         <?php   echo form_label('ปักหมุด :', '');    ?>
           <?php    echo form_checkbox('pin_pr', '1', FALSE); ?>
        </p>
        <p>
        รูปภาพข่าวประชาสัมพันธ์  : 
                <?php
 $data2= array(
              'name'        => 'pr_picture',
              'id'          => 'pr_picture',
              'value'       => '',
              'maxlength'   => '100',
              'size'        => '50',
              'style'       => 'width:50%',
            );
			echo form_upload($data2);         
        ?>

        </p>
<p>
        รายละเอียดข่าวประชาสัมพันธ์  :
<?php
 $data3= array(
              'name'        => 'content',
              'id'          => 'content',
              'value'       => '',
              'maxlength'   => '100',
              'size'        => '50',
              'style'       => 'width:50%',
            );
			echo form_textarea($data3);         
        ?>
<!--<textarea name="content" id="content" ></textarea>-->
 <?php echo display_ckeditor($ckeditor); ?>
</p>

<?php   echo form_submit('mysubmit', 'บันทึก');  ?>
<?php  echo  nbs(2); ?>
<?php   echo  form_reset('myreset','ล้างข้อมูล');  ?>
<?php   echo  form_close()?>

 </div>



<? 
$this->load->view('import_css_table'); 
$this->load->view('import_jqueryui'); 
?>

<script type="text/javascript">
				$(function() {
							$( "#birthday" ).datepicker({
							changeMonth: true,
							changeYear: true,
							yearRange: '-85: +3' //ตัวนี้สำคัญมาก กำหนดช่วง พ.ศ. -85 คือย้อนหลัง 85 ปี  +3 คือช่วงบนเพิ่มไปอีก 3 ปี
							});
				});
</script>

<form name="input" action="<?=base_url()?>index.php/member/update" method="post">
<table class="table1">
         <thead>
            <tr>                     
                        <td>
                            <? echo form_label('ชื่อ - นามสกุล : '); ?>
                            <input name="name" type="text" id="name" value="<?=$name?>"   size="20" maxlength="20">
                            -
                            <input name="lastname" type="text" id="lastname" value="<?=$lastname?>"  size="30" maxlength="20">
                        </td>                                              
                        <!--
                        <th scope="col" abbr="Medium">หมายเลขโทรศัพท์</th>
                        <th scope="col" abbr="Business">ที่พักอาศัยในปัจจุบัน</th>
                        <th scope="col" abbr="Deluxe">เพื่อนหรือคนใกล้ชิดญาติที่ติดต่อได้</th>
                        <th scope="col" abbr="Deluxe">หมายเลขโทรศัพท์ของญาติ</th>
                        <th scope="col" abbr="Deluxe">ที่พักอาศัยของญาติ</th>
                        <th scope="col" abbr="Deluxe">Update</th>
                        <th scope="col" abbr="Deluxe">Delete</th>
                        -->
            </tr>
            <tr>
                <!--<th scope="col" abbr="Starter">-->
                <td>
                     <? echo form_label('user :'); ?>
                    <input name="id_user" type="hidden" id="id_user"   value="<?=$id_user?>" size="20" maxlength="20" >    
                    <input name="user" type="text" id="user"   value="<?=$user?>" size="20" maxlength="20" >                       
                </td>
            </tr>
            <tr>
                <td>
                   <? echo form_label('password : '); ?>
                    <input name="password" type="text" id="password"   size="50" maxlength="20" >
                </td>
            </tr>
            <tr>
                <td>
                    <?  echo form_label('วัน-เดือน-ปี เกิด : '); ?>
                    <? echo nbs(1); ?>
                    <font color="red">(<? echo $convert_birthday; ?>)</font>
                    <? echo nbs(1); ?>
                    <input name="birthday" type="text" id="birthday" value="" size="20" maxlength="20">
                </td>
            </tr>
            <tr>
                <td>
                    <? echo form_label('Email : '); ?>
                    <input name="email" type="text" id="email" value="<?=$email?>" size="40" maxlength="40">
                </td>
            <tr>
            <tr>
                <td>
                   <? echo form_label('อนุญาติ : '); ?>
                    <? MY_checkbox_update('user_enable',$user_enable); ?>
                    
                </td>              
            </tr>
            <tr>
                <td>
                  <? echo form_label('ระดับผู้ใช้ : '); ?> 
                  <? MY_select_level_user('level_user',$level_user) ?>
                </td>               
            </tr>
            <tr>
                <td>
                    <? echo form_label('เลขบัตรประชาชน : ');?>
                    <input name="id_card" type="text" id="id_card" value="<?=$id_card?>" size="20" maxlength="13" />
                </td>
            </tr>
            <tr>
                <td>
                    <? echo form_label('ที่อยู่ : '); ?>
                    <input name="address" type="text" value="<?=$address?>"  id="address" size="50" max="50" />
                </td>
            </tr>
            <tr>
                <td>
                     <button type="submit" >บันทึก</button>
                     <button type="reset" >ยกเลิก</button>
                </td>
            </tr>
         </thead>
</table>                
</form>
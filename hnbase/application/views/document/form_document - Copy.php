<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$title?></title>

        <script type="text/javascript">
                $(document).ready(function(){
                    $("#name").autocomplete({
                        //source:'getautocomplete.php',
						//source:'<?=base_url()?>index.php/home/json_test2',
						source:'<?=base_url()?>index.php/home/call_person',
                        minLength:1
                    });
                });
        </script>
        
        <script type="text/javascript">
				$(function() {
							$( "#datepicker" ).datepicker({
							changeMonth: true,
							changeYear: true,
							yearRange: '-85: +3' //ตัวนี้สำคัญมาก กำหนดช่วง พ.ศ. -85 คือย้อนหลัง 85 ปี  +3 คือช่วงบนเพิ่มไปอีก 3 ปี
							});
				});
        </script>


</head>

<body>
	   <?PHP echo  form_open_multipart(''.$fieldset.''); ?>
    <div>
        <ul>
            <li>
            ค้นหาชื่อพนักงาน : <input type="text" name="name"  id="name"  maxlength="20"  style="width:50%" /> *
            </li>
            
            <li>
           เพศ ชื่อ-นามสกุล พนักงานภาษาไทย : <select><?=$this->selectmodel->sex_select()?></select><input type="text" name=""  id=""  maxlength="20"  style="width:30%" /> - <input type="text" name=""  id=""  maxlength="20"  style="width:40%" /> *
            </li>

            <li>
            ชื่อเล่นภาษาไทย : <input type="text" name=""  id=""  maxlength="20"  style="width:20%" />   *
            </li>
            
             <li>
            อายุ (ปี): <input type="text" name=""  id=""  maxlength="20"  style="width:20%" />   *
            </li>
            


             <li>
            วัน-เดือน-ปี เกิด: <input type="text" name="datepicker"  id="datepicker"  maxlength="20"  style="width:20%" />   *
            </li>


             <li>
             แนบเอกสาร ทร. ๓๘/๑ : <input type="file" name=""   style="width:20%">
              </li>      


              <li>
             รูปถ่าย : <input type="file" name="" style="width:20%">
              </li>      
		
             <li>
             สัญชาติ : <input type="text" name="name"  id="name"  maxlength="20"  style="width:20%" />
              </li> 
              
             <li>
             เชื้อชาติ : <input type="text" name="name"  id="name"  maxlength="20"  style="width:20%" />
              </li>      
     
             <li>
             ส่วนสูง (cm.) : <input type="text" name="name"  id="name"  maxlength="20"  style="width:20%" />
              </li>      

             <li>
             ภูมิลำเดิมที่อยู่ในพม่า : <textarea name="" cols="" rows="" style="width:50%; height:10%"></textarea>
              </li>      

             <li>
             น้ำหนัก (kg.): <input type="text" name="name"  id="name"  maxlength="20"  style="width:20%" />
              </li>      

            
        </ul>
    </div>
    
		<button type="button" >บันทึก</button>
        <button type="button" >ยกเลิก</button>

    <?PHP echo form_fieldset_close(); ?>

</body>
</html>

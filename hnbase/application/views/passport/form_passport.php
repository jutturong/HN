<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$title?></title>

<style>
/*
input
{
color:#000000;
font-size:14px;
border:#003300 solid 1px;
height:30px;
margin-bottom:10px;
width:10px; 
}
textarea
{
color:#000000;
font-size:14px;
border:#666666 solid 2px;
height:124px;
margin-bottom:10px;
width:200px;
}
.textbox1
{
 	
    font-size: 13px;
    margin-bottom: 5px;
    display: block;
    padding: 4px;
    border: solid 1px #85b1de;
    width: 300px;
    background-color: #EDF2F7;
}
*/

/*
body
{
    font-family:Gill Sans MT;
    padding:10px;
}
fieldset
{
    border: solid 1px #000;
    padding:10px;
    display:block;
    clear:both;
    margin:5px 0px;
}
legend
{
    padding:0px 10px;
    background:black;
    color:#FFF;
}
input.add
{
    float:right;
}
input.fieldname
{
    float:left;
    clear:left;
    display:block;
    margin:5px;
}
select.fieldtype
{
    float:left;
    display:block;
    margin:5px;
}
input.remove
{
    float:left;
    display:block;
    margin:5px;
}
#yourform label
{
    float:left;
    clear:left;
    display:block;
    margin:5px;
}
#yourform input, #yourform textarea
{
    float:left;
    display:block;
    margin:5px;
}
*/
</style>

<style>
/*input
{
color:#000000;
font-size:14px;
border:#003300 solid 1px;
height:30px;
margin-bottom:10px;
width:10px;

}
textarea
{
color:#000000;
font-size:14px;
border:#666666 solid 2px;
height:124px;
margin-bottom:10px;
width:200px;
}*/

/*body
{
    font-famil:Microsoft Sans Serif;
    padding:10px;
}
fieldset
{
    border: solid 1px #000;
    padding:10px;
    display:block;
    clear:both;
    margin:5px 0px;
}
legend
{
    padding:0px 10px;
    background:black;
    color:#FFF;
}
input.add
{
    float:right;
}
input.fieldname
{
    float:left;
    clear:left;
    display:block;
    margin:5px;
}
select.fieldtype
{
    float:left;
    display:block;
    margin:5px;
}
input.remove
{
    float:left;
    display:block;
    margin:5px;
}
#yourform label
{
    float:left;
    clear:left;
    display:block;
    margin:5px;
}
#yourform input, #yourform textarea
{
    float:left;
    display:block;
    margin:5px;
}
*/
</style>

<style>
/*    .radio1 {
      width: 19px;
      height: 25px;
      padding: 0 5px 0 0;
      background: url(checkbox.png) no-repeat;
      display: block;
      clear: left;
      float: left;
    }
    .radio {
      background: url(radio.png) no-repeat;
    }
    .select {
      position: absolute;
      width: 158px;
      height: 21px;
      padding: 0 24px 0 8px;
      color: #fff;
      font: 12px/21px arial,sans-serif;
      background: url(select.png) no-repeat;
      overflow: hidden;
    }
*/	
</style>


<!--<script>
$(document).ready(function() {
    $("#add").click(function() {
        var intId = $("#buildyourform div").length + 1;
        var fieldWrapper = $("<div class=\"fieldwrapper\" id=\"field" + intId + "\"/>");
        var fName = $("<input type=\"text\" class=\"fieldname\" />");
        var fType = $("<select class=\"fieldtype\"><option value=\"checkbox\">Checked</option><option value=\"textbox\">Text</option><option value=\"textarea\">Paragraph</option></select>");
        var removeButton = $("<input type=\"button\" class=\"remove\" value=\"-\" />");
        removeButton.click(function() {
            $(this).parent().remove();
        });
        fieldWrapper.append(fName);
        fieldWrapper.append(fType);
        fieldWrapper.append(removeButton);
        $("#buildyourform").append(fieldWrapper);
    });
    $("#preview").click(function() {
        $("#yourform").remove();
        var fieldSet = $("<fieldset id=\"yourform\"><legend>Your Form</legend></fieldset>");
        $("#buildyourform div").each(function() {
            var id = "input" + $(this).attr("id").replace("field","");
            var label = $("<label for=\"" + id + "\">" + $(this).find("input.fieldname").first().val() + "</label>");
            var input;
            switch ($(this).find("select.fieldtype").first().val()) {
                case "checkbox":
                    input = $("<input type=\"checkbox\" id=\"" + id + "\" name=\"" + id + "\" />");
                    break;
                case "textbox":
                    input = $("<input type=\"text\" id=\"" + id + "\" name=\"" + id + "\" />");
                    break;
                case "textarea":
                    input = $("<textarea id=\"" + id + "\" name=\"" + id + "\" ></textarea>");
                    break;    
            }
            fieldSet.append(label);
            fieldSet.append(input);
        });
        $("body").append(fieldSet);
    });
});

</script>
-->

<script type="text/javascript">
                $(document).ready(function(){
                    $("#id_tb_person").autocomplete({
                        //source:'getautocomplete.php',
						//source:'<?=base_url()?>index.php/home/json_test2',
						source:'<?=base_url()?>index.php/home/call_person',
                        minLength:1
                    });
                });
</script>

<script type="text/javascript">
                $(document).ready(function(){
                    $("#pr").autocomplete({
                        //source:'getautocomplete.php',
						//source:'<?=base_url()?>index.php/home/json_test2',
						source:'<?=base_url()?>index.php/province/call_province',
                        minLength:1
                    });
                });
</script>


<script type="text/javascript">
                $(document).ready(function(){
                    $("#pr_k").autocomplete({
                        //source:'getautocomplete.php',
						//source:'<?=base_url()?>index.php/home/json_test2',
						source:'<?=base_url()?>index.php/province/call_province',
                        minLength:1
                    });
                });
</script>




<script type="text/javascript">
				$(function() {
							$( "#date_passport_expire_begin" ).datepicker({
							changeMonth: true,
							changeYear: true,
							yearRange: '-85: +3' //ตัวนี้สำคัญมาก กำหนดช่วง พ.ศ. -85 คือย้อนหลัง 85 ปี  +3 คือช่วงบนเพิ่มไปอีก 3 ปี
							});
				});
</script>

<script type="text/javascript">
				$(function() {
							$( "#date_passport_expire" ).datepicker({
							changeMonth: true,
							changeYear: true,
							yearRange: '-85: +3' //ตัวนี้สำคัญมาก กำหนดช่วง พ.ศ. -85 คือย้อนหลัง 85 ปี  +3 คือช่วงบนเพิ่มไปอีก 3 ปี
							});
				});
</script>

<script type="text/javascript">
				$(function() {
							$( "#date_passport" ).datepicker({
							changeMonth: true,
							changeYear: true,
							yearRange: '-85: +3' //ตัวนี้สำคัญมาก กำหนดช่วง พ.ศ. -85 คือย้อนหลัง 85 ปี  +3 คือช่วงบนเพิ่มไปอีก 3 ปี
							});
				});
</script>

<script type="text/javascript">
				$(function() {
							$( "#date_report" ).datepicker({
							changeMonth: true,
							changeYear: true,
							yearRange: '-85: +3' //ตัวนี้สำคัญมาก กำหนดช่วง พ.ศ. -85 คือย้อนหลัง 85 ปี  +3 คือช่วงบนเพิ่มไปอีก 3 ปี
							});
				});
</script>



<script type="text/javascript">
$(function()
{
   $('button:first').button({icons:{primary:'ui-icon-search'}}).next().button({icons:{primary:'ui-icon-close'}});   
}
);
</script>



 <script>
     /*
			$(function() {
						$( "#progressbar" ).progressbar({
						value: 10
						});
						
			});
			//			
     */					
</script>

<script type="text/javascript">
    $(document).ready(function(){
        $("#check").click(function(){
            $.ajax({
                    //url: "bad-word.php",
                    url: "<?=base_url()?>index.php/passport/check_date",
                    //data: {inputword : $("#inputword").val()},
                    //data: {inputword : 55 },
                    data:{ date_passport_expire_begin : $('#date_passport_expire_begin').val(),date_passport_expire : $('#date_passport_expire').val() },
                    success: function(ret)
                    {//begin function
                        
                        /*
                         if(ret=="found")
                         {
                              alert(''+ret);
                            //$('#test').html(''+ret);
                               
                         }else
                         {
                            //alert("ไม่พบคำหยาบ");
                           // $('#test').html(''+ret);
                           //alert(ret);
                             
                          }
                       */
                        
                        
                       // var   val_ret=5
                        var   val_prog=parseInt(ret)
                        //alert(val_prog)
                        
                        
                        $( "#progressbar" ).progressbar({
						value: val_prog
						});
                       
                       
                         //alert('จำนวนวันทั้งหมด ' + ret + ' วัน ');
                        //$('#test').html('จำนวน '+ret+ ' วัน ');
                        //$('#test').val(''+ret);
                        //$('#test').val('a');
                         //var  str_ret=ret.toString();
                         //alert(ret);
                         //var  t1=3
                         //var  t2=ret.toString()                       
                         //var  t3=t1.toString()
                         //alert(typeof(ret))
                         var  t4=parseInt(ret)
                         //alert(typeof(t4))
                         //$('#va1').val(''+ret) 
                        //$('#test').focus();
                         $('#count_date_passport').val(''+t4)
                         // $('#va1').val(ret)
                    }/*end function*/,
                    type: "POST"
            });
        });
    });
</script>

<?php
    $this->querymodels->check_val_name('#btn_submit','#id_tb_person','ระบุ ชื่อ-นามสกุล ก่อน!!');//ใช้ตรวจสอบค่าว่างของชื่อพนักงานก่อน submit
?>

</head>

<body>
<?=form_open('passport/insert_file')?>
    <div>
        <ul>
            <li>
            ชื่อ - นามสกุล : 
            <input type="text" name="id_tb_person"  id="id_tb_person"  maxlength="20"  style="width:50%" /> *
            </li>
            
            <li>
            วันที่ passport หมดอายุ (ใหม่) : 
            <input type="text" name="date_passport_expire_begin"  id="date_passport_expire_begin"  maxlength="20"  style="width:20%" />
            </li>
            
            <li>
            วันที่passport หมดอายุ  : 
            <input type="text" name="date_passport_expire"  id="date_passport_expire"  maxlength="20"  style="width:20%" />
             
            </li>
            
            
            <li>
             ตรวจสอบจำนวนวันหมดอายุ :
             
             <button id="check" name="check"  type="button">check date</button>
             
             <input type="text" name="count_date_passport"  id="count_date_passport"  maxlength="3"   style="width:10%"  />
             วัน
             <div id="progressbar"></div>
            
            </li>
            
             
            
            <li>
            สถานที่ออกpassport : 
            <input type="text" name="place_passport"  id="place_passport"  maxlength="20"  style="width:50%" value="" />
            </li>

            
            
            <li>
            วันที่ออกpassport : 
            <input type="text" name="date_passport"  id="date_passport"  maxlength="20"  style="width:20%" />
            </li>
            
            <li>
            วันที่รายงานตัวครั้งล่าสุด : 
            <input type="text" name="date_report"  id="date_report"  maxlength="20"  style="width:20%" />
            </li>




        </ul>
    </div>
    
<!--    <button type="button" class="btn btn-default">Default</button>
-->	
<button type="submit" id="btn_submit" >บันทึก</button>
                <button type="reset" >ยกเลิก</button>

<?=form_close()?>
</body>
</html>

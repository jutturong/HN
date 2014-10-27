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
$(function()
{
   //$('#cal_pay').button({icons:{primary:'ui-icon-search'}});   
}
);
</script>



<script type="text/javascript">
$(function()
{
  // $('button:first').button({icons:{primary:'ui-icon-search'}}).next().button({icons:{primary:'ui-icon-close'}});   
}
);
</script>

<script>
$(function()
{
    $('#cal_pay').click(function()
    { 
        //if( parseInt( $('#day_work') ) )
        if( $('#day_work').val().length > 0     )
        {
            // alert('t');  
            var  ans1=$('#day_work').val()*300;
            $('#revenue').val()=ans1;
        }
    })
    
});
</script>
<script>
  $(function()
  {
      //$('#name').click(function(){ alert('t'); });   
  })
  
</script> 
<script type="text/javascript">
				$(function() {
							$( "#birthday" ).datepicker({
							changeMonth: true,
							changeYear: true,
							yearRange: '-85: +3' //ตัวนี้สำคัญมาก กำหนดช่วง พ.ศ. -85 คือย้อนหลัง 85 ปี  +3 คือช่วงบนเพิ่มไปอีก 3 ปี
							});
				});
</script>

</head>

<body>
<form name="input" action="<?=base_url()?>index.php/member/insert_file" method="post">  
<?   
 echo form_label('ชื่อ - นามสกุล : ');
?> 
 <input name="name" type="text" id="name" value=""  style="width:20%" size="10" maxlength="20"> 
 <? echo nbs()?>
  <input name="lastname" type="text" id="lastname" value="" style="width:30%" size="10" maxlength="20">
  <?=br()?>
 <?   
 echo form_label('user :');
 ?> 
  <input name="user" type="text" id="user"  style="width:20%" value="" size="10" maxlength="20" >
  <?=br()?>
 <?   
 echo form_label('password : ');
 ?> 
<input name="password" type="text" id="password" value=""  style="width:20%" size="10" maxlength="20" >      
 <?=br()?>
 <?   
 echo form_label('วัน-เดือน-ปี เกิด : ');
 ?>            
<input name="birthday" type="text" id="birthday"  style="width:35%" size="10" maxlength="20"> 
  <?=br()?>
<?   
 echo form_label('Email : ');
 ?> 
   <input name="email" type="text" id="email" value="" style="width:50%" size="10" maxlength="20">
   <?=br()?>
 <?   
 echo form_label('อนุญาติ : ');
 ?>      
    <input name="user_enable" type="checkbox" value="1" id="user_enable" checked="checked" />
  <?=br()?>
  <?   
 echo form_label('ระดับผู้ใช้ : ');
 ?> 
 <select name="level_user" id="level_user">
 <option >:: Select ::</option>
 <option value="1">Administrator</option>
  <option value="2" selected="selected">User</option>
</select>
 <?=br()?>
 <?   
 echo form_label('เลขบัตรประชาชน : ');
 ?> 
  <input name="id_card" type="text" id="id_card" value="" style="width:50%" size="20" maxlength="13" />
  <?=br()?>
  <?   
 echo form_label('ที่อยู่ : ');
 ?>   
  <input name="address" type="text" value="" style="width:70%" id="address" />
<!--    <button type="button" class="btn btn-default">Default</button>
-->
<?=br()?>
<button type="submit" >บันทึก</button>
<button type="reset" >ยกเลิก</button>
</form>
</body>
</html>

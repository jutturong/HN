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
							$( "#date_permission" ).datepicker({
							changeMonth: true,
							changeYear: true,
							yearRange: '-85: +3' //ตัวนี้สำคัญมาก กำหนดช่วง พ.ศ. -85 คือย้อนหลัง 85 ปี  +3 คือช่วงบนเพิ่มไปอีก 3 ปี
							});
				});
</script>
<script type="text/javascript">
				$(function() {
							$( "#date_shot" ).datepicker({
							changeMonth: true,
							changeYear: true,
							yearRange: '-85: +3' //ตัวนี้สำคัญมาก กำหนดช่วง พ.ศ. -85 คือย้อนหลัง 85 ปี  +3 คือช่วงบนเพิ่มไปอีก 3 ปี
							});
				});
</script>
<script type="text/javascript">
				$(function() {
							$( "#datepicker3" ).datepicker({
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




</head>

<body>
<?=form_open('permission/insert_file')?>
    <div>
        <ul>
            <li>
            ชื่อ - นามสกุล : 
            <input type="text" name="id_tb_person"  id="id_tb_person"  maxlength="20"  style="width:50%" /> *
            </li>
            
            <li>
            วันที่ขออนุญาติทำงาน : <input type="text" name="date_permission"  id="date_permission"  maxlength="20"  style="width:20%" />   *
            </li>
            
            <li>
                ออกให้โดย สจจ. : <input type="text" name="authoriz_sjj"  id="authoriz_sjj"  maxlength="20"  style="width:50%" value="" />   *
            </li>
            
            <li>
                ออกให้โดย สจก. : <input type="text" name="authoriz_sjk"  id="authoriz_sjk"  maxlength="20" value=""  style="width:50%" />   *
            </li>

            <li>
            กำหนดนัดอื่น : <input type="text" name="date_shot"  id="date_shot"  maxlength="20"  style="width:20%" />   *
            </li>

           <li>
           หมายเหตุ :  <textarea name="remark" cols="" rows="" style="width:50%; height:10%"></textarea> *
           </li>
           
<?PHP           
            echo form_fieldset('ข้อมูลทักษะและประสพการทำงาน');
?>
           <li>
               ระดับการศึกษา :  <input type="text" name="study" id="study"  maxlength="20"  style="width:50%" value="" /> 
           </li>
           <li>
               สถานศึกษา :  <input type="text" name="academy" id="academy"   maxlength="20"  style="width:50%" value="" /> 
           </li>
           <li>
               ความถนัดความสามารถในการทำงาน :  <input type="text"  name="aptitude" id="aptitude"  maxlength="20"  style="width:50%" value="" /> 
           </li>


<?
			echo form_fieldset_close(); 
?>

            
            
            
        </ul>
    </div>
    
<!--    <button type="button" class="btn btn-default">Default</button>
-->	
<button type="submit" >บันทึก</button>
<button type="reset" >ยกเลิก</button>

<?=form_close()?>
</body>
</html>

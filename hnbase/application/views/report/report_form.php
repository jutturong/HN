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
function   send1()
{
   //alert('t');
   $.post('<?=base_url()?>index.php/home/insert_person',
      $('#form_peson').serialize(),
	   function(data,status)
	   { 
	      //alert(''+data+''+status); 
		   alert(''+data); 
		   //load_content
		   //window.location.assign("http://www.w3schools.com")
		   window.location.assign("<?=base_url()?>index.php/home/load_content/4")
	   }
	     );
}

</script>
</head>

<body>
   <? //$this->load->view('load_bootstrap') ?>
  
  
   <?PHP  //echo  form_open('home/insert_person')?>
   <form id="form_peson">
   <?PHP echo  form_fieldset(''.$fieldset.''); ?>
    <div>
        <ul>
            <li>
            คำนำหน้าชื่อ :
            <select id="prename" name="prename">
			<?PHP  $this->selectmodel->prename_select();  ?>
            </select>
            ชื่อ - นามสกุล : 
            <input type="text" name="name"  id="name" value="sombat"   maxlength="20"  style="width:15%" /> *
            -
            <input type="text" name="lastname"  id="lastname"  maxlength="20" value="metanee"  style="width:20%" />*
            </li>
            
            <li>
            ชื่อเล่น : <input type="text" name="nickname"  id="nickname" value="big"  maxlength="20"  style="width:20%" />*
            </li>

            
                    
<!--                        <input type="button" value="Preview form" class="add" id="preview" />
                        <input type="button" value="Add a field" class="add" id="add" />
-->            
            <li>
            ID(ประกอบเอกสาร) : <input type="text" name="id_peson"  id="id_peson" value="0123456789012" maxlength="20"  style="width:20%" />*
            </li>
            
            <li>
            เลขที่พาสปอร์ต : <input type="text" name="id_passport"  id="id_passport"  value="A111111" maxlength="20"  style="width:20%" />*
            </li>
            
            <li>
            รหัสพนักงาน : <input type="text" name="id_code_person"  id="id_code_person" value="E7001  "  maxlength="20"  style="width:20%" />*
            </li>
            
            
        </ul>
    </div>
    
<!--    <button type="button" class="btn btn-default">Default</button>
-->	
		<button type="button" onclick="javaScript:send1()" >บันทึก</button>
        <button type="button" >ยกเลิก</button>

<!--    <button type="button" class="btn btn-info">Info</button>
    <button type="button" class="btn btn-danger">Danger</button>
-->    
    <?PHP echo form_fieldset_close(); ?>
    </form>
    <?PHP //echo form_close()?>
</body>
</html>

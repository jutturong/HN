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
height:10px;
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
.red_font
{
	background-color: #FF0000;
	
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
                    $("#nickname").autocomplete({
                        //source:'getautocomplete.php',
						//source:'<?=base_url()?>index.php/home/json_test2',
						source:'<?=base_url()?>index.php/home/call_nickname',
                        minLength:1
                    });
                });
</script>
<script type="text/javascript">
                $(document).ready(function(){
                    $("#id_peson").autocomplete({
                        //source:'getautocomplete.php',
						//source:'<?=base_url()?>index.php/home/json_test2',
						source:'<?=base_url()?>index.php/home/call_id_person',
                        minLength:1
                    });
                });
</script>
<script type="text/javascript">
                $(document).ready(function(){
                    $("#id_passport").autocomplete({
                        //source:'getautocomplete.php',
						//source:'<?=base_url()?>index.php/home/json_test2',
						source:'<?=base_url()?>index.php/home/call_id_passport',
                        minLength:1
                    });
                });
</script>
<script type="text/javascript">
                $(document).ready(function(){
                    $("#id_code_person").autocomplete({
                        //source:'getautocomplete.php',
						//source:'<?=base_url()?>index.php/home/json_test2',
						source:'<?=base_url()?>index.php/home/call_id_code_person',
                        minLength:1
                    });
                });
</script>

<script type="text/javascript">    
 $(function() {    
   $( "#search_person" ).button({
      // $( "button:first" ).button({
     icons: {
       primary: "ui-icon ui-icon-person"
     },
     text: true
                     });                    
  });
</script>

<script type="text/javascript">    
 $(function() {    
   $( "#search_nickname" ).button({
      // $( "button:first" ).button({
     icons: {
       primary: "ui-icon ui-icon-person"
     },
     text: true
                     });                    
  });
</script>

<script type="text/javascript">    
 $(function() {    
   $( "#search_id_peson" ).button({
      // $( "button:first" ).button({
     icons: {
       primary: "ui-icon ui-icon-person"
     },
     text: true
                     });                    
  });
</script>

<script type="text/javascript">    
 $(function() {    
   $( "#search_id_passport" ).button({
      // $( "button:first" ).button({
     icons: {
       primary: "ui-icon ui-icon-person"
     },
     text: true
                     });                    
  });
</script>

<script type="text/javascript">    
 $(function() {    
   $( "#search_id_code_person" ).button({
      // $( "button:first" ).button({
     icons: {
       primary: "ui-icon ui-icon-person"
     },
     text: true
                     });                    
  });
</script>



</head>

<body>
   <? //$this->load->view('load_bootstrap') ?>
  
  
   <?PHP echo  form_fieldset(''.$fieldset.''); ?>
     
    <div>
        <ul>
            <li> 
                <form  action="<?=base_url()?>index.php/home/load_content/14" method="post">
                 ชื่อ-นามสกุล : <input type="text" name="id_tb_person"  id="id_tb_person" class="example6"  maxlength="20"  style="width:50%"  />
                 <button   id="search_person"    >SEARCH</button>                  
                </form>
            </li>           
        </ul>
        <ul>
            <li> 
                 <form  action="<?=base_url()?>index.php/home/load_content/15" method="post">
                ชื่อเล่น : <input type="text" name="nickname"  id="nickname" class="example6"  maxlength="20"  style="width:50%"  />
                <button  id="search_nickname"  >SEARCH</button> 
                </form>
            </li>           
        </ul>
        <ul>
            <li> 
                <form  action="<?=base_url()?>index.php/home/load_content/16" method="post">
                ID(ประกอบเอกสาร) : <input type="text" name="id_peson"  id="id_peson" class="example6"  maxlength="20"  style="width:50%"  />
                 <button  id="search_id_peson"  >SEARCH</button> 
                  </form>
            </li>           
        </ul>
        <ul>
            <li> 
                <form  action="<?=base_url()?>index.php/home/load_content/17" method="post">
                เลขที่พาสปอร์ต : <input type="text" name="id_passport"  id="id_passport" class="example6"  maxlength="20"  style="width:50%"  />
                 <button  id="search_id_passport"  >SEARCH</button> 
                 </form>
            </li>           
        </ul>
        <ul>
            <li> 
               <form  action="<?=base_url()?>index.php/home/load_content/18" method="post">
                รหัสพนักงาน : <input type="text" name="id_code_person"  id="id_code_person" class="example6"  maxlength="20"  style="width:50%"  />
                 <button  id="search_id_code_person"  >SEARCH</button> 
                   </form>
            </li>           
        </ul>
        
    </div>
    
<!--    <button type="button" class="btn btn-default">Default</button>
-->	
<!--		
<button type="button"  >ค้นหา</button>
 -->       

<!--    <button type="button" class="btn btn-info">Info</button>
    <button type="button" class="btn btn-danger">Danger</button>
-->    
         
    <?PHP echo form_fieldset_close(); ?>
</body>
</html>

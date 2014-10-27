<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php   $this->import_->jquery_import() ; ?>
<title>Untitled Document</title>

<script>
//$(document).ready(function(){
//  $("button").click(function(){
//    x=$("form").serializeArray();
//    $.each(x, function(i, field){
//      $("#results").append(field.name + ":" + field.value + " ");
//    });
//  });
//});
</script>

<script>
$(document).ready(function(){
  $("button").click(function(){
    $.getScript("<?=base_url()?>index.php/test/getScript_serializeArray");
  });
});
</script>


</head>

<body>

<form action="">
First name: <input type="text" name="FirstName" value="Mickey" /><br>
Last name: <input type="text" name="LastName" value="Mouse" /><br>
User name: <input type="text" name="user" value="" /><br>
Password: <input type="password" name="password" value="1234" />
<br>
</form>

<button>Serialize form values</button>
<div id="results"></div>

</body>
</html>

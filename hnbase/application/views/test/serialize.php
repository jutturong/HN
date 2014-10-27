<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<?php   $this->import_->jquery_import() ; ?>

<script>
//$(document).ready(function(){
//  $("button").click(function(){
//    $("div").text($("form").serialize());
//  });
//});
</script>


<script>
$(document).ready(function(){
  $("button").click(function(){
    $.getScript("<?=base_url()?>index.php/test/getScript_serial");
  });
});
</script>





</head>

<body>
<form action="">
First name: <input type="text" name="FirstName" value="Mickey" /><br>
Last name: <input type="text" name="LastName" value="Mouse" /><br>
</form>
<button>Serialize form values</button>
<div></div>


</body>
</html>

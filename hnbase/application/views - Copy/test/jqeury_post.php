<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php   $this->import_->jquery_import() ; ?>
<title>Untitled Document</title>
<script>
$(document).ready(function(){
  $("input").keyup(function(){
    txt=$("input").val();
    //$.post("demo_ajax_gethint.asp",{suggest:txt},function(result){
	 $.post("<?=base_url()?>index.php/test/demo_ajax_gethint",{suggest:txt},function(result){
      $("span").html(result);
    });
  });
});
</script>

</head>

<body>

<p>Start typing a name in the input field below:</p>
First name:

<input type="text" />
<p>Suggestions: <span></span></p>
<p>The file used in this example (<a href="demo_ajax_gethint.txt" target="_blank">demo_ajax_gethint</a>) is explained in our Ajax tutorial</p>



</body>
</html>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php   $this->import_->jquery_import() ; ?>
<script>
$(document).ready(function(){
  $("button").click(function(){
      // $.ajax({url:"demo_test.txt",success:function(result){
	   $.ajax({url:"<?=base_url()?>index.php/test/demo_test",success:function(result){
      $("#div1").html(result);
    }});
  });
});
</script>

<title>Untitled Document</title>
</head>

<body>

<div id="div1"><h2>Let jQuery AJAX Change This Text</h2></div>
<button>Get External Content</button>


</body>
</html>

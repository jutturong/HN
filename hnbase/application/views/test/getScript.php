<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php   $this->import_->jquery_import() ; ?>
<title>Untitled Document</title>
<script>
$(document).ready(function(){
  $("button").click(function(){
    $.getScript("<?=base_url()?>index.php/test/demo_ajax_script");
  });
});
</script>

</head>

<body>

<button>Use Ajax to get and then run a JavaScript</button>
</body>
</html>

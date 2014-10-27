<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php   $this->import_->jquery_import() ; ?>

<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js">
</script>
-->
<title>Untitled Document</title>

<script>
$(document).ready(function(){
  $("button").click(function(){
    //$.getJSON("<?=base_url()?>index.php/test/demo_ajax_json",function(result){
	$.getJSON("<?=base_url()?>index.php/test/db_json",function(result){
      $.each(result, function(i, field){
               //##  ========  tb_user ================
			    // $("div").append(field + " ");  //แบบนี้จะแสดงผลเป็นแบบ object
				//$("div").append(  "  "  +  field.id_user  + ' : '  +   field.user   +   '   ' +    field.birthday   );  // (tb_user)  ส่งแบบนี้จะมีการดึงผลเป็น fiedของ table เลย 
			   
			   //##======== tb_new ==================
			       $("div").append(  " title :  "  +  field.title  + ' <br> '    );  // (tb_new)  ส่งแบบนี้จะมีการดึงผลเป็น fiedของ table เลย
				  // $("div").append(  " content :  "  +  field.content  + ' <br> '    );  // (tb_new)  ส่งแบบนี้จะมีการดึงผลเป็น fiedของ table เลย
				    $("div").append(  " DMY :  "  +  field.DMY  + ' <br> '    );  // (tb_new)  ส่งแบบนี้จะมีการดึงผลเป็น fiedของ table เลย
      });
    });
  });
});
</script>


</head>

<body>

<button>Get JSON data</button>
<div></div>


</body>
</html>

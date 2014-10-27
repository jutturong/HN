<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php   $this->import_->jquery_import() ; ?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js">
</script>
<script>
$(document).ready(function(){
  $("button").click(function(){
    $("table").hide("slow",function(){
              alert("The paragraph is now hidden");
			  $("span").load('<?=base_url()?>index.php/test/j_serialize');
			//  $('button').attr("disabled", true);  //การปิดการทำงานของปุ่ม button
			  $('button').hide();
    });
  });
});
</script>

</head>
<body>
<button>Hide</button>

<table>
<tr>
<td>
<ui>
<li>
<p>This is a paragraph with little content.</p>
</li>
</ui>
</td></tr>
</table>

<span></span>


</body>
</html>


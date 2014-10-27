<!DOCTYPE html>
<html>
<head>

  <?php   
           // $this->load->view('import_css');
         //   $this->import_->import_css();
			$this->import_->jquery_import_ui();  //เป็น jquery ui  ทั้งหมดที่จะเอามาใช้
		//	$this->import_->import_ext();
  ?> 

<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js">
</script>
-->

<script type="text/javascript">
$(document).ready(function(){
  $("button").click(function(){
   // $.getJSON("<?=base_url()?>js_dev/demo_ajax_json.js",function(result){
	$.getJSON("<?=base_url()?>index.php/testcode/demo_ajax_json",function(result){
					  $.each(result, function(i, field){
						$("div").append(field.title + "<br>");
					  });
    });
  });
});


</script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>
<body>

<button>Get JSON data</button>
<div></div>
</body>
</html>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<?=$this->load->view('import_jqueryui')?>
</head>

<script>
$(document).ready(function(){
  $("button").click(function(){
    //$.getScript("demo_ajax_script.js");
	//$.getScript("<?=base_url()?>index.php/ajax/getScript");
	 
	 $.getScript("<?=base_url()?>index.php/ajax/getScript",function(data,textStatus,jqxhr)//ตัวอย่างการใช้งาน http://api.jquery.com/jQuery.getScript/
	  {
	     // alert(data);
		 // alert(textStatus);
		 // alert(jqxhr.status);
		   //$('div:first').html(jqxhr.status);
		   $('div:first').append(data);
	  });
	

  
  });
});
</script>


<body>

<button>Use Ajax to get and then run a JavaScript</button>
<div></div>


</body>
</html>

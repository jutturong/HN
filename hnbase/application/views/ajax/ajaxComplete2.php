<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ajaxComplete</title>

<?=$this->load->view('import_jqueryui')?>

<script>
$(function()
{
   $('.trigger').click(function(){
  		 //alert('t');
		 //$('.result').load('<?=base_url()?>index.php/ajax/demo_ajax_load');
		 //$('.result').text('<?=base_url()?>index.php/ajax/demo_ajax_load');
		 $('.result').append( "<ul><li>1.Request Complete.</li><li>2.Request Complete.</li></ul>" );
		                         });
}
);
</script>

<script>
$(function()
{
	$('.log').click(function()
	{
	   $('.result').hide(1000);
	}
	);
}
);
</script>

</head>

<body>

<div class="trigger">Trigger</div>
<div class="result"></div>
<div class="log">hide</div>


</body>
</html>

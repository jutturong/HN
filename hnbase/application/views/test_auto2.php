<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Demo</title>
<?=$this->load->view('import_jqueryui')?>
<script type="text/javascript">
 $(function()
 {
    alert('t');
 }
 );
</script>

<script type="text/javascript">
$(function() {
	
	//autocomplete
	$(".auto").autocomplete({
		//source: "search.php",
		source: "<?=base_url()?>index.php/home/test_json_php",
		//test_json_php
		minLength: 1
	});				

});
</script>


</head>
<body> 
	<form action='' method='post'>
		<p><label>Country:</label><input type='text' name='country' value='' class='auto'></p>
	</form>
</body>
</html>
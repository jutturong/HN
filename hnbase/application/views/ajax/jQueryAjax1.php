<html>
<head>
<title>ThaiCreate.Com jQuery Tutorials</title>
<?=$this->load->view('import_jqueryui')?>
<script type="text/javascript">
$(document).ready(function(){

	$("#btn1").click(function(){

				$.ajax({
				   type: "POST",
				   //url: "jQueryAjax1.php",
				   url:'<?=base_url()?>index.php/ajax/call_jQueryAjax1',
				   cache: false,
				   data: "name=John&location=Boston",
				   success: function(msg){
					 alert( "Data Call : " + msg);
					 $("p").append(msg);
				   }
				 });

		});
	});
</script>
</head>
<body>
	<p></p>
	<input type="button" id="btn1" value="Call">
</body>
</html>

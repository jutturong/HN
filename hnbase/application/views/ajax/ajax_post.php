<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ajaxComplete</title>

<?=$this->load->view('import_jqueryui')?>

<script>
$(document).ready(function(){
  $("button").click(function(){
    $.post("<?=base_url()?>index.php/ajax/demo_ajax_load",
    {
      name:"Donald Duck",
      city:"Duckburg"
    },
    function(data,status){
         //alert("Data: " + data + "\nStatus: " + status);
		// $('div:first').append('<li>'+data+'</li>');
		  $('div:first').text('[data ] : '+data+'  [status ] : '+status);
    });
  });
});
</script>


</head>

<body>

<button>Send an HTTP POST request to a page and get the result back</button>
<div></div>


</body>
</html>

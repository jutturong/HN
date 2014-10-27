<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ajaxComplete</title>

<?=$this->load->view('import_jqueryui')?>

<script>
$(document).ready(function(){
  $("button").click(function(){
    $.post("<?=base_url()?>index.php/ajax/ajax_post_php",
    $( "#fr1" ).serialize(),
    function(data,status){
         //alert("Data: " + data + "\nStatus: " + status);
		 //$('div:first').append('<html>'+data+'</html>'); 
		 $('div:first').html(data); //ตัวนี้ ok ใช้ได้
		 // $('div:first').text('[data ] : '+data+'  [status ] : '+status);
    }).console.log(data);
  });
});
</script>


</head>

<body>

<form action="" id="fr1">
First name: <input type="text" name="FirstName" value="Mickey" /><br>
Last name: <input type="text" name="LastName" value="Mouse" /><br>
telephone : <input type="text" name="telephone" value="086-8524170" /><br>
</form>

<button>Serialize form values</button>
<div></div>


</body>
</html>

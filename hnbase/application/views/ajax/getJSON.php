<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>json php</title>

<?=$this->load->view('import_jqueryui')?>

<script>
$(document).ready(function(){
  $("button").click(function(){
    //$.getJSON("demo_ajax_json.js",function(result){ //ใช้กับ .js
	//$.getJSON("<?=base_url()?>index.php/ajax/getjson",function(result){  //ใช้กับ server
	  //$.getJSON("<?=base_url()?>index.php/ajax/getjson_php2",function(result){//ok ใช้กับ server
	  $.getJSON("<?=base_url()?>index.php/ajax/getjson_php",function(result){//ok ใช้กับ server
      
	  $.each(result, function(i, field){
       	 	//$("div").append(field + " ");
			$("div").append( i + ' PROVINCE_CODE ='  +  field.PROVINCE_CODE +  ' PROVINCE_NAME=  '  + field.PROVINCE_NAME + " ");
			//$("#select1").append("<option value=" + i +">"+ field + "</option>");
			$("#select1").append("<option value=" + i +">"+  ' PROVINCE_CODE= ' + field.PROVINCE_CODE +  ' PROVINCE_NAME= '  +  field.PROVINCE_NAME + "</option>");
			//$("#select1").append("<option value=" + i +">"+ i + '.' + field  + "</option>");
      });
	  
	  
    });
  });
});
</script>

</head>

<body>
<button>Get JSON data</button>
<div></div>

<select id="select1" name="select1"></select>

</body>
</html>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<title>www.sweethai.com</title>
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


<script type="text/javascript">

function check1()
{
$(function () {
	//alert('t');
	var  width=$(window).width();
	var  height=$(window).height();
	var area='width='+width+'<br>height='+height;
	//$('#content').html(area);  //show size in text
	
	
	
})
}



   function test1()
   {
       // alert('test loading function 1');   
        var  width=$(window).width();
        var height=$(window).height(); 
        var base ="<?=base_url()?>";
   
        check1();
       
       // $('#emu_table').append('<table width="' +  width  + '"  height="' +  height  +  '"  border="1"  background="' +  base + 'picture/Swethai-Homepage-under-construction-140908.jpg"  ></table>');
        $('#emu_table').append('<table width="' +  width  + '"  height="' +  height  +  '"  border="0"     ></table>');   
        $('#emu_table').css({
           "background-image": "url(" + base  + "picture/Swethai-Homepage-under-construction-140908.jpg)",
           "background-size" : "" +  width + "px " + height  + "px", 
           "margin-top" : "0 px",
           "margin-left" : "0 px"
        });     
        var  table=$('#emu_table').children();
        table.append('<tr><td></td></tr>');
        
   }
   

   
</script>


<style type="text/css">
/*
table_css {
 background-image: url('<?=base_url()?>picture/Swethai-Homepage-under-construction-140908.jpg');
 background-size: 1024px 639px;
 margin-top:0 px;
 margin-left: 0 px;
}
*/
</style>

</head>

<body onload="javascript:test1();">

<div id="content"></div>
<div id="emu_table"></div>
<!--
<table width='1024' height='639' border="0" >
<tr>
<td>

</td>
</tr>
</table>
-->


</body>
</html>
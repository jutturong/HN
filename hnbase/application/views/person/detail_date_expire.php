<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$title?></title>
<?php    //$this->load->view('import_css');   ?>    
<?php   //$this->load->view('import_ext'); //load  extjs  framework  ?>  
<?php    $this->load->view('import_bootstrap');  //ตัวนี้เอาออกไว้ก่อนเพราะทำให้ form กำหนดขนาดความกว้างไม่ได้ ?>
<?php    $this->load->view('import_jqueryui'); ?>
<?php    //$this->load->view('import_css_custom'); //comment2?>
<?php    //$this->load->view('import_style'); ?>


 <script>
$(function() {
    var  day=parseInt('<?php echo $passport; ?>');
    var  va=parseInt('<?=$use_1?>');
    if( day <= 0)
    {
       var va =0;   
    }else
    {
      var  va=parseInt('<?=$use_1?>');  
    }
$( "#prog_passport" ).progressbar({
//value: 37,
value: va,
max : 90
});
});
</script>

 <script>
$(function() {
    var  day=parseInt('<?php echo $visa; ?>');
    var  va=parseInt('<?=$use_2?>');
    if( day <= 0)
    {
       var va =0;   
    }else
    {
      var  va=parseInt('<?=$use_2?>');  
    }    
    
    //  var  va=parseInt('<?=$use_2?>');
$( "#prog_visa" ).progressbar({
//value: 37,
value: va,
max : 90
});
});
</script>

 <script>
$(function() {
    var  day=parseInt('<?php echo $register; ?>');
    var  va=parseInt('<?=$use_3?>');
    if( day <= 0)
    {
       var va =0;   
    }else
    {
      var  va=parseInt('<?=$use_3?>');  
    }        
    
    //  var  va=parseInt('<?=$use_3?>');  
$( "#prog_report" ).progressbar({
value: va,
//value: 37,
max : 90
});
});
</script>

 <script>
$(function() {
     var  day=parseInt('<?php echo $workpermit; ?>');
    var  va=parseInt('<?=$use_4?>');
    if( day <= 0)
    {
       var va =0;   
    }else
    {
      var  va=parseInt('<?=$use_4?>');  
    }   
        
 //var  va=parseInt('<?=$use_4?>');  
$( "#prog_permit" ).progressbar({
//value: 37,
value: va,
max : 90
});
});
</script>

</head>

<body>
<?php
     if( $passport <= 0 )
     {
         $use_1=0;
     }
     
      if( $visa <= 0 )
     {
         $use_2=0;
     }
     
     if( $register <= 0 )
     {
         $use_3=0;
     }
     
     if( $workpermit <= 0 )
     {
         $use_4=0;
     }
?>
<!--<div class="table-responsive">-->
<table class="table table-hover">
  
<!-- On rows -->
<!--
<tr class="active">#</tr>
<tr class="success">1</tr>
<tr class="warning">2</tr>
<tr class="danger">3</tr>
<tr class="info">4</tr>
-->

<!-- On cells (`td` or `th`) -->
<tr>
  <td class="active">PASSPORT  <b><font color='red'><?php echo $passport; ?>  DAYS</font></b></td>
  <td class="active">VISA <b><font color='red'><?php echo $visa; ?>  DAYS</font></b></td>
  <td class="active">90 REPORT <b><font color='red'><?php echo $register; ?>  DAYS</font></b></td>
  <td class="active">Work Permit  <b><font color='red'><?php echo $workpermit; ?>  DAYS</font></b></td>
<!--  
  <td class="success">1</td>
  <td class="warning">2</td>
  <td class="danger">3</td>
  <td class="info">4</td>
  -->
</tr>

<tr>
<td class="success">
 <?php  echo $iss_passport.' - '.$exp_passport;     ?>
    <?=br()?>
 
</td>
<td class="warning">
  <?php  echo $iss_visa.' - '.$exp_visa;    ?> 
     <?=br()?>
    
</td>
<td class="success">
  <?php echo $register_date.' - '.$next_register_date; ?>
    <?=br()?>
   
</td>
<td class="warning">
   <?php echo $iss_date_workpermit.' - '.$exp_date_workpermit; ?> 
 
</td>
</tr>

<tr class="active">
    <td colspan="4">
    PASSPORT (use <?=$use_1?> days)
    <div id="prog_passport"></div>
    </td>
</tr>

<tr class="active">
    <td colspan="4">
    VISA (use <?=$use_2?> days)
    <div id="prog_visa"></div>
    </td>
</tr>

<tr class="active">
    <td colspan="4">
    90 REPORT (use <?=$use_3?> days)
    <div id="prog_report"></div>
    </td>
</tr>

<tr class="active">
    <td colspan="4">
    Work Permit (use <?=$use_4?> days)
    <div id="prog_permit"></div>
    </td>
</tr>


  </table>
  
<!--</div>-->


</body>


</html>
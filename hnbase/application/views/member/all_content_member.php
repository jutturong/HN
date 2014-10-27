<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<style type="text/css">
  @import url("<?php  echo  base_url(); ?>table_images/style_table.css");
  /*@import url "import2.css";*/
</style>
<!--<script type="text/javascript" src="<?=base_url()?>js_ext_code_dev/progress.js"></script>-->
<?php    
  $this->import_->import_jquery_api(); 	 //// import css,js   jquery   
  
//$this->import_->import_css();
$this->import_->jquery_import_ui();  //เป็น jquery ui  ทั้งหมดที่จะเอามาใช้
//$this->import_->import_ext();
  ?>

<?php   form_open('menu/del_multi_processer');  ?>


<?php    
  //$this->querymember->query_member(); 
    $this->querymember->query_member_modify();
?>
<?php  form_close()?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$title?></title>

        <script type="text/javascript">
            /*
                $(document).ready(function(){
                    $("#id_tb_person").autocomplete({
                        //source:'getautocomplete.php',
						//source:'<?=base_url()?>index.php/home/json_test2',
						source:'<?=base_url()?>index.php/home/call_person',
                        minLength:1
                    });
                });
             */   
        </script>

<script type="text/javascript">
function   send1()
{
   //alert('t');
   $.post('<?=base_url()?>index.php/person/update_relation_person',
      $('#form_peson').serialize(),
	   function(data,status)
	   { 
	      //alert(''+data+''+status);
               //alert(status); 
	        if( $('#id_tb_person').val() != '' )
                {
                    alert(''+data); 
		   //load_content
		   //window.location.assign("http://www.w3schools.com")
		   //window.location.assign("<?=base_url()?>index.php/home/load_content/4")
                   window.close();
               }
               else
               {
                   alert('ระบุชื่อของพนักงานก่อน!!');
                   $('#id_tb_person').focus();
                }
                   
	   }
	     );
}

</script>

</head>
<?PHP    $this->load->view('import_jqueryui'); ?>
<body>
	   <?PHP echo  form_fieldset(''.$fieldset.''); ?>
    <form id="form_peson">
    <div>
        <ul>                     
            <li>
                <input type="hidden" id="id_tb_relation_person" name="id_tb_relation_person" value="<?=$id_tb_relation_person?>"/>
                ภูมิลำเนาเดิมที่อยู่ในพม่า: <textarea rows="2" cols="70"  name="address_origin" id="address_origin"><?=$address_origin?></textarea>  *                               			            
            </li>
        
            <li>
                หมายเลขโทรศัพท์ : <input type="text" name="telephone"  id="telephone"  maxlength="20"  style="width:15%" value="<?=$telephone?>" /> *
            </li>
            
            <li>
                ที่พักอาศัยในปัจจุบัน: <textarea rows="2" cols="70" id="address_in_thai" name="address_in_thai"><?=$address_in_thai?></textarea>  *						
            </li>
            
            <li>
                เพื่อนหรือคนใกล้ชิดญาติที่ติดต่อได้ : <input type="text" name="friend"  id="friend"  maxlength="60"  style="width:40%" value="<?=$friend?>" />
                <!-- -<input type="text" name=""  id=""  maxlength="20"  style="width:25%" value="anglelo" /> -->
                *
            </li>
            
            <li>
                หมายเลขโทรศัพท์ของญาติ : <input type="text" name="phone_friend"  id="phone_friend"  maxlength="20"  style="width:20%" value="<?=$phone_friend?>" />
            </li>

            
                        <li>
                            ที่พักอาศัยของญาติ : <textarea rows="2" cols="70" id="relative_address" name="relative_address"><?=$relative_address?></textarea>  *                        						
                        </li>

            
        </ul>
    </div>
    
		<button type="button" onclick="javaScript:send1()"  >บันทึก</button>
        <button type="button" >ยกเลิก</button>
            </form>
    <?PHP echo form_fieldset_close(); ?>

</body>
</html>

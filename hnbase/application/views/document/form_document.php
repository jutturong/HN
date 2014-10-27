<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$title?></title>

        <script type="text/javascript">
                $(document).ready(function(){
                    $("#id_tb_person").autocomplete({
                        //source:'getautocomplete.php',
						//source:'<?=base_url()?>index.php/home/json_test2',
						//source:'<?=base_url()?>index.php/home/call_person', //ของเดิม
                                                                             source:'<?=base_url()?>index.php/home/call_employee',
                        minLength:1
                    });
                });
        </script>
        
       <script type="text/javascript">
       $(function()
		   {
				$('button:first').button({icons:{primary:'ui-icon-search'}}).next().button({icons:{primary:'ui-icon-close'}});
		   }
	   );
       </script>
        
<script type="text/javascript">   
    /*
function   send1()
{
   //alert('t');
   $.post('<?=base_url()?>index.php/document/upload_file',
      $('#form_document').serialize(),
	   function(data,status)
	   { 
	      //alert(''+data+''+status);
               //alert(status); 
	        if( $('#id_tb_person').val() != '' )
                {
                    //alert(''+data); 
		   //load_content
		   //window.location.assign("http://www.w3schools.com")
		   //window.location.assign("<?=base_url()?>index.php/home/load_content/4")
               }
               else
               {
                   alert('ระบุชื่อของพนักงานก่อน!!');
                   $('#id_tb_person').focus();
                }
                   
	   }
	     );
}
   */
</script>

</head>

<body>
         <?PHP echo form_open_multipart("document/upload_file_mo2"); ?>
	   
             <?PHP echo  form_fieldset(''.$fieldset.''); ?>
    <!--
    <form id="form_document" enctype="multipart/form-data"   action="<?=base_url()?>index.php/document/upload_file" method="post">
     -->
     

    
        <div>
        <ul>
            <li>
            Search Name : <input type="text" name="id_tb_person"  id="id_tb_person"  maxlength="20"  style="width:50%" class="example6" /> *
            </li>
            
            
             <li>
			
                 TR38/1 : <input type="file" name="doc_38_1" id="doc_38_1"   style="width:40%; height:10%" />
             </li>      

             <li>
			 
                 PASSPORT : <input type="file" name="doc_passport" id="doc_passport"   style="width:40%; height:10%" />
             </li>      

             <li>
                 VISA : <input type="file" name="doc_visa" id="doc_visa"   style="width:40%; height:10%" />
             </li>      

             <li>
                 Work Permit : <input type="file" name="doc_for_permission"  id="doc_for_permission"  style="width:40%; height:10%" />
             </li>
             
             <li>
                 Work Permit Billing : <input type="file" name="doc_pay_permission" id="doc_pay_permission"   style="width:40%; height:10%" />
             </li>      
      
             <li>
                 Work Permit detail : <textarea name="doc_permission" id="doc_permission" cols="" rows=""></textarea>
             </li>      

            
        </ul>
    </div>
    
		<!--<button type="button" onclick="javaScript:send1()" >บันทึก</button>-->
                <button type="submit"  >Add</button>
        <button type="button" >Cancel</button>
       
        
       

        <!--
     </form>
-->

    <?PHP echo form_fieldset_close(); ?>
 <?php echo form_close() ?>

</body>
</html>

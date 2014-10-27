<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?PHP   $this->load->view('import_table2css'); ?>
<title><?=$title?></title>
<?php   $this->load->view('import_bootstrap_MVC'); ?>
<script>
function  msg_del(id)
{
    $(function()
    {
       
       // window.confirm("Are you delete attach file ?");
        var  r=confirm("Are you delete attach file ?");
        if( r == true )
        {
            //alert('id is '+id);
            window.location.assign('<?=base_url()?>index.php/document/delete_tb_document/'+ id );
        }
        else
        {
            
        }
    });
}
</script>
</head>

    <body>
      
         <table class='sortable autostripe' style=" width: 500px">
			<thead>
				<tr>
					<th>TR38/1</th>
					<th>PASSPORT</th>
                                                                 <th>VISA</th>
                                                                 <th>Work Permit</th>
                                                                   <th>Work Permit Billing</th>   
                                                                 <th>Work Permit detail</th>
                                                                 <th>Delete</th>
                                                    </tr>  
                            <tr>
                                
                                </thead>
			<tbody>
                            
                            <div class="row">
  
 <?PHP   
 $atts = array(   // show document
              'width'      => '800',
              'height'     => '600',
              'scrollbars' => 'yes',
              'status'     => 'yes',
              'resizable'  => 'yes',
              'screenx'    => '0',
              'screeny'    => '0'
            );
?>      
</div><!-- /.row -->
<?php

$path = base_url().'';
$path .= "upload/";

$icon="glyphicon glyphicon-paperclip"; //แทนค่าใน class icon
//echo $path;
//echo br();
foreach($query->result() as $row )
{
     $id_document=$row->id_document;
     $doc_38_1=$row->doc_38_1;  //a
     $doc_passport=$row->doc_passport; //b
     $doc_visa=$row->doc_visa;  //c
    $doc_for_permission=$row->doc_for_permission; //d
        //$doc_for_permission="ch7.pdf";     
    $doc_pay_permission=$row->doc_pay_permission; //e
       //$doc_pay_permission="ch7.pdf";     
   $doc_permission=$row->doc_permission; //f
      //$doc_permission="ch7.pdf";   
?>
<tr>
                 <td>
                     <input type="hidden" id="id_document" name="id_document"  value="<?=$id_document?>" />
                     <?php     $path_a =   $path.$doc_38_1;   ?>
                     <?php  echo nbs(2);  $this->documentmodels->attach_file($doc_38_1,$icon,$path_a); ?>
                 </td>
    
                 <td>
                  
                     <?php     $path_b =   $path.$doc_passport;   ?>
                     <?php  echo nbs(2);  $this->documentmodels->attach_file($doc_passport,$icon,$path_b); ?>
                 </td>
    
                  <td>
                  
                     <?php     $path_c =   $path.$doc_visa;   ?>
                     <?php  echo nbs(2);  $this->documentmodels->attach_file($doc_visa,$icon,$path_c); ?>
                 </td>
    
                  <td>
                  
                     <?php     $path_d =   $path.$doc_for_permission;   ?>
                     <?php  echo nbs(2);  $this->documentmodels->attach_file($doc_visa,$icon,$path_d); ?>
                 </td>
    
                 <td>
                  
                     <?php     $path_e =   $path.$doc_pay_permission;   ?>
                     <?php  echo nbs(2);  $this->documentmodels->attach_file($doc_visa,$icon,$path_e); ?>
                 </td>
    
                  <td>
                  
                    <?php  echo   $doc_permission;  ?>
                 </td>
    
    <td>   
        <?php  echo nbs(2); ?>
        <a href="#" onclick="msg_del(<?php echo $id_document;  ?>)">
        <span class="glyphicon glyphicon-floppy-remove icon-large"></span>
        </a>
    </td>
    
    
    
 </tr>
<?php

}
?>
                        </tbody>  
             
               <tfoot>
				<tr>
					
                                    <th class='numeric' colspan="7">
                                        
                                        Sum <?php echo $sum; ?>
                                            
                                        </span>
                                        
					
					
				</tr>
			</tfoot>
		
         </table>    
        
        
    </body>
</html>


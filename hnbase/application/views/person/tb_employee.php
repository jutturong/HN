<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?PHP   $this->load->view('import_table2css'); ?>
<title><?=$title?></title>
<?php   $this->load->view('import_bootstrap_MVC'); ?>
<?php    $this->load->view('import_jqueryui'); ?>


<!-- sometime later, probably inside your on load event callback -->
<script type="text/javascript">


function disp_confirm(id)  //confirm
{
var r=confirm("Are you delete? ")
if (r==true)
  {
  	    
       //alert(""+id);
       window.location.assign('<?=base_url()?>index.php/home/del_employee/'+ id );
       //  window.location.assign("http://www.w3schools.com")
  }
else
  {
  //alert("You pressed Cancel!")
  }
}


</script>


        <script type="text/javascript">
            $(function()
            {
                $("#id_tb_person").autocomplete({
                        //source:'getautocomplete.php',
						//source:'<?=base_url()?>index.php/home/json_test2',
						//source:'<?=base_url()?>index.php/home/call_person', //ของเดิม
                                                                             source:'<?=base_url()?>index.php/home/call_employee',
                                                                              minLength:1
                    });
                
            });
        </script>

    
</head>

    <body>
        <?php
           $datestring = "%Y-%m-%d";                   
           $cur_date= mdate($datestring); //วัน เดือน ปี ปัจจุบัน
        ?> 
        
        
          <ul>
            <?php  echo form_open('home/search_employee'); ?>
             <li>
           Search Name : <input type="text" name="id_tb_person"  id="id_tb_person"  maxlength="20"  style="width:50%" class="example6" />
           <button type="submit" class="btn btn-default">Search</button>
        
            </li>
             <?php  echo form_close(); ?>       
                    
          </ul>
        
        
        
        <table class='sortable autostripe' style=" width: 500px">
			<thead>
				<tr>
					<th>First Name - lastname </th>
					<th>Call Name</th>
                                                                 <th>Document</th>
                                                                 <th>Update</th>
                                                                   <th>Report</th> 
                                                                   <th>Show Date Expire</th>
                                                                   <th>Date Expire</th>
                                                                 <th>Del</th>
                                                    </tr>              
			</thead>
			<tbody>
                            
                            <div class="row">
  
 <?PHP   
 $atts = array(   // show document
              'width'      => '800',
              'height'     => '400',
              'scrollbars' => 'yes',
              'status'     => 'yes',
              'resizable'  => 'yes',
              'screenx'    => '0',
              'screeny'    => '0'
            );
 
  $atts_detail = array(   // show document
              'width'      => '600',
              'height'     => '900',
              'scrollbars' => 'yes',
              'status'     => 'yes',
              'resizable'  => 'yes',
              'screenx'    => '0',
              'screeny'    => '0'
            );
  
    $atts_date = array(   // show document
              'width'      => '900',
              'height'     => '500',
              'scrollbars' => 'yes',
              'status'     => 'yes',
              'resizable'  => 'yes',
              'screenx'    => '0',
              'screeny'    => '0'
            );
?>      
</div><!-- /.row -->
                            <?php  
$tb_icon="tb_document";
$id_field="id_tb_person";
//$id_value=21;

                            foreach($query->result() as  $row )  
                            {  
                                $id_employee=$row->id_employee;
                                $firstname=$row->firstname;
                                $lastname=$row->lastname;
                                $callname=$row->callname;
                                $total=$id_employee.".  ".$firstname.nbs(5).$lastname;                               
                                //$encode_id =$id_employee;                            
                                $id_encode=$this->encrypt->encode($id_employee);
                                //echo  br();
                              //  echo  $this->encrypt->decode($id_encode);
                              //  echo  br();    
                                
                                $exp_passport=$row->exp_passport;//PASS Exp. (วันที่หมดอายุพาสปอร์ต ) :
                                //echo br();
                               $passport=MY_cal_date_expire_concept($cur_date,$exp_passport); 
                               
                                
                               $exp_visa=$row->exp_visa; //VISA Exp. (วันที่หมดอายุวีซ่า )
                               $visa=MY_cal_date_expire_concept($cur_date,$exp_visa); 
                             
                               
                                $next_register_date=$row->next_register_date; //Next 90 Report Date. (วันที่รายงานตัว )
                                $register=MY_cal_date_expire_concept($cur_date,$next_register_date); 
                               
                                 
                                 $exp_date_workpermit=$row->exp_date_workpermit;
                                 $workpermit=MY_cal_date_expire_concept($cur_date,$exp_date_workpermit);
                              
                                 
                                
                                ?>
                            <tr>
                                <td>
                                    <?=$total?>                                 
                                </td>
                                 <td><?=$callname?></td>
                                 <td>                                   
                                     
    <!-- <button class="btn btn-primary" data-toggle="modal" data-target="#basicModal"> --> 
    <?php  $this->documentmodels->icon_attach($id_employee,$tb_icon,$id_field,$id_employee); ?>
     <?PHP   
     $btn="<button class=\"btn btn-primary\" data-toggle=\"modal\" data-target=\"#basicModal\"><span class=\"glyphicon glyphicon glyphicon-upload\"></span></button>";
     echo anchor_popup('home/show_document/'.$id_employee,$btn, $atts);    
     ?>   
 <!--    </button>-->


                                     
                                 </td>
                                 <td>
                                    
                                    
                                      
                                             <?php
                                              $btn="<button class=\"btn btn-primary\" data-toggle=\"modal\" data-target=\"#basicModal\"><span class=\"glyphicon glyphicon-edit\"></span></button>";
     echo anchor_popup('home/update_employee/'.$id_employee,$btn, $atts_detail);  
                                             
                                               ?>
                                        
                                         
                                                                     </td>
                                 <td><a href="../../../report_pdf/hnbase_report/report_app.php?id_employee=<?=$id_employee?>" target="_blank"><span class="glyphicon glyphicon-barcode"></span></a></td>
                                
                                 <td>
                                   <!--<img src="<?=base_url()?>icon/show.jpeg" width="40" />-->
                                      <?PHP   
     $btn="<button class=\"btn btn-primary\" data-toggle=\"modal\" data-target=\"#basicModal\"><span class=\"glyphicon glyphicon-ok\"></span></button>";
     echo anchor_popup('home/show_date_expire/'.$id_employee,$btn, $atts_date);    
     ?>   
                                 </td>
                                 
                                 
                                 <td>
                                     
                                     
                                     <!-- <img src="<?=base_url()?>icon/exp.jpeg" width="40" /> -->
                                    <!-- Expire Date -->
                                    <!-- --  -->
                                    <?php
                                     //    $btn="<button class=\"btn btn-primary\" data-toggle=\"modal\" data-target=\"#basicModal\"><span class=\"glyphicon glyphicon-minus\"></span></button>";
  //   echo anchor_popup('home/show_document/'.$id_employee,$btn, $atts_date);  
                                       ?>
                                    
                                    <?php    check_expire_date($passport,$visa,$register,$workpermit); ?>
                                    
                                 </td>
                                 
                                 <td><a href="javascript:disp_confirm(<?php echo $id_employee; ?>);"><span class="glyphicon glyphicon-trash"></span></a></td>
                            </tr>
                            <?php
                            }
                            ?>
			</tbody>
    <tfoot>
				<tr>
					
                                    <th class='numeric' colspan="8">Sum   <?=$numrows?>   </th>
					
					
				</tr>
			</tfoot>
		</table>
        
        

  <div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&amp;times;</button>
            <h4 class="modal-title" id="myModalLabel">Modal title</h4>
            </div>
            <div class="modal-body">
                <h3>Modal Body</h3>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
        </div>
    </div>
  </div>
</div>      
    
    </body>

</html>

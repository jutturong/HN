<?php   if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Querymember extends  CI_Model {

    function Querymodels()  //model  การ query ทั้งหมด
    {
        //parent::CI_Model();
		   parent::__construct();
    }


function   query_member() //แสดงรายการทั้งหมด  MAIN MENU
{ //begin function
				 //##=== ตัวแปร
				  $tb="tb_user";
				  $id="id_user";
				   $link_form="menu/del_multi_processer";
				$this->db->order_by($id,'desc');
				$query=$this->db->get($tb);
?>
<?php      echo   form_open($link_form);     ?>
<script type="text/javascript">
      $(function()
	  {
	        $('#main_save_form').button({         icons:{  primary:"ui-icon-clipboard" }         });
			$('#main_reset_form').button({         icons:{  primary:"ui-icon-clipboard" }         });
			$('#search_mainmenu').button({         icons:{  primary:"ui-icon-zoomin" }         }).click(function()
			                    {    
								            
										if(   $('#id_head_leftmenu').val() > 0 )
										{
														//alert('t');
														  $('#span_load_tab2').load('<?=base_url()?>index.php/menu/load_menu',{  'choice':7,'id_head_leftmenu':$('#id_head_leftmenu').val() }); 
															return false;   
										}
										else
										{
										                   Ext.MessageBox.alert('Error status','ระบุรายการที่ค้นหาก่อน');
													    	return false;   
										}					
								});
	  }
	  );
</script>
<table class="imagetable" cellpadding="0" cellspacing="0">

<tr>
	<th colspan="2">User Account</th>
<!--    <th>ลำดับที่</th>
    <th>รูปภาพประกอบ</th>
    <th>หัวข้อข่าวสาร (NEWS)</th>
-->    
    <th>User name</th>
    <th><img src="<?=base_url()?>images/a5.jpg"  width="20"     > Admin/ <img src="<?=base_url()?>images/u4.jpg"  width="20"     >User</th>
    <th>วันที่/เวลา ที่เป็นสมาชิก</th>
  <!--  <th>ปักหมุด</th>-->
   <!-- <th>แสดงผล</th>-->
    <th>อนุญาติการใช้งาน</th>
    <!--<th>สถานะ ON/OFF</th>-->
  <!--  <th>Show/hidden</th>-->
  <!--   <th>ลบ</th>-->
</tr>
         <?php
				  
			//	  if( $id_query1_va  == '' )
		//		  {
				  		 //$query=$this->db->get_where($tb,array('mainmenu_enable'=>1));
						//  $query=$this->db->get_where($tb);
		//		   }
//				   elseif( $id_query1_va >= 1 )
//				   {
//				         $query=$this->db->get_where($tb,array('mainmenu_enable'=>1,$id_query1=>$id_query1_value));
//				   }
				   
				  //   $query=$this->db->get($tb);
				   $check = $query->num_rows();
				   if(   $check > 0 )
				   {
							   foreach( $query->result() as $row)
							   {
								       $id_user=$row->id_user;
									  // $id_head_leftmenu=$row->id_head_leftmenu;
									    $user=$row->user;
									 //  $DMY=$row->DMY;
									   $password=$row->password;
									   $name=$row->name; 
									   $lastname=$row->lastname;  //หัวข้อรายการหลัก menu
									   $user_enable=$row->user_enable;
									   $level_user=$row->level_user;
									   $id_card=$row->id_card;
									   $address=$row->address;
									   $date_record =$row->date_record ;
									   $email=$row->email;
									   $birthday =$row->birthday;
									   $id_card=$row->id_card;
									   $level_user =$row->level_user; //ระดับของ user1=admin 2=user
										switch($level_user)
									   {
									       case 1:
										   {
										        //  $status_member="Administrator  <br> <img src=\"".base_url()."images/a6.jpg\"  width=\"40\"     >";
												  $status_member="<img src=\"".base_url()."images/a5.jpg\"  width=\"25\"     >";
										        break;
										   }
										   case 2:
										   {
										          // $status_member="User";
												     $status_member="<img src=\"".base_url()."images/u4.jpg\"  width=\"25\"     >";
										        break;
										   }
									   }

									   switch($user_enable)
									   {
									       case 0:
										   {
										         $enable_icon="wrong.jpg";
										        break;
										   }
										   case 1:
										   {
										           $enable_icon="right.jpg";
										        break;
										   }
									   }
									   
									   //echo   DMY_thai_convert($DMY);  //helper
									  ?>
								   <tr onmouseover="this.style.backgroundColor='#ffff66';" onmouseout="this.style.backgroundColor='#FFFFFF';">
                                     <td><?=$id_user?></td>
                                      <td>
									  <?=$name?>
                                      <?=nbs(2)?>
                                      <?=$lastname?>
                                      <?=nbs(2)?>
                                      <?=$birthday?>
                                      <?=br()?>
                                      <?=$address?>
                                      <?=br()?>
                                      <?=$id_card?>
                                      <?=br()?>
                                      <?=$email?>
                               
							   <?=br();?>              
											   <?php
                                $image_edit_properties = array(
                                          'src' => 'images/ed1-re.jpg',
                                          'alt' => '',
                                          'class' => '',
                                          'width' => '13',
                                          'height' => '13',
                                          'title' => '',
                                          'rel' => 'lightbox',
                                );
                                 echo  img($image_edit_properties);
                                 echo  nbs(1);
                                ?>
                               <!-- <a href="#" id="edit<?=$id_user?>">แก้ไข</a> -->   
                               <a href="<?=base_url()?>index.php/member/member_menu/4/<?=$id_user?>" id="edit<?=$id_user?>">แก้ไข</a>           
								<?php
                                $image_edit_properties = array(
                                          'src' => 'images/de4-re.jpg',
                                          'alt' => '',
                                          'class' => '',
                                          'width' => '13',
                                          'height' => '13',
                                          'title' => '',
                                          'rel' => 'lightbox',
                                );
                                   echo  img($image_edit_properties);
                                   echo  nbs(1);
                                ?>
									<a href="#"  id="check_del<?=$id_user?>" >ลบ</a>
                                      </td>
                                      <td>
										  <?php		 echo   $user; //MY_strpos_link($linkmenu);  //helper->gen_string    ?>
                                      </td>
                                      <td><?php   echo $status_member;  //echo  $email;  //echo   $headmenu; ?></td>
                                      <td><?php   echo  DMY_thai_convert($date_record);   ?></td>
                                     
                                      <td>
                                                 <img src="<?=base_url()?>images/<?=$enable_icon?>"  width="30" />
                                      </td>
                                     <!--  <td><input name="array_delete[]" type="checkbox" value="<?=$id_user?>" /></td>-->
                                   </tr>
									  <?php
							   }//end foreach
					}		   
		 ?>
</table>
<?php   echo   form_close(); ?>
<?php
}//end  function


function   query_member_modify() //แสดงรายการทั้งหมด  MAIN MENU
{ //begin function
				 //##=== ตัวแปร
				  $tb="tb_user";
				  $id="id_user";
				   $link_form="menu/del_multi_processer";
				$this->db->order_by($id,'desc');
				$query=$this->db->get($tb);
?>
<?php      echo   form_open($link_form);     ?>
<table class="imagetable" cellpadding="0" cellspacing="0">

<tr>
	<th colspan="2">User Account</th>
<!--    <th>ลำดับที่</th>
    <th>รูปภาพประกอบ</th>
    <th>หัวข้อข่าวสาร (NEWS)</th>
-->    
    <th>User name</th>
    <th><img src="<?=base_url()?>images/a5.jpg"  width="20"     > Admin/ <img src="<?=base_url()?>images/u4.jpg"  width="20"     >User</th>
    <th>วันที่/เวลา ที่เป็นสมาชิก</th>
  <!--  <th>ปักหมุด</th>-->
   <!-- <th>แสดงผล</th>-->
    <th>อนุญาติการใช้งาน</th>
    <!--<th>สถานะ ON/OFF</th>-->
  <!--  <th>Show/hidden</th>-->
  <!--   <th>ลบ</th>-->
</tr>
         <?php
				  
			//	  if( $id_query1_va  == '' )
		//		  {
				  		 //$query=$this->db->get_where($tb,array('mainmenu_enable'=>1));
						//  $query=$this->db->get_where($tb);
		//		   }
//				   elseif( $id_query1_va >= 1 )
//				   {
//				         $query=$this->db->get_where($tb,array('mainmenu_enable'=>1,$id_query1=>$id_query1_value));
//				   }
				   
				  //   $query=$this->db->get($tb);
				   $check = $query->num_rows();
				   if(   $check > 0 )
				   {
							   foreach( $query->result() as $row)
							   {
								       $id_user=$row->id_user;
									  // $id_head_leftmenu=$row->id_head_leftmenu;
									    $user=$row->user;
									 //  $DMY=$row->DMY;
									   $password=$row->password;
									   $name=$row->name; 
									   $lastname=$row->lastname;  //หัวข้อรายการหลัก menu
									   $user_enable=$row->user_enable;
									   $level_user=$row->level_user;
									   $id_card=$row->id_card;
									   $address=$row->address;
									   $date_record =$row->date_record ;
									   $email=$row->email;
									   $birthday =$row->birthday;
									   $id_card=$row->id_card;
									   $level_user =$row->level_user; //ระดับของ user1=admin 2=user
										switch($level_user)
									   {
									       case 1:
										   {
										        //  $status_member="Administrator  <br> <img src=\"".base_url()."images/a6.jpg\"  width=\"40\"     >";
												  $status_member="<img src=\"".base_url()."images/a5.jpg\"  width=\"25\"     >";
										        break;
										   }
										   case 2:
										   {
										          // $status_member="User";
												     $status_member="<img src=\"".base_url()."images/u4.jpg\"  width=\"25\"     >";
										        break;
										   }
									   }

									   switch($user_enable)
									   {
									       case 0:
										   {
										         $enable_icon="wrong.jpg";
										        break;
										   }
										   case 1:
										   {
										           $enable_icon="right.jpg";
										        break;
										   }
									   }
									   
									   //echo   DMY_thai_convert($DMY);  //helper
									  ?>
								   <tr onmouseover="this.style.backgroundColor='#ffff66';" onmouseout="this.style.backgroundColor='#FFFFFF';">
                                     <td><?=$id_user?></td>
                                      <td>
									  <?=$name?>
                                      <?=nbs(2)?>
                                      <?=$lastname?>
                                      <?=nbs(2)?>
                                      
                                      <?=$birthday?>
                                      
                                      
                                      <?=br()?>
                                      <?=$address?>
                                      <?=br()?>
                                      <?=$id_card?>
                                      <?=br()?>
                                      <?=$email?>
                               
							   <?=br();?>              
											   <?php
                                $image_edit_properties = array(
                                          'src' => 'images/ed1-re.jpg',
                                          'alt' => '',
                                          'class' => '',
                                          'width' => '13',
                                          'height' => '13',
                                          'title' => '',
                                          'rel' => 'lightbox',
                                );
                                 echo  img($image_edit_properties);
                                 echo  nbs(1);
                                ?>
                               <!-- <a href="#" id="edit<?=$id_user?>">แก้ไข</a> -->   
                               <a href="<?=base_url()?>index.php/member/member_menu/4/<?=$id_user?>" id="edit<?=$id_user?>">แก้ไข</a>           
								<?php
                                $image_edit_properties = array(
                                          'src' => 'images/de4-re.jpg',
                                          'alt' => '',
                                          'class' => '',
                                          'width' => '13',
                                          'height' => '13',
                                          'title' => '',
                                          'rel' => 'lightbox',
                                );
                                   echo  img($image_edit_properties);
                                   echo  nbs(1);
                                ?>
									<a href="#"  id="check_del<?=$id_user?>" >ลบ</a>
                                      </td>
                                      <td>
										  <?php		 echo   $user; //MY_strpos_link($linkmenu);  //helper->gen_string    ?>
                                      </td>
                                      <td><?php   echo $status_member;  //echo  $email;  //echo   $headmenu; ?></td>
                                      <td><?php   echo  DMY_thai_convert($date_record);   ?></td>
                                     
                                      <td>
                                                 <img src="<?=base_url()?>images/<?=$enable_icon?>"  width="30" />
                                      </td>
                                     <!--  <td><input name="array_delete[]" type="checkbox" value="<?=$id_user?>" /></td>-->
                                   </tr>
                                               <script type="text/javascript">
                                               $(function()
														   {
														            $('#check_del<?=$id_user?>').click(function()
																	      {
																				 //=======================================================================
																					    Ext.onReady(function(){
																						   Ext.Msg.confirm('แสดงสถานะ', 'คุณแน่ใจว่าต้องการลบหรือไม่', function(btn, text){
																										 if (btn == 'yes')
																										 {
																										     // alert('go ahead');
																											 window.location='<?=base_url()?>index.php/member/delete_member/<?=$id_user?>';
																										 } else
																										  {
																										     // alert('abort');
																											  return false;
																										 }
																						   });
																						});
																				 //=======================================================================
																		  }
																	   );	 
																	  $('#edit<?=$id_user?>').click(function()
																			  {
																			         //     
																					  window.location='<?=base_url()?>index.php/member/member_menu/4/<?=$id_user?>';
																			  }
																	  );  
														   }
											   );
                                               </script>
									  <?php
							   }//end foreach
					}		   
		 ?>
</table>
<?php   echo   form_close(); ?>
<?php
}//end  function



}

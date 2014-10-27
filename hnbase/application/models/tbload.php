<?php   if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Tbload extends  CI_Model {

    function  __construct()  //model  การ query ทั้งหมด
    {
        //parent::CI_Model();
		   parent::__construct();
    }
	function  tb_person_models($query)
	{//begin
	    //echo "testing";
		
		?>
		<div id="content">
            <a class="back" href=""></a>
            <span class="scroll"></span>
            <p class="head">DATABASE System  Report</p>
            <h1>HN BASE System</h1>
            <h2>แสดงข้อมูลของประวัติของพนักงาน</h2>
            <table class="table1">
                <thead>
                    <tr>
                        <th></th>
                        <th scope="col" abbr="Starter">(ชื่อ - นามสกุล) Name - Lastname</th>
                        <th scope="col" abbr="Medium">Nickname</th>
                        <th scope="col" abbr="Business">ID(เอกสารประกอบ)</th>
                        <th scope="col" abbr="Deluxe">Passport(เลขที่พาสปอร์ต)</th>
                    </tr>
                </thead>
                
<!--                <tfoot>
                    <tr>
                        <th scope="row">Price per month</th>
                        <td>$ 2.90</td>
                        <td>$ 5.90</td>
                        <td>$ 9.90</td>
                        <td>$ 14.90</td>
                    </tr>
                </tfoot>
-->                
                
                <tbody>
                    <!--<tr>
                        <th scope="row">Storage Space</th>
                        <td>512 MB</td>
                        <td>1 GB</td>
                        <td>2 GB</td>
                        <td>4 GB</td>
                    </tr>-->
               <?PHP
				foreach($query->result() as $row)
				{
				    ?>
                    <tr>
                     <th scope="row"></th>
                       <td>
                        <?PHP
                              //echo $row->id_tb_person;
							  //$this->tableQuerymodel->switch_prename($row->id_tb_person);
							  $this->tbload->switch_prename($row->id_tb_person);
                                                          echo $row->name;
							  echo nbs(2);
							  echo  $row->lastname;
                        ?>
                       </td>
                        <td>
                        <?PHP
							 echo  $row->nickname;
                        ?>
                       </td>
                       <td>
                        <?PHP
							 echo  $row->id_peson;
                        ?>
                       </td>
                       <td>
                        <?PHP
							 echo  $row->id_passport;
                        ?>
                       </td>
                    </tr>
                    <?PHP
				}
				?>
<!--                    <tr>
                        <th scope="row">Bandwidth</th>
                        <td>50 GB</td>
                        <td>100 GB</td>
                        <td>150 GB</td>
                        <td>Unlimited</td>
                    </tr>
                    <tr>
                        <th scope="row">MySQL Databases</th>
                        <td>Unlimited</td>
                        <td>Unlimited</td>
                        <td>Unlimited</td>
                        <td>Unlimited</td>
                    </tr>
                    <tr>
                        <th scope="row">Setup</th>
                        <td>19.90 $</td>
                        <td>12.90 $</td>
                        <td>free</td>
                        <td>free</td>
                    </tr>
                    <tr>
                        <th scope="row">PHP 5</th>
                        <td><span class="check"></span></td>
                        <td><span class="check"></span></td>
                        <td><span class="check"></span></td>
                        <td><span class="check"></span></td>
                    </tr>
                    <tr>
                        <th scope="row">Ruby on Rails</th>
                        <td><span class="check"></span></td>
                        <td><span class="check"></span></td>
                        <td><span class="check"></span></td>
                        <td><span class="check"></span></td>
                    </tr>
-->                    
                </tbody>
            </table>
        </div>
		<?PHP
}//end

function  check_num_rows($id,$tb,$field_name)//ใช้ตรวจสอบจำนวน field ใน recored
{
    if(is_numeric($id) )
    {
        $query=$this->db->get_where($tb,array($field_name=>$id));
        return  $query->num_rows(); 
    }
    
}

function  tb_person_models_link($query,$send_page)
	{//begin
	    //echo "testing";
?>		
<script>
  function  delete_confirm(id,send_page)
  {
        if( confirm('Are you delete!!')== true )
        {
            //alert('yes');
            window.location.assign("<?=base_url()?>index.php/person/delete_tb_person/"+ id + "/" + send_page  );
        }
        else
        {
            // alert('no!');
            
        }
  }
</script>
	
		<div id="content">
            <a class="back" href=""></a>
            <span class="scroll"></span>
            <p class="head">DATABASE System  Report</p>
            <h1>HN BASE System</h1>
            <h2>แสดงข้อมูลของประวัติของพนักงาน</h2>
            <table class="table1">
                <thead>
                    <tr>
                        <th></th>
                        <th scope="col" abbr="Starter">(ชื่อ - นามสกุล) Name - Lastname</th>
                        <th scope="col" abbr="Medium">Nickname</th>
                        <th scope="col" abbr="Business">ID(เอกสารประกอบ)</th>
                        <th scope="col" abbr="Deluxe">Passport(เลขที่พาสปอร์ต)</th>
                        <th scope="col" abbr="Deluxe">รหัสพนักงาน</th>
                         <th scope="col" abbr="Deluxe">Update</th>
                         <th scope="col" abbr="Deluxe">Delete</th>
                    </tr>
                </thead>
                
<!--                <tfoot>
                    <tr>
                        <th scope="row">Price per month</th>
                        <td>$ 2.90</td>
                        <td>$ 5.90</td>
                        <td>$ 9.90</td>
                        <td>$ 14.90</td>
                    </tr>
                </tfoot>
-->                
                
                <tbody>
                    <!--<tr>
                        <th scope="row">Storage Space</th>
                        <td>512 MB</td>
                        <td>1 GB</td>
                        <td>2 GB</td>
                        <td>4 GB</td>
                    </tr>-->
               <?PHP				
               $atts = array(
              'width'      => '1200',
              'height'     => '250',
              'scrollbars' => 'yes',
              'status'     => 'yes',
              'resizable'  => 'yes',
              'screenx'    => '0',
              'screeny'    => '0'
            );
 $atts2 = array(
              'width'      => '1200',
              'height'     => '200',
              'scrollbars' => 'yes',
              'status'     => 'yes',
              'resizable'  => 'yes',
              'screenx'    => '0',
              'screeny'    => '0'
            );
//echo anchor_popup('news/local/123', 'Click Me!', $atts);
                $field_name="id_tb_relation_person";
                $tb_check="tb_relation_person";
               foreach($query->result() as $row)
				{
                                    $id_tb_person= $row->id_tb_person;
				    ?>
                    <tr>
                     <th scope="row"><?=$id_tb_person?></th>
                       <td>
                        <?PHP
                         
                         $prename=$row->prename;			                       
                         $switch_prename = $this->tbload->switch_prename($prename);
			 $name= $row->name;
			 //echo nbs(2);
			 $lastname= $row->lastname;                                                         
                         $totalname=$switch_prename.$name.nbs(2).$lastname;             
                         $check_rows= $this->check_num_rows($id_tb_person,$tb_check,$field_name);
                         if(  $check_rows > 0 )
                         {
                            echo anchor_popup('person/detail_person/'.$id_tb_person.'/'.$send_page,$totalname, $atts);   
                         }
                         else
                         {
                             echo $totalname;
                         }
                        ?>
                       </td>
                        <td>
                        <?PHP
							 echo  $row->nickname;
                        ?>
                       </td>
                       <td>
                        <?PHP
							 echo  $row->id_peson;
                        ?>
                       </td>
                       <td>
                        <?PHP
							 echo  $row->id_passport;
                        ?>
                       </td>
                       <td>
                        <?PHP
							 echo  $row->id_code_person;
                        ?>
                       </td>
                       <td>
                           <a href="<?=base_url()?>index.php/person/update_tb_person/<?=$id_tb_person?>/<?=$send_page?>" ><img src="<?=base_url()?>icon/Apps-system-software-update-icon.png" width="30" ></a>
                       </td>
                       <td>
                           <a href="#" onclick="javascript:delete_confirm(<?=$id_tb_person?>,<?=$send_page?>);"><img src="<?=base_url()?>icon/Delete.png" width="30"></a>
                       </td>
                    </tr>
                    <?PHP
				}
				?>
<!--                    <tr>
                        <th scope="row">Bandwidth</th>
                        <td>50 GB</td>
                        <td>100 GB</td>
                        <td>150 GB</td>
                        <td>Unlimited</td>
                    </tr>
                    <tr>
                        <th scope="row">MySQL Databases</th>
                        <td>Unlimited</td>
                        <td>Unlimited</td>
                        <td>Unlimited</td>
                        <td>Unlimited</td>
                    </tr>
                    <tr>
                        <th scope="row">Setup</th>
                        <td>19.90 $</td>
                        <td>12.90 $</td>
                        <td>free</td>
                        <td>free</td>
                    </tr>
                    <tr>
                        <th scope="row">PHP 5</th>
                        <td><span class="check"></span></td>
                        <td><span class="check"></span></td>
                        <td><span class="check"></span></td>
                        <td><span class="check"></span></td>
                    </tr>
                    <tr>
                        <th scope="row">Ruby on Rails</th>
                        <td><span class="check"></span></td>
                        <td><span class="check"></span></td>
                        <td><span class="check"></span></td>
                        <td><span class="check"></span></td>
                    </tr>
-->                    
                </tbody>
            </table>
        </div>
		<?PHP
}//end

function  switch_prename($id_prename)//switch prename คำนำหน้าชื่อ
{
    switch($id_prename)
	{ //begin
        
        /*
	    case 1:
		{
		   echo "boy(เด็กชาย)";
		   break;
		}
		case 2:
		{
		   echo "Mr.(นาย)";
		   break;
		}
		case 3:
		{
		   echo "girl(เด็กหญิง)";
		   break;
		}
		case 4:
		{
		   echo "Ms.(นางสาว)";
		   break;
		}
		case 5:
		{
		   echo "Mrs.(นาง)";
		   break;
		}
        default :
		{
            
		}
         */
         
                              	    
		case 1:
		{
		   //echo "Mr.(นาย)";
                   return "Mr.";
		   break;
		}		
		case 2:
		{
		   //echo "Ms.(นางสาว)";
                   return "Ms.";
		   break;
		}
		case 3:
		{
		   //echo "Mrs.(นาง)";
                   return "Mrs.";
		   break;
		}            
                default :
		{
            
		}
                               
	}//end
}

    function  prename_select()//คำนำหน้าชื่อ
    {
        $arr=array(1=>'boy(เด็กชาย)',2=>'Mr.(นาย)',3=>'girl(เด็กหญิง)',4=>'Ms.(นางสาว)',5=>'Mrs.(นาง)')
        ?>
            <!--<select name="prename"> -->   
            <option>:: select ::</option>          
        <?PHP
             foreach($arr as $key=>$value)
             {
                 ?>
                <option value="<?=$key?>"><?=$key?>.<?=$value?></option>
                <?PHP
             }
        ?>
            <!--</select> -->  
                <?PHP
    }
    
    function  tb_relation_person_models($query,$fieldset)
	{//begin
	    //echo "testing";		
		?>		
           <!-- <h2><?=$fieldset?></h2>-->
            <table class="table1">
                <thead>
                    <tr>
                        <th></th>
                        <th scope="col" abbr="Starter">(ชื่อ - นามสกุล) Name - Lastname</th>
                        <th scope="col" abbr="Medium">Nickname</th>
                        <th scope="col" abbr="Business">ID(เอกสารประกอบ)</th>
                        <th scope="col" abbr="Deluxe">Passport(เลขที่พาสปอร์ต)</th>
                    </tr>
                </thead>
                
<!--                <tfoot>
                    <tr>
                        <th scope="row">Price per month</th>
                        <td>$ 2.90</td>
                        <td>$ 5.90</td>
                        <td>$ 9.90</td>
                        <td>$ 14.90</td>
                    </tr>
                </tfoot>
-->                
                
                <tbody>
                    <!--<tr>
                        <th scope="row">Storage Space</th>
                        <td>512 MB</td>
                        <td>1 GB</td>
                        <td>2 GB</td>
                        <td>4 GB</td>
                    </tr>-->
               <?PHP
				foreach($query->result() as $row)
				{
				    ?>
                    <tr>
                     <th scope="row"><?PHP echo $row->id_tb_person;?></th>
                       <td>
                        <?PHP
                              
			      $this->tbload->switch_prename($row->id_tb_person);
							 echo $row->name;
							 echo nbs(2);
							 echo  $row->lastname;
                        ?>
                       </td>
                        <td>
                        <?PHP
							 echo  $row->nickname;
                        ?>
                       </td>
                       <td>
                        <?PHP
							 echo  $row->id_peson;
                        ?>
                       </td>
                       <td>
                        <?PHP
							 echo  $row->id_passport;
                        ?>
                       </td>
                    </tr>
                    <?PHP
				}
				?>
<!--                    <tr>
                        <th scope="row">Bandwidth</th>
                        <td>50 GB</td>
                        <td>100 GB</td>
                        <td>150 GB</td>
                        <td>Unlimited</td>
                    </tr>
                    <tr>
                        <th scope="row">MySQL Databases</th>
                        <td>Unlimited</td>
                        <td>Unlimited</td>
                        <td>Unlimited</td>
                        <td>Unlimited</td>
                    </tr>
                    <tr>
                        <th scope="row">Setup</th>
                        <td>19.90 $</td>
                        <td>12.90 $</td>
                        <td>free</td>
                        <td>free</td>
                    </tr>
                    <tr>
                        <th scope="row">PHP 5</th>
                        <td><span class="check"></span></td>
                        <td><span class="check"></span></td>
                        <td><span class="check"></span></td>
                        <td><span class="check"></span></td>
                    </tr>
                    <tr>
                        <th scope="row">Ruby on Rails</th>
                        <td><span class="check"></span></td>
                        <td><span class="check"></span></td>
                        <td><span class="check"></span></td>
                        <td><span class="check"></span></td>
                    </tr>
-->                    
                </tbody>
            </table>
        </div>
		<?PHP
}//end

function  tb_relation_person_models_popup($query,$send_page)
	{//begin
	    //echo "testing";	
             $this->load->view('import_jqueryui');
  ?> 
       <!--<META HTTP-EQUIV="Refresh" CONTENT="20">-->
    <script>
  function  delete_confirm(id,send_page)
  {
        if( confirm('Are you delete!!')== true )
        {
            //alert('yes');
            window.location.assign("<?=base_url()?>index.php/person/delete_relation_person/"+ id + "/" + send_page  );
                
                /*
                  $(function(){  
                        $.post( "person/delete_relation_person/",{id_tb_relation_person:''+id});  
                     }); 
                */
                 // window.close();   
        }
        else
        {
            //alert('no!');
            
        }
  }
</script>

<?PHP
			
               $atts = array(
              'width'      => '1200',
              'height'     => '400',
              'scrollbars' => 'yes',
              'status'     => 'yes',
              'resizable'  => 'yes',
              'screenx'    => '0',
              'screeny'    => '0'
            );
  /*             
 $atts2 = array(
              'width'      => '1200',
              'height'     => '200',
              'scrollbars' => 'yes',
              'status'     => 'yes',
              'resizable'  => 'yes',
              'screenx'    => '0',
              'screeny'    => '0'
            );
   */ 
   
//echo anchor_popup('news/local/123', 'Click Me!', $atts);

?>
           <!-- <h2><?=$fieldset?></h2>-->
            <table class="table1">
                <thead>
                    <tr>
                        <th></th>
                        <th scope="col" abbr="Starter">ภูมิลำเนาเดิมที่อยู่ในพม่า</th>
                        <th scope="col" abbr="Medium">หมายเลขโทรศัพท์</th>
                        <th scope="col" abbr="Business">ที่พักอาศัยในปัจจุบัน</th>
                        <th scope="col" abbr="Deluxe">เพื่อนหรือคนใกล้ชิดญาติที่ติดต่อได้</th>
                        <th scope="col" abbr="Deluxe">หมายเลขโทรศัพท์ของญาติ</th>
                        <th scope="col" abbr="Deluxe">ที่พักอาศัยของญาติ</th>
                        <th scope="col" abbr="Deluxe">Update</th>
                        <th scope="col" abbr="Deluxe">Delete</th>
                    </tr>
                </thead>
                
<!--                <tfoot>
                    <tr>
                        <th scope="row">Price per month</th>
                        <td>$ 2.90</td>
                        <td>$ 5.90</td>
                        <td>$ 9.90</td>
                        <td>$ 14.90</td>
                    </tr>
                </tfoot>
-->                
                
                <tbody>
                    <!--<tr>
                        <th scope="row">Storage Space</th>
                        <td>512 MB</td>
                        <td>1 GB</td>
                        <td>2 GB</td>
                        <td>4 GB</td>
                    </tr>-->
               <?PHP
				foreach($query->result() as $row)
				{
				   $id_tb_person=$row->id_tb_person;
                                    ?>
                    <tr>
                     <th scope="row"><?=$id_tb_person?></th>
                       <td>
                        <?PHP
                              //echo $row->id_tb_person;
							 // $this->tableQuerymodel->switch_prename($row->id_tb_person);
							 // echo $row->name;
							 // echo nbs(2);
							//  echo  $row->lastname;
                 $id_tb_relation_person=$row->id_tb_relation_person;
                        echo  $row->address_origin;
                        ?>
                       </td>
                        <td>
                        <?PHP
							 //echo  $row->nickname;
                                echo $row->telephone;
                        ?>
                       </td>
                       <td>
                        <?PHP
							// echo  $row->id_peson;
                                 echo $row->address_in_thai;
                        ?>
                       </td>
                       <td>
                        <?PHP
							// echo  $row->id_passport;
                                echo $row->friend;                           
                        ?>
                       </td>
                       <td>
                        <?PHP
							// echo  $row->id_passport;
                                echo $row->phone_friend;                           
                        ?>
                       </td>
                       <td>
                        <?PHP
							// echo  $row->id_passport;
                                echo $row->relative_address;                           
                        ?>
                       </td>
                       <td>
                           <?PHP
                             echo anchor_popup('person/form_update_relation_person/'.$id_tb_relation_person.'/'.$send_page, 'Click', $atts);
                           ?>
                           <!-- <a href="<?=base_url()?>index.php/person/update_tb_person/" ><img src="<?=base_url()?>icon/Apps-system-software-update-icon.png" width="30" ></a> -->
                       </td>
                       <td>
                           <a href="#" onclick="javascript:delete_confirm(<?=$id_tb_relation_person?>,<?=$send_page?>);"><img src="<?=base_url()?>icon/Delete.png" width="30"></a>
                       </td>
                    </tr>
                    <?PHP
				}
				?>
<!--                    <tr>
                        <th scope="row">Bandwidth</th>
                        <td>50 GB</td>
                        <td>100 GB</td>
                        <td>150 GB</td>
                        <td>Unlimited</td>
                    </tr>
                    <tr>
                        <th scope="row">MySQL Databases</th>
                        <td>Unlimited</td>
                        <td>Unlimited</td>
                        <td>Unlimited</td>
                        <td>Unlimited</td>
                    </tr>
                    <tr>
                        <th scope="row">Setup</th>
                        <td>19.90 $</td>
                        <td>12.90 $</td>
                        <td>free</td>
                        <td>free</td>
                    </tr>
                    <tr>
                        <th scope="row">PHP 5</th>
                        <td><span class="check"></span></td>
                        <td><span class="check"></span></td>
                        <td><span class="check"></span></td>
                        <td><span class="check"></span></td>
                    </tr>
                    <tr>
                        <th scope="row">Ruby on Rails</th>
                        <td><span class="check"></span></td>
                        <td><span class="check"></span></td>
                        <td><span class="check"></span></td>
                        <td><span class="check"></span></td>
                    </tr>
-->                    
                </tbody>
            </table>
        </div>
		<?PHP
}//end
                
function  page_table($tb,$limit,$name_select,$send_page)//นับจำนวนของ rows ใน table
{//begin
    $query_count = $this->db->get($tb);
    $row_count=$query_count->num_rows();
    $max_page=round($row_count/$limit);
                ?>
        <select name="<?=$name_select?>" id="<?=$name_select?>" >
        <?PHP
      for($i=1;$i<=$max_page;$i++)
      {
          if( $send_page == $i )
          {
          ?>
            <option value="<?=$i?>" selected ><?=$i?></option>
          <?PHP
          }
          else
          {
             ?> 
              <option value="<?=$i?>" ><?=$i?></option>
            <?PHP
          }
      }
      ?>
        </select>      
              <?PHP
}//end

//##== เอกสารที่เกี่ยวข้อง ==
function  tb_document_models_link($query,$send_page,$field_set,$field_name,$tb_check,$link_operator,$link_update,$link_delete)
	{//begin
	    //echo "testing";
?>		
<script>
  function  delete_confirm(id,send_page)
  {
        if( confirm('Are you delete!!')== true )
        {
            //alert('yes');
           <? $link_delete=base_url()."index.php/person/delete_tb_person/"; ?>
            window.location.assign("<?=$link_delete?>"+ id + "/" + send_page  );
        }
        else
        {
            // alert('no!');
            
        }
  }
</script>
	
		<div id="content">
            <a class="back" href=""></a>
            <span class="scroll"></span>
            <p class="head">DATABASE System  Report</p>
            <h1>HN BASE System</h1>
            <h2><?=$field_set?></h2>
            <table class="table1">
                <thead>
                    <tr>
                        <th></th>
                        <th scope="col" abbr="Starter">(ชื่อ - นามสกุล) Name - Lastname</th>
                        <th scope="col" abbr="Medium">Nickname</th>
                        <th scope="col" abbr="Business">ID(เอกสารประกอบ)</th>
                        <th scope="col" abbr="Deluxe">Passport(เลขที่พาสปอร์ต)</th>
                        <th scope="col" abbr="Deluxe">รหัสพนักงาน</th>
                         <th scope="col" abbr="Deluxe">Update</th>
                         <th scope="col" abbr="Deluxe">Delete</th>
                    </tr>
                </thead>
                
<!--                <tfoot>
                    <tr>
                        <th scope="row">Price per month</th>
                        <td>$ 2.90</td>
                        <td>$ 5.90</td>
                        <td>$ 9.90</td>
                        <td>$ 14.90</td>
                    </tr>
                </tfoot>
-->                
                
                <tbody>
                    <!--<tr>
                        <th scope="row">Storage Space</th>
                        <td>512 MB</td>
                        <td>1 GB</td>
                        <td>2 GB</td>
                        <td>4 GB</td>
                    </tr>-->
               <?PHP				
               $atts = array(
              'width'      => '1200',
              'height'     => '250',
              'scrollbars' => 'yes',
              'status'     => 'yes',
              'resizable'  => 'yes',
              'screenx'    => '0',
              'screeny'    => '0'
            );
 $atts2 = array(
              'width'      => '1200',
              'height'     => '200',
              'scrollbars' => 'yes',
              'status'     => 'yes',
              'resizable'  => 'yes',
              'screenx'    => '0',
              'screeny'    => '0'
            );
//echo anchor_popup('news/local/123', 'Click Me!', $atts);
                $field_name="id_tb_person";
                $tb_check="tb_document";
               foreach($query->result() as $row)
				{
                                    $id_tb_person=$row->id_tb_person;
				?>
                    <tr>
                     <th scope="row"><?=$id_tb_person?></th>
                       <td>
                        <?PHP
                         
                         $prename=$row->prename;			                       
                         //$switch_prename = $this->tableQuerymodel->switch_prename($prename);
			 $switch_prename = $this->tbload->switch_prename($prename);
                         $name= $row->name;
			 //echo nbs(2);
			 $lastname= $row->lastname;                                                         
                         $totalname=$switch_prename.$name.nbs(2).$lastname;             
                         
                         $check_rows= $this->check_num_rows($id_tb_person,$tb_check,$field_name);
                         
                         if(  $check_rows > 0 )
                         {
                            //echo anchor_popup('person/detail_person/'.$id_tb_person.'/'.$send_page,$totalname, $atts);   
                             //$link_operator="person/detail_person/";
                             echo anchor_popup($link_operator.$id_tb_person.'/'.$send_page,$totalname, $atts);                            
                         }
                         else
                         {
                             echo $totalname;
                         }
                        ?>
                       </td>
                        <td>
                        <?PHP
							 echo  $row->nickname;
                        ?>
                       </td>
                       <td>
                        <?PHP
							 echo  $row->id_peson;
                        ?>
                       </td>
                       <td>
                        <?PHP
							 echo  $row->id_passport;
                        ?>
                       </td>
                       <td>
                        <?PHP
							 echo  $row->id_code_person;
                        ?>
                       </td>
                       <td>
                           <?PHP
                           //$link_update=base_url()."index.php/person/update_tb_person/"; 
                           ?>
                           <a href="<?=$link_update?><?=$id_tb_person?>/<?=$send_page?>" ><img src="<?=base_url()?>icon/Apps-system-software-update-icon.png" width="30" ></a>
                       </td>
                       <td>                       
                           <a href="#" onclick="javascript:delete_confirm(<?=$id_tb_person?>,<?=$send_page?>);"><img src="<?=base_url()?>icon/Delete.png" width="30"></a>
                       </td>
                    </tr>
                    <?PHP
				}
				?>
<!--                    <tr>
                        <th scope="row">Bandwidth</th>
                        <td>50 GB</td>
                        <td>100 GB</td>
                        <td>150 GB</td>
                        <td>Unlimited</td>
                    </tr>
                    <tr>
                        <th scope="row">MySQL Databases</th>
                        <td>Unlimited</td>
                        <td>Unlimited</td>
                        <td>Unlimited</td>
                        <td>Unlimited</td>
                    </tr>
                    <tr>
                        <th scope="row">Setup</th>
                        <td>19.90 $</td>
                        <td>12.90 $</td>
                        <td>free</td>
                        <td>free</td>
                    </tr>
                    <tr>
                        <th scope="row">PHP 5</th>
                        <td><span class="check"></span></td>
                        <td><span class="check"></span></td>
                        <td><span class="check"></span></td>
                        <td><span class="check"></span></td>
                    </tr>
                    <tr>
                        <th scope="row">Ruby on Rails</th>
                        <td><span class="check"></span></td>
                        <td><span class="check"></span></td>
                        <td><span class="check"></span></td>
                        <td><span class="check"></span></td>
                    </tr>
-->                    
                </tbody>
            </table>
        </div>
		<?PHP
}//end


function  tb_document_models_popup($query,$send_page)
	{//begin
	    //echo "testing";	
             $this->load->view('import_jqueryui');
  ?> 
       <!--<META HTTP-EQUIV="Refresh" CONTENT="20">-->
    <script>
  function  delete_confirm(id,send_page)
  {
        if( confirm('Are you delete!!')== true )
        {
            //alert(''+ id );
            window.location.assign("<?=base_url()?>index.php/document/delete_tb_document/"+ id + "/" + send_page  );
                
                /*
                  $(function(){  
                        $.post( "person/delete_relation_person/",{id_tb_relation_person:''+id});  
                     }); 
                */
           // window.close();   
        }
        else
        {
            //alert('no!');
            
        }
  }
</script>

<?PHP
			
               $atts = array(
              'width'      => '1200',
              'height'     => '400',
              'scrollbars' => 'yes',
              'status'     => 'yes',
              'resizable'  => 'yes',
              'screenx'    => '0',
              'screeny'    => '0'
            );
  /*             
 $atts2 = array(
              'width'      => '1200',
              'height'     => '200',
              'scrollbars' => 'yes',
              'status'     => 'yes',
              'resizable'  => 'yes',
              'screenx'    => '0',
              'screeny'    => '0'
            );
   */ 
   
//echo anchor_popup('news/local/123', 'Click Me!', $atts);

?>
           <!-- <h2><?=$fieldset?></h2>-->
            <table class="table1">
                <thead>
                    <tr>
                        <th></th>
                        <th scope="col" abbr="Starter">เอกสาร ทร. ๓๘/๑</th>
                        <th scope="col" abbr="Medium">สำเนาพาสปอร์ต</th>
                        <th scope="col" abbr="Business">สำเนาวีซ่า</th>
                        <th scope="col" abbr="Deluxe">ใบขออนุญาตการทำงาน</th>
                        <th scope="col" abbr="Deluxe">ใบเสร็จรับเงินอนุญาตทำงาน</th>
                        <th scope="col" abbr="Deluxe">ใบอนุญาตทำงาน</th>
                        <!--<th scope="col" abbr="Deluxe">Update</th>-->
                        <th scope="col" abbr="Deluxe">Delete</th>
                    </tr>
                </thead>
                
<!--                <tfoot>
                    <tr>
                        <th scope="row">Price per month</th>
                        <td>$ 2.90</td>
                        <td>$ 5.90</td>
                        <td>$ 9.90</td>
                        <td>$ 14.90</td>
                    </tr>
                </tfoot>
-->                
                
                <tbody>
                    <!--<tr>
                        <th scope="row">Storage Space</th>
                        <td>512 MB</td>
                        <td>1 GB</td>
                        <td>2 GB</td>
                        <td>4 GB</td>
                    </tr>-->
               <?PHP
                $path="upload/";
                $img="icon/doc1.jpg";
                $width="45";
                $width_hide="60";
                $img_hide="icon/not_found2.jpg";
				foreach($query->result() as $row)
				{
				   $id_document=$row->id_document;
                                    ?>
                    <tr>
                     <th scope="row">                       
                                   <?=$id_document?>                         
                     </th>
                       <td>
                        <?PHP
                              //echo $row->id_tb_person;
							 // $this->tableQuerymodel->switch_prename($row->id_tb_person);
							 // echo $row->name;
							 // echo nbs(2);
							//  echo  $row->lastname;
                 //$id_tb_relation_person=$row->id_tb_relation_person;
                        $id_document=$row->id_document;    
                        $doc_38_1=$row->doc_38_1;
                             //$this->tableQuerymodel->check_file_download($doc_38_1,$path,$img,$width,$img_hide,$width_hide);
                        $this->tbload->check_file_download($doc_38_1,$path,$img,$width,$img_hide,$width_hide);
                             ?>
                           
                       </td>
                        <td>
                        <?PHP							 //echo  $row->nickname;
                              $doc_passport=$row->doc_passport;
                              // $this->tableQuerymodel->check_file_download($doc_passport,$path,$img,$width,$img_hide,$width_hide);
                              $this->tbload->check_file_download($doc_passport,$path,$img,$width,$img_hide,$width_hide);
                        ?>
                       </td>
                       <td>
                        <?PHP
				// echo  $row->id_peson;
                                  $doc_visa=$row->doc_visa;
                                // $this->tableQuerymodel->check_file_download($doc_visa,$path,$img,$width,$img_hide,$width_hide);
                         $this->tbload->check_file_download($doc_visa,$path,$img,$width,$img_hide,$width_hide);
                                 ?>
                       </td>
                       <td>
                        <?PHP
			      // echo  $row->id_passport;
                                 $doc_for_permission=$row->doc_for_permission; 
                                // $this->tableQuerymodel->check_file_download($doc_for_permission,$path,$img,$width,$img_hide,$width_hide);
                                 $this->tbload->check_file_download($doc_for_permission,$path,$img,$width,$img_hide,$width_hide);
                        ?>
                       </td>
                       <td>
                        <?PHP
				// echo  $row->id_passport;
                                 $doc_pay_permission=$row->doc_pay_permission; 
                                 //$this->tableQuerymodel->check_file_download($doc_pay_permission,$path,$img,$width,$img_hide,$width_hide);
                                 $this->tbload->check_file_download($doc_pay_permission,$path,$img,$width,$img_hide,$width_hide);
                        ?>
                       </td>
                       <td>
                        <?PHP
				// echo  $row->id_passport;
                               echo $doc_permission=$row->doc_permission;  
                              //  $this->tableQuerymodel->check_file_download($doc_permission,$path,$img,$width,$img_hide,$width_hide);
                        ?>
                       </td>
                       <!--
                       <td>
                           <?PHP
                             echo anchor_popup('person/form_update_relation_person/'.$id_document.'/'.$send_page, 'Click', $atts);
                           ?>
                           <a href="<?=base_url()?>index.php/person/update_tb_person/" ><img src="<?=base_url()?>icon/Apps-system-software-update-icon.png" width="30" ></a>
                       </td>
                       -->
                       <td>
                           <a href="#" onclick="javascript:delete_confirm(<?=$id_document?>,<?=$send_page?>);"><img src="<?=base_url()?>icon/Delete.png" width="30"></a>
                       </td>
                    </tr>
                    <?PHP
				}
				?>
<!--                    <tr>
                        <th scope="row">Bandwidth</th>
                        <td>50 GB</td>
                        <td>100 GB</td>
                        <td>150 GB</td>
                        <td>Unlimited</td>
                    </tr>
                    <tr>
                        <th scope="row">MySQL Databases</th>
                        <td>Unlimited</td>
                        <td>Unlimited</td>
                        <td>Unlimited</td>
                        <td>Unlimited</td>
                    </tr>
                    <tr>
                        <th scope="row">Setup</th>
                        <td>19.90 $</td>
                        <td>12.90 $</td>
                        <td>free</td>
                        <td>free</td>
                    </tr>
                    <tr>
                        <th scope="row">PHP 5</th>
                        <td><span class="check"></span></td>
                        <td><span class="check"></span></td>
                        <td><span class="check"></span></td>
                        <td><span class="check"></span></td>
                    </tr>
                    <tr>
                        <th scope="row">Ruby on Rails</th>
                        <td><span class="check"></span></td>
                        <td><span class="check"></span></td>
                        <td><span class="check"></span></td>
                        <td><span class="check"></span></td>
                    </tr>
-->                    
                </tbody>
            </table>
        </div>
		<?PHP
}//end

function  check_file_download($file,$path,$img,$width,$img_hide,$width_hide)//สำหรับตรวจสอบเพื่อให้ download เอกสาร
{//begin
    if( !empty($file) )
    {
        ?>
        <a href="<?=base_url().$path.$file?>" target="_blank" >
            <img src="<?=base_url().$img?>" width="<?=$width_hide?>"  >
        </a>
        <?PHP
    }
    else
    {
        ?>
        <img src="<?=base_url().$img_hide?>" width="40"  >
        <?PHP
    }
    
}//end 
##//experince//
function  tb_experience_models_link($query,$send_page,$field_set,$field_name,$tb_check,$link_operator,$link_update,$link_delete)
	{//begin
	    //echo "testing";
?>		
<script>
  function  delete_confirm(id,send_page)
  {
        if( confirm('Are you delete!!')== true )
        {
            //alert('yes');
           <? $link_delete=base_url()."index.php/person/delete_tb_person/"; ?>
            window.location.assign("<?=$link_delete?>"+ id + "/" + send_page  );
        }
        else
        {
            // alert('no!');
            
        }
  }
</script>
	
		<div id="content">
            <a class="back" href=""></a>
            <span class="scroll"></span>
            <p class="head">DATABASE System  Report</p>
            <h1>HN BASE System</h1>
            <h2><?=$field_set?></h2>
            <table class="table1">
                <thead>
                    <tr>
                        <th></th>
                        <th scope="col" abbr="Starter">(ชื่อ - นามสกุล) Name - Lastname</th>
                        <th scope="col" abbr="Medium">Nickname</th>
                        <th scope="col" abbr="Business">ID(เอกสารประกอบ)</th>
                        <th scope="col" abbr="Deluxe">Passport(เลขที่พาสปอร์ต)</th>
                        <th scope="col" abbr="Deluxe">รหัสพนักงาน</th>
                         <th scope="col" abbr="Deluxe">Update</th>
                         <th scope="col" abbr="Deluxe">Delete</th>
                    </tr>
                </thead>
                
<!--                <tfoot>
                    <tr>
                        <th scope="row">Price per month</th>
                        <td>$ 2.90</td>
                        <td>$ 5.90</td>
                        <td>$ 9.90</td>
                        <td>$ 14.90</td>
                    </tr>
                </tfoot>
-->                
                
                <tbody>
                    <!--<tr>
                        <th scope="row">Storage Space</th>
                        <td>512 MB</td>
                        <td>1 GB</td>
                        <td>2 GB</td>
                        <td>4 GB</td>
                    </tr>-->
               <?PHP				
               $atts = array(
              'width'      => '1200',
              'height'     => '250',
              'scrollbars' => 'yes',
              'status'     => 'yes',
              'resizable'  => 'yes',
              'screenx'    => '0',
              'screeny'    => '0'
            );
 $atts2 = array(
              'width'      => '1200',
              'height'     => '200',
              'scrollbars' => 'yes',
              'status'     => 'yes',
              'resizable'  => 'yes',
              'screenx'    => '0',
              'screeny'    => '0'
            );
//echo anchor_popup('news/local/123', 'Click Me!', $atts);
               // $field_name="id_tb_person";
               // $tb_check="tb_document";
               foreach($query->result() as $row)
				{
                                    $id_tb_person= $row->id_tb_person;
				    ?>
                    <tr>
                     <th scope="row"><?=$id_tb_person?></th>
                       <td>
                        <?PHP
                         
                         $prename=$row->prename;			                       
                         //$switch_prename = $this->tableQuerymodel->switch_prename($prename);
                         $switch_prename = $this->tbload->switch_prename($prename);
			 $name= $row->name;
			 //echo nbs(2);
			 $lastname= $row->lastname;                                                         
                         $totalname=$switch_prename.$name.nbs(2).$lastname;             
                         
                         //echo $id_tb_person;
                        // echo $tb_check;
                         
                         $check_rows= $this->check_num_rows($id_tb_person,$tb_check,$field_name);
                         
                         if(  $check_rows > 0 )
                         {
                            //echo anchor_popup('person/detail_person/'.$id_tb_person.'/'.$send_page,$totalname, $atts);   
                             //$link_operator="person/detail_person/";
                             echo anchor_popup($link_operator.$id_tb_person.'/'.$send_page,$totalname, $atts);                            
                         }
                         else
                         {
                             echo $totalname;
                         }
                        ?>
                       </td>
                        <td>
                        <?PHP
							 echo  $row->nickname;
                        ?>
                       </td>
                       <td>
                        <?PHP
							 echo  $row->id_peson;
                        ?>
                       </td>
                       <td>
                        <?PHP
							 echo  $row->id_passport;
                        ?>
                       </td>
                       <td>
                        <?PHP
							 echo  $row->id_code_person;
                        ?>
                       </td>
                       <td>
                           <?PHP
                           //$link_update=base_url()."index.php/person/update_tb_person/"; 
                           ?>
                           <a href="<?=$link_update?><?=$id_tb_person?>/<?=$send_page?>" ><img src="<?=base_url()?>icon/Apps-system-software-update-icon.png" width="30" ></a>
                       </td>
                       <td>                       
                           <a href="#" onclick="javascript:delete_confirm(<?=$id_tb_person?>,<?=$send_page?>);"><img src="<?=base_url()?>icon/Delete.png" width="30"></a>
                       </td>
                    </tr>
                    <?PHP
				}
				?>
<!--                    <tr>
                        <th scope="row">Bandwidth</th>
                        <td>50 GB</td>
                        <td>100 GB</td>
                        <td>150 GB</td>
                        <td>Unlimited</td>
                    </tr>
                    <tr>
                        <th scope="row">MySQL Databases</th>
                        <td>Unlimited</td>
                        <td>Unlimited</td>
                        <td>Unlimited</td>
                        <td>Unlimited</td>
                    </tr>
                    <tr>
                        <th scope="row">Setup</th>
                        <td>19.90 $</td>
                        <td>12.90 $</td>
                        <td>free</td>
                        <td>free</td>
                    </tr>
                    <tr>
                        <th scope="row">PHP 5</th>
                        <td><span class="check"></span></td>
                        <td><span class="check"></span></td>
                        <td><span class="check"></span></td>
                        <td><span class="check"></span></td>
                    </tr>
                    <tr>
                        <th scope="row">Ruby on Rails</th>
                        <td><span class="check"></span></td>
                        <td><span class="check"></span></td>
                        <td><span class="check"></span></td>
                        <td><span class="check"></span></td>
                    </tr>
-->                    
                </tbody>
            </table>
        </div>
		<?PHP
}//end


function  tb_experience_models_popup($query,$send_page,$link_delete)
	{//begin
	    //echo "testing";	
             $this->load->view('import_jqueryui');
  ?> 
       <!--<META HTTP-EQUIV="Refresh" CONTENT="20">-->
    <script>
  function  delete_confirm(id,send_page,link_delete)
  {
        if( confirm('Are you delete!!')== true )
        {
            //alert('t');
            //alert('link=' + link_delete + ',delete=' + id );
            //alert(''+ id );
           // window.location.assign("<?=base_url()?>index.php/eperience/delete_tb_experience/"+ id + "/" + send_page  );
            window.location.assign(''+ link_delete  + id + '/' + send_page );    
                /*
                  $(function(){  
                        $.post( "person/delete_relation_person/",{id_tb_relation_person:''+id});  
                     }); 
                */
           // window.close();   
        }
        else
        {
            //alert('no!');
            
        }
  }
</script>

<?PHP
			
               $atts = array(
              'width'      => '1200',
              'height'     => '400',
              'scrollbars' => 'yes',
              'status'     => 'yes',
              'resizable'  => 'yes',
              'screenx'    => '0',
              'screeny'    => '0'
            );
  /*             
 $atts2 = array(
              'width'      => '1200',
              'height'     => '200',
              'scrollbars' => 'yes',
              'status'     => 'yes',
              'resizable'  => 'yes',
              'screenx'    => '0',
              'screeny'    => '0'
            );
   */ 
   
//echo anchor_popup('news/local/123', 'Click Me!', $atts);

?>
           <!-- <h2><?=$fieldset?></h2>-->
            <table class="table1">
                <thead>
                    <tr>
                        <th></th>
                        <th scope="col" abbr="Starter">จำนวนปีที่ทำ (ปี) กรอกข้อมูลการทำงานอย่างน้อย 2 ที่</th>
                        <th scope="col" abbr="Medium">ทำงานที่ไหนมาก่อน</th>
                        <th scope="col" abbr="Business">ทำงานที่ไหนมาก่อน (ทำงานที่เดิม)</th>
                        <th scope="col" abbr="Deluxe">ประเภทงาน</th>
                        <th scope="col" abbr="Deluxe">จำนวน (ปี)</th>
                        <!--<th scope="col" abbr="Deluxe">ใบอนุญาตทำงาน</th>-->
                        <!--<th scope="col" abbr="Deluxe">Update</th>-->
                        <th scope="col" abbr="Deluxe">Delete</th>
                    </tr>
                </thead>
                
<!--                <tfoot>
                    <tr>
                        <th scope="row">Price per month</th>
                        <td>$ 2.90</td>
                        <td>$ 5.90</td>
                        <td>$ 9.90</td>
                        <td>$ 14.90</td>
                    </tr>
                </tfoot>
-->                
                
                <tbody>
                    <!--<tr>
                        <th scope="row">Storage Space</th>
                        <td>512 MB</td>
                        <td>1 GB</td>
                        <td>2 GB</td>
                        <td>4 GB</td>
                    </tr>-->
               <?PHP
                $path="upload/";
                $img="icon/doc1.jpg";
                $width="45";
                $width_hide="60";
                $img_hide="icon/not_found2.jpg";
				foreach($query->result() as $row)
				{
				   //$id_document=$row->id_document;
                                     $id_tb_experience=$row->id_tb_experience;
                                    ?>
                    <tr>
                     <th scope="row">                       
                                   <?=$id_tb_experience?>                         
                     </th>
                       <td>
                        <?PHP
                              //echo $row->id_tb_person;
							 // $this->tableQuerymodel->switch_prename($row->id_tb_person);
							 // echo $row->name;
							 // echo nbs(2);
							//  echo  $row->lastname;
                 //$id_tb_relation_person=$row->id_tb_relation_person;
                        //$id_document=$row->id_document;    
                        //$doc_38_1=$row->doc_38_1;
                            // $this->tableQuerymodel->check_file_download($doc_38_1,$path,$img,$width,$img_hide,$width_hide);
                        echo $count_experience=$row->count_experience;
                        ?>
                           
                       </td>
                        <td>
                        <?PHP							 //echo  $row->nickname;
                              // $doc_passport=$row->doc_passport;
                              // $this->tableQuerymodel->check_file_download($doc_passport,$path,$img,$width,$img_hide,$width_hide);
                echo $before_workplace=$row->before_workplace;
                        ?>
                       </td>
                       <td>
                        <?PHP
				// echo  $row->id_peson;
                                 // $doc_visa=$row->doc_visa;
                                 //$this->tableQuerymodel->check_file_download($doc_visa,$path,$img,$width,$img_hide,$width_hide);
                        echo $workplace=$row->workplace;
                        ?>
                       </td>
                       <td>
                        <?PHP
			      // echo  $row->id_passport;
                                // $doc_for_permission=$row->doc_for_permission; 
                                // $this->tableQuerymodel->check_file_download($doc_for_permission,$path,$img,$width,$img_hide,$width_hide);
                        echo $work_type=$row->work_type;
                        ?>
                       </td>
                       <td>
                        <?PHP
				// echo  $row->id_passport;
                               //  $doc_pay_permission=$row->doc_pay_permission; 
                               //  $this->tableQuerymodel->check_file_download($doc_pay_permission,$path,$img,$width,$img_hide,$width_hide);
                        echo $count_year=$row->count_year;
                        ?>
                       </td>
                      
                       
                       
                       
                       <td>
                           <a href="#" onclick="javascript:delete_confirm(<?=$id_tb_experience?>,<?=$send_page?>,'<?=$link_delete?>');"><img src="<?=base_url()?>icon/Delete.png" width="30"></a>
                       </td>
                    </tr>
                    <?PHP
				}
				?>
<!--                    <tr>
                        <th scope="row">Bandwidth</th>
                        <td>50 GB</td>
                        <td>100 GB</td>
                        <td>150 GB</td>
                        <td>Unlimited</td>
                    </tr>
                    <tr>
                        <th scope="row">MySQL Databases</th>
                        <td>Unlimited</td>
                        <td>Unlimited</td>
                        <td>Unlimited</td>
                        <td>Unlimited</td>
                    </tr>
                    <tr>
                        <th scope="row">Setup</th>
                        <td>19.90 $</td>
                        <td>12.90 $</td>
                        <td>free</td>
                        <td>free</td>
                    </tr>
                    <tr>
                        <th scope="row">PHP 5</th>
                        <td><span class="check"></span></td>
                        <td><span class="check"></span></td>
                        <td><span class="check"></span></td>
                        <td><span class="check"></span></td>
                    </tr>
                    <tr>
                        <th scope="row">Ruby on Rails</th>
                        <td><span class="check"></span></td>
                        <td><span class="check"></span></td>
                        <td><span class="check"></span></td>
                        <td><span class="check"></span></td>
                    </tr>
-->                    
                </tbody>
            </table>
        </div>
		<?PHP
}//end
//## talent
function  tb_talent_models_link($query,$send_page,$field_set,$field_name,$tb_check,$link_operator,$link_update,$link_delete)
	{//begin
	    //echo "testing";
?>		
<script>
  function  delete_confirm(id,send_page)
  {
        if( confirm('Are you delete!!')== true )
        {
            //alert('yes');
           <? $link_delete=base_url()."index.php/person/delete_tb_person/"; ?>
            window.location.assign("<?=$link_delete?>"+ id + "/" + send_page  );
        }
        else
        {
            // alert('no!');
            
        }
  }
</script>
	
		<div id="content">
            <a class="back" href=""></a>
            <span class="scroll"></span>
            <p class="head">DATABASE System  Report</p>
            <h1>HN BASE System</h1>
            <h2><?=$field_set?></h2>
            <table class="table1">
                <thead>
                    <tr>
                        <th></th>
                        <th scope="col" abbr="Starter">(ชื่อ - นามสกุล) Name - Lastname</th>
                        <th scope="col" abbr="Medium">Nickname</th>
                        <th scope="col" abbr="Business">ID(เอกสารประกอบ)</th>
                        <th scope="col" abbr="Deluxe">Passport(เลขที่พาสปอร์ต)</th>
                        <th scope="col" abbr="Deluxe">รหัสพนักงาน</th>
                         <th scope="col" abbr="Deluxe">Update</th>
                         <th scope="col" abbr="Deluxe">Delete</th>
                    </tr>
                </thead>
                
<!--                <tfoot>
                    <tr>
                        <th scope="row">Price per month</th>
                        <td>$ 2.90</td>
                        <td>$ 5.90</td>
                        <td>$ 9.90</td>
                        <td>$ 14.90</td>
                    </tr>
                </tfoot>
-->                
                
                <tbody>
                    <!--<tr>
                        <th scope="row">Storage Space</th>
                        <td>512 MB</td>
                        <td>1 GB</td>
                        <td>2 GB</td>
                        <td>4 GB</td>
                    </tr>-->
               <?PHP				
               $atts = array(
              'width'      => '1200',
              'height'     => '250',
              'scrollbars' => 'yes',
              'status'     => 'yes',
              'resizable'  => 'yes',
              'screenx'    => '0',
              'screeny'    => '0'
            );
 $atts2 = array(
              'width'      => '1200',
              'height'     => '200',
              'scrollbars' => 'yes',
              'status'     => 'yes',
              'resizable'  => 'yes',
              'screenx'    => '0',
              'screeny'    => '0'
            );
//echo anchor_popup('news/local/123', 'Click Me!', $atts);
               // $field_name="id_tb_person";
               // $tb_check="tb_document";
               foreach($query->result() as $row)
				{
                                    $id_tb_person= $row->id_tb_person;
				    ?>
                    <tr>
                     <th scope="row"><?=$id_tb_person?></th>
                       <td>
                        <?PHP
                         
                         $prename=$row->prename;			                       
                         //$switch_prename = $this->tableQuerymodel->switch_prename($prename);
                          $switch_prename = $this->tbload->switch_prename($prename);
			 $name= $row->name;
			 //echo nbs(2);
			 $lastname= $row->lastname;                                                         
                         $totalname=$switch_prename.$name.nbs(2).$lastname;             
                         
                         //echo $id_tb_person;
                        // echo $tb_check;
                         
                         $check_rows= $this->check_num_rows($id_tb_person,$tb_check,$field_name);
                         
                         if(  $check_rows > 0 )
                         {
                            //echo anchor_popup('person/detail_person/'.$id_tb_person.'/'.$send_page,$totalname, $atts);   
                             //$link_operator="person/detail_person/";
                             echo anchor_popup($link_operator.$id_tb_person.'/'.$send_page,$totalname, $atts);                            
                         }
                         else
                         {
                             echo $totalname;
                         }
                        ?>
                       </td>
                        <td>
                        <?PHP
							 echo  $row->nickname;
                        ?>
                       </td>
                       <td>
                        <?PHP
							 echo  $row->id_peson;
                        ?>
                       </td>
                       <td>
                        <?PHP
							 echo  $row->id_passport;
                        ?>
                       </td>
                       <td>
                        <?PHP
							 echo  $row->id_code_person;
                        ?>
                       </td>
                       <td>
                           <?PHP
                           //$link_update=base_url()."index.php/person/update_tb_person/"; 
                           ?>
                           <a href="<?=$link_update?><?=$id_tb_person?>/<?=$send_page?>" ><img src="<?=base_url()?>icon/Apps-system-software-update-icon.png" width="30" ></a>
                       </td>
                       <td>                       
                           <a href="#" onclick="javascript:delete_confirm(<?=$id_tb_person?>,<?=$send_page?>);"><img src="<?=base_url()?>icon/Delete.png" width="30"></a>
                       </td>
                    </tr>
                    <?PHP
				}
				?>
<!--                    <tr>
                        <th scope="row">Bandwidth</th>
                        <td>50 GB</td>
                        <td>100 GB</td>
                        <td>150 GB</td>
                        <td>Unlimited</td>
                    </tr>
                    <tr>
                        <th scope="row">MySQL Databases</th>
                        <td>Unlimited</td>
                        <td>Unlimited</td>
                        <td>Unlimited</td>
                        <td>Unlimited</td>
                    </tr>
                    <tr>
                        <th scope="row">Setup</th>
                        <td>19.90 $</td>
                        <td>12.90 $</td>
                        <td>free</td>
                        <td>free</td>
                    </tr>
                    <tr>
                        <th scope="row">PHP 5</th>
                        <td><span class="check"></span></td>
                        <td><span class="check"></span></td>
                        <td><span class="check"></span></td>
                        <td><span class="check"></span></td>
                    </tr>
                    <tr>
                        <th scope="row">Ruby on Rails</th>
                        <td><span class="check"></span></td>
                        <td><span class="check"></span></td>
                        <td><span class="check"></span></td>
                        <td><span class="check"></span></td>
                    </tr>
-->                    
                </tbody>
            </table>
        </div>
		<?PHP
}//end
function  tb_talent_models_popup($query,$send_page,$link_delete)
	{//begin
	    //echo "testing";	
             $this->load->view('import_jqueryui');
  ?> 
       <!--<META HTTP-EQUIV="Refresh" CONTENT="20">-->
    <script>
  function  delete_confirm(id,send_page,link_delete)
  {
        if( confirm('Are you delete!!')== true )
        {
            //alert('t');
            //alert('link=' + link_delete + ',delete=' + id );
            //alert(''+ id );
           // window.location.assign("<?=base_url()?>index.php/eperience/delete_tb_experience/"+ id + "/" + send_page  );
            window.location.assign(''+ link_delete  + id + '/' + send_page );    
                /*
                  $(function(){  
                        $.post( "person/delete_relation_person/",{id_tb_relation_person:''+id});  
                     }); 
                */
           // window.close();   
        }
        else
        {
            //alert('no!');
            
        }
  }
</script>

<?PHP
			
               $atts = array(
              'width'      => '1200',
              'height'     => '400',
              'scrollbars' => 'yes',
              'status'     => 'yes',
              'resizable'  => 'yes',
              'screenx'    => '0',
              'screeny'    => '0'
            );
  /*             
 $atts2 = array(
              'width'      => '1200',
              'height'     => '200',
              'scrollbars' => 'yes',
              'status'     => 'yes',
              'resizable'  => 'yes',
              'screenx'    => '0',
              'screeny'    => '0'
            );
   */ 
   
//echo anchor_popup('news/local/123', 'Click Me!', $atts);

?>
           <!-- <h2><?=$fieldset?></h2>-->
            <table class="table1">
                <thead>
                    <tr>
                        <th></th>
                        <th scope="col" abbr="Starter">ทักษะการสื่อสาร</th>
                        <th scope="col" abbr="Medium">อื่นๆ ระบุ</th>
                        
                        
                       
                        <!--<th scope="col" abbr="Deluxe">ใบอนุญาตทำงาน</th>-->
                        <!--<th scope="col" abbr="Deluxe">Update</th>-->
                        <th scope="col" abbr="Deluxe">Delete</th>
                    </tr>
                </thead>
                
<!--                <tfoot>
                    <tr>
                        <th scope="row">Price per month</th>
                        <td>$ 2.90</td>
                        <td>$ 5.90</td>
                        <td>$ 9.90</td>
                        <td>$ 14.90</td>
                    </tr>
                </tfoot>
-->                
                
                <tbody>
                    <!--<tr>
                        <th scope="row">Storage Space</th>
                        <td>512 MB</td>
                        <td>1 GB</td>
                        <td>2 GB</td>
                        <td>4 GB</td>
                    </tr>-->
               <?PHP
                $path="upload/";
                $img="icon/doc1.jpg";
                $width="45";
                $width_hide="60";
                $img_hide="icon/not_found2.jpg";
				foreach($query->result() as $row)
				{
				   //$id_document=$row->id_document;
                                     $id_tb_talent=$row->id_tb_talent; //#dynamic
                                    ?>
                    <tr>
                     <th scope="row">                       
                                   <?=$id_tb_talent?>                         
                     </th>
                       <td>
                        <?PHP
                              //echo $row->id_tb_person;
							 // $this->tableQuerymodel->switch_prename($row->id_tb_person);
							 // echo $row->name;
							 // echo nbs(2);
							//  echo  $row->lastname;
                 //$id_tb_relation_person=$row->id_tb_relation_person;
                        //$id_document=$row->id_document;    
                        //$doc_38_1=$row->doc_38_1;
                            // $this->tableQuerymodel->check_file_download($doc_38_1,$path,$img,$width,$img_hide,$width_hide);
                             $communication_skills=$row->communication_skills;
                             $this->choice_talent($communication_skills);
                        ?>
                           
                       </td>
                       
                        <td>
                        <?PHP							 //echo  $row->nickname;
                              // $doc_passport=$row->doc_passport;
                              // $this->tableQuerymodel->check_file_download($doc_passport,$path,$img,$width,$img_hide,$width_hide);
                echo $other=$row->other;
                        ?>
                       </td>
                                            
                       <td>
                           <a href="#" onclick="javascript:delete_confirm(<?=$id_tb_talent?>,<?=$send_page?>,'<?=$link_delete?>');"><img src="<?=base_url()?>icon/Delete.png" width="30"></a>
                       </td>
                    </tr>
                    <?PHP
				}
				?>
<!--                    <tr>
                        <th scope="row">Bandwidth</th>
                        <td>50 GB</td>
                        <td>100 GB</td>
                        <td>150 GB</td>
                        <td>Unlimited</td>
                    </tr>
                    <tr>
                        <th scope="row">MySQL Databases</th>
                        <td>Unlimited</td>
                        <td>Unlimited</td>
                        <td>Unlimited</td>
                        <td>Unlimited</td>
                    </tr>
                    <tr>
                        <th scope="row">Setup</th>
                        <td>19.90 $</td>
                        <td>12.90 $</td>
                        <td>free</td>
                        <td>free</td>
                    </tr>
                    <tr>
                        <th scope="row">PHP 5</th>
                        <td><span class="check"></span></td>
                        <td><span class="check"></span></td>
                        <td><span class="check"></span></td>
                        <td><span class="check"></span></td>
                    </tr>
                    <tr>
                        <th scope="row">Ruby on Rails</th>
                        <td><span class="check"></span></td>
                        <td><span class="check"></span></td>
                        <td><span class="check"></span></td>
                        <td><span class="check"></span></td>
                    </tr>
-->                    
                </tbody>
            </table>
        </div>
		<?PHP
}//end
function choice_talent($id)//ทักษะการสื่้อสาร (ภาษาไทย) : 
{//begin
    switch ($id)
    {//begin
        case 1:
        {
           echo "พูด";
           break;
        }
        case 2:
        {
           echo "อ่าน";
            break;
        }
        case 3:
        {
           echo "เขียน";
            break;
        }
        case 4:
        {
            echo "ฟัง";
            break;
        }
        case 5:
        {
            echo "อื่นๆ";
            break;
        }
    }//end switch
    
}//end

## social
function  tb_social_models_link($query,$send_page,$field_set,$field_name,$tb_check,$link_operator,$link_update,$link_delete)
	{//begin
	    //echo "testing";
?>		
<script>
  function  delete_confirm(id,send_page)
  {
        if( confirm('Are you delete!!')== true )
        {
            //alert('yes');
           <? $link_delete=base_url()."index.php/person/delete_tb_person/"; ?>
            window.location.assign("<?=$link_delete?>"+ id + "/" + send_page  );
        }
        else
        {
            // alert('no!');
            
        }
  }
</script>
	
		<div id="content">
            <a class="back" href=""></a>
            <span class="scroll"></span>
            <p class="head">DATABASE System  Report</p>
            <h1>HN BASE System</h1>
            <h2><?=$field_set?></h2>
            <table class="table1">
                <thead>
                    <tr>
                        <th></th>
                        <th scope="col" abbr="Starter">(ชื่อ - นามสกุล) Name - Lastname</th>
                        <th scope="col" abbr="Medium">Nickname</th>
                        <th scope="col" abbr="Business">ID(เอกสารประกอบ)</th>
                        <th scope="col" abbr="Deluxe">Passport(เลขที่พาสปอร์ต)</th>
                        <th scope="col" abbr="Deluxe">รหัสพนักงาน</th>
                         <th scope="col" abbr="Deluxe">Update</th>
                         <th scope="col" abbr="Deluxe">Delete</th>
                    </tr>
                </thead>
                
<!--                <tfoot>
                    <tr>
                        <th scope="row">Price per month</th>
                        <td>$ 2.90</td>
                        <td>$ 5.90</td>
                        <td>$ 9.90</td>
                        <td>$ 14.90</td>
                    </tr>
                </tfoot>
-->                
                
                <tbody>
                    <!--<tr>
                        <th scope="row">Storage Space</th>
                        <td>512 MB</td>
                        <td>1 GB</td>
                        <td>2 GB</td>
                        <td>4 GB</td>
                    </tr>-->
               <?PHP				
               $atts = array(
              'width'      => '1200',
              'height'     => '250',
              'scrollbars' => 'yes',
              'status'     => 'yes',
              'resizable'  => 'yes',
              'screenx'    => '0',
              'screeny'    => '0'
            );
 $atts2 = array(
              'width'      => '1200',
              'height'     => '200',
              'scrollbars' => 'yes',
              'status'     => 'yes',
              'resizable'  => 'yes',
              'screenx'    => '0',
              'screeny'    => '0'
            );
//echo anchor_popup('news/local/123', 'Click Me!', $atts);
               // $field_name="id_tb_person";
               // $tb_check="tb_document";
               foreach($query->result() as $row)
				{
                                    $id_tb_person= $row->id_tb_person;
				    ?>
                    <tr>
                     <th scope="row"><?=$id_tb_person?></th>
                       <td>
                        <?PHP
                         
                         $prename=$row->prename;			                       
                         $switch_prename = $this->tableQuerymodel->switch_prename($prename);
			 $name= $row->name;
			 //echo nbs(2);
			 $lastname= $row->lastname;                                                         
                         $totalname=$switch_prename.$name.nbs(2).$lastname;             
                         
                         //echo $id_tb_person;
                        // echo $tb_check;
                         
                         $check_rows= $this->check_num_rows($id_tb_person,$tb_check,$field_name);
                         
                         if(  $check_rows > 0 )
                         {
                            //echo anchor_popup('person/detail_person/'.$id_tb_person.'/'.$send_page,$totalname, $atts);   
                             //$link_operator="person/detail_person/";
                             echo anchor_popup($link_operator.$id_tb_person.'/'.$send_page,$totalname, $atts);                            
                         }
                         else
                         {
                             echo $totalname;
                         }
                        ?>
                       </td>
                        <td>
                        <?PHP
							 echo  $row->nickname;
                        ?>
                       </td>
                       <td>
                        <?PHP
							 echo  $row->id_peson;
                        ?>
                       </td>
                       <td>
                        <?PHP
							 echo  $row->id_passport;
                        ?>
                       </td>
                       <td>
                        <?PHP
							 echo  $row->id_code_person;
                        ?>
                       </td>
                       <td>
                           <?PHP
                           //$link_update=base_url()."index.php/person/update_tb_person/"; 
                           ?>
                           <a href="<?=$link_update?><?=$id_tb_person?>/<?=$send_page?>" ><img src="<?=base_url()?>icon/Apps-system-software-update-icon.png" width="30" ></a>
                       </td>
                       <td>                       
                           <a href="#" onclick="javascript:delete_confirm(<?=$id_tb_person?>,<?=$send_page?>);"><img src="<?=base_url()?>icon/Delete.png" width="30"></a>
                       </td>
                    </tr>
                    <?PHP
				}
				?>
<!--                    <tr>
                        <th scope="row">Bandwidth</th>
                        <td>50 GB</td>
                        <td>100 GB</td>
                        <td>150 GB</td>
                        <td>Unlimited</td>
                    </tr>
                    <tr>
                        <th scope="row">MySQL Databases</th>
                        <td>Unlimited</td>
                        <td>Unlimited</td>
                        <td>Unlimited</td>
                        <td>Unlimited</td>
                    </tr>
                    <tr>
                        <th scope="row">Setup</th>
                        <td>19.90 $</td>
                        <td>12.90 $</td>
                        <td>free</td>
                        <td>free</td>
                    </tr>
                    <tr>
                        <th scope="row">PHP 5</th>
                        <td><span class="check"></span></td>
                        <td><span class="check"></span></td>
                        <td><span class="check"></span></td>
                        <td><span class="check"></span></td>
                    </tr>
                    <tr>
                        <th scope="row">Ruby on Rails</th>
                        <td><span class="check"></span></td>
                        <td><span class="check"></span></td>
                        <td><span class="check"></span></td>
                        <td><span class="check"></span></td>
                    </tr>
-->                    
                </tbody>
            </table>
        </div>
		<?PHP
}//end
function  tb_social_models_popup($query,$send_page,$link_delete)
	{//begin
	    //echo "testing";	
             $this->load->view('import_jqueryui');
  ?> 
       <!--<META HTTP-EQUIV="Refresh" CONTENT="20">-->
    <script>
  function  delete_confirm(id,send_page,link_delete)
  {
        if( confirm('Are you delete!!')== true )
        {
            //alert('t');
            //alert('link=' + link_delete + ',delete=' + id );
            //alert(''+ id );
           // window.location.assign("<?=base_url()?>index.php/eperience/delete_tb_experience/"+ id + "/" + send_page  );
            window.location.assign(''+ link_delete  + id + '/' + send_page );    
                /*
                  $(function(){  
                        $.post( "person/delete_relation_person/",{id_tb_relation_person:''+id});  
                     }); 
                */
           // window.close();   
        }
        else
        {
            //alert('no!');
            
        }
  }
</script>

<?PHP
			
               $atts = array(
              'width'      => '1200',
              'height'     => '400',
              'scrollbars' => 'yes',
              'status'     => 'yes',
              'resizable'  => 'yes',
              'screenx'    => '0',
              'screeny'    => '0'
            );
  /*             
 $atts2 = array(
              'width'      => '1200',
              'height'     => '200',
              'scrollbars' => 'yes',
              'status'     => 'yes',
              'resizable'  => 'yes',
              'screenx'    => '0',
              'screeny'    => '0'
            );
   */ 
   
//echo anchor_popup('news/local/123', 'Click Me!', $atts);

?>
           <!-- <h2><?=$fieldset?></h2>-->
            <table class="table1">
                <thead>
                    <tr>
                        <th></th>
                        <th scope="col" abbr="Starter">เลขที่ประกันสังคม</th>
                        <th scope="col" abbr="Medium">วันที่ยื่นประกันสังคม</th>                       
                        <th scope="col" abbr="Deluxe">วันกำหนดชำระเบี้ยประกันสังคม</th>
                        <th scope="col" abbr="Deluxe">ข้อมูลการขอใช้สิทธิ์ประกันสังคม</th>
                        <th scope="col" abbr="Deluxe">หมายเหตุอื่นๆ</th>
                        <!--<th scope="col" abbr="Deluxe">Update</th>-->
                        <th scope="col" abbr="Deluxe">Delete</th>
                    </tr>
                </thead>
                
<!--                <tfoot>
                    <tr>
                        <th scope="row">Price per month</th>
                        <td>$ 2.90</td>
                        <td>$ 5.90</td>
                        <td>$ 9.90</td>
                        <td>$ 14.90</td>
                    </tr>
                </tfoot>
-->                
                
                <tbody>
                    <!--<tr>
                        <th scope="row">Storage Space</th>
                        <td>512 MB</td>
                        <td>1 GB</td>
                        <td>2 GB</td>
                        <td>4 GB</td>
                    </tr>-->
               <?PHP
                $path="upload/";
                $img="icon/doc1.jpg";
                $width="45";
                $width_hide="60";
                $img_hide="icon/not_found2.jpg";
				foreach($query->result() as $row)
				{
				   //$id_document=$row->id_document;
                                     $id_social_security=$row->id_social_security; //#dynamic
                                    ?>
                    <tr>
                     <th scope="row">                       
                                   <?=$id_social_security?>                         
                     </th>
                       <td>
                        <?PHP
                              //echo $row->id_tb_person;
							 // $this->tableQuerymodel->switch_prename($row->id_tb_person);
							 // echo $row->name;
							 // echo nbs(2);
							//  echo  $row->lastname;
                 //$id_tb_relation_person=$row->id_tb_relation_person;
                        //$id_document=$row->id_document;    
                        //$doc_38_1=$row->doc_38_1;
                            // $this->tableQuerymodel->check_file_download($doc_38_1,$path,$img,$width,$img_hide,$width_hide);
                            echo $number_social_security=$row->number_social_security;
                             //$this->choice_talent($communication_skills);
                        ?>
                           
                       </td>
                       
                        <td>
                        <?PHP							 //echo  $row->nickname;
                              // $doc_passport=$row->doc_passport;
                              // $this->tableQuerymodel->check_file_download($doc_passport,$path,$img,$width,$img_hide,$width_hide);
                echo $date_submitted=$row->date_submitted;
                        ?>
                       </td>
                                
                       <td>
                         <?PHP  
                          $date_pay=$row->date_pay; 
                          echo $date_pay;
                          ?>  
                       </td>
                       
                       <td>
                         <?  
                          $claim=$row->claim; 
                          echo $claim;
                          ?>  
                       </td>
                       
                       <td>
                         <?PHP  
                          $other_social_security=$row->other_social_security; 
                          echo $other_social_security;
                          ?>  
                       </td>
                       
                       <td>
                           <a href="#" onclick="javascript:delete_confirm(<?=$id_social_security?>,<?=$send_page?>,'<?=$link_delete?>');"><img src="<?=base_url()?>icon/Delete.png" width="30"></a>
                       </td>
                    </tr>
                    <?PHP
				}
				?>
<!--                    <tr>
                        <th scope="row">Bandwidth</th>
                        <td>50 GB</td>
                        <td>100 GB</td>
                        <td>150 GB</td>
                        <td>Unlimited</td>
                    </tr>
                    <tr>
                        <th scope="row">MySQL Databases</th>
                        <td>Unlimited</td>
                        <td>Unlimited</td>
                        <td>Unlimited</td>
                        <td>Unlimited</td>
                    </tr>
                    <tr>
                        <th scope="row">Setup</th>
                        <td>19.90 $</td>
                        <td>12.90 $</td>
                        <td>free</td>
                        <td>free</td>
                    </tr>
                    <tr>
                        <th scope="row">PHP 5</th>
                        <td><span class="check"></span></td>
                        <td><span class="check"></span></td>
                        <td><span class="check"></span></td>
                        <td><span class="check"></span></td>
                    </tr>
                    <tr>
                        <th scope="row">Ruby on Rails</th>
                        <td><span class="check"></span></td>
                        <td><span class="check"></span></td>
                        <td><span class="check"></span></td>
                        <td><span class="check"></span></td>
                    </tr>
-->                    
                </tbody>
            </table>
        </div>
		<?PHP
}//end

//## Leave
function  tb_leave_models_link($query,$send_page,$field_set,$field_name,$tb_check,$link_operator,$link_update,$link_delete)
	{//begin
	    //echo "testing";
?>		
<script>
  function  delete_confirm(id,send_page)
  {
        if( confirm('Are you delete!!')== true )
        {
            //alert('yes');
           <? $link_delete=base_url()."index.php/person/delete_tb_person/"; ?>
            window.location.assign("<?=$link_delete?>"+ id + "/" + send_page  );
        }
        else
        {
            // alert('no!');
            
        }
  }
</script>
	
		<div id="content">
            <a class="back" href=""></a>
            <span class="scroll"></span>
            <p class="head">DATABASE System  Report</p>
            <h1>HN BASE System</h1>
            <h2><?=$field_set?></h2>
            <table class="table1">
                <thead>
                    <tr>
                        <th></th>
                        <th scope="col" abbr="Starter">(ชื่อ - นามสกุล) Name - Lastname</th>
                        <th scope="col" abbr="Medium">Nickname</th>
                        <th scope="col" abbr="Business">ID(เอกสารประกอบ)</th>
                        <th scope="col" abbr="Deluxe">Passport(เลขที่พาสปอร์ต)</th>
                        <th scope="col" abbr="Deluxe">รหัสพนักงาน</th>
                         <th scope="col" abbr="Deluxe">Update</th>
                         <th scope="col" abbr="Deluxe">Delete</th>
                    </tr>
                </thead>
                
<!--                <tfoot>
                    <tr>
                        <th scope="row">Price per month</th>
                        <td>$ 2.90</td>
                        <td>$ 5.90</td>
                        <td>$ 9.90</td>
                        <td>$ 14.90</td>
                    </tr>
                </tfoot>
-->                
                
                <tbody>
                    <!--<tr>
                        <th scope="row">Storage Space</th>
                        <td>512 MB</td>
                        <td>1 GB</td>
                        <td>2 GB</td>
                        <td>4 GB</td>
                    </tr>-->
               <?PHP				
               $atts = array(
              'width'      => '1200',
              'height'     => '250',
              'scrollbars' => 'yes',
              'status'     => 'yes',
              'resizable'  => 'yes',
              'screenx'    => '0',
              'screeny'    => '0'
            );
 $atts2 = array(
              'width'      => '1200',
              'height'     => '200',
              'scrollbars' => 'yes',
              'status'     => 'yes',
              'resizable'  => 'yes',
              'screenx'    => '0',
              'screeny'    => '0'
            );
//echo anchor_popup('news/local/123', 'Click Me!', $atts);
               // $field_name="id_tb_person";
               // $tb_check="tb_document";
               foreach($query->result() as $row)
				{
                                    $id_tb_person= $row->id_tb_person;
				    ?>
                    <tr>
                     <th scope="row"><?=$id_tb_person?></th>
                       <td>
                        <?PHP
                         
                         $prename=$row->prename;			                       
                         //$switch_prename = $this->tableQuerymodel->switch_prename($prename);
                         $switch_prename = $this->tbload->switch_prename($prename);
			 $name= $row->name;
			 //echo nbs(2);
			 $lastname= $row->lastname;                                                         
                         $totalname=$switch_prename.$name.nbs(2).$lastname;             
                         
                         //echo $id_tb_person;
                        // echo $tb_check;
                         
                         $check_rows= $this->check_num_rows($id_tb_person,$tb_check,$field_name);
                         
                         if(  $check_rows > 0 )
                         {
                            //echo anchor_popup('person/detail_person/'.$id_tb_person.'/'.$send_page,$totalname, $atts);   
                             //$link_operator="person/detail_person/";
                             echo anchor_popup($link_operator.$id_tb_person.'/'.$send_page,$totalname, $atts);                            
                         }
                         else
                         {
                             echo $totalname;
                         }
                        ?>
                       </td>
                        <td>
                        <?PHP
							 echo  $row->nickname;
                        ?>
                       </td>
                       <td>
                        <?PHP
							 echo  $row->id_peson;
                        ?>
                       </td>
                       <td>
                        <?PHP
							 echo  $row->id_passport;
                        ?>
                       </td>
                       <td>
                        <?PHP
							 echo  $row->id_code_person;
                        ?>
                       </td>
                       <td>
                           <?PHP
                           //$link_update=base_url()."index.php/person/update_tb_person/"; 
                           ?>
                           <a href="<?=$link_update?><?=$id_tb_person?>/<?=$send_page?>" ><img src="<?=base_url()?>icon/Apps-system-software-update-icon.png" width="30" ></a>
                       </td>
                       <td>                       
                           <a href="#" onclick="javascript:delete_confirm(<?=$id_tb_person?>,<?=$send_page?>);"><img src="<?=base_url()?>icon/Delete.png" width="30"></a>
                       </td>
                    </tr>
                    <?PHP
				}
				?>
<!--                    <tr>
                        <th scope="row">Bandwidth</th>
                        <td>50 GB</td>
                        <td>100 GB</td>
                        <td>150 GB</td>
                        <td>Unlimited</td>
                    </tr>
                    <tr>
                        <th scope="row">MySQL Databases</th>
                        <td>Unlimited</td>
                        <td>Unlimited</td>
                        <td>Unlimited</td>
                        <td>Unlimited</td>
                    </tr>
                    <tr>
                        <th scope="row">Setup</th>
                        <td>19.90 $</td>
                        <td>12.90 $</td>
                        <td>free</td>
                        <td>free</td>
                    </tr>
                    <tr>
                        <th scope="row">PHP 5</th>
                        <td><span class="check"></span></td>
                        <td><span class="check"></span></td>
                        <td><span class="check"></span></td>
                        <td><span class="check"></span></td>
                    </tr>
                    <tr>
                        <th scope="row">Ruby on Rails</th>
                        <td><span class="check"></span></td>
                        <td><span class="check"></span></td>
                        <td><span class="check"></span></td>
                        <td><span class="check"></span></td>
                    </tr>
-->                    
                </tbody>
            </table>
        </div>
		<?PHP
}//end
function  tb_leave_models_popup($query,$send_page,$link_delete)
	{//begin
	    //echo "testing";	
             $this->load->view('import_jqueryui');
  ?> 
       <!--<META HTTP-EQUIV="Refresh" CONTENT="20">-->
    <script>
  function  delete_confirm(id,send_page,link_delete)
  {
        if( confirm('Are you delete!!')== true )
        {
            //alert('t');
            //alert('link=' + link_delete + ',delete=' + id );
            //alert(''+ id );
           // window.location.assign("<?=base_url()?>index.php/eperience/delete_tb_experience/"+ id + "/" + send_page  );
            window.location.assign(''+ link_delete  + id + '/' + send_page );    
                /*
                  $(function(){  
                        $.post( "person/delete_relation_person/",{id_tb_relation_person:''+id});  
                     }); 
                */
           // window.close();   
        }
        else
        {
            //alert('no!');
            
        }
  }
</script>

<?PHP
			
               $atts = array(
              'width'      => '1200',
              'height'     => '400',
              'scrollbars' => 'yes',
              'status'     => 'yes',
              'resizable'  => 'yes',
              'screenx'    => '0',
              'screeny'    => '0'
            );
  /*             
 $atts2 = array(
              'width'      => '1200',
              'height'     => '200',
              'scrollbars' => 'yes',
              'status'     => 'yes',
              'resizable'  => 'yes',
              'screenx'    => '0',
              'screeny'    => '0'
            );
   */ 
   
//echo anchor_popup('news/local/123', 'Click Me!', $atts);

?>
           <!-- <h2><?=$fieldset?></h2>-->
            <table class="table1">
                <thead>
                    <tr>
                        <th></th>
                        <th scope="col" abbr="Starter">จำนวนวันทำงาน (วัน)</th>
                        <th scope="col" abbr="Medium">จำนวนวันพักร้อน (วัน)</th>                       
                        <th scope="col" abbr="Deluxe">จำนวนวันลากิจ (วัน)</th>
                        <th scope="col" abbr="Deluxe">จำนวนวันลาป่วย (วัน)</th>
                        <th scope="col" abbr="Deluxe">จำนวนวันขาด (วัน)</th>
                         <th scope="col" abbr="Deluxe">รายได้วันทำงาน (บาท)</th>
                        <!--<th scope="col" abbr="Deluxe">Update</th>-->                    
                        <th scope="col" abbr="Deluxe">Delete</th>
                    </tr>
                </thead>
                
<!--                <tfoot>
                    <tr>
                        <th scope="row">Price per month</th>
                        <td>$ 2.90</td>
                        <td>$ 5.90</td>
                        <td>$ 9.90</td>
                        <td>$ 14.90</td>
                    </tr>
                </tfoot>
-->                
                
                <tbody>
                    <!--<tr>
                        <th scope="row">Storage Space</th>
                        <td>512 MB</td>
                        <td>1 GB</td>
                        <td>2 GB</td>
                        <td>4 GB</td>
                    </tr>-->
               <?PHP
                $path="upload/";
                $img="icon/doc1.jpg";
                $width="45";
                $width_hide="60";
                $img_hide="icon/not_found2.jpg";
				foreach($query->result() as $row)
				{
				   //$id_document=$row->id_document;
                                     $id_leave_work=$row->id_leave_work; //#dynamic
                                    ?>
                    <tr>
                     <th scope="row">                       
                                   <?=$id_leave_work?>                         
                     </th>
                       <td>
                        <?PHP
                              //echo $row->id_tb_person;
							 // $this->tableQuerymodel->switch_prename($row->id_tb_person);
							 // echo $row->name;
							 // echo nbs(2);
							//  echo  $row->lastname;
                 //$id_tb_relation_person=$row->id_tb_relation_person;
                        //$id_document=$row->id_document;    
                        //$doc_38_1=$row->doc_38_1;
                            // $this->tableQuerymodel->check_file_download($doc_38_1,$path,$img,$width,$img_hide,$width_hide);
                            echo $day_work=$row->day_work;
                             //$this->choice_talent($communication_skills);
                        ?>
                           
                       </td>
                       
                        <td>
                        <?PHP							 //echo  $row->nickname;
                              // $doc_passport=$row->doc_passport;
                              // $this->tableQuerymodel->check_file_download($doc_passport,$path,$img,$width,$img_hide,$width_hide);
                echo $day_summer=$row->day_summer;
                        ?>
                       </td>
                                
                       <td>
                         <?PHP  
                          echo $day_carer=$row->day_carer; 
                          //echo $date_pay;
                          ?>  
                       </td>
                       
                       <td>
                         <?  
                         echo $day_sick=$row->day_sick; 
                         // echo $claim;
                          ?>  
                       </td>
                       
                       <td>
                         <?PHP  
                         echo $day_absence=$row->day_absence; 
                         // echo $other_social_security;
                          ?>  
                       </td>
                       
                         <td>
                         <?PHP  
                         echo $revenue=$row->revenue; 
                         // echo $other_social_security;
                          ?>  
                       </td>
                       
                       <td>
                           <a href="#" onclick="javascript:delete_confirm(<?=$id_leave_work?>,<?=$send_page?>,'<?=$link_delete?>');"><img src="<?=base_url()?>icon/Delete.png" width="30"></a>
                       </td>
                    </tr>
                    <?PHP
				}
				?>
<!--                    <tr>
                        <th scope="row">Bandwidth</th>
                        <td>50 GB</td>
                        <td>100 GB</td>
                        <td>150 GB</td>
                        <td>Unlimited</td>
                    </tr>
                    <tr>
                        <th scope="row">MySQL Databases</th>
                        <td>Unlimited</td>
                        <td>Unlimited</td>
                        <td>Unlimited</td>
                        <td>Unlimited</td>
                    </tr>
                    <tr>
                        <th scope="row">Setup</th>
                        <td>19.90 $</td>
                        <td>12.90 $</td>
                        <td>free</td>
                        <td>free</td>
                    </tr>
                    <tr>
                        <th scope="row">PHP 5</th>
                        <td><span class="check"></span></td>
                        <td><span class="check"></span></td>
                        <td><span class="check"></span></td>
                        <td><span class="check"></span></td>
                    </tr>
                    <tr>
                        <th scope="row">Ruby on Rails</th>
                        <td><span class="check"></span></td>
                        <td><span class="check"></span></td>
                        <td><span class="check"></span></td>
                        <td><span class="check"></span></td>
                    </tr>
-->                    
                </tbody>
            </table>
        </div>
		<?PHP
}//end
//##authorization 
function  tb_authorization_models_link($query,$send_page,$field_set,$field_name,$tb_check,$link_operator,$link_update,$link_delete)
	{//begin
	    //echo "testing";
?>		
<script>
  function  delete_confirm(id,send_page)
  {
        if( confirm('Are you delete!!')== true )
        {
            //alert('yes');
           <? $link_delete=base_url()."index.php/person/delete_tb_person/"; ?>
            window.location.assign("<?=$link_delete?>"+ id + "/" + send_page  );
        }
        else
        {
            // alert('no!');
            
        }
  }
</script>
	
		<div id="content">
            <a class="back" href=""></a>
            <span class="scroll"></span>
            <p class="head">DATABASE System  Report</p>
            <h1>HN BASE System</h1>
            <h2><?=$field_set?></h2>
            <table class="table1">
                <thead>
                    <tr>
                        <th></th>
                        <th scope="col" abbr="Starter">(ชื่อ - นามสกุล) Name - Lastname</th>
                        <th scope="col" abbr="Medium">Nickname</th>
                        <th scope="col" abbr="Business">ID(เอกสารประกอบ)</th>
                        <th scope="col" abbr="Deluxe">Passport(เลขที่พาสปอร์ต)</th>
                        <th scope="col" abbr="Deluxe">รหัสพนักงาน</th>
                         <th scope="col" abbr="Deluxe">Update</th>
                         <th scope="col" abbr="Deluxe">Delete</th>
                    </tr>
                </thead>
                
<!--                <tfoot>
                    <tr>
                        <th scope="row">Price per month</th>
                        <td>$ 2.90</td>
                        <td>$ 5.90</td>
                        <td>$ 9.90</td>
                        <td>$ 14.90</td>
                    </tr>
                </tfoot>
-->                
                
                <tbody>
                    <!--<tr>
                        <th scope="row">Storage Space</th>
                        <td>512 MB</td>
                        <td>1 GB</td>
                        <td>2 GB</td>
                        <td>4 GB</td>
                    </tr>-->
               <?PHP				
               $atts = array(
              'width'      => '1200',
              'height'     => '250',
              'scrollbars' => 'yes',
              'status'     => 'yes',
              'resizable'  => 'yes',
              'screenx'    => '0',
              'screeny'    => '0'
            );
 $atts2 = array(
              'width'      => '1200',
              'height'     => '200',
              'scrollbars' => 'yes',
              'status'     => 'yes',
              'resizable'  => 'yes',
              'screenx'    => '0',
              'screeny'    => '0'
            );
//echo anchor_popup('news/local/123', 'Click Me!', $atts);
               // $field_name="id_tb_person";
               // $tb_check="tb_document";
               foreach($query->result() as $row)
				{
                                    $id_tb_person= $row->id_tb_person;
				    ?>
                    <tr>
                     <th scope="row"><?=$id_tb_person?></th>
                       <td>
                        <?PHP
                         
                         $prename=$row->prename;			                       
                         //$switch_prename = $this->tableQuerymodel->switch_prename($prename);
                         $switch_prename = $this->tbload->switch_prename($prename);
			 $name= $row->name;
			 //echo nbs(2);
			 $lastname= $row->lastname;                                                         
                         $totalname=$switch_prename.$name.nbs(2).$lastname;             
                         
                         //echo $id_tb_person;
                        // echo $tb_check;
                         
                         $check_rows= $this->check_num_rows($id_tb_person,$tb_check,$field_name);
                         
                         if(  $check_rows > 0 )
                         {
                            //echo anchor_popup('person/detail_person/'.$id_tb_person.'/'.$send_page,$totalname, $atts);   
                             //$link_operator="person/detail_person/";
                             echo anchor_popup($link_operator.$id_tb_person.'/'.$send_page,$totalname, $atts);                            
                         }
                         else
                         {
                             echo $totalname;
                         }
                        ?>
                       </td>
                        <td>
                        <?PHP
							 echo  $row->nickname;
                        ?>
                       </td>
                       <td>
                        <?PHP
							 echo  $row->id_peson;
                        ?>
                       </td>
                       <td>
                        <?PHP
							 echo  $row->id_passport;
                        ?>
                       </td>
                       <td>
                        <?PHP
							 echo  $row->id_code_person;
                        ?>
                       </td>
                       <td>
                           <?PHP
                           //$link_update=base_url()."index.php/person/update_tb_person/"; 
                           ?>
                           <a href="<?=$link_update?><?=$id_tb_person?>/<?=$send_page?>" ><img src="<?=base_url()?>icon/Apps-system-software-update-icon.png" width="30" ></a>
                       </td>
                       <td>                       
                           <a href="#" onclick="javascript:delete_confirm(<?=$id_tb_person?>,<?=$send_page?>);"><img src="<?=base_url()?>icon/Delete.png" width="30"></a>
                       </td>
                    </tr>
                    <?PHP
				}
				?>
<!--                    <tr>
                        <th scope="row">Bandwidth</th>
                        <td>50 GB</td>
                        <td>100 GB</td>
                        <td>150 GB</td>
                        <td>Unlimited</td>
                    </tr>
                    <tr>
                        <th scope="row">MySQL Databases</th>
                        <td>Unlimited</td>
                        <td>Unlimited</td>
                        <td>Unlimited</td>
                        <td>Unlimited</td>
                    </tr>
                    <tr>
                        <th scope="row">Setup</th>
                        <td>19.90 $</td>
                        <td>12.90 $</td>
                        <td>free</td>
                        <td>free</td>
                    </tr>
                    <tr>
                        <th scope="row">PHP 5</th>
                        <td><span class="check"></span></td>
                        <td><span class="check"></span></td>
                        <td><span class="check"></span></td>
                        <td><span class="check"></span></td>
                    </tr>
                    <tr>
                        <th scope="row">Ruby on Rails</th>
                        <td><span class="check"></span></td>
                        <td><span class="check"></span></td>
                        <td><span class="check"></span></td>
                        <td><span class="check"></span></td>
                    </tr>
-->                    
                </tbody>
            </table>
        </div>
		<?PHP
}//end
function  tb_authorization_models_popup($query,$send_page,$link_delete)
	{//begin
	    //echo "testing";	
             $this->load->view('import_jqueryui');
  ?> 
       <!--<META HTTP-EQUIV="Refresh" CONTENT="20">-->
    <script>
  function  delete_confirm(id,send_page,link_delete)
  {
        if( confirm('Are you delete!!')== true )
        {
            //alert('t');
            //alert('link=' + link_delete + ',delete=' + id );
            //alert(''+ id );
           // window.location.assign("<?=base_url()?>index.php/eperience/delete_tb_experience/"+ id + "/" + send_page  );
            window.location.assign(''+ link_delete  + id + '/' + send_page );    
                /*
                  $(function(){  
                        $.post( "person/delete_relation_person/",{id_tb_relation_person:''+id});  
                     }); 
                */
           // window.close();   
        }
        else
        {
            //alert('no!');
            
        }
  }
</script>

<?PHP
			
               $atts = array(
              'width'      => '1200',
              'height'     => '400',
              'scrollbars' => 'yes',
              'status'     => 'yes',
              'resizable'  => 'yes',
              'screenx'    => '0',
              'screeny'    => '0'
            );
  /*             
 $atts2 = array(
              'width'      => '1200',
              'height'     => '200',
              'scrollbars' => 'yes',
              'status'     => 'yes',
              'resizable'  => 'yes',
              'screenx'    => '0',
              'screeny'    => '0'
            );
   */ 
   
//echo anchor_popup('news/local/123', 'Click Me!', $atts);

?>
           <!-- <h2><?=$fieldset?></h2>-->
            <table class="table1">
                <thead>
                    <tr>
                        <th></th>
                        <th scope="col" abbr="Starter">การลาออก</th>
                        <th scope="col" abbr="Medium">วันที่ยื่นใบลาออก</th>                       
                        <th scope="col" abbr="Deluxe">วันที่อนุมัติ</th>
                        <th scope="col" abbr="Deluxe">สาเหตุการลาออก</th>
                        <th scope="col" abbr="Deluxe">วันที่แจ้งออกจากงาน</th>
                         <th scope="col" abbr="Deluxe">หมายเหตุ</th>
                        <!--<th scope="col" abbr="Deluxe">Update</th>-->                    
                        <th scope="col" abbr="Deluxe">Delete</th>
                    </tr>
                </thead>
                
<!--                <tfoot>
                    <tr>
                        <th scope="row">Price per month</th>
                        <td>$ 2.90</td>
                        <td>$ 5.90</td>
                        <td>$ 9.90</td>
                        <td>$ 14.90</td>
                    </tr>
                </tfoot>
-->                
                
                <tbody>
                    <!--<tr>
                        <th scope="row">Storage Space</th>
                        <td>512 MB</td>
                        <td>1 GB</td>
                        <td>2 GB</td>
                        <td>4 GB</td>
                    </tr>-->
               <?PHP
                $path="upload/";
                $img="icon/doc1.jpg";
                $width="45";
                $width_hide="60";
                $img_hide="icon/not_found2.jpg";
				foreach($query->result() as $row)
				{
				   //$id_document=$row->id_document;
                                     $id_authorization=$row->id_authorization; //#dynamic
                                    ?>
                    <tr>
                     <th scope="row">                       
                                   <?=$id_authorization?>                         
                     </th>
                       <td>
                        <?PHP
                              //echo $row->id_tb_person;
							 // $this->tableQuerymodel->switch_prename($row->id_tb_person);
							 // echo $row->name;
							 // echo nbs(2);
							//  echo  $row->lastname;
                 //$id_tb_relation_person=$row->id_tb_relation_person;
                        //$id_document=$row->id_document;    
                        //$doc_38_1=$row->doc_38_1;
                            // $this->tableQuerymodel->check_file_download($doc_38_1,$path,$img,$width,$img_hide,$width_hide);
                            echo $resign=$row->resign;
                             //$this->choice_talent($communication_skills);
                        ?>
                           
                       </td>
                       
                        <td>
                        <?PHP							 //echo  $row->nickname;
                              // $doc_passport=$row->doc_passport;
                              // $this->tableQuerymodel->check_file_download($doc_passport,$path,$img,$width,$img_hide,$width_hide);
                echo $date_resign=$row->date_resign;
                        ?>
                       </td>
                                
                       <td>
                         <?PHP  
                          echo $date_authorization=$row->date_authorization; 
                          //echo $date_pay;
                          ?>  
                       </td>
                       
                       <td>
                         <?PHP  
                         echo $because_resign=$row->because_resign; 
                         // echo $claim;
                          ?>  
                       </td>
                       
                       <td>
                         <?PHP  
                         echo $date_inform_resign=$row->date_inform_resign; 
                         // echo $other_social_security;
                          ?>  
                       </td>
                       
                         <td>
                         <?PHP  
                         echo $remark=$row->remark; 
                         // echo $other_social_security;
                          ?>  
                       </td>
                       
                       <td>
                           <a href="#" onclick="javascript:delete_confirm(<?=$id_authorization?>,<?=$send_page?>,'<?=$link_delete?>');"><img src="<?=base_url()?>icon/Delete.png" width="30"></a>
                       </td>
                    </tr>
                    <?PHP
				}
				?>
<!--                    <tr>
                        <th scope="row">Bandwidth</th>
                        <td>50 GB</td>
                        <td>100 GB</td>
                        <td>150 GB</td>
                        <td>Unlimited</td>
                    </tr>
                    <tr>
                        <th scope="row">MySQL Databases</th>
                        <td>Unlimited</td>
                        <td>Unlimited</td>
                        <td>Unlimited</td>
                        <td>Unlimited</td>
                    </tr>
                    <tr>
                        <th scope="row">Setup</th>
                        <td>19.90 $</td>
                        <td>12.90 $</td>
                        <td>free</td>
                        <td>free</td>
                    </tr>
                    <tr>
                        <th scope="row">PHP 5</th>
                        <td><span class="check"></span></td>
                        <td><span class="check"></span></td>
                        <td><span class="check"></span></td>
                        <td><span class="check"></span></td>
                    </tr>
                    <tr>
                        <th scope="row">Ruby on Rails</th>
                        <td><span class="check"></span></td>
                        <td><span class="check"></span></td>
                        <td><span class="check"></span></td>
                        <td><span class="check"></span></td>
                    </tr>
-->                    
                </tbody>
            </table>
        </div>
		<?PHP
}//end
##permission
function  tb_permission_models_link($query,$send_page,$field_set,$field_name,$tb_check,$link_operator,$link_update,$link_delete)
	{//begin
	    //echo "testing";
?>		
<script>
  function  delete_confirm(id,send_page)
  {
        if( confirm('Are you delete!!')== true )
        {
            //alert('yes');
           <?PHP $link_delete=base_url()."index.php/person/delete_tb_person/"; ?>
            window.location.assign("<?=$link_delete?>"+ id + "/" + send_page  );
        }
        else
        {
            // alert('no!');
            
        }
  }
</script>
	
		<div id="content">
            <a class="back" href=""></a>
            <span class="scroll"></span>
            <p class="head">DATABASE System  Report</p>
            <h1>HN BASE System</h1>
            <h2><?=$field_set?></h2>
            <table class="table1">
                <thead>
                    <tr>
                        <th></th>
                        <th scope="col" abbr="Starter">(ชื่อ - นามสกุล) Name - Lastname</th>
                        <th scope="col" abbr="Medium">Nickname</th>
                        <th scope="col" abbr="Business">ID(เอกสารประกอบ)</th>
                        <th scope="col" abbr="Deluxe">Passport(เลขที่พาสปอร์ต)</th>
                        <th scope="col" abbr="Deluxe">รหัสพนักงาน</th>
                         <th scope="col" abbr="Deluxe">Update</th>
                         <th scope="col" abbr="Deluxe">Delete</th>
                    </tr>
                </thead>
                
<!--                <tfoot>
                    <tr>
                        <th scope="row">Price per month</th>
                        <td>$ 2.90</td>
                        <td>$ 5.90</td>
                        <td>$ 9.90</td>
                        <td>$ 14.90</td>
                    </tr>
                </tfoot>
-->                
                
                <tbody>
                    <!--<tr>
                        <th scope="row">Storage Space</th>
                        <td>512 MB</td>
                        <td>1 GB</td>
                        <td>2 GB</td>
                        <td>4 GB</td>
                    </tr>-->
               <?PHP				
               $atts = array(
              'width'      => '1200',
              'height'     => '250',
              'scrollbars' => 'yes',
              'status'     => 'yes',
              'resizable'  => 'yes',
              'screenx'    => '0',
              'screeny'    => '0'
            );
 $atts2 = array(
              'width'      => '1200',
              'height'     => '200',
              'scrollbars' => 'yes',
              'status'     => 'yes',
              'resizable'  => 'yes',
              'screenx'    => '0',
              'screeny'    => '0'
            );
//echo anchor_popup('news/local/123', 'Click Me!', $atts);
               // $field_name="id_tb_person";
               // $tb_check="tb_document";
               foreach($query->result() as $row)
				{
                                    $id_tb_person= $row->id_tb_person;
				    ?>
                    <tr>
                     <th scope="row"><?=$id_tb_person?></th>
                       <td>
                        <?PHP
                         
                         $prename=$row->prename;			                       
                         //$switch_prename = $this->tableQuerymodel->switch_prename($prename);
                         $switch_prename = $this->tbload->switch_prename($prename);
			 $name= $row->name;
			 //echo nbs(2);
			 $lastname= $row->lastname;                                                         
                         $totalname=$switch_prename.$name.nbs(2).$lastname;             
                         
                         //echo $id_tb_person;
                        // echo $tb_check;
                         
                         $check_rows= $this->check_num_rows($id_tb_person,$tb_check,$field_name);
                         
                         if(  $check_rows > 0 )
                         {
                            //echo anchor_popup('person/detail_person/'.$id_tb_person.'/'.$send_page,$totalname, $atts);   
                             //$link_operator="person/detail_person/";
                             echo anchor_popup($link_operator.$id_tb_person.'/'.$send_page,$totalname, $atts);                            
                         }
                         else
                         {
                             echo $totalname;
                         }
                        ?>
                       </td>
                        <td>
                        <?PHP
							 echo  $row->nickname;
                        ?>
                       </td>
                       <td>
                        <?PHP
							 echo  $row->id_peson;
                        ?>
                       </td>
                       <td>
                        <?PHP
							 echo  $row->id_passport;
                        ?>
                       </td>
                       <td>
                        <?PHP
							 echo  $row->id_code_person;
                        ?>
                       </td>
                       <td>
                           <?PHP
                           //$link_update=base_url()."index.php/person/update_tb_person/"; 
                           ?>
                           <a href="<?=$link_update?><?=$id_tb_person?>/<?=$send_page?>" ><img src="<?=base_url()?>icon/Apps-system-software-update-icon.png" width="30" ></a>
                       </td>
                       <td>                       
                           <a href="#" onclick="javascript:delete_confirm(<?=$id_tb_person?>,<?=$send_page?>);"><img src="<?=base_url()?>icon/Delete.png" width="30"></a>
                       </td>
                    </tr>
                    <?PHP
				}
				?>
<!--                    <tr>
                        <th scope="row">Bandwidth</th>
                        <td>50 GB</td>
                        <td>100 GB</td>
                        <td>150 GB</td>
                        <td>Unlimited</td>
                    </tr>
                    <tr>
                        <th scope="row">MySQL Databases</th>
                        <td>Unlimited</td>
                        <td>Unlimited</td>
                        <td>Unlimited</td>
                        <td>Unlimited</td>
                    </tr>
                    <tr>
                        <th scope="row">Setup</th>
                        <td>19.90 $</td>
                        <td>12.90 $</td>
                        <td>free</td>
                        <td>free</td>
                    </tr>
                    <tr>
                        <th scope="row">PHP 5</th>
                        <td><span class="check"></span></td>
                        <td><span class="check"></span></td>
                        <td><span class="check"></span></td>
                        <td><span class="check"></span></td>
                    </tr>
                    <tr>
                        <th scope="row">Ruby on Rails</th>
                        <td><span class="check"></span></td>
                        <td><span class="check"></span></td>
                        <td><span class="check"></span></td>
                        <td><span class="check"></span></td>
                    </tr>
-->                    
                </tbody>
            </table>
        </div>
		<?PHP
}//end
function  tb_permission_models_popup($query,$send_page,$link_delete)
	{//begin
	    //echo "testing";	
             $this->load->view('import_jqueryui');
  ?> 
       <!--<META HTTP-EQUIV="Refresh" CONTENT="20">-->
    <script>
  function  delete_confirm(id,send_page,link_delete)
  {
        if( confirm('Are you delete!!')== true )
        {
            //alert('t');
            //alert('link=' + link_delete + ',delete=' + id );
            //alert(''+ id );
           // window.location.assign("<?=base_url()?>index.php/eperience/delete_tb_experience/"+ id + "/" + send_page  );
            window.location.assign(''+ link_delete  + id + '/' + send_page );    
                /*
                  $(function(){  
                        $.post( "person/delete_relation_person/",{id_tb_relation_person:''+id});  
                     }); 
                */
           // window.close();   
        }
        else
        {
            //alert('no!');
            
        }
  }
</script>

<?PHP
			
               $atts = array(
              'width'      => '1200',
              'height'     => '400',
              'scrollbars' => 'yes',
              'status'     => 'yes',
              'resizable'  => 'yes',
              'screenx'    => '0',
              'screeny'    => '0'
            );
  /*             
 $atts2 = array(
              'width'      => '1200',
              'height'     => '200',
              'scrollbars' => 'yes',
              'status'     => 'yes',
              'resizable'  => 'yes',
              'screenx'    => '0',
              'screeny'    => '0'
            );
   */ 
   
//echo anchor_popup('news/local/123', 'Click Me!', $atts);

?>
           <!-- <h2><?=$fieldset?></h2>-->
            <table class="table1">
                <thead>
                    <tr>
                        <th></th>
                        <th scope="col" abbr="Starter">วันที่ขออนุญาติทำงาน</th>
                        <th scope="col" abbr="Medium">.ออกให้โดย สจจ.</th>                       
                        <th scope="col" abbr="Deluxe">ออกให้โดย สจก.</th>
                        <th scope="col" abbr="Deluxe">กำหนดนัดอื่น</th>
                        <th scope="col" abbr="Deluxe">หมายเหตุ</th>
                         <th scope="col" abbr="Deluxe">ระดับการศึกษา</th>
                         <th scope="col" abbr="Deluxe">สถานศึกษา</th>
                         <th scope="col" abbr="Deluxe">ความถนัดความสามารถในการทำงาน</th>
                        <!--<th scope="col" abbr="Deluxe">Update</th>-->                    
                        <th scope="col" abbr="Deluxe">Delete</th>
                    </tr>
                </thead>
                
<!--                <tfoot>
                    <tr>
                        <th scope="row">Price per month</th>
                        <td>$ 2.90</td>
                        <td>$ 5.90</td>
                        <td>$ 9.90</td>
                        <td>$ 14.90</td>
                    </tr>
                </tfoot>
-->                
                
                <tbody>
                    <!--<tr>
                        <th scope="row">Storage Space</th>
                        <td>512 MB</td>
                        <td>1 GB</td>
                        <td>2 GB</td>
                        <td>4 GB</td>
                    </tr>-->
               <?PHP
                $path="upload/";
                $img="icon/doc1.jpg";
                $width="45";
                $width_hide="60";
                $img_hide="icon/not_found2.jpg";
				foreach($query->result() as $row)
				{
				   //$id_document=$row->id_document;
                                     $id_permission=$row->id_permission; //#dynamic
                                    ?>
                    <tr>
                     <th scope="row">                       
                                   <?=$id_permission?>                         
                     </th>
                       <td>
                        <?PHP
                              //echo $row->id_tb_person;
							 // $this->tableQuerymodel->switch_prename($row->id_tb_person);
							 // echo $row->name;
							 // echo nbs(2);
							//  echo  $row->lastname;
                 //$id_tb_relation_person=$row->id_tb_relation_person;
                        //$id_document=$row->id_document;    
                        //$doc_38_1=$row->doc_38_1;
                            // $this->tableQuerymodel->check_file_download($doc_38_1,$path,$img,$width,$img_hide,$width_hide);
                            echo $date_permission=$row->date_permission;
                             //$this->choice_talent($communication_skills);
                        ?>
                           
                       </td>
                       
                        <td>
                        <?PHP							 //echo  $row->nickname;
                              // $doc_passport=$row->doc_passport;
                              // $this->tableQuerymodel->check_file_download($doc_passport,$path,$img,$width,$img_hide,$width_hide);
                echo $authoriz_sjj=$row->authoriz_sjj;
                        ?>
                       </td>
                                
                       <td>
                         <?PHP  
                          echo $authoriz_sjk=$row->authoriz_sjk; 
                          //echo $date_pay;
                          ?>  
                       </td>
                       
                       <td>
                         <?  
                         echo $date_shot=$row->date_shot; 
                         // echo $claim;
                          ?>  
                       </td>
                       
                       <td>
                         <?PHP  
                         echo $remark=$row->remark; 
                         // echo $other_social_security;
                          ?>  
                       </td>
                       
                         <td>
                         <?PHP  
                         echo $study=$row->study; 
                         // echo $other_social_security;
                          ?>  
                       </td>
                       
                       <td>
                         <?PHP  
                         echo $academy=$row->academy; 
                         // echo $other_social_security;
                          ?>  
                       </td>
                       
                            <td>
                         <?PHP  
                         echo $aptitude=$row->aptitude; 
                         // echo $other_social_security;
                          ?>  
                       </td>
                       
                       <td>
                           <a href="#" onclick="javascript:delete_confirm(<?=$id_permission?>,<?=$send_page?>,'<?=$link_delete?>');"><img src="<?=base_url()?>icon/Delete.png" width="30"></a>
                       </td>
                    </tr>
                    <?PHP
				}
				?>
<!--                    <tr>
                        <th scope="row">Bandwidth</th>
                        <td>50 GB</td>
                        <td>100 GB</td>
                        <td>150 GB</td>
                        <td>Unlimited</td>
                    </tr>
                    <tr>
                        <th scope="row">MySQL Databases</th>
                        <td>Unlimited</td>
                        <td>Unlimited</td>
                        <td>Unlimited</td>
                        <td>Unlimited</td>
                    </tr>
                    <tr>
                        <th scope="row">Setup</th>
                        <td>19.90 $</td>
                        <td>12.90 $</td>
                        <td>free</td>
                        <td>free</td>
                    </tr>
                    <tr>
                        <th scope="row">PHP 5</th>
                        <td><span class="check"></span></td>
                        <td><span class="check"></span></td>
                        <td><span class="check"></span></td>
                        <td><span class="check"></span></td>
                    </tr>
                    <tr>
                        <th scope="row">Ruby on Rails</th>
                        <td><span class="check"></span></td>
                        <td><span class="check"></span></td>
                        <td><span class="check"></span></td>
                        <td><span class="check"></span></td>
                    </tr>
-->                    
                </tbody>
            </table>
        </div>
		<?PHP
}//end
##visa
function  tb_visa_models_link($query,$send_page,$field_set,$field_name,$tb_check,$link_operator,$link_update,$link_delete)
	{//begin
	    //echo "testing";
?>		
<script>
  function  delete_confirm(id,send_page)
  {
        if( confirm('Are you delete!!')== true )
        {
            //alert('yes');
           <?PHP $link_delete=base_url()."index.php/person/delete_tb_person/"; ?>
            window.location.assign("<?=$link_delete?>"+ id + "/" + send_page  );
        }
        else
        {
            // alert('no!');
            
        }
  }
</script>
	
		<div id="content">
            <a class="back" href=""></a>
            <span class="scroll"></span>
            <p class="head">DATABASE System  Report</p>
            <h1>HN BASE System</h1>
            <h2><?=$field_set?></h2>
            <table class="table1">
                <thead>
                    <tr>
                        <th></th>
                        <th scope="col" abbr="Starter">(ชื่อ - นามสกุล) Name - Lastname</th>
                        <th scope="col" abbr="Medium">Nickname</th>
                        <th scope="col" abbr="Business">ID(เอกสารประกอบ)</th>
                        <th scope="col" abbr="Deluxe">Passport(เลขที่พาสปอร์ต)</th>
                        <th scope="col" abbr="Deluxe">รหัสพนักงาน</th>
                         <th scope="col" abbr="Deluxe">Update</th>
                         <th scope="col" abbr="Deluxe">Delete</th>
                    </tr>
                </thead>
                
<!--                <tfoot>
                    <tr>
                        <th scope="row">Price per month</th>
                        <td>$ 2.90</td>
                        <td>$ 5.90</td>
                        <td>$ 9.90</td>
                        <td>$ 14.90</td>
                    </tr>
                </tfoot>
-->                
                
                <tbody>
                    <!--<tr>
                        <th scope="row">Storage Space</th>
                        <td>512 MB</td>
                        <td>1 GB</td>
                        <td>2 GB</td>
                        <td>4 GB</td>
                    </tr>-->
               <?PHP				
               $atts = array(
              'width'      => '1200',
              'height'     => '250',
              'scrollbars' => 'yes',
              'status'     => 'yes',
              'resizable'  => 'yes',
              'screenx'    => '0',
              'screeny'    => '0'
            );
 $atts2 = array(
              'width'      => '1200',
              'height'     => '200',
              'scrollbars' => 'yes',
              'status'     => 'yes',
              'resizable'  => 'yes',
              'screenx'    => '0',
              'screeny'    => '0'
            );
//echo anchor_popup('news/local/123', 'Click Me!', $atts);
               // $field_name="id_tb_person";
               // $tb_check="tb_document";
               foreach($query->result() as $row)
				{
                                    $id_tb_person= $row->id_tb_person;
				    ?>
                    <tr>
                     <th scope="row"><?=$id_tb_person?></th>
                       <td>
                        <?PHP
                         
                         $prename=$row->prename;			                       
                         //$switch_prename = $this->tableQuerymodel->switch_prename($prename);
			 $switch_prename = $this->tbload->switch_prename($prename);
                         $name= $row->name;
			 //echo nbs(2);
			 $lastname= $row->lastname;                                                         
                         $totalname=$switch_prename.$name.nbs(2).$lastname;             
                         
                         //echo $id_tb_person;
                        // echo $tb_check;
                         
                         $check_rows= $this->check_num_rows($id_tb_person,$tb_check,$field_name);
                         
                         if(  $check_rows > 0 )
                         {
                            //echo anchor_popup('person/detail_person/'.$id_tb_person.'/'.$send_page,$totalname, $atts);   
                             //$link_operator="person/detail_person/";
                             echo anchor_popup($link_operator.$id_tb_person.'/'.$send_page,$totalname, $atts);                            
                         }
                         else
                         {
                             echo $totalname;
                         }
                        ?>
                       </td>
                        <td>
                        <?PHP
							 echo  $row->nickname;
                        ?>
                       </td>
                       <td>
                        <?PHP
							 echo  $row->id_peson;
                        ?>
                       </td>
                       <td>
                        <?PHP
							 echo  $row->id_passport;
                        ?>
                       </td>
                       <td>
                        <?PHP
							 echo  $row->id_code_person;
                        ?>
                       </td>
                       <td>
                           <?PHP
                           //$link_update=base_url()."index.php/person/update_tb_person/"; 
                           ?>
                           <a href="<?=$link_update?><?=$id_tb_person?>/<?=$send_page?>" ><img src="<?=base_url()?>icon/Apps-system-software-update-icon.png" width="30" ></a>
                       </td>
                       <td>                       
                           <a href="#" onclick="javascript:delete_confirm(<?=$id_tb_person?>,<?=$send_page?>);"><img src="<?=base_url()?>icon/Delete.png" width="30"></a>
                       </td>
                    </tr>
                    <?PHP
				}
				?>
<!--                    <tr>
                        <th scope="row">Bandwidth</th>
                        <td>50 GB</td>
                        <td>100 GB</td>
                        <td>150 GB</td>
                        <td>Unlimited</td>
                    </tr>
                    <tr>
                        <th scope="row">MySQL Databases</th>
                        <td>Unlimited</td>
                        <td>Unlimited</td>
                        <td>Unlimited</td>
                        <td>Unlimited</td>
                    </tr>
                    <tr>
                        <th scope="row">Setup</th>
                        <td>19.90 $</td>
                        <td>12.90 $</td>
                        <td>free</td>
                        <td>free</td>
                    </tr>
                    <tr>
                        <th scope="row">PHP 5</th>
                        <td><span class="check"></span></td>
                        <td><span class="check"></span></td>
                        <td><span class="check"></span></td>
                        <td><span class="check"></span></td>
                    </tr>
                    <tr>
                        <th scope="row">Ruby on Rails</th>
                        <td><span class="check"></span></td>
                        <td><span class="check"></span></td>
                        <td><span class="check"></span></td>
                        <td><span class="check"></span></td>
                    </tr>
-->                    
                </tbody>
            </table>
        </div>
		<?PHP
}//end
function  tb_visa_models_popup($query,$send_page,$link_delete)
	{//begin
	    //echo "testing";	
             $this->load->view('import_jqueryui');
  ?> 
       <!--<META HTTP-EQUIV="Refresh" CONTENT="20">-->
    <script>
  function  delete_confirm(id,send_page,link_delete)
  {
        if( confirm('Are you delete!!')== true )
        {
            //alert('t');
            //alert('link=' + link_delete + ',delete=' + id );
            //alert(''+ id );
           // window.location.assign("<?=base_url()?>index.php/eperience/delete_tb_experience/"+ id + "/" + send_page  );
            window.location.assign(''+ link_delete  + id + '/' + send_page );    
                /*
                  $(function(){  
                        $.post( "person/delete_relation_person/",{id_tb_relation_person:''+id});  
                     }); 
                */
           // window.close();   
        }
        else
        {
            //alert('no!');
            
        }
  }
</script>

<?PHP
			
               $atts = array(
              'width'      => '1200',
              'height'     => '400',
              'scrollbars' => 'yes',
              'status'     => 'yes',
              'resizable'  => 'yes',
              'screenx'    => '0',
              'screeny'    => '0'
            );
  /*             
 $atts2 = array(
              'width'      => '1200',
              'height'     => '200',
              'scrollbars' => 'yes',
              'status'     => 'yes',
              'resizable'  => 'yes',
              'screenx'    => '0',
              'screeny'    => '0'
            );
   */ 
   
//echo anchor_popup('news/local/123', 'Click Me!', $atts);

?>
           <!-- <h2><?=$fieldset?></h2>-->
            <table class="table1">
                <thead>
                    <tr>
                        <th></th>
                        <th scope="col" abbr="Starter">วันที่วีซ่า หมดอายุ (ใหม่)</th>
                        <th scope="col" abbr="Medium">จำนวนวันของวีซ่า</th>                       
                        <th scope="col" abbr="Deluxe">สถานที่ออกวีซ่า</th>
                        <th scope="col" abbr="Deluxe">วันที่วีซ่า หมดอายุ</th>
                        <th scope="col" abbr="Deluxe">วันที่ออกวีซ่า</th>
                         <th scope="col" abbr="Deluxe">วันที่รายงานตัวครั้งล่าสุด</th>
                        
                        <!--<th scope="col" abbr="Deluxe">Update</th>-->                    
                        <th scope="col" abbr="Deluxe">Delete</th>
                    </tr>
                </thead>
                
<!--                <tfoot>
                    <tr>
                        <th scope="row">Price per month</th>
                        <td>$ 2.90</td>
                        <td>$ 5.90</td>
                        <td>$ 9.90</td>
                        <td>$ 14.90</td>
                    </tr>
                </tfoot>
-->                
                
                <tbody>
                    <!--<tr>
                        <th scope="row">Storage Space</th>
                        <td>512 MB</td>
                        <td>1 GB</td>
                        <td>2 GB</td>
                        <td>4 GB</td>
                    </tr>-->
               <?PHP
                $path="upload/";
                $img="icon/doc1.jpg";
                $width="45";
                $width_hide="60";
                $img_hide="icon/not_found2.jpg";
				foreach($query->result() as $row)
				{
				   //$id_document=$row->id_document;
                                     $id_visa=$row->id_visa; //#dynamic
                                    ?>
                    <tr>
                     <th scope="row">                       
                                   <?=$id_visa?>                         
                     </th>
                       <td>
                        <?PHP
                              //echo $row->id_tb_person;
							 // $this->tableQuerymodel->switch_prename($row->id_tb_person);
							 // echo $row->name;
							 // echo nbs(2);
							//  echo  $row->lastname;
                 //$id_tb_relation_person=$row->id_tb_relation_person;
                        //$id_document=$row->id_document;    
                        //$doc_38_1=$row->doc_38_1;
                            // $this->tableQuerymodel->check_file_download($doc_38_1,$path,$img,$width,$img_hide,$width_hide);
                            echo $date_visa_expire_begin=$row->date_visa_expire_begin;
                             //$this->choice_talent($communication_skills);
                        ?>
                           
                       </td>
                       
                        <td>
                        <?PHP							 //echo  $row->nickname;
                              // $doc_passport=$row->doc_passport;
                              // $this->tableQuerymodel->check_file_download($doc_passport,$path,$img,$width,$img_hide,$width_hide);
                echo $count_date_visa=$row->count_date_visa;
                        ?>
                       </td>
                                
                       <td>
                         <?PHP  
                          echo $place_visa=$row->place_visa; 
                          //echo $date_pay;
                          ?>  
                       </td>
                       
                       <td>
                         <?PHP  
                         echo $date_visa_expire=$row->date_visa_expire; 
                         // echo $claim;
                          ?>  
                       </td>
                       
                       <td>
                         <?PHP  
                         echo $date_visa=$row->date_visa; 
                         // echo $other_social_security;
                          ?>  
                       </td>
                       
                         <td>
                         <?PHP  
                         echo $date_report=$row->date_report; 
                         // echo $other_social_security;
                          ?>  
                       </td>
                       
                       
                       
                       <td>
                           <a href="#" onclick="javascript:delete_confirm(<?=$id_visa?>,<?=$send_page?>,'<?=$link_delete?>');"><img src="<?=base_url()?>icon/Delete.png" width="30"></a>
                       </td>
                    </tr>
                    <?PHP
				}
				?>
<!--                    <tr>
                        <th scope="row">Bandwidth</th>
                        <td>50 GB</td>
                        <td>100 GB</td>
                        <td>150 GB</td>
                        <td>Unlimited</td>
                    </tr>
                    <tr>
                        <th scope="row">MySQL Databases</th>
                        <td>Unlimited</td>
                        <td>Unlimited</td>
                        <td>Unlimited</td>
                        <td>Unlimited</td>
                    </tr>
                    <tr>
                        <th scope="row">Setup</th>
                        <td>19.90 $</td>
                        <td>12.90 $</td>
                        <td>free</td>
                        <td>free</td>
                    </tr>
                    <tr>
                        <th scope="row">PHP 5</th>
                        <td><span class="check"></span></td>
                        <td><span class="check"></span></td>
                        <td><span class="check"></span></td>
                        <td><span class="check"></span></td>
                    </tr>
                    <tr>
                        <th scope="row">Ruby on Rails</th>
                        <td><span class="check"></span></td>
                        <td><span class="check"></span></td>
                        <td><span class="check"></span></td>
                        <td><span class="check"></span></td>
                    </tr>
-->                    
                </tbody>
            </table>
        </div>
		<?PHP
}//end
##passport
function  tb_passport_models_link($query,$send_page,$field_set,$field_name,$tb_check,$link_operator,$link_update,$link_delete)
	{//begin
	    //echo "testing";
?>		
<script>
  function  delete_confirm(id,send_page)
  {
        if( confirm('Are you delete!!')== true )
        {
            //alert('yes');
           <?PHP $link_delete=base_url()."index.php/person/delete_tb_person/"; ?>
            window.location.assign("<?=$link_delete?>"+ id + "/" + send_page  );
        }
        else
        {
            // alert('no!');
            
        }
  }
</script>
	
		<div id="content">
            <a class="back" href=""></a>
            <span class="scroll"></span>
            <p class="head">DATABASE System  Report</p>
            <h1>HN BASE System</h1>
            <h2><?=$field_set?></h2>
            <table class="table1">
                <thead>
                    <tr>
                        <th></th>
                        <th scope="col" abbr="Starter">(ชื่อ - นามสกุล) Name - Lastname</th>
                        <th scope="col" abbr="Medium">Nickname</th>
                        <th scope="col" abbr="Business">ID(เอกสารประกอบ)</th>
                        <th scope="col" abbr="Deluxe">Passport(เลขที่พาสปอร์ต)</th>
                        <th scope="col" abbr="Deluxe">รหัสพนักงาน</th>
                         <th scope="col" abbr="Deluxe">Update</th>
                         <th scope="col" abbr="Deluxe">Delete</th>
                    </tr>
                </thead>
                
<!--                <tfoot>
                    <tr>
                        <th scope="row">Price per month</th>
                        <td>$ 2.90</td>
                        <td>$ 5.90</td>
                        <td>$ 9.90</td>
                        <td>$ 14.90</td>
                    </tr>
                </tfoot>
-->                
                
                <tbody>
                    <!--<tr>
                        <th scope="row">Storage Space</th>
                        <td>512 MB</td>
                        <td>1 GB</td>
                        <td>2 GB</td>
                        <td>4 GB</td>
                    </tr>-->
               <?PHP				
               $atts = array(
              'width'      => '1200',
              'height'     => '250',
              'scrollbars' => 'yes',
              'status'     => 'yes',
              'resizable'  => 'yes',
              'screenx'    => '0',
              'screeny'    => '0'
            );
 $atts2 = array(
              'width'      => '1200',
              'height'     => '200',
              'scrollbars' => 'yes',
              'status'     => 'yes',
              'resizable'  => 'yes',
              'screenx'    => '0',
              'screeny'    => '0'
            );
//echo anchor_popup('news/local/123', 'Click Me!', $atts);
               // $field_name="id_tb_person";
               // $tb_check="tb_document";
               foreach($query->result() as $row)
				{
                                    $id_tb_person= $row->id_tb_person;
				    ?>
                    <tr>
                     <th scope="row"><?=$id_tb_person?></th>
                       <td>
                        <?PHP
                         
                         $prename=$row->prename;			                       
                         $switch_prename = $this->tbload->switch_prename($prename);
			 $name= $row->name;
			 //echo nbs(2);
			 $lastname= $row->lastname;                                                         
                         $totalname=$switch_prename.$name.nbs(2).$lastname;             
                         
                         //echo $id_tb_person;
                        // echo $tb_check;
                         
                         $check_rows= $this->check_num_rows($id_tb_person,$tb_check,$field_name);
                         
                         if(  $check_rows > 0 )
                         {
                            //echo anchor_popup('person/detail_person/'.$id_tb_person.'/'.$send_page,$totalname, $atts);   
                             //$link_operator="person/detail_person/";
                             echo anchor_popup($link_operator.$id_tb_person.'/'.$send_page,$totalname, $atts);                            
                         }
                         else
                         {
                             echo $totalname;
                         }
                        ?>
                       </td>
                        <td>
                        <?PHP
							 echo  $row->nickname;
                        ?>
                       </td>
                       <td>
                        <?PHP
							 echo  $row->id_peson;
                        ?>
                       </td>
                       <td>
                        <?PHP
							 echo  $row->id_passport;
                        ?>
                       </td>
                       <td>
                        <?PHP
							 echo  $row->id_code_person;
                        ?>
                       </td>
                       <td>
                           <?PHP
                           //$link_update=base_url()."index.php/person/update_tb_person/"; 
                           ?>
                           <a href="<?=$link_update?><?=$id_tb_person?>/<?=$send_page?>" ><img src="<?=base_url()?>icon/Apps-system-software-update-icon.png" width="30" ></a>
                       </td>
                       <td>                       
                           <a href="#" onclick="javascript:delete_confirm(<?=$id_tb_person?>,<?=$send_page?>);"><img src="<?=base_url()?>icon/Delete.png" width="30"></a>
                       </td>
                    </tr>
                    <?PHP
				}
				?>
<!--                    <tr>
                        <th scope="row">Bandwidth</th>
                        <td>50 GB</td>
                        <td>100 GB</td>
                        <td>150 GB</td>
                        <td>Unlimited</td>
                    </tr>
                    <tr>
                        <th scope="row">MySQL Databases</th>
                        <td>Unlimited</td>
                        <td>Unlimited</td>
                        <td>Unlimited</td>
                        <td>Unlimited</td>
                    </tr>
                    <tr>
                        <th scope="row">Setup</th>
                        <td>19.90 $</td>
                        <td>12.90 $</td>
                        <td>free</td>
                        <td>free</td>
                    </tr>
                    <tr>
                        <th scope="row">PHP 5</th>
                        <td><span class="check"></span></td>
                        <td><span class="check"></span></td>
                        <td><span class="check"></span></td>
                        <td><span class="check"></span></td>
                    </tr>
                    <tr>
                        <th scope="row">Ruby on Rails</th>
                        <td><span class="check"></span></td>
                        <td><span class="check"></span></td>
                        <td><span class="check"></span></td>
                        <td><span class="check"></span></td>
                    </tr>
-->                    
                </tbody>
            </table>
        </div>
		<?PHP
}//end
function  tb_passport_models_popup($query,$send_page,$link_delete)
	{//begin
	    //echo "testing";	
             $this->load->view('import_jqueryui');
  ?> 
       <!--<META HTTP-EQUIV="Refresh" CONTENT="20">-->
    <script>
  function  delete_confirm(id,send_page,link_delete)
  {
        if( confirm('Are you delete!!')== true )
        {
            //alert('t');
            //alert('link=' + link_delete + ',delete=' + id );
            //alert(''+ id );
           // window.location.assign("<?=base_url()?>index.php/eperience/delete_tb_experience/"+ id + "/" + send_page  );
            window.location.assign(''+ link_delete  + id + '/' + send_page );    
                /*
                  $(function(){  
                        $.post( "person/delete_relation_person/",{id_tb_relation_person:''+id});  
                     }); 
                */
           // window.close();   
        }
        else
        {
            //alert('no!');
            
        }
  }
</script>

<?PHP
			
               $atts = array(
              'width'      => '1200',
              'height'     => '400',
              'scrollbars' => 'yes',
              'status'     => 'yes',
              'resizable'  => 'yes',
              'screenx'    => '0',
              'screeny'    => '0'
            );
  /*             
 $atts2 = array(
              'width'      => '1200',
              'height'     => '200',
              'scrollbars' => 'yes',
              'status'     => 'yes',
              'resizable'  => 'yes',
              'screenx'    => '0',
              'screeny'    => '0'
            );
   */ 
   
//echo anchor_popup('news/local/123', 'Click Me!', $atts);

?>
           <!-- <h2><?=$fieldset?></h2>-->
            <table class="table1">
                <thead>
                    <tr>
                        <th></th>
                        <th scope="col" abbr="Starter">วันที่ passport หมดอายุ (ใหม่)</th>
                        <th scope="col" abbr="Medium">จำนวนวันของ passport</th>                       
                        <th scope="col" abbr="Deluxe">สถานที่ออกpassport</th>
                        <th scope="col" abbr="Deluxe">วันที่passport หมดอายุ</th>
                        <th scope="col" abbr="Deluxe">วันที่ออกpassport</th>
                         <th scope="col" abbr="Deluxe">วันที่รายงานตัวครั้งล่าสุด</th>
                        
                        <!--<th scope="col" abbr="Deluxe">Update</th>-->                    
                        <th scope="col" abbr="Deluxe">Delete</th>
                    </tr>
                </thead>
                
<!--                <tfoot>
                    <tr>
                        <th scope="row">Price per month</th>
                        <td>$ 2.90</td>
                        <td>$ 5.90</td>
                        <td>$ 9.90</td>
                        <td>$ 14.90</td>
                    </tr>
                </tfoot>
-->                
                
                <tbody>
                    <!--<tr>
                        <th scope="row">Storage Space</th>
                        <td>512 MB</td>
                        <td>1 GB</td>
                        <td>2 GB</td>
                        <td>4 GB</td>
                    </tr>-->
               <?PHP
                $path="upload/";
                $img="icon/doc1.jpg";
                $width="45";
                $width_hide="60";
                $img_hide="icon/not_found2.jpg";
				foreach($query->result() as $row)
				{
				   //$id_document=$row->id_document;
                                     $id_passport=$row->id_passport; //#dynamic
                                    ?>
                    <tr>
                     <th scope="row">                       
                                   <?=$id_passport?>                         
                     </th>
                       <td>
                        <?PHP
                              //echo $row->id_tb_person;
							 // $this->tableQuerymodel->switch_prename($row->id_tb_person);
							 // echo $row->name;
							 // echo nbs(2);
							//  echo  $row->lastname;
                 //$id_tb_relation_person=$row->id_tb_relation_person;
                        //$id_document=$row->id_document;    
                        //$doc_38_1=$row->doc_38_1;
                            // $this->tableQuerymodel->check_file_download($doc_38_1,$path,$img,$width,$img_hide,$width_hide);
                            echo $date_passport_expire_begin=$row->date_passport_expire_begin;
                             //$this->choice_talent($communication_skills);
                        ?>
                           
                       </td>
                       
                        <td>
                        <?PHP							 //echo  $row->nickname;
                              // $doc_passport=$row->doc_passport;
                              // $this->tableQuerymodel->check_file_download($doc_passport,$path,$img,$width,$img_hide,$width_hide);
                echo $count_date_passport=$row->count_date_passport;
                        ?>
                       </td>
                                
                       <td>
                         <?PHP  
                          echo $place_passport=$row->place_passport; 
                          //echo $date_pay;
                          ?>  
                       </td>
                       
                       <td>
                         <?PHP  
                         echo $date_passport_expire=$row->date_passport_expire; 
                         // echo $claim;
                          ?>  
                       </td>
                       
                       <td>
                         <?PHP  
                         echo $date_passport=$row->date_passport; 
                         // echo $other_social_security;
                          ?>  
                       </td>
                       
                         <td>
                         <?PHP  
                         echo $date_report=$row->date_report; 
                         // echo $other_social_security;
                          ?>  
                       </td>
                       
                       
                       
                       <td>
                           <a href="#" onclick="javascript:delete_confirm(<?=$id_passport?>,<?=$send_page?>,'<?=$link_delete?>');"><img src="<?=base_url()?>icon/Delete.png" width="30"></a>
                       </td>
                    </tr>
                    <?PHP
				}
				?>
<!--                    <tr>
                        <th scope="row">Bandwidth</th>
                        <td>50 GB</td>
                        <td>100 GB</td>
                        <td>150 GB</td>
                        <td>Unlimited</td>
                    </tr>
                    <tr>
                        <th scope="row">MySQL Databases</th>
                        <td>Unlimited</td>
                        <td>Unlimited</td>
                        <td>Unlimited</td>
                        <td>Unlimited</td>
                    </tr>
                    <tr>
                        <th scope="row">Setup</th>
                        <td>19.90 $</td>
                        <td>12.90 $</td>
                        <td>free</td>
                        <td>free</td>
                    </tr>
                    <tr>
                        <th scope="row">PHP 5</th>
                        <td><span class="check"></span></td>
                        <td><span class="check"></span></td>
                        <td><span class="check"></span></td>
                        <td><span class="check"></span></td>
                    </tr>
                    <tr>
                        <th scope="row">Ruby on Rails</th>
                        <td><span class="check"></span></td>
                        <td><span class="check"></span></td>
                        <td><span class="check"></span></td>
                        <td><span class="check"></span></td>
                    </tr>
-->                    
                </tbody>
            </table>
        </div>
		<?PHP
}//end

function  form_search($tb_check)//สำหรับการค้นหาชื่อของพนักงาน
{    
     echo form_open('home/search_person'); 
     ?>
     สืบค้นข้อมูลจาก ชื่อพนักงาน : 
     <input type="text" name="id_tb_person"  id="id_tb_person" class="example6"  maxlength="20"  style="width:50%"  />
     <!--<input type="hidden" name="tb_check" id="tb_check" value="tb_person" />-->
     <input type="hidden" name="tb_check" id="tb_check" value="<?=$tb_check?>" />
     <button id="search_person" type="submit">SEARCH</button>  
     <?php
      form_close('');       
}

//## report  
function  tb_report_models_link($query,$send_page,$link_report)
	{//begin
	    //echo "testing";
?>		
<script>
  function  delete_confirm(id,send_page)
  {
        if( confirm('Are you delete!!')== true )
        {
            //alert('yes');
            window.location.assign("<?=base_url()?>index.php/person/delete_tb_person/"+ id + "/" + send_page  );
        }
        else
        {
            // alert('no!');
            
        }
  }
</script>
	
		<div id="content">
            <a class="back" href=""></a>
            <span class="scroll"></span>
            <p class="head">DATABASE System  Report</p>
            <h1>HN BASE System</h1>
            <h2>แสดงข้อมูลของประวัติของพนักงาน</h2>
            <table class="table1">
                <thead>
                    <tr>
                        <th></th>
                        <th scope="col" abbr="Starter">(ชื่อ - นามสกุล) Name - Lastname</th>
                        <th>Report</th>
                        <!--
                        <th scope="col" abbr="Medium">Nickname</th>
                        <th scope="col" abbr="Business">ID(เอกสารประกอบ)</th>
                        <th scope="col" abbr="Deluxe">Passport(เลขที่พาสปอร์ต)</th>
                        <th scope="col" abbr="Deluxe">รหัสพนักงาน</th>
                         <th scope="col" abbr="Deluxe">Update</th>
                         <th scope="col" abbr="Deluxe">Delete</th>
                        -->
                        
                        
                    </tr>
                </thead>
                
<!--                <tfoot>
                    <tr>
                        <th scope="row">Price per month</th>
                        <td>$ 2.90</td>
                        <td>$ 5.90</td>
                        <td>$ 9.90</td>
                        <td>$ 14.90</td>
                    </tr>
                </tfoot>
-->                
                
                <tbody>
                    <!--<tr>
                        <th scope="row">Storage Space</th>
                        <td>512 MB</td>
                        <td>1 GB</td>
                        <td>2 GB</td>
                        <td>4 GB</td>
                    </tr>-->
               <?PHP				
               $atts = array(
              'width'      => '1200',
              'height'     => '250',
              'scrollbars' => 'yes',
              'status'     => 'yes',
              'resizable'  => 'yes',
              'screenx'    => '0',
              'screeny'    => '0'
            );
 $atts2 = array(
              'width'      => '1200',
              'height'     => '200',
              'scrollbars' => 'yes',
              'status'     => 'yes',
              'resizable'  => 'yes',
              'screenx'    => '0',
              'screeny'    => '0'
            );
//echo anchor_popup('news/local/123', 'Click Me!', $atts);
                $field_name="id_tb_relation_person";
                $tb_check="tb_relation_person";
               foreach($query->result() as $row)
				{
                                    $id_tb_person= $row->id_tb_person;
				    ?>
                    <tr>
                     <th scope="row"><?=$id_tb_person?></th>
                       <td>
                        <?PHP
                         
                         $prename=$row->prename;			                       
                         //$switch_prename = $this->tableQuerymodel->switch_prename($prename);
                         $switch_prename = $this->tbload->switch_prename($prename);
			 $name= $row->name;
			 //echo nbs(2);
			 $lastname= $row->lastname;                                                         
                         $totalname=$switch_prename.$name.nbs(2).$lastname;             
                         $check_rows= $this->check_num_rows($id_tb_person,$tb_check,$field_name);
                         if(  $check_rows > 0 )
                         {
                            echo anchor_popup('person/detail_person/'.$id_tb_person.'/'.$send_page,$totalname, $atts);   
                         }
                         else
                         {
                             echo $totalname;
                         }
                        ?>
                       </td>
                       <td>
                           <!--
                           <a href="../../../../fpdf16/report.php/id_tb_person=<?=$id_tb_person?>" target="_blank"><img src="<?=base_url()?>icon/rp1.jpg" width="30" ></a>                            
                           -->
                           <a href="<?=$link_report?>?id_tb_person=<?=$id_tb_person?>" target="_blank"><img src="<?=base_url()?>icon/rp1.jpg" width="30" ></a>
                           
                       </td>
                       
                       <!--
                        <td>
                        <?PHP
							 echo  $row->nickname;
                        ?>
                       </td>
                       <td>
                        <?PHP
							 echo  $row->id_peson;
                        ?>
                       </td>
                       <td>
                        <?PHP
							 echo  $row->id_passport;
                        ?>
                       </td>
                       <td>
                        <?PHP
							 echo  $row->id_code_person;
                        ?>
                       </td>
                       <td>
                           <a href="<?=base_url()?>index.php/person/update_tb_person/<?=$id_tb_person?>/<?=$send_page?>" ><img src="<?=base_url()?>icon/Apps-system-software-update-icon.png" width="30" ></a>
                       </td>
                       <td>
                           <a href="#" onclick="javascript:delete_confirm(<?=$id_tb_person?>,<?=$send_page?>);"><img src="<?=base_url()?>icon/Delete.png" width="30"></a>
                       </td>
                       -->
                       
                    </tr>
                    <?PHP
				}
				?>
<!--                    <tr>
                        <th scope="row">Bandwidth</th>
                        <td>50 GB</td>
                        <td>100 GB</td>
                        <td>150 GB</td>
                        <td>Unlimited</td>
                    </tr>
                    <tr>
                        <th scope="row">MySQL Databases</th>
                        <td>Unlimited</td>
                        <td>Unlimited</td>
                        <td>Unlimited</td>
                        <td>Unlimited</td>
                    </tr>
                    <tr>
                        <th scope="row">Setup</th>
                        <td>19.90 $</td>
                        <td>12.90 $</td>
                        <td>free</td>
                        <td>free</td>
                    </tr>
                    <tr>
                        <th scope="row">PHP 5</th>
                        <td><span class="check"></span></td>
                        <td><span class="check"></span></td>
                        <td><span class="check"></span></td>
                        <td><span class="check"></span></td>
                    </tr>
                    <tr>
                        <th scope="row">Ruby on Rails</th>
                        <td><span class="check"></span></td>
                        <td><span class="check"></span></td>
                        <td><span class="check"></span></td>
                        <td><span class="check"></span></td>
                    </tr>
-->                    
                </tbody>
            </table>
        </div>
		<?PHP
}//end

##//experince//
function  tb_member_models_link($field_set,$tb_user)
	{//begin
	    //echo "testing";
?>		
<script>
  function  delete_confirm(id)
  {
        if( confirm('Are you delete!!')== true )
        {
            //alert('yes');
           <? $link_delete=base_url()."index.php/member/delete/"; ?>
            window.location.assign("<?=$link_delete?>"+ id + "/" + send_page  );
        }
        else
        {
            // alert('no!');
            
        }
  }
</script>	
	    <div id="content">
            <a class="back" href=""></a>
            <span class="scroll"></span>
            <p class="head">DATABASE System  Report</p>
            <h1>HN BASE System</h1>
            <h2><?=$field_set?></h2>
            <!--<h2>ผู้ดูแลระบบ (Administrator)</h2>-->
            <table class="table1">
                <thead>
                    <tr>
                        <th></th>
                        <th scope="col" abbr="Starter">(ชื่อ - นามสกุล) Name - Lastname</th>
                        
                        <th scope="col" abbr="Business">User</th>
                        
                        <th scope="col" abbr="Deluxe">Email</th>
                         <th scope="col" abbr="Deluxe">Update/Detail</th>
                         <th scope="col" abbr="Deluxe">Delete</th>
                    </tr>
                </thead>               
           <tbody>
           <?PHP				
               $atts = array(
              'width'      => '600',
              'height'     => '400',
              'scrollbars' => 'yes',
              'status'     => 'yes',
              'resizable'  => 'yes',
              'screenx'    => '0',
              'screeny'    => '0'
            );
 $atts2 = array(
              'width'      => '1200',
              'height'     => '200',
              'scrollbars' => 'yes',
              'status'     => 'yes',
              'resizable'  => 'yes',
              'screenx'    => '0',
              'screeny'    => '0'
            );
        $str='select * from '.$tb_user.' ;';
        $query=$this->db->query($str);
        //$check_rows= $this->check_num_rows($id_tb_person,$tb_check,$field_name);
        $check_row=$query->num_rows();
        if( is_int($check_row) && $check_row> 0 )
        {//begin
            foreach($query->result() as $row )
            {
                $id_user=$row->id_user; 
                $name=$row->name;
                $lastname=$row->lastname;
                $user=$row->user;
                $email=$row->email;
                ?>
               <tr>
                   <td><?=$id_user?></td>
                   <td><?=$name?><?=nbs(2)?><?=$lastname?></td>
                   <td><?=$user?></td>
                   <td><?=$email?></td>
                   <td>                                                                
                       <?PHP
                       $img_link="<img src='".base_url()."/images/to-do.png' >";
                       echo anchor_popup('member/detail/'.$id_user, $img_link , $atts);
                       ?>
                   </td>
                   <td> 
                      <?PHP
                       $img_del_link="<img src='".base_url()."/icon/delete-file.jpg' width='30'>";
                       //echo anchor_popup('member/delete/', $img_del_link , $atts2);
                       ?>                    
                       <a href="<?=base_url()?>index.php/member/delete/<?=$id_user?>" onclick="delete_confirm(<?=$id_user?>)" ><?=$img_del_link?></a>
                   </td>
                   
               </tr>
                <?PHP
            }
        }//end
        ?>
                </tbody>
            </table>
        </div>
		<?PHP
}//end

	}//end Class
	
<?php   if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class TableQuerymodel extends  CI_Model {

    function TableQuerymodel()  //model  การ query ทั้งหมด
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
               <?
				foreach($query->result() as $row)
				{
				    ?>
                    <tr>
                     <th scope="row"></th>
                       <td>
                        <?PHP
                              //echo $row->id_tb_person;
							  $this->tableQuerymodel->switch_prename($row->id_tb_person);
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
		   echo "Mr.(นาย)";
		   break;
		}		
		case 2:
		{
		   echo "Ms.(นางสาว)";
		   break;
		}
		case 3:
		{
		   echo "Mrs.(นาง)";
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
                <?
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
               <?
				foreach($query->result() as $row)
				{
				    ?>
                    <tr>
                     <th scope="row"></th>
                       <td>
                        <?PHP
                              //echo $row->id_tb_person;
							 // $this->tableQuerymodel->switch_prename($row->id_tb_person);
							 // echo $row->name;
							 // echo nbs(2);
							//  echo  $row->lastname;
                        ?>
                       </td>
                        <td>
                        <?PHP
							 //echo  $row->nickname;
                        ?>
                       </td>
                       <td>
                        <?PHP
							// echo  $row->id_peson;
                        ?>
                       </td>
                       <td>
                        <?PHP
							// echo  $row->id_passport;
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
	
	}//end Class
?>	
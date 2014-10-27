<?php   if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Selectmodel extends  CI_Model {

    function Selectmodel()  //model  การ query ทั้งหมด
    {
        //parent::CI_Model();
		   parent::__construct();
    }
    function  prename_select()//คำนำหน้าชื่อ
    {
          //$arr=array(1=>'boy(เด็กชาย)',2=>'Mr.(นาย)',3=>'girl(เด็กหญิง)',4=>'Ms.(นางสาว)',5=>'Mrs.(นาง)');
          $arr=array(1=>'Mr.(นาย)',2=>'Ms.(นางสาว)',3=>'Mrs.(นาง)');
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
    
    function  update_prename_select($id)//คำนำหน้าชื่อ
    {
          //$arr=array(1=>'boy(เด็กชาย)',2=>'Mr.(นาย)',3=>'girl(เด็กหญิง)',4=>'Ms.(นางสาว)',5=>'Mrs.(นาง)');
          $arr=array(1=>'Mr.(นาย)',2=>'Ms.(นางสาว)',3=>'Mrs.(นาง)');
        ?>
            <!--<select name="prename"> --> 
            <?PHP
          foreach($arr as $key=>$value)
          {   
            if( $id == $key )
            {
            ?>
            <option value="<?=$id?>" selected><?=$this->switch_prename($id)?></option>  
             <?PHP
            }
            else
            {
              ?>   
                <option value="<?=$key?>" ><?=$key?>.<?=$value?></option>
              <?PHP
            } 
          }              
             ?>
       
            <!--</select> -->  
                <?PHP
    }

    function switch_prename($id)
    {
          if(!empty($id))
          {
              switch ($id) //1=>'Mr.(นาย)',2=>'Ms.(นางสาว)',3=>'Mrs.(นาง)'
              {
                 case 1:
                 {
                 echo  "1.Mr.";
                 break;
                 }
                 case 2:
                 { 
                 echo  "2.Ms.";
                     break;
                 }
                 case 3:
                 {
                 echo  "3.Mrs.";
                     break;
                 }   
              }
          }
    }
  function sex_select()//คำนำหน้าชื่อ
    {
        $arr=array(1=>'ชาย',2=>'หญิง')
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

  function permiss_select1()//ข้อมูลการขออนุญาติทำงาน ออกให้โดย
    {
        $arr=array(1=>'ชาย',2=>'หญิง')
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

    
    
}
    ?>
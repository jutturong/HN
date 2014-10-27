<?PHP if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if ( ! function_exists('DMY_thai_convert'))
{//if
	function DMY_thai_convert($DMY)
	{
		if(  strlen($DMY) > 0  &&  $DMY != ""   )
		{  //if     
						 $ex=explode(' ',$DMY);
						 $v_date=   $ex[0];
						 $v_time=$ex[1];
						  $ex_date=explode('-',$v_date);
						  $convert_year=$ex_date[0]+543;
						  $DMY_format=  "".$ex_date[2].'/'.$ex_date[1].'/'.$convert_year.' Time : '.$v_time;
						  if  ( strlen($DMY_format) > 0 )
						  {
							   return     $DMY_format; 
						  }
		 }	//endif  
	}
}//end if

if ( ! function_exists('convert_eng_format')) //ใช่้แปลงจาก DB ไปเป็น dd-mm-yyyy
{
      function  convert_eng_format($dmy)
      { //begin
          if( !empty($dmy) )
          {
              $ex=explode('-',$dmy);
              return $ex[2].'/'.$ex[1].'/'.$ex[0];
          }
      } //end
}

if ( ! function_exists('convert_thai_DMY')) //ใช่้แปลงจาก date Eng เป็น date Thai
{
	function  convert_thai_DMY($b_dmy)
	{
		   if( strlen($b_dmy) > 0 )  //รูปแบบที่ได้มาคือ  1980-05-17 
		   {
		      // echo  $b_dmy;
			  // echo br();
			     $ex=explode('-',$b_dmy);
                                              if(  $ex[0] != "0000"   )
                                              {   
				 $con_y=$ex[0]+543;
				// return  $con_y.'-'.$ex[1].'-'.$ex[0];   //แปลงกลับให้เป็น format แบบไทย
                                                
				return    $ex[2].'-'.$ex[1].'-'.$con_y;
                                              }
                                              else
                                              {
                                                  return  "";
                                              }
		   }
     }
}	 


if ( ! function_exists('convert_eng_DMY')) //ใช้แปลงจาก Thai to Eng
{
	function  convert_eng_DMY($b_dmy)
	{
		   if( strlen($b_dmy) > 0 )  //รูปแบบที่ได้มาคือ  1980-05-17 
		   {
		        
                                  //echo  $b_dmy;
				 $ex=explode('-',$b_dmy);
                                // echo  $ex[2];
                                 //echo br();
                                 if( $ex[2] !=  "0000"   )
                                 {
				 $con_y= $ex[2]-543;
				// $con_y= $ex[2];
				 return   $con_y.'-'.$ex[1].'-'.$ex[0];   //แปลงกลับให้เป็น format แบบไทย
                                 }
                                 else
                                 {
                                     return  "";
                                 }
                                 
		   }
     }
}	 


if ( ! function_exists('check_max_year_thai')) //function =>format คือ  //ใช้กับ format 1980-05-17
{
	function check_max_year_thai($b_dmy)
	{
           echo  $b_dmy;
		   //echo "T";
		   echo br();
		   $arr_ex=explode('-',$b_dmy);
		    echo  $arr_ex[0];
			
			//echo br();
			
//			  $y_end=date("Y");   
//			  $y_thai=$y_end+543;
//			  if(   $y_va  <= $y_thai )
//			  {
//			      //return true;
//				  echo "T";
//			  }    
//			  else
//			  {
//			     //return false;
//				 echo  "F";
//			  }   
			  
			  
			   
	}
}//end if

if ( ! function_exists('calc_ofset_page'))  // function  สำหรับการคำนวณหน้า เวลาเปลี่ยนหน้า  ใช้คำนวณ ค่า  ofset ใน limit
{//if
       function   calc_ofset_page($page,$list_limit)
	   {
	   				####==== ตัวแปรที่ใช้
					// $page=4; //หน้าที่ส่งมา
					 // $list_limit=10; //จำนวนของ รายการต่อหน้าที่ต้องการแสดง  limit
					####==== ตัวแปรที่ใช้
					  $reng_limit=$list_limit-1; // คำนวณหารายการ offset โดยเอา    $list_limit-1  
					   $x=($page*$list_limit);
					   $ofset=$x-$reng_limit;
					  return    $ofset;
	   }
}

if ( ! function_exists('DMY_format'))  // function  สำหรับการคำนวณหน้า เวลาเปลี่ยนหน้า  ใช้คำนวณ ค่า  ofset ใน limit
{//if
	   function   DMY_format($dmy)
	   {
                       //  echo  $dmy;
					if( strlen($dmy) > 0  )
					{
						       $ex=explode('-',$dmy);
							   $con_y=$ex[2]-543;
							   return    $con_y.'-'.$ex[1].'-'.$ex[0];
					}		   
	   }
}


if ( ! function_exists('DMY_format2'))  // จัดรูปแบบให้เป็น 1947-05-15
{//if
	   function   DMY_format2($dmy)
	   {
                       //  echo  $dmy;
					if( strlen($dmy) > 0  )
					{
						       $ex=explode('-',$dmy);
							   $con_y=$ex[2]-543;
							   return    $con_y.'-'.$ex[1].'-'.$ex[0];
					}		   
	   }
}

if ( ! function_exists('DMY_format3'))  // รับข้อมูลมาในแบบ 01/14/2014 จัดให้เป็น 2014-01-14
{//if
	   function   DMY_format3($dmy)
	   {
                       //  echo  $dmy;
					if( strlen($dmy) > 0  )
					{
						       $ex=explode('/',$dmy);
							   //$con_y=$ex[2]-543;
							//echo    $con_y.'-'.$ex[1].'-'.$ex[0];
                                                       return $ex[2].'-'.$ex[0].'-'.$ex[1];
					}		   
	   }
}




if ( ! function_exists('DATE_TIME'))  // function  สำหรับการคำนวณหน้า เวลาเปลี่ยนหน้า  ใช้คำนวณ ค่า  ofset ใน limit
{//if
       function   DATE_TIME()
	   {
   			$datestring = "%Y-%m-%d %H:%i:%s";
		    $time = time();
	        return   mdate($datestring,$time);
	   }
}


//######## ------------------------  window.open  -------------------------------------------
if ( ! function_exists('MY_anchor_popup'))
{
	function MY_anchor_popup($uri = '', $title = '', $attributes = FALSE)
	{
		$title = (string) $title;

		$site_url = ( ! preg_match('!^\w+://! i', $uri)) ? site_url($uri) : $uri;

		if ($title == '')
		{
			$title = $site_url;
		}

		if ($attributes === FALSE)
		{
			return "<a href='javascript:void(0);' onclick=\"window.open('".$site_url."', '_blank');\">".$title."</a>";
		}

		if ( ! is_array($attributes))
		{
			$attributes = array();
		}

		foreach (array('width' => '800', 'height' => '600', 'scrollbars' => 'no', 'status' => 'no', 'resizable' => 'yes', 'screenx' => '0', 'screeny' => '0', ) as $key => $val)
		{
			$atts[$key] = ( ! isset($attributes[$key])) ? $val : $attributes[$key];
			unset($attributes[$key]);
		}

		if ($attributes != '')
		{
			$attributes = _parse_attributes($attributes);
		}

		return "<a href='javascript:void(0);' onclick=\"window.open('".$site_url."', '_blank', '"._parse_attributes($atts, TRUE)."');\"$attributes>".$title."</a>";
	}
} //end if

if ( ! function_exists('MY_strpos'))  // ใช้สำหรับการค้นหาแล้ว  link ต่อ   
{//if
       function   MY_strpos_link($tx)  //ใช้สำหรับการค้นหาแล้ว  link ต่อ
	   {
			     $pos1=strpos($tx,'http://');
				 if(   is_numeric($pos1 )  )
				 {
				       ?>
					             <a href="<?=$tx?>" target="_blank"><?=$tx?></a>
                       <?php
				 }
				 else
				 {
                    		    echo    $tx;
				 }
	   }
}//end if

if ( ! function_exists('MY_cal_date_expire'))  // คำนวณจำนวนวันทั้งหมด  
{//if
       function   MY_cal_date_expire($date_visa_expire_begin,$date_visa_expire)  
	   {//begin
           
              if(  !empty($date_visa_expire_begin)  &&  !empty($date_visa_expire_begin)  )
              {
                   // $con1=  explode('/',$date_visa_expire_begin);
                    $con1=  explode('-',$date_visa_expire_begin);
                   // $con2= $con1[2].'/'.$con1[0].'/'.$con1[1];
                 
                      $con2= $con1[0].'-'.$con1[1].'-'.$con1[2];
                    $startTimeStamp =  strtotime($con2);

                    //$con_end1=  explode('/',$date_visa_expire);
                    $con_end1=  explode('-',$date_visa_expire);
                     
                    //$con_end2=$con_end1[2].'/'.$con_end1[0].'/'.$con_end1[1];
                   // $con_end2=$con_end1[2].'-'.$con_end1[0].'-'.$con_end1[1];
                   $con_end2=$con_end1[0].'-'.$con_end1[1].'-'.$con_end1[2];
                     
                    $endTimeStamp =  strtotime($con_end2);

                    $timeDiff=abs($endTimeStamp - $startTimeStamp);

                    $numberDays = $timeDiff/86400;  // 86400 seconds in one day
                   // return  $count_date=round($numberDays); //ของเดิม
                    $count_date=round($numberDays); //ของเดิม
                   return check_90day($count_date);
              }
             
	   }//end
}//end if

if ( ! function_exists('MY_cal_date_expire_concept'))  // คำนวณจำนวนวันทั้งหมด  
{//if  
function   MY_cal_date_expire_concept($date_visa_expire_begin,$date_visa_expire)  
	   {//begin
           
              if(  !empty($date_visa_expire_begin)  &&  !empty($date_visa_expire_begin)  )
              {
                   // $con1=  explode('/',$date_visa_expire_begin);
                    $con1=  explode('-',$date_visa_expire_begin);
                   // $con2= $con1[2].'/'.$con1[0].'/'.$con1[1];
                 
                      $con2= $con1[0].'-'.$con1[1].'-'.$con1[2];
                    $startTimeStamp =  strtotime($con2);

                    //$con_end1=  explode('/',$date_visa_expire);
                    $con_end1=  explode('-',$date_visa_expire);
                     
                    //$con_end2=$con_end1[2].'/'.$con_end1[0].'/'.$con_end1[1];
                   // $con_end2=$con_end1[2].'-'.$con_end1[0].'-'.$con_end1[1];
                    
                    
                   $con_end2=$con_end1[0].'-'.$con_end1[1].'-'.$con_end1[2];
                     
                    $endTimeStamp =  strtotime($con_end2);

                   // $timeDiff=abs($endTimeStamp - $startTimeStamp); //ของเดิม
                    $timeDiff= $endTimeStamp - $startTimeStamp;
                    
                    $numberDays = $timeDiff/86400;  // 86400 seconds in one day
                    return  $count_date=round($numberDays); //ของเดิม
                   
                    
            
                 
                 /*   
                    $count_date=round($numberDays); //ของเดิม
                    if( $count_date > 0   )
                    {
                        return check_90day($count_date);
                    }
                    else
                    {
                        return  -1;
                        
                    }
                 */   
                    
                                     
              }
             
	   }//end
}// end if          

if ( ! function_exists('check_90day')) //check 90 days 
{//begin if
    function check_90day($vx)
    {
        if( $vx <= 90 )
        {    
              $value = 90- $vx;
              return $value;
        }
        else
        {
            return  -1;         
        }
    }
    
}//end if

if ( ! function_exists('MY_checkbox_update'))  // ใช้สำหรับตรวจสอบค่า checkbox 
{//if
       function   MY_checkbox_update($name,$id) //$name=ชื่อของ checkbox,$id=คือ ค่า id ที่ต้องการ แปรผล,               
	   {//begin
               if( $id != ''  &&  $name != '' )
               {                 
                  ?>    
                         <input  type="checkbox" value="1" id="<?=$name?>" name="<?=$name?>"
                           <?PHP 
                              if( $id == 1 )   
                              {                                
                            ?>
                              checked="checked"/>
                            <?PHP
                              }else
                              {     
                            ?>
                                />
                            <?PHP                           
                              }
                            ?>
                  <?PHP  
                }            
	   }//end
}//end if

if ( ! function_exists('MY_select_level_user'))  // ใช้สำหรับตรวจสอบค่า select
{//if
       function   MY_select_level_user($name,$id) //ระดับการใช้งานของผู้ใช้ระบบ             
	   {//begin
              $array_va=array(1=>'Administrator',2=>'User');
                 if( !empty($name) && !empty($id) )
                 {
                     ?>
                      <select name="<?=$name?>" id="<?=$name?>">
                         <option >:: Select ::</option>  
                     <?PHP
                     foreach($array_va as $key=>$va)
                      {
                         if( $key == $id )
                         {    
                         ?>                         
                           <option value=<?=$key?> selected><?=$va?></option>                       
                         <?PHP
                         }else
                         {
                         ?>
                           <option value=<?=$key?> ><?=$va?></option>   
                         <?PHP   
                         }
                      }
                     ?>
                     
                     <?PHP
                  }            
	   }//end
           
           
}//end if


if ( ! function_exists('check_expire_date'))  // ใช้สำหรับการตรวจสอบ วัน เดือน ปี หมดอายุ
{//if
       function   check_expire_date($d1,$d2,$d3,$d4) //ระดับการใช้งานของผู้ใช้ระบบ      
       {
           /*
             $passport
             $visa
             $register
             $workpermit           
        */
          if( $d1 <= 0 ||   $d2 <= 0 ||  $d3 <= 0  ||  $d4 <= 0 ) 
          {
              //return 0;
              //echo  0;
              ?>
                      <span class="glyphicon glyphicon-remove"></span>
                      <b><font color='red'>Expire</font></b>
              <?php
          }else
          {
              //return 1;
              //echo  1;
              ?>
                        <span class="glyphicon glyphicon-minus"></span>
                        
              <?php             
          }       
       }
}      

?>	
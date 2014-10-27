<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//my_upload_helper.php
if ( ! function_exists('my_upload_function'))
{//if
	function   my_upload_function($name_pict,$height_value,$path_pict)
	{
	         //##------------- กำหนดตัวแปร
	          //$name_pict;  //ชื่้อรูปภาพ
			  //$height_value;  //ความสูง
			  //$path_pict;   //path  picture  =>   //copy($tumbnail,'picture/'.$tumbnail_name);  //หมายเหตุ  folder   => picture  อยู่นอกสุด
			  
//-----------------------upload  picture function------------------------------------------------------------------	
  //$tumbnail=$_FILES['new_picture']['tmp_name'];
   $tumbnail=$_FILES[$name_pict]['tmp_name'];
  //$tumbnail_name=$_FILES['new_picture']['name'];
  $tumbnail_name=$_FILES[$name_pict]['name'];
 // $tumbnail_size=$_FILES['new_picture']['size'];
  $tumbnail_size=$_FILES[$name_pict]['size'];
 // $tumbnail_type=$_FILES['new_picture']['type'];
  $tumbnail_type=$_FILES[$name_pict]['type'];
  
						if(  $tumbnail_name != '' )
						{
							  $array_last=explode(".",$tumbnail_name);
                             $c=count($array_last) - 1;
                             $lastname=strtolower($array_last[$c]); 
                               if( $lastname == "gif"  ||  $lastname == "png"  ||  $lastname == "jpg"  ||  $lastname == "bmp" )
	                             { 
		                           
		 $images=$tumbnail;
		 //$height = 100;
		 $height = $height_value;
		 
		 $size = getimagesize($images);
		 $width = round( $height*$size[0]/$size[1]);
		 if($size[2] == 1) 
           {
               $images_orig = imagecreatefromgif($images); //resize รูปประเภท GIF
           } 
         else if($size[2] == 2) 
          {
                 $images_orig = imagecreatefromjpeg($images); //resize รูปประเภท JPEG
          }
$photoX = imagesx($images_orig);
$photoY = imagesy($images_orig);
$images_fin = imagecreatetruecolor($width, $height);
imagecopyresampled($images_fin, $images_orig, 0, 0, 0, 0, $width+1, $height+1, $photoX, $photoY);
imagejpeg($images_fin, $images); //ชื่อไฟล์ใหม่
imagedestroy($images_orig);
imagedestroy($images_fin);
								   // copy($tumbnail,'../training/upload/'.$tumbnail_name);
									//copy($tumbnail,'picture/'.$tumbnail_name);  //หมายเหตุ  folder   => picture  อยู่นอกสุด
									    copy($tumbnail,$path_pict.$tumbnail_name);  //หมายเหตุ  folder   => picture  อยู่นอกสุด
                                 }
						}	
//----------------------------------------------------------------------------------------------------	
	}
	
}//end if

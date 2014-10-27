<?php   if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class  Photoallbumdels extends  CI_Model {  //begin class

    function   Photoallbumdels()  //model  การ query ทั้งหมด
    { //begin function
        //parent::CI_Model();
		   parent::__construct();
    }  //end function  

    function    directroy($dir_file1)  // jquery  light box
	{ //begin function
			if(   !empty($dir_file1)   )
			{	  //begin if
											   if(  $handle=opendir( $dir_file1 ) )
										   { //begin if
												 // echo  "entry  directory";
													 while($entry=readdir($handle) )
														{ //begin while
															 if(  !empty($entry) )
																		 {  //begin  if
																					 $ex=explode('.',$entry);
																					 $namefile=$ex[0];
																					 $typefile=  $ex[1];
																							if(  $typefile === 'jpg'  ||      $typefile === 'JPG' )
																													 {
																																//echo  $dir_file1;
																																//echo  "<br>";
																																//echo   $entry;
																																//echo  "<br>";  
																															     $path_file    =   base_url().$dir_file1."/".$entry;
																																  //echo  "<br>";  
																																?>
                        <li>
									<a href="<?=$path_file?>" title="Utilize a flexibilidade dos seletores da jQuery e crie um grupo de imagens como desejar. $('#gallery a').lightBox();">
                                           <img src="<?=$path_file?>" width="72" height="72" alt="" />
                        			 </a>
  					   </li>
                                                                                                                                <?
																													 }
																		 } //end if
														}//end  while
						
										   }//end if
			}	 //end  if   
	} //end function
	
	
	    function    directroy_admin($dir_file1)  // jquery  light box
	{ //begin function
			if(   !empty($dir_file1)   )
			{	  //begin if
											   if(  $handle=opendir( $dir_file1 ) )
										   { //begin if
												 // echo  "entry  directory";
													 while($entry=readdir($handle) )
														{ //begin while
															 if(  !empty($entry) )
																		 {  //begin  if
																					 $ex=explode('.',$entry);
																					 $namefile=$ex[0];
																					 $typefile=  $ex[1];
																							if(  $typefile === 'jpg'  ||      $typefile === 'JPG' )
																													 {
																																//echo  $dir_file1;
																																//echo  "<br>";
																																//echo   $entry;
																																//echo  "<br>";  
																															     $path_file    =   base_url().$dir_file1."/".$entry;
																																  //echo  "<br>";  
																																?>
                        <li>
                                    <a href="<?=$path_file?>" title="Utilize a flexibilidade dos seletores da jQuery e crie um grupo de imagens como desejar. $('#gallery a').lightBox();">
                                           <img src="<?=$path_file?>" width="72" height="72" alt="" />
                        			 </a>
                                     <!--<input name="<?=$entry?>"  id="<?=$entry?>"    type="checkbox" value="<?=$entry?>" />-->
                                      <input name="pic[]"    type="checkbox" value="<?=$entry?>" />
                                     <?=nbs(2)?>
                                     <?php  //$entry ?>
  					   </li>
                                                                                                                                <?
																													 }
																		 } //end if
														}//end  while
						
										   }//end if
			}	 //end  if   
			
			
	} //end function
	
	 function    directroy_admin_modify($dir_file1)  // jquery  light box  //ชุดแก้ไข code วันที่ 10/10/56
	{ //begin function
			if(   !empty($dir_file1)   )
			{	  //begin if
			    $a=  scandir($dir_file1);
                                                foreach($a as $key=>$value)
                                                {
                                                     $e=  explode(".", $value);
                                                     $convert_file=  strtolower($e[1]);
                                                      if( $convert_file == 'gif' ||  $convert_file == 'jpg' )
                                                      {
                                                       			  $path_img  =  base_url().$dir_file1.'/'. $value;
													     ?>
                                                                                    <li>
                                                                                                <a href="<?=$path_img?>" title="ภาพกิจกรรม">
                                                                                                       <img src="<?=$path_img?>" width="72" height="72" alt="" />
                                                                                                 </a>
                                                                                                 <!--<input name="<?=$entry?>"  id="<?=$entry?>"    type="checkbox" value="<?=$entry?>" />-->
                                                                                                  <input name="pic[]"    type="checkbox" value="<?=$value?>" />
                                                                                                 <?=nbs(2)?>
                                                                                                 <?php  //$entry ?>
                                                                                   </li>
                                                             <?
                                                      }
                                                }
			}	 //end  if   
	} //end function
	
	function    link_titlepicture($limit)  //ดึง  link  สำหรับ  photo
	{
	     //select  *  from   `tb_titlepicture`  order by  `id_ titlepicture` desc  limit  0,1;
		   $query="select  *  from   `tb_titlepicture`  order by  `id_titlepicture` desc  limit $limit,1;";
		   $q1=$this->db->query( $query);
		   $check=   $q1->num_rows();
	        if(  $check > 0 )
			{
			        $row=$q1->row_array();
				     return     $row['pathlink'];    
			}
	}
	
		function    titlepicture($limit)  //ดึง  link  สำหรับ  photo
	{
	     //select  *  from   `tb_titlepicture`  order by  `id_ titlepicture` desc  limit  0,1;
		   $query="select  *  from   `tb_titlepicture`  order by  `id_titlepicture` desc  limit $limit,1;";
		   $q1=$this->db->query( $query);
		   $check=   $q1->num_rows();
	        if(  $check > 0 )
			{
			        $row=$q1->row_array();
				     return     $row['titlepicture'];    
			}
	}
	
	
	function    thumpic($limit)  //ดึง  link  สำหรับ  photo
	{
	     //select  *  from   `tb_titlepicture`  order by  `id_ titlepicture` desc  limit  0,1;
		     $query="select  *  from   `tb_titlepicture`  order by  `id_titlepicture` desc  limit   $limit,2;";
		   $q1=$this->db->query( $query);
		   $check=   $q1->num_rows();
	        if(  $check > 0 )
			{
			        $row=$q1->row_array();
				     $pic   =   $row['thumpic'];
					 ?>    
					 <img width="140" height="140" alt="" src="<?=base_url()?>picture/<?=$pic?>" />
                     <?PHP
			}
	}
	
		function    thumpic_modify($id,$path)  //ดึง  link  สำหรับ  photo
	{
	     //select  *  from   `tb_titlepicture`  order by  `id_ titlepicture` desc  limit  0,1;
	     $query="select  *  from   `tb_titlepicture`  where  id_titlepicture=$id";
		   $q1=$this->db->query( $query);
		   $check=   $q1->num_rows();
	        if(  $check > 0 )
			{
			        $row=$q1->row_array();
				     $pic   =   $row['thumpic'];
					 ?>    
					 <!--<img width="140" height="140" alt="" src="<?=base_url()?>picture/<?=$pic?>" />-->
                      <!--<img width="140" height="140" alt="" src="<?=base_url()?>photo/photo3/<?=$pic?>" />-->
                        <img width="140" height="140" alt="" src="<?=base_url()?><?=$path?><?=$pic?>" />
                     <?PHP
			}
	}


##=============== delete  photo =================================
 function  delete_photo_model(&$arr_pic,$path_photo,$tab_active)
 {//begin  function
//						 $arr_pic  =  $this->input->get_post('pic');  //ตัวแปร
//						##--------------- path  photo  &&  tab_active-----------------------
//						echo   $path_photo=$this->input->get_post('path_photo');  //ตัวแปร
//						echo  br();
//				    	echo   $tab_active=$this->input->get_post('tab_active');  //ตัวแปร
//						echo  br(); 
//						 $size_arr=  sizeof($arr_pic);
				
//						echo   $path_photo;
//						echo  br();
//				    	echo   $tab_active;
//						echo  br(); 
						  $size_arr=  sizeof($arr_pic);
						 $path_direct="photo/photomenu/3/".$tab_active;
					//	 $file_pic="photo/".$path_photo."/".$arr_pic[$count];  ##  varible
						    if(    $size_arr   >= 1  )
							{  //begin  if
										  for(  $count   = 0; $count  <  $size_arr ; $count ++ )
										{ //begin for
											     $file_pic="photo/".$path_photo."/".$arr_pic[$count];  ##  varible
												 if(    !empty($file_pic)     )
												 {
												         $check_del=unlink($file_pic);
														 if (      $check_del     )
														 {
															   echo   "delete  success!";
														 }
														 else
														 {
															    echo   "error  delete";
														 }
												 }//end  if
										} //end for
														  redirect( $path_direct);
							}//end if			
 }//end function
	
				function   upload_picture($tumbnail,$tumbnail_name,$h,$path)
				{//begin  function
					
					
					 						if(  $tumbnail_name != '' )   //ตัวแปร
														{ //begin  if
																							  $array_last=explode(".",$tumbnail_name);
																							 $c=count($array_last) - 1;
																							 $lastname=strtolower($array_last[$c]); 
																							   if( $lastname == "gif"  ||  $lastname == "png"  ||  $lastname == "jpg"  ||  $lastname == "bmp" )
																								 { 
																								   
																		 $images=$tumbnail;
																		// $height = 140;  //ตัวแปร
																		 $height = $h;  //ตัวแปร
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
																										  //copy($tumbnail,'photo/photo1/'.$tumbnail_name);  //หมายเหตุ  folder   => picture  อยู่นอกสุด   //ตัวแปร
																								          copy($tumbnail,$path.$tumbnail_name);  //หมายเหตุ  folder   => picture  อยู่นอกสุด   //ตัวแปร
																								 }
														}	//end  if
				}//end  function

##============== modify  function  5-10-56
				function   upload_picture_tumbnail($tumbnail,$tumbnail_name,$h,$path)
				{//begin  function
						
					if(  $tumbnail_name != '' )   //ตัวแปร
                                        // if(is_uploaded_file($tumbnail_name))    
						{ //begin  if
						    $array_last=explode(".",$tumbnail_name);
												 $c=count($array_last) - 1;
												 $lastname=strtolower($array_last[$c]); 
												 if( $lastname == "gif"  ||  $lastname == "png"  ||  $lastname == "jpg"  ||  $lastname == "bmp" )
														 { 
																								   
##==================  modify  5-10-56 ปรับ code ใหม่จากการ upload รูปภาพประกอบหน้าเวป																	
//																		 $images=$tumbnail;
//																		// $height = 140;  //ตัวแปร
//																		 $height = $h;  //ตัวแปร
//																		 $size = getimagesize($images);
//																		 $width = round( $height*$size[0]/$size[1]);
//																		 if($size[2] == 1) 
//																		   {
//																			   $images_orig = imagecreatefromgif($images); //resize รูปประเภท GIF
//																		   } 
//																		 else if($size[2] == 2) 
//																		  {
//																				 $images_orig = imagecreatefromjpeg($images); //resize รูปประเภท JPEG
//																		  }
//																$photoX = imagesx($images_orig);
//																$photoY = imagesy($images_orig);
//																$images_fin = imagecreatetruecolor($width, $height);
//																imagecopyresampled($images_fin, $images_orig, 0, 0, 0, 0, $width+1, $height+1, $photoX, $photoY);
//																imagejpeg($images_fin, $images); //ชื่อไฟล์ใหม่
//																imagedestroy($images_orig);
//																imagedestroy($images_fin);
##==================  modify  5-10-56 ปรับ code ใหม่จากการ upload รูปภาพประกอบหน้าเวป																	
																
																
																								   // copy($tumbnail,'../training/upload/'.$tumbnail_name);
																										  //copy($tumbnail,'photo/photo1/'.$tumbnail_name);  //หมายเหตุ  folder   => picture  อยู่นอกสุด   //ตัวแปร
															   copy($tumbnail,$path.$tumbnail_name);  //หมายเหตุ  folder   => picture  อยู่นอกสุด   //ตัวแปร
																								 }
				   }	//end  if
				}//end  function

	
	
} //end  class
?>

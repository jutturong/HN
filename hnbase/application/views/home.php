<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$title?></title>
<!--
<meta name="keywords" content="free css templates, blue ice, CSS, HTML, templatemo" />
<meta name="description" content="Blue Ice is one of the Free CSS Templates from templatemo.com" />
-->

<?php    $this->load->view('import_css');   ?>    
<?php   //$this->load->view('import_ext'); //load  extjs  framework  ?>  
<?PHP   // $this->load->view('import_bootstrap');  //ตัวนี้เอาออกไว้ก่อนเพราะทำให้ form กำหนดขนาดความกว้างไม่ได้ ?>
<?PHP    $this->load->view('import_jqueryui'); ?>
<?PHP    //$this->load->view('import_css_custom'); //comment2?>
<?PHP    $this->load->view('import_style'); ?>



</head>
<body>

    
<div id="templatemo_wrapper"> 

          <!--
	<div id="templatemo_header">
            <h1><a href="#"></a>
            <img src="images/templatemo_logo.png" alt="logo" />
            <span>PERSON SYSTEM</span></a>
            </h1>
            </div> 
           -->  
             
      <!--
        <ul id="social_box">
            <li><a href="#"><img src="<?=base_url()?>images/facebook.png" alt="facebook" /></a></li>
            <li><a href="#"><img src="<?=base_url()?>images/twitter.png" alt="twitter" /></a></li>
            <li><a href="#"><img src="<?=base_url()?>images/linkedin.png" alt="linkin" /></a></li>
            <li><a href="#"><img src="<?=base_url()?>images/technorati.png" alt="technorati" /></a></li>
            <li><a href="#"><img src="<?=base_url()?>images/myspace.png" alt="myspace" /></a></li>               
        </ul>
      -->  
        
        
    </div>  <!-- end of templatemo_header -->


<!--  //comment top menu
 <div id="templatemo_menu">  
        <ul>
            <li><a href="services.html" id="show-btn">ประวัติพนักงาน<span>PERSON</span></a></li>
            <li><a href="news.html">แนบเอกสารที่เกี่ยวข้อง<span>Document</span></a></li>
            <li><a href="about.html">ระบบรายงานผล<span>REPORT</span></a></li>
            <li><a href="about.html">ผู้ดูแลระบบ<span>ADMIN</span></a></li>
            <li><a href="<?=base_url()?>index.php/home/page_login" class="last">ออกจากระบบ<span>Logout</span></a></li>
        </ul>    	
    </div> 
  -->
   
    
    <div id="templatemo_content_wrapper">
    	<div id="templatemo_content_top"></div>
        <div id="templatemo_content">
        
            <h2>HMP-Recruitment System</h2>
          <!-- <div  class="leftmenu"    style="width: 33%"  ><a href="#"><span>+</span>Leftmenu</a></div>-->
           <div  class="art-layout-cell layout-item-5" style="width: 0%"  > <!-- ระยะของ content -->
                  <!-- <h3>What's New?</h3>-->
		<?PHP  //$this->load->view('left_menu');  //original ?>
                         <?PHP  $this->load->view('left_menu_update1');  //original ?>
        <!--  ##  left  menu   ###  ---------  -->   
</div>

       
        </div>
        
        
        <div class="art-layout-cell layout-item-6" style="width:0%" >
    
<!--  ##  right content  ###  ---------  -->    
<?=$this->load->view('content')?>
<!--  ##  right content  ###  ---------  -->    
 <?PHP
  
 if( !empty($content) )
       {//begin
              $this->load->view($content);
           
       }//end
 ?>
  
    </div>
    
           
           
           
          
            
           
            
        </div>
        <div id="templatemo_content_bottom"></div>
	</div>
    
    <?php  //$this->load->view('import_footer'); ?>
    
     <!-- end of templatemo_footer -->
    
</div> <!-- end of templatemo_wrapper -->    


<!--<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.3.1/jquery.min.js'></script>
<script type='text/javascript' src='<?=base_url()?>js/logging.js'></script>
-->


</body>



</html>
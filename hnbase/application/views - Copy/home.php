<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$title?></title>
<meta name="keywords" content="free css templates, blue ice, CSS, HTML, templatemo" />
<meta name="description" content="Blue Ice is one of the Free CSS Templates from templatemo.com" />

<?php   $this->load->view('import_css');   ?>    
<?php   $this->load->view('import_ext'); //load  extjs  framework  ?>  

</head>
<body>

<div id="templatemo_wrapper"> 

	<div id="templatemo_header">

    	<div id="site_title">
            <h1><a href="http://www.templatemo.com">
            <!--<img src="images/templatemo_logo.png" alt="logo" />-->
            <!--<span>PERSON SYSTEM</span></a>-->
            </h1>
        </div> <!-- end of site_title -->
        
      
        <ul id="social_box">
            <li><a href="#"><img src="<?=base_url()?>images/facebook.png" alt="facebook" /></a></li>
            <li><a href="#"><img src="<?=base_url()?>images/twitter.png" alt="twitter" /></a></li>
            <li><a href="#"><img src="<?=base_url()?>images/linkedin.png" alt="linkin" /></a></li>
            <li><a href="#"><img src="<?=base_url()?>images/technorati.png" alt="technorati" /></a></li>
            <li><a href="#"><img src="<?=base_url()?>images/myspace.png" alt="myspace" /></a></li>                
		</ul>
        
        
        
    </div> <!-- end of templatemo_header -->


    
 <div id="templatemo_menu">
    	<!--<div class="home"><a href="index.html">A</a></div>-->
        <!--  ##  left  menu  ###  ---------  -->    
        <ul>
            <li><a href="services.html" id="show-btn">ประวัติพนักงาน<span>PERSON</span></a></li>
            <li><a href="news.html">แนบเอกสารที่เกี่ยวข้อง<span>Document</span></a></li>
            <li><a href="about.html">ระบบรายงานผล<span>REPORT</span></a></li>
            <li><a href="about.html">ผู้ดูแลระบบ<span>ADMIN</span></a></li>
            <li><a href="contact.html" class="last">ออกจากระบบ<span>Logout</span></a></li>
        </ul>    	
    </div> <!-- end of templatemo_menu -->
    
    <div id="templatemo_content_wrapper">
    	<div id="templatemo_content_top"></div>
        <div id="templatemo_content">
        
            <h2>HN base</h2>
          <!-- <div  class="leftmenu"    style="width: 33%"  ><a href="#"><span>+</span>Leftmenu</a></div>-->
           <div  class="art-layout-cell layout-item-5" style="width: 25%"  >
                  <!-- <h3>What's New?</h3>-->
		<?=$this->load->view('left_menu')?>
        <!--  ##  left  menu   ###  ---------  -->   
</div>

       
        </div>
        
        
        <div class="art-layout-cell layout-item-5" style="width:65%" >
    
<!--  ##  right content  ###  ---------  -->    
<?=$this->load->view('content')?>
<!--  ##  right content  ###  ---------  -->    
        
  
    </div>
    
           
           
           
          
            
           
            
        </div>
        <div id="templatemo_content_bottom"></div>
	</div>
    
    <?=$this->load->view('import_footer')?>
    
     <!-- end of templatemo_footer -->
    
</div> <!-- end of templatemo_wrapper -->    


<!--<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.3.1/jquery.min.js'></script>
<script type='text/javascript' src='<?=base_url()?>js/logging.js'></script>
-->


</body>



</html>
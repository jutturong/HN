<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874">
<title>Untitled Document</title>

<?php    $this->load->view('import_css');   ?>    
<?php   //$this->load->view('import_ext'); //load  extjs  framework  ?>  
<?PHP   //$this->load->view('import_bootstrap'); ?>
<?PHP    $this->load->view('import_jqueryui'); ?>
<?PHP    $this->load->view('import_css_custom'); ?>
<?PHP    $this->load->view('import_style'); ?>


</head>

<body>

<div id="templatemo_wrapper"> 
	<div id="templatemo_header">
	<div id="site_title">
						<h1><a href="http://www.templatemo.com">
						<!--<img src="images/templatemo_logo.png" alt="logo" />-->
						<!--<span>PERSON SYSTEM</span></a>-->
						</h1>
						
						<ul id="social_box">
							<li><a href="#"><img src="<?=base_url()?>images/facebook.png" alt="facebook" /></a></li>
							<li><a href="#"><img src="<?=base_url()?>images/twitter.png" alt="twitter" /></a></li>
							<li><a href="#"><img src="<?=base_url()?>images/linkedin.png" alt="linkin" /></a></li>
							<li><a href="#"><img src="<?=base_url()?>images/technorati.png" alt="technorati" /></a></li>
							<li><a href="#"><img src="<?=base_url()?>images/myspace.png" alt="myspace" /></a></li>                
						</ul>
        </div>
	</div>
	
	 <div id="templatemo_menu">
    	<!--<div class="home"><a href="index.html">A</a></div>-->
        <!--  ##  left  menu  ###  ---------  -->    
        <ul>
            <li><a href="services.html" id="show-btn">ประวัติพนักงาน<span>PERSON</span></a></li>
            <li><a href="news.html">แนบเอกสารที่เกี่ยวข้อง<span>Document</span></a></li>
            <li><a href="about.html">ระบบรายงานผล<span>REPORT</span></a></li>
            <li><a href="about.html">ผู้ดูแลระบบ<span>ADMIN</span></a></li>
           <!-- <li><a href="contact.html" class="last">ออกจากระบบ<span>Logout</span></a></li>-->
            <li><a href="<?=base_url()?>index.php/home/page_login" class="last">ออกจากระบบ<span>Logout</span></a></li>
        </ul>    	
    </div> <!-- end of templatemo_menu -->
	
	
	
</div>

</body>
</html>

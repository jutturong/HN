<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>

	<link rel="shortcut icon" type="<?php  echo   base_url()?>lightbox/image/ico" href="images/favicon.gif" />	
	<link rel="stylesheet" href="<?php  echo   base_url()?>lightbox/css/screen.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?php  echo   base_url()?>lightbox/css/lightbox.css" type="text/css" media="screen" />
   <link href='http://fonts.googleapis.com/css?family=Fredoka+One|Open+Sans:400,700' rel='stylesheet' type='text/css'>

<script src="<?php  echo   base_url()?>lightbox/js/jquery-1.7.2.min.js"></script>
<script src="<?php  echo   base_url()?>lightbox/js/jquery-ui-1.8.18.custom.min.js"></script>
<script src="<?php  echo   base_url()?>lightbox/js/jquery.smooth-scroll.min.js"></script>
<script src="<?php  echo   base_url()?>lightbox/js/lightbox.js"></script>

<script>
  jQuery(document).ready(function($) {
      $('a').smoothScroll({
        speed: 1000,
        easing: 'easeInOutCubic'
      });

      $('.showOlderChanges').on('click', function(e){
        $('.changelog .old').slideDown('slow');
        $(this).fadeOut();
        e.preventDefault();
      })
  });

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-2196019-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>


</head>

<body>


    	<h3>Single image</h3>
  <div class="imageRow">
  	<div class="single">
  		<a href="<?php  echo   base_url()?>lightbox/images/examples/image-1.jpg" rel="lightbox"><img src="<?php  echo   base_url()?>lightbox/images/examples/thumb-1.jpg" alt="" /></a>
  	</div>
  	<div class="single">
  		<a href="<?php  echo   base_url()?>lightbox/images/examples/image-2.jpg" rel="lightbox" title="Optional caption."><img src="<?php  echo   base_url()?>lightbox/images/examples/thumb-2.jpg" alt="" /></a>
  	</div>
  </div>
  
  
  	<h3 style="clear: both;">Image set</h3>

  <div class="imageRow">
  	<div class="set">
  	  <div class="single first">
  		  <a href="<?php  echo   base_url()?>lightbox/images/examples/image-3.jpg" rel="lightbox[plants]" title="Click on the right side of the image to move forward."><img src="<?php  echo   base_url()?>lightbox/images/examples/thumb-3.jpg" alt="Plants: image 1 0f 4 thumb" /></a>
  		</div>
      <div class="single">
  		  <a href="<?php  echo   base_url()?>lightbox/images/examples/image-4.jpg" rel="lightbox[plants]" title="Alternately you can press the right arrow key." ><img src="<?php  echo   base_url()?>lightbox/images/examples/thumb-4.jpg" alt="Plants: image 2 0f 4 thumb" /></a>
      </div>
      <div class="single">
  		  <a href="<?php  echo   base_url()?>lightbox/images/examples/image-5.jpg" rel="lightbox[plants]" title="The script preloads the next image in the set as you're viewing."><img src="<?php  echo   base_url()?>lightbox/images/examples/thumb-5.jpg" alt="Plants: image 3 0f 4 thumb" /></a>
      </div>
      <div class="single last">
  		  <a href="<?php  echo   base_url()?>lightbox/images/examples/image-6.jpg" rel="lightbox[plants]" title="Click the X or anywhere outside the image to close"><img src="<?php  echo   base_url()?>lightbox/images/examples/thumb-6.jpg" alt="Plants: image 4 0f 4 thumb" /></a>
      </div>
  	</div>
  </div>
	
</div>






</body>
</html>

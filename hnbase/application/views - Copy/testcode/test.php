<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ใช้สำหรับทดสอบ code ต่างๆ</title>
  <?php   
           // $this->load->view('import_css');
            $this->import_->import_css();
			$this->import_->jquery_import_ui();  //เป็น jquery ui  ทั้งหมดที่จะเอามาใช้
			$this->import_->import_ext();
  ?> 
</head>

<script type="text/javascript">
       $(function()
	   {
             
			    $(".trigger").click(function()
				     {
					       //alert('t');
						 //$('.result').load('<?=base_url()?>index.php/backoffice/receive_test/3');
						  //if( setting.url
						//  $('.result').text('test1');
						//  $('.result').append("<ul><li>menu1</li><li>menu2</li></ul>");
					 }
				);
				
				
             console.log('a');	
			
//			var x = [ 1, 2, 3 ];
//jQuery.each( x, function( index, value ) {
//											console.log( "index", index, "value", value );
//											});	
											
											
																			
											   }
	  				 );
</script>

<body>
<div class="trigger">Trigger</div>
<div class="result"></div>
<div class="log"></div>
</body>
</html>

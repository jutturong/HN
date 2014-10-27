<?php   if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Import_ extends  CI_Model {

 function    Import_()  //model  การ query ทั้งหมด
    {
            //parent::CI_Model();
		   parent::__construct();
    }
	
function    import_ext() // import  EXT
{
          ?>
			    <link rel="stylesheet" type="text/css" href="<?php  echo  base_url(); ?>ext/resources/css/ext-all.css" />
   				 <link rel="stylesheet" type="text/css" href="<?php  echo  base_url(); ?>ext/examples/shared/example.css"/>
    			<script type="text/javascript" src="<?php  echo  base_url(); ?>ext/bootstrap.js"></script>
                <script type="text/javascript" src="<?php  echo  base_url(); ?>ext/examples/shared/examples.js"></script>
                <script type="text/javascript">
						Ext.require([
							'Ext.window.MessageBox',
							'Ext.tip.*'
											]);
				</script>
                <script type="text/javascript">
						function showResult(btn){
							Ext.example.msg('สถานะการประมวลผล', 'คุณคลิกที่ปุ่ม {0} ', btn);
						};
                </script>
          <?php
}

function   datepicker_style()//datepicker style
{
			  ?>
									<style type="text/css">  
                                    /* Overide css code กำหนดความกว้างของปฏิทินและอื่นๆ */  
                                    .ui-datepicker{  
                                        width:200px;  
                                       /* font-family:tahoma;  */
                                         font-family:Microsoft Sans Serif;  
                                        font-size:12px;  
                                        text-align:center;  
                                    }  
                                    </style>
				<?PHP
}
 
 function   jquery_import() // import css,js  jquery
	{
         ?>	
                                     <link rel="stylesheet" href="<?php   echo  base_url(); ?>jquery_ui_1.9.2/dev/themes/ui-lightness/jquery-ui.css" />
                                     <script src="<?php   echo  base_url(); ?>jquery_ui_1.9.2/js/jquery-1.8.3.js"></script>
                                     <script src="<?php   echo  base_url(); ?>jquery_ui_1.9.2/dev/ui/jquery.ui.core.js"></script>
                                     <script src="<?php   echo  base_url(); ?>jquery_ui_1.9.2/dev/ui/jquery-ui.custom.js"></script>
                                     <!--<link rel="stylesheet" href="/resources/demos/style.css" />-->
           <?php
	}
	 function   jquery_import_ui() // import css,js  jquery
	 {
	          ?>	
                                     <link rel="stylesheet" href="<?php   echo  base_url(); ?>jquery_ui_1.9.2/dev/themes/ui-lightness/jquery-ui.css" />
                                     
                                     <link rel="stylesheet" href="<?php   echo  base_url(); ?>jquery_ui_1.9.2/dev/themes/base/jquery.ui.all.css">
                                     <script src="<?php   echo  base_url(); ?>jquery_ui_1.9.2/js/jquery-1.8.3.js"></script>
                                     <script src="<?php   echo  base_url(); ?>jquery_ui_1.9.2/dev/ui/jquery.ui.core.js"></script>
                                     <script src="<?php   echo  base_url(); ?>jquery_ui_1.9.2/dev/ui/jquery-ui.custom.js"></script>
                                     
                                      <script src="<?php   echo  base_url(); ?>jquery_ui_1.9.2/dev/ui/jquery.ui.widget.js"></script>
                                     <script src="<?php   echo  base_url(); ?>jquery_ui_1.9.2/dev/ui/jquery.ui.tabs.js"></script>
                                    
	
           <?php
	 }
	 function   import_jquery_api() // import css,js  jquery
	{
         ?>	
                                     <!--<link rel="stylesheet" href="<?php   echo  base_url(); ?>jquery_ui_1.9.2/dev/themes/ui-lightness/jquery-ui.css" />-->
                                     <script src="<?php   echo  base_url(); ?>jquery_ui_1.9.2/js/jquery-1.8.3.js"></script>
                                     <!--<script src="<?php   echo  base_url(); ?>jquery_ui_1.9.2/dev/ui/jquery.ui.core.js"></script>-->
                                    <!-- <script src="<?php   echo  base_url(); ?>jquery_ui_1.9.2/dev/ui/jquery-ui.custom.js"></script>-->
           <?php
	}


function    import_css() // สำหรับหน้า   css template   website  ทั้งหมด
	{
	      ?>
								 <!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
								 <script src="<?=base_url()?>js_IE9/html5.js"></script>
								 <!--[if lte IE 7]><link rel="stylesheet" href="style.ie7.css" media="screen" /><![endif]-->
								 <!--<script src="<?=base_url()?>js_IE7/style.ie7.css"></script>-->
								<link rel="stylesheet" href="<?=base_url()?>style.css" media="screen">
								<link rel="stylesheet" href="<?=base_url()?>style.responsive.css" media="all">
								 <script src="<?=base_url()?>jquery.js"></script>
								<script src="<?=base_url()?>script.js"></script>
								<script src="<?=base_url()?>script.responsive.js"></script>
            <?php
	}
function   import_style()   // สำหรับหน้า   css template   website  ทั้งหมด
	{
	         ?>
					    <style>
						.art-content .art-postcontent-0 .layout-item-0 { margin-bottom: 20px;  }
						.art-content .art-postcontent-0 .layout-item-1 { color: #133239; background: #E4EFF1;  }
						.art-content .art-postcontent-0 .layout-item-2 { color: #C2E2EB; background: #44526F; padding: 0px;  }
						.art-content .art-postcontent-0 .layout-item-3 { color: #C2E2EB; background: #44526F; padding: 20px;  }
						.art-content .art-postcontent-0 .layout-item-4 { margin-bottom: 5px;  }
						.art-content .art-postcontent-0 .layout-item-5 { border-right-style:Dotted;border-right-width:1px;border-right-color:#CCCCCC; padding-right: 20px;padding-left: 20px;  }
						.art-content .art-postcontent-0 .layout-item-6 { padding-right: 20px;padding-left: 20px;  }
						.art-content .art-postcontent-0 .layout-item-7 { margin-top: 20px;  }
						.art-content .art-postcontent-0 .layout-item-8 { padding: 20px;  }
						.art-content .art-postcontent-0 .layout-item-9 { color: #112B32; background: #CCCCCC; padding: 20px;  }
						.ie7 .post .layout-cell {border:none !important; padding:0 !important; }
						.ie6 .post .layout-cell {border:none !important; padding:0 !important; }
						</style>
						<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	         <?php
	}
	
	function  yoxview() //jquery  picture ใข้สำหรับดูภาพ
	{
	   ?>
	     <script type="text/javascript" src="yoxview/yoxview-init.js"></script>
	    <?php
	}



}

?>

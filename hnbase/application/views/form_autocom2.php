<html>
   <head>
       
<!--        <script type="text/javascript"
        src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
        <script type="text/javascript"
        src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>
        <link rel="stylesheet" type="text/css"
        href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" />
--> 

			<?=$this->load->view('import_jqueryui')?>
            
        <script type="text/javascript">
                $(document).ready(function(){
                    $("#name").autocomplete({
                        //source:'getautocomplete.php',
						//source:'<?=base_url()?>index.php/home/json_test2',
						source:'<?=base_url()?>index.php/home/json_test3',
                        minLength:1
                    });
                });
        </script>
   </head>
 
   <body>
 
      <form method="post" action="">
             Name : <input type="text" id="name" name="name" />
      </form>
 
   </body>
<html>
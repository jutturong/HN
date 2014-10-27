<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    
   <!-- <link rel="shortcut icon" href="<?=base_url()?>bootstrap/docs-assets/ico/favicon.png">-->

    <!--<title>Signin Template for Bootstrap</title>-->
    <title><?=$login_hn?></title>

	<?=$this->load->view('import_bootstrap')?>
    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../docs-assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container">

      <form class="form-signin" action="<?=base_url()?>index.php/home/checklogin">
        <h2 class="form-signin-heading"><?PHP echo $login_hn; ?></h2>
        <input type="text" name="user" class="form-control" placeholder="User" required autofocus value="">
        <input type="password" name="password" class="form-control" placeholder="Password" required value="">
<!--        <label class="checkbox">
          <input type="checkbox" value="remember-me"> Remember me
        </label>
-->        <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
      </form>

    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  </body>
</html>

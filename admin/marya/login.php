<!DOCTYPE html>
<html lang="<?=$lang['LANG_SMALL_NAME']?>s" dir="<?=$lang['DIR']?>">
<head>
	<title><?=$lang['LOGIN']?> - <?=$lang['KLEEJA_CP']?> - <?=$config['sitename']?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="robots" content="noindex, follow" />

	<link rel="stylesheet" type="text/css" media="screen" href="<?=ADMIN_STYLE_PATH?>css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" media="screen" href="<?=ADMIN_STYLE_PATH?>css/stylesheet.css" />

	<style type="text/css">
	body {
	  padding-top: 40px;
	  padding-bottom: 40px;
	  background-color: #eee;
	  background:#fff;
	}

	.form-signin {
	  max-width: 330px;
	  padding: 15px;
	  margin: 0 auto;
	}
	.form-signin .form-signin-heading,
	.form-signin .checkbox {
	  margin-bottom: 10px;
	}
	.form-signin .checkbox {
	  font-weight: normal;
	}
	.form-signin .form-control {
	  position: relative;
	  font-size: 16px;
	  height: auto;
	  padding: 10px;
	  -webkit-box-sizing: border-box;
	     -moz-box-sizing: border-box;
	          box-sizing: border-box;
	}
	.form-signin .form-control:focus {
	  z-index: 2;
	}
	.form-signin input[type="text"] {
	  
	  border-bottom-left-radius: 0;
	  border-bottom-right-radius: 0;
	}
	.form-signin input[type="password"] {
	  margin-bottom: 10px;
	  border-top-left-radius: 0;
	  border-top-right-radius: 0;
	}
	</style>

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	  <script src="<?=ADMIN_STYLE_PATH?>js//html5shiv.js"></script>
	  <script src="<?=ADMIN_STYLE_PATH?>js/respond.min.js"></script>
	<![endif]-->
</head>
<body id="login_body">
	
    <div class="container">

     <form action="<?=$action?>" method="post" style="clear: both;" id="login_form" class="form-signin">
		<?php if(isset($ERRORS) && sizeof($ERRORS)):?>
 			<hr>
 			<div class="alert alert-danger">
				<?php foreach($ERRORS as $error):?>
					<?=$error?><br>
				<?php endforeach;?>
			</div>
		<?php endif;?>

        <h2 class="form-signin-heading"><?=$lang['WELCOME']?></h2>
        <input type="text" class="form-control" placeholder="<?=$user->data['name']?>" readonly="readonly" value="<?=$user->data['name']?>">
		<input type="hidden" name="lname" id="lname" value="<?=$user->data['name']?>" />
        <input type="password" name="lpass_<?=$KEY_FOR_PASS?>" class="form-control" placeholder="<?=$lang['PASSWORD']?>" autofocus>

        <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit"><?=$lang['LOGIN']?></button>
			
		<?=kleeja_add_form_key('admin_login')?>
		<input type="hidden" name="kid" value="<?=$KEY_FOR_WEE?>" />

  		<hr>
  		<a href="<?=$config['siteurl']?>" title="<?=$lang['RETURN_HOME']?>" class="muted"> &laquo; <?=$lang['RETURN_HOME']?></a> 

      </form>
    </div> <!-- /container -->

	
	<!--div id="login_top">

	</div-->

	
	<script src="<?=ADMIN_STYLE_PATH?>js/jquery.min.js"></script>
	<script src="<?=ADMIN_STYLE_PATH?>js/bootstrap.min.js"></script>

</body>
</html>

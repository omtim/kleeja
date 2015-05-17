<?php if(!defined('IN_KLEEJA')) { exit; } ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="<?=$lang['DIR']?>">
<head>
	<title><?=$title?> <?php echo $title ? '&#9679;' :'';?> <?=$config['sitename']?></title>
	<meta http-equiv="Content-Type" content="text/html;charset=<?=$charset?>" />
	<meta http-equiv="Content-Language" content="<?=$lang['LANG_SMALL_NAME']?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="copyrights" content="Powered by Kleeja" />
	<!-- metatags.info/all_meta_tags -->
	<link rel="shortcut icon" href="images/favicon.ico" />
	<link rel="icon" type="image/gif" href="images/favicon.gif" />
	<link rel="apple-touch-icon" href="images/apple-touch-icon.png" />
	<link rel="apple-touch-startup-image" href="images/iPhone.png" />

	<link rel="stylesheet" href="<?=STYLE_PATH?>css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" media="all" href="<?=STYLE_PATH?>css/stylesheet.css" />
	<?php if($lang['DIR']=='rtl'):?>
		<link rel="stylesheet" type="text/css" media="all" href="<?=STYLE_PATH?>css/bootstrap.rtl.css" />
	<?php endif;?>

	<?php if(is_browser('ie')):?>

	<?php endif;?>
	
	<script type="text/javascript" src="<?=STYLE_PATH?>jquery.js"></script>
	<script type="text/javascript" src="<?=STYLE_PATH?>javascript.js"></script>
	<script type="text/javascript" src="<?=STYLE_PATH?>bootstrap.min.js"></script>
	

	<!-- Extra code -->
	<?=$extra_head_code?>
</head>
<body>
	
	<!--begin Header-->
    <nav class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?=$config['siteurl']?>" title="<?=$config['sitename']?>"><?=$config['sitename']?></a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">			
			<li <?php if($current_page == 'index'):?> class="active"<?php endif;?>><a href="<?=get_url_of('index')?>"><?=$lang['HOME']?></a></li>
			<li <?php if($current_page == 'rules'):?> class="active"<?php endif;?>><a href="<?=get_url_of('rules')?>"><?=$lang['RULES']?></a></li>
			<li <?php if($current_page == 'guide'):?> class="active"<?php endif;?>><a href="<?=get_url_of('guide')?>"><?=$lang['GUIDE']?></a></li>
			<?php if($config['allow_stat_pg'] && user_can('access_stats')):?>
			<li <?php if($current_page == 'stats'):?> class="active"<?php endif;?>><a href="<?=get_url_of('stats')?>"><?=$lang['STATS']?></a></li>
			<?php endif;?>
			<?php if(user_can('access_report')):?>
			<li <?php if($current_page == 'report'):?> class="active"<?php endif;?>><a href="<?=get_url_of('report')?>"><?=$lang['REPORT']?></a></li>
			<?php endif;?>
			<?php if(user_can('access_call')):?>
			<li <?php if($current_page == 'call'):?> class="active"<?php endif;?>><a href="<?=get_url_of('call')?>"><?=$lang['CALL']?></a></li>
			<?php endif;?>
			<?php 
			/* use this hook to add more to the menu */
			($hook = $plugin->run_hook('header_template_top_menu')) ? eval($hook) : null;?>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
	<!-- @end-Header -->
	
<!-- container -->
 <div class="container">

	<!-- begin extras header -->
	<?php if($extras['header']):?>
      <div class="jumbotron extras_header">
          <?=$extras['header']?>
	  </div>
	<?php endif;?>
	<!-- @end-extras-header -->

	<!-- row-real container -->
	<div class="row row-offcanvas row-offcanvas-right">

		<!-- sidebar -->
        <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar">
          <div class="list-group">
			<?php if($user->is_user()):?>
				<a href="<?=get_url_of('profile')?>" class="list-group-item<?php if($current_page == 'profile'):?> active<?php endif;?>"><?=$lang['PROFILE']?></a>
				<?php if($config['enable_userfile'] && user_can('access_fileuser')):?>
				<a href="<?=get_url_of('fileuser')?>" class="list-group-item<?php if($current_page == 'fileuser'):?> active<?php endif;?>"><?=$lang['YOUR_FILEUSER']?></a>
				<?php endif;?>
				<a href="<?=get_url_of('logout')?>"  class="list-group-item<?php if($current_page == 'logout'):?> active<?php endif;?>"><?=$lang['LOGOUT']?> [ <?=$user->data['name']?> ]</a>
			<?php else:?>
				<a href="<?=get_url_of('login')?>"  class="list-group-item<?php if($current_page == 'login'):?> active<?php endif;?>"><?=$lang['LOGIN']?></a>
				<?php if($config['register']):?>
				<a href="<?=get_url_of('register')?>"  class="list-group-item<?php if($current_page == 'register'):?> active<?php endif;?>"><?=$lang['REGISTER']?></a>
				<?php endif;?>
			<?php endif;?>
			<?php ($hook = $plugin->run_hook('header_template_side_menu')) ? eval($hook) : null; ?>
			
          </div>
        </div><!--/.sidebar-offcanvas-->
      

	 <!-- real-body -->
	<div class="col-xs-12 col-sm-9">
		
	

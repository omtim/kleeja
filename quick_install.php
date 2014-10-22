<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">

	<title>One Click Kleeja Installer</title>

 	<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
	  
	<style>
	  body { text-align: center; padding: 150px;}
	  h1 { font-size: 40px; }
	  h2 { font-size:20px;}
	  body { font: 15px Helvetica, sans-serif; color: #333; }
	  a { color: #dc8100; text-decoration: none; }
	  a:hover { color: #333; text-decoration: none; }
	  .message { border-radius: 25px; font-weight:bold; padding:4px;}
	  .info { color:blue; background-color:;}
	  .error {color:red; background-color:#ffe7f4;}
	  .button { border-radius: 10px; font-weight:bold; padding:10px 40px; background-color:#f2f2f2; color:#666; font-size:20px;}
	  .clearfix:after {
	       clear: both;overflow: auto;
	       }
	 </style>

</head>

<body>
	<h1>Kleeja Quick Installer</h1>
	<h2>This installer is meant for the developers to install Kleeja easly and in short time, It won't be included in the reqular releases!</h2>


<?php if(isset($_GET['error'])): ?>
	<div class="message error">
		<?php switch($_GET['error']):
		 case 'no_connection': ?>
		We can <i>not connect</i> to the database. check the information in <i>config.php</i> and try again!.
		<?php break;?>
		<?php endswitch;?>
	</div>
<?php endif;?>

<?php if(!file_exists('config.php')):?>
	<div class="message error"><i>config.php</i> file must be existed in Kleeja root folder to complete the process!</div>
<?php elseif(isset($_GET['do'])):
	
	#include important files
	$is_there_config = true;
	$db_type = 'mysqli';

	define('IN_COMMON', true);
	define('PATH', './');
	
	
	include PATH . 'config.php';

	switch ($db_type)
	{
		case 'mysqli':
			include PATH . 'includes/classes/mysqli.php';
		break;
		default:
			include PATH . 'includes/classes/mysql.php';
	}
	include  PATH . 'install/includes/functions_install.php';
	
	$submit_disabled = $no_connection = $mysql_ver = false;

	//config.php
	if(isset($dbname) && isset($dbuser))
	{
		//connect .. for check
		$SQL = new database($dbserver, $dbuser, $dbpass, $dbname);

		if (!$SQL->is_connected())
		{
			$no_connection = true;
		}
		else
		{
			if (version_compare($SQL->version(), MIN_MYSQL_VERSION, '<'))
			{
				$mysql_ver = $SQL->version();
			}
		}
	}
	
	#no connection? error then
	if($no_connection)
	{
		header('Location: ./quick_install.php?error=no_connection');
		exit;
	}

	 
	include_once  PATH . 'includes/usr.php';
	include_once  PATH . 'includes/functions_alternative.php';
	$usrcp = new usrcp;
	
	#random password
	$rand_password = substr(str_shuffle('abcdefghijklmnopqrstuvwxyz0123456789'),0 ,10);

	$user_salt			= substr(kleeja_base64_encode(pack("H*", sha1(mt_rand()))), 0, 7);
	$user_pass 			= $usrcp->kleeja_hash_password($rand_password . $user_salt);
	$user_name 			= 'admin';
	$user_mail 			= 'admin@kleeja.com';
	$config_sitename	= 'Developer Background';
	$config_siteurl		= 'http://' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
	$config_sitemail	= 'admin@kleeja.com';
	$config_time_zone	= '0';
	$config_urls_type	= 'id';
	$clean_name			= 'admin';

	#ok .. we will get sqls now ..
	include PATH . 'includes/install_sqls.php';
	include PATH . 'includes/default_values.php';

	$err = $dots = 0;
	$errors = '';

	#do important alter before
	$SQL->query($install_sqls['ALTER_DATABASE_UTF']);
	
	$sqls_done = $sql_err = array();
	foreach($install_sqls as $name=>$sql_content)
	{
		if($name == 'DROP_TABLES' || $name == 'ALTER_DATABASE_UTF')
		{
			continue;
		}
		
		#dreop tabe
		if(strpos($name, 'insert') === false)
		{
			$SQL->query("DROP TABLE" . $dbprefix . $name .";");
		}

		if($SQL->query($sql_content))
		{
				$sqls_done[] = $name . '...';
		}
		else
		{
			$errors .= implode(':', $SQL->get_error()) . '' . "\n___\n";
			$sql_err[] = $lang['INST_SQL_ERR'] . ' : ' . $name . '[basic]';
			$err++;
		}

	}#for
	
	if($err == 0)
	{
		#add configs
		foreach($config_values as $cn)
		{
			if(empty($cn[6]))
			{
				$cn[6] = 0;
			}

			$sql = "INSERT INTO `{$dbprefix}config` (`name`, `value`, `option`, `display_order`, `type`, `plg_id`, `dynamic`) VALUES ('$cn[0]', '$cn[1]', '$cn[2]', '$cn[3]', '$cn[4]', '$cn[5]', '$cn[6]');";
			if(!$SQL->query($sql))
			{
				$errors .= implode(':', $SQL->get_error()) . '' . "\n___\n";
				$sql_err[] =  'SQL insert error : [configs_values] ' . $cn;
				$err++;
			}
		}

		#add groups configs
		foreach($config_values as $cn)
		{
			if($cn[4] != 'groups' or !$cn[4])
			{
				continue;
			}

			$itxt = '';
			foreach(array(1, 2, 3) as $im)
			{
				$itxt .= ($itxt == '' ? '' : ','). "($im, '$cn[0]', '$cn[1]')";
			}

			$sql = "INSERT INTO `{$dbprefix}groups_data` (`group_id`, `name`, `value`) VALUES " . $itxt . ";";
			if(!$SQL->query($sql))
			{
				$errors .= implode(':', $SQL->get_error()) . '' . "\n___\n";
				$sql_err[] =  'SQL insert error : [groups_configs_values] ' . $cn;
				$err++;
			}
		}

		#add exts
		foreach($ext_values as $gid=>$exts)
		{
			$itxt = '';
			foreach($exts as $t=>$v)
			{
				$itxt .= ($itxt == '' ? '' : ','). "('$t', $gid, $v)";
			}

			$sql = "INSERT INTO `{$dbprefix}groups_exts` (`ext`, `group_id`, `size`) VALUES " . $itxt . ";";
			if(!$SQL->query($sql))
			{
				$errors .= implode(':', $SQL->get_error()) . '' . "\n___\n";
				$sql_err[] = 'SQL insert error : [ext_values] ' . $gid;
				$err++;
			}
		}

		#add acls
		foreach($acls_values as $cn=>$ct)
		{
			$it = 1;
			$itxt = '';
			foreach($ct as $ctk)
			{
				$itxt .= ($itxt == '' ? '' : ','). "('$cn', '$it', '$ctk')";
				$it++;
			}
	
			
			$sql = "INSERT INTO `{$dbprefix}groups_acl` (`acl_name`, `group_id`, `acl_can`) VALUES " . $itxt . ";";
			if(!$SQL->query($sql))
			{
				$errors .= implode(':', $SQL->get_error()) . '' . "\n___\n";
				$sql_err[] = 'SQL insert error : [acl_values] ' . $cn;
				$err++;
			}
			$it++;
		}
	}
	
	
	
		if($err):?>
			<?php foreach($sql_err as $error_msg):?>
			<div class="message error"><?php echo $error_msg;?></div>
			<?php endforeach;?>
		<?php else:?>
			<div class="message info">Kleeja installed successfully<br>
				Username: admin<br>
				Password <?=$rand_password?><br>
				<br>
				<a href="./">Kleeja Home Page</a>
			</div>
		<?php endif;
	
	else:?>
	<br>
	<br>
	<div style="height:40px">
		<a class="button clearfix" href="./quick_install.php?do=install">Install</a>
	</div>
	<br>
	<small style="color:#888">Installation process will remove current Kleeja MySQL tables.</small>
<?php endif;?>

</body>
</html>
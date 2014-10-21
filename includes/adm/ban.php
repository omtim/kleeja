<?php
/**
*
* @package adm
* @version $Id: ban.php 2236 2013-11-30 10:07:23Z saanina $
* @copyright (c) 2007 Kleeja.com
* @license http://www.kleeja.com/license
*
*/


// not for directly open
if (!defined('IN_ADMIN'))
{
	exit();
}

//for style ..
$stylee	= "admin_ban";
$action	= basename(ADMIN_PATH) . '?cp=' . basename(__file__, '.php');

$affected = false;
$H_FORM_KEYS	= kleeja_add_form_key('adm_ban');

//
// Check form key
//
if (isset($_POST['submit']))
{
	if(!kleeja_check_form_key('adm_ban'))
	{
		kleeja_admin_err($lang['INVALID_FORM_KEY'], true, $lang['ERROR'], true, $action, 1);
	}
}


$query	= array(
				'SELECT'	=> 'ban',
				'FROM'		=> "{$dbprefix}stats"
			);

$result = $SQL->build($query);

while($row=$SQL->fetch($result))
{
	$ban = isset($_POST["ban_text"]) ? htmlspecialchars($_POST['ban_text']) : $row['ban'];

	//when submit
	if (isset($_POST['submit']))
	{
		//update
		$update_query	= array(
								'UPDATE'	=> "{$dbprefix}stats",
								'SET'		=> "ban='" . $SQL->escape($ban) . "'"
							);

		$SQL->build($update_query);
		if($SQL->affected())
		{
			$affected = true;
			delete_cache('data_ban');
		}
	}
}

$SQL->free($result);

//after submit 
if (isset($_POST['submit']))
{
	$text	= ($affected ? $lang['BAN_UPDATED'] : $lang['NO_UP_CHANGE_S']);
	$text	.= '<script type="text/javascript"> setTimeout("get_kleeja_link(\'' . basename(ADMIN_PATH) . '?cp=' . basename(__file__, '.php') .  '\');", 2000);</script>' . "\n";
	$stylee	= "admin_info";
}

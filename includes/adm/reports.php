<?php
/**
*
* @package adm
* @version $Id: reports.php 2240 2013-12-07 23:22:54Z phpfalcon@gmail.com $
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
$current_template	= "reports.php";
$current_smt	= isset($_GET['smt']) ? (preg_match('![a-z0-9_]!i', trim($_GET['smt'])) ? trim($_GET['smt']) : 'general') : 'general';
$action			= ADMIN_PATH . '?cp=reports&amp;page=' . (isset($_GET['page']) ? intval($_GET['page']) : 1) . '&amp;smt=' . $current_smt;
$msg_sent		= isset($_GET['sent']) ? intval($_GET['sent']) : false;
$H_FORM_KEYS	= kleeja_add_form_key('adm_reports');
$there_queue	= preg_match('!:del_[a-z0-9]{0,3}reports:!i', $config['queue']);


//
// Check form key
//
if (isset($_POST['submit']))
{
	if(!kleeja_check_form_key('adm_reports'))
	{
		kleeja_admin_err($lang['INVALID_FORM_KEY'], true, $lang['ERROR'], true, $action, 1);
	}
}


#add delete process to the queue
if($current_smt == 'del_d30' || $current_smt == 'del_all')
{

	if(strpos($config['queue'], ':' . $current_smt . 'reports:') !== false)
	{
		kleeja_admin_err($lang['DELETE_PROCESS_IN_WORK'], true, $lang['ERROR'], true, ADMIN_PATH . '?cp=reports', 1);
	}
	else
	{
		update_config('queue', $config['queue'] . ':' . $current_smt . 'reports:');
		kleeja_admin_info($lang['DELETE_PROCESS_QUEUED'], true, '', true, ADMIN_PATH . '?cp=reports');
	}
}

$query = array(
				'SELECT'	=> '*',
				'FROM'		=> "{$dbprefix}reports r",
				'ORDER BY'	=> 'r.id DESC'
		);

if($current_smt == 'show_h24')
{
	$query['WHERE'] = 'r.time > ' . intval(time() - 3600 * 24);
}


$result = $SQL->build($query);

//pagination
$nums_rows		= $SQL->num($result);
$currentPage	= g('page', 'int', 1);
$pagination		= new pagination($perpage, $nums_rows, $currentPage);
$start			= $pagination->get_start_row();


$no_results	= false;
$del_nums	= array();

if ($nums_rows > 0)
{
	$query['LIMIT']	=	"$start, $perpage";
	$result = $SQL->build($query);

	while($row=$SQL->fetch($result))
	{
		//make new lovely arrays !!
		$reports_for_tpl[$row['id']]	= array(
											'id' 		=> $row['id'],
											'name' 		=> $row['name'],
											'mail' 		=> $row['mail'],
											'url'  		=> $row['url'],
											'text' 		=> nl2br(htmlspecialchars($row['text'])),
											'human_time'=> kleeja_date($row['time']),
											'time' 		=> kleeja_date($row['time'], false),
											'ip'	 	=> $row['ip'],
											'sent'		=> $row['id'] == $msg_sent,
											'ip_finder'	=> 'http://www.ripe.net/whois?form_type=simple&full_query_string=&searchtext=' . htmlspecialchars($row['ip']) . '&do_search=Search'
									);

		$del[$row['id']] = isset($_POST['del_' . $row['id']]) ? $_POST['del_' . $row['id']] : '';
		$sen[$row['id']] = isset($_POST['v_' . $row['id']]) ? $_POST['v_' . $row['id']] : '';

		//when submit !!
		if (isset($_POST['submit']))
		{
			if ($del[$row['id']])
			{
				$del_nums[] = $row['id'];
			}
		}

		if (isset($_POST['reply_submit']))
		{
			if ($sen[$row['id']])
			{
				$to      = $row['mail'];
				$subject = $lang['REPLY_REPORT'] . ':' . $config['sitename'];
				$message = "\n " . $lang['WELCOME'] . " " . $row['name'] . "\r\n " . $lang['U_REPORT_ON'] . " " . $config['sitename']. "\r\n " .
							$lang['BY_EMAIL'] . " : " . $row['mail']."\r\n" . $lang['ADMIN_REPLIED'] . ": \r\n" . $sen[$row['id']] . "\r\n\r\n kleeja.com";

				$send =  send_mail($to, $message, $subject, $config['sitemail'], $config['sitename']);

				if ($send)
				{
					//
					//We will redirect to pages of results and show info msg there !
					//
					kleeja_admin_info($lang['IS_SEND_MAIL'], true, '', true, ADMIN_PATH . '?cp=reports&page=' . (isset($_GET['page']) ? intval($_GET['page']) : 1) . '&sent=' . $row['id']);

				}
				else
				{
					kleeja_admin_err($lang['ERR_SEND_MAIL'], true, '', true, ADMIN_PATH . '?cp=reports&page=' . (isset($_GET['page']) ? intval($_GET['page']) : 1) . '&sent=' . $row['id']);
				}
			}
		}
	}
	$SQL->free($result);
}
else #num rows
{
	$no_results = true;
}

//if deleted
if(sizeof($del_nums))
{
	$query_del	= array(
						'DELETE'	=> "{$dbprefix}reports",
						'WHERE'		=> "id IN('" . implode("', '", $del_nums) . "')"
					);

	$SQL->build($query_del);
}

$total_pages 	= $pagination->get_total_pages();
$page_nums 		= $pagination->print_nums(ADMIN_PATH  . '?cp=reports', 'onclick="javascript:get_kleeja_link($(this).attr(\'href\'), \'#content\'); return false;"');

//after submit
if (isset($_POST['submit']))
{
	$text	= ($SQL->affected() ? $lang['REPORTS_UPDATED'] : $lang['NO_UP_CHANGE_S']);
	$text	.= '<script type="text/javascript"> setTimeout("get_kleeja_link(\'' . $action .  '\'); check_msg_and_reports();", 2000);</script>' . "\n";
	kleeja_admin_info($text, true, '', true,  $action);
}


//secondary menu
$go_menu = array(
				'general' => array('name'=>$lang['R_REPORTS'], 'link'=> ADMIN_PATH . '?cp=reports&amp;smt=general', 'goto'=>'general', 'current'=> $current_smt == 'general'),
				'show_h24' => array('name'=>$lang['SHOW_FROM_24H'], 'link'=> ADMIN_PATH . '?cp=reports&amp;smt=show_h24', 'goto'=>'show_h24', 'current'=> $current_smt == 'show_h24'),
				#TODO : CHECK IF IT'S ALREADY DONE ?
				'del_d30' => array('name'=>$lang['DELETE_EARLIER_30DAYS'], 'link'=> ADMIN_PATH . '?cp=reports&amp;smt=del_d30', 'goto'=>'del_d30', 'current'=> $current_smt == 'del_d30', 'confirm'=>true),
				'del_all' => array('name'=>$lang['DELETE_ALL'], 'link'=> ADMIN_PATH . '?cp=reports&amp;smt=del_all', 'goto'=>'del_all', 'current'=> $current_smt == 'del_all', 'confirm'=>true),
	);

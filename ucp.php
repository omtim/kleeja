<?php
/**
*
* @package Kleeja
* @version $Id: ucp.php 2228 2013-11-17 13:25:48Z saanina $
* @copyright (c) 2007 Kleeja.com
* @license http://www.kleeja.com/license
*
*/


/**
 * We are in ucp.php file, useful for exceptions
 */
define('IN_UCP', true);

/**
 * @ignore
 */
define('IN_KLEEJA', true);
define('PATH', dirname(__FILE__) . DIRECTORY_SEPARATOR);
include PATH . 'includes/common.php';

#to be avaliable for later, extra code between head tag
$extra_code_in_header = '';


($hook = kleeja_run_hook('begin_usrcp_page')) ? eval($hook) : null; //run hook

/**
 * User Control Page
 * ucp.php?go=[...]
 */
switch (g('go', 'str', ''))
{ 
	case 'login' : 

		#page info
		$current_template	= 'login.php';
		$current_title		= $lang['LOGIN'];
		$action				= 'ucp.php?go=login' . (ig('return') ? '&amp;return=' . g('return') : '');
		$forget_pass_link	= !empty($forgetpass_script_path) && (int) $config['user_system'] != 1 ? $forgetpass_script_path : 'ucp.php?go=get_pass';

		#no error yet 
		$ERRORS = false;

		#login variable
		$t_lname = p('lname', 'str', ''); 
		$t_lpass = p('lpass', 'str', ''); 

		($hook = kleeja_run_hook('login_before_submit')) ? eval($hook) : null; //run hook
		
		#already a user? 
		if ($user->is_user())
		{
			($hook = kleeja_run_hook('login_logon_before')) ? eval($hook) : null; //run hook

			$errorpage = true;
			$text	= $lang['LOGINED_BEFORE'] . '<br /> <a href="' . $config['siteurl']  . ($config['mod_writer'] ?  'logout.html' : 'ucp.php?go=logout') . '">' . $lang['LOGOUT'] . '</a>';
			kleeja_info($text);
		}
		elseif (ip('submit'))
		{
			$ERRORS	= array();

			($hook = kleeja_run_hook('login_after_submit')) ? eval($hook) : null; //run hook

			#check for form key
			if(!kleeja_check_form_key('login'))
			{
				$ERRORS['form_key'] = $lang['INVALID_FORM_KEY'];
			}
			elseif($t_lname == '' || $t_lpass == '')
			{
				$ERRORS['empty_fields'] = $lang['EMPTY_FIELDS'];
			}
			elseif(!$user->login($t_lname, $t_lpass, false, p('remme', 'int', 0)))
			{
				$ERRORS['login_check'] = $lang['LOGIN_ERROR'];
			}

			($hook = kleeja_run_hook('login_after_submit2')) ? eval($hook) : null; //run hook

			#if no errors after submit, then ok
			if(empty($ERRORS))
			{
				#redirect to previous page before logining
				if(ig('return'))
				{
					redirect(urldecode(g('return')), true, true);
				}

				$errorpage = true;
				($hook = kleeja_run_hook('login_data_no_error')) ? eval($hook) : null; //run hook

				$text	= $lang['LOGIN_SUCCESFUL'] . ' <br /> <a href="' . $config['siteurl'] . '">' . $lang['HOME'] . '</a>';
				kleeja_info($text, '', true, $config['siteurl'], 1);
			}
		}
		

		break;

		case 'register' : 

		#page info
		$current_template	= 'register.php';
		$current_title	= $lang['REGISTER'];
		$action	= 'ucp.php?go=register';

		#no error yet 
		$ERRORS = false;

		#is regisreation disabled from configuration
		if ($config['register'] != 1 && $config['user_system'] == 1)
		{
			kleeja_info($lang['REGISTER_CLOSED'], $lang['PLACE_NO_YOU']);
		}
		#if Kleeja user system is intgrated into other system, then links of user system goes there
		else if ($config['user_system'] != 1)
		{
			($hook = kleeja_run_hook('register_not_default_sys')) ? eval($hook) : null; //run hook

			if(!empty($register_script_path))
			{
				$goto_forum_link = $register_script_path;
			}
			else
			{
				if(isset($script_path))
				{
					$goto_forum_link = ($config['user_system'] == 'api') ? dirname($script_path) : $script_path;
					if($config['user_system'] == 'phpbb' || ($config['user_system'] == 'api' && strpos($script_path, 'phpbb') !== false))
					{
						$goto_forum_link .= '/ucp.php?mode=register';
					}
					else if($config['user_system'] == 'vb' || ($config['user_system'] == 'api' && strpos($script_path, 'vb') !== false))
					{
						$goto_forum_link .= '/register.php';
					}
				}
				else
				{
					$goto_forum_link = '...';
				}
			}

			kleeja_info('<a href="' . $goto_forum_link . '" title="' . $lang['REGISTER'] . '" target="_blank">' . $lang['REGISTER']. '</a>', $lang['REGISTER']);
		}

		#already a user
		if ($user->is_user())
		{
			($hook = kleeja_run_hook('register_logon_before')) ? eval($hook) : null; //run hook
			kleeja_info($lang['REGISTERED_BEFORE']);
		}

		#get the form variables
		$t_lname = p('lname', 'str', '');
		$t_lpass = p('lpass', 'str', '');
		$t_lpass2 = p('lpass2', 'str', '');
		$t_lmail = p('lmail', 'mail', '');

		#no form submit yet
		if (!ip('submit'))
		{
			($hook = kleeja_run_hook('register_no_submit')) ? eval($hook) : null; //run hook
		}
		#form submit
		else
		{	
			$ERRORS = array();

			($hook = kleeja_run_hook('register_submit')) ? eval($hook) : null; //run hook

			#check for form key
			if(!kleeja_check_form_key('register'))
			{
				$ERRORS['form_key'] = $lang['INVALID_FORM_KEY'];
			}
			if(!kleeja_check_captcha())
			{
				$ERRORS['captcha'] = $lang['WRONG_VERTY_CODE'];
			}
			if ($t_lname == '' || $t_lpass == '' || $t_lmail == '')
			{
				$ERRORS['empty_fields'] = $lang['EMPTY_FIELDS'];
			}
			if ($t_lpass != $t_lpass2)
			{
				$ERRORS['pass_neq_pass2'] = $lang['PASS_NEQ_PASS2'];
 			}
			if (!$t_lmail)
			{
				$ERRORS['lmail'] = $lang['WRONG_EMAIL'];
			}
			if (strlen($t_lname) < 3 || strlen($t_lname) > 50)
			{
				$ERRORS['lname'] = $lang['WRONG_NAME'];
			}

			#no errors? then check if the username or the mail exists in our DB before
			if(empty($ERRORS))
			{
				$query_chk	= array(
							'SELECT'	=> 'u.clean_name, u.mail',
							'FROM'		=> "{$dbprefix}users u",
							'WHERE'		=> "u.clean_name='" . $SQL->escape($user->cleanusername($t_lname)) . "' OR u.mail='" . strtolower($SQL->escape($t_lmail)) . "'",
						);
	
				($hook = kleeja_run_hook('register_query_chk')) ? eval($hook) : null; //run hook

				$result_chk		= $SQL->build($query_chk);
				if($SQL->num($result_chk))
				{
					$data_chk = $SQL->fetch($result_chk);
					
					#well, this username exists before!
					if($data_chk['clean_name'] == $user->cleanusername($t_lname))
					{
						$ERRORS['name_exists_before'] = $lang['EXIST_NAME'];
					}

					#the email exists before
					if($data_chk['mail'] == strtolower($t_lmail))
					{
						$ERRORS['mail_exists_before'] = $lang['EXIST_EMAIL'];
					}
					
				}
			}

			($hook = kleeja_run_hook('register_submit2')) ? eval($hook) : null; //run hook

			#no errors, lets do process
			if(empty($ERRORS))	 
			{
				$name		= $SQL->escape($t_lname);
				$user_salt	= substr(base64_encode(pack("H*", sha1(mt_rand()))), 0, 7);
				$pass		= $SQL->escape($user->kleeja_hash_password($t_lpass . $user_salt));
				$mail		= $SQL->escape($t_lmail);
				$session_id	= session_id();
				$clean_name	= $user->cleanusername($name);

				$insert_query	= array(
								'INSERT'	=> 'name ,password, password_salt ,mail, register_time, session_id, clean_name, group_id',
								'INTO'		=> "{$dbprefix}users",
								'VALUES'	=> "'$name', '$pass', '$user_salt', '$mail', " . time() . ", '$session_id','$clean_name', " . intval($config['default_group'])
							);

				($hook = kleeja_run_hook('qr_insert_new_user_register')) ? eval($hook) : null; //run hook

				if ($SQL->build($insert_query))
				{
					$last_user_id = $SQL->insert_id();
					$text = $lang['REGISTER_SUCCESFUL'] . ' <br /> <a href="' . $config['siteurl'] . '">' . $lang['HOME'] . '</a>';

					#update number of users in our stats
					$update_query	= array(
											'UPDATE'	=> "{$dbprefix}stats",
											'SET'		=> "users=users+1, lastuser='$name'",
											);

					($hook = kleeja_run_hook('ok_added_users_register')) ? eval($hook) : null; //run hook

					if($SQL->build($update_query))
					{
						#refresh stats cache
						delete_cache('data_stats');
					}

					#auto login after registration and redirect to index
					$user->login($t_lname, $t_lpass, false, false);
					kleeja_info($text, '', true, $config['siteurl'], 3);
				}
			}
		}

		break;

		case 'logout':
		
		($hook = kleeja_run_hook('begin_logout')) ? eval($hook) : null; //run hook

		if ($user->logout())
		{
			$text = $lang['LOGOUT_SUCCESFUL'] . '<br /> <a href="' .  $config['siteurl']  . '">' . $lang['HOME'] . '</a>';
			kleeja_info($text, $lang['LOGOUT'], true, $config['siteurl'], 1);
		}
		else
		{
			kleeja_error($lang['LOGOUT_ERROR']);
		}

		($hook = kleeja_run_hook('end_logout')) ? eval($hook) : null; //run hook
		
		break;


		case 'fileuser': 

		($hook = kleeja_run_hook('begin_fileuser')) ? eval($hook) : null; //run hook

		
		include PATH . 'includes/functions/functions_files.php';
		
		#page info
		$current_template	= 'fileuser.php';

		$user_id_get	= g('id', 'int', false);
		$user_id		= !$user_id_get && $user->is_user() ? $user->data['id'] : $user_id_get;
		$user_himself	= $user->data['id'] == $user_id;
		$action			= $config['siteurl'] . 'ucp.php?go=fileuser' . (ig('page') ? '&amp;page=' . g('page', 'int') : '');

		#not a user and no id to view
		if (!$user->is_user() && !ig('id'))
		{
			kleeja_error($lang['USER_PLACE'], $lang['PLACE_NO_YOU'], true, 'index.php');
		}

		#Not allowed to browse files's folders
		if (!user_can('access_fileusers') && !$user_himself)
		{
			($hook = kleeja_run_hook('user_cannot_access_fileusers')) ? eval($hook) : null; //run hook
			kleeja_info($lang['HV_NOT_PRVLG_ACCESS'], $lang['HV_NOT_PRVLG_ACCESS']);
		}

		#Not allowed to access this page ?
		if (!user_can('access_fileuser') && $user_himself)
		{
			($hook = kleeja_run_hook('user_cannot_access_fileuser')) ? eval($hook) : null; //run hook
			kleeja_info($lang['HV_NOT_PRVLG_ACCESS'], $lang['HV_NOT_PRVLG_ACCESS']);
		}

		#fileuser is closed ?
		if ((int) $config['enable_userfile'] != 1 && !user_can('enter_acp'))
		{
			kleeja_info($lang['USERFILE_CLOSED'], $lang['CLOSED_FEATURE']);
		}

		#get user options and name
		$data_user = $config['user_system'] == 1 ? $user->get_data('name, show_my_filecp', $user_id) : array('name' => $user->usernamebyid($user_id), 'show_my_filecp' => '1');

		#if there is no username, then there is no user at all
		if(!$data_user['name'])
		{
			kleeja_error($lang['NOT_EXSIT_USER'], $lang['PLACE_NO_YOU']);
		}

		#this user closed his folder, and it's not the current user folder
		if(!$data_user['show_my_filecp'] && ($user->id() != $user_id) && !user_can('enter_acp'))
		{
			kleeja_info($lang['USERFILE_CLOSED'], $lang['CLOSED_FEATURE']);
		}


		$query	= array(
					'SELECT'	=> 'f.id, f.name, f.real_filename, f.folder, f.type, f.uploads, f.time, f.size',
					'FROM'		=> "{$dbprefix}files f",
					'WHERE'		=> 'f.user=' . $user_id,
					'ORDER BY'	=> 'f.id DESC'
				);

		#set variables
		$perpage		= 16;
		$result_p		= $SQL->build($query);
		$nums_rows		= $SQL->num($result_p);
		$current_page	= g('page', 'int', 1);
		$pagination		= new pagination($perpage, $nums_rows, $current_page);
		$start			= $pagination->get_start_row();

		$your_fileuser_link= $config['siteurl'] . ($config['mod_writer'] ? 'fileuser-' . $user->data['id'] . '.html' : 'ucp.php?go=fileuser&amp;id=' .  $user->data['id']);
		$total_pages	= $pagination->get_total_pages(); 
		$pagination_link= $config['siteurl'] . ($config['mod_writer'] ?  'fileuser-' . $user_id  . '-'  : 'ucp.php?go=fileuser&amp;id=' . $user_id);
		$linkgoto		= $config['siteurl'] . ($config['mod_writer'] ?  'fileuser-' . $user_id  . '-' . $current_page . '.html' : 'ucp.php?go=fileuser&amp;id=' . $user_id . '&amp;page=' . $current_page);
		$page_nums		= $pagination->print_nums($pagination_link);
 
		$no_results = true;

		if((int) $config['user_system'] != 1 && ($user->data['id'] != $user_id))
		{
			$data_user['name'] = $user->usernamebyid($user_id);
		}
		$username = !$data_user['name'] ? false : $data_user['name'];

		#set page title
		$current_title	= $lang['FILEUSER'] . ': ' . $username;

		#there is result ? show them
		if($nums_rows)
		{
			$no_results = false;

			$query['LIMIT'] = "$start, $perpage";
			($hook = kleeja_run_hook('qr_select_files_in_fileuser')) ? eval($hook) : null; //run hook

			$result	= $SQL->build($query);

			$i = ($current_page * $perpage) - $perpage;
			$sizes = $num = $files_num = $imgs_num = 0;
			if (ip('submit_files') && $user_himself)
			{
				while($row=$SQL->fetch($result))
				{
					++$i;
					$sizes = 0;
				
				
					($hook = kleeja_run_hook('submit_in_fileuser')) ? eval($hook) : null; //run hook	

					//check for form key
					if(!kleeja_check_form_key('fileuser', 1800 /* half hour */))
					{
						kleeja_info($lang['INVALID_FORM_KEY']);
					}

					if (ip('del_' . $row['id']))
					{
						#/delete from folder .. 
						kleeja_unlink($row['folder'] . '/' . $row['name']);

						#delete thumb
						if (file_exists($row['folder'] . '/thumbs/' . $row['name'] ))
						{
							kleeja_unlink($row['folder'] . '/thumbs/' . $row['name'] );
						}

						$ids[] = $row['id'];
						if(is_image($row['type']))
						{
							$imgs_num++;
						}
						else
						{
							$files_num++;
						}

						$sizes += $row['size'];
					}#if ip del_
				}#while
			}#if submit

			#$SQL->free($result_p);
			#$SQL->free($result);

			#after submit
			if(ip('submit_files') && $user_himself)
			{
				#no files to delete
				if(isset($ids) && !empty($ids))
				{
					$query_del = array(
								'DELETE'	=> "{$dbprefix}files",
								'WHERE'		=> "id IN (" . implode(',', $ids) . ")"
							);

					($hook = kleeja_run_hook('qr_del_files_in_filecp')) ? eval($hook) : null; //run hook	
					$SQL->build($query_del);

					if(($files_num <= $stat_files) && ($imgs_num <= $stat_imgs))
					{
						#update files stats
						$update_query	= array(
											'UPDATE'	=> "{$dbprefix}stats",
											'SET'		=> "sizes=sizes-$sizes,files=files-$files_num, imgs=imgs-$imgs_num",
										);

						$SQL->build($update_query);
					}

					#delete went ok
					kleeja_info($lang['FILES_DELETED'], '', true, $linkgoto, 2);
				}
				else
				{
					#no files were selected
					kleeja_info($lang['NO_FILE_SELECTED'], '', true, $linkgoto, 2);
				}
			}
		}#num if

		($hook = kleeja_run_hook('end_fileuser')) ? eval($hook) : null; //run hook

		break;

		case 'profile':
		
		#not a user
		if (!$user->data['name'])
		{
			kleeja_info($lang['USER_PLACE'], $lang['PLACE_NO_YOU']);
		}

		#page info
		$current_template = 'profile.php';
		$current_title		= $lang['PROFILE'];
		extract($user->get_data('show_my_filecp, password_salt'));
		$data_forum		= (int) $config['user_system'] == 1 ? true : false ;

		#no error yet 
		$ERRORS = false;

		#path to profile page if Kleeja user system is not the default
		if(!empty($profile_script_path))
		{
			$goto_forum_link = $profile_script_path;
		}
		else
		{
			if(isset($script_path))
			{
				$goto_forum_link = ($config['user_system'] == 'api') ? dirname($script_path) : $script_path;
				if($config['user_system'] == 'phpbb' || ($config['user_system'] == 'api' && strpos(strtolower($script_path), 'phpbb') !== false))
				{
					$goto_forum_link .= '/ucp.php?i=164';
				}
				else if($config['user_system'] == 'vb' || ($config['user_system'] == 'api' && strpos(strtolower($script_path), 'vb') !== false))
				{
					$goto_forum_link .= '/profile.php?do=editprofile';
				}
			}
			else
			{
				$goto_forum_link = '...';
			}
		}
		
		#if not default user system, then redirect the user to panel of that system
		if($config['user_system'] != 1)
		{
			kleeja_info('<a href="' . $goto_forum_link . '">' . $lang['PFILE_4_FORUM'] . '</a>');
		}

		#getting form variables
		$t_pppass_old	= p('pppass_old', 'str', '');
		$t_ppass_old	= p('ppass_old', 'str', '');
		$t_ppass_new	= p('ppass_new', 'str', '');
		$t_ppass_new2	= p('ppass_new2', 'str', '');
		$t_pmail		= p('pmail', 'mail', $user->data['mail']);
		$t_show_my_filecp= p('show_my_filecp', 'bool', false);

		($hook = kleeja_run_hook('no_submit_profile')) ? eval($hook) : null; //run hook

		# after submit
		if (ip('submit_data'))
		{
			$ERRORS	= array();

			($hook = kleeja_run_hook('submit_profile')) ? eval($hook) : null; //run hook

			//check for form key
			if(!kleeja_check_form_key('profile'))
			{
				$ERRORS['form_key'] = $lang['INVALID_FORM_KEY'];
			}

			#if there is new password AND new pass1 = new pass2 AND old password is exists & true
			if($t_ppass_new != '')
			{
				if($t_ppass_new != $t_ppass_new2)
				{
					$ERRORS['pass1_neq_pass2'] = $lang['PASS_O_PASS2'];
				}
				#if current password is not correct
				elseif($t_ppass_old == '' || !$user->kleeja_hash_password($t_ppass_old . $password_salt, $userinfo['password']))
				{
					$ERRORS['curnt_old_pass'] = $lang['CURRENT_PASS_WRONG'];
				}
			}

			#if email is not equal to current email AND email not exists before
			$new_mail = false;
			if($user->data['mail'] != $t_pmail)
			{
				#if current pass is not correct
				if($t_pppass_old == '' || !$user->kleeja_hash_password($t_pppass_old . $password_salt, $userinfo['password']))
				{
					$ERRORS['curnt_old_pass'] = $lang['CURRENT_PASS_WRONG'];
				}
				#If email is not valid
				elseif($t_pmail == '' || !$t_pmail)
				{
					$ERRORS['wrong_email'] = $lang['WRONG_EMAIL'];
				}
				
				#if email is ok, check if already exists
				if(!isset($ERRORS['wrong_email']))
				{
					#if email already exists
					$query_chk	= array(
								'SELECT'	=> 'u.mail',
								'FROM'		=> "{$dbprefix}users u",
								'WHERE'		=> "u.mail='" . $SQL->escape($t_pmail) . "'",
							);
	
					($hook = kleeja_run_hook('profile_query_chk')) ? eval($hook) : null; //run hook

					$result_chk	= $SQL->build($query_chk);
					if($SQL->num($result_chk))
					{
						$ERRORS['mail_exists_before'] = $lang['EXIST_EMAIL'];
					}
				}
				
				#set the new email to be the use email
				$new_mail = true;
			}

			($hook = kleeja_run_hook('submit_profile2')) ? eval($hook) : null; //run hook

			#no errors , do it
			if(empty($ERRORS))
			{
				$user_salt 	= substr(base64_encode(pack("H*", sha1(mt_rand()))), 0, 7);
				$mail		= $new_mail ? "mail='" . $SQL->escape($t_pmail) . "'" : '';
				$showmyfile	= $t_show_my_filecp != $show_my_filecp ?  ($mail == '' ? '': ',') . "show_my_filecp='" . $t_show_my_filecp . "'" : '';
				$pass		= $t_ppass_new != '' ? ($showmyfile != ''  || $mail != '' ? ',' : '') . "password='" . $SQL->escape($user->kleeja_hash_password($t_ppass_new . $user_salt)) . 
								"', password_salt='" . $user_salt . "'" : "";
				$id			= $user->data['id'];

				$update_query	= array(
								'UPDATE'	=> "{$dbprefix}users",
								'SET'		=> $mail . $showmyfile . $pass,
								'WHERE'		=> 'id=' . $id,
								);

				($hook = kleeja_run_hook('qr_update_data_in_profile')) ? eval($hook) : null; //run hook

				if(trim($update_query['SET']) == '')
				{
					$text = $lang['DATA_CHANGED_NO'];
				}
				else
				{
					$text = $lang['DATA_CHANGED_O_LO'];
					$SQL->build($update_query);
				}

				kleeja_info($text, '', true, get_url_of('profile'));
			}

		}#else submit

		($hook = kleeja_run_hook('end_profile')) ? eval($hook) : null; //run hook

		break; 


		case 'get_pass' : 

		#if not default system, let's give him a link for integrated script
		if ($config['user_system'] != 1)
		{
			$text = '<a href="' . (!empty($forgetpass_script_path) ? $forgetpass_script_path : $script_path) . '">' . $lang['LOST_PASS_FORUM'] . '</a>';
			kleeja_info($text, $lang['PLACE_NO_YOU']);
		}

		#page info
		$current_template	= 'get_pass.php';
		$current_title		= $lang['GET_LOSTPASS'];
		$action	= 'ucp.php?go=get_pass'; 
		#no error yet 
		$ERRORS = false;


		# As in ucp.php?go=get_pass&activation_key=1af3405662ec373d672d003cf27cf998&uid=1 
		if(ig('activation_key') && ig('uid'))
		{
			($hook = kleeja_run_hook('get_pass_activation_key')) ? eval($hook) : null; //run hook

			$h_key = preg_replace('![^a-z0-9]!', '', g('activation_key', 'str'));
			$u_id = g('uid', 'int');

			#if it's empty ? 
			if(trim($h_key) == '')
			{	
				big_error('No hash key', 'This is not a good link for activation ... Try again!');
			}

			$query	= array(
						'SELECT'	=> 'new_password',
						'FROM'		=> "{$dbprefix}users",
						'WHERE'		=> "hash_key='" . $SQL->escape($h_key) . "' AND id=" . $u_id,
					);
	
			($hook = kleeja_run_hook('get_pass_f_query')) ? eval($hook) : null; //run hook

			$result= $SQL->build($query);

			if($SQL->num($result))
			{
				$npass = $SQL->fetch($result);
				$npass = $npass['new_password'];

				#user password now will be set to the new password
				$update_query = array(
								'UPDATE'=> "{$dbprefix}users",
								'SET'	=> "password = '" . $npass . "', new_password = '', hash_key = ''",
								'WHERE'	=> 'id=' . $u_id,
							);

				($hook = kleeja_run_hook('qr_update_newpass_activation')) ? eval($hook) : null; //run hook

				$SQL->build($update_query);

				#show message and exit
				$text = $lang['OK_APPLY_NEWPASS'] . '<br /><a href="' . $config['siteurl']  . ($config['mod_writer'] ?  'login.html' : 'ucp.php?go=login') . '">' . $lang['LOGIN'] . '</a>';
				kleeja_info($text);
			}

			#end of activation and setting the password, exit
			redirect($config['siteurl'], true, true);
		}

		#logon already
		if ($user->is_user())
		{
			($hook = kleeja_run_hook('get_pass_logon_before')) ? eval($hook) : null; //run hook
			kleeja_info($lang['LOGINED_BEFORE']);
		}

		#set variables
		$t_rmail = p('rmail', 'mail', false); 

		#no submit yet
		if (!ip('submit'))
		{
			($hook = kleeja_run_hook('no_submit_get_pass')) ? eval($hook) : null; //run hook
		}
		#submited
		else
		{ 
			$ERRORS	= array();

			($hook = kleeja_run_hook('submit_get_pass')) ? eval($hook) : null; //run hook
			//check for form key
			if(!kleeja_check_form_key('get_pass'))
			{
				$ERRORS['form_key'] = $lang['INVALID_FORM_KEY'];
			}
			if(!kleeja_check_captcha())
			{
				$ERRORS['captcha'] = $lang['WRONG_VERTY_CODE'];
			}
			if (!$t_rmail)
			{
				$ERRORS['rmail'] = $lang['WRONG_EMAIL'];
			}
			else 
			{
				#if email not exists
				$query_chk	= array(
							'SELECT'	=> 'u.mail',
							'FROM'		=> "{$dbprefix}users u",
							'WHERE'		=> "u.mail='" . strtolower($SQL->escape($t_rmail)) . "'",
						);

				($hook = kleeja_run_hook('get_pass_query_chk')) ? eval($hook) : null; //run hook

				$result_chk	= $SQL->build($query_chk);
				if(!$SQL->num($result_chk))
				{
					$ERRORS['no_rmail'] = $lang['WRONG_DB_EMAIL'];
				}
			}

			($hook = kleeja_run_hook('submit_get_pass2')) ? eval($hook) : null; //run hook

			#no errors, lets do it
			if(empty($ERRORS))
			{
				$query	= array(
								'SELECT'=> 'u.*',
								'FROM'	=> "{$dbprefix}users u",
								'WHERE'	=> "u.mail='" .  $SQL->escape($t_rmail) . "'"
						);

				($hook = kleeja_run_hook('qr_select_mail_get_pass')) ? eval($hook) : null; //run hook
				$result	=	$SQL->build($query);
	
				$row = $SQL->fetch($result);

				#generate new password
				$chars = 'abcdefghijklmnopqrstuvwxyz0123456789';
				$newpass = '';
				for ($i = 0; $i < 7; ++$i)
				{
					$newpass .= substr($chars, (mt_rand() % strlen($chars)), 1);
				}

				$hash_key = md5($newpass . time());
				$pass		= (string) $user->kleeja_hash_password($SQL->escape($newpass) . $row['password_salt']);
				$to		= $row['mail'];
				$subject	= $lang['GET_LOSTPASS'] . ':' . $config['sitename'];
				$activation_link = $config['siteurl'] . 'ucp.php?go=get_pass&activation_key=' . urlencode($hash_key) . '&uid=' . $row['id'];
				$message	= "\n " . $lang['WELCOME'] . " " . $row['name'] . "\r\n " . sprintf($lang['GET_LOSTPASS_MSG'], $activation_link, $newpass)  . "\r\n\r\n kleeja.com";

				$update_query	= array(
								'UPDATE'=> "{$dbprefix}users",
								'SET'	=> "new_password = '" . $SQL->escape($pass) . "', hash_key = '" . $hash_key . "'",
								'WHERE'	=> 'id=' . $row['id'],
							);

				($hook = kleeja_run_hook('qr_update_newpass_get_pass')) ? eval($hook) : null; //run hook
				$SQL->build($update_query);

				$SQL->free($result);

				#send it to the user with an activation link
				$send =  send_mail($to, $message, $subject, $config['sitemail'], $config['sitename']);

				if(!$send)
				{
					kleeja_error($lang['CANT_SEND_NEWPASS']);
				}
				else
				{
					$text	= $lang['OK_SEND_NEWPASS'] . '<br /><a href="' . $config['siteurl']  . ($config['mod_writer'] ?  'login.html' : 'ucp.php?go=login') . '">' . $lang['LOGIN'] . '</a>';
					kleeja_info($text);	
				}
			}
		}

		($hook = kleeja_run_hook('end_get_pass')) ? eval($hook) : null; //run hook

		break; 
		

		//
		// add your own code here
		//
		default:

		($hook = kleeja_run_hook('default_usrcp_page')) ? eval($hook) : null; //run hook

		kleeja_error($lang['ERROR_NAVIGATATION']);

		break;
}#end switch

($hook = kleeja_run_hook('end_usrcp_page')) ? eval($hook) : null; //run hook


#no template, no title, set them to default
$current_title = empty($current_title) ? $lang['USERS_SYSTEM'] : $current_title;
$current_template = empty($current_template) ? 'info.php' : $current_template;


#header
kleeja_header($current_title, $extra_code_in_header);
#page template
include get_template_path($current_template);
#footer
kleeja_footer();



<?php if(!defined('IN_KLEEJA')) { exit; } ?>

<!-- register template -->
<div id="content" class="border_radius">

	<!-- title -->
	<h1 class="title">&#9679; <?=$current_title?></h1>
	<!-- @end-title -->

	<!-- line top -->
		<div class="line"></div>
	<!-- @end-line -->

	<!-- msg, Infos & Alerts & Errors -->
	<?php if($ERRORS):?>
	<dl id="system-message">
		<dd class="error">
			<ul>
				<?php foreach($ERRORS as $n=>$error):?>
				<li> <strong><?=$lang['INFORMATION']?> </strong> <?=$error?></li>
				<?php endforeach;?>
			</ul>
		</dd>
	</dl>
	<?php endif;?>
	<!-- @end-msg -->


	<!-- form register -->
	<form action="<?=$action?>" method="post">
	
		<div class="register">
			<label><?=$lang['USERNAME']?> :</label>
			<input type="text" name="lname" value="<?=$t_lname?>" size="30" tabindex="1" />
			<label><?=$lang['PASSWORD']?> :</label>
			<input type="password" name="lpass" value="<?=$t_lpass?>" size="30" tabindex="2" />
			<label><?=$lang['REPEAT_PASS']?> :</label>
			<input type="password" name="lpass2" value="<?=$t_lpass2?>" size="30" tabindex="3" />
			<label><?=$lang['EMAIL']?> :</label>
			<input type="text" name="lmail" value="<?=$t_lmail?>" size="30" style="direction:ltr" tabindex="4" />
		</div>
		
		<div class="clr"></div>
		
		<!-- verification code -->
		<?php if($config['enable_captcha']):?>
		<div class="safe_code">
			<p><?=$lang['VERTY_CODE']?></p>
			<div class="clr"></div>
			<div>
				<img style="vertical-align:middle;" id="kleeja_img_captcha" src="<?=$captcha_file_path?>" alt="<?=$lang['REFRESH_CAPTCHA']?>" title="<?=$lang['REFRESH_CAPTCHA']?>" onclick="javascript:update_kleeja_captcha('<?=$captcha_file_path?>', 'kleeja_code_answer');" />
				<input type="text" name="kleeja_code_answer" id="kleeja_code_answer" tabindex="5" />
			</div>
			<div class="clr"></div>
			<p class="explain"><?=$lang['NOTE_CODE']?></p>
		</div>
		<?php endif;?>
		<!-- @end-verification-code -->

		<div class="clr"></div>

		<?=kleeja_add_form_key('register');?>

		<input type="submit" name="submit" value="<?=$lang['REGISTER']?>" tabindex="6" />

	</form>
	<!-- @end-form-register -->
	
	<div class="clr"></div>
  
</div>
<!-- @end-register-template -->
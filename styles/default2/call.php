<?php if(!defined('IN_KLEEJA')) { exit; } ?>

<!-- Contact Us template -->

<!-- title -->
<h1><?=$current_title?></h1>

	<!-- msg, Infos & Alerts & Errors -->
	<?php if($ERRORS):?>
	<dl id="system-message">
		<dd class="alert alert-danger">
			<ul>
				<?php foreach($ERRORS as $n=>$error):?>
				<li> <strong><?=$lang['INFORMATION']?> </strong> <?=$error?></li>
				<?php endforeach;?>
			</ul>
		</dd>
	</dl>
	<?php endif;?>
	

<!-- form Contact Us -->
<form action="<?=$action?>" method="post">
		
	    <div class="form-group<?=(isset($ERRORS['cname']) ? ' has-error':'')?>">
	      <label for="cname"><?=$lang['YOURNAME']?></label>
	      <input type="text" class="form-control" id="cname" name="cname" placeholder="<?=$t_cname?>">
	    </div>
		
	    <div class="form-group<?=(isset($ERRORS['cmail']) ? ' has-error':'')?>">
	      <label for="cmail"><?=$lang['EMAIL']?></label>
	      <input type="text" class="form-control" id="cmail" name="cmail" placeholder="<?=$t_cname?>">
	    </div>
		
	    <div class="form-group<?=(isset($ERRORS['ctext']) ? ' has-error':'')?>">
	      <label for="ctext"><?=$lang['TEXT']?></label>
		  <textarea class="form-control" name="ctext" id="ctext" rows="3"><?=$t_ctext?></textarea>
		</div>
		


		<!-- verification code -->
		<?php if($config['enable_captcha']):?>
		    <div class="form-group<?=(isset($ERRORS['captcha']) ? ' has-error':'')?>">
		      <label for="kleeja_code_answer"><?=$lang['VERTY_CODE']?></label>
			 
   			  <img style="" id="kleeja_img_captcha" src="<?=$captcha_file_path?>" alt="<?=$lang['REFRESH_CAPTCHA']?>" title="<?=$lang['REFRESH_CAPTCHA']?>" onclick="javascript:update_kleeja_captcha('<?=$captcha_file_path?>', 'kleeja_code_answer');">
			  <input type="text" class="form-control" name="kleeja_code_answer" id="kleeja_code_answer" aria-describedby="helpBlock">
		  
			  <span id="helpBlock" class="help-block"><?=$lang['NOTE_CODE']?></span>
			</div>
		<?php endif;?>

	    <input type="submit" name="submit" value="<?=$lang['SEND']?>" class="btn btn-default">
		

		<?=kleeja_add_form_key('call')?>

</form>
	<!-- @end-form -->
	




<form method="post" action="<?=$action?>" id="extra_form">
<?php if($current_smt == 'he'):?>
<!-- header extra -->
<div class="page-header">
<h1><?=$lang['ADD_HEADER_EXTRA']?></h1>
</div>
<div class="big-box">


<h3><?=$lang['EX_HEADER_N']?></h3>

<!-- textarea header -->
<textarea id="ex_header" name="ex_header" style="height:210px;direction:ltr;"  class="editor"><?=$ex_header?></textarea>




<?php elseif($current_smt == 'fe'):?>
<!-- footer extra -->
<div class="page-header">
<h1><?=$lang['ADD_FOOTER_EXTRA']?></h1>
</div>

<h3><?=$lang['EX_FOOTER_N']?></h3>

<!-- textarea footer -->
<textarea id="ex_footer" name="ex_footer" style="height: 210px;direction:ltr;" class="editor"><?=$ex_footer?></textarea>

<?php endif;?>

<div class="br"></div>

<!-- button -->
<p>
	<input type="hidden" name="submit" value="1" />
	<button type="submit" id="submit" name="submit" class="btn btn-primary btn-lg"><span><?=$lang['UPDATE_EXTRA']?></span></button>
</p>

<?=$H_FORM_KEYS?>
</form>
</div>
<!-- the big box end -->



<!-- the big box begin -->
</head>
   <div class="tit_con">
<h1><?=$lang['R_RULES']?></h1>
   </div>
<div class="big-box">
<p class="lead"><?=$lang['RULES_EXP']?></p>


<form method="post" action="<?=$action?>" id="rules_form">

<!-- textarea -->
<textarea name="rules_text" id="rules_text" style="direction:ltr; max-height: 260px;height: 260px; width:100%;" class="form-control"><?=$rules?></textarea>

<div class="br"></div>

<!-- button -->
<hr><p>
	<input type="hidden" name="submit" value="1" />
	<button type="submit" id="submit" name="submit" class="btn btn-primary btn-lg"><span><?=$lang['UPDATE_RULES']?></span></button></p>

    <?=$H_FORM_KEYS?>
</form>
</div>
<!-- the big box end -->

<!-- markItUp! -->
<script type="text/javascript" src="{STYLE_PATH_ADMIN}js/markitup/jquery.markitup.pack.js"></script>

<head>
<link rel="stylesheet" type="text/css" href="{STYLE_PATH_ADMIN}js/markitup/skins/markitup/style.css" />
<link rel="stylesheet" type="text/css" href="{STYLE_PATH_ADMIN}js/markitup/sets/default/style.css" />
<script type="text/javascript" src="{STYLE_PATH_ADMIN}js/markitup/sets/default/set.js"></script>
<script type="text/javascript">
<!--
$(document).ready(function() { $('#template_content').markItUp(mySettings); });
-->
</script>
<!-- / markItUp! -->

</head>
   
<h1><a href="./?cp=m_styles" onclick="javascript:get_kleeja_link(this.href, '#content'); return false;">{lang.R_STYLES}</a> &raquo; {lang.EDIT}</h1>
   <div class="tit_con">
<p class="lead text-success">{tpl_path}</p><hr>
    </div>
<form method="post" action="{action}" id="edit_form">

<!-- textarea -->
<textarea name="template_content" id="template_content"  style="direction:ltr;width: 100%; height: 250px; max-height:250px;" class="form-control">{template_content}</textarea>

<input type="hidden" name="style_id" value="{style_id}" />
<input type="hidden" name="tpl_choose" value="{tpl_name}" />

<div class="br"></div>

<IF NAME="not_style_writeable">
<div class="note-info">{lang.STYLE_DIR_NOT_WR} !</div>
<ELSE>
<!-- button -->
<hr><p class="submit">
	<input type="hidden" name="tpl_edit_submit" value="1" />
	<button type="submit" id="submit" name="tpl_edit_submit" class="btn btn-primary btn-lg" onclick="javascript:submit_kleeja_data('#edit_form', '#content', 0); return false;"><span>{lang.SUBMIT}</span></button>
</p>

</IF>

{H_FORM_KEYS}
</form>

</div><!-- end template Extra header and footer  -->

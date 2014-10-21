
<!-- the big box begin -->
<div class="big-box">
<h1><a href="./?cp=m_styles" onclick="javascript:get_kleeja_link(this.href, '#content'); return false;">{lang.R_STYLES}</a> &raquo; {lang.KLJ_STYLE_INFO}</h1>

<!-- start data table -->
<table class="table table-bordered table-striped">
	<IF NAME="style_details.desc != '[!]'">
	<tr class="first">
		<td colspan="2">{style_details.desc}</td>
	</tr>
	</IF>
	<tr style="background-color:#F5F5F5">
		<td>{lang.STYLE_NAME}</td>
		<td>{style_details.name}</td>
	</tr>
	<tr style="background-color:#F5F5F5">
		<td>{lang.STYLE_COPYRIGHT}</td>
		<td>{style_details.copyright}</td>
	</tr>
	<tr style="background-color:#F5F5F5">
		<td>{lang.STYLE_VERSION}</td>
		<td>{style_details.version}</td>
	</tr>
	<tr style="background-color:#F5F5F5">
		<td>{lang.STYLE_DEPEND_ON}</td>
		<td>{style_details.depend_on}</td>
	</tr>
</table>
<!-- start data table -->
</div>
<!-- the big box end -->

<div class="br"></div>
<div class="hr"></div>

<!-- show templates -->
<!-- the big box begin -->
<div class="big-box">
<h1>{lang.SHOW_TPLS} &raquo; {style_id}</h1>

<!-- start showtpl table -->
<table>
	<tr >
	<td style="text-align:(lang.DIR==ltr?left:right);">
		<IF NAME="not_style_writeable"><div class="not-info">{lang.STYLE_DIR_NOT_WR} !</div></IF>
		<select name="tpl_choose" size="11" class="s_tpl_x" id="tpl_choose" class="form-control">
			<optgroup class="TPLS_RE_BASIC" LABEL="{lang.TPLS_RE_BASIC}" style="direction:{lang.DIR}">
			<LOOP NAME="tpls_basic">
			<option value="{{template_name}}"<IF LOOP="template_name==header.html"> selected="selected"</IF>>{{template_name}}</option>
			</LOOP>
			</optgroup>
			<optgroup LABEL="{lang.TPLS_RE_MSG}" style="direction:{lang.DIR}">
			<LOOP NAME="tpls_msg">
			<option value="{{template_name}}">{{template_name}}</option>
			</LOOP>
			</optgroup>
			<optgroup LABEL="{lang.TPLS_RE_USER}" style="direction:{lang.DIR}">
			<LOOP NAME="tpls_user">
			<option value="{{template_name}}">{{template_name}}</option>
			</LOOP>
			</optgroup>
			<optgroup LABEL="{lang.TPLS_RE_OTHER}" style="direction:{lang.DIR}">
			<LOOP NAME="tpls_other">
			<option value="{{template_name}}">{{template_name}}</option>
			</LOOP>
			</optgroup>
		</select>

		<br /><br />
		<input name="method" value="1" type="radio" checked="checked" /> {lang.EDIT}
		<br /><hr>
		<input name="method" value="2" type="radio" /> {lang.DELETE}<hr>
		<input type="hidden" name="style_id" value="{style_id}" />
	</td>
	</tr>
</table>
<!-- end showtpl table -->


<!-- button -->
<p class="submit">
	<input type="hidden" name="tpls_submit" value="1" />
	<button type="submit" id="submit" name="tpls_submit" class="btn btn-primary btn-lg" onclick="javascript:get_kleeja_link('{edit_tpl_action}'+ $('#tpl_choose option:selected').val() + '&method='+ $('input[name=method]:checked').val() + '&{GET_FORM_KEY}', '#content'); return false;"><span>{lang.SUBMIT}</span></button>
</p>

</div>
<!-- the big box end -->

<div class="br"></div>
<div class="hr"></div>

<!-- add new template -->
<!-- the big box begin -->
<div class="big-box"><hr>
<h1>{lang.ADD_NEW_TPL}</h1>

<form method="post" action="{action}" id="addtpl_form">

<div class="section">
	<h3><label for="new_ext">{lang.ADD_NEW_TPL_EXP}</label></h3>
	<div class="box">
		<input name="new_tpl" id="new_tpl" type="text" value="new_template.html" style="direction:ltr;" size="30" class="form-control"/>
		<input type="hidden" name="style_id" value="{style_id}" /> <hr>
	</div>
</div>
<div class="clear"></div>

<div class="br"></div>

<!-- button -->
<p class="submit">
	<input type="hidden" name="submit_new_tpl" value="1" />
	<button type="submit" id="submit" name="submit_new_tpl" class="btn btn-primary btn-lg" onclick="javascript:submit_kleeja_data('#addtpl_form', '#content', 0); return false;"><span>{lang.SUBMIT}</span></button>
</p>

{H_FORM_KEYS2}
</form>
</div>
<!-- the big box end -->

<div class="br"></div>
<div class="hr"></div>

<!-- start backup templates -->
<IF NAME="show_bk_templates">
<!-- the big box begin -->
<div class="big-box">
<h1>{lang.RETURN_TEMPLATE_BK}</h1>
<h2>{lang.RETURN_TEMPLATE_BK_EXP}</h2>


<form method="post" action="{action}" id="backup_form">

<div class="section">
	<h3><label for="new_ext">>></label></h3>
	<div class="box">
		<select name="tpl_choose">
			<LOOP NAME="bkup_templates">
				<option name="{%value%}">{%value%}</option>
			</LOOP>
		</select>
		<input type="hidden" name="style_id" value="{style_id}" />
	</div>
</div>
<div class="clear"></div>

<div class="br"></div>

<!-- button -->
<p class="submit">
	<input type="hidden" name="submit_bk_tpl" value="1" />
	<button type="submit" id="submit" name="submit_bk_tpl" class="btn" onclick="javascript:submit_kleeja_data('#backup_form', '#content', 0); return false;"><span>{lang.SUBMIT}</span></button>
</p>

{H_FORM_KEYS3}
</form>
</div>
<!-- the big box end -->
</IF>

<div class="br"></div>
<div class="hr"></div>

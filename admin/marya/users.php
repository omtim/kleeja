
<IF NAME="current_smt == general">

<!-- groups begin -->
<div class="page-header">
	<h1>{lang.R_GROUPS}</h1>
</div>



<!-- if not normal user system, tell him --> 
<IF NAME="user_not_normal">
	<div class="alert alert-info">{lang.USERS_NOT_NORMAL_SYS}</div>
	<hr>
</IF>


<!-- start data table -->
<IF NAME="no_results">
...		
<ELSE>
<h3>{lang.ESSENTIAL_GROUPS}</h3>
	<LOOP NAME="e_groups">
	<div class="panel panel-default">
		<div class="panel-heading">
			{{name}}
			<IF NAME="user_not_normal"><ELSE><IF LOOP="is_default">
				<span class="glyphicon glyphicon-ok pull-left" alt="{lang.GROUP_IS_DEFAULT}" title="{lang.GROUP_IS_DEFAULT}"></span>
			</IF></IF>
		</div>
	    <div class="panel-body user-group-box">
			  <div class="btn-group ">
			    <button type="button" class="btn btn-default btn-sm" onclick="javascript:get_kleeja_link('{action}&smt=group_data&qg={{id}}');"><span class="glyphicon glyphicon-cog"></span> {lang.EDIT_DATA}</button>
			    <button type="button" class="btn btn-default btn-sm" onclick="javascript:get_kleeja_link('{action}&smt=group_exts&qg={{id}}');"><span class="glyphicon glyphicon-list-alt"></span> {lang.R_EXTS}</button>
			    <button type="button" class="btn btn-default btn-sm" onclick="javascript:get_kleeja_link('{action}&smt=group_acl&qg={{id}}');"><span class="glyphicon glyphicon-lock"></span> {lang.EDIT_ACL}</button>
				<IF NAME="user_not_normal"><ELSEIF LOOP="id != 2">
			    <button type="button" class="btn btn-default btn-sm" onclick="javascript:get_kleeja_link('{action}&smt=show_group&qg={{id}}');"><span class="glyphicon glyphicon-user"></span> {lang.USERS}</button>
			 	</IF>
			  </div>
	    </div>
	</div>
	</LOOP>


<br>
<IF NAME="c_groups">

<h3>{lang.CUSTOM_GROUPS}</h3>
	<LOOP NAME="c_groups">
		<div class="panel panel-default">
			<div class="panel-heading">
				{{name}}
				<IF LOOP="is_default">
					<span class="glyphicon glyphicon-ok pull-left" alt="{lang.GROUP_IS_DEFAULT}" title="{lang.GROUP_IS_DEFAULT}"></span>
				</IF>
			</div>
		    <div class="panel-body user-group-box">
				  <div class="btn-group ">
				    <button type="button" class="btn btn-default btn-sm" onclick="javascript:get_kleeja_link('{action}&smt=group_data&qg={{id}}');"><span class="glyphicon glyphicon-cog"></span> {lang.EDIT_DATA}</button>
				    <button type="button" class="btn btn-default btn-sm" onclick="javascript:get_kleeja_link('{action}&smt=group_exts&qg={{id}}');"><span class="glyphicon glyphicon-list-alt"></span> {lang.R_EXTS}</button>
				    <button type="button" class="btn btn-default btn-sm" onclick="javascript:get_kleeja_link('{action}&smt=group_acl&qg={{id}}');"><span class="glyphicon glyphicon-lock"></span> {lang.EDIT_ACL}</button>
				    <button type="button" class="btn btn-default btn-sm" onclick="javascript:get_kleeja_link('{action}&smt=show_group&qg={{id}}');"><span class="glyphicon glyphicon-user"></span> {lang.USERS}</button>
				    <button type="button" class="btn btn-default btn-sm del-usergroup" data-toggle="popover" data-title="{lang.DELETE}: {{name}}" data-id2del="{{id}}"><span class="glyphicon glyphicon-trash"></span> {lang.DELETE}</button>
					<!-- #delete_group_{{id}} -->
				  </div>
		    </div>
		</div>
	</LOOP>

</IF>
</IF>
<!-- end data table -->



<!-- addnew g begin -->
<div id="group_add_new">
<br>
<hr>
<h3>{lang.ADD_NEW_GROUP}</h3>
<form method="post" action="{action}" id="add_group_form" class="form-inline" role="form">
<div class="form-group">
	<label class="" for="groupe_name">{lang.GROUP_NAME}</label>
	<input type="text" class="form-control" name="gname" id="groupe_name" placeholder="{lang.GROUP_NAME}">
 </div>
<div class="form-group">
	<label for="cfrom" class="">{lang.COPY_FROM}</label>
	<select name="cfrom" id="cfrom" class="form-control">
		<option value="-1">{lang.DEFAULT_GROUP}</option>
		<LOOP NAME="e_groups"><IF LOOP="id == 2"><ELSE><option value="{{id}}">{{name}}</option></IF></LOOP>
		<LOOP NAME="c_groups"><option value="{{id}}">{{name}}</option></LOOP>
	</select>
</div>
<div class="form-group">
	<br>
	<input type="hidden" name="newgroup" value="1">
	<button type="submit" id="submit" name="newgroup" class="btn btn-primary" onclick="javascript:submit_kleeja_data('#add_group_form', '#content', 0);" >{lang.SUBMIT}</button>
</div>
{H_FORM_KEYS3}
</form>
<!-- addnew g end -->
</div>



<!--  delete g begin -->
<LOOP NAME="c_groups">
<div id="delete_group_{{id}}" style="display:none">

<form method="post" action="{action}" id="del_group_form" role="form">
<input type="hidden" name="dgroup" id="dgroup" value="{{id}}"  />
<div class="form-group">
	<label for="tgroup">{lang.G_USERS_MOVE_TO}</label>
		<select name="tgroup" id="tgroup" class="form-control">
			<IF LOOP="is_default"><ELSE><option value="-1">{lang.DEFAULT_GROUP}</option></IF>
			<LOOP NAME="e_groups"><IF LOOP="id == 2"><ELSE><option value="{{id}}">{{name}}</option></IF></LOOP>
			<LOOP NAME="c_groups"><option value="{{id}}">{{name}}</option></LOOP>
		</select>
</div>
<div class="clear"></div>
<div class="br"></div>
<!-- button -->
<p>
	<input type="hidden" name="delgroup" value="1" />
	<button type="submit" id="submit" name="delgroup" class="btn btn-primary"  onclick="javascript:$.facybox.close(); submit_kleeja_data('#del_group_form', '#content', 0); return false;"><span>{lang.SUBMIT}</span></button>
</p>
{H_FORM_KEYS4}
</form>
</div>
</LOOP>
<!-- delete g end -->





<ELSEIF NAME="show_results">

<!-- show results -->
	
<div class="page-header">
 <h1><a href="{action}&amp;smt=general" onclick="javascript:get_kleeja_link(this.href);">{lang.R_GROUPS}</a> <small>
	 <IF NAME="is_search"> &raquo; <IF NAME="current_smt == show_group">{group_name}<ELSE>{lang.SEARCH_USERS}</IF> ( {nums_rows} )</IF></small></h1>
</div>

<!-- if not normal user system, tell him --> 
<IF NAME="user_not_normal">
<div class="alert alert-info">{lang.USERS_NOT_NORMAL_SYS}</div>
</IF>

<IF NAME="GE_INFO">
	<script type="text/javascript">
		setTimeout(function() {
			$('.infoexts').fadeOut('fast');
		}, 5000);
	</script>
	<div class="infoexts">
	<div class="alert alert-info">{GE_INFO}</div>
	</div>
</IF>



<IF NAME="arr">
<table class="table table-striped">
	<tr>
		<th>{lang.USERNAME}</th>
		<th>{lang.INFORMATION}</th>
		<th>~</th>
		<!-- userresult-th -->
	</tr>
<LOOP NAME="arr">
<tr>
	<td>{{name}}<IF LOOP="founder==1"> <span title="{lang.FOUNDER}" class="glyphicon glyphicon-ok"></span></IF></td>
	<td>{lang.GROUP}: {{group}}, {lang.LAST_VISIT}: {{last_visit}}</td>
	<td>
		<a target="_blank" href="{{userfile_link}}" title="{lang.BROSWERF}" class="btn btn-info btn-xs"><span class="glyphicon glyphicon-file"></span></a>
		<a href="{{delusrfile_link}}&amp;{GET_FORM_KEY}" onclick="javascript:return confirm_from();" title="{lang.ADMIN_DELETE_FILES}" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-floppy-remove"></span></a>
		<IF LOOP="delusr_link"><a href="{{delusr_link}}&amp;{GET_FORM_KEY}" onclick="javascript:return confirm_from();" title="{lang.DELETE}" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span></a></IF>
		<a href="{{editusr_link}}" onclick="javascript:get_kleeja_link(this.href); return false;" title="{lang.EDIT}" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-pencil"></span></a>
	</td>
	<!-- userresult-td -->
</tr>
</LOOP>
</table>
</IF>

<!-- end data table -->

<!-- pagination -->
{page_nums}

<!-- show results end -->

<!-- add new user -->
<ELSEIF NAME="current_smt == new_u">

<div class="page-header">
<h1><a href="{action}&amp;smt=general" onclick="javascript:get_kleeja_link(this.href);">{lang.R_GROUPS}</a> 
	<small> &raquo; {lang.NEW_USER}</small></h1>
</div>


<IF NAME="errs">
<div class="alert alert-danger">{errs}</div>
</IF>

<form method="post" action="{action}" id="add_user_form" role="form">
<div class="form-group">
	<label for="lname">{lang.USERNAME}</label>
	<input type="text" name="lname" id="lname" value="{uname}" size="30" class="form-control" placeholder="{lang.USERNAME}">
</div>
<div class="form-group">
	<label for="lmail">{lang.EMAIL}</label>
	<input type="text" name="lmail"  id="lmail" value="{umail}"size="30" class="form-control" placeholder="{lang.EMAIL}">
</div>
<div class="form-group">
	<label for="lpass">{lang.PASSWORD}</label>
	<input type="password" name="lpass" id="lpass" value=""size="30" class="form-control" placeholder="{lang.PASSWORD}">
</div>

<!-- newuser-newfield -->

<div class="form-group">
	<label for="lpass">{lang.GROUP}</label>
		<select name="lgroup" id="lgroup" class="form-control" style="width: 237px;">
		<LOOP NAME="u_groups">
			<option value="{{id}}"<IF LOOP="selected"> selected="selected"</IF>>{{name}} <IF LOOP="default">({lang.DEFAULT_GROUP})</IF></option>
		</LOOP>
		</select>
</div>

<!-- button -->
<p class="submit <IF NAME="{lang.DIR} == rtl">pull-left</IF>">
	<input type="hidden" name="newuser" value="1" />
	<button type="submit" id="submit" name="newuser" class="btn btn-primary" onclick="javascript:submit_kleeja_data('#add_user_form', '#content', 0);">{lang.SUBMIT}</button>
</p>

{H_FORM_KEYS2}
</form>
</div>
<!-- the big box end -->

<!-- edit a user -->
<ELSEIF NAME="current_smt == edit_user">


<div class="page-header">
<h1><a href="{action}&amp;smt=general" onclick="javascript:get_kleeja_link(this.href);">{lang.R_GROUPS}</a> 
	<small> &raquo; {lang.EDIT} ({title_name})</small></h1>
</div>

<IF NAME="errs">
<div class="alert alert-danger">{errs}</div>
</IF>

<form method="post" action="{action}&amp;uid={userid}&amp;qg={u_qg}&amp;page={u_page}" id="edit_user_form" role="form">
<div class="form-group">
	<label for="l_name">{lang.USERNAME}</label>
	<input type="text" name="l_name" id="l_name" value="{u_name}" size="30" class="form-control">
</div>
<div class="form-group">
	<label for="l_mail">{lang.EMAIL}</label>
	<input type="text" name="l_mail"  id="l_mail" value="{u_mail}"size="30" class="form-control">
</div>
<div class="form-group">
	<label for="l_pass">{lang.PASS_ON_CHANGE}</label>
	<input type="password" name="l_pass" id="l_pass" value=""size="30" class="form-control"/>
</div>
<div class="form-group">
	<label for="l_show_filecp">{lang.SHOW_MY_FILECP}</label>
	<select name="l_show_filecp" id="l_show_filecp" class="form-control">
			<option value="1"<IF NAME="u_show_filecp"> selected="selected"</IF>>{lang.YES}</option>
			<option value="0"<IF NAME="u_show_filecp"><ELSE> selected="selected"</IF>>{lang.NO}</option>
	</select>
</div>
<div class="form-group">
	<label for="l_group">{lang.GROUP}</label>
	<select name="l_group" id="l_group" class="form-control">
	<LOOP NAME="u_groups">
	<IF LOOP="id == 2"><ELSE>
		<option value="{{id}}"<IF LOOP="selected"> selected="selected"</IF>>{{name}} <IF LOOP="default">({lang.DEFAULT_GROUP})</IF></option>
	</IF>
	</LOOP>
	</select>
</div>

<!-- edituser-newfield -->

<IF NAME="im_founder">
	<div class="form-group">
		<label for="l_founder">{lang.FOUNDER}</label>
		<select name="l_founder" id="l_founder" class="form-control">
			<option value="1"<IF NAME="u_founder"> selected="selected"</IF>>{lang.YES}</option>
			<option value="0"<IF NAME="u_founder"><ELSE> selected="selected"</IF>>{lang.NO}</option>
		</select>
</div>
</IF>


<input type="text" style="display:none;" name="l_qg" class="btn btn-primary" value="{u_qg}" />
<input type="text" style="display:none;" name="l_page" class="btn btn-primary" value="{u_page}" />
<input type="text" style="display:none;" name="uid" class="btn btn-primary" value="{userid}" />

<!-- button -->
<p class="submit <IF NAME="{lang.DIR} == rtl">pull-left</IF>">
	<input type="hidden" name="edituser" value="1" />
	<button type="submit" id="submit" name="edituser" class="btn btn-primary" onclick="javascript:submit_kleeja_data('#edit_user_form', '#content', 0);">{lang.SUBMIT}</button>
</p>

{H_FORM_KEYS8}
</form>

<!-- g acls -->
<ELSEIF NAME="current_smt == group_acl">

<div class="page-header">
<h1><a href="{action}&amp;smt=general" onclick="javascript:get_kleeja_link(this.href);">{lang.R_GROUPS}</a> 
	<small> &raquo; {lang.EDIT_ACL} ({group_name})</small></h1>
</div>


<form method="post" action="{action}" id="edit_acl_form" role="form">
<table class="table table-striped">
<LOOP NAME="acls">
<tr>
	<td>{{acl_title}}</td>
	<td class="text-<IF NAME="{lang.DIR} == rtl">left<ELSE>right</IF>">
		<div class="btn-group acls-radios" data-toggle="buttons">
		<label class="btn btn-success btn-sm<IF LOOP="acl_can == 1"> active</IF>">
			<input type="radio" name="{{acl_name}}" id="acls_{{acl_name}}_1" <IF LOOP="acl_can == 1"> checked="checked"</IF>> {lang.HE_CAN}
		</label>
		<label class="btn btn-danger btn-sm<IF LOOP="acl_can == 0"> active</IF>">
			<input type="radio" name="{{acl_name}}" id="acls_{{acl_name}}_2" <IF LOOP="acl_can == 0"> checked="checked"</IF>> {lang.HE_CAN_NOT}
		</label>
		</div>
	</td>
</tr>
</LOOP>
</table>

<!-- button -->
<p class="submit <IF NAME="{lang.DIR} == rtl">pull-left</IF>">
	<input type="hidden" name="editacl" value="1" />
	<button type="submit" id="submit" name="editacl" class="btn btn-primary" onclick="javascript:submit_kleeja_data('#edit_acl_form', '#content', 0);">{lang.SUBMIT}</button>
</p>

{H_FORM_KEYS5}
</form>


<ELSEIF NAME="current_smt == group_exts">

<!-- exts g begins -->
<div class="page-header">
	<h1><a href="{action}&amp;smt=general" onclick="javascript:get_kleeja_link(this.href);">{lang.R_GROUPS}</a> 
		<small> &raquo; {lang.R_EXTS} ({group_name})</small></h1>
		<div class="btn btn-default new-ext-popover <IF NAME="{lang.DIR} == rtl">pull-left<ELSE>pull-right</IF>" data-toggle="popover" data-title="{lang.ADD_NEW_EXT}">{lang.ADD_NEW_EXT}</div>
		<div class="clearfix"></div>
</div>



<IF NAME="GE_INFO">
	<script type="text/javascript">
		setTimeout(function() {
			$('.infoexts').fadeOut('fast');
		}, 5000);
	</script>
	<div class="infoexts">
	<IF NAME="DELETED_EXT">
		<IF NAME="{DELETED_EXT} == 2">
		<div class="alert alert-info">{lang.EXT_DELETED}</div>
		<ELSE>
		<div class="alert alert-danger">{lang.DATA_CHANGED_NO}</div>
		</IF>
	</IF>
	<IF NAME="ADDED_EXT">
		<IF NAME="{ADDED_EXT} == 2">
		<div class="alert alert-info">{lang.NEW_EXT_ADD}</div>
		<ELSE>
		<div class="alert alert-danger">{lang.DATA_CHANGED_NO}</div>
		</IF>
	</IF>
	</div>
</IF>

<form method="post" action="{action}" id="edit_exts_form" role="form">
<table class="table table-striped">
<LOOP NAME="exts">
<tr>
	<th>#</th>
	<th>{lang.EXT}</th>
	<th>{lang.SIZE}</th>
	<th>{lang.DELETE}</th>
</tr>
<tr>
	<td><img src="{{ext_icon}}"></td>
	<td>{{ext_name}}</td>
	<td>
		<div class="input-group">
		<input type="text" name="size[{{ext_id}}]" value="{{ext_size}}" size="6" class="form-control" style="float:left;"> 
		<span class="input-group-addon">{lang.KILOBYTE}</span>
	</div>
		
	</td>
	<td>
		<a href="{action}&del={{ext_id}}&{GET_FORM_KEY}"  onclick="javascript:return confirm_from();" title="{lang.DELETE}" class="btn btn-danger">
			<span class="glyphicon glyphicon-trash"></span>
		</a>
	</td>
</tr>
</LOOP>
</table>


<!-- button -->
<p class="submit <IF NAME="{lang.DIR} == rtl">pull-left</IF>">
	<input type="hidden" name="editexts" value="1" />
	<button type="submit" id="submit" name="editexts" class="btn btn-primary" onclick="javascript:submit_kleeja_data('#edit_exts_form', '#content', 0);"><span>{lang.SUBMIT}</span></button>
</p>
{H_FORM_KEYS7}
</form>

<div class="clearfix"></div>

<br>
<div class="alert alert-info">
	{lang.E_EXTS} <button class="btn btn-primary btn-sm converter-popover" data-toggle="popover" data-title="{lang.BCONVERTER}">{lang.BCONVERTER}</button>
</div>


<!-- add new ext -->
<div id="new_ext_form" style="display:none;">

<form method="post" action="{action}" id="add_new_ext" role="form">
	<label>{lang.ADD_NEW_EXT_EXP}</h4>
	<input type="text" name="extisnew" value="" class="form-control"/>
	</label>



<!-- button -->
<p class="submit <IF NAME="{lang.DIR} == rtl">pull-left</IF>">
	<input type="hidden" name="newext" value="1" />
	<button type="submit" id="submit" name="newext" class="btn btn-primary" onclick="javascript:submit_kleeja_data('#add_new_ext', '#content', 0);"><span>{lang.SUBMIT}</span></button>
</p>

{H_FORM_KEYS7}
</form>
</div><hr>
<!-- the big box end -->

<div id="converter_form" style="display:none;">
<!-- converter table -->
<script type="text/javascript">
/*Created by: Uncle Jim :: http://jdstiles.com/javamain.html */

	function convert(f) 
	{
	  f.kb.value=Math.round(f.byte.value/1024*100000)/100000
	  f.mb.value=Math.round(f.byte.value/1048576*100000)/100000
	  f.gb.value=Math.round(f.byte.value/1073741824*100000)/100000
	}

	function convertkb(f) 
	{
	  f.byte.value=Math.round(f.kb.value*1024*100000)/100000
	  f.mb.value=Math.round(f.kb.value/1024*100000)/100000
	  f.gb.value=Math.round(f.kb.value/1048576*100000)/100000
	}

	function convertmb(f)
	{
	  f.byte.value=Math.round(f.mb.value*1048576*100000)/100000
	  f.kb.value=Math.round(f.mb.value*1024*100000)/100000
	  f.gb.value=Math.round(f.mb.value/1024*100000)/100000
	}

	function convertgb(f) 
	{
	  f.byte.value=Math.round(f.gb.value*1073741824*100000)/100000
	  f.kb.value=Math.round(f.gb.value*1048576*100000)/100000
	  f.mb.value=Math.round(f.gb.value*1024*100000)/100000
	}
</script>


<!-- start c table -->
<form class="table table-striped text-center">
<table>
	<tr class="first"> 
		<td>Byte</td>
		<td>Kilobyte</td>
		<td>Megabyte</td>
		<td>Gigabyte</td>
	</tr>
	<tr> 
		<td><input type="text" size="10" name="byte" value="0" class="form-control" /></td>
		<td><input type="text" size="10" name="kb" value="0" class="form-control" /></td>
		<td><input type="text" size="10" name="mb" value="0" class="form-control" /></td>
		<td><input type="text" size="10" name="gb" value="0" class="form-control" /></td>
	</tr>

	<tr> 
		<td style="border-width:0px"><button type="button" name="B2" class="btn btn-default" onClick="javascript:convert(this.form)"><span class="bc">  &gt;  </span></button></td>
		<td style="border-width:0px"><button type="button" name="B22" class="btn btn-default" onClick="javascript:convertkb(this.form)"><span class="bc">  &lt; &gt;  </span></button></td>
		<td style="border-width:0px"><button type="button" name="B23" class="btn btn-default" onClick="javascript:convertmb(this.form)"><span class="bc">  &lt; &gt;  </span></td>
		<td style="border-width:0px"><button type="button" name="B24" class="btn btn-default" onClick="javascript:convertgb(this.form)"><span class="bc">  &lt;  </span></td>
	</tr>
</table>
<!-- end c table -->
</form>
</div>

	

<ELSEIF NAME="current_smt == group_data">
	
	
<!-- data g begins -->
<div class="page-header">
	<h1><a href="{action}&amp;smt=general" onclick="javascript:get_kleeja_link(this.href);">{lang.R_GROUPS}</a> 
		<small> &raquo; {lang.EDIT_DATA} ({group_name})</small></h1>
</div>



<form method="post" action="{action}" id="edit_data_form">
<ul class="list-group">
<IF NAME="user_not_normal"><ELSE>
<li class="list-group-item form-group">
	<h4 class="list-group-item-heading"><label for="group_name">{lang.GROUP_NAME}</label></h4>
	<p class="list-group-item-text">
		<IF NAME="gdata.group_is_essential">
			{group_name}
		<ELSE>
			<input type="text" name="group_name" id="group_name" value="{gdata.group_name}" class="form-control"  placeholder="{lang.GROUP_NAME}l">
		</IF>
	</p>
</li>

<li class="list-group-item form-group">
	<h4 class="list-group-item-heading"><label for="group_name">{lang.GROUP_IS_DEFAULT}</label></h4>
	<p class="list-group-item-text">
		<div class="checkbox">
		<label>
			<input type="radio" name="group_is_default" id="group_is_default" value="1" <IF NAME="gdata.group_is_default == 1">checked="checked"</IF>> {lang.YES}
		</label>
		<label>
			<input type="radio" name="group_is_default" id="group_is_default" value="0" <IF NAME="gdata.group_is_default == 0">checked="checked"</IF>> {lang.NO}
		</label>
		</div>
	</p>
</li>

</IF>

<LOOP NAME="data">
<li class="list-group-item form-group">
		<h4 class="list-group-item-heading"><label for="{{name}}">{{label}}</label></h4>
		<p class="list-group-item-text">
			{{option}}
		</p>
</li>
</LOOP>
</ul>

<!-- button -->
<p class="submit <IF NAME="{lang.DIR} == rtl">pull-left</IF>">
	<input type="hidden" name="editdata" value="1" />
	<button type="submit" id="submit" name="editdata" class="btn btn-primary" onclick="javascript:submit_kleeja_data('#edit_data_form', '#content', 0);">{lang.SUBMIT}</button>
</p>

{H_FORM_KEYS6}
</form>


<!-- end cat users -->
</IF>

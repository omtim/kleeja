<!-- start mPlugins Template -->
<IF NAME="for_unistalling">
<!-- the big box begin#mfile -->
<div class="big-box" style="margin-top : 25px;">
<h1>{lang.R_PLUGINS} &raquo; {lang.DELETE}</h1>
<form method="post" action="{action}"  id="mfile_form">
</IF>

<div class="fmethod">
	<p class="lead">[-] {lang.PLUGIN_WT_FILE_METHOD}</p>
	<input type="radio" name="_fmethod" id="ftemhod1" value="zfile" checked="checked" onchange="this.checked ? $('#ftp_info_div').hide(): $('#ftp_info_div').show();" /><label for="ftemhod1" class="filemethod text-primary">&nbsp; {lang.PLUGIN_ZIP_FILE_METHOD}</label><hr>
	<IF NAME="is_ftp_supported">
	<div class="br"></div>
	<input type="radio" name="_fmethod" id="ftemhod2" value="kftp" onchange="this.checked ? $('#ftp_info_div').show() : $('#ftp_info_div').hide();" /><label class="filemethod text-primary" for="ftemhod2"> &nbsp; {lang.PLUGIN_FTP_FILE_METHOD}</label>
	<div id="ftp_info_div" style="display:none">
			<table style="width:100%">
				<tr>
					<td><label for="ftp_host">{lang.PLUGIN_FTP_HOST}</label></td>
					<td><input type="text" name="ftp_host" id="ftp_host" value="{ftp_info.host}" size="25"  style="direction:ltr" class="form-control"/></td>
				</tr>
				<tr>
					<td><label for="ftp_user">{lang.PLUGIN_FTP_USER}</label></td>
					<td><input type="text" name="ftp_user" id="ftp_user" value="{ftp_info.user}" size="25" style="direction:ltr" class="form-control"/></td>
				</tr>
				<tr>
					<td><label for="ftp_pass">{lang.PLUGIN_FTP_PASS}</label></td>
					<td><input type="text" name="ftp_pass" id="ftp_pass" value="{ftp_info.pass}" size="25" style="direction:ltr"  class="form-control"/></td>
				</tr>
				<tr>
					<td><label for="ftp_path">{lang.PLUGIN_FTP_PATH}</label></td>
					<td><input type="text" name="ftp_path" id="ftp_path" value="{ftp_info.path}" size="45"  style="direction:ltr" class="form-control"/></td>
				</tr>
				<tr>
					<td><label for="ftp_port">{lang.PLUGIN_FTP_PORT}</label></td>
					<td><input type="text" name="ftp_port" id="ftp_port" value="{ftp_info.port}" size="5" style="direction:ltr"  class="form-control"/></td>
				</tr>
			</table>
	</div>
	</IF>
</div><hr>

<IF NAME="for_unistalling">
<div class="clear"></div>
	
	<!-- button -->
<p class="submit">
	<input type="hidden" name="submit_del_plg" value="1" />
	<button type="submit" name="submit_del_plg" class="btn btn-primary btn-lg" onclick="javascript:submit_kleeja_data('#mfile_form', '#content', 0); return false;"><span>{lang.SUBMIT}</span></button>
</p>

{H_FORM_KEYS}
</form>
</div>
<!-- the big box end#mfile -->
</IF>

<!-- END#mPluginsTemplate -->

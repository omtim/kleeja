
<!-- call begins -->
<div class="page-header">
  <h1>{lang.R_CALLS} <small><IF NAME="current_smt == show_h24"> &raquo; {lang.SHOW_FROM_24H}<ELSE> &raquo; {lang.ALL}</IF></small></h1>
</div>




<IF NAME="no_results">
<div class="alert alert-info">{lang.MESSAGE_NONE}</div>
<ELSE>
	
<form method="post" name="callform" action="{action}" id="calls_form" role="form">
<!-- start data group -->
<div class="panel-group" id="accordion">
	<LOOP NAME="arr">
	    <div class="panel panel-default" id="su[{{id}}]">
	       <div class="panel-heading">
	         <h4 class="panel-title">
				<input type="checkbox" name="del_{{id}}" value="{{id}}" onclick="change_color(this,'su[{{id}}]', 'panel panel-danger', 'panel panel-default');" rel="_del">
	          	<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse{{id}}">
				   {{name}} @ {{human_time}}
				    <span class="label label-default"><IF LOOP="sent">{lang.IS_SEND_MAIL}</IF></span>
			   </a>
			 </h4>
			</div>
			 <div id="collapse{{id}}" class="panel-collapse collapse out">
			 <div class="panel-body">
				 {{text}}
				 <br>
				 <br>
				 ____<br>
			 	<span class="text-muted">{lang.EMAIL}:</span> {{mail}}<br>
				<span class="text-muted">{lang.IP}:</span> <a href="{{ip_finder}}" target="_blank">{{ip}}</a><br>
				<span class="text-muted">{lang.TIME}:</span> {{time}}<br>
				<hr>
				<button type="button" class="btn btn-default popover-send" data-toggle="popover" data-title="{lang.REPLY}: {{mail}}">{lang.REPLY_CALL}</button>
				
				
				<div class="form4send" style="display:none;">
				<form method="post" action="{action}" id="send_form" role="form">
				<textarea name="v_{{id}}" cols="80" class="form-control" rows="3"></textarea>
				<input type="hidden" name="reply_submit" value="1">
				<br>
				<p class="submit <IF NAME="{lang.DIR} == rtl">pull-left</IF>">
					<button type='submit' name="reply_submit" class="btn btn-primary btn-sm" onclick='javascript:submit_kleeja_data("#send_form", "#content", 0);'><span>{lang.REPLY}</span></button>
				</p>
				</form>
				</div>
		    </div>
		    </div>
		  </div>
	</LOOP>
</div>
<!-- end data group -->

<!-- pagination -->
{page_nums}
<br>

<!-- button -->
<p class="submit <IF NAME="{lang.DIR} == rtl">pull-left</IF>">
	<input type="hidden" name="submit" value="1">
	<button type="button" class="btn btn-default" onclick="javascript:checkAll(document.callform, '_del', 'su', 'panel panel-danger', 'panel panel-default');"><span class="glyphicon glyphicon-th-list"></span> {lang.CHECK_ALL}</button>
	<button type="submit"  name="submit" class="btn btn-primary" onclick="javascript:submit_kleeja_data('#calls_form', '#content', 0);"><span>{lang.DEL_SELECTED}</span></button>
</p>
	
{H_FORM_KEYS}
</form>
</IF>

<!-- call ends -->

<IF NAME="there_queue">
<div class="clearfix"></div>
<hr>
<div class="alert alert-info">
	{lang.DELETE_PROCESS_IN_WORK}
</div>
</IF>

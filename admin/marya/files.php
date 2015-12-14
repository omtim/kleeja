
<!-- files begin -->
<div class="page-header">
<h1>
  <?=$lang['R_FILES']?>
  <?php if($total_pages > 1):?><small>[<?=$current_page?> / <?=$total_pages?>]</small><?php  endif; ?>
</h1>
</div>


<?php if($is_search): ?>
<p class="lead well text-center">
	<?=$lang['FIND_IP_FILES']?> ( <?=$nums_rows?> ) <?=$lang['FILE']?>
	<?php if($nums_rows): ?>
		 | <a href="<?=$deletelink?>"  class="btn btn-default btn-lg" onclick="javascript:get_kleeja_link(this.href, '#content', {confirm:true});">
			 <span class="glyphicon glyphicon-trash"></span>
			 <?=$lang['DELETEALLRES']?>
		 </a>
	 <?php endif; ?>
</p>
<?php endif; ?>



<form method="post" name="filesform" action="<?=$action?>" id="files_form">

<?php if($no_results): ?>

	<div class="alert alert-info">
	<p class=""><?=$lang['NO_RESULT_USE_SYNC']?></p>
	</div>

<?php else: ?>

<!-- start data table -->
<div class="table-responsive">
<table class="table table-striped">
<thead style="font-size:11px">
	<tr>
		<th><a href="javascript:void(0);" onclick="checkAll(document.filesform, '_del', 'su');" title="<?=$lang['DELETE']?>">#</a></th>
		<th style="">-</th>
		<th style="white-space:nowrap;">
			<a title="<?=$lang['ALPHABETICAL_ORDER_FILES']?>" href="<?=$ord_action?>&amp;order_by=real_filename" ><?=$lang['FILENAME']?></a>
			<a href="<?=$page2_action?>&amp;order_way=1"><img src="<?=ADMIN_STYLE_PATH?>images/arrow_up.gif" alt="&uarr;"  /></a>
			<a href="<?=$page2_action?>"><img src="<?=ADMIN_STYLE_PATH?>images/arrow_down.gif" alt="&darr;" /></a>
		</th>
		<th><a title="<?=$lang['ORDER_SIZE']?>" href="<?=$ord_action?>&amp;order_by=size"><?=$lang['SIZE']?></a></th>
		<th><a title="<?=$lang['ORDER_TOTAL_DOWNLOADS']?>" href="<?=$ord_action?>&amp;order_by=uploads"><?=$lang['FILEUPS']?></a></th>
		<th><a href="<?=$ord_action?>&amp;order_by=folder"><?=$lang['FILDER']?></a></th>
		<th><a href="<?=$ord_action?>&amp;order_by=user"><?=$lang['BY']?></a></th>
		<th><a href="<?=$ord_action?>&amp;order_by=user_ip"><?=$lang['IP']?></a></th>
		<th><a href="<?=$ord_action?>&amp;order_by=report"><?=$lang['NUMPER_REPORT']?></a></th>
		<th><a href="<?=$ord_action?>&amp;order_by=type"><?=$lang['FILETYPE']?></a></th>
		<th><a href="<?=$ord_action?>&amp;order_by=time"><?=$lang['FILEDATE']?></a></th>
		<!-- admin files data td1 extra -->
	</tr>
</thead>
<tbody>
	<?php foreach($files_list as $id=>$file):?>
	<tr id="su[<?=$id?>]" class="">
		<td><input type="checkbox" name="del_<?=$id?>" value="<?=$id?>" onclick="change_color(this,'su[<?=$id?>]');" rel="_del" /></td>
		<td style="width:20px;"><img src="<?=$file['typeicon']?>" alt="<?=$file['type']?>" title="<?=$file['type']?>" /></td>
		<td><?=$file['name']?></td>
		<td><?=$file['size']?></td>
		<td><?php if($file['direct']):?><img src="<?=ADMIN_STYLE_PATH?>images/directurl.png" title="<?=$lang['DIRECT_FILE_NOTE']?>" alt="<?=$lang['DIRECT_FILE_NOTE']?>" /><?php else: ?><?=$file['ups']?><?php endif; ?></td>
		<td><?=$file['folder']?></td>
		<td><?=$file['user']?></td>
		<td><?=$file['ip']?>
			<button type="button" class="btn btn-default btn-xs"  onclick="javascript:locaton.href='<?=$showfilesbyip?>';" title="<?=$lang['SHOWFILESBYIP']?>">
			  <span class="glyphicon glyphicon-search"></span>
			</button>
		</td>
		<td><?=$file['report']?></td>
		<td><?=$file['type']?></td>
		<td title="<?=$file['time']?>"><?=$file['time_human']?></td>
		<!-- admin files data td2 extra -->
	</tr>
    <?php endforeach;?>
</tbody>
</table>
</div>
<!-- end data table -->


<!-- pagination -->
<?=$page_nums?>
<hr>

<!-- button -->
<p class="submit <?php if($lang['DIR'] == 'rtl'):?>pull-left<?php endif; ?>">
	<input type="hidden" name="submit" value="1" />
	<button type="button" class="btn btn-default" onclick="checkAll(document.filesform, '_del', 'su');"><span class="glyphicon glyphicon-th-list"></span> <?=$lang['CHECK_ALL']?></button>
	<button type="submit" name="submit" class="btn btn-primary"><span><?=$lang['DEL_SELECTED']?></span></button>
</p>

<?php endif; ?>

<?=$H_FORM_KEYS?>
</form>
</div>
<!-- the big box end -->


<div class="page-header">
 <h1><?=$lang['R_MAINTENANCE']?></h1>
</div>


<div class="section">
	<h3><?=$lang['DEL_CACHE']?></h3>
	<button class="btn btn-default " onclick="javascript:get_kleeja_link('<?=$del_cache_link?>'); return false;"><?=$lang['DELETE']?></button>
</div>



<hr>
<div class="alert alert-info">
	<?=$lang['WHY_SYNCING']?>
</div>

<div class="clear"></div>


<ul class="list-group">
  <li class="list-group-item">
    <span class="badge"><?=$all_files?></span>
    <?=$lang['ALL_FILES']?> -
	<button type="button" class="btn btn-default btn-xs" onclick="javascript:location.href='<?=$resync_files_link?>'; return false;"><?=$lang['RESYNC']?></button>
  </li>

    <li class="list-group-item">
      <span class="badge"><?=$all_images?></span>
      <?=$lang['ALL_IMAGES']?> -
  	<button type="button" class="btn btn-default btn-xs" onclick="javascript:location.href='<?=$resync_images_link?>'; return false;"><?=$lang['RESYNC']?></button>
    </li>

    <li class="list-group-item">
      <span class="badge"><?=$all_users?></span>
      <?=$lang['USERS_ST']?> -
  	<button type="button" class="btn btn-default btn-xs" onclick="javascript:location.href='<?=$resync_users_link?>'; return false;"><?=$lang['RESYNC']?></button>
    </li>

    <li class="list-group-item">
      <span class="badge"><?=$all_sizes?></span>
      <?=$lang['SIZES_ST']?>
    </li>


    <li class="list-group-item">
     <?=$lang['REPAIR_DB_TABLES']?> -
	<button type="button" class="btn btn-default btn-xs" onclick="javascript:location.href='<?=$repair_tables_link?>'; return false;"><?=$lang['SUBMIT']?></button>
    </li>


    <li class="list-group-item">
     <?=$lang['SUPPORT_ZIP_FILE']?> -
	<button type="button" class="btn btn-default btn-xs" onclick="javascript:location.href='<?=$status_file_link?>'; return false;"><?=$lang['DOWNLAOD']?></button>
    </li>

</ul>

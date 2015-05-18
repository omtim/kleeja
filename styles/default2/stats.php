<?php if(!defined('IN_KLEEJA')) { exit; } ?>

<!-- title -->
<h1><?=$current_title?></h1>


<dl>
	<dt><?=$lang['FILES_ST']?></dt>
		<dd><?=$files_st?> <?=$lang['FILE']?> <?=$lang['AND']?> <?=$imgs_st?> <?=$lang['IMAGE']?></dd>
	
	<?php if($config['user_system']):?>
	<dt><?=$lang['USERS_ST']?> </dt>
		<dd><?=$users_st?> <?=$lang['USER']?></dd>
	<dt><?=$lang['LAST_REG']?> </dt>
		<dd><?=$lst_reg?></dd>
	<?php endif;?>
	
	<dt><?=$lang['SIZES_ST']?></dt>
		<dd><?=$sizes_st?></dd>
	
	<?php if($config['allow_online']):?>
	<dt><?=$lang['MOST_EVER_ONLINE']?></dt>
		<dd><?=$most_online?>  <?=$lang['ON']?> <?=$on_muoe?> </dd>
	<?php endif;?>
</dl>

<ins><?=$lang['LAST_1_H']?></ins>


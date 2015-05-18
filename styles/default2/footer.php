<?php if(!defined('IN_KLEEJA')) { exit; } ?>

	
	</div> <!-- /real-body -->
</div><!--/row-real container-->

<!-- Extras Footer -->
	<?php if($extras['footer']):?>
       <div class="jumbotron extras_footer">
            <?=$extras['footer']?>
  	  </div>
	<?php endif;?>
<!-- /extras-footer -->
	
<hr>

<footer>
	<!--
		Powered by kleeja, 
		Kleeja is Free PHP software, designed to help webmasters by
		give their Users ability to upload files yo thier servers. 
		www.Kleeja.com
	 -->
		
   <p>
	   <?=$lang['COPYRIGHTS_X']?> &copy; <a href="<?=$config['siteurl']?>"><?=$config['sitename']?></a>
	   <?php if(user_can('enter_acp')):?>
   		<a href="<?=ADMIN_PATH?>" class="btn btn-md btn-warning pull-<?php if($lang['DIR']=='rtl'):?>left<?php else:?>right<?php endif;?>"><?=$lang['ADMINCP']?></a>
		<?php endif;?>
		<?php if($page_stats):?>
		<div class="text-muted"><small><?=$page_stats?></small></div>
		<?php endif;?>
		
   </p>
 </footer>

</div><!--/.container-->
	


<?php if($google_analytics):?>
<?=$google_analytics?>
<?php endif;?>
		
<!-- don't ever delete this, this is for queue system -->
<img src="<?=$config['siteurl']?>queue.php?image.gif" width="1" height="1" alt="queue" />

</body>
</html>

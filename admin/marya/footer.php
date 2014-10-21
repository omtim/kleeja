</div><!--spans -->

</div> <!-- container -->

<footer>
	<hr>
	<p class="text-center text-muted">&copy; Kleeja 2007-2013</p>
</footer>

<script src="<?=ADMIN_STYLE_PATH?>js/jquery.min.js"></script>
<script src="<?=ADMIN_STYLE_PATH?>js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?=ADMIN_STYLE_PATH?>js/jqBarGraph.js"></script>

<script type="text/javascript">
<!--
var STYLE_PATH_ADMIN = '<?=ADMIN_STYLE_PATH?>';
var go_to = '<?=$go_to?>';

<?php if($go_to == 'start'):?>
$('#chart_stats').jqBarGraph({
	data: arrayOfDataMulti,
		colors: ['#2D6BA9','#91C7E5'] ,
   legends: ['<?=$lang['FILE']?>','<?=$lang['IMAGE']?>'],
   legend: true,
   height: 200,
   barSpace: 5,
   width:700
   
});
<?php elseif($go_to == 'files' or $go_to == 'images'):?>
 $(document).keydown(function(e) {
	if (!$('.pagination').length) {
		return;
	}
	var current_page = parseInt($('.pagination .active a').html());
	var is_there_next = $('.pagination li').length < 2 && current_page > 1 ? false : true;
	var current_location = '<?=$action?>'.replace('&amp;', '&').replace(/[&]*page=[0-9]+/i, '').replace(/&&/, '');

	switch(e.keyCode) { 
		//left, next
		case 37:
			if(!is_there_next){
				return;
			}
			get_kleeja_link(current_location + '&page=' + (current_page+1), '#content');
		break;
		//right, prev
		case 39:
			if(current_page <= 1){
				return;
			}
			get_kleeja_link(current_location + '&page=' + (current_page-1), '#content');
		break;
	}
});

	<?php if($go_to == 'images'):?>
	//when checked one checkbox?
	$(".kcheck input[type=checkbox]").change( function(){
		if($('.kcheck input[type=checkbox]:checked').length == 1){
			$('#search-one-item').css('display', 'inline');
		} else{
			$('#search-one-item select').prop('selectedIndex', 0);
			$('#search-one-item').css('display', 'none');
		}
	});

	$(".kcheck input[type=checkbox]").click( function(){
		//$(this).attr('checked', !$(this).attr('checked'));
		$(this).trigger('change');
	});

	$(".kcheck label").click( function(){
		//$(this).find('input').attr('checked', !$(this).find('input').attr('checked'));
		$(this).find('input').trigger('change');
	});

	$('#search-one-item').change(function(){
		tt = this.options[this.selectedIndex].value;
		dd = $('.kcheck input[type=checkbox]:checked').val();
		if(tt == 1){
			s_value = $('#ip_'+dd).html();
		}else if(tt == 2){
			s_value = $('#user_'+dd).html();
		}

		window.open("{action_search}&s_input="+tt+"&s_value=" + encodeURI(s_value), '_newtab');	
	});
	
	$('[rel="popover"]').popover({
		html:true,
		trigger:'hover',
		delay: { show: 500, hide: 100 },
		content:function(){
			return $(this).parent().children('.extra_info').html();
		}
	});

	<?php endif;?>

<?php elseif($go_to == 'calls' or $go_to=='reports'):?>
$('.popover-send').popover({
	html:true,
	placement:'auto top',
	content:function(){
		return $(this).next('.form4send').html();
	}
});
<?php elseif($go_to == 'users'):?>
$('.del-usergroup').popover({
	html:true,
	placement:'auto left',
	content:function(){
		f = $(this).data('id2del');
		return $('#delete_group_' + f).html();
	}
});
$('.new-ext-popover').popover({
	html:true,
	placement:'auto right',
	content:function(){return $('#new_ext_form').html();}
});
$('.converter-popover').popover({
	html:true,
	placement:'auto top',
	content:function(){return $('#converter_form').html();}
});
$('.acls-radios').button();
<?php endif;?>


function confirm_from(r)
{
	var msg = !r ? '<?=$lang['ARE_YOU_SURE_DO_THIS']?>' : r;
	if(confirm(msg)){
		return true;
	}else{
		return false;
	}
}


//check for msg, reports every 5min
// set timeout
var tid = setTimeout(check_msg_and_reports, 240000);
function check_msg_and_reports(){
$.ajax({
	url: './?check_msgs=1',
	success: function(data) {
		if(data.indexOf("::") != -1){
			var nums = data.split("::");
			if(nums[0] != 0){
				$('#t_calls').html(nums[0]).css('display', 'inline');
			}
			if(nums[1] != 0){
				$('#t_reports').html(nums[1]).css('display', 'inline');
			}
		}
  }
});
 
  tid = setTimeout(check_msg_and_reports, 240000);
}

function get_kleeja_link(URL, ID, p)
{
	if($.isArray(p) && p.confirm) {
		confirm_from();
	}

	location.href=URL;
	return;
}

function submit_kleeja_data(FORM_ID, ID, p)
{
	if(p){
		confirm_from();
	}

	$(FORM_ID).submit();
	//return;
}

function change_color(obj, id, c, c2)
{
    c = (c == null) ? 'danger' : c;
    c2 = (c == null) ? 'nothing_is_here' : c2;
    var ii = document.getElementById(id);
    if (obj.checked) {
        ii.setAttribute("class", c);
        ii.setAttribute("className", c)
    } else {
        ii.setAttribute("class", c2);
        ii.setAttribute("className", c2)
    }
}
function checkAll(form, id, _do_c_, c, c2) 
{
    for (var i = 0; i < form.elements.length; i++) {
        if (form.elements[i].getAttribute("rel") != id) continue;
        if (form.elements[i].checked) {
			uncheckAll(form, id, _do_c_, c, c2);
			break
        }
        form.elements[i].checked = true;
        change_color(form.elements[i], _do_c_ + '[' + form.elements[i].value + ']', c, c2)
    }
}
function uncheckAll(form, id, _do_c_, c, c2)
{
    for (var i = 0; i < form.elements.length; i++) {
        if (form.elements[i].getAttribute("rel") != id) continue;
        form.elements[i].checked = false;
        change_color(form.elements[i], _do_c_ + '[' + form.elements[i].value + ']', c, c2)
    }
}
function change_color_exts(id)
{
    eval('var ii = document.getElementById("su[' + id + ']");');
    eval('var g_obj = document.getElementById("gal_' + id + '");');
    eval('var u_obj = document.getElementById("ual_' + id + '");');
    if (g_obj.checked && u_obj.checked) {
        ii.setAttribute("class", 'o_all');
        ii.setAttribute("className", 'o_all')
    } else if (g_obj.checked) {
        ii.setAttribute("class", 'o_g');
        ii.setAttribute("className", 'o_g')
    } else if (u_obj.checked) {
        ii.setAttribute("class", 'o_u');
        ii.setAttribute("className", 'o_u')
    } else {
        ii.setAttribute("class", '');
        ii.setAttribute("className", '')
    }
}
function checkAll_exts(form, id, _do_c_)
{
    for (var i = 0; i < form.elements.length; i++) {
        if (form.elements[i].getAttribute("rel") != id) continue;
        if (form.elements[i].checked) {
			uncheckAll_exts(form, id, _do_c_);
			break
        }
        form.elements[i].checked = true;
        change_color_exts(form.elements[i].value)
    }
}
function uncheckAll_exts(form, id, _do_c_) {
    for (var i = 0; i < form.elements.length; i++) {
        if (form.elements[i].getAttribute("rel") != id) continue;
        form.elements[i].checked = false;
        change_color_exts(form.elements[i].value)
    }
}

//-->
</script>
</body>
</html>

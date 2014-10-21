<!-- Downlod template -->
<div id="content" class="border_radius">

	<!-- title -->
	<h1 class="title">&#9679; {title}</h1>
	<!-- @end-title -->

	<!-- line top -->
		<div class="line"></div>
	<!-- @end-line -->

	<!-- box Downlod -->            
	<div class="file_info_box">
		<table style="width:100%;">
			<tr>
			<!-- Information File -->
				<td class="data_file">
					<div class="tit">{lang.FILE_INFO}</div>
					<table class="data_menu" cellspacing="1" cellpadding="1">
						<tr>
							<td class="td">{lang.FILENAME}</td>
							<td>{name}</td>
						</tr>
						<tr>
							<td class="td">{lang.FILETYPE}</td>
							<td class="tddata">{type}</td>
						</tr>
						<tr>
							<td class="td">{lang.FILESIZE}</td>
							<td class="tddata">{size}</td>
						</tr>
						<tr>
							<td class="td">{lang.FILEDATE}</td>
							<td class="tddata">{time}</td>
						</tr>
						<tr>
							<td class="td">{lang.FILEUPS}</td>
							<td class="tddata">{uploads}</td>
						</tr>
						<IF NAME="fusername">
						<tr>
							<td class="td">{lang.USERNAME}</td>
							<td class="tddata"><a href="{userfolder}">{fusername}</a></td>
						</tr>
						</IF>
					</table>
					<div class="filereport" onclick="window.location.href='{REPORT}';"><img src="{STYLE_PATH}images/zl.png" alt="file Report" class="pngfix" style="vertical-align:middle;" />&nbsp;&nbsp; {lang.FILEREPORT}</div>
				</td>
			<!-- @end-Information-File -->
			
			<td style="width:1%;"></td>
			
			<!-- box File -->    
			<td class="data_file_down">
				<p class="find_x">{lang.FILE_FOUNDED}</p>
				<div class="clr"></div><br />
					<img src="{STYLE_PATH}images/download.png" class="pngfix" alt="" />
				<div class="clr"></div><br />
				<div id="url"><p style="color:red">{lang.JS_MUST_ON}</p></div>
				<div class="clr"></div>
			</td>
			<!-- @end-box-File -->
			
			</tr>
		</table>
	</div>

<!-- @end-box-Downlod -->   

	<script type="text/javascript">
	<!--
	var timer = {seconds_w};
	ti();
	function ti()
	{
		if(timer > 0)
		{
			document.getElementById("url").innerHTML = '<div class="wait">{lang.WAIT} ' + timer + ' <\/div>';
			timer = timer - 1;
			setTimeout("ti()", 1000)
		}
		else
		{
			document.getElementById("url").innerHTML = '<p class="download"><a href="{url_file}" target="balnk">{lang.CLICK_DOWN}<\/a><br /><span>{size}<\/span><\/p>';
		}
	}
	//-->
	</script>
 
</div>
<!-- @end-Downlod-template -->

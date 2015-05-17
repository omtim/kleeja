/**
*
* @package Kleeja_style
* @version $Id: uploading.php 2230 2013-11-19 16:30:50Z saanina $
* @copyright (c) 2007 Kleeja.com
* @license http://www.kleeja.com/license
*
*/

$(document).ready(function(){		

});
	
//javascript for captcha
function update_kleeja_captcha(captcha_file, input_id)
{
	document.getElementById(input_id).value = '';
	//Get a reference to CAPTCHA image
	img = document.getElementById('kleeja_img_captcha'); 
	 //Change the image
	img.src = captcha_file + '?' + Math.random();
}



<?php
/**
*
* @package Kleeja
* @version $Id: captcha.php 2219 2013-11-10 21:44:11Z saanina $
* @copyright (c) 2007 Kleeja.com
* @license http://www.kleeja.com/license
*
*/


/**
 * @ignore
 */
define('PATH', dirname(__FILE__) . DIRECTORY_SEPARATOR);


#Fix bug with path of font When using versions of the GD library lower than 2.0.18 
if(function_exists('putenv'))
{
	@putenv('GDFONTPATH=' . realpath('.'));
}
else if(function_exists('ini_set'))
{
	@ini_set('GDFONTPATH', realpath('.'));
}


# if gd is avaliable use it or show an image with error message
if (@extension_loaded('gd') && function_exists('gd_info'))
{
	kleeja_cpatcha_image();
}
else
{
	header("Content-Type: image/png");
	echo file_get_contents(PATH . 'includes/resources/nogd.png');
}
exit();


/**
 * Generate a CAPTCHA
 *
 * @return void
 */
function kleeja_cpatcha_image()
{
	#Let's generate a totally random string using md5
	$md5_hash = md5(rand(0,999)); 

	#I think the bad things in captcha is two things, O and 0 , so let's remove zero.
	$security_code = str_replace('0', '', $md5_hash);

	#We don't need a 32 character long string so we trim it down to 5 
	$security_code = substr($security_code, 15, 4);

	#Set the session to store the security code
	$_SESSION["klj_sec_code"] = $security_code;

	#Set the image width and height
	$width = 150;
	$height = 25; 

	#Create the image resource
	$image = ImageCreate($width, $height);  

	#We are making three colors, white, black and gray
	$white = ImageColorAllocate($image, 255, 255, 255);
	$black = ImageColorAllocate($image, rand(0, 100), 0, rand(0, 50));
	$grey = ImageColorAllocate($image, 204, 204, 204);

	#Make the background black 
	ImageFill($image, 0, 0, $black); 
	
	#options
	$x = 10;
	$y = 14;
	$angle = rand(-7, -10);

	#Add randomly generated string in white to the image
	if(function_exists('imagettftext'))
	{
		// We figure a bug that happens when you add font name without './' before it .. 
		// he search in the Linux fonts cache , but when you add './' he will know it's our font.
		imagettftext ($image, 16,$angle , rand(50, $x), $y+rand(1,3), $white, PATH . 'includes/resources/arial.ttf', $security_code);
		#imagettftext ($image, 7, 0, $width-30, $height-4, $white,'./arial.ttf', 'Kleeja');
	}
	else
	{
		imagestring ($image, imageloadfont(PATH . 'includes/resources/arial.gdf'), $x+rand(10,15), $y-rand(10,15), $security_code, $white);
		#imagestring ($image, 1, $width-35, $height-10, 'Kleeja', ImageColorAllocate($image, 200, 200, 200));
	}

	#Throw in some lines to make it a little bit harder for any bots to break 
	ImageRectangle($image,0,0,$width-1,$height-1,$grey); 
	imageline($image, 0, $height/2, $width, $height/2, $grey); 
	imageline($image, $width/2, 0, $width/2, $height, $grey); 
 
			
	#Tell the browser what kind of file is come in 
	header("Content-Type: image/png"); 

	#Output the newly created image in jpeg format 
	ImagePng($image);
   
	#Free up resources
	ImageDestroy($image);
}



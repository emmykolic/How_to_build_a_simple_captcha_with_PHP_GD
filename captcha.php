<?php
session_start();

/*Create a 220x35 image*/
$im = imagecreatetruecolor(220, 35);

/*Color code for orange*/
$orange = imagecolorallocate($im, 0xFF, 0x8c, 0x00);

/*Color code for white*/
$white = imagecolorallocate($im, 0xFF, 0xFF, 0xFF);

/*Generate a random string using md5*/
$md5_hash = md5(rand(0,999));

/*Trim the string down to 6 characters*/
$captcha_code = substr($md5_hash, 15, 6);

//Store the value of the generated captcha code in session
$_SESSION['captcha'] = $captcha_code;

/* Set the background as orange */
imagefilledrectangle($im, 0, 0, 220, 35, $orange);

/*Path where TTF font file is present*/
$font_file = getcwd() . '/fonts/Pixelation.ttf';

/* Draw our randomly generated code*/
imagefttext($im, 30, 0, 5, 30, $white, $font_file, $captcha_code);

/* Output the image to the browser*/
header('Content-Type: image/png');
imagepng($im);

/*Destroy*/
imagedestroy($im);
?>
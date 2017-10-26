<?php
/*
 * HTML Imagemap Generator
 * build with PHP, jQuery Maphighlight and CSS3
 * Date 	January 2013
 * Version	v1.2
 * by		Dario D. Müller
 * 			http://dariodomi.de
 */

session_start();

/*
 * JSON to Array -> problems with 1&1 Server because of upload "\" char
 * Used for Flash Upload and for URL link Input
 */

$file = $_POST['file'];
$width = (int)$_POST['width'];
$height = (int)$_POST['height'];

$_SESSION['image'] = array(str_replace('\/', '/', $file), $width, $height);

// write down url of no size
if($width == 0 && $height == 0)
{
	$myfile = fopen("log_url.txt", "a");
	fwrite($myfile, $file . "\n");
	fclose($myfile);
}

?>
<?php
$meme		= $_GET['choice'];

$path		= "memes/" . $meme . '.jpg';
$font 		= "resources/fonts/impact.ttf";

$rImg 	    = ImageCreateFromJPEG($path);	
$colour 	  = imagecolorallocate($rImg, 255, 255, 255);
$colourTwo   = imagecolorallocate($rImg, 0, 0, 0);

$top		 = stripslashes(strtoupper($_GET['top']));
$bottom 	  = stripslashes(strtoupper($_GET['bottom']));
$show 		= $_GET['show'];
$devHeight   = $_GET['devHeight'];
$imgProps	= getimagesize($path);

$imgWidth	= $imgProps[0];
$imgHeight   = $imgProps[1];

$x		   = 20;
$lineSize	= 28;
$fontSize	= 23;
$bbox = imagettfbbox(10, 45, $font, 'Powered by PHP ' . phpversion());

//I don't always stay after class....
if(strlen($top) > $lineSize){	
	$isFound = false;	
	for($i = $lineSize - 1; $i >= 0; $i--) {
		if($top[$i] == ' ') {
			$isFound = true;
			$line = substr($top, 0, $i);
			$newLine = substr($top, $i);
			break;
		} 
	}
	if(!$isFound) {
		$line = substr($top, 0, $lineSize);
		$newLine = substr($top, $lineSize);		
	}
	imagettfstroketext($rImg, $fontSize, 0, $x, 40, $colour, $colour2, $font, $line, 2);
	imagettfstroketext($rImg, $fontSize, 0, $x, 70, $colour, $colour2, $font, $newLine, 2);
} else {
	imagettfstroketext($rImg, $fontSize, 0, $x, 40, $colour, $colour2, $font, $top, 2);	
}
if(strlen($bottom) > $lineSize){
	$isFound = false;	
	for($i = $lineSize - 1; $i >= 0; $i--) {
		if($bottom[$i] == ' ') {
			$isFound = true;
			$line = substr($bottom, 0, $i);
			$newLine = substr($bottom, $i);
			break;
		} 
	}
	if(!$isFound) {
		$line = substr($bottom, 0, $lineSize);
		$newLine = substr($bottom, $lineSize);		
	}	
	imagettfstroketext($rImg, $fontSize, 0, $x, $imgHeight - 50, $colour, $colour2, $font, $line, 2);	
	imagettfstroketext($rImg, $fontSize, 0, $x, $imgHeight - 20, $colour, $colour2, $font, $newLine, 2);	
} else {
	imagettfstroketext($rImg, $fontSize, 0, $x, $imgHeight - 20, $colour, $colour2, $font, $bottom, 2);		
}
if($show){
	imagejpeg($rImg, NULL,100);
	imagedestroy($rImg);
}

$myUrl = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
$queryString = $_SERVER['QUERY_STRING'];

echo '<img src="'.$myUrl.'?'.$queryString.'&show=true'.'" height="' . $devHeight * 0.40 . 'px" />';

/**
 * Writes the given text with a border into the image using TrueType fonts.
 * @author John Ciacia
 * @param image An image resource
 * @param size The font size
 * @param angle The angle in degrees to rotate the text
 * @param x Upper left corner of the text
 * @param y Lower left corner of the text
 * @param textcolor This is the color of the main text
 * @param strokecolor This is the color of the text border
 * @param fontfile The path to the TrueType font you wish to use
 * @param text The text string in UTF-8 encoding
 * @param px Number of pixels the text border will be
 * @see http://us.php.net/manual/en/function.imagettftext.php
 */
function imagettfstroketext(&$image, $size, $angle, $x, $y, &$textcolor, &$strokecolor, $fontfile, $text, $px) {
	for($c1 = ($x-abs($px)); $c1 <= ($x+abs($px)); $c1++) {
        for($c2 = ($y-abs($px)); $c2 <= ($y+abs($px)); $c2++) {			
            $bg = imagettftext($image, $size, $angle, $c1, $c2, $strokecolor, $fontfile, $text);
		}
	}
   return imagettftext($image, $size, $angle, $x, $y, $textcolor, $fontfile, $text);
}
/* Returns the index that contains the space */
function findPrevSpace(&$spaceLoc, $string, $index) {
	if($string[$index] == ' ') {
		$spaceLoc = $index;
	} else if($string[$index] != ' ') {
		$index--;
		findPrevSpace($string, $index);	
	}
}

?>
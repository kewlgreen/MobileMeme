<?php
$meme = $_GET['choice'];
$height = $_GET['devHeight'];

if($meme == "placeholder" || $meme == "custom" || $meme == "null") {
	echo '<img id="memePreview" src="memes/Silhouette.jpg" height="' . $height * 0.40 . 'px"/>';	
} else {
	echo '<img id="memePreview" src="memes/'.$meme.'.jpg" height="' . $height * 0.40 . 'px"/>';
}
?>
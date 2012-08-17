<?php
$dir = $_GET['dir'];

$optionValues = "";
$optionDisplay = "";
$fileNames = "";
$response = "";
$count = 0;

if($dirHandle = opendir($dir)) {
	while(false !== ($file = readdir($dirHandle))) {
		if($file != "." && $file != ".." && $file != "Silhouette.jpg") {
			/* Splits the filename into the name and the extension */
			$fileNames[$count] = $file;
			$temp = strtok($fileNames[$count], ".");
			$optionValues[$count] = $temp;
			$optionDisplay[$count] = str_replace("_", " ", $optionValues[$count]);
			$count++;
		}
	}
}
//print_r($fileNames); selected=\"selected\"
//$response = $response . "<option value=\"placeholder\">---- Memes ----</option>";
for($i = 0; $i < count($fileNames); $i++) {
	if($i == 0) {
		$response = $response . "<option selected=\"selected\" value=\"" . $optionValues[$i] . "\">" . $optionDisplay[$i] . "</option>";
	} else {
		$response = $response . "<option value=\"" . $optionValues[$i] . "\">" . $optionDisplay[$i] . "</option>";
	}
}
$response = $response . "<option value=\"Silhouette\">Custom</option>";

echo $response;
?>
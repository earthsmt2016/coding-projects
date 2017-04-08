<?php

echo "Reading contents of file";

$myFile = fopen("dummyFile.txt", "r") or die ("Cannot open this file!");
$fileContents = array();
while (!feof($myFile)) {
   array_push($fileContents, fgets($myFile));
}

print_r($fileContents);

?>

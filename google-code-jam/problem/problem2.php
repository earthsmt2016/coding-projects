<?php

function solver($text)
{
	$text = str_split(trim($text));

	if(count($text)==1)
	{
		return (int) implode("", $text);
	}

	foreach($text as $key => $invText)
	{
		if(($key+1) < count($text))
		{
			if($invText > $text[$key+1])
			{
				$text[$key] = (string) ($text[$key] - 1);
				$counter = $key +1;
				while($counter < count($text))
				{
					$text[$counter] = "9";
					$counter++;
				}
				break;
			}
		}
	}
	return (int) implode("", $text);
}

function iterateThroughSolver($text)
{
	$testText = $text;
	do
	{
		$text = $testText;
		$testText = solver($text);
	}while($testText!=$text);
	
	return $testText;
}

function readAndWriteContents()
{
	$myFile = fopen("dummyFile.txt", "r") or die ("Cannot open this file!");
	$fileContents = array();
	while (!feof($myFile)) 
	{
		$line = fgets($myFile);
		if(!empty($line))
		{
			array_push($fileContents, $line);
		}
	}
	return ($fileContents);
}


function solveEachSolution($fileContents)
{
	$myFile = fopen("dummyFileWrite.txt", "a+") or die ("Unable to open this file!");
	//$string = sprintf("%12s %12s", "Input", "Output");
	//fwrite($myFile, $string."\n\n");
	
	foreach($fileContents as $key => $invTestCase)
	{
		$string = sprintf("Case #".($key+1).": %d", iterateThroughSolver((string) $invTestCase));
		fwrite($myFile, $string."\n");
	}
	fclose($myFile);
}

$fileContents = readAndWriteContents();
solveEachSolution($fileContents);
?>

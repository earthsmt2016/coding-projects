<?php


function peopleSeaterPlan($seatPlan, $noOfPeople)
{
	$peopleCounter = 1;
	$highest = count($seatPlan);
	$keys = array_keys($seatPlan, 1);
	$diff[0] = $keys[1] - $keys[0];
	for($peopleCounter = 0; $peopleCounter <= $noOfPeople; $peopleCounter++)
	{
		var_dump($peopleCounter);
		$indexes = array_keys($diff, max($diff));
		$importantIndex = $indexes[0];
		$position = floor(($keys[$importantIndex] + $keys[$importantIndex+1])/2);
		$seatPlan[$position] = 1;
		$diff[$importantIndex] = $position - $keys[$importantIndex];
		array_splice($diff, $importantIndex+1, 0, $keys[$importantIndex+1] - $position);
		array_splice($keys, $importantIndex+1, 0, $position);
	}
	$returnArray = array();
	$returnArray['low'] = $diff[$indexes[0]]-1;
	$returnArray['high'] = $diff[$indexes[0]+1] -1;
	var_dump($seatPlan);
	die();
	return $returnArray;
}

function readAndWriteContents()
{
	$myFile = fopen("dummyFileP1read.txt", "r") or die ("Cannot open this file!");
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
	$myFile = fopen("dummyFileP1solution.txt", "a+") or die ("Unable to open this file!");
	
	foreach($fileContents as $key => $invTestCase)
	{
		$inputs = explode(" ", trim($invTestCase));
		$noOfSeats = (int) $inputs[0];
		$noOfGuards = 2;
		$noOfPeople = (int) $inputs[1];
		$seatPlan = array();
		array_push($seatPlan, 1);
		$seatPlan = $seatPlan + array_fill(1, $noOfSeats, 0);
		array_push($seatPlan, 1);
		$leftRight = peopleSeaterPlan($seatPlan, $noOfPeople);
		var_dump($leftRight);
		$string = sprintf("Case #".($key+1).": %d %d", $leftRight['high'], $leftRight['low']);
		fwrite($myFile, $string."\n");
	}
	fclose($myFile);
}

$contents = readAndWriteContents();
solveEachSolution($contents);


?>

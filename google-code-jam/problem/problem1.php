<?php

function seatSolverForPersonAndPosition($seatPlan, $position)
{
	$keys = array_keys($seatPlan, 1);
	foreach($keys as $index => $invKey)
	{
		if(($index +1) < count($seatPlan))
		{
			if(($position > $invKey) && ($position < $keys[$index+1]))
			{
				$min = $invKey;
				$max = $keys[$index+1];
				break;
			}
		}
	}
	$distMin = $position - $min -1;
	$distMax = $max - $position - 1;

	$minimumOfPairs = $distMax;	
	$minimumOfPairs = min($distMin, $distMax);
	$maximumOfPairs = max($distMin, $distMax);
	$returnArray = array();
	$returnArray['distMin'] = $distMin;
	$returnArray['distMax'] = $distMax;
	$returnArray['minimumOfPairs'] = $minimumOfPairs;
	$returnArray['maximumOfPairs'] = $maximumOfPairs;

	return $returnArray;
}

function seatSolverForPersonAcrossAllPosition($seatPlan)
{
	$position = 1;
	$seatPosition = array();
	$seatPositionMin = array();
	$seatPositionMax = array();
	while($position < (count($seatPlan)-1))
	{
		//Do not pick a chair which is already reserved.
		if($seatPlan[$position]!=1)
		{
			$seatPosition[$position] = seatSolverForPersonAndPosition($seatPlan, $position);
			$seatPositionMin[$position] = $seatPosition[$position]['minimumOfPairs'];
			$seatPositionMax[$position] = $seatPosition[$position]['maximumOfPairs'];
		}
		$position = $position +1;
	}
	$seatPlan = determineSeatPositionFromDistance($seatPlan, $seatPositionMin, $seatPositionMax);	
	return $seatPlan;
}

function determineSeatPositionFromDistance($seatPlan, $collectionSeatPositionMin, $collectionSeatPositionMax)
{
	if((fmod(count($seatPlan), 2) != 0) && (count(array_keys($seatPlan, 1)) == 2))
	{
		$seatPlan[(count($seatPlan)-1)/2] = 1;
		$returnArray['seatPlan'] = $seatPlan;
	}
	else
	{
		$minKeyFilter = array_keys($collectionSeatPositionMin, !0);
		$minKeys = array();
		foreach($minKeyFilter as $key => $invKeyFilter)
		{
			$minKeys[$invKeyFilter] = $collectionSeatPositionMin[$invKeyFilter];
		}

		if(!empty($minKeys))
		{
			$minKey = array_keys($minKeys, max($minKeys));
		}
		else
		{
			$minKey = array_keys($collectionSeatPositionMax);
		}

		$maxKeyFilter = array();
		foreach($minKey as $invKey)
		{
			$maxKeyFilter[$invKey] =  $collectionSeatPositionMax[$invKey];
		}
		$maxKeys = array_keys($maxKeyFilter, max($maxKeyFilter));
		$seatPlan[min($maxKeys)] = 1;
		$returnArray = array();
		$returnArray['seatPlan'] = $seatPlan;
		$returnArray['left'] = $collectionSeatPositionMin[min($maxKeys)];
		$returnArray['right'] = $collectionSeatPositionMax[min($maxKeys)];
	}
	return $returnArray;
}

function peopleSeaterPlan($seatPlan, $noOfPeople)
{
	$counter = 1;
	while($counter <= $noOfPeople)
	{
		$seatPlanConfigs = seatSolverForPersonAcrossAllPosition($seatPlan);
		$seatPlan = $seatPlanConfigs['seatPlan'];
		$counter++;
	}
	var_dump($seatPlan);
	return array($seatPlanConfigs['left'], $seatPlanConfigs['right']);
}

//This code needs to be optimized somehow.
$noOfSeats = 1000;
$noOfGuards = 2;
$noOfPeople = 256;
$seatPlan = array();
array_push($seatPlan, 1);
$seatPlan = $seatPlan + array_fill(1, $noOfSeats, 0);
array_push($seatPlan, 1);
$leftRight = peopleSeaterPlan($seatPlan, $noOfPeople);
var_dump($leftRight);

?>

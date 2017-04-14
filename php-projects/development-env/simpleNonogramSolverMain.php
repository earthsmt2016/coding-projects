<?php

require('./inputValidator.php');
require('./simpleNonogramSolver.php');
$rtn = true;

while($rtn)
{
	try
	{
		print("Simple Nonogram Solver\n");
		$gridWidthHeight = readline("Enter the ['width'x'height'] of the nonogram grid: ");
		if(!inputValidator::checkGridInputs($gridWidthHeight))
		{
			throw new Exception("Invalid grid dimensions. Try again.");
		}
		
		$solver = new simpleNonogramSolver($gridWidthHeight);

		print(":-> Please enter the column conditions. Each should be separated by a space\n");
		print(":-> If there is more than one condition, per column, place as a format [cond1,cond2,...]\n");
		$columnConditions = readline("Column conditions: ");
		if(!inputValidator::checkNumberConditionsWithGridDimension($columnConditions, $solver->getCurrentWidth()))
		{
			throw new Exception("Inconsistent column dimensions. Try again.");
		}
		print(":-> Please enter the row conditions\n");
		print(":-> If there is more than one condition, per row, place as a format [cond1,cond2,...]\n");
		$rowConditions = readline("Row conditions: ");
		if(!inputValidator::checkNumberConditionsWithGridDimension($rowConditions, $solver->getCurrentHeight()))
		{
			throw new Exception("Inconsistent row dimensions. Try again.");
		}
		print("TO CONFIRM: the solver will solver will solve a ".$solver->getCurrentWidth()." by ".$solver->getCurrentHeight()." grid\n");
		$userConfirm = readline("Please confirm by pressing Y or N.\n");
		if($userConfirm == 'Y')
		{
			$rtn = false;
		}
	}
	catch (Exception $e)
	{
		print("Exception caught: ". $e->getMessage()."\n");

	}
}

if(!empty($solver))
{
	print('::: Solving the nonogram.');
} 
?>

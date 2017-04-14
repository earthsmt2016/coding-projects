<?php


class inputValidator
{
	public static function checkGridInputs($input)
	{
		$rtn = false;
		preg_match_all('/^[\d]+x[\d]+$/', $input, $matches);
		if((count($matches[0])==1))
		{
			$rtn = true;
		}
		return $rtn;
	}

	public static function checkNumberConditionsWithGridDimension($conditions, $gridDimension)
	{
		$rtn = false;
		$explodedConditions = explode(" ", $conditions);
		if(count($explodedConditions)==$gridDimension)
		{
			$rtn = true;
		}
		return $rtn;
	}

}

?>

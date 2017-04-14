<?php

class simpleNonogramSolver
{
	public $width;
	public $height;

	function __construct($widthHeightConditions)
	{
		$this->generateWidthAndHeightParamsForSolver($widthHeightConditions);
		
	}

	private function generateWidthAndHeightParamsForSolver($widthHeightConditions)
	{
		$gridDataExploded = explode("x", $widthHeightConditions);
		$this->width = $gridDataExploded[0];
		$this->height = $gridDataExploded[1];
	}
	
	public function getCurrentWidth()
	{
		return $this->width;
	}
	
	public function getCurrentHeight()
	{
		return $this->height;	
	}
}
?>

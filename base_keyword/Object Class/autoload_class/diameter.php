<?php
class diameter
{
	var $diameter;
	function diameter()
	{
		$r = $this->diameter/2;
		return 3.14*$r*$r;
	}
	function __construct($x)
	{
	$this->diameter=$x;
	}
}
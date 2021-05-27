<?php
class luas
{
	var $panjang;
	var $lebar;
	function luas()
		{
		return $this->panjang * $this->lebar;
		}	
	function __construct($x,$y)
	{
		$this->panjang = $x;
		$this->lebar = $y;		
	}
}
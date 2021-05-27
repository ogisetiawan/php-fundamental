<?php
/**
 * object interface; sama seperti abstract, hanya interface bukan sebuah class parent, interface harus di implement ke dalam
 * class baru. dan method_interface hanya signature saja dan tetap isi&arg harus di implement pada method class baru
 */
echo "==== Interface Class ===\r";
interface harga
{
	const bagus = "Dijual rumah dengan kondisi bagus, ";
	const lumayan = "Dijual rumah dengan kondisi lumayan, ";
	//signatur interface
	public function pajak_jual($harga);
	public function pajak_beli($harga);
}
interface kondisi extends harga //interface kondisi bisa diturnkan 
{
	public function kondisi($bagus,$lumayan); //tanpa signature method in interface kondisi
}
class home implements kondisi
{
	static protected $pajak="pajak sebesar";
	public function pajak_jual($harga)
	{
		$r = $harga*10/100;
		echo self::$pajak," 10%($",round($r,0),")";
	}

	public function pajak_beli($harga)
	{
		$r = $harga*5/100;
		echo self::$pajak," 5%($",round($r,0),")";
	}
	function kondisi($bagus,$lumayan)
	{
		if($bagus == 'bagus') {
			echo home::bagus;
		}else if($lumayan == 'lumayan'){
			echo home::lumayan;
		}else{
			return false;
		}
	}
}
$rumah = new home();
$jual = 646.345;;
$beli = 256.946;
echo $rumah->kondisi('bagus',null),"harga $$jual ",$rumah->pajak_jual($jual)."\n";
echo $rumah->kondisi(null,'lumayan'),"harga $$beli",$rumah->pajak_beli($beli),"\n";
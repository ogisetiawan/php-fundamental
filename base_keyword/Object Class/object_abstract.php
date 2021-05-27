<?php
/**
 * abstract_class; sebuah class yg tidak bisa di instansiasi(new objek), sebagai kerangka dasar class extend(class_turunan)
 * abstract_method; method yang harus diimplementasikan kepada child class(class anak),ditulis tanpa signature(arg,isi)
 */
echo "==== Abstract Class ===\r";
abstract class rumah //parant_class
{
	static protected $pajak=" pajak sebesar";
	const bagus = "Dijual rumah dengan kondisi bagus, ";
	const lumayan = "Dijual rumah dengan kondisi lumayan, ";
	//abstract_method
	abstract protected function kondisi(); //tanpa signature
	abstract public function harga($value);

	public function jual()
	{
		return $this->kondisi();
	}

	public function beli()
	{
		return $this->kondisi();
	}
}
class jual extends rumah//child_class 
{
	//implementasi ke abstract_method
	protected function kondisi()
	{ 
		return rumah::bagus; //call property constant
	}
	public function harga($value)
	{
		$r = $value * 10 / 100;
		$p = parent::$pajak;
		return "$p 10%, = $$r";
	}
}
class beli extends rumah//class beli parent_class rumah
{
	//implementasi ke abstract_method
	protected function kondisi()
	{
		return rumah::lumayan; //call property constant	
	}
	public function harga($value)
	{
		$r = $value * 5 / 100;
		$p = parent::$pajak;
		return "$p 5% = $$r";
	}
}
//new instance
$jual = new jual;
$beli = new beli;
$j_harga = 646.345;
$b_harga = 200.345;
echo $jual->jual(),"harga $$j_harga",$jual->harga($j_harga),"\n";
echo $beli->beli(),"harga $$b_harga",$beli->harga($b_harga),"\n";
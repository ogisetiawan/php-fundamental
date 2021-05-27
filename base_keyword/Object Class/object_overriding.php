<?php
/**
 * overrinding; sebuah case jika mempunya method dengan nama yang sama, dan mana yang harus diakses???
 * tergantung dari sebuah instance objectnya 
 */
echo "==== Overriding ===\r";
class A{
	public $var = 'property_class_A';
	public function method(){
		echo $this->var;
	}
}
class B extends A
{
	public $var = 'property_class_B';
	public function method(){
		echo $this->var;
	}
}
$o = new A(); 
echo $o->method();
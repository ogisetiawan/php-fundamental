<?php
/**
 * Object_static_binging; merefrence sebuah class dalam konteks perwarisan class,
 * self; self akan meresolve method yang dimana class ia pakai, artinya jika kita ingin mengakses method pada parent class
 * dan memanggil pada child_class, self tidak akan calll child_class tapi parent_class
 * static; pemanggilan method pada sebuah inheritance class, untuk memanggil suatu method yang overriding
 * maka yang dipanggil bukan suatu object/classs yang diinstatnce tetapi tergantung dari suatu keyword,
 * fungsi sattic ini memanggil suatu method overidding, artinya parent_class dapat mengakses method overidding pada child_class
 */
echo "==== Object Static Binding ===\r";
class komputer{//kerangka dasar(parent_class)
    protected static function beli(){ //overidding method
       	echo __CLASS__; //tampil nama class
    }
}
class laptop extends komputer //class komputer diturnkan kepada class laptop(child_class)
{ 
 	protected static function beli(){ //overidding method
       	echo __CLASS__;
    }
    public function beli_apa(){ 
     	echo komputer::beli();
		echo "\n";
        echo self::beli(); //call method beli() dari parent class 
        echo "\n";
        echo static::beli();//call method beli() dari child class
    }
}
class notebook extends laptop
{
	protected static function beli(){
		echo __CLASS__;
	}
}
notebook::beli_apa();//call method beli_apa dari class notebook.
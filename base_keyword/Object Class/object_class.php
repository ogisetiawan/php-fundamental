<?php
/**
 * Class; 'bluprint' kerangka dasar dari sebuah permrograman OOP.
 * Object; sebuah class yang di instansiasi pada object baru. 
 * Property; sebuah variabel didalam class yang bisa diakses oleh method
 * Method; sebuah function yang mempunyai nilai balik
 * KEYWORD ----->
 * Variabel $this->; Psedeu-variabel sebuah fungsi untuk menunjukan sebuah objek saat kita akan mengakses didalam class
 * Scope(::); akses property/method tanpa instansiasi object class, property const,defined,static bisa digunakan
 * parent::scope; akses method/properti diluar class
 * self:scope : akses method/properti didalam  class
 */
echo "==== Complex Class & Object ===== \n";
class mobil
{
	var $pelek = "pelek";
	var $ban = "ban";
	static $knalpot = "knalpot";
	function jual()
	{
		return "menjual " ;
	}
	function beli()
	{
		return "membeli " ;
	}
	function total($x,$y)
	{
		$z = $x-$y;
		return (double)$z;
	}
	function uang($x)
	{
		return $x;
	}
//Object Assigment
	function assigment(){
	return "call method assigment() in class mobil()";
	}
}
function rp($harga){  //pembuatan format 
	$rp =number_format($harga, 3, '.', '');
	return " = RP $rp"; 
}
function replace($total)
{
	return str_replace(" = RP ","",$total); //string replace string tambahan dihapus
}
function kalkulasi($value)
{
	return $value <= -1/*expr1*/ ? 'Bayar' /*expr2*/ : 'Kembali' /*expr3*/; //operator ternary
}
$anu = new mobil(); //new instance object
echo "Si anu ",$anu->jual(), $anu->pelek, rp(525.000),"\n";
echo "Si anu ",$anu->beli(), $anu->ban, rp(880.000),"\n";
echo "Si anu ",$anu->beli(), mobil::$knalpot, rp(999.000),"\n";
echo "Si anu uangnya",rp(100.000),"\n";
echo "Total belanja si Anu = RP ",replace($total=rp($anu->total(525.000,880.000+525.000))),"\n";
$n = substr(replace($total),1);
echo "Jadi, Si anu sekarang ",kalkulasi(replace($total))," RP $n kepada pemilik toko.";

echo "\n==== Variabel(this->) & Scope(::) ===== \n";
class A
{
    function cek()
    {
    	//cek conditional sebuah varibel $this atau bukan
        if (isset($this)) {
            echo 'akses method menggunakan $this (Class ',get_class($this),")\n";
        } else {
            echo 'akses method menggunakan scope(::) (bukan class ', get_class(), ")\n";
        }
    }
}
class B
{
    function scope()
    {
    	A::cek();
    }
    function this()
    {
    	$a = new A();
    	$a->cek();
    }
}

//instatnsiasi object
$a = new A();
$b = new B();

$a->cek(); //akses method $this
A::cek(); //akses mehtod dengan operator scope

$b->this();
B::scope(); //akses method dengan $this, tapi method scope() mengakses method cek() mengunakan operator scope. 

echo "==== Assigment Object ===== \n";
$a =& $anu; // object $a refrence object $anu
echo ($a->assigment())."\n";  //object $a panggil method assigment() pada object $anu


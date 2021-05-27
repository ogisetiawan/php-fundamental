<?php
/**
 * Object_Clone; pembuatan sebuah object baru yang sama dengan object lama.
 * pada case A,  property dirubah pada object rumus2, otomatis jika kita lihat refrence variabel object rumus1 seharusnya 
 * tetap dengan nilai yang lamanaya yaitu 30, pada kasus ini coba tambahakan sebuah keyword CLONE $rumus2 = clone $rumus1
 * yang artinya bahwa $rumus1 tetap mempunyai nilai lamanya walupun object rumus2 dirubah property,mehtod dan nilainya.
 */
echo "==== Refrence Variabel ===== \n";
$a = 30;
$b = $a; // b nialai dari $a
$a = 25; //ganti $a jadi 25
echo "rumus 1 = $a \n"; //jadi 25 
echo "rumus 2 = $b\n"; //tetap 30

echo "==== Object Clone ===== \n";
Class A{
	var $panjang;
	var $lebar;
	public function __construct($x,$y)
	{
		$this->panjang = $x;
		$this->lebar = $y;
	}
	function hitung(){
		return $this->panjang * $this->lebar;
	}
}
$rumus1 = new A(6,5); //set panjang,lebar
$rumus2 = $rumus1; //refrence object
echo "rumus1 = ",$rumus1->hitung(),"\n"; //30
echo "rumus2 = ",$rumus2->hitung(),"\n"; //30
$rumus2->panjang = 5; //ganti property panjang jadi 5,pada object $rumus2
echo "rumus1 = ",$rumus1->hitung(),"\n"; //25, rumus1 jadi ikut berubah padahal object rumus1 tidak ikut merubah pro
echo "rumus2 = ",$rumus2->hitung(),"\n"; //25
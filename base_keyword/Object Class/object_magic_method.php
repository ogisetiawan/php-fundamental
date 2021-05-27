<?php
/**
 * __contructor; method khusus yg akan dijalankan otomatis ketika sebuah method dibuat instansinya(tambah nilai ke property)
 * __desctructor; method khusus yg akan dijalankan otomatis ketika sebuah method tidak dibuat instansinya(hapus memory leak)
 * __invoke; method khusus untuk mencoba mengubungi objek sebagai function
 * __toString; mehthod khusus ketika object diperlakukan seperti string.
 * __set_state; method yang diakses ketika mengekspor sebuah class dengan function var_expoert()
 * __set(); digunakan untuk menulis sebuah property visibility(private)/tidak ada dalam object_class
 * _get(); digunakan untuk membaca sebuah property dari property visibility
 * _isset(); digunakan untuk mengecek bahwa variabel sudah di__set?
 * _unset(); mengahapus varibel yang telah di__set, yg menyebabkan leak memory 
 * --Method_Overloading:
 * _call(); digunakan untuk membaca sebuah medhtod dari property visibility
 * _callStatic; digunakan untuk membaca sebuah medhtod dari method static
 */
echo "==== Magic__Method =====\r";
class diameter
{
	//property
	var $diameter;
	public $var;
	public $var2;
	function __construct($x)//ambil value dari new instance object
	{
		return $this->diameter=$x; //berikan nilai ke property $diameter
	}
	function __toString()
    {
        return $this->diameter; //berikan nilai ke property
    }
	function hitung()
	{
		$r = $this->diameter/2; //ambil property $diameter yang melalui proses contruct
		return 3.14*$r*$r;
	}
	function __invoke($x)
    {
        echo "\ntype data ",var_dump($x);
    }
	function __destruct()
	{
	 	echo "Success desctructor!!";
	}
}
$diameter = new diameter(2); //beri nilai kesebuah __construct()
echo $diameter->hitung();
echo $diameter(5); //akses ke __invoke
unset($diameter); //hapus object (leak memeory)
$diameter2 = new diameter('pemanggilan object'); //beri nilai kesebuah __construct()
echo "\n",$diameter2,"\n"; // jika menampilkan object seperti string call method __toString
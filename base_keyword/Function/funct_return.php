<?php
/**
 * Return Param; Paramter/argument yang dapat dicetak/diubah valuenya.
 * Return Variabel; mencetak/mengubah nilai balik dari sebuah variabel(return $agama), jika ada return bisa diuabah val aslinya. 
 * Variabel property; variabel yang ada pada sebuah class exp:var,public,static;
 * Variabel $this; Psedeu-variabel sebuah fungsi untuk menunjukan sebuah objek saat kita akan mengakses didalam class
 */

echo "==== Return parameters ===\r";
function square($x,$y) {
    $z = $x*$y;
    return $z; // return variabel
}
echo 'square(4) = ' .square(4,2). "\n"; // buat paramanter baru dalam method square()
echo 'square(2) = ' .square(2,2). "\n";

echo "==== Return variabel with Static ===\r";
class orang
{ 
    //variabel property dari class orang
    var $nama = "Ogi setiawan";
    public $panggilan = "Batok";
    public $agama = "Islam Muhamadiyah";

    function umur() {
        $name = 'tahun';
        $this->$name(); // panggil method tahun(), karena $name='tahun' sama dengan nama sebuah method
    }
    function tahun() {
        echo "21 Tahun";
    }
    function agama() {
        return $this->agama; //panggil property agama
    }
}
function status(){
    echo 'Single';
}

$class = new orang();
echo $class->nama="Ogi Sebastian"."($class->panggilan)"."\n"; //panggil variabel prperty dari sebuah  class tanpa($)
print_r($class->umur()."\n");  // jadi yang dipanggil mehtod Variable
echo $class->agama("Islam Asli")."\n"; // ganti sebuah parameter pada method.
echo status(); //panggil method diluar class

$v = "1,2,3";
$x = explode(",", $v);
echo $x;
<?php
/**
 * Static Property/method; mengakses method/property gunakan operator :: // class::nama
 * Public Property/method; mengakses method/property gunakan operator -> // $this->nama
 * Variabel $this; Psedeu-variabel, sebuah fungsi untuk menunjukan sebuah objek saat kita akan mengakses didalam class
 * atau $this bisa dibilang sebuah nama variabel property
 */

echo "====Static Property and Method ===\r";
class orang
{ 
    var $nama = "Ogi setiawan";   //variabel property
    static $panggilan = "Batok";  // static propery
    public $agama = "Islam Muhamadiyah"; // public property
    public static $umur =  "21 tahun"; //static property
    protected static $n = 'tahun';
    public function umur() {
        $name = self::$n;
        return static::$name(); // panggil method tahun(), karena $name='tahun' sama dengan nama sebuah method
    }
    public static function tahun() {
        return static::$umur; //call static property
    }
    function agama($x) {
        return $x &= $this->agama; //panggil property agama
    }
}
function status(){
    echo 'Single';
}
$class = new orang();
echo $class->nama="Ogi Sebastian(".orang::$panggilan.")\n"; //call var+static property
print_r($class->umur()."\n");  // jadi yang dipanggil mehtod Variable
echo $class->agama("Islam Majelis Ulama")."\n"; // ganti sebuah parameter pada method.
echo status(),"\n"; //panggil method diluar class orang
echo orang::tahun(); //call mehod static

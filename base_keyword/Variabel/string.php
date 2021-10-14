<?php
/**
 * substr; menghapus sebuah string tertentu 
 * String Heredocs; berfungsi ketika mempunyai sebuah kombinasi string dan $var yang panjang
 * PHP_EOL; berfungsi ketika ada sebuah string setelah call element array
 */

echo "====Keyword String=== \r";

$str="Jum'at ganteng";
$html_incode = "<p>226K Telah dibaca</p>";
$html_decode = $html_incode;

echo addslashes($str)."\n"; // addslashes; menambahakan blackslah(/) pada sebuah string (''),("")
echo strlen($str),(" huruf \n"); // 14, Menghitung semua huruf string
echo str_word_count($str),(" kata \n"); // 2, Menghitung sebuah kata 
echo strpos($str, "ganteng"),(" huruf \n"); // 3, menjumlahkan string yang sama
echo str_replace("Jum'at", "Kamis", $str),("\n"); //Mengganti sebuah huruf/kata
echo substr(",0,1,2,3,4,5,", 1,-1),("\n"); // menghilangkan sebuah kata tertentu 1=huruf mulai cetak, -1=angka akhir dihapus
echo rtrim(",0,1,2,3,4,5,",','),("\n"); // menghilangkan sebuah kata terkahir 
echo htmlentities($html_incode)."\n"; // Konvert tag html ke dalam incode, untuk keamanan web injeksi XSS
echo html_entity_decode($html_decode);  //mengubah entitas HTML ke bentuk semula.

$arr = ["satu","dua","tiga","empat"];
$imp = implode(",",$arr);
echo "\n".$imp."\n"; //nilai array diggabung dengan string commma(,)
$pecah = explode(",", $imp);// memecahakan sebuah string satu persatu, array
foreach ($arr as $value) {
    echo "$value ";
}

echo "\n====String Heredocs=== \r";
class fool
{
    //create property class
    var $foo;
    var $bar;
    function fool(){ //create method 
        $this->food = 'Nasi';
        $this->bar = array('Bar1', 'Bar2', 'Bar3');
    }
}

$foor = new fool();
$name = 'Ogi';
echo $foor->food='Nasi jadi Bubur'."\n"; //get atau ubah propery method.
//string heredocs
echo <<<EOT
My name is $name. I am printing some $foor->food.
Now, I am printing some {$foor->bar[0]}.
This should print a capital 'A': \n
EOT;

echo "====String Passing=== \r";
$juices = array("apple", "orange", "anggur" => "purple","nanas");
$u = "jambu";

echo "He drank some $juices[0] juice.".PHP_EOL;
echo "He drank some $u juice. \n"; //tanpa PHP_EOL juice tidak terbaca
echo "He drank some $juices[2] .\n";
echo "He drank some $juices[1] juice.".PHP_EOL;
echo "He drank some $juices[anggur] juice.".PHP_EOL;

echo "====String Object=== \r";
class people {
    public $john = "John Smith";
    public $jane = "Jane Smith";
    public $robert = "Robert Paulsen";
    public $smith = "Smith";
}

$people = new people();
echo "$people->jane drank some $juices[0] juice.".PHP_EOL;
echo "$people->john then said hello to $people->jane.".PHP_EOL;
echo "$people->john's wife greeted $people->robert.".PHP_EOL;

$text ="03/10/2017 - 04/19/2017";
$pe = explode(" - ", $text);
echo $pe[0];
echo "\n";
echo $pe[1];

$d = "09-03-2017";
$y = date("Y-m-d",strtotime($d));
echo "\n $d---->ini =$y";

$array = array('1', '2', '3');
$imp = implode(",", $array);

echo "\n $imp"; // lastname,email,phone

$str="http://129.126.121.131:81/Api/KORSales/SPCActual?RCC=#rcc#&YEAR=#year#";
echo str_replace("#rcc", "MCI", $str),("\n"); //Mengganti sebuah huruf/kata

//! if string has contains specific word
$a = '129.126.121.131:81/Api/KORSales/VOCTargetId?RCC=#rcc#&YEAR=#year#';
if (strpos($a, '#rcc#') !== false && strpos($a, '#year#') !== false) {
    echo 'true';
}else{
    echo 'false';
}

//! str replace
$subject = '1.000';
echo str_replace(array(',', '.'), array('', ''), $subject);

//! exploding specifi chart
$data = "@Hendri Gunawan blabala";    
$data = explode('@', $data);
echo $data[1];
$data = explode(' ', $data[1]);
echo "\n";
echo $data[1].''.$data[2];
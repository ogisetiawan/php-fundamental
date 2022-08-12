<?php
/**
 * Operator; Operasi aritmatika dalam PHP
 * Assigment by value;  penggabungan,perubahan dari suatu value 
 * Assigment by refrence;  peribahan suatu value dari suatu value lainya(&)
 * Ternary; statement yang singkat untuk menulis perbandingan sama seperti if,else,.
 * (expr1)?(expr2):(expr3)
 * =+; penambahan suatu nilai ke variabel yang kanana
 */
echo "===== Assigment & Refrence Operator ==== \r";
//deklar
$a = 10;
$b = 20;
$c = "ogi";
$d = "ucup";

echo 'Assigment by value(=+); ',$b =+ $a,"\n"; // 10
echo 'Assigment by value(=+); ',$b += $a,"\n"; // 20
echo 'Assigment by refrence(.=); ',$c.= " setiawan","\n"; //ogi setiawan
echo 'Assigment by refrence(&); ',$c = &$d,"\n"; //ogi setiawan
echo 'Assigment by refrence(==); ',$c == $d,"\n"; //cek identeik

echo "\n===== Comparison Operator; Perbandingan==== \r";
var_dump('a'=='b'); //false
var_dump('a'<>'b'); //true

echo "===== Increment/decrement Operator ==== \r";
echo "== Alpabet ==\n";
$inc = 'W'; //var dimulai dai w
for ($n=0; $n<5; $n++) { //pengulangan 
    echo ++$inc,"\n"; //++$inc ditambah, tanpa mulai dari 'W'
}

echo "==== Digit ====\n";;
$dec = 'A99Y';
for ($n=0; $n<5; $n++) {
    echo $dec++ . PHP_EOL; //$dec++ ditambah dimulai, dari 'W'
}

echo "===== Operator Logic ==== \r";
// Lihat kurung kurawal: ($x = (false || true))
$a = true || false; 
$b = true && false;

// Lihat kurung kurawal: (($x = false) or true)
$c = true or false;
$d = true and false;
var_dump($a,$b); //true
var_dump($c,$d);

echo "===== Operator Ternary ==== \r";
$n = 70;
print_r($n <> 71/*expr1*/ ? 'Lulus' /*expr2*/ : 'Gagal' /*expr3*/);
print("\n");

echo "===== Mencari nilai Besar dan Kecil dari Loop ==== \r";
$a = 4;
$b = array();
for ($i=1; $i <=2 ; $i++) { 
    $b[] = $a+$i;
}
print_r($b);
echo min($b);
echo " dan ";
echo max($b);
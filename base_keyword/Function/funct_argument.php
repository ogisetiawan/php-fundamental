<?php
/**
 * Function Argument; argument dari sebuah method yang dapat diubah atau refrence(&) dari var lain.
 */

echo "==== Conditional functions ===\r";
bar();
if (false): // condition
 	foo();
 else:
 	echo "foo(); not calling.\n";
endif;
function bar() {
	define('def','bar(); ');
	echo def ."Isi dari method\n";
}
function foo() {
    echo "Isi dari method foo().\n";
}

echo "==== Use 2 parameters in function ===\r";
function makecoffee($bil,$type = "kacang") {// 2 argument
    return "Hari ini saya beli $type $bil.\n"; //returnm nilai balik ketika method punya argument
}
echo makecoffee(null); //tampil argumen aja. param null
echo makecoffee("gratis"); //ganti param $bil
echo makecoffee("minum",null);

echo "==== Passing function parameters & argument ===\r";
function pass(&$string) { // argument $string punya refrence(&)
    $string .= 'and something extra.'; //assigment variabel
}
$str = 'This is a string, ';
pass($str); //ambil variabel yang di refrence(&)
echo $str;


<?php
/**
 * Variabel global, bisa dipakai pada semua mehtod
 * Variabel lokal, dipakai hanya pada method itu saja
 * Variabel static, tidak akan menghilangkan nilai akhirnya ketika ada sebuah proses. 
 */

echo "====Variabel Scope function===\r";
//var global
$x = 5;
$y = 10;

function globalkey() {
	//atau  $GLOBALS['y'] = $GLOBALS['x'] + $GLOBALS['y'];
	global $x, $y; //call var globalscopeI($x,$y) yang akan menjadi var localscope
	$x = $x + $y;
	echo "-GlobalKey : $x\n";
}
function globalscope() {
	global $y; //ambil var global
	$x = 20; //var localscope
	$x = $x + $y;
	echo "-Variable x didalam function is : $x\n";
}
function statis() {
	static $count = 0; //var static
	$count++;
	echo substr("$count,",0,-1);
	if ($count < 10) {
		statis();
	}
}
echo "-Val mehtod statis = ",statis(),("\n"); //call method 
globalkey(); //15 karena sudah melalui proses sebuah funcion
globalscope(); //6 langsung panggil method globalscope melewati proses sebelumnya 
echo "-Variable x diluar function is: $x \n"; //15  karena x sudah melewati proses method globalkey
echo "-Val akhir method statis = " , statis();
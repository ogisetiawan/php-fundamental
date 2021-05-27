<?php
/**
 * Type Jugling; menggabungkan sebuah type data yang berbeda dengan OTOMATIS
 * Type Casting;  mengubah sebuah type data yang berbeda dengan MANUAL
 */

echo "====Boolean===\r";
var_dump((bool) "");        // bool(false)
var_dump((bool) 1);         // bool(true)
var_dump((bool) -2);        // bool(true)
var_dump((bool) "foo");     // bool(true)
var_dump((bool) 2.3e5);     // bool(true)
var_dump((bool) array(12)); // bool(true)
var_dump((bool) array());   // bool(false)
var_dump((bool) "false");   // bool(true)

echo "====Interger Literral===\r";
var_dump(25/7);         // float(3.5714285714286)
var_dump((int) (25/7)); // int(3)
var_dump(round(25/7));  // float(4)

$a = 250.000;
echo "$a typedata ".gettype($a);

echo "\n====Type Jugling===\r";
$a = 1;
$b = 250.000;
var_dump($a+$b); // jadi float

echo "====Type Casting===\r";
echo (integer)$b,"\n"; //conversi float to interger
echo (double)$b;
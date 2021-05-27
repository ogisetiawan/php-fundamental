<?php
/**
 * autoload_class; sebuah cara untuk memanggil sebah class pada file yang berbeda tanpa harus include nama file tersebut.
 * class_name; sebuah nama class dari class yang akan dipanggil pada file yang berbeda. jadi sebuah nama class harus
 * sama dengan nama sebuah file .php untuk mendeklarasikan pemanggilan include file
 */
spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});

$luas = new luas(5,5); //new obhect to contruct arguments
$diameter = new diameter(2);
echo  "luas.php ",$luas->luas(),"\n";
echo "diameter.php ",$diameter->diameter();
<?php
/**
 * Regex; mencari pola dalam sebuah string
 * 
 */
echo "===== Expression ==== \r";
$a = 1;
$b = $a = 2; // a dan b punya nilai 6 jadi $a bukan 1 lagi.
$c = 3;
$c = $a++; //2, $c adalah nilai $a, maka post_in menambahkan 1
$d = ++$a; //4, $d = pre_inc maka menambahkan 1,$c adalah nilai $a, 
$e = 5;
$f = $e += 10; //$e dan $f adalah 15
echo $b."\n".$c."\n".$d."\n".$e."\n".$f;

echo "\n===== Regular Expression(Regex) ==== \r";
$html='C:/xampp2/htdocs/coba/html5/index.php';
preg_match('/[^.]+\.[^.]+$/',$html,$match);
$src=array_pop($match);
echo $src;
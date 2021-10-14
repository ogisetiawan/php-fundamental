<?php

/**
 * Array; kumpulan element/data yang disimpan dalam satu variabel
 * array[]; 5.4.x //tanpa keyword array
 * array(); 5.3
 * === KEY ===
 * count; menghitung total data pada sebuah array
 * in_array; mengecek sebuah value tertentu.
 * unset; menghapus data array.
 * sort; mengurutkan sebuah value array.
 * ksort; mengurutkan sebuah key array.
 * array_marge; penggabungan sebuah array. [array_marge($array);]
 * array_exsist; mencari value tertentu pada sebuah key array.
 * array_search; mencari key value tertentu pada sebuah value array.
 * is_array; mengecek sebuah variabel merupakan sebuah array atau bukan?
 */

echo "=====Array Count==== \r";
$kendaraan = ['Mobil', 'Motor', 'Sepeda', 'Truk'];
echo "Jumlah array ada " . count($kendaraan) . " data\n"; //4

echo "=====In_Array; cek value array==== \r";
if (in_array('Motor', $kendaraan)) {
    echo "Motor ada\n";
}
echo "=====Perpaduan Typedata in Array==== \r";
$array = array(
    "bar", //tanpa key
    "name" => "ogi", //key bar
    100   => "setatus",
    -100  => "min seratus",
    5 => 1,
);
unset($array[100]); //mengahpus key 100 dari array
$array["x"] = 42; // menambahkan sebuah key baru x
print_r($array);

echo "==== Array sort ====\n";
$sort = [0 => 'nol', 1 => 'satu', 2 => 'dua', 3 => 'tiga'];
sort($sort); //
print_r($sort);

echo "====Array Merge; ====\n";
$gabung = $array + $kendaraan;
print_r($gabung);

echo "==== Array Exists ====\n";
if (key_exists('name', $array)) {
    echo "Key [name] = ", $array['name'], ("\n");
}

echo "==== Array Search =====\n";
$search = array_search('ogi', $array);
echo "'ogi' ada di Key[", $search, "]\n";

echo "====Unset====\n";
foreach ($array as $i => $value) { //Value Array dihapus semua dengan loop
    unset($array[$i]);
}
print_r($array);

echo "====Array Multidimention====\n";
$array = [[1, 2], [3, 4],];
foreach ($array as list($a, $b)) { //pengurutan sebuah array
    echo "A: $a; B: $b\n";
}

echo "=====Array Colecting==== \r";
$n = "nilai";
for ($i = 0; $i <= 5; $i++) {
    $a = array("$n-$i,");
    foreach ($a as $v) {
        print_r($v);
    }
}
echo "\n";
$a = [['Email' => 'ogisetiawan21@.com'], ['Email' => 'setiawn']];
echo implode(",", array_column($a, "Email"));

$data = "@Hendri Gunawan blabala";    
$data = explode('@', $data);
echo $data[1];
$data = explode(' ', $data[1]);
echo "\n";
echo $data[1].''.$data[2];
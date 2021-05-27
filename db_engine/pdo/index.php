<?php
spl_autoload_register(function ($class_name) {
    include $class_name . '.php'; //sebuah nama_class yang akan dipanggil harus sama dengan nama_file
});

$pdo = new procedural;
echo $pdo->fetch_both();
echo $pdo->fetch_num();
echo $pdo->fetch_object();
echo $pdo->fetch_assoc();
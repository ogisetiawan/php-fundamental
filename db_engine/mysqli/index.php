<?php
spl_autoload_register(function ($class_name) {
    include $class_name . '.php'; //sebuah nama_class yang akan dipanggil harus sama dengan nama_file
});

$conn = new procedural;
echo $conn->fetch_row()."\n";
echo $conn->fetch_assoc()."\n";
echo $conn->fetch_object()."\n";
echo $conn->fetch_array();

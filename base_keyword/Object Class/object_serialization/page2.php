<?php
include("classa.inc");

  $s = file_get_contents('store');
  $a = unserialize($s);
  echo "Data yang tersimpan pada proses Serialization = '";
  echo $a->tampil(),"'<br>";
  echo 'Ubah Stored <a href="page1.php">Page1</a>';

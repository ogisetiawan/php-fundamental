<?php
if(isset($_POST['submit']))//jika sudah 'submit'
{
  	if(!empty($_POST['text'])) //jika tidak kosong pada form 'text'
	{
	  include("classa.inc");

	  $a = new A($_POST['text']); //instance object 
	  $s = serialize($a);  //membuat sebuah variabel $s adalah sebuah serialize
	  if(file_put_contents('store', $s)) //membuat sebuah file store untuk menyimpan suatu
	  {
	  	echo "Proses Serialization berhasil <a href='page2.php'>Lihat Stored</a>";
	  }
	}
	else{ //jika kosong
	echo "Text Harus Diisi!! <a href='page1.php'>Page1</a>";
	}
}
else //jika belum 'submit' tampil sebuah form
echo '<form action="" method="POST">
		<input type="text" name="text"><br>
		<input type="submit" value="Serialization" name="submit">
	</form>
Lihat Data Pada stored <a href="page2.php">Lihat Stored</a>';

<?php
/**
 * Mysqli; sebuah koneksi database yang menggunakan fungsi Procedural dan Object-Oriented
 *** attribute mode_tampil data:
 * mysqli_fetch_assoc; sebuah method untuk menghasilkan data pada database dengan sebuah argument berupa nama dari table
 * mysqli_fetch_row; sebuah method untuk menghasilkan data pada database dengan sebuah argument berupa key[0] dari table
 * mysqli_fetch_array; sebuah method untuk menghasilkan data pada database dengan sebuah argument berupa array dari table
 * mysqli_fetch_object; sebuah method untuk menghasilkan data pada database dengan sebuah argument berupa object-> dari table
 */
class procedural{
	protected $host = 'localhost';
	protected $user = 'root';
	protected $pass = '';
	protected $db = '_pdomysqli';
	
	protected $connect;

	private static $query = 'SELECT * from data';
	private static $result;

	//create koneksi
	function __construct(){
		$this->connect = mysqli_connect($this->host,$this->user,$this->pass,$this->db);
		//cek koneksi
		if ($this->connect->connect_error) {
			 echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
		}
	}
		function fetch_row(){
		if ($this->result = $this->connect->query(self::$query))
		{				
			echo "==== mysqli_fetch_row ====\r";
			while ($row = mysqli_fetch_row($this->result)){
				echo "$row[0] $row[1] $row[2] $row[3]";
				echo "\n";
			}
		}
	}
	function fetch_assoc(){
		//cek hasil query
		if ($this->result = $this->connect->query(self::$query))
		{
			echo "==== mysqli_fetch_assoc ====\r";
			while ($assoc = mysqli_fetch_assoc($this->result))
			{
				echo "$assoc[id] $assoc[user] $assoc[pass] $assoc[note]";
				echo "\n";
			}
		}
	}
	function fetch_array(){
		if ($this->result = $this->connect->query(self::$query))
		{
			echo "==== mysqli_fetch_array ====\r";
			while ($array = mysqli_fetch_array($this->result,MYSQLI_ASSOC))//MYSQL_NUM, MYSQL_BOTH
			{ 
				echo $array['id']," ",$array['user']," ",$array['pass']," ",$array['note'];
				echo "\n";
			}
		}
	}

	function fetch_object(){
		if (self::$result = $this->connect->query(self::$query))
		{
			echo "==== mysqli_fetch_object ====\r";
			while ($object = mysqli_fetch_object(self::$result))
			{
				echo "$object->id $object->user $object->pass $object->note";
				echo "\n";
			}
		}
	}
	function __destruct(){
		$this->connect->close(); //tutup conection dan hapus object /leak_memory
	}
}

<?php
/**
 * PDO;(Php Data Object) cara mengkoneksi sebuah Php dengan Database Server lainya (SQLserver,ProsgreSQL,dll)
 * Konsep; PDO -> Database Driver -> Database Server
 * Metode Abstraction Layer; apapun jenis databasenya kode yang ditulis tetap sama.
 * print_r(PDO::getAvailableDrivers()); //driver yang aktif mysqli -> sqlite
 * TRY_CATH; pesan kesalahan block kode pada sebuah error_handling_kode(Exceptions)
 * 
 *** attibute error_mode pesan kesalahan;
 * { $conn->setAttribute(PDO::ATTR_ERRMODE),/PDO::ERRMODE_SILENT /PDO::ERRMODE_WARNING /PDO::ERRMODE_EXCEPTION; }
 * PDO::ERRMODE_SILENT; default,jika tidak mengubah set error,cek error /PDO::errorCode() /PDO::errorInfo()
 * PDO::ERRMODE_WARNING; cocok untuk proses debbuging(menampilkan error proses ekseskusi kode lanjut);
 * PDO::ERRMODE_EXCEPTION; menampilkan proses TRY_CATCH
 * 
 *** attribute mode_tampil data:
 * PDO::FETCH_BOTH; default-> menampilkan data berupa index_arrray / dengan nama table.
 * PDO::FETCH_ASSOC; menampilkan data dengan nama table
 * PDO::FETCH_NUM; menampilkan data berupa indx array
 * PDO::FETCH_CLASS; mengembalikan nilai ke dalama class yang telah disiaplan.
 * PDO::FETCH_OBJ ; menampilkan data dengan cara object sytle.
 * PDO::FETCH_LAZY; kombinasi FETCH_BOTH dan FETCH_OBJ
 */
class procedural{
	protected $host = 'localhost';
	protected $user = 'root';
	protected $pass = '';
	protected $db = '_pdomysqli';
	protected $connect;

	private static $query = 'SELECT * FROM data';
	private static $result;

	function __construct(){
		try {	
		$this->connect =  new PDO('mysql:host='.$this->host.';dbname='.$this->db.'',$this->user,$this->pass); //create koneksi
		} catch (PDOException $e) {
			print "ERROR_LOG!: ".$e->getMessage()."\n";
			die();
		}
	}

	function fetch_both(){
		echo "==== PDO_fetch_both ====\r";
		$this->result = $this->connect->query(self::$query); //create_query
		while ($row = $this->result->fetch(PDO::FETCH_BOTH)) { //FETCH_BOTH
			echo "$row[id] $row[user] $row[2] $row[3] \n";
		}
	}

	function fetch_assoc(){
		echo "==== PDO_fetch_assoc ====\r";
		$this->result = $this->connect->query(self::$query); //create_query
		while ($row = $this->result->fetch(PDO::FETCH_ASSOC)) { //FETCH_BOTH
			echo "$row[id] $row[user] $row[pass] $row[note] \n";
		}
	}

	function fetch_num(){
		echo "==== PDO_fetch_num ====\r";
		$this->result = $this->connect->query(self::$query); //create_query
		while ($num = $this->result->fetch(PDO::FETCH_NUM)) { //FETCH_BOTH
			echo "$num[0] $num[1] $num[2] $num[3] \n";
		}
	}

	function fetch_object(){
		echo "==== PDO_fetch_object ====\r";
		$this->result = $this->connect->query(self::$query); //create_query
		while ($object = $this->result->fetch(PDO::FETCH_OBJ)) { //FETCH_BOTH
			echo "$object->id $object->user $object->pass $object->note \n";
		}
	}
	function __destruct(){
		$this->connect=null; //close_connection PDO dan hapus property /leak memory
	}
}

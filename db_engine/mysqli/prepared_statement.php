<?php
/**
 * Query Statement; sebuah koneksi mysqli untuk mencegah sql_injection.
 * prepered_statement; proses perisapan sebuah data query yang belum ditentukan datanya(?)
 * bind_param; proses mengirimkan sebuah data yang ditandai dalam proses prepered_statement(?)
 * execute; proses mengeksekusi sebuah query yang akan dijalankan.
 * 
	s = menampilkan data bertipe string.
	i = menampilkan data tipe interger
	d = tipe data dobule
	b = binary(blob)
**/
echo "==== Object Oriented Programmed Mysqli Prepared Statement ===== \r";
class prepared_statement{

	protected $host = 'localhost';
	protected $user = 'root';
	protected $pass = '';
	protected $db = '_pdomysqli';

	protected $connect;
	protected $result;
	protected static $stmt;

	public function __construct(){
		//create coneksi mysqli
		$this->connect = mysqli_connect($this->host,$this->user,$this->pass,$this->db); 
		//cek koneksi error
		if(!$this->connect){
			die('Database not Connect:'.mysqli_connect_errno().'-'.mysqli_connect_error());
		}
	}

	public function execute_insert($id,$user,$pass,$note){
		$encrypt = md5($pass); //encrypt pass
		$this->stmt = mysqli_prepare($this->connect,"INSERT INTO data VALUES(?,?,?,?)");//prepared connection
		mysqli_stmt_bind_param($this->stmt,"isss",$id,$user,$encrypt,$note); //hubungkan data dengan prepered statement::bind 
		mysqli_stmt_execute($this->stmt); // execute query insert
		echo '* Success Inserted Query!! --> ';
		$this->execute_select($id); //call method execute_select() untuk menampilkan 1 data yang baru diinsert

	}
	public function execute_update($data,$val,$id){
		$this->stmt = mysqli_prepare($this->connect,"UPDATE data SET $data=? WHERE id=?"); //create prepared statement
		mysqli_stmt_bind_param($this->stmt,'si',$val,$id); //hubungkan data prepared statement(?) dengan method_parameter
		mysqli_stmt_execute($this->stmt); // execute query update
		echo '* Success Updated Query row!! --> ';
		$this->execute_select($id); //call method execute_select() untuk menampilkan data yang baru diupdate
	}

	public function execute_delete($id){
		//menampilkan data yang akan dihapus dulu, walaupun data trsbt belum dihapus oleh program
		echo '* Success Deleted Query row!! --> ';
		$this->execute_select($id); //call method execute_select() untuk menampilkan data yang akan
		$this->stmt = mysqli_prepare($this->connect,"DELETE FROM data WHERE id=?"); //create prepared statement
		mysqli_stmt_bind_param($this->stmt,'i',$id); //hubungkan data prepared statement(?) dengan method_parameter
		mysqli_stmt_execute($this->stmt); // execute query update$this->execute_select($id);
	}

	public function execute_select($id){
		$this->stmt = mysqli_prepare($this->connect,"SELECT * FROM data WHERE id=?"); //create prepared statement
		mysqli_stmt_bind_param($this->stmt,"s",$id); //hubungkan data dengan prepered statement::bind
		mysqli_stmt_execute($this->stmt); // execute query update$this->execute_select($id);
		$this->result();
	}

	public function result(){ //method menampilkan sebuah data yang baru diexecute dan cek query
		//cek hasil query dari sebuah self::stmt
		if(!$this->stmt){
			die('Query error!! :'.mysqli_errno($this->connect).'-'.mysqli_error($this->connect));
		}
		//tampilkan hasil query($this->stmt) yang telah diexecute dengan pungulangan while
		$this->result = mysqli_stmt_get_result($this->stmt); //get query dari pemanggilan method terakhir(excute_select)
		$row = mysqli_fetch_row($this->result);
		echo "$row[0] $row[1] $row[2] $row[3] \n";

	}

	public function result_all(){ // method menampilkan semua data
		$query = mysqli_query($this->connect,"SELECT * FROM data"); 
		echo "-- SELECT All Data --\n";
		while ($row = mysqli_fetch_row($query)){
				echo "$row[0] $row[1] $row[2] $row[3]";
				echo "\n";
		}
	}

	function __destruct(){
		mysqli_stmt_close($this->stmt);
		mysqli_close($this->connect);
	} //delete object
}

$stmt = new prepared_statement;

$id = '3';
$user = 'setiawan';
$pass = 'islamic';
$note = 'beruntung';

$data = 'user'; // nama data pada table yang akan diganti 
$val = 'jacknes'; //value data yang akan diganti

$stmt->execute_insert($id,$user,$pass,$note); //masukan sebuah data
$stmt->execute_update($data,$val,$id); //masukan sebuah data
$stmt->execute_delete($id);
<?php
/**
 *** konsep PDO_PREPARED_STATEMENT(?)
 * - Prepared; memperisapkan sebuah conection dan query untuk disimpan kedalam sebuah variabel/property
 * - Bind; ; variabel_penampung  yg menghubungkan sebuah data ke dalam sebuah database
 * - Excute; eksekusi program prepared_stamtement;
 *** named_paramaeterd_prepared_statements
 * menandakan sebuah nama_field pada prepared_statement, [where id=:nilai_field] bukan (?)
 * ... stmt->bindValue(:nama_field, $nama_variabel/$nama_parameter)
 */
echo "==== Object Oriented Programmed PDO Prepared Statement ===== \r";
class prepared_statement{
	protected $host = 'localhost';
	protected $user = 'root';
	protected $pass = '';
	protected $db = '_pdomysqli';
	protected $connect;

	private static $query_insert = 'INSERT INTO data VALUES(?,?,?,?)';
	private static $query_delete = 'DELETE FROM data WHERE id=?';
	private static $query_select = 'SELECT * FROM data WHERE id=?';
	private static $query_select_all = 'SELECT * FROM data';
	private static $stmt;
	private static $result;

	function __construct(){
		try {	
		$this->connect =  new PDO('mysql:host='.$this->host.';dbname='.$this->db.'',$this->user,$this->pass); //create koneksi
		//$this->connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //mengecek semua query yang valid
		} catch (PDOException $e) {
			print "ERROR_LOG!: ".$e->getMessage()."\n";
			die();
		}
	}

	function execute_insert($id,$user,$pass,$note){
		$encrypt = md5($pass); //encrypt pass
		$this->stmt = $this->connect->prepare(self::$query_insert); //create prepared_stamenet query dari sebuah prop
		//hubungkan data pada waktu prepared stamement query
		$this->stmt->bindParam(1, $id); //get args
		$this->stmt->bindParam(2, $user);
		$this->stmt->bindParam(3, $encrypt);
		$this->stmt->bindParam(4, $note);
		$this->stmt->execute(); //ekseskusi query untuk passing fetch data
		//operator ternary
		$i = $this->stmt->rowCount() > 0 /*condition */ ? 'True' /*if true*/ : 'False' /*else*/;
		echo "* Success Inserted Query(".$i.")!! --> ";
		$this->execute_select($id); // passing args_id ke dalam method u/ menampilkan data yg baru ditambah
	}

	function execute_delete($id){
		//menampilkan data yang akan dihapus dulu, walaupun data trsbt belum dihapus oleh program
		$i = $this->stmt->rowCount() > 0 /*condition */ ? 'True' /*if true*/ : 'False' /*else*/;
		echo "* Success Deleted Query(".$i.")!! --> ";

		$this->execute_select($id); // passing args_id ke dalam method u/ menampilkan data yg baru dihapuss
		$this->stmt = $this->connect->prepare(self::$query_delete); //create prepared_stamenet query dari sebuah prop
		//hubungkan data pada waktu prepared stamement query
		$this->stmt->bindParam(1, $id); //get args
		$this->stmt->execute(); //ekseskusi query untuk passing fetch data
	}

	function execute_updated($id,$field,$value){
		$this->stmt = $this->connect->prepare("UPDATE data SET $field=? WHERE id=?"); 
		//hubungkan data pada waktu prepared stamement query
		$this->stmt->bindParam(1, $value); //get args
		$this->stmt->bindParam(2, $id); //get args
		$this->stmt->execute(); //ekseskusi query untuk passing fetch data
		$i = $this->stmt->rowCount() > 0 /*condition */ ? 'True' /*if true*/ : 'False' /*else*/;
		echo "* Success Updated Query(".$i.")!! --> ";
		$this->execute_select($id); // passing args_id ke dalam method u/ menampilkan data yg baru dihapuss
	}
 	function execute_select($id){
 		$this->stmt = $this->connect->prepare(self::$query_select); //create_query select in id
 		$this->stmt->bindparam(1, $id); //hubungkan data dari sebuah args
 		//pada excute_select tidak menggunakan execute(), karena method ini hanya sebuah perantara u/ tampil data sesuai id yg di berikan.
 		$this->result(self::$query_select,$id);//passing args_query dan arg_id ke dalam sebuah method
 		//hal ini untuk menampilkan data sewaktu execute query yg berbeda
 	}

 	function result($query,$id){
 		$this->result = $this->connect->prepare($query); //create prepared_stamenet query dari sebuah args
 		$this->result->bindParam(1, $id); //get args
 		$this->result->execute();
		$row = $this->result->fetch(PDO::FETCH_BOTH);
		echo "'$row[0]' '$row[1]' '$row[2]' '$row[3]' \n";
 	}

	function result_all(){
		echo "|-------------------------------------------------| \n";
		echo "|Showing result database '$this->db in table 'data| \n";
		echo "|-------------------------------------------------| \n";
		echo "ID | USER | PASSWORD | NOTE | \n";
		$this->result = $this->connect->query(self::$query_select_all);
		while ($row = $this->result->fetch(PDO::FETCH_BOTH)) { //FETCH_BOTH
			echo "$row[id] | '$row[user]' '$row[2]' '$row[3]' \n";
		}
	}

}

$id = '4';
$user = 'setiawan';
$pass = 'blabla';
$note = 'beruntung';

$field = 'user'; //nama kolom pada table
$value = 'jacknes'; //nilai kolom pada table

$o = new prepared_statement;
$o->execute_insert($id,$user,$pass,$note);
$o->execute_updated($id,$field,$user);
$o->execute_delete(5);

$o->result_all();

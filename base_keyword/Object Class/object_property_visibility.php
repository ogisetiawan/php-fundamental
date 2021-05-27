<?php
/**
 * public; dapat diakses diluar jangkauan class
 * protected; dapat diakses ketika sebuah class di instansiasi sebagai objek
 * private; dapat diakses pada class itu sendiri, dan menggunakan fungsi static self::
 */
echo "==== Property and Method visibility ===\r";
class protec_class{
	//propery visibility
	public $public="public_property";
	protected $protected="protected_property";
	private static $private="private_property";

    protected static function protec(){ //protected; hanya bisa diakses pada class komputer dan latop saja
       return "call_mehod::protected";
    }
    public function call_property(){
    	echo $this->public,"\n"; 
        echo $this->protected,"\n";
        echo self::$private; //private_propety harus static
    }
}
class privat_class extends protec_class //class protect_class diturnkan kepada class private_class
{ 
    private static function privat() //private;tidak bissa diakses di luar class
    { 
       return "call_method::private";
    }
    public static function pub()
    {
    	echo "***Method Visibility***\n";
        echo parent::protec(),"\n"; //parent::scope, akses method diluar privat_class
        echo self::privat(),"\n"; //self::scope, akses method dalam privat_class
        echo "***Property Visibility***\n";
        $obj = new protec_class; //buat objek, untuk mendapatkan property_visiblity
        echo $obj->call_property();
    }
}
privat_class::pub(); //panggil static method
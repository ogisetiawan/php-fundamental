<?php
/**
 * Object Overloading; method missing/ bisa dibilang magic_method
 * Method overloading; harus didefinisikan sebagai public_method
 * --Property_Overloading:
 * _set(); digunakan untuk menulis sebuah property visibility(private)/tidak ada dalam object_class
 * _get(); digunakan untuk membaca sebuah property dari property visibility
 * _isset(); digunakan untuk mengecek bahwa variabel sudah di__set?
 * _unset(); mengahapus varibel yang telah di__set, yg menyebabkan leak memory 
 * --Method_Overloading:
 * _call(); digunakan untuk membaca sebuah medhtod dari property visibility
 * _callStatic; digunakan untuk membaca sebuah medhtod dari method static
 */
echo "==== Object Overloading ===\r";
class magic
{
	public static $public = 'public_property';
	private $private = 'private_property';
	private $array = array();
	public function __set($variabel,$value) //__set harus mempunyai dua arg
	{
		$value = $this->private; //value public_prop dirubah menjadi value private_prop
		$this->array[$variabel] = $value; //simpan ke array [key] = value(argument_fungsi)
		echo "1.__set \n";
		echo $value."\n";
	}
	public function __get($variabel)
	{
		echo '2.__get',"\n";
        if (array_key_exists($variabel, $this->array)) { //cari sebuah value pada sebuah key array
            return $this->array[$variabel];
        }
	}
	public function __isset($variabel)
    {
        echo "Apa $variabel telah diset?\n";
        return isset($this->array[$variabel]); //cek variabel now, pada array
    }
	public function __unset($variabel)
    {
        unset($this->array[$variabel]); //unset variabel yang menyebabkan leak

    }
    public function __call($variabel,$arg)
    {
    	echo "call '$variabel' " . implode('', $arg)."\n"; //memasukan data(implode)ke dalam array baru
    }
    public static function __callStatic($variabel,$arg)
    {
    	echo "call static '$variabel'" . implode('',$arg)."\n";
    }
}
$objek = new magic();
$static = magic::$public;
$objek->magic_property="$static\n"; //set property tanpa echo agar value tidak tampil
echo $objek->magic_property."\n"; //get property
echo '3. __isset & __unset'."\n";
var_dump(isset($objek->magic_property)); //cek isset?
unset($objek->magic_property); //unset
var_dump(isset($objek->magic_property));
$objek->magic_method('in objek context');
magic::magic_method('in static context');

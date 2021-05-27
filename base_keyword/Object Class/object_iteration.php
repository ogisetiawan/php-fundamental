<?php 
/**
 * object iteration; proses pemanggilan object dalam pengulangan(foreeach) 
 */
echo "==== Simple iteration ===\r";
class MyClass
{
    public $var1 = 'public_property1';
    public $var2 = 'public_property2';
    public $var3 = 'public_property3';
    protected $protected = 'protected_property';
    private   $private   = 'private_property';
    function iterateVisible() {
       echo "method iterateVisible\n";
       foreach ($this as $key => $value) { //$this(property) simpan dalam bentuk pengulagan menjadi array
           print "$key => $value\n";
       }
    }
}

$class = new MyClass();
foreach($class as $key => $value) { //call public property, visibility not call
    print "$key => $value\n";
}
$class->iterateVisible();//call lewat function, visibility call

echo "==== Interface iteration ===\r";
class MyIterator implements Iterator //interface Iterator
{
    private $var = array();

    public function __construct($array)
    {
        if (is_array($array)) { //cek arg array?
            $this->var = $array;
        }else{
          return false;
        }
    }
    public function rewind()
    {
        echo "1.rewinding\n";
        reset($this->var); //reset elemen array kembali ke nilai 0
    }
    public function current()
    {
        $var = current($this->var); //mengembalikan nilai elemen saat ini
        echo "current: $var\n";
        return $var;
    }
    public function key() 
    {
        $var = key($this->var); //mengembalikan elemen saat ini
        echo "key: $var\n";
        return $var;
    }
    public function next() 
    {
        $var = next($this->var);//mengembalikan nilai selanjutnya dan memperbarui pointer
        echo "next: $var\n";
        return $var;
    }
    public function valid()
    {
        $key = key($this->var); 
        $var = ($key !== NULL && $key !== FALSE); //membuat validasi bahwa ada sebuah key dari pointer saat ini
        echo "valid: $var\n";
        return $var;
    }
}

$values = array(1,2,3);
$it = new MyIterator($values); //add value in __contruct
foreach ($it as $element => $values) { 
    print "$element: $values\n";
}b 
<?php
/**
 * object_trait; sebuah key yang dapat memanggil kembali sebuah class lain(re_use),case multiple inhertance_class
 * trait besifat precedence(hak tinggi), jika sebuah nama method_trait sama dengan method_class, maka hasil yang akan
 * ditampilkan adalah method_class(oveririding method).
 * overriding; sebuah case jika mempunyai nama method yang sama, maka menggunakan (insteadof)
 */
echo "==== Object trait ===\r";
trait Hello {
	//method trait bukan singnatur
    public function sayHello() {
        echo 'Hello ';
    }
}
trait World {
    public function sayWorld() {
        echo 'World';
    }
}

class MyHelloWorld {
    use Hello, World; //define trait yang akan dipanggil
    public function say() {
        echo '!';
    }
}

$o = new MyHelloWorld();
//tetap trait harus diinstance pada object
$o->sayHello();
$o->sayWorld();
$o->say(); 

echo "\n==== Overriding trait ===\r";
class A{
	function method(){
		return 'method_class_a';
	}
}
class B extends A
{
	function method(){
		return 'method_class_b';
	}
}
class C extends A
{
	function method(){
		return 'method_class_c';
	}
}
trait b_class{
	public static $x= 'propery static';
	function method_trait_0(){
		return 'method_trait_0_class_b';
	}
	function method_trait_1(){
		return 'method_trait_1_class_b';
	}
}
trait c_class{
	function method_trait_0(){
		return 'method_trait_0_class_c';
	}
	function method_trait_1(){
		return 'method_trait_1_class_c';
	}
}
trait visiblity{
	function method_visibility(){
		return 'changing visiblity protected';
	}
}
class D{
	use b_class,c_class	{ 
	//confilict method pada trait
        c_class::method_trait_0 insteadof b_class; //define, method_trait_0 bukan dari trait b_class
        b_class::method_trait_1 insteadof c_class; //define, method_trait_1 bukan dari trait c_class
		b_class::method_trait_0 as protected; //method jadi protected
		c_class::method_trait_1 as private;
    }
}
$d = new D;
echo $d->method_trait_0(),"\n"; //ptint method dari trait c_class
echo $d->method_trait_1(),"\n";//print method dari trait b_class
echo D::$x; //call property
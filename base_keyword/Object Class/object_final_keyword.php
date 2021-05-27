<?php
/**
 * final_class; sebuah class yang tidak bisa diwarisi(inheritance) pada class lain(end class)
 * final_method; sebuah method yang tida bisa menimpa sebuah final method yang ada pada class induk(parent)
 */
echo "==== Final Keyword ===== \n";
class A {
   public function a() {
       echo "A::a() called\n";
   }
   
   final public function b() {
       echo "A::moreTesting() called\n";
   }
}
final class C extends A {
   public function b1() { //jika nama method b sama dengan class A error, karena method sudah final
       echo "C::moretest2() called\n";
   }
}
class D extends C{ //error class C tidak bisa diturnkan lagi karena sudah final
	public function b1() {
     echo "D::moretest2() called\n";
   } 
}
$o = new ChildChildClass();
$o->moretest2();

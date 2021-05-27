<?php
/**
 * object_inhertance;object perwarisan atau turunan, class child dapat mengakses method/peroperty/var dari parent class.
 * private; pemanggilan suatu method/peroperty pada class itu saja.
 * public; penmanggilan suatau method/property pada semua class ataupu diluar class
 * protected; pemanggilan suatu method/property pada class itu saja dan pada suatu class yang diturunkan.
 */
echo "==== Object Inheritance ===\r";
class komputer{//kerangka dasar(parent_class)
    protected static function beli_komputer(){ //protected; hanya bisa diakses pada class komputer dan latop saja
        return "Beli komputer baru";
    }
    public function overiding(){
        echo 'over_parent_class';
    }
}
class laptop extends komputer //class komputer diturnkan kepada class laptop(child_class)
{ 
    private static function beli_laptop() //private;tidak bissa diakses di luar class laptop
    { 
       return "Beli laptop baru";
    }
    public static function beli_semua()
    {
        echo parent::beli_komputer(); //parent::scope, akses method pada parent_class(komputer)
        echo "\n";
        echo self::beli_laptop(); //self::scope, akses method pada child_class(laptop)
        echo "\n";
        echo static::overiding();
    }
     public function overiding(){
        echo 'over_child_class';
    }
}
laptop::beli_semua();
echo "\n";

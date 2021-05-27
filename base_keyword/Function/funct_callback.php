<?php
/**
 * Fungsi Callback; proses perlapasan suatu proses operasi dan memasukan proses untuk meneruskan proses akhir
 * call_user_func;
 */

echo "====Fungsi Callbacks / Callables===\r";
function my_callback_function() {
    echo 'Hello world! -function';
}
class MyClass {
    static function myCallbackMethod() {
        echo 'Hello World! -method';
    }
}
call_user_func('my_callback_function');echo "\n"; // Simple callback
call_user_func(array('MyClass', 'myCallbackMethod'));echo "\n";// Static class method call

$obj = new MyClass();
call_user_func(array($obj, 'myCallbackMethod')); //type object instance
echo "\n";
call_user_func('MyClass::myCallbackMethod');// Static class method call (As of PHP 5.2.3)

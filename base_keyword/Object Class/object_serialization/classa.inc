<?php
/**
 * Serialization; sebuah proses untuk mengubah object menjadi sebuah byte stream yang mereperesentasikan dalam sebuah string 
 * proses lalu disimpan alam bentuk file atau memori kedalam sebuah komputer
 */
 class A {
      public $text;
    
      public function tampil() {
          echo $this->text;
      }
      public function __construct($x){
      	$this->text=$x;
      }
 }

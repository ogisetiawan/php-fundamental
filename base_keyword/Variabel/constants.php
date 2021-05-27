<?php
/**
 * Const; const name = "value";
 * Define; define(name, value, case-insensitive)
 */

echo "====Basic Define===\r";
define('defines','define- Keyword define');
define("FOO","FOO- Keyword define", true); 

echo defines,("\n");
echo foo ."\n";

echo "====Basic Constant===\r";
// Works as of PHP 5.3.0
const constant = "constant- Keyword const\n";
echo (constant),defines,("\n");

// Works as of PHP 5.6.0
const ANOTHER_CONST = constant.'Goodbye World';
echo ANOTHER_CONST;

const ANIMALS = array('dog', 'cat', 'bird');
echo ANIMALS[1]; // outputs "cat"

<?php
$password = "projectmanager";
echo password_hash($password, PASSWORD_DEFAULT)."\n";
echo password_hash($password, PASSWORD_BCRYPT)."\n";


$options = [
    'cost' => 10,
];
echo password_hash($password, PASSWORD_BCRYPT, $options)."\n";

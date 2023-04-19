// Funzione che genera una password

<?php

function getPassword($length) {

    $letters = 'abcdefghijklmnopqrstuvwyz';
    $numbers = '0123456789';
    $simbols = '+-*/@[]{}#_=$?!%';
    
    $string = $letters. strtoupper($letters). $numbers. $simbols;
    
    $total_string = mb_strlen($string);
    
    $password = '';

    while(mb_strlen($password) < $length) {

        $random = rand(0, $total_string - 1) ;

        $random_string = $string[$random];

        $password.= $random_string;
    }

    return $password;
}
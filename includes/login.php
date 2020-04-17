<?php
session_start();

if(!isset($_SESSION['user'])){
    $_SESSION['user'] = "";
    $_SESSION['nome'] = "";
    $_SESSION['tipo'] = "";
}



function gerarHash($senha){
    $txt = cripto($senha);
    $hash = password_hash($senha, PASSWORD_DEFAULT);
    return $hash;
}

function testarhash($senha, $hash){
    $ok = password_verify($senha, $hash);
    return $ok;
}

function cripto($senha){
    $c = '';
    for($pos = 0; $pos < strlen($senha); $pos++){
        $letra = ord($senha[$pos]) + 1;
        $c .= chr($letra);
    }
    return $c;
}



?>
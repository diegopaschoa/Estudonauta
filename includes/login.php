<?php
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

$original = 'estudonauta';
echo "$original --- ";
echo cripto($original) . " --- ";
echo gerarHash($original);

?>
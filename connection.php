<?php

function conectaBD() {
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $bd = 'tienda';

    $enlace = new mysqli($host, $user, $pass, $bd);
    
    if (!$enlace) {
        echo "Error en el enlace. " . mysqli_connect_error();
    }
    
    return $enlace;
}
    
$enlace = conectaBD();
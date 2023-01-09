<?php
// Fichero para connectar con las base de datos
function conectaBD() {
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $bd = 'tienda_info';

    $conn = new mysqli($host, $user, $pass, $bd);
    
    if (!$conn) {
        echo "Error en el conn. " . mysqli_connect_error();
    }
    
    return $conn;
}
    
$conn = conectaBD();
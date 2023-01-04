<?php
//Generamos la conexion
    include('../connection.php');
// Borramos el producto con ese codigo y lo mandamos a la pagina de modificar o eliminar productos
    $insert = "DELETE FROM producto WHERE codigo='" . $_GET['p'] ."'";
    $esCorrecte = mysqli_query($conn,$insert);
    if ($esCorrecte) echo "Producte eliminat correctament";
    if (!$esCorrecte) echo "Producte eliminat erroneament";
    mysqli_close($conn);
    header("Location: ./delete&modify.php");
?>

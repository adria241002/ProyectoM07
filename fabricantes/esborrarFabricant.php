<?php
    // Generamos la conexion
    include('../connection.php');
    // Borramos los productos con ese codigo y los fabricantes
    $insert2 = "DELETE FROM producto WHERE codigo_fabricante='" . $_GET['p'] ."'";
    $insert = "DELETE FROM fabricante WHERE codigo='" . $_GET['p'] ."'";
    $esCorrecte2 = mysqli_query($conn,$insert2);
    $esCorrecte = mysqli_query($conn,$insert);
    if ($esCorrecte) echo "Fabricant eliminat correctament";
    if (!$esCorrecte) echo "Fabricant eliminat erroneament";
    mysqli_close($conn);
    // Lo mandamos otra vez a la pagina de modificacion
    header("Location: ./delete&modify.php");
?>

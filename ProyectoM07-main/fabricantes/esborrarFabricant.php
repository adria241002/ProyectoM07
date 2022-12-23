<?php
    include('../connection.php');
    $insert2 = "DELETE FROM producto WHERE codigo_fabricante='" . $_GET['p'] ."'";
    $insert = "DELETE FROM fabricante WHERE codigo='" . $_GET['p'] ."'";
    $esCorrecte2 = mysqli_query($conn,$insert2);
    $esCorrecte = mysqli_query($conn,$insert);
    if ($esCorrecte) echo "Fabricant eliminat correctament";
    if (!$esCorrecte) echo "Fabricant eliminat erroneament";
    mysqli_close($conn);
    header("Location: ./delete&modify.php");
?>
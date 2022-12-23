<?php
    include('../connection.php');
    $insert = "DELETE FROM producto WHERE codigo='" . $_GET['p'] ."'";
    $esCorrecte = mysqli_query($conn,$insert);
    if ($esCorrecte) echo "Producte eliminat correctament";
    if (!$esCorrecte) echo "Producte eliminat erroneament";
    mysqli_close($conn);
    header("Location: ./delete&modify.php");
?>
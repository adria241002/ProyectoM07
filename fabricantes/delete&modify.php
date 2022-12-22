<!doctype html>
<html lang="es">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
<head>
    <title>Fabricants</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    
</head>
<link rel="stylesheet" href="../css/style.css">
<body class="text-white">
<header style="background-color: #0E4159; height: 40px ; margin-bottom:30px">
        <!-- place navbar here -->
        <div class="row d-flex" style="padding-left:10px ; padding-top : 5px;">
                <div class="col-3">
                        <h3>Tienda informática</h3>
                </div>
                <div class="col-3">
                    <a class="enlaces" href="../fabricants.php"><h3>Inicio</h3> </a>
                </div>
                <div class="col-3">
                    <a class="enlaces" href="../productes.php"><h3>Productos</h3> </a>
                </div>
                <div class="col-3">
                    <a class="enlaces"  href="../fabricants.php"><h3>Fabricantes</h3> </a>
                </div>
            </div>
    </header>

<table>
<?php
include('../connection.php');

$result2 = mysqli_query($conn ,"SELECT * FROM fabricante");


?>
<table>
    <tr>
        <th>Codigo</th>
        <th>Nombre</th>
        <th>URL LOGO</th>
        <th>Modificar</th>
        <th>Eliminar</th>
    </tr>
<?php
$i=0;

while ($fila =  mysqli_fetch_assoc($result2)) {
    if ($i % 2 == 0) {
        echo "<tr>";
    }else{
        echo "<tr>";
    }
        echo "<td>" . $fila["codigo"] . "</td>";
        echo "<td>" . $fila["nombre"] . "</td>";
        echo "<td><img height='50' src='". $fila["logoFabricante"] . "'></td>";
        echo "<td> <a href='./modificarFabricant.php?p=".$fila["codigo"]."'><span class='material-symbols-outlined'>
        edit_note
        </span></a> </td>";
        echo "<td> <a href='./esborrarFabricant.php?p=".$fila["codigo"]."'><span class='material-symbols-outlined'>
        delete_forever
        </span></a> </td>";
        echo "</tr>";
        $i++;
}

?>
</table>
</body>
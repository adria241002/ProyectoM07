<?php
//Generamos la conexion
include('../connection.php');

$result2 = mysqli_query($conn, "SELECT imagen,prod.codigo as cod, prod.nombre as nom, prod.precio, fab.nombre as nomfab FROM producto prod JOIN fabricante fab ON prod.codigo_fabricante = fab.codigo");


?>
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
    <!-- Creacion del header -->
    <header style="background-color: #0E4159; height: 40px ; margin-bottom:30px">
        <!-- place navbar here -->
        <div class="row d-flex" style="padding-left:10px ; padding-top : 5px;">
            <div class="col-3">
                <h3>Tienda informática</h3>
            </div>
            <div class="col-3">
                <a class="enlaces" href="../fabricants.php">
                    <h3>Inicio</h3>
                </a>
            </div>
            <div class="col-3">
                <a class="enlaces" href="../productes.php">
                    <h3>Productos</h3>
                </a>
            </div>
            <div class="col-3">
                <a class="enlaces" href="../fabricants.php">
                    <h3>Fabricantes</h3>
                </a>
            </div>
        </div>
    </header>
    <table>
        <!-- creamos la tabla con lo necesario para insertar o modificar el fabricante -->
        <tr>
            <th>Nom</th>
            <th>Producto</th>
            <th>Preu</th>
            <th>Farbicant</th>
            <th>Modificar</th>
            <th>Eliminar</th>     
        </tr>
        <?php
        $i = 0;

        while ($fila =  mysqli_fetch_assoc($result2)) {
            if ($i % 2 == 0) {
                echo "<tr>";
            } else {
                echo "<tr>";
            }
            echo "<td>" . $fila["nom"] . "</td>";
            echo "<td><img height='50' src='" . $fila["imagen"] . "'></td>";
            echo "<td>" . $fila["precio"] . "€</td>";
            echo "<td>" . $fila["nomfab"] . "</td>";
            echo "<td> <a href='./modificarProducte.php?p=" . $fila["cod"] . "'><span class='material-symbols-outlined'>
        edit_note
        </span></a> </td>";
            echo "<td> <a href='./esborrarProducte.php?p=" . $fila["cod"] . "'><span class='material-symbols-outlined'>
        delete_forever
        </span></a> </td>";
            echo "</tr>";
            $i++;
        }

        ?>
    </table>

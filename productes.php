<?php

function querys($codigo, $query)
{
    if ($codigo != "") {
        $query .= " AND codigo_fabricante LIKE '%$codigo%'";
    }

    return $query;
}

isset($_REQUEST['codfab']) ? $codigo = $_REQUEST['codfab'] : $codigo = ""; // Inicializo las variables 

include './connection.php'; // Conecto con la BD

if (isset($_GET['q2'])) { // Si le pasamos la query2 (Son la cantidad de registros)
    $query2 = urldecode($_GET['q2']);
} else { // Sino los calculamos
    $query2 = "SELECT count(nombre) AS totalRegistros FROM producto WHERE 1";
    $query2 = querys($codigo, $query2); // Utilizo la funcion para concatenar
}

$resultado = mysqli_query($conn, $query2);

$cantRegi = 6; // Aqui preparamos el paginador y escogemos cuantos registros habra por pagina
$filaResu = mysqli_fetch_array($resultado);
$totalRegistros = $filaResu["totalRegistros"];
$totalPaginas = ceil($totalRegistros / $cantRegi);

if (!isset($_GET['p'])) { // Guardamos la pagina que obtenemos por get
    $paginaActual = 1;
} else {
    $paginaActual = $_GET['p'];
}

if (isset($_GET['q'])) { // Si le pasamos la query (Son los registros)
    $query = urldecode($_GET['q']);
} else { // La query para los registros
    $query = "SELECT nombre, imagen, precio, codigo
        FROM producto WHERE 1";
    $query = querys($codigo, $query); // Utilizo la funcion para concatenar
}

$limit = " limit " . ($paginaActual - 1) * $cantRegi . ", " . $cantRegi; // El limitador de registros

$resultado2 = mysqli_query($conn, $query . $limit);

if ($totalRegistros == 0) { // Esto es para pintar la cabecera de la tabla 
    echo " - No se han encontrado registros"; // Si no se encuentran registros se mostrara este mensaje

} else {
    // aqui pintar en las cards
    $i = 0; // Mostramos los registros
    while ($fila = mysqli_fetch_row($resultado2)) {
        echo '
            <div class="card text-center" style="width: 18rem;">
            <a href="./detallProducte.php?codprod=' . $fila[3] . '">
            <div class="card-body">
                <h5 class="card-title">' . $fila[0] . '</h5>
                <img src="' . $fila[1] . '" class="card-img-top">
                <p class="card-text">' . $fila[2] . '€</p></a>
            </div>
            </div>';
    }
}

?>

<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
    <header>
        <!-- place navbar here -->
    </header>
    <main>
        <div class="row">
        </div>
    </main>
    <footer>
        <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>
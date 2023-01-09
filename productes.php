<?php

function querys($codigo, $query)
{
    if ($codigo != "") {
        $query .= " AND codigo_fabricante LIKE '%$codigo%'";
    }

    return $query;
}

if (!isset($_GET['pagina'])) {
    $_GET['pagina'] = 1;
}

isset($_REQUEST['codfab']) ? $codigo = $_REQUEST['codfab'] : $codigo = ""; // Inicializo las variables 

include './connection.php'; // Conecto con la BD

$query = "SELECT nombre, imagen, precio, codigo FROM producto WHERE 1";
$query = querys($codigo, $query);

$resultado = mysqli_query($conn, $query);

$cantRegistros = 0; // Total registros del resultado
foreach ($resultado as $row) {
    $cantRegistros++;
}

$cantRegiPorPag = 6;

$paginas = ceil($cantRegistros / $cantRegiPorPag);

?>

<!doctype html>
<html lang="en">

<head>
    <title>fabricants</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css">
</head>

<body class="text-white body2">
    <link rel="stylesheet" href="./css/style.css">

    <header style="background-color: #0E4159; height: 50px ; margin-bottom:30px">
        <!-- place navbar here -->
        <div class="row d-flex" style="padding-left:10px ; padding-top : 5px;">
                <div class="col-3">
                        <h3>Tienda informática</h3>
                </div>
                <div class="col-3">
                    <a class="enlaces" href="./fabricants.php"><h3>Inicio</h3> </a>
                </div>
                <div class="col-3">
                    <a class="enlaces" href="./productes.php"><h3>Productos</h3> </a>
                </div>
                <div class="col-3">
                    <a class="enlaces"  href="./fabricants.php"><h3>Fabricantes</h3> </a>
                </div>
            </div>
    </header>   
    <main>
        <div class="row">
            <div class="col-3">
                <ul class="nav flex-column pt-2 mb-3 me-3" style="background-color: #0E4159; border-top-right-radius: 4px; border-bottom-right-radius: 4px; height: 200px;">
                    <h6 class="text-center">Fabricantes</h6>
                    <li class="nav-item">
                        <a class="nav-link active link-light mt-4" aria-current="page" href="./fabricantes/NewFab.php">Nuevo fabricante</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link-light" href="./fabricantes/delete&modify.php">Editar/eliminar fabricante</a>
                    </li>
                </ul>

                <ul class="nav flex-column pt-2 mb-3 me-3" style="background-color: #0E4159; border-top-right-radius: 4px; border-bottom-right-radius: 4px; height: 200px;">
                    <h6 class="text-center">Productos</h6>
                    <li class="nav-item">
                        <a class="nav-link active link-light  mt-4" aria-current="page" href="./productos/addProduct.php">Nuevo producto</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link-light" href="./productos/delete&modify.php">Editar/eliminar producto</a>
                    </li>
                </ul>
            </div>

            <div class="col-9 p-3" style="background-color: #0E4159; border-top-left-radius: 4px; border-bottom-left-radius: 4px;">

                <?php
                $iniciar = ($_GET['pagina'] - 1) * $cantRegiPorPag;

                $queryProd = "SELECT nombre, imagen, precio, codigo FROM producto WHERE 1";
                $queryProd = querys($codigo, $queryProd);
                $limit = " limit " . $iniciar . ", " . $cantRegiPorPag; // El limitador de registros
                $resultadoProd = mysqli_query($conn, $queryProd . $limit);

                ?>

                <div class="row g-2" role="alert">
                <?php foreach ($resultadoProd as $producto) : ?>
                        <?php
                        echo '
                            <div class="card text-center col-6 col-sm-4 col-md-3 m-2" style="width: 18rem;">
                            <a class="cardProd" href="./detallProducte.php?codprod=' . $producto['codigo'] . '">
                            <div class="card-body">
                                <h5 class="card-text cardProd">' . $producto['nombre'] . '</h5>
                                <img src="' . $producto['imagen'] . '" class="card-img">
                                <p class="card-text cardProd position-absolute fixed-bottom">' . $producto['precio'] . '€</p></a>
                            </div>
                            </div>';
                        ?>
                <?php endforeach ?>
                </div>  

                <!-- Printamos el paginador -->
                <nav aria-label="Page navigation example">
                    <ul class="pagination pt-2">
                        <li class="page-item <?php echo $_GET['pagina'] <= 1 ? 'disabled' : '' ?>"><a class="page-link" href="productes.php?pagina=<?php echo $_GET['pagina'] - 1 ?>&codfab=<?php echo $codigo ?>"><</a>
                        </li>

                        <!-- Printamos la cantidad de paginas con sus identificadores numericos  -->
                        <?php for ($i = 0; $i < $paginas; $i++) : ?>
                            <li class="page-item <?php echo $_GET['pagina'] == $i + 1 ? 'active' : '' ?>">
                                <a class="page-link" href="productes.php?pagina=<?php echo $i + 1 ?>&codfab=<?php echo $codigo ?>"><?php echo $i + 1 ?></a>
                            </li>
                        <?php endfor ?>

                        <li class="page-item <?php echo $_GET['pagina'] >= $paginas ? 'disabled' : '' ?>"><a class="page-link" href="productes.php?pagina=<?php echo $_GET['pagina'] + 1 ?>&codfab=<?php echo $codigo ?>">></a></li>
                    </ul>
                </nav>
            </div>

        </div>
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
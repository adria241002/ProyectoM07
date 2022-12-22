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

        <div class="container my-5">

            <?php
            $iniciar = ($_GET['pagina']-1) * $cantRegiPorPag;

            $queryProd = "SELECT nombre, imagen, precio, codigo FROM producto WHERE 1";
            $queryProd = querys($codigo, $queryProd);
            $limit = " limit " . $iniciar . ", " . $cantRegiPorPag; // El limitador de registros
            $resultadoProd = mysqli_query($conn, $queryProd . $limit);

            ?>

            <?php foreach($resultadoProd as $producto): ?>
            <div class="alert alert-primary" role="alert">
            <?php
                echo '
                <div class="card text-center" style="width: 18rem;">
                <a href="./detallProducte.php?codprod=' . $producto['codigo'] . '">
                <div class="card-body">
                    <h5 class="card-title">' . $producto['nombre'] . '</h5>
                    <img src="' . $producto['imagen'] . '" class="card-img-top">
                    <p class="card-text">' . $producto['precio'] . '€</p></a>
                </div>
                </div>';
            ?>
            </div>
            <?php endforeach ?>

            <!-- Printamos el paginador -->
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <li class="page-item <?php echo $_GET['pagina']<=1 ? 'disabled' : '' ?>"><a class="page-link" href="productes.php?pagina=<?php echo $_GET['pagina']-1 ?>"><</a></li>

                    <!-- Printamos la cantidad de paginas con sus identificadores numericos  -->
                    <?php for ($i=0; $i < $paginas; $i++): ?>
                    <li class="page-item <?php echo $_GET['pagina']==$i+1 ? 'active' : '' ?>">
                        <a class="page-link" href="productes.php?pagina=<?php echo $i+1 ?>"><?php echo $i+1 ?></a>
                    </li>
                    <?php endfor ?>

                    <li class="page-item <?php echo $_GET['pagina']>=$paginas ? 'disabled' : '' ?>"><a class="page-link" href="productes.php?pagina=<?php echo $_GET['pagina']+1 ?>">></a></li>
                </ul>
            </nav>
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
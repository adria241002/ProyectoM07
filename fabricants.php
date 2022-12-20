<!doctype html>
<html lang="es">

<head>
    <title>fabricants</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body class="text-white">
    <header style="background-color: #0E4159;">
        <!-- place navbar here -->
        <h3 class="text-center">Tienda informática</h3>
    </header>
    <main>
        <div class="container-fluid">
            <div class="row d-flex justify-content-center text-center mb-3" style="background-color: #0E4159;">
                <div class="col-2">
                    <a href="./fabricants.php">Inicio</a>
                </div>
                <div class="col-2">
                    <a href="./productes.php">Productos</a>
                </div>
                <div class="col-2">
                    <a href="./fabricants.php">Fabricantes</a>
                </div>
            </div>

            <div class="row">
                <div class="col-4">
                    <ul class="nav flex-column pt-2 mb-3 me-3" style="background-color: #0E4159;">
                        <h6 class="text-center">Fabricantes</h6>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="./fabricantes/NewFab.php">Nuevo fabricante</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./fabricantes/delete&modify.php">Editar/eliminar fabricante</a>
                        </li>
                    </ul>

                    <ul class="nav flex-column pt-2 mb-3 me-3" style="background-color: #0E4159;">
                        <h6 class="text-center">Productos</h6>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="./productos/addProduct.php">Nuevo producto</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./productos/delete&modify.php">Editar/eliminar fabricante</a>
                        </li>
                    </ul>
                </div>

                <div class="row col-8" style="background-color: #0E4159;">
                    <?php
                    // Fichero que incluye la conxion con la base de datos
                    include './connection.php';
                    $query = "SELECT * FROM fabricante";
                    // consulta para coger los datos de la base de datos
                    $result = mysqli_query($conn, $query);
                    // Mostrar la informacion de la base de datos en formato tabla

                    while ($fila = mysqli_fetch_row($result)) {
                        echo '
                    <div class="col-4 pt-2">
                    <div class="card m-3">
                    <a href="./productes.php?codfab=' . $fila[0] . '"><img height="200" src="' . $fila[2] . '" class="card-img-top"></a>
                    </div>
                    </div>';
                    }
                    ?>
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
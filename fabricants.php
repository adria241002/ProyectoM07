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

                <div class="row col-9" style="background-color: #0E4159; border-top-left-radius: 4px; border-bottom-left-radius: 4px;">
                    <?php
                    // Fichero que incluye la conxion con la base de datos
                    include './connection.php';
                    $query = "SELECT * FROM fabricante";
                    // consulta para coger los datos de la base de datos
                    $result = mysqli_query($conn, $query);
                    // Mostrar la informacion de la base de datos en formato tabla
                    // Crear las cartas con los fabricantes de la base de datos
                    while ($fila = mysqli_fetch_row($result)) {
                        echo '
                    <div class="col-4 pt-2">
                    <div class="card m-3" style="border-radius: 4px;">
                    <a style="border-radius: 4px;" href="./productes.php?codfab=' . $fila[0] . '"><img style="border-radius: 4px;" height="200" src="' . $fila[2] . '" class="card-img-top"></a>
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
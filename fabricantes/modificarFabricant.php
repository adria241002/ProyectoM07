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
    <link rel="stylesheet" href="../css/style.css">
    <!-- Creacion del header -->
    <header style="background-color: #0E4159; height: 50px ; margin-bottom:30px">
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
    
    <main>
        <div class="container-fluid" style="background-color: #18719B;width : 500px">
            <div class="row" style="display:flex; align-items:center;">
                <div class="row">
                    <?php
                    //Generamos la conexion
                    include('../connection.php');
                    // Si enviamos el formulario nos actualiza el fabricante 
                    if (isset($_POST['enviar'])) {
                        $insert2 = "UPDATE fabricante SET nombre='" . $_POST['nombre'] . "', logoFabricante='" .$_POST['logoFabricante'] . "' WHERE codigo='" . $_GET['p']."'";                        $esCorrecte2 = mysqli_query($conn, $insert2);
                        if ($esCorrecte2) echo "Fabricant modificat correctament";
                        if (!$esCorrecte2) echo "Fabricant modificat erroneament";
                        mysqli_close($conn);
                        header("Location: ./delete&modify.php");
                        die();
                    } else {
                        $result = mysqli_query($conn, "SELECT * FROM fabricante where  codigo='" . $_GET['p'] . "'");
                        foreach ($result as $key) {
                    ?>
                    <!-- creamos el formulario con lo necesario para modificar el fabricante -->
                    <form action="" method="post">
                        <div class="row">
                            <div class="col-12 mb-3">
                                <label for="nombre" class="form-label">Nombre</label>
                                <input id="nombre" type="text" class="form-control" name="nombre" value="<?php echo $key['nombre'] ?>">
                            </div>

                            <div class="col-12 mb-3">
                                <label for="logoFabricante" class="form-label">Logo</label>
                                <input id="logoFabricante" type="text" class="form-control" name="logoFabricante" value="<?php echo $key['logoFabricante'] ?>">
                            </div>

                            <div class="col-12 mb-3 d-flex justify-content-center">
                                <input class="button" type="submit" name="enviar" value="Modificar fabricant" />
                            </div>
                        </div>
                    </form>
                    <?php
                        }
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

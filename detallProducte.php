<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="./css/style.css">
<?php
include('./connection.php');
$result = mysqli_query($conn, "SELECT * FROM PRODUCTO WHERE CODIGO=" . $_GET['codprod']);

?>


<div class="container">
    <header style="background-color: #0E4159; height: 40px ; margin-bottom:30px">
        <!-- place navbar here -->
        <div class="row d-flex" style="padding-left:10px ; padding-top : 5px;">
            <div class="col-3 text-white">
                <h3>Tienda informática</h3>
            </div>
            <div class="col-3">
                <a class="enlaces" href="./fabricants.php">
                    <h3>Inicio</h3>
                </a>
            </div>
            <div class="col-3">
                <a class="enlaces" href="./productes.php">
                    <h3>Productos</h3>
                </a>
            </div>
            <div class="col-3">
                <a class="enlaces" href="./fabricants.php">
                    <h3>Fabricantes</h3>
                </a>
            </div>
        </div>
    </header>
    <div class="card">
        <div class="card-body">
            <?php
            while ($fila = mysqli_fetch_row($result)) {
            ?>
                <h3 class="card-title"><?php echo $fila[1]; ?></h3>
                <div class="row">
                    <div class="col-lg-5 col-md-5 col-sm-6">
                        <div class="white-box text-center"><img class="img-responsive" style="max-width: 80%;" src="<?php echo $fila[4]; ?>"></div>
                    </div>
                    <div class="col-lg-7 col-md-7 col-sm-6">
                        <h4 class="box-title mt-5">Product description</h4>
                        <p>Lorem Ipsum available,but the majority have suffered alteration in some form,by injected humour,or randomised words which don't look even slightly believable.but the majority have suffered alteration in some form,by injected humour</p>
                        <h2 class="mt-5">
                            $153<small class="text-success">(36%off)</small>
                        </h2>
                        <button class="btn btn-dark btn-rounded mr-1" data-toggle="tooltip" title="" data-original-title="Add to cart">
                            <i class="fa fa-shopping-cart"></i>
                        </button>
                        <button class="btn btn-primary btn-rounded">Buy Now</button>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <h3 class="box-title mt-5">General Info</h3>
                        <div class="table-responsive">
                            <table class="table table-striped table-product">
                                <tbody>
                                    <tr>
                                        <td width="390">Nombre</td>
                                        <td><?php echo $fila[1]; ?></td>
                                    </tr>
                                    <tr>
                                        <td>Precio</td>
                                        <td><?php echo $fila[2]; ?> €</td>
                                    </tr>
                                    <tr>
                                        <td>Codigo Fabricante</td>
                                        <td><?php echo $fila[3]; ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>
<?php
            }
?>
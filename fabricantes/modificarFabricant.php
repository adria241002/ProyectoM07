<?php
include('../connection.php');
if (isset($_POST['enviar'])) {
    $insert2 = "UPDATE fabricante SET nombre='" . $_POST['nombre'] . 
    "', logoFabricante='" .$_POST['logoFabricante'] . "' WHERE codigo='" . $_GET['p']."'";
    $esCorrecte2 = mysqli_query($conn,$insert2);
    if ($esCorrecte2) echo "Fabricant modificat correctament";
    if (!$esCorrecte2) echo "Fabricant modificat erroneament";
    mysqli_close($conn);
    header("Location: ./delete&modify.php");
    die();
}
else{
$result = mysqli_query($conn ,"SELECT * FROM fabricante where  codigo='" . $_GET['p'] ."'");
foreach ($result as $key) {
    ?>
    <form name="Dades" method="post" action="">
        Nom : <input type="text" name="nombre" value="<?php echo $key['nombre']?>"/><br><br>
        Logo Fabricante : <input type="text" name="logoFabricante" value="<?php echo $key['logoFabricante']?>"/><br><br>
        <input  type="submit" name="enviar" value="Modificar Producte"/>
    </form>
    <?php
}
}

<?php
include('../connection.php');
if (isset($_POST['enviar'])) {
    $insert2 = "UPDATE producto SET nombre='" . $_POST['nombre'] . 
    "', precio='" .$_POST['precio'] . 
    "', codigo_fabricante='" . $_POST['fabricante'] ."' WHERE codigo='" . $_GET['p']."'";
    $esCorrecte2 = mysqli_query($conn,$insert2);
    if ($esCorrecte2) echo "Producte inserit correctament";
    if (!$esCorrecte2) echo "Producte INSERIT erroneament";
    mysqli_close($conn);
    header("Location: ./delete&modify.php");
    die();
}
else{
$result = mysqli_query($conn ,"SELECT * FROM PRODUCTO where  codigo='" . $_GET['p'] ."'");
foreach ($result as $key) {
    ?>
    <form name="Dades" method="post" action="">
        Nom : <input type="text" name="nombre" value="<?php echo $key['nombre']?>"/><br><br>
        Precio : <input type="text" name="precio" value="<?php echo $key['precio']?>"/><br><br>
        Fabricante : <input type="text" name="fabricante" value="<?php echo $key['codigo_fabricante']?>"/><br><br>
        <input  type="submit" name="enviar" value="Modificar Producte"/>
    </form>
    <?php
}
}

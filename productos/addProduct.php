<?php
include('../connection.php');
$result = mysqli_query($conn, "SELECT * FROM FABRICANTE");
if (isset($_POST['enviar'])) {
    $insert = "INSERT INTO producto SET nombre='" . $_POST['nombre'] . 
    "', precio='" .$_POST['precio'] . 
    "', codigo_fabricante='" . $_POST['codigo_fabricante'] ."', imagen='" . $_POST['imagen'] . 
    "'";
    $esCorrecte = mysqli_query($conn,$insert);
    if ($esCorrecte) echo "Dades insertades correctament";
    if (!$esCorrecte) echo "Dades insertades erroneament";
    mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form name="Dades"method="post" action="" >
        Nombre : <input type="text" name="nombre" require/><br><br>
        Precio : <input type="number" name="precio" require/><br><br>
        Codigo Fabricante : <select name="codigo_fabricante">
        <?php
        $cont = 0;
        while ($fila = mysqli_fetch_row($result)) {
           
       
        ?>
        
            <option value="<?php echo $fila[0]; ?>"><?php echo $fila[1];} ?></option>

        </select><br><br>
        Imagen Producto : <input type="text" name="imagen" require/><br><br>
        <input type="submit" name="enviar" value="Insertar Producte"/>
    </form>
</body>
</html>

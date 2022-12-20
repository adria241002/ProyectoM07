<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
<style>
    table{
        padding: 10px;
    }
    td{
        text-align: center;
    }
</style>
<table>
<?php
include('../connection.php');

$result2 = mysqli_query($conn ,"SELECT * FROM fabricante");


?>
<table>
    <tr>
        <th>Codigo</th>
        <th>Nombre</th>
        <th>URL LOGO</th>
    </tr>
<?php
$i=0;

while ($fila =  mysqli_fetch_assoc($result2)) {
    if ($i % 2 == 0) {
        echo "<tr>";
    }else{
        echo "<tr>";
    }
        echo "<td>" . $fila["codigo"] . "</td>";
        echo "<td>" . $fila["nombre"] . "</td>";
        echo "<td><img height='50' src='". $fila["logoFabricante"] . "'></td>";
        echo "<td> <a href='./modificarProducte.php?p=".$fila["codigo"]."'><span class='material-symbols-outlined'>
        edit_note
        </span></a> </td>";
        echo "<td> <a href='./esborrarProducte.php?p=".$fila["codigo"]."'><span class='material-symbols-outlined'>
        delete_forever
        </span></a> </td>";
        echo "</tr>";
        $i++;
}

?>
</table>

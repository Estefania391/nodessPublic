<?php
require '../../php/conexion.php';
$con = Database::getInstance()->getDb();

if(isset($_SERVER["HTTP_X_REQUESTED_WITH"])){

$identificador = $_POST['clasificacion'];

$sql = "SELECT * FROM sumisnistraccion WHERE id_sum = '$identificador'";

    foreach ($con->query($sql) as $row){
    	$datos['1'] = $row['num_alta_funkos'];
        $datos['2'] = $row['precio_unidad'];
        $datos['3'] = $row['id_proveedor'];
        $datos['4'] = $row['id_admin'];
        $datos['5'] = $row['fm'];
    }
}

echo(json_encode($datos));
exit();
?>

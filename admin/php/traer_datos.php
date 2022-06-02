<?php
require 'conexion.php';
$con = Database::getInstance()->getDb();

if(isset($_SERVER["HTTP_X_REQUESTED_WITH"])){

$identificador = $_POST['clasificacion'];

$sql = "SELECT * FROM usuarios WHERE id_usuario = '$identificador'";


    foreach ($con->query($sql) as $row){
        $datos['1'] = $row['codigo_postal'];
        $datos['2'] = $row['calle'];
        $datos['3'] = $row['colonia'];
        $datos['4'] = $row['telefono'];
        $datos['5'] = $row['nombre']." ".$row['apellido_paterno']." ".$row['apellido_materno'];
    }
}

echo(json_encode($datos));
exit();
?>

<?php
require '../../php/conexion.php';
$con = Database::getInstance()->getDb();

if(isset($_SERVER["HTTP_X_REQUESTED_WITH"])){

$identificador = $_POST['clasificacion'];

$sql = "SELECT * FROM administracion WHERE id_admin = '$identificador'";


    foreach ($con->query($sql) as $row){
        $datos['1'] = $row['email'];
        $datos['2'] = $row['contrasena'];
        $datos['3'] = $row['apellido_paterno'];
        $datos['4'] = $row['apellido_materno'];
        $datos['5'] = $row['nombre'];
        $datos['6'] = $row['rol'];
    }
}

echo(json_encode($datos));
exit();
?>

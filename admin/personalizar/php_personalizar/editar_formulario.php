<?php
//Conexion a la base de datos
require '../../php/conexion.php';
$con = Database::getInstance()->getDb();

if(isset($_SERVER["HTTP_X_REQUESTED_WITH"])){
//Obtenemos el valor de las subclasificaciones de acuerdo a la clasificacion seleccionada
$identificador = $_POST['clasificacion'];

$sql = "SELECT * FROM personalizar WHERE id = '$identificador'";


    foreach ($con->query($sql) as $row){
        $datos['1'] = $row['id'];
        $datos['2'] = $row['nombre'];
        $datos['3'] = $row['favicon'];
        $datos['4'] = $row['logo'];
        $datos['5'] = $row['colorP'];
        $datos['6'] = $row['colorS'];
        $datos['7'] = $row['ano'];
        $datos['8'] = $row['facebook'];
        $datos['9'] = $row['twitter'];
        $datos['10'] = $row['celular'];
    
    }
}

echo(json_encode($datos));
exit();
?>

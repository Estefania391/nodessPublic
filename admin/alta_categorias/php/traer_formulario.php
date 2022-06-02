<?php
require '../../php/conexion.php';
$con = Database::getInstance()->getDb();

if(isset($_SERVER["HTTP_X_REQUESTED_WITH"])){

$identificador = $_POST['clasificacion'];

$sql = "SELECT * FROM alta_categorias WHERE id_catego = '$identificador'";

    foreach ($con->query($sql) as $row){
    	$datos['1'] = $row['nombre'];
        $datos['2'] = $row['descripcion'];
        $datos['3'] = $row['img_fondo'];
        $datos['4'] = $row['icono'];
    }
}

echo(json_encode($datos));
exit();
?>

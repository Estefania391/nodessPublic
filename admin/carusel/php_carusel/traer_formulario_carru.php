<?php
require '../../php/conexion.php';

$con = Database::getInstance()->getDb();

if(isset($_SERVER["HTTP_X_REQUESTED_WITH"])){

$identificador = $_POST['clasificacion'];

$sql = "SELECT * FROM carusel WHERE idCarusel  = '$identificador'";

    foreach ($con->query($sql) as $row){
        $datos['1'] = $row['titulo_1'];
        $datos['2'] = $row['subtitulo_2'];
        $datos['3'] = $row['descripcion'];
        $datos['4'] = $row['img'];
        $datos['5'] = $row['btn_ver'];
        $datos['6'] = $row['btn_titulo'];
        $datos['7'] = $row['url'];
    }
}

echo(json_encode($datos));
exit();
?>

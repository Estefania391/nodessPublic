<?php
require '../admin/php/conexion.php';

$con = Database::getInstance()->getDb();

if(isset($_SERVER["HTTP_X_REQUESTED_WITH"])){

$identificador = $_POST['clasificacion'];

$sql = "SELECT imgGaleria FROM galeria WHERE idGaleria   = '$identificador'";

    foreach ($con->query($sql) as $row){
        $datos['1'] = $row['imgGaleria'];
    }
}

echo(json_encode($datos));
exit();
?>

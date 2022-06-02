<?php
require '../../php/conexion.php';

$con = Database::getInstance()->getDb();

$idC = $_POST['id'];
$titulo = $_POST['titulo'];
$subtitulo = $_POST['subtitulo'];
$descripcion = $_POST['descripcion'];
$mostrarBtn = $_POST['mostrarBtn'];
$nombreBtn = $_POST['nombreBtn'];
$urlBtn = $_POST['urlBtn'];
$carusel = $_POST['carusel'];
$nombre_imagen1 = $_POST['nombre_imagen1'];
$aux_img = "";

$separcion = explode("../", $nombre_imagen1);

switch (true) {
        case ($nombre_imagen1 != ""):
        $aux_img = $nombre_imagen1;
        break;
        
        case ($nombre_imagen1 == "")&&($carusel != ""):
        $aux_img = $carusel;
        break;
        
        case ($nombre_imagen1 == "")&&($carusel == ""):
        $aux_img = "";
        break;
}

if (isset($separcion[3])) {
        $aux_img = $separcion[3];
}


$sql = 'UPDATE carusel SET titulo_1 = ?, subtitulo_2 = ?, descripcion = ?, img = ?, btn_ver = ?, btn_titulo = ?, url = ? WHERE idCarusel  = ?';
$q = $con->prepare($sql);
$q->bindParam(1, $titulo);
$q->bindParam(2, $subtitulo);
$q->bindParam(3, $descripcion);
$q->bindParam(4, $aux_img);
$q->bindParam(5, $mostrarBtn);
$q->bindParam(6, $nombreBtn);
$q->bindParam(7, $urlBtn);
$q->bindParam(8, $idC);
$q->execute();


?>
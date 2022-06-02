<?php
require '../../php/conexion.php';

$con = Database::getInstance()->getDb();

$idG = $_POST['id'];
$catego = $_POST['catego'];
$galeria = $_POST['galeria'];
$nombre_imagen1 = $_POST['nombre_imagen1'];
$aux_img = "";

$separcion = explode("../", $nombre_imagen1);

switch (true) {
        case ($nombre_imagen1 != ""):
        $aux_img = $nombre_imagen1;
        break;
        
        case ($nombre_imagen1 == "")&&($galeria != ""):
        $aux_img = $galeria;
        break;
        
        case ($nombre_imagen1 == "")&&($galeria == ""):
        $aux_img = "";
        break;
}

if (isset($separcion[3])) {
        $aux_img = $separcion[3];
}


$sql = 'UPDATE galeria SET categoria = ?, imgGaleria = ? WHERE idGaleria = ?';
$q = $con->prepare($sql);
$q->bindParam(1, $catego);
$q->bindParam(2, $aux_img);
$q->bindParam(3, $idG);
$q->execute();


?>
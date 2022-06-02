<?php
require '../../php/conexion.php';
$con = Database::getInstance()->getDb();

$idCat = $_POST['id'];
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$fondo = $_POST['fondo'];
$nombre_imagen1 = $_POST['nombre_imagen1'];
$icono = $_POST['icono'];
$nombre_imagen2 = $_POST['nombre_imagen2'];

$aux_img = "";
$aux_img2 = "";

$separcion = explode("../", $nombre_imagen1);
$separcion2 = explode("../", $nombre_imagen2);

switch (true) {
        case ($nombre_imagen1 != ""):
        $aux_img = $nombre_imagen1;
        break;
        
        case ($nombre_imagen1 == "")&&($fondo != ""):
        $aux_img = $fondo;
        break;
        
        case ($nombre_imagen1 == "")&&($fondo == ""):
        $aux_img = "";
        break;
}

switch (true) {
        case ($nombre_imagen2 != ""):
        $aux_img2 = $nombre_imagen2;
        break;
        
        case ($nombre_imagen2 == "")&&($icono != ""):
        $aux_img2 = $icono;
        break;
        
        case ($nombre_imagen2 == "")&&($icono == ""):
        $aux_img2 = "";
        break;
}

if (isset($separcion[3])) {
        $aux_img = $separcion[3];
}

if (isset($separcion2[3])) {
        $aux_img2 = $separcion2[3];
}


$sql = 'UPDATE alta_categorias SET nombre = ?, descripcion = ?, img_fondo = ?, icono = ? WHERE id_catego = ?';
$q = $con->prepare($sql);
$q->bindParam(1, $nombre);
$q->bindParam(2, $descripcion);
$q->bindParam(3, $aux_img);
$q->bindParam(4, $aux_img2);
$q->bindParam(5, $idCat);
$q->execute();


?>
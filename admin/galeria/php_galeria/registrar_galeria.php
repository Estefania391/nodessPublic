<?php
require '../../php/conexion.php';

$con = Database::getInstance()->getDb();

$idG = $_POST['id'];
$catego = $_POST['catego'];
$galeria = $_POST['galeria'];
$nombre_imagen1 = $_POST['nombre_imagen1'];
$separcion = explode("../", $nombre_imagen1);


$sql = "INSERT INTO galeria(categoria, imgGaleria) VALUES(?, ?)";
$q = $con->prepare($sql);
$q->bindParam(1, $catego);
$q->bindParam(2, $separcion[3]);
$q->execute();
?>
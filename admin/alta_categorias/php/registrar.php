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
$separcion = explode("../", $nombre_imagen1);
$separcion2 = explode("../", $nombre_imagen2);

$sql = "INSERT INTO alta_categorias(nombre, descripcion, img_fondo, icono) VALUES(?, ?, ?, ?)";
$q = $con->prepare($sql);
$q->bindParam(1, $nombre);
$q->bindParam(2, $descripcion);
$q->bindParam(3, $separcion[3]);
$q->bindParam(4, $separcion2[3]);
$q->execute();
?>
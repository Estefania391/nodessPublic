<?php
require '../../php/conexion.php';

$con = Database::getInstance()->getDb();

$titulo = $_POST['titulo'];
$subtitulo = $_POST['subtitulo'];
$descripcion = $_POST['descripcion'];
$mostrarBtn = $_POST['mostrarBtn'];
$nombreBtn = $_POST['nombreBtn'];
$urlBtn = $_POST['urlBtn'];
$carusel = $_POST['carusel'];
$nombre_imagen1 = $_POST['nombre_imagen1'];
$separcion = explode("../", $nombre_imagen1);


$sql = "INSERT INTO carusel(titulo_1, subtitulo_2, descripcion, img, btn_ver, btn_titulo, url) VALUES(?, ?, ?, ?, ?, ?, ?)";
$q = $con->prepare($sql);
$q->bindParam(1, $titulo);
$q->bindParam(2, $subtitulo);
$q->bindParam(3, $descripcion);
$q->bindParam(4, $separcion[3]);
$q->bindParam(5, $mostrarBtn);
$q->bindParam(6, $nombreBtn);
$q->bindParam(7, $urlBtn);
$q->execute();
?>
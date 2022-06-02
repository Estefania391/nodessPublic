<?php
require '../../php/conexion.php';
$con = Database::getInstance()->getDb();

$id = $_POST['id'];

$sql = 'DELETE FROM noticias WHERE idNoticia  = ?';
$q = $con->prepare($sql);
$q->bindParam(1, $id);
$q->execute();
?>
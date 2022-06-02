<?php
require '../../php/conexion.php';

$con = Database::getInstance()->getDb();

$id_carru = $_POST['id'];

$sql = 'DELETE FROM carusel WHERE idCarusel = ?';
$q = $con->prepare($sql);
$q->bindParam(1, $id_carru);
$q->execute();
?>
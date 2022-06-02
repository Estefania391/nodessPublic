<?php
require '../../php/conexion.php';
$con = Database::getInstance()->getDb();

$id = $_POST['id'];

$sql = 'DELETE FROM administracion WHERE id_admin = ?';
$q = $con->prepare($sql);
$q->bindParam(1, $id);
$q->execute();
?>
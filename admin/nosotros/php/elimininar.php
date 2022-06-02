<?php
require '../../php/conexion.php';

$con = Database::getInstance()->getDb();


$id = $_POST['id'];

$sql = 'DELETE FROM sumisnistraccion WHERE id_sum = ?';
$q = $con->prepare($sql);
$q->bindParam(1, $id);
$q->execute();
?>
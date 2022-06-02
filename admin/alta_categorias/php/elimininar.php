<?php
require '../../php/conexion.php';
$con = Database::getInstance()->getDb();

$id = $_POST['id'];

$sql = 'DELETE FROM alta_categorias WHERE id_catego  = ?';
$q = $con->prepare($sql);
$q->bindParam(1, $id);
$q->execute();
?>
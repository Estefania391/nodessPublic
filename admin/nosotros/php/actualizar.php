<?php
require '../../php/conexion.php';

$con = Database::getInstance()->getDb();

$idS = $_POST['id'];
$num_alta = $_POST['num_alta'];
$precio_unidad = $_POST['precio_unidad'];
$id_proveedor = $_POST['id_proveedor'];
$id_admin = $_POST['id_admin'];
$fm = $_POST['fm'];
$usu = $_POST['usu'];
$uFinal = "";

if ($id_admin=="") {
        $uFinal = $usu;
}else{
        $uFinal = $id_admin;
}


$sql = 'UPDATE sumisnistraccion SET num_alta_funkos = ?, precio_unidad = ?, id_proveedor = ?, id_admin = ?, fm = ? WHERE id_sum = ?';
$q = $con->prepare($sql);
$q->bindParam(1, $num_alta);
$q->bindParam(2, $precio_unidad);
$q->bindParam(3, $id_proveedor);
$q->bindParam(4, $uFinal);
$q->bindParam(5, $fm);
$q->bindParam(6, $idS);
$q->execute();


?>
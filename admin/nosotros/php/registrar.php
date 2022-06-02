<?php
require '../../php/conexion.php';

$con = Database::getInstance()->getDb();

$num_alta = $_POST['num_alta'];
$precio_unidad = $_POST['precio_unidad'];
$id_proveedor = $_POST['id_proveedor'];
$id_admin = $_POST['id_admin'];
$fm = $_POST['fm'];
$usu = $_POST['usu'];
$fecha = Date("Y-m-d");
$uFinal = "";

if ($id_admin=="") {
        $uFinal = $usu;
}else{
        $uFinal = $id_admin;
}

$sql = "INSERT INTO sumisnistraccion(num_alta_funkos, fecha_alta, precio_unidad, id_proveedor, id_admin, fm) VALUES(?, ?, ?, ?, ?, ?)";
$q = $con->prepare($sql);
$q->bindParam(1, $num_alta);
$q->bindParam(2, $fecha);
$q->bindParam(3, $precio_unidad);
$q->bindParam(4, $id_proveedor);
$q->bindParam(5, $uFinal);
$q->bindParam(6, $fm);
$q->execute();
?>
<?php
require 'conexion.php';

$con = Database::getInstance()->getDb();

$con->beginTransaction();

$id_usuario = $_POST['idU'];
$fm = $_POST['fm'];
$cantidad = $_POST['cantidad'];
$calle = $_POST['calle'];
$colonia = $_POST['colonia'];
$cp = $_POST['cp'];
$telefono = $_POST['telefono'];
$nombre_usu = $_POST['nombre_usu'];
$total = $_POST['total'];
$separcion = explode("$", $total);
$ano = Date("Y-m-d");

try{

	$sql_canti = "SELECT num_alta_funkos FROM sumisnistraccion WHERE fm = '$fm'";
	foreach ($con->query($sql_canti) as $row){
    	$num = $row['num_alta_funkos'];
    }

    if ($num < $cantidad) {
    	 $con->rollback();//Retonar antes de la compra siel numero comprado es menor a la existente
    }else{
    	$sql = "INSERT INTO compras(cantidad, total, fecha_compra, fm, id_usuario) VALUES (?, ?, ?, ?, ?)";
		$q = $con->prepare($sql);
		$q->bindParam(1, $cantidad);
		$q->bindParam(2, $separcion[1]);
		$q->bindParam(3, $ano);
		$q->bindParam(4, $fm);
		$q->bindParam(5, $id_usuario);
		$q->execute();

    	$nueva_cantidad = $num-$cantidad;
    	$sql_actuliza = 'UPDATE sumisnistraccion SET num_alta_funkos = ? WHERE fm = ?';
    	$qa = $con->prepare($sql_actuliza);
    	$qa->bindParam(1, $nueva_cantidad);
    	$qa->bindParam(2, $fm);
    	$qa->execute();

    	$sql_usuarios = 'UPDATE usuarios SET codigo_postal = ?, calle = ?, colonia = ?, telefono = ? WHERE id_usuario = ?';
    	$qs = $con->prepare($sql_usuarios);
    	$qs->bindParam(1, $cp);
    	$qs->bindParam(2, $calle);
    	$qs->bindParam(3, $colonia);
    	$qs->bindParam(4, $telefono);
    	$qs->bindParam(5, $id_usuario);
    	$qs->execute();

    	echo $con->inTransaction();//---> Devuelve 1 si es correcta o 0 sino lo es
    	$con->commit();
    }
}catch(PDOException $ex){
  $con->rollback();
}
?>
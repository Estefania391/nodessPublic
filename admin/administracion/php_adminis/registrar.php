<?php
require '../../php/conexion.php';
$con = Database::getInstance()->getDb();

$nombre = $_POST['nombre'];
$ap_paterno = $_POST['ap_paterno'];
$ap_materno = $_POST['ap_materno'];
$correo = $_POST['correo'];
$pass = $_POST['pass'];
$rol = $_POST['rol'];
$password = md5($pass);


$sql = "INSERT INTO administracion(email, apellido_paterno, apellido_materno, nombre, rol, contrasena) VALUES(?, ?, ?, ?, ?, ?)";
$q = $con->prepare($sql);
$q->bindParam(1, $correo);
$q->bindParam(2, $ap_paterno);
$q->bindParam(3, $ap_materno);
$q->bindParam(4, $nombre);
$q->bindParam(5, $rol);
$q->bindParam(6, $password);
$q->execute();
?>
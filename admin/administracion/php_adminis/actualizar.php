<?php
require '../../php/conexion.php';
$con = Database::getInstance()->getDb();

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$ap_paterno = $_POST['ap_paterno'];
$ap_materno = $_POST['ap_materno'];
$correo = $_POST['correo'];
$pass = $_POST['pass'];
$rol = $_POST['rol'];

$encrip = md5($pass);
$aux_pass = "";

$conse_pass = $con->prepare("SELECT contrasena FROM administracion WHERE id_admin = ?");
$conse_pass->bindParam(1, $idU);
$conse_pass->execute();
$rows1 = $conse_pass->fetchAll(\PDO::FETCH_OBJ);

foreach($rows1 as $row1){
        $actual = $row1->contrasena; 
}

if($actual == $pass){
    $aux_pass = $pass;
}else{
    $aux_pass = $encrip;
}



$sql = 'UPDATE administracion SET email = ?, apellido_paterno = ?, apellido_materno = ?, nombre = ?, rol = ?, contrasena = ? WHERE id_admin = ?';
$q = $con->prepare($sql);
$q->bindParam(1, $correo);
$q->bindParam(2, $ap_paterno);
$q->bindParam(3, $ap_materno);
$q->bindParam(4, $nombre);
$q->bindParam(5, $rol);
$q->bindParam(6, $aux_pass);
$q->bindParam(7, $id);
$q->execute();


?>
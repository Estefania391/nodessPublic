<?php
require '../../php/conexion.php';//Archivo de ceonexion

$con = Database::getInstance()->getDb();//Variable de conexion
date_default_timezone_set('America/Mexico_City');


/**Seccion de recibir variables**/
$id = $_POST['id'];
$idU = $_POST['idU'];
$titulo = $_POST['titulo'];
$subtitulo = $_POST['subtitulo'];
$descripcion = $_POST['descripcion'];
$categoria = $_POST['catego'];
$fecha_registro = date("Y-m-d");
$fecha_inicio = $_POST['fecha_inicio'];
$fecha_fin = $_POST['fecha_fin'];
$urlVideo = $_POST['urlVideo'];
$redesSociales = $_POST['redesSociales'];

$ima1 = $_POST['ima1'];
$imagen1 = $_POST['imagen1'];
$separcion = explode("../", $imagen1);

$ima2 = $_POST['ima2'];
$imagen2 = $_POST['imagen2'];
$separcion2 = explode("../", $imagen2);

$ima3 = $_POST['ima3'];
$imagen3 = $_POST['imagen3'];
$separcion3 = explode("../", $imagen3);

$ima4 = $_POST['ima4'];
$imagen4 = $_POST['imagen4'];
$separcion4 = explode("../", $imagen4);

$ima5 = $_POST['ima5'];
$imagen5 = $_POST['imagen5'];
$separcion5 = explode("../", $imagen5);


//Obtenemos nombre del usuario que registro la nota

$stmt3 = $con->prepare("SELECT nombre, apellido_paterno, apellido_materno FROM administracion WHERE id_admin  = 1");
$stmt3->execute();
$rows3 = $stmt3->fetchAll(\PDO::FETCH_OBJ);

    $autor = "";
    foreach($rows3 as $row3){
    	$autor = $row3->nombre." ".$row3->apellido_paterno." ".$row3->apellido_materno; 
    }
    
//Insert
$sql = "INSERT INTO noticias(titulo_1, subtitulo_2, fecha_registro, fecha_inicio, fecha_fin, autor, descripcion, categoria, video, imagen_1, imagen_2, imagen_3, imagen_4, imagen_5, redes_sociales) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$q = $con->prepare($sql);
$q->bindParam(1, $titulo);
$q->bindParam(2, $subtitulo);
$q->bindParam(3, $fecha_registro);
$q->bindParam(4, $fecha_inicio);
$q->bindParam(5, $fecha_fin);
$q->bindParam(6, $autor);
$q->bindParam(7, $descripcion);
$q->bindParam(8, $categoria);
$q->bindParam(9, $urlVideo);
$q->bindParam(10, $separcion[3]);
$q->bindParam(11, $separcion2[3]);
$q->bindParam(12, $separcion3[3]);
$q->bindParam(13, $separcion4[3]);
$q->bindParam(14, $separcion5[3]);
$q->bindParam(15, $redesSociales);
$q->execute();

?>
<?php
require '../../php/conexion.php';

$con = Database::getInstance()->getDb();

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

$mi_img1 = "";
$mi_img2 = "";
$mi_img3 = "";
$mi_img4 = "";
$mi_img5 = "";

switch (true) {
        case ($imagen1 != ""):
                $mi_img1 = $imagen1;
        break;
        case ($imagen1 == "")&&($ima1 != ""):
                $mi_img1 = $ima1;
        break;
        
        case ($imagen1 == "")&&($ima1 == ""):
                $mi_img1 = "";
        break;
}
if (isset($separcion[3])) {
        $mi_img1 = $separcion[3];
}

switch (true) {
        case ($imagen2 != ""):
                $mi_img2 = $imagen2;
        break;
        case ($imagen2 == "")&&($ima2 != ""):
                $mi_img2 = $ima2;
        break;
        
        case ($imagen2 == "")&&($ima2 == ""):
                $mi_img2 = "";
        break;
}
if (isset($separcion2[3])) {
        $mi_img2 = $separcion2[3];
}

switch (true) {
        case ($imagen3 != ""):
                $mi_img3 = $imagen3;
        break;
        case ($imagen3 == "")&&($ima3 != ""):
                $mi_img3 = $ima3;
        break;
        
        case ($imagen3 == "")&&($ima3 == ""):
                $mi_img3 = "";
        break;
}
if (isset($separcion3[3])) {
        $mi_img3 = $separcion3[3];
}

switch (true) {
        case ($imagen4 != ""):
                $mi_img4 = $imagen4;
        break;
        case ($imagen4 == "")&&($ima4 != ""):
                $mi_img4 = $ima4;
        break;
        
        case ($imagen4 == "")&&($ima4 == ""):
                $mi_img4 = "";
        break;
}
if (isset($separcion4[3])) {
        $mi_img4 = $separcion4[3];
}

switch (true) {
        case ($imagen5 != ""):
                $mi_img5 = $imagen5;
        break;
        case ($imagen5 == "")&&($ima5 != ""):
                $mi_img5 = $ima5;
        break;
        
        case ($imagen5 == "")&&($ima5 == ""):
                $mi_img5 = "";
        break;
}
if (isset($separcion5[3])) {
        $mi_img5 = $separcion5[3];
}

//Obtenemos nombre del usuario que registro la nota

$stmt3 = $con->prepare("SELECT nombre, apellido_paterno, apellido_materno FROM administracion WHERE id_admin  = 1");
$stmt3->execute();
$rows3 = $stmt3->fetchAll(\PDO::FETCH_OBJ);

    $autor = "";
    foreach($rows3 as $row3){
        $autor = $row3->nombre." ".$row3->apellido_paterno." ".$row3->apellido_materno; 
    }



$sql = 'UPDATE noticias SET titulo_1 = ?, subtitulo_2 = ?, fecha_registro = ?, fecha_inicio = ?, fecha_fin = ?, autor = ?, descripcion = ?, categoria = ?, video = ?, imagen_1 = ?, imagen_2 = ?, imagen_3 = ?, imagen_4 = ?, imagen_5 = ?, redes_sociales = ? WHERE idNoticia = ?';
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
$q->bindParam(10, $mi_img1);
$q->bindParam(11, $mi_img2);
$q->bindParam(12, $mi_img3);
$q->bindParam(13, $mi_img4);
$q->bindParam(14, $mi_img5);
$q->bindParam(15, $redesSociales);
$q->bindParam(16, $id);
$q->execute();


?>
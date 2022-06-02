<?php
require '../../php/conexion.php';
$con = Database::getInstance()->getDb();


$id = $_POST['id'];
$nombre = $_POST['nombre'];
$logo = $_POST['logo'];
$favicon = $_POST['favicon'];
$color = $_POST['color'];
$color2 = $_POST['color2'];
$ano = $_POST['ano'];
$face = $_POST['facebook'];
$twi = $_POST['twitter'];
$cel = $_POST['celular'];
$nomas = $_POST['nombre_imagen1'];
$favi = $_POST['nombre_imagen2'];
$mi_logo = "";
$mi_favicon = "";

switch (true) {
        case ($nomas != ""):
        $mi_logo = $nomas;
        break;
        
        case ($nomas == "")&&($logo != ""):
        $mi_logo = $logo;
        break;
        
        case ($nomas == "")&&($logo == ""):
        $mi_logo = "";
        break;
}

switch (true) {
        case ($favi != ""):
        $mi_favicon = $favi;
        break;
        
        case ($favi == "")&&($favicon != ""):
        $mi_favicon = $favicon;
        break;
        
        case ($nomas == "")&&($favicon == ""):
        $mi_favicon = "";
        break;
}

$sql = "UPDATE personalizar SET nombre=?, favicon=?, logo=?, 
        colorP=?, colorS=?, ano=?, facebook=?, twitter=?, 
        celular=? WHERE id=?";
$q = $con->prepare($sql);
$q->bindParam(1, $nombre);
$q->bindParam(2, $mi_favicon);
$q->bindParam(3, $mi_logo);
$q->bindParam(4, $color);
$q->bindParam(5, $color2);
$q->bindParam(6, $ano);
$q->bindParam(7, $face);
$q->bindParam(8, $twi);
$q->bindParam(9, $cel);
$q->bindParam(10, $id);
$q->execute();


?>
<?php
require '../../php/conexion.php';//Archivo de ceonexion
//Se comprueba de que se reciben datos
if(isset($_SERVER["HTTP_X_REQUESTED_WITH"])){
/**Se recibe variable**/
$identificador = $_POST['clasificacion'];
//consulta
$sql = "SELECT * FROM noticias WHERE idNoticia  = '$identificador'";
//Se añaden datos en un arreglo
$con = Database::getInstance()->getDb();
    foreach ($con->query($sql) as $row){
    	$datos['1'] = $row['titulo_1'];
        $datos['2'] = $row['subtitulo_2'];
        $datos['3'] = $row['fecha_inicio'];
        $datos['4'] = $row['fecha_fin'];
        $datos['5'] = $row['descripcion'];
        $datos['6'] = $row['categoria'];
        $datos['7'] = $row['video'];
        $datos['8'] = $row['imagen_1'];
        $datos['9'] = $row['imagen_2'];
        $datos['10'] = $row['imagen_3'];
        $datos['11'] = $row['imagen_4'];
        $datos['12'] = $row['imagen_5'];
        $datos['13'] = $row['redes_sociales'];
    }
}
//Devulve datos
echo(json_encode($datos));
//Se cierra conexion
exit();
?>

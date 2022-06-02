<?php
if(isset($_FILES["iconoImg"])){
    $file_l = $_FILES["iconoImg"];
    $nombre = $file_l["name"];
    $tipo = $file_l["type"];
    $ruta_provisional = $file_l["tmp_name"];
    $size = $file_l["size"];
    $dimensiones = getimagesize($ruta_provisional);
    $width = $dimensiones[0];
    $height = $dimensiones[1];
    $carpeta = "../../../images/lineasEstrategicas/";

    
    if ($tipo != 'image/jpg' && $tipo != 'image/jpeg' && $tipo != 'image/png' && $tipo != 'image/gif'){
      echo "Error, el archivo no es una imagen"; 
    }else{
        $src = $carpeta.$nombre;
        move_uploaded_file($ruta_provisional, $src);
        echo "<img src='php_carusel/$src' style='width: 150px; height: 150px; ' >";
    }
    echo $src;
}
?>
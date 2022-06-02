<?php
if(isset($_FILES["img3"])){
    $file_l = $_FILES["img3"];
    $nombre = $file_l["name"];
    $tipo = $file_l["type"];
    $ruta_provisional = $file_l["tmp_name"];
    $size = $file_l["size"];
    $dimensiones = getimagesize($ruta_provisional);
    $width = $dimensiones[0];
    $height = $dimensiones[1];
    $carpeta = "../../../images/noticias/";

    
    if ($tipo != 'image/jpg' && $tipo != 'image/jpeg' && $tipo != 'image/png' && $tipo != 'image/gif'){
      echo "Error, el archivo no es una imagen"; 
    }else{
        $src = $carpeta.$nombre;
        move_uploaded_file($ruta_provisional, $src);
        echo "<img src='php_alta/$src' style='width: 100px; height: 100px; ' >";
    }
    echo $src;
}
?>
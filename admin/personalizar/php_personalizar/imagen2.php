<?php
if(isset($_FILES["a_favicon"])){
    $file_f = $_FILES["a_favicon"];
    $nombre = $file_f["name"];
    $tipo = $file_f["type"];
    $ruta_provisional = $file_f["tmp_name"];
    $size = $file_f["size"];
    $dimensiones = getimagesize($ruta_provisional);
    $width = $dimensiones[0];
    $height = $dimensiones[1];
    $carpeta = "guardar_img/";

    
    if ($tipo != 'image/jpg' && $tipo != 'image/jpeg' && $tipo != 'image/png' && $tipo != 'image/gif'){
      echo "Error, el archivo no es una imagen"; 
    }else{
        $src = $carpeta.$nombre;
        move_uploaded_file($ruta_provisional, $src);
        echo "<img src='php_personalizar/$src' style='width: 100px; height: 100px; ' >";
    }
    echo $src;
}
?>
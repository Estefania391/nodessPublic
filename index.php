<?php
require 'admin/php/conexion.php';

$con = Database::getInstance()->getDb();

$cinsul = $con->prepare("SELECT nombre, favicon, logo, colorP, colorS, ano FROM personalizar");
$cinsul->execute();
$rows = $cinsul->fetchAll(\PDO::FETCH_OBJ);

foreach($rows as $row){
  $nombre = $row->nombre;
  $favicon = $row->favicon;
  $logo = $row->logo; 
  $colores = $row->colorP;
  $colores2 = $row->colorS;  
  $ano = $row->ano;
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>Bienvenido a NODESS</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- style css -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Responsive-->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- fevicon -->
    <link rel="icon" href="admin/personalizar/php_personalizar/<?php if(isset($favicon)) print($favicon); ?>" type="image/png" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
    <style type="text/css">
        .header {
            background-image: url(images/back.jpg);
           
            background-repeat: no-repeat;
            background-size: cover;
        }
        .carousel-indicators li {
            background-color: <?php if(isset($colores)) print($colores);?>;
        }
        .carousel-indicators .active {
            background-color: <?php if(isset($colores2)) print($colores2);?>;
        }
        #subTitu, #subTitu2{
            font-size: 50px;
            font-weight: bold;
            line-height: 60px;
            color: <?php if(isset($colores2)) print($colores2);?>;
            text-transform: uppercase;
            padding-bottom: 10px;
            display: block;
        }
        .ul .img {
            min-height: 25vh;
            -webkit-transition: all 0.5s ease;
            transition: all 0.5s ease;
            -webkit-transform: scale(1);
            transform: scale(1);
        }
        .ul .li:hover .img {
            -webkit-transform: scale(0.8);
            transform: scale(0.8);
        }
        .for_box_bg {
            background: <?php if(isset($colores)) print($colores);?>;
        }
        .dropdown-menu {
            background-color: <?php if(isset($colores2)) print($colores2);?>;
        }
        .dropdown-item:focus, .dropdown-item:hover {
            background-color: #162737;
        }
        .product .product_box figure h3 {
            background: <?php if(isset($colores2)) print($colores2);?>;
        }
        .footer {
            background: <?php if(isset($colores)) print($colores);?>;
        }
        .address h3 {
            border-bottom: <?php if(isset($colores2)) print($colores2);?> solid 4px;
        }
        .copyright {
            background: <?php if(isset($colores2)) print($colores2);?>;
        }
    </style>
</head>

<body class="main-layout ">
    <!-- loader  -->
    <div class="loader_bg">
        <div class="loader"><img src="images/loading.gif" alt="#" /></div>
    </div>
    <!-- Fin loader -->
    <!-- Cabezera -->
    <?php include('header.php');?>

    <!-- end header -->
    <section class="slider_section">
        <div id="carouselExampleControls" class="carousel slide banner-main" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                <?php
                    $carru1 = $con->query("SELECT titulo_1, subtitulo_2, descripcion, img, btn_ver, btn_titulo, url FROM carusel ORDER BY RAND() limit 1");
                    $rows1 = $carru1->fetchAll(\PDO::FETCH_OBJ);
                    foreach($rows1 as $row){ ?>
                    <img src="<?php print($row->img);?>" alt="First slide">
                    <div class="container">
                        <div class="carousel-caption relative">
                            <h1><?php print($row->titulo_1);?></h1>
                            <span id="subTitu"><?php print($row->subtitulo_2);?></span>

                            <?php print($row->descripcion);?>
                            <br>
                            <?php if ($row->btn_ver == 0) { ?>
                            <a class="buynow" href="<?php print($row->url);?>"><?php print($row->btn_titulo);?></a>
                            <?php } ?>

                        </div>
                    </div>
                <?php } ?>
                </div>
                <?php  
                    $carru1 = $con->query("SELECT titulo_1, subtitulo_2, descripcion, img, btn_ver, btn_titulo, url FROM carusel ORDER BY RAND() limit 1, 30 ");
                    $rows1 = $carru1->fetchAll(\PDO::FETCH_OBJ);
                    foreach($rows1 as $row){ ?>
                <div class="carousel-item">
                    <img src="<?php print($row->img);?>" alt="Second slide">
                    <div class="container">
                        <div class="carousel-caption relative">
                            <h1><?php print($row->titulo_1);?></h1>
                            <span id="subTitu2"><?php print($row->subtitulo_2);?></span>

                            <?php print($row->descripcion);?>
                            <br>
                            <?php if ($row->btn_ver == 0) { ?>
                            <a class="buynow" href="<?php print($row->url);?>"><?php print($row->btn_titulo);?></a>
                            <?php } ?>

                        </div>
                    </div>
                </div>
                <?php } ?>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
            <!--<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                      <img class="d-block w-100" src="..." alt="First slide">
                    </div>
                    <div class="carousel-item">
                      <img class="d-block w-100" src="..." alt="Second slide">
                    </div>
                    <div class="carousel-item">
                      <img class="d-block w-100" src="..." alt="Third slide">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>-->
    </section>

    <!-- for_box -->

    <div class="for_box_bg">
        <div class="container">
            <div class="row d-flex justify-content-center">
            <?php
                $iconos = $con->query("SELECT id_catego, nombre, icono FROM alta_categorias");
                $rows2 = $iconos->fetchAll(\PDO::FETCH_OBJ);
                foreach($rows2 as $row2){ ?>
                <div class="col-xl-2 col-lg-2 col-md-2 co-sm-l2">  
                    <div class="for_box">
                        <a href="linea_estrategica.php?le=<?php if(isset($row2->id_catego)) print($row2->id_catego); ?>"><img src="<?php  if(isset($row2->icono)) print($row2->icono); ?>" alt="<?php  if(isset($row2->nombre)) print($row2->nombre); ?>" style="width: 50%;" /></a>
                        <hr>
                        <h4 style="font-size: 20px; line-height: 33px; color: #fff;"><?php  if(isset($row2->nombre)) print($row2->nombre); ?></h4>
                    </div>
                </div>
            <?php } ?>
            </div>
        </div>
    </div>
    <!-- end for_box -->

    <!--- Galeria ----->
    <div class="container mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title">
                        <h3 style="font-size: 40px;">Galería</h3>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <ul class="ul row m-5">
        <?php
            $galeria = $con->query("SELECT * FROM galeria");
            $rows3 = $galeria->fetchAll(\PDO::FETCH_OBJ);
            foreach($rows3 as $row3){ ?>
                <li class="li col-lg-3">
                    <a href="#" onclick="galeria(<?php if(isset($row3->idGaleria )) print($row3->idGaleria ); ?>); return false;">
                        <img class="w-100 rounded img" src="<?php if(isset($row3->imgGaleria)) print($row3->imgGaleria); ?>">
                    </a>
                </li>
        <?php } ?> 
    </ul>
</div>
    <!-- product -->
    <div id="product" class="product">
        <div class="container">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="title">
                            <h3 style="font-size: 40px;">NODESS</h3>
                            <h2><strong class="black"> Últimos posts</strong></h2>
                            <br>
                            <h4>Conoce los artículos más relevantes de la semana </h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid" >
            <table id="example" class="display" cellspacing="0" width="100%">
                <tbody class="row">
                <?php
                    $contenido = $con->query("SELECT idNoticia, titulo_1, imagen_1 FROM noticias;");
                    $rows5 = $contenido->fetchAll(\PDO::FETCH_OBJ);
                    foreach($rows5 as $row5){ ?>
                        <tr >
                            <td class="col-xl-8 col-lg-8 col-md-8 col-sm-12">
                                <div class="product_box">
                                    <figure>
                                        <a href="descripcion.php?idN=<?php  if(isset($row5->idNoticia)) print($row5->idNoticia); ?>">
                                            <img src="<?php  if(isset($row5->imagen_1)) print($row5->imagen_1); ?>" alt="#" />
                                            <h3><?php  if(isset($row5->titulo_1)) print($row5->titulo_1); ?> </h3>
                                        </a>
                                    </figure>
                                </div>
                            </td>
                        </tr>

                <?php } ?>
                </tbody>
            </table>
         </div>
    </div>

    <!-- end product -->
    
  
    <!-- end clients -->
    <!-- footer -->
    <?php include('footer.php');?>
    <!--  footer -->
 
    <div class="modal fade" id="modalGaleria" tabindex="-1" role="dialog" aria-labelledy="modalGaleriaLabel" aria-hidden="true" >
        <button type="button" class="close mr-5 mt-5" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
      <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
         <div name="actual" id="actual"></div>
      </div>
    </div>

    <!-- Javascript files-->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="admin/fontawesome/js/all.js" type="text/javascript"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery-3.0.0.min.js"></script>
    <script src="js/plugin.js"></script>
    <!-- sidebar -->
    <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/custom.js"></script>
    <!-- javascript -->
    <script src="js/owl.carousel.js"></script>
    <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
    <script type="text/javascript">
     function galeria(id){
        var idG = id;
        $.ajax({
            url:'php/traer_formulario.php',
            dataType: 'json',
            data:{clasificacion: idG},
            type: 'post',
            success: function(data){

                //Variabls para mostrar una imagen
                imagena = '<img src="';
                imagenb = '" class="img-fluid rounded">'
                //Recuperamos los valores de la consulta
                img = data["1"];
           
                document.getElementById('actual').value = document.getElementById('actual').innerHTML = imagena.concat(img,imagenb);
            
                $('#modalGaleria').modal('show');
            }
        });

        }
    </script>
</body>

</html>
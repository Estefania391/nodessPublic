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

$seccionL = "";
if(!isset($_GET["idN"])){
      header("Location: index.php");
}else{
    $nota = $_GET["idN"];
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
    <title>Nombre de la Noticia</title>
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
            background: <?php if(isset($colores)) print($colores);?>;
        }
        .banner-main .carousel-caption span {
            color: <?php if(isset($colores2)) print($colores2);?>;
        }
        .carousel-indicators li {
            background-color: <?php if(isset($colores)) print($colores);?>;
        }
        .carousel-indicators .active {
            background-color: <?php if(isset($colores2)) print($colores2);?>;
        }
        .for_box_bg {
            background: <?php if(isset($colores2)) print($colores2);?>;
        }
        .dropdown-menu {
            background-color: <?php if(isset($colores)) print($colores);?>;
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

     <div class="for_box_bg">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <?php
                $iconos = $con->query("SELECT id_catego, nombre, icono FROM alta_categorias");
                $rows2 = $iconos->fetchAll(\PDO::FETCH_OBJ);
                foreach($rows2 as $row2){ ?>
                <div class="col-xl-2 col-lg-2 col-md-2 co-sm-6">
                    <div class="for_box">
                        <a href="linea_estrategica.php?le=<?php  if(isset($row2->id_catego)) print($row2->id_catego); ?>"><img src="<?php  if(isset($row2->icono)) print($row2->icono); ?>" alt="<?php  if(isset($row2->nombre)) print($row2->nombre); ?>" style="width: 30%;"/></a>
                    </div>
                </div>
            <?php } ?>
            </div>
        </div>
    </div>
   
    <section style="padding-top:90px ;">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <?php
                        $detalles = $con->query("SELECT imagen_1, imagen_2, imagen_3, imagen_4, imagen_5 FROM noticias WHERE idNoticia = $nota");
                        $rows3 = $detalles->fetchAll(\PDO::FETCH_OBJ);
                        foreach($rows3 as $row3){ ?>
                    <!-- AGREGAMOS CAROUSEL DE BOOTSTRAP PARA IMAGENES -->
                    <div id="carousel_noticias" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="<?php  if(isset($row3->imagen_1)) print($row3->imagen_1); ?>" alt="First slide">
                            </div>
                        </div>
                
                    </div>
                 <?php } ?>

                    <div style="padding-top: 20px;" class="container">
                        <div class="row blog">
                            <div class="col-md-12">

                                <div id="blogCarousel" class="carousel slide" data-ride="carousel">

                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <div class="row">
                                                <?php
                                                    $imagenes = $con->query("SELECT imagen_1, imagen_2, imagen_3, imagen_4, imagen_5 FROM noticias WHERE idNoticia = $nota");
                                                    $rows4 = $imagenes->fetchAll(\PDO::FETCH_OBJ);
                                                    foreach($rows4 as $row4){ ?>
                                                <?php if(isset($row4->imagen_2)){ ?>
                                                <div class="col-md-3">
                                                    <a href="#">
                                                        <img src="<?php print($row4->imagen_2); ?>" alt="Image" style="max-width:100%;">
                                                    </a>
                                                </div>
                                                <?php } ?>
                                                <?php if(isset($row4->imagen_3)){ ?>
                                                <div class="col-md-3">
                                                    <a href="#">
                                                        <img src="<?php print($row4->imagen_3); ?>" alt="Image" style="max-width:100%;">
                                                    </a>
                                                </div>
                                                <?php } ?>
                                                <?php if(isset($row4->imagen_4)){ ?>
                                                <div class="col-md-3">
                                                    <a href="#">
                                                        <img src="<?php print($row4->imagen_4); ?>" alt="Image" style="max-width:100%;">
                                                    </a>
                                                </div>
                                                <?php } ?>
                                                <?php } ?>
                                            </div>
                                            <!--.row-->
                                        </div>
                                        <!--.item-->
                        </div>
                        <!--.carousel-inner-->

                        <a class="carousel-control-prev" href="#blogCarousel" role="button" data-slide-to="0">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#blogCarousel" role="button" data-slide-to="1">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>

                    </div>
                    <!--.Carousel-->

                </div>
            </div>
        </div>
         <?php
            $imagenes = $con->query("SELECT titulo_1, subtitulo_2, fecha_registro, autor, descripcion, video FROM noticias WHERE idNoticia = $nota");
            $rows4 = $imagenes->fetchAll(\PDO::FETCH_OBJ);
            foreach($rows4 as $row4){ ?>
        <h1 style="text-align: left; color: #0b6995">
            <?php  if(isset($row4->titulo_1)) print($row4->titulo_1); ?>
        </h1>

        <h5 class="mb-3 bread text-muted subtitulo" style="text-align: left;" style="color: #3eab34">
            <?php  if(isset($row4->subtitulo_2)) print($row4->subtitulo_2); ?>
        </h5>
        
        <p class="ml-auto mb-0" style="color: #3eab34; font-size: 16px;">
            <span class="icon-calendar"></span> <?php  if(isset($row4->fecha_registro)) print($row4->fecha_registro); ?>
            <span class="icon-user" style="margin-left: 10px;"></span> Por <?php  if(isset($row4->autor)) print($row4->autor); ?>.
        </p>
        <br>

        <?php  if(isset($row4->descripcion)) print($row4->descripcion); ?>

         <?php } ?>

                    <!-- PLUGIN DE COMENTARIOS DE FACEBOOK -->
                    <!-- <div class="fb-comments" data-href="https://pronaes.com/blog/80/primer-foro-de-economia-solidaria/" data-numposts="5" data-width=""></div> -->
<br>
                    <div class="social-networks" style="text-align: center;">
                        <!--  visible-xs -->
                        <p
                            style="color:#3eab34; font-weight: bolder;  font-size: 18px; text-align: center;">
                            Comparte en:</p>
                        <!--<a href="https://www.facebook.com/sharer.php?u=https://pronaes.com/blog/80/primer-foro-de-economia-solidaria/1"
                            onclick="window.open(this.href, this.target, 'width=400,height=400'); return false"
                            id="left" style="background-color:#4267b2; margin-left: 0px; color: white;" type="button"
                            target="v" class="btn btn-default btn-circle btn-lg-facebook" ); return false">
                            <span class="icon-facebook" style="font-size: 20px;"></span>
                        </a>

                        <a class="btn btn-default btn-circle btn-lg-twitter" id="left"
                            style="background-color: #1da1f2; margin-left: 0px; color: white;"
                            href="https://twitter.com/intent/tweet?text=BLOG PRONAES:%20Primer Foro de Economía Solidaria&url=https://pronaes.com/blog/80/primer-foro-de-economia-solidaria/2"
                            data-size="large" target="v"
                            onclick="window.open(this.href, this.target, 'width=500,height=400'); return false">
                            <span class="icon-twitter" style="font-size: 22px;"></span>
                        </a>


                        <a class="btn btn-default btn-circle btn-lg-what-mess" id="whatsapp_share"
                            data-link="https://pronaes.com/blog/80/primer-foro-de-economia-solidaria"
                            style="background-color: #00e676; margin-left: 0px; color: white;" href="#">
                            <span class="icon-whatsapp" style="font-size: 25px;"></span>
                        </a>-->

                        <span class="hidden-xs">
                            <br>
                            <br>
                        </span>
                    </div>
                </div> <!-- .col-md-8 -->

                <div class="col-lg-4 col-md-12 col-xss-4 sidebar ftco-animate">

                    
                        <div class="sidebar-box ftco-animate">
                            <h3 class="heading-sidebar">Entradas recomendadas</h3>

                    <div class="block-21 mb-4 d-flex">
                                <!--<a href="noticia.php?id=10" class="blog-img mr-4">-->
                                <a href="#"
                                    class="blog-img mr-4">
                                    <img loading="lazy"
                                        src="img_examples/Fashion.jpg"
                                        class="img-fluid">
                                    <div class="overlay"></div>
                                </a>
                                <div class="text">
                                    <h3 class="heading trunc">
                                        <!--<a href="noticia.php?id=10">Foro Estatal de Economía Solidaria </a>-->
                                        <a
                                            href="#">Joyas </a>
                                    </h3>
                                </div>
                            </div>

                    <div class="block-21 mb-4 d-flex">
                
                                <a href="#"
                                    class="blog-img mr-4">
                                    <img loading="lazy"
                                        src="img_examples/fiori.jpg"
                                        class="img-fluid">
                                    <div class="overlay"></div>
                                </a>
                                <div class="text">
                                    <h3 class="heading trunc">
                                        <!--<a href="noticia.php?id=13">Foro PRONAES Zacatecas</a>-->
                                        <a
                                            href="#">Aceite</a>
                                    </h3>
                                </div>
                            </div>
                                                        
                                                        <div class="block-21 mb-4 d-flex">
                                <!--<a href="noticia.php?id=21" class="blog-img mr-4">-->
                                <a href="#"
                                    class="blog-img mr-4">
                                    <img loading="lazy"
                                        src="img_examples/food.jpg"
                                        class="img-fluid">
                                    <div class="overlay"></div>
                                </a>
                                <div class="text">
                                    <h3 class="heading trunc">
                                        <!--<a href="noticia.php?id=21">Primer Foro de Economía Solidaria</a>-->
                                        <a
                                            href="#">Polvo</a>
                                    </h3>
                                </div>
                            </div>
                            
                            <div class="block-21 mb-4 d-flex">
                                <!--<a href="noticia.php?id=23" class="blog-img mr-4">-->
                                <a href="#"
                                    class="blog-img mr-4">
                                    <img loading="lazy"
                                        src="img_examples/oil.jpg"
                                        class="img-fluid">
                                    <div class="overlay"></div>
                                </a>
                                <div class="text">
                                    <h3 class="heading trunc">
                                        <!--<a href="noticia.php?id=23">FOROS DE PRONAES EN LA REPÚBLICA MEXICANA</a>-->
                                        <a
                                            href="#">Vinos</a>
                                    </h3>
                                </div>
                            </div>
                                                        <div class="block-21 mb-4 d-flex">
                                <!--<a href="noticia.php?id=24" class="blog-img mr-4">-->
                                <a href="#"
                                    class="blog-img mr-4">
                                    <img loading="lazy"
                                        src="img_examples/Packaging.jpg"
                                        class="img-fluid">
                                    <div class="overlay"></div>
                                </a>
                                <div class="text">
                                    <h3 class="heading trunc">
                                        <!--<a href="noticia.php?id=24">Primer Foro de Economía Solidaria</a>-->
                                        <a
                                            href="#">Duros</a>
                                    </h3>
                                </div>
                            </div>
                                                        <div class="block-21 mb-4 d-flex">
                                <!--<a href="noticia.php?id=25" class="blog-img mr-4">-->
                                <a href="#"
                                    class="blog-img mr-4">
                                    <img loading="lazy"
                                        src="img_examples/Red.jpg"
                                        class="img-fluid">
                                    <div class="overlay"></div>
                                </a>
                                <div class="text">
                                    <h3 class="heading trunc">
                                        <!--<a href="noticia.php?id=25">Segundo foro de Economía Solidaria</a>-->
                                        <a
                                            href="#/">Bicicle</a>
                                    </h3>
                                </div>
                            </div>
                            
                            
                        </div>
                    </div>
    </section> <!-- .section -->

   
    <!-- footer -->
    <?php include('footer.php');?>
    <!--  footer -->
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

    
</body>

</html>
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
    <title>Contáctanos | NODESS</title>
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
        .product .product_box figure h3 {
           font-size: 18px;
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
    <!-- end header -->

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
                
 <!-- Integrantes-->

     <div id="product" class="product">
        <div class="container">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="title">
                            <h3 style="font-size: 40px;">NODESS</h3>
                            <h2><strong class="black">Integrantes</strong></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid" >
            <table id="example" class="display" cellspacing="0" width="100%">
                <tbody class="row">
                        <tr>
                            <td class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
                                <div class="product_box">
                                    <figure>
                                         <img src="img_examples/Campo.jpg" alt="#" />
                                         <h3>Christan Omar Pérez Díaz</h3>
                                    </figure>
                                </div>
                            </td>
                            <td class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
                                <div class="product_box">
                                    <figure>
                                        <img src="img_examples/Fashion.jpg" alt="#" />
                                        <h3>Gemma Alejandre Pizá</h3>
                                    </figure>
                                </div>
                            </td>
                            <td class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
                                <div class="product_box">
                                    <figure>
                                        <img src="img_examples/food.jpg" alt="#" />
                                        <h3>Leticia Oseguera Figueroa</h3>
                                    </figure>
                                </div>
                            </td>
                            <td class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
                                <div class="product_box">
                                    <figure>
                                        <img src="img_examples/Giordano.jpg" alt="#" />
                                        <h3>Maria Elena Páramo</h3>
                                    </figure>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
                                <div class="product_box">
                                    <figure>
                                        <img src="img_examples/Packaging.jpg" alt="#" />
                                        <h3>Ma. Guadalupe Torres Chávez</h3>
                                    </figure>
                                </div>
                            </td>
                            <td class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
                                <div class="product_box">
                                    <figure>
                                        <img src="img_examples/Red.jpg" alt="#" />
                                        <h3>Martin Tapia Salazar</h3>
                                    </figure>
                                </div>
                            </td>
                            <td class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
                                <div class="product_box">
                                    <figure>
                                        <img src="img_examples/Giordano.jpg" alt="#" />
                                        <h3>Miriam E Aguirre Arias</h3>
                                    </figure>
                                </div>
                            </td>
                            <td class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
                                <div class="product_box">
                                    <figure>
                                        <img src="img_examples/Campo.jpg" alt="#" />
                                        <h3>Soraida Quezada Ascencio</h3>
                                    </figure>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
                                <div class="product_box">
                                    <figure>
                                        <img src="img_examples/Packaging.jpg" alt="#" />
                                        <h3>Víctor Manuel Berrueta Soriano</h3>
                                    </figure>
                                </div>
                            </td>
                        </tr>
                </tbody>
            </table>
         </div>
    </div>

    <!-- contact -->

    <div id="contact" class="contact">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title">
                        <h2><strong class="black"> Contáctanos</strong></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid padddd">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 padddd">
            <div class="map_section">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">

                            <form class="main_form ">
                                <div class="row">

                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                        <input class="form-control" placeholder="Nombre" type="text" name="Nombre">
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                        <input class="form-control" placeholder="Correo" type="text" name="Correo">
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                        <input class="form-control" placeholder="Asunto" type="text" name="Asunto">
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                        <textarea class="textarea" placeholder="Mensaje" type="text" name="Mensaje"></textarea>
                                    </div>
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                        <button class="send">Enviar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15040.048556084494!2d-101.5839984!3d19.5410924!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x9cc096bc1fcd5152!2sInstituto%20Tecnol%C3%B3gico%20Superior%20De%20P%C3%A1tzcuaro!5e0!3m2!1ses-419!2smx!4v1644013604610!5m2!1ses-419!2smx" width="1800" height="720" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </div> 

   
    <!-- end contact -->

    <!-- footer -->
    <?php include('footer.php');?>
    <!--  footer -->


    <!-- end footer -->
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
    <script>
        $(document).ready(function() {
            $(".fancybox").fancybox({
                openEffect: "none",
                closeEffect: "none"
            });

            $(".zoom").hover(function() {

                $(this).addClass('transition');
            }, function() {

                $(this).removeClass('transition');
            });
        });
    </script>
</body>

</html>
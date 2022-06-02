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
    <title>Acerca de nosotros | NODESS</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- style css -->
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.css" rel="stylesheet">
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

    <!--- Restaurant-->
        <div class="container">
            <div class="row" id="Restaurant">
                <div class="col navMenu">
                    <h1 class="text-center" >~ Sobre nosotros ~</h1>
                </div>
            </div><br> <br>
            <div class="row bg-light" >
                <div class="col-md-6">
                    <h3>Misión</h3>
                    <br>
                    <p>Generar estrategias y acciones que fomenten e impulsen el desarrollo de prácticas y ejercicios desde la economía social y solidaria, que coadyuven en la reducción de las desigualdades sociales y la construcción de paz en la región Pátzcuaro-Zirahuén.</p>
                    
                </div>
                <div class="col-md-6" data-aos="fade-up">
                    <img class="img-fluid" src="img_examples/WhatsApp Image 2021-11-16 at 9.26.06 PM (3).jpeg">
                </div>
            </div>
            <div class="row bg-light"><br></div>
            <div class="row bg-light">
                <div class="col-md-6 order-md-1 order-2" data-aos="fade-up">
                    <img class="img-fluid " src="img_examples/WhatsApp Image 2021-11-16 at 9.26.07 PM (4).jpeg">
                </div>
                <br>
                <div class="col-md-6 order-md-12 order-1">
                    <h3>Objetivo General</h3>
                    <p>
                        Promover la creación, organización y fortalecimiento de los organismos del sector social de la economía (OSSE) de la región Pátzcuaro Zirahuén.</p>
                        <br>
                        <h3>Objetivos Específicos</h3>
                        <p >Brindar asesoría y capacitación para la creación y fortalecimiento de organismos del sector social de la economía.   </p><br>
                        
                        <p>Visibilizar y difundir las diferentes expresiones de economía social y solidaria a través de los distintos medios de comunicación.   </p><br>
                        
                        <p>Impulsar la comercialización de productos de OSSE a través de los distintos canales y medios de comunicación para el comercio justo y trato directo.   </p><br>
                    
                        <p>Contribuir en la reconstrucción y fortalecimiento del tejido social, el respeto por la vida y la mitigación de las violencias, priorizando para ello procesos integrales socioeducativos con la participación comunitaria.   </p><br>
                        
                        <p>Difundir y hacer comprender la Gestión integrada de cuencas, el uso del territorio como patrimonio, identidad cultural y autonomía  </p> <br>
                    
                </div>
            </div><br>

            <div class="row bg-light" >
                <div class="col-md-6"><br>
                    <h3>Metodología </h3>
                    <br> 
                    <p>Contamos con una ruta metodológica para el seguimiento, atención, monitoreo y mejora continua a las organizaciones de la economía social y solidaria, así como de aquellos sectores vulnerables por violencias estructurales de la región.</p>
                       <br>
                   
                            <p>	Análisis de las necesidades.</p>
                            <p>	Sensibilización e identificación de actores.</p>
                            <p>	Planeación e Intervención.</p>
                            <p>	Gestión de recursos y medición.</p>
                            <p>	Implementación y mejora.</p>
                        <br>
  
                </div>
                <div class="col-md-6" data-aos="fade-up">
                    <img class="img-fluid" src="img_examples/metodologia.png">
                </div>
            </div>
            
            <!--- End of Restaurant -->
        </div>

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
    <script src="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.js"></script>
    <script src="js/image-effect.js"></script>
    <!-- sidebar -->
    <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/custom.js"></script>
    <!-- javascript -->
    <script src="js/owl.carousel.js"></script> 
</body>

</html>
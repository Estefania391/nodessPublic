<header>
        <!-- header inner -->
        <div class="header">

            <div class="container">
                <div class="row">
                    <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col logo_section">
                        <div class="full">
                            <div class="center-desk">
                                <div class="logo">
                                    <a href="index.php"><img class="img-responsive" src="admin/personalizar/php_personalizar/<?php if(isset($logo)) print($logo); ?>" alt="#"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-10 col-lg-10 col-md-10">
                        <div class="location_icon_bottum_tt">
                            <ul>
                                <li><img class="img-responsive" src="images/michoacan.png" /></li>
                                <li><img class="img-responsive" src="images/inaes.png" /></li>
                                <li><img class="img-responsive" src="images/tecnmPatz.png" /></li>
                                <li><img class="img-responsive" src="images/nodesslogo.png" /></li>
                            </ul>
                        </div>
                    </div>
                    <!--<div class="col-xl-2 col-lg-2 col-md-2 col-sm-12">
                        <div class="full">
                            <div class="center-desk">
                                <div class="logo">
                                   <img class="img-responsive" src="images/tecnmPatz.png" />
                                </div>
                            </div>
                        </div>
                    </div>-->
                </div>
                <div class="row">
                    <div class="col-md-12 location_icon_bottum">
                       <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 ">
                                <div class="menu-area">
                                    <div class="limit-box">
                                        <nav class="main-menu">
                                            <ul class="menu-area-main">
                                                <li class="active"> <a href="index.php">Inicio</a> </li>
                                                <li><a href="nosotros.php">Nosotros</a> </li>
                                                <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Líneas Estratégicas</a>
                                                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                                        <?php
                                                            $iconos = $con->query("SELECT id_catego, nombre FROM alta_categorias");
                                                            $rows2 = $iconos->fetchAll(\PDO::FETCH_OBJ);
                                                            foreach($rows2 as $row2){ ?>
                                                            <a class="dropdown-item" href="linea_estrategica.php?le=<?php  if(isset($row2->id_catego)) print($row2->id_catego); ?>"><?php  if(isset($row2->nombre)) print($row2->nombre); ?></a>
                                                        <?php } ?>
                                                    </div>
                                                </li>

                                                <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Alianzas</a>
                                                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                                        <?php
                                                            $iconos = $con->query("SELECT id_catego, nombre FROM alta_categorias");
                                                            $rows2 = $iconos->fetchAll(\PDO::FETCH_OBJ);
                                                            foreach($rows2 as $row2){ ?>
                                                            <a class="dropdown-item" href="alianza.php?le=<?php  if(isset($row2->id_catego)) print($row2->id_catego); ?>"><?php  if(isset($row2->nombre)) print($row2->nombre); ?></a>
                                                        <?php } ?>
                                                    </div>
                                                </li>
                                                <li><a href="blog.php">Blog</a></li>
                                                <li><a href="osses.php">Osses</a></li>
                                                <li><a href="contacto.php">Contáctanos</a></li>

                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                       </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end header inner -->
    </header>
<?php
require '../php/conexion.php';

SESSION_START();

$con = Database::getInstance()->getDb();

$cinsul = $con->prepare("SELECT nombre, favicon, colorP, ano FROM personalizar");
$cinsul->execute();
$rows = $cinsul->fetchAll(\PDO::FETCH_OBJ);

foreach($rows as $row){
  $nombre = $row->nombre;
  $favicon = $row->favicon; 
  $colores = $row->colorP;
  $ano = $row->ano; 
}

  if(!isset($_SESSION['id_us'])){
      header("Location: ../../index.php");
    }elseif ($_SESSION['nivel_us']=='padawan') {
      header("Location: ../../index.php");
    }elseif ($_SESSION['nivel_us']=='joven_jedi') {
      header("Location: ../../index.php");
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Carrusel</title>
  <link rel="shortcut icon" type="image/png" href="../personalizar/php_personalizar/<?php print($favicon); ?>"/> 
  <!-- Bootstrap core CSS-->
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <!-- Page level plugin CSS-->
  <link href="../css/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="../css/sb-admin.css" rel="stylesheet">
  <!-- Estilo de boton de archivo -->
  <link href="../css/file.css" rel="stylesheet">
  <script src="../js/editor/ckeditor.js"></script>
  <script src="../js/editor/specialcharacters.js"></script>
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav style="background: <?php print($colores);?>;" class="navbar navbar-expand-lg navbar-dark  fixed-top" id="mainNav">
    <a class="navbar-brand" href="../../index.php"><?php if(isset($nombre))print($nombre); ?></a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion" style="background: <?php if(isset($colores)) print($colores);?>;">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Alta de contenido">
          <a style="color: #fff;" class="nav-link" href="../alta_contenido/alta_contenido.php">
            <i class="fab fa-jedi-order"></i>
            <span class="nav-link-text">Alta de contenido</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Galer??a">
          <a style="color: #fff;" class="nav-link" href="../galeria/galeria.php">
            <i class="fa fa-fw fa-image"></i>
            <span class="nav-link-text">Galer??a</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Carusel">
          <a style="color: #fff;" class="nav-link" href="../carusel/carusel.php">
            <i class="fa fa-fw fa-table"></i>
            <span class="nav-link-text">Carusel</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Nosotros">
          <a style="color: #fff;" class="nav-link" href="../nosotros/nosotros.php">
            <i class="fa fa-fw fa-info"></i>
            <span class="nav-link-text">Nosotros</span>
          </a>
        </li>
        <?php if($_SESSION['nivel_us'] == 'jedi' || $_SESSION['nivel_us'] == 'padawan' ){ ?>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Administraci??n">
          <a style="color: #fff;" class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseAdministracion" data-parent="#exampleAccordion">
            <i class="fas fa-address-card"></i>
            <span class="nav-link-text">Administraci??n</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseAdministracion">
            <li>
              <a href="../administracion/administracion.php">Aminimistradores</a>
            </li>
            <li>
              <a href="../alta_categorias/alta_categorias.php">L??neas estrat??gicas</a>
            </li>
          </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Configuraci??n">
          <a style="color: #fff;" class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseConfi" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-wrench"></i>
            <span class="nav-link-text">Configuraci??n</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseConfi">
            <li>
              <a href="../personalizar/personalizar.php">Personalizar</a>
            </li>
          </ul>
        </li>
        <?php }?>
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fas fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#modalSalir">
            <i class="fas fa-sign-out-alt"></i>Salir</a>
        </li>
      </ul>
    </div>
  </nav>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#"><?php if(isset($nombre))print($nombre); ?></a>
        </li>
        <li class="breadcrumb-item active">Carrusel</li>
      </ol>
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Tabla del carrusel&nbsp;&nbsp;&nbsp;<button class="btn btn-simple btn-sm" onclick="nuevo_usuario();" style="background: <?php print($colores); ?>; color: #fff;"><i class="fab fa-rebel"></i> Agregar</button></div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="tabla_usu" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Titulo</th>
                  <th>Sub Titulo</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $sql = "SELECT * FROM carusel ORDER BY idCarusel";
                  $consul2 = $con->prepare($sql);
                  $consul2->execute();
                  $rows_2 = $consul2->fetchAll(\PDO::FETCH_OBJ);
                  foreach($rows_2 as $row_u){
                  ?>
                <tr>
                  <td><?php print($row_u->idCarusel); ?></td>
                  <td><?php print($row_u->titulo_1); ?></td>
                  <td><?php print($row_u->subtitulo_2);  ?></td>
                  <td><button class="btn btn-primary btn-sm" onclick="editar_usuario('<?php print($row_u->idCarusel);?>');" ><i class="fa fa-edit"></i></button>&nbsp;&nbsp;<button class="btn btn-danger btn-sm" onclick="eliminar('<?php print($row_u->idCarusel);?>');"><i class="fa fa-trash"></i></button></td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright&nbsp;??<?php if(isset($ano)) print($ano);?>&nbsp;<?php if(isset($nombre)) print($nombre);?></small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
  </div>
  <div class="modal fade" id="modalSalir" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">??Estas seguro de salir?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">??</span>
            </button>
          </div>
          <div class="modal-body">Si seleccionas "Salir" vas ha cerrar sesi??n.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
            <a class="btn btn-primary" href="../php/cerrar_sesion.php">Salir</a>
          </div>
        </div>
      </div>
    </div>

    <!--Modal de carusel-->
    <div class="modal fade" id="carusel" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static">
      <div class="modal-dialog modal-lg">
        <form role="form" action="" id="formulario" name="frmCarusel" onsubmit="Registrar_carru(idC, accion); return false" enctype="multipart/form-data">
          <div class="modal-content">
            <div class="modal-header" style="background-color:<?php echo $colores ?>;">
              <h5 class="modal-title" style="color:#fff"><span id="titu_caru"></span> </h5>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>

            <div class="modal-body">
              <div class="row">
                <div class="col-md-6">
                  <label>Titulo:&nbsp; </label>
                  <input name="titulo" class="form-control"> 
                </div>
                <div class="col-md-6">
                  <label>Sub Titulo:&nbsp; </label>
                  <input name="subtitulo" class="form-control">  
                </div>
                <div class="col-md-12">
                  <label >Descripci??n:&nbsp; </label>
                  <textarea name="descripcion" id="descripcion" type="text"></textarea>
                </div>
                <div class="col-md-6">
                  <p>Mostrar bot??n:</p>
                  <label for="siMostrar">Si mostrar:&nbsp; </label>
                  <input type="radio" id="siMostrar"  name="mostrarBtn" onclick="mostrarBtnR();" value="0">
                  <label for="noMostrar">No mostrar:&nbsp; </label>
                  <input type="radio" id="noMostrar"  name="mostrarBtn" onclick="nomostrarBtnR();" value="1" checked>
                </div>
                <div id="mostrarInt" class="col-md-12" style="display:none">
                  <label>Titulo del bot??n:&nbsp; </label>
                  <input type="text"  name="nombreBtn" class="form-control">
                  <label>URL del bot??n:&nbsp; </label>
                  <input type="text"  name="urlBtn" class="form-control">
                </div>
                <div class="form-group col-md-6">
                  <label >Imagen carusel:</label>
                  <input type="file" name="caruselImg" multiple accept='image/*'>  
                </div>
                 <div class="form-group col-md-12" style="display:none">
                  <label>Imagen carusel:</label>
                  <input type="text"  name="carusel" class="form-control">
                </div>
                <a id="res_c" class="col-md-6"></a>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-success btn-circle btn-sm" style="margin-top: 10px;"><i class="glyphicon glyphicon-floppy-saved"></i> Guardar</button>
            <button type="button" class="btn btn-danger btn-circle btn-sm" data-dismiss="modal" style="margin-top: 10px;"><i class="fa fa-times"></i></button>
            </div>
          </div>
        </form>
        </div>
      </div>
    <script src="../fontawesome/js/all.js" type="text/javascript"></script>
    <script type="text/javascript" src="js_carusel/ajax_carrusel.js"></script>
    <!-- Bootstrap core JavaScript-->
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="../js/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="../js/jquery.dataTables.js"></script>
    <script src="../js/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="../js/sb-admin-datatables.min.js"></script>
    <script>
    // Remplaazmos el <textarea id="descripcion"> con el de CKEditor
    // instance, using default configuration.
    CKEDITOR.replace( 'descripcion');
    </script>
    <script type="text/javascript">
      //descripcion
      function mostrarBtnR(){
        document.getElementById('mostrarInt').style.display = "block";  
      }
      function nomostrarBtnR(){
        document.getElementById('mostrarInt').style.display = "none";

      }
    </script>
    <script type="text/javascript">
      var accion='';
      var idC='';
      function nuevo_usuario(){
        idC='';
        accion='Nuevo';
        document.getElementById('titu_caru').innerHTML="Nuevo Carusel";

        $('#carusel').modal('show'); 
      }

      function editar_usuario(id_caru){
        idC = id_caru;
        accion="Editar";
        document.getElementById('titu_caru').innerHTML="Editar Carusel";

        $.ajax({
          url:'php_carusel/traer_formulario_carru.php',
          dataType: 'json',
          data:{clasificacion: idC},
          type: 'post',
          success: function(data){
            titulo = data["1"];
            subtitulo = data["2"];
            descripcion = data["3"];
            img = data["4"];
            btn_ver = data["5"];
            btn_titulo = data["6"];
            url = data["7"];
           
            document.frmCarusel.titulo.value = titulo;
            document.frmCarusel.subtitulo.value = subtitulo;
            CKEDITOR.instances.descripcion.setData(descripcion);
            //document.frmCarusel.descripcion.value = descripcion;
            document.frmCarusel.carusel.value = img;
            document.frmCarusel.mostrarBtn.value = btn_ver;
            document.frmCarusel.nombreBtn.value = btn_titulo;
            document.frmCarusel.urlBtn.value = url;

            if (btn_ver == 0) {
              document.getElementById('mostrarInt').style.display = "block";
            }

            $('#carusel').modal('show');
          }
        })
      }
    </script>
    <script>
     $(function(){
        $("input[name='caruselImg']").on("change", function(){
            var formData = new FormData($("#formulario")[0]);
            var ruta = "php_carusel/imagen.php";
            document.getElementById('res_c').innerHTML = '<center>Cargando...</center>';
            $.ajax({
                url: ruta,
                data: formData,
                type: "POST",
                contentType: false,
                processData: false,
                success: function(datos)
                {
                    $("#res_c").html(datos);
                }
            });
        });
     });
  </script>
    <script>
      $(document).ready(function(){
        $('#tabla_usu').DataTable({
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros por pagina",
            "zeroRecords": "Lo siento no se encontraron :( registros",
            "info": "Mostrar pagina _PAGE_ de _PAGES_",
            "infoEmpty": "No se encontraron registros",
            "search":"Buscar",
            "previous":"Antes",
            "paginate": {
              "first":    "Primero",
              "last":    "??ltimo",
              "next":    "Siguiente",
              "previous": "Anterior"
            },
            "infoFiltered": "(filtrando de _MAX_ total registros)"
          }
        });
      });
    </script>
</body>
</html>

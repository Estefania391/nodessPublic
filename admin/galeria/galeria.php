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
  <title>Galería</title>
  <link rel="shortcut icon" type="image/png" href="../personalizar/php_personalizar/<?php print($favicon); ?>"/> 
  <!-- Bootstrap core CSS-->
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <!-- Page level plugin CSS-->
  <link href="../css/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="../css/sb-admin.css" rel="stylesheet">
  <!-- Estilo de boton de archivo -->
  <link href="../css/file.css" rel="stylesheet">
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
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Galería">
          <a style="color: #fff;" class="nav-link" href="../galeria/galeria.php">
            <i class="fa fa-fw fa-image"></i>
            <span class="nav-link-text">Galería</span>
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
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Administración">
          <a style="color: #fff;" class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseAdministracion" data-parent="#exampleAccordion">
            <i class="fas fa-address-card"></i>
            <span class="nav-link-text">Administración</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseAdministracion">
            <li>
              <a href="../administracion/administracion.php">Aminimistradores</a>
            </li>
            <li>
              <a href="../alta_categorias/alta_categorias.php">Líneas estratégicas</a>
            </li>
          </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Configuración">
          <a style="color: #fff;" class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseConfi" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-wrench"></i>
            <span class="nav-link-text">Configuración</span>
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
        <li class="breadcrumb-item active">Galería</li>
      </ol>
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Tabla de galería&nbsp;&nbsp;&nbsp;<button class="btn btn-simple btn-sm" onclick="nuevo_usuario();" style="background: <?php print($colores); ?>; color: #fff;"><i class="fas fa-images"></i> Agregar</button></div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="tabla_usu" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Categoria</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $sql = "SELECT * FROM galeria ORDER BY idGaleria";
                  $consul2 = $con->prepare($sql);
                  $consul2->execute();
                  $rows_2 = $consul2->fetchAll(\PDO::FETCH_OBJ);
                  foreach($rows_2 as $row_u){
                  ?>
                <tr>
                  <td><?php print($row_u->idGaleria); ?></td>
                  <td><?php print($row_u->categoria); ?></td>
                  <td><button class="btn btn-primary btn-sm" onclick="editar_usuario('<?php print($row_u->idGaleria);?>');" ><i class="fa fa-edit"></i></button>&nbsp;&nbsp;<button class="btn btn-danger btn-sm" onclick="eliminar('<?php print($row_u->idGaleria);?>');"><i class="fa fa-trash"></i></button></td>
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
          <small>Copyright&nbsp;©<?php if(isset($ano)) print($ano);?>&nbsp;<?php if(isset($nombre)) print($nombre);?></small>
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
            <h5 class="modal-title" id="exampleModalLabel">¿Estas seguro de salir?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Si seleccionas "Salir" vas ha cerrar sesión.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
            <a class="btn btn-primary" href="../php/cerrar_sesion.php">Salir</a>
          </div>
        </div>
      </div>
    </div>

    <!--Modal de Imagen-->
    <div class="modal fade" id="carusel" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static">
      <div class="modal-dialog modal-lg">
        <form role="form" action="" id="formulario" name="frmGaleri" onsubmit="Registrar(idG, accion); return false" enctype="multipart/form-data">
          <div class="modal-content">
            <div class="modal-header" style="background-color:<?php echo $colores ?>;">
              <h5 class="modal-title" style="color:#fff"><span id="titu_galeri"></span> </h5>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-md-12">
                  <label>Categoría:&nbsp; </label>
                  <select name="catego" class="form-control" required>
                      <option>Selecciona una opción</option>
                      <?php
                         $sql2 = "SELECT * FROM alta_categorias ORDER BY id_catego ASC";
                         $consul3 = $con->prepare($sql2);
                         $consul3->execute();
                         $rows3 = $consul3->fetchAll(\PDO::FETCH_OBJ);
                         foreach($rows3 as $row3){
                      ?>
                      <option value="<?php if(isset($row3->nombre)) echo $row3->nombre; ?>"><?php if(isset($row3->nombre)) echo $row3->nombre; ?></option>
                      <?php } ?>
                  </select> 
                </div>
                <div class="form-group col-md-6 mt-5">
                  <label >Imagen:</label>
                  <input type="file" name="galeriaImg" multiple accept='image/*'>  
                </div>
                 <div class="form-group col-md-12" style="display:none">
                  <label>Imagen:</label>
                  <input type="text"  name="galeria" class="form-control">
                </div>
                <a id="res_g" class="col-md-6"></a>
                <div class="form-group col-md-6" id="imagen_actual" style="display:none" >
                  <label>Imagen actual:</label>
                  <div name="actual" id="actual"></div>
                </div>
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
    <script type="text/javascript" src="js_galeria/ajax_galeria.js"></script>
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
    <script type="text/javascript">
      var accion='';
      var idG='';
      function nuevo_usuario(){
        idG='';
        accion='Nuevo';
        document.getElementById('titu_galeri').innerHTML="Nuevo Foto";

        $('#carusel').modal('show'); 
      }

      function editar_usuario(id){
        idG = id;
        accion="Editar";
        document.getElementById('titu_galeri').innerHTML="Editar Foto";

        $.ajax({
          url:'php_galeria/traer_formulario.php',
          dataType: 'json',
          data:{clasificacion: idG},
          type: 'post',
          success: function(data){

           //Variabls para mostrar una imagen
            imagena = '<img src="../../';
            imagenb = '" style="width:62px" >'
            //Recuperamos los valores de la consulta
            categoria = data["1"];
            img = data["2"];
           
            document.frmGaleri.catego.value = categoria;
            document.getElementById('actual').value = document.getElementById('actual').innerHTML = imagena.concat(img,imagenb);
            document.frmGaleri.galeria.value = img;
            document.getElementById('imagen_actual').style.display = "block";
            

            $('#carusel').modal('show');
          }
        })
      }
    </script>
    <script>
     $(function(){
        $("input[name='galeriaImg']").on("change", function(){
            var formData = new FormData($("#formulario")[0]);
            var ruta = "php_galeria/imagen.php";
            document.getElementById('res_g').innerHTML = '<center>Cargando...</center>';
            $.ajax({
                url: ruta,
                data: formData,
                type: "POST",
                contentType: false,
                processData: false,
                success: function(datos)
                {
                    $("#res_g").html(datos);
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
              "last":    "Último",
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

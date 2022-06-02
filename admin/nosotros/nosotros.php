<?php
require '../php/conexion.php';

SESSION_START();

$con = Database::getInstance()->getDb();

$cinsul = $con->prepare("SELECT nombre, favicon, colorP FROM personalizar");
$cinsul->execute();
$rows = $cinsul->fetchAll(\PDO::FETCH_OBJ);

foreach($rows as $row){
  $nombre = $row->nombre;
  $favicon = $row->favicon; 
  $colores = $row->colorP; 
}

    if(!isset($_SESSION['id_us'])){
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
  <title>Suministración</title>
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
  <nav  style="background: <?php if(isset($colores)) print($colores);?>;" class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
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
        <li class="breadcrumb-item active">Administración</li>
         <li class="breadcrumb-item active">Suministración</li>
      </ol>
      <!-- Example DataTables Card-->
     <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Tabla sobre nosotros&nbsp;&nbsp;&nbsp;<button class="btn btn-simple btn-sm" onclick="agregar();" style="background: <?php if(isset($colores)) print($colores); ?>; color: #fff;"><i class="fa fa-newspaper"></i>&nbsp;Agregar</button></div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="tabla_conte" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Numero de funkos</th>
                  <th>Fecha de alta</th>
                  <th>Precio de compra</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  /*$sql = "SELECT * FROM sumisnistraccion ORDER BY id_sum";
                  $consul2 = $con->prepare($sql);
                  $consul2->execute();
                  $rows_2 = $consul2->fetchAll(\PDO::FETCH_OBJ);
                  foreach($rows_2 as $row_pr){
                ?>
                 <tr>
                  <td><?php print($row_pr->id_sum); ?></td>
                  <td><?php print($row_pr->num_alta_funkos); ?></td>
                  <td><?php print($row_pr->fecha_alta); ?></td>
                  <td>$<?php print($row_pr->precio_unidad); ?></td>
                  <td><button class="btn btn-primary btn-sm" onclick="editar('<?php print($row_pr->id_sum);?>');" ><i class="fa fa-edit"></i></button>&nbsp;&nbsp;<button class="btn btn-danger btn-sm" onclick="eliminar('<?php print($row_pr->id_sum);?>');"><i class="fa fa-trash"></i></button></td>
                </tr>
                <?php }*/ ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright ©<?php  if(isset($nombre))print($nombre); ?> 2020</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
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

        <div class="modal fade" id="modalSum" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static">
      <div class="modal-dialog modal-lg">
        <form role="form" action="" id="formulario" name="frmSum" onsubmit="Registrar(idN, accion, usu); return false" enctype="multipart/form-data">
          <div class="modal-content">
            <div class="modal-header" style="background-color:<?php if(isset($colores)) echo $colores;  ?>;">
              <h5 class="modal-title" style="color:#fff"><span id="titu_conteni"></span> </h5>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>

            <div class="modal-body">
              <div class="row">
                <div class="col-md-6">
                  <label>Numero de Alta:&nbsp; </label>
                  <input name="num_alta" class="form-control" required>
                </div>
                <div class="col-md-6">
                  <label >Precio de compra por unidad:&nbsp; </label>
                  <input name="precio_unidad" class="form-control" required>  
                </div>
                <div class="col-md-6">
                  <label>Proveedor:&nbsp; </label>
                  <select name="proveedor" class="form-control" required>
                    <option>Selecciona una opción</option>
                    <?php
                        /*$sql = "SELECT * FROM proveedor ORDER BY id_proveedor";
                        $option = $con->prepare($sql);
                        $option->execute();
                        $rows_3 = $option->fetchAll(\PDO::FETCH_OBJ);
                        foreach($rows_3 as $rowsi){
                    ?>
                     <option value="<?php print($rowsi->id_proveedor);?>"><?php print($rowsi->nombre_empresa);?></option>
                    <?php }*/ ?>
                  </select> 
                </div>
                <div class="col-md-6">
                  <label >Adminitrador del movimiento:&nbsp; </label>
                  <input name="admin" class="form-control" readonly>
                </div>
                 <div class="col-md-6">
                  <label >Fm:&nbsp; </label>
                  <input name="fm" class="form-control" required>
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
    <script src="js/ajax.js"></script>
    <script src="../fontawesome/js/all.js" type="text/javascript"></script>
    <!-- Bootstrap core JavaScript-->
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="../js/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="../js/Chart.min.js"></script>
    <script src="../js/jquery.dataTables.js"></script>
    <script src="../js/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="../js/sb-admin-datatables.min.js"></script>
    <script src="../js/sb-admin-charts.min.js"></script>
    <script>
        var accion='';
        var idN='';
        var usu ='';
        
      function agregar(){
        accion='Nuevo';
        usu = '<?php echo $_SESSION['id_us']; ?>';
        document.getElementById('titu_conteni').innerHTML="Nuevo Suministro!!!";
        $('#modalSum').modal('show');
      }

      function editar(id_no){
        idN = id_no;
        usu = '<?php echo $_SESSION['id_us']; ?>';
        accion="Editar";
        document.getElementById('titu_conteni').innerHTML="Editar Suministro!!!";

        $.ajax({
          url:'php/traer_formulario.php',
          dataType: 'json',
          data:{clasificacion: idN},
          type: 'post',
          success: function(data){
            num_alta = data["1"];
            precio_unidad = data["2"];
            id_proveedor = data["3"];
            id_admin = data["4"];
            fm = data["5"];

            document.frmSum.num_alta.value = num_alta;
            document.frmSum.precio_unidad.value = precio_unidad;
            document.frmSum.proveedor.value = id_proveedor;
            document.frmSum.admin.value = id_admin;
            document.frmSum.fm.value = fm;

             $('#modalSum').modal('show');
          }
        })
        
      }
    </script>
    <script>
      $(document).ready(function(){
        $('#tabla_conte').DataTable({
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

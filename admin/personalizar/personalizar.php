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
  <title>Personalizar</title>
  <link rel="shortcut icon" type="image/png" href="php_personalizar/<?php print($favicon); ?>"/> 
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
  <nav style="background: <?php if(isset($colores)) print($colores);?>;" class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="../alta_contenido/alta_contenido.php"><?php if(isset($nombre))print($nombre); ?></a>
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
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#"><?php if(isset($nombre)) print($nombre); ?></a>
        </li>
        <li class="breadcrumb-item active">Personalizar</li>
      </ol>
      <h1>Personalizar</h1>
      <hr>
          <div class="container-fluid">
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Tabla de pesonalizar</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="tabla_perso" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Modificar</th>
                  <th>Titulo de la página</th>
                  <th>Color Primario</th>
                  <th>Color Secundario</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $sql = "SELECT * FROM personalizar ORDER BY id";
                $consul2 = $con->prepare($sql);
                $consul2->execute();
                $rows_2 = $consul2->fetchAll(\PDO::FETCH_OBJ);
                foreach($rows_2 as $row_p){
                  ?>
                  <tr>
                    <td><?php print($row_p->id); ?></td>
                    <td>
                      <button type="button" onclick="Editar('<?php print($row_p->id); ?>');" class="btn btn-danger btn-sm">
                        <i class="fa fa-edit"></i>
                      </button>
                    </td>
                    <td><?php print($row_p->nombre); ?></td>
                    <td><?php print($row_p->colorP); ?></td>      
                    <td><?php print($row_p->colorS); ?></td>
                  </tr>
                  <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    </div>
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright&nbsp;©<?php if(isset($ano)) print($ano);?>&nbsp;<?php if(isset($nombre)) print($nombre);?></small>
        </div>
      </div>
    </footer>
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
    <!--Modal de personalizar-->
    <div class="modal fade" id="personalizar" tabindex="-1" role="dialog" aria-hidden="true" data-backdrop="static">
      <div class="modal-dialog modal-md">
        <form role="form" action="" id="formulario" name="frmPersonlizar" onsubmit="Registrar(accion); return false" enctype="multipart/form-data">
          <div class="modal-content">
            <div class="modal-header" style="background-color:<?php if(isset($colores)) echo $colores ?>;">
              <h5 class="modal-title" style="color:#fff">Personalización: </h5>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>

            <div class="modal-body">
             <div class="form-group" style="display: none;">
              <label>id</label>
              <input name="id" readonly="readonly" class="form-control" required>
            </div>
                <div class="form-group col-md-6">
                  <label >Logo :</label>
                <input type="file" name="a_logo"  multiple accept='image/*'>  
                </div>
                
                <div class="form-group col-md-6">
                  <label >Favicon: </label>
                <input type="file" name="a_favicon"  multiple accept='image/*'>  
                </div>
                <a id="res_l" class="col-md-6"></a>
                <a id="res_f" class="col-md-6"></a>
                
          
                <div class="form-group col-md-12">
                  <label>Título: </label>
                  <input name="nombre" class="form-control" required>
                </div>
                  
                <div class="form-group col-md-12" style="display:none">
                  <label>Logo:</label>
                  <input type="text"  name="logo" class="form-control">
                </div>
                  
                <div class="form-group col-md-12" style="display:none">
                  <label>Favicon:</label>
                  <input type="text"  name="favicon" class="form-control">
                </div>
                  
                <div class="form-group col-md-12">
                  <label>Color Primario:</label>
                  <input name="color" type="color" class="form-control" required />
                </div>

                <div class="form-group col-md-12">
                  <label>Color Secundario:</label>
                  <input name="color2" type="color" class="form-control" required />
                </div>

                <div class="form-group col-md-12">
                  <label>Año en curso: </label>
                  <input name="ano" class="form-control" required>
                </div>

                <div class="form-group col-md-12">
                  <label>Facebook: </label>
                  <input name="face" class="form-control">
                </div>

                <div class="form-group col-md-12">
                  <label>Twitter: </label>
                  <input name="twi" class="form-control">
                </div>

                <div class="form-group col-md-12">
                  <label>Teléfono: </label>
                  <input name="cel" class="form-control">
                </div>
                    
                <div class="form-group col-md-12" id="llavemuestra" style="display:none;">
                  <label>Llave de registro</label>
                  <input name="llave" readonly="readonly" class="form-control">
                </div>
                  
                <div id="respuesta" style="" onfocus=""></div>
              </div>
            
            
            <div class="modal-footer">
              <button type="submit" class="btn btn-success btn-circle btn-sm" style="margin-top: 10px;"><i class="glyphicon glyphicon-floppy-saved"></i> Guardar</button>
              <button type="button" class="btn btn-danger btn-circle btn-sm" data-dismiss="modal" style="margin-top: 10px;"><i class="fa fa-times"></i></button>
            </div>
          </div>
              </form>
        </div>
      </div>
    </div>
    <script src="../fontawesome/js/all.js" type="text/javascript"></script>
    <script type="text/javascript" src="js_personalizar/ajax_personaliza.js"></script>
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/jquery.easing.min.js"></script>
    <script src="../js/jquery.dataTables.js"></script>
    <script src="../js/dataTables.bootstrap4.js"></script>
    <script src="../js/sb-admin.min.js"></script>
    <script src="../js/sb-admin-datatables.min.js"></script>

  <script type="text/javascript">
  var accion;
        
  function Editar(llave){
    accion = 'E';
    laveP = llave;

    $.ajax({
                url:'php_personalizar/editar_formulario.php',
                dataType: 'json',
                data:{clasificacion: laveP},
                type: 'post',
                success: function(data){
                    
                    //Recuperamos los valores de la consulta
                    idP = data["1"];
                    nombre = data["2"];
                    favicon = data["3"];
                    logo = data["4"]; 
                    color = data["5"];
                    color2 = data["6"];
                    ano = data["7"];
                    facebook= data["8"];
                    twitter = data["9"];
                    celular = data["10"];
                                     
                    
                    //Asugnamos los datos recuperados a las variables
                    document.frmPersonlizar.id.value= idP; 
                    document.frmPersonlizar.nombre.value= nombre;  
                    document.frmPersonlizar.logo.value= logo;
                    document.frmPersonlizar.favicon.value= favicon;
                    document.frmPersonlizar.color.value= color;
                    document.frmPersonlizar.color2.value = color2;
                    document.frmPersonlizar.ano.value = ano;
                    document.frmPersonlizar.face.value = facebook;
                    document.frmPersonlizar.twi.value = twitter;
                    document.frmPersonlizar.cel.value = celular;
                    document.frmPersonlizar.llave.value= laveP;
                    $('#personalizar').modal('show'); 
                    
                }
            })
 

  }
  
  
  </script>
  <script>
     $(function(){
        $("input[name='a_logo']").on("change", function(){
            var formData = new FormData($("#formulario")[0]);
            var ruta = "php_personalizar/imagen.php";
            document.getElementById('res_l').innerHTML = '<center>Cargando...</center>';
            $.ajax({
                url: ruta,
                data: formData,
                type: "POST",
                contentType: false,
                processData: false,
                success: function(datos)
                {
                    $("#res_l").html(datos);
                }
            });
        });
     });
  </script>
  <script>
    $(function(){
        $("input[name='a_favicon']").on("change", function(){
            var formData = new FormData($("#formulario")[0]);
            var ruta = "php_personalizar/imagen2.php";
            document.getElementById('res_f').innerHTML = '<center>Cargando...</center>';
            $.ajax({
                url: ruta,
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function(datos)
                {
                    $("#res_f").html(datos);
                }
            });
        });
     });
    </script>
        <script>
      $(document).ready(function(){
        $('#tabla_perso').DataTable({
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

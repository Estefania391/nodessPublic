<?php
	SESSION_START();
	require 'conexion.php';
	$usuario=$_POST['correo'];
	$contra = $_POST['contra'];
	
	$password= md5($contra);

	if(isset($usuario)){
			$con = Database::getInstance()->getDb();

			$usuarios = $con->prepare("SELECT id_admin, email, apellido_paterno, apellido_materno, nombre, rol FROM administracion WHERE email=?");
			$usuarios->bindParam(1, $usuario);
			$usuarios->execute();
			$counta = $usuarios->rowCount();
			$rowsa  = $usuarios->fetch(PDO::FETCH_ASSOC);
			if($counta > 0){
				$reafirma = $con->prepare("SELECT id_admin, email, apellido_paterno, apellido_materno, nombre, rol FROM administracion WHERE email=? AND contrasena=?");
				$reafirma->bindParam(1, $usuario);
				$reafirma->bindParam(2, $password);
				$reafirma->execute();
				$count = $reafirma->rowCount();
				$row  = $reafirma->fetch(PDO::FETCH_ASSOC);
				if($count > 0){
					$_SESSION['id_us'] = $row['id_admin'];
					$_SESSION['nivel_us'] = $row['rol'];
					$_SESSION['nombre_us'] = $row['nombre'];
					$_SESSION['apellidos_us'] = $row['apellido_paterno']." ".$row['apellido_materno'];
					$_SESSION['correo_us'] = $row['email'];
					echo "<script language='JavaScript'>location.href = \"alta_contenido/alta_contenido.php\"</script>";
				exit;
			}else{
				echo "<br><div class='alert alert-danger'>Contraseña Incorrecta.</div>";
			}
			$con = null;
		}else{
			echo "<br><div class='alert alert-danger'>El usuario no existe. Verifica tu correo.</div>";
		}
	}
?>

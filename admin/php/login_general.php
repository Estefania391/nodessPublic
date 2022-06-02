<?php
	SESSION_START();
	require 'conexion.php';
	$usuario=$_POST['correo'];
	$contra = $_POST['contra'];
	
	$password= md5($contra);

	if(isset($usuario)){
			$con = Database::getInstance()->getDb();

			$usuarios = $con->prepare("SELECT id_usuario, email, apellido_paterno, apellido_materno, nombre FROM usuarios WHERE email=?");
			$usuarios->bindParam(1, $usuario);
			$usuarios->execute();
			$counta = $usuarios->rowCount();
			$rowsa  = $usuarios->fetch(PDO::FETCH_ASSOC);
			if($counta > 0){
				$reafirma = $con->prepare("SELECT id_usuario, email, apellido_paterno, apellido_materno, nombre FROM usuarios WHERE email=? AND contrasena=?");
				$reafirma->bindParam(1, $usuario);
				$reafirma->bindParam(2, $password);
				$reafirma->execute();
				$count = $reafirma->rowCount();
				$row  = $reafirma->fetch(PDO::FETCH_ASSOC);
				if($count > 0){
					$_SESSION['id_general'] = $row['id_usuario'];
					$_SESSION['nombre_general'] = $row['nombre'];
					$_SESSION['apellidos_general'] = $row['apellido_paterno']." ".$row['apellido_materno'];
					$_SESSION['correo_general'] = $row['email'];
					echo "<script language='JavaScript'>location.href = \"index.php\"</script>";
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

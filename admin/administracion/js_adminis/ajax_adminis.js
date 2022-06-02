function objetoAjax(){
	var xmlhttp=false;
	try {
		xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
	} catch (e) {
		try {
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		} catch (E) {
			xmlhttp = false;
		}
	}
	if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
		xmlhttp = new XMLHttpRequest();
	}
	return xmlhttp;
}

function Registrar(idI ,accion){
  pass = document.frmAdmin.pass.value;
  pass_confi = document.frmAdmin.pass_confi.value;

 if (pass != pass_confi) {
    alert("Colabora las contraseñas, ya que no coinciden");
  }else{
     nombre = document.frmAdmin.nombre.value;
     ap_paterno = document.frmAdmin.ap_paterno.value;
     ap_materno = document.frmAdmin.ap_materno.value;
     correo = document.frmAdmin.correo.value;
     rol = document.frmAdmin.rol.value;

    ajax = objetoAjax();
    if(accion=='Nuevo'){
      ajax.open("POST", "php_adminis/registrar.php", true);
    }else if(accion=='Editar'){
      ajax.open("POST", "php_adminis/actualizar.php", true);
    }

ajax.onreadystatechange=function() {
    if (ajax.readyState==2) {
      alert("Felicidades tu registro se guardo!! :)");
      window.location.reload(true);  
         
    }
  }

    ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    ajax.send("id="+idI+"&nombre="+nombre+"&ap_paterno="+ap_paterno+"&ap_materno="+ap_materno+
      "&correo="+correo+"&pass="+pass+"&rol="+rol);
  }

}

function eliminar(Id){
var mensaje = confirm("¿Deseas eliminar el Administrador?");
if (mensaje) {
  ajax = objetoAjax();
  ajax.open("POST", "php_adminis/elimininar.php", true);
  ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
  ajax.send("id="+Id)
  alert("Administrador eliminado (~_~)");
  window.location.reload(true);
}else{
  alert("No se ha eliminado Nota (*.*)");
}   
}
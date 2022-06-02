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

function Registrar(idCat ,accion){
 nombre = document.frmCatego.nombre.value;
 descripcion = addslashes(CKEDITOR.instances.descripcion.getData());
 fondo = document.frmCatego.fondo.value;
 nombre_imagen1 = document.getElementById('res_fon').textContent;
 icono =  document.frmCatego.icono.value;
 nombre_imagen2 = document.getElementById('res_ic').textContent;


 ajax = objetoAjax();

 if(accion=='Nuevo'){
      ajax.open("POST", "php/registrar.php", true);
    }else if(accion=='Editar'){
      ajax.open("POST", "php/actualizar.php", true);
    }

    ajax.onreadystatechange=function() {
		if (ajax.readyState==2) {
      alert("Felicidades tu registro se guardo!! :)");
      window.location.reload(true);  
         
		}
	}

    ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    ajax.send("id="+idCat+"&nombre="+nombre+"&descripcion="+descripcion+"&fondo="+fondo+"&nombre_imagen1="+nombre_imagen1
      +"&icono="+icono+"&nombre_imagen2="+nombre_imagen2);

}

function eliminar(Id){
var mensaje = confirm("¿Deseas eliminar línea estratégica?");
if (mensaje) {
  ajax = objetoAjax();
  ajax.open("POST", "php/elimininar.php", true);
  ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
  ajax.send("id="+Id)
  alert("Proveedor eliminado (~_~)");
  window.location.reload(true);
}else{
  alert("No se ha eliminado línea estratégica (*.*)");
}   
}
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

function Registrar_carru(idC, accion){
  titulo = document.frmCarusel.titulo.value;
  subtitulo = document.frmCarusel.subtitulo.value;
  descripcion = addslashes(CKEDITOR.instances.descripcion.getData());
  mostrarBtn = document.frmCarusel.mostrarBtn.value;
  nombreBtn = document.frmCarusel.nombreBtn.value;
  urlBtn = document.frmCarusel.urlBtn.value;
  carusel = document.frmCarusel.carusel.value;
  nombre_imagen1 = document.getElementById('res_c').textContent;

  ajax = objetoAjax();
  if(accion=='Nuevo'){
    ajax.open("POST", "php_carusel/registrar_carrusel.php", true);
  }else if(accion=='Editar'){
    ajax.open("POST", "php_carusel/actualizar_carrusel.php", true);
  }

ajax.onreadystatechange=function() {
    if (ajax.readyState==2) {
      alert("Felicidades tu registro se guardo!! :)");
      window.location.reload(true);  
         
    }
  }

    ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    ajax.send("id="+idC+"&titulo="+titulo+"&subtitulo="+subtitulo+"&descripcion="+descripcion+
      "&mostrarBtn="+mostrarBtn+"&nombreBtn="+nombreBtn+"&urlBtn="+urlBtn+"&carusel="+carusel+
      "&nombre_imagen1="+nombre_imagen1);

}

function eliminar(Id){

var mensaje = confirm("¿Deseas eliminar el carusel?");
if (mensaje) {
  ajax = objetoAjax();
  ajax.open("POST", "php_carusel/elimininar_carrusel.php", true);
  ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
  ajax.send("id="+Id)
  alert("Carusel eliminado (~_~)");
  window.location.reload(true);
}else{
  alert("No se ha eliminado carusel");
}   
}
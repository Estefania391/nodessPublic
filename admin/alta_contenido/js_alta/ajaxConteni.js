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

function Registrar(idN ,accion){
  idU = document.frmContenido.id.value;
  titulo = document.frmContenido.titulo.value;
  subtitulo = document.frmContenido.subtitulo.value;
  descripcion = addslashes(CKEDITOR.instances.descripcion.getData());
  categoria = document.frmContenido.catego.value;
  fecha_inicio = document.frmContenido.fecha_inicio.value;
  fecha_fin = document.frmContenido.fecha_fin.value;
  urlVideo = document.frmContenido.urlVideo.value;
  redesSociales = document.frmContenido.redesSociales.value;

  ima1 = document.frmContenido.ima1.value;
  imagen1 = document.getElementById('res_ima1').textContent;

  ima2 = document.frmContenido.ima2.value;
  imagen2 = document.getElementById('res_ima2').textContent;

  ima3 = document.frmContenido.ima3.value;
  imagen3 = document.getElementById('res_ima3').textContent;

  ima4 = document.frmContenido.ima4.value;
  imagen4 = document.getElementById('res_ima4').textContent;

  ima5 = document.frmContenido.ima5.value;
  imagen5 = document.getElementById('res_ima5').textContent;

  ajax = objetoAjax();
    if(accion=='Nuevo'){
      ajax.open("POST", "php_alta/registrar_alta.php", true);
    }else if(accion=='Editar'){
      ajax.open("POST", "php_alta/actualizar_alta.php", true);
    }

    ajax.onreadystatechange=function() {
		if (ajax.readyState==2) {
      alert("Felicidades tu registro se guardo!! :)");
      window.location.reload(true);  
         
		}
	}

    ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    ajax.send("id="+idN+"idU="+idU+"&titulo="+titulo+"&subtitulo="+subtitulo+"&descripcion="+descripcion+"&catego="+categoria
      +"&fecha_inicio="+fecha_inicio+"&fecha_fin="+fecha_fin+"&urlVideo="+urlVideo+"&redesSociales="+redesSociales+
      "&imagen1="+imagen1+"&ima1="+ima1+"&imagen2="+imagen2+"&ima2="+ima2+"&imagen3="+imagen3+"&ima3="+ima3+
      "&imagen4="+imagen4+"&ima4="+ima4+"&imagen5="+imagen5+"&ima5="+ima5);

}

function eliminar(Id){
var mensaje = confirm("¿Deseas eliminar la nota?");
if (mensaje) {
  ajax = objetoAjax();
  ajax.open("POST", "php_alta/elimininar.php", true);
  ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
  ajax.send("id="+Id)
  alert("Funko eliminada (~_~)");
  window.location.reload(true);
}else{
  alert("No se ha eliminado nota (*.*)");
}   
}
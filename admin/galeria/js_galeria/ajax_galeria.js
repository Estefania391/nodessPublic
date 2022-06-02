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

function Registrar(idG, accion){
  catego = document.frmGaleri.catego.value;
  galeria = document.frmGaleri.galeria.value;
  nombre_imagen1 = document.getElementById('res_g').textContent;

  ajax = objetoAjax();
  if(accion=='Nuevo'){
    ajax.open("POST", "php_galeria/registrar_galeria.php", true);
  }else if(accion=='Editar'){
    ajax.open("POST", "php_galeria/actualizar_galeria.php", true);
  }

ajax.onreadystatechange=function() {
    if (ajax.readyState==2) {
      alert("Felicidades tu registro se guardo!! :)");
      window.location.reload(true);  
         
    }
  }

    ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
    ajax.send("id="+idG+"&catego="+catego+"&galeria="+galeria+"&nombre_imagen1="+nombre_imagen1);

}

function eliminar(Id){

var mensaje = confirm("¿Deseas eliminar el foto?");
if (mensaje) {
  ajax = objetoAjax();
  ajax.open("POST", "php_carusel/elimininar_galeria.php", true);
  ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
  ajax.send("id="+Id)
  alert("Foto eliminado (~_~)");
  window.location.reload(true);
}else{
  alert("No se ha eliminado foto");
}   
}
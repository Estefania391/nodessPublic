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

function Registrar(idN ,accion, usu){
num_alta = document.frmSum.num_alta.value;
precio_unidad = document.frmSum.precio_unidad.value;
id_proveedor = document.frmSum.proveedor.value;
id_admin = document.frmSum.admin.value;
fm = document.frmSum.fm.value;

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
    ajax.send("id="+idN+"&num_alta="+num_alta+"&precio_unidad="+precio_unidad+"&id_proveedor="+id_proveedor+"&id_admin="+id_admin
      +"&fm="+fm+"&usu="+usu);

}

function eliminar(Id){
var mensaje = confirm("¿Deseas eliminar el suministro?");
if (mensaje) {
  ajax = objetoAjax();
  ajax.open("POST", "php/elimininar.php", true);
  ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
  ajax.send("id="+Id)
  alert("suministro eliminada (~_~)");
  window.location.reload(true);
}else{
  alert("No se ha eliminado suministro (*.*)");
}   
}
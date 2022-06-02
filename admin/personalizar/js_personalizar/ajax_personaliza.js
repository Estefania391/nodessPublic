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

function Registrar(accion){
    id = document.frmPersonlizar.id.value;
    nombre = document.frmPersonlizar.nombre.value;
    logo = document.frmPersonlizar.logo.value;
    favicon = document.frmPersonlizar.favicon.value;
    color = document.frmPersonlizar.color.value;
    color2 = document.frmPersonlizar.color2.value;
    ano = document.frmPersonlizar.ano.value;
    facebook = document.frmPersonlizar.face.value;
    twitter = document.frmPersonlizar.twi.value;
    celular = document.frmPersonlizar.cel.value;
    llave = document.frmPersonlizar.llave.value;	
    nombre_imagen1 = document.getElementById('res_l').textContent;	
    nombre_imagen2 = document.getElementById('res_f').textContent;
         
    ajax = objetoAjax();
    if(accion=='E'){
        ajax.open("POST", "php_personalizar/actualizar_perzonalizacion.php", true);
    }


    ajax.onreadystatechange=function() {
      if (ajax.readyState==2) {
        alert("Felicidades tu registro se guardo!! :)");
        window.location.reload(true);   
      }
    }

ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
ajax.send("id="+id+"&nombre="+nombre+"&logo="+logo+"&favicon="+favicon+"&color="+color+
	"&color2="+color2+"&ano="+ano+"&facebook="+facebook+"&twitter="+twitter+"&celular="+celular+
	"&nombre_imagen1="+nombre_imagen1+
	"&nombre_imagen2="+nombre_imagen2);

}




window.onload = iniciar;
function iniciar(){
    //programa principal
    escuchar();
    capturarMensaje();
}

function escuchar(){
    document.getElementById("volver").addEventListener("click", volver);
}
function capturarMensaje(){
    //fase1 capturamos todos los campos del search de la url
    let mensaje =  window.location.search;
    //fase2 creamos un objeto que recoge cada campo de la url
    let urlParams = new URLSearchParams(mensaje);
    //Menase tiene todos los campos de la url, el nuestro: mensaje.
    //http://localhost/pooBBDD2022/webs/carreras/menuCarreras.html?mensaje=100
    mensaje = urlParams.get('mensaje');
    
    /** trabajando con los mensajes... */
    if(mensaje == "100"){
        verOcultar("Profesor dado de alta");
    }else if(mensaje == "101"){
        verOcultar("Profesor no dado de alta, verifique.");
    }else if(mensaje == "200"){
        verOcultar("Profesor dado de baja");
    }else if(mensaje == "201"){
        verOcultar("Profesor no dado de baja, verifique.");
    }else if(mensaje == "202"){
        verOcultar("Profesor no dado de baja, a petición del usuario.");
    }else if(mensaje == "300"){
        verOcultar("Regresa de consulta de Profesors.");
    }else if(mensaje == "400"){
        verOcultar("Profesor modificada con éxito.");
    }else if(mensaje == "401"){
        verOcultar("Profesor modificada sin éxito.");
    }else if(mensaje == "402"){
        verOcultar("Error en la zona de modificacion.");
    }else if(mensaje == "403"){
        verOcultar("No se ha podido modificar");
    }else if(mensaje == "500"){
        verOcultar("Usuario dado de alta con éxito.");
    }else if(mensaje == "501"){
        verOcultar("Usuario no dado de alta con éxito, verifique.");
    }
}
function verOcultar($mensaje){
let panel = document.getElementById("panelInformativo")
    panel.innerHTML = $mensaje;
    panel.style.display = "block";
    setTimeout(function(){
        panel.style.display = "none";
    }, 5000);
}    
function volver(){
    <a href="../webs/menuCarreras.html"></a>
}
window.onload = iniciar
function iniciar(){
    escucha()
}
function escucha(){
    let tInputs = document.querySelectorAll("input")
    for(let i = 0; i < tInputs.length - 2; i++){
        tInputs[i].addEventListener("blur", validar)
    }
}
function validar(e){
    //tengo que ver si estoy en nombre o en duracion
    let campo = e.target.id;
    switch(campo){
        case "nombre_alu":
            if(!e.target.checkValidity()){
                verError(`El campo ${campo} no cumple los parametros`);
                e.target.focus()
            }
            break
        case "apellido1_alu":
            if(!e.target.checkValidity()){
                verError("El campo " + campo + " no cumple los parametros");
                e.target.focus()
            }
            break
        case "apellido2_alu":
                if(!e.target.checkValidity()){
                    verError("El campo " + campo + " no cumple los parametros");
                    e.target.focus()
                }
            break
        case "edad_alu":
            if(!e.target.checkValidity()){
                verError("El campo " + campo + " no cumple los parametros");
                e.target.focus()
            }
            break
        case "genero_alu":
            if(!e.target.checkValidity()){
                verError("El campo " + campo + " no cumple los parametros");
                e.target.focus()
            }
            break
        case "id_carrera1":
            if(!e.target.checkValidity()){
                verError("El campo " + campo + " no cumple los parametros");
                e.target.focus()
            }
            break
                
    }
}
function verError(mensaje){
    let panel = document.getElementById("panelInformativo");
    panel.innerHTML = mensaje;
    panel.style.display = "block";
    setTimeout(function(){
        panel.style.display = "none"
    }, 5000)
}


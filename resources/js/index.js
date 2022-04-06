function comprobarUnicaForma(){
    var esUnicaForma = document.querySelector("unicaForma");
    var forma = document.querySelector("nombreForma");

    if(esUnicaForma == false){
        forma.setAttribute("disabled", "");
    } else {
        forma.removeAttribute("disabled");
    }
}

function prueba(){
    document.querySelector('nombre_jap').innerHTML = Date()
}

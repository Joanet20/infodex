function comprobarUnicaForma(){
    var esUnicaForma = document.querySelector("#unicaForma");
    var forma = document.querySelector("#nombreForma");

    if(esUnicaForma.checked == false){
        forma.setAttribute("disabled", "");
        forma.value = "";
    } else {
        forma.removeAttribute("disabled");
    }
}

function tieneGenero(){
    var noGen = document.querySelector("#sinGenero");
    var male = document.querySelector("#probMacho");
    var female = document.querySelector("#probHembra");

    if(noGen.checked == true){
        male.setAttribute("disabled", "");
        male.value = "";
        female.setAttribute("disabled", "");
        female.value = "";
    } else {
        male.removeAttribute("disabled");
        female.removeAttribute("disabled");
    }
}

function prueba(){
    document.querySelector('#nombre_jap').innerHTML = Date()
}

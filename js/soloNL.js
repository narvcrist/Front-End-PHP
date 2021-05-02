function solonumeros(e) {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    numeros = "0123456789";
    especiales = [8, 37, 39, 46];

    tecla_especial = false
    for(var i in especiales) {
        if(key == especiales[i]) {
            tecla_especial = true;
            break;
        }
    }
    if(numeros.indexOf(tecla) == -1 && !tecla_especial)
        return false;
}
function soloLetras(e){
       key = e.keyCode || e.which;
       tecla = String.fromCharCode(key).toLowerCase();
       letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
       especiales = "8-37-39-46";

       tecla_especial = false
       for(var i in especiales){
            if(key == especiales[i]){
                tecla_especial = true;
                break;
            }
        }
        if(letras.indexOf(tecla)==-1 && !tecla_especial){
            return false;
        }
    }

function limpiarFormulario() { //Funcion para limpiar input
    document.getElementById("miForm").reset();
  }
  //function aMayusculas(obj,id){ //Funcion para convertir minusculas a mayusculas automaticamente
  //  obj = obj.toUpperCase();
  //  document.getElementById(id).value = obj;
//}
function validar(e) { //Funcion para evitar espacios
  tecla = (document.all) ? e.keyCode : e.which;
  return tecla!=32;
}
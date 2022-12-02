var temporizador = ""
// Cuando el documento esté preparado
$(document).ready(function(){
    // En el caso de que pulse una tecla
    $("input").keypress(function(e){
        // Si la tecla pulsada es enter
        if(e.which == 13){
            // El mensaje es lo que valga el campo input
            var mensaje = $(this).val();
            // Lanzo el mensaje por consola para comprobar que funciona
            console.log("el mensaje que vas a enviar es: "+mensaje)
            // Envio el mensaje por AJAX
            $("#miajax").load("php/enviamimensaje.php?mensaje="+encodeURI(mensaje))
            // Vacío el campo para el siguiente mensaje
            $("input").val("")
        }
    })
    // Llamo por primera vez al bucle
    temporizador = setTimeout("bucle()",1000)
})

function bucle(){
    // Lanzo un mensaje por consola
    console.log("estas en bucle")
    // Me conecto por ajax y recupero mensajes
    $("section").load("php/recuperamensajes.php")
    // Lanzo el scroll abajo del todo
    $("section").scrollTop(1000000000000000)
    // Paro el temporizador
    clearTimeout(temporizador)
    // Dentro de un segundo lo vuelvo a ejecutar
    temporizador = setTimeout("bucle()",1000)
}
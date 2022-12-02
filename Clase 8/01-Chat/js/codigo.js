$(document).ready(function(){
    $("input").keypress(function(e){
        if(e.which == 13){
            var mensaje = $(this).val();
            console.log("el mensaje que vas a enviar es: "+mensaje)
        }
    })
})
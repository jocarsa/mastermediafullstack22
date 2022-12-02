<?php
    
    $datos = '{"manzanas":34,"peras":54,"platanos":234,"kiwis":32}';

    //echo $datos;
    $json = json_decode($datos);
    //var_dump($json);
    foreach ($json as $key => $value) {
        //echo $key." : ".$value."<br>";
    }

    $radiocompleto = 360;
    $sumadelosnumeros = 0;
    //for($i = 0;$i<count($datos);$i++){$sumadelosnumeros+=$datos[$i];}
    foreach ($json as $clave => $valor) {
        $sumadelosnumeros+=$valor;
    }
    //echo $sumadelosnumeros;
    $imagen = imageCreateTrueColor(600,400);
    $rojo = imagecolorallocate($imagen, 255, 0, 0);
    $blanco = imagecolorallocate($imagen, 255, 255, 255);
    imagefill($imagen,0,0,$blanco);
    $anguloinicio = 0;
    $yinicio = 20;
    

    


    //for($i = 0;$i<count($datos);$i++){
    foreach ($json as $clave => $valor) {
        // Primero la imagen en la que escribimos $imagen
        // El centro en x que es 200
        // El centro en Y que es 200
        // El diametro en X del circulo 300
        // El diametro en Y del circulo 300
        // Angulo desde el que empiezo a barrer 0
        // Angulo hasta el que barrer 180
        // Color $rojo
        // Estilo en funcion de las opciones que me da la documentacion
        $rojo = rand(0,255);
        $verde = rand(0,255);
        $azul = rand(0,255);
        imagefilledarc(
            $imagen, 
            200, 
            200, 
            300, 
            300, 
            $anguloinicio , 
            $anguloinicio+($radiocompleto/$sumadelosnumeros)*$valor, 
            imagecolorallocate($imagen, $rojo, $verde, $azul),
            IMG_ARC_PIE
        );
        imagefilledrectangle(
            $imagen, 
            400, 
            $yinicio, 
            400+10, 
            $yinicio+10, 
            imagecolorallocate($imagen, $rojo, $verde, $azul)
        );
        $font = "BebasNeue-Regular.TTF";
        imagestring(
            $imagen, 
            2,  
            420, 
            $yinicio, 
            $clave.": ".$valor,
            imagecolorallocate($imagen, 0,0,0)  
        );
        $yinicio += 20;
        $anguloinicio += ($radiocompleto/$sumadelosnumeros)*$valor;
    }
    imagefilledellipse($imagen, 200, 200, 100, 100, $blanco);
    header('Content-Type: image/jpeg');
    imagejpeg($imagen);
    imagedestroy($imagen);
   
?>
<?php

    if(isset($_POST['nombre'])){
        $xml = '<?xml version="1.0" encoding="UTF-8"?>
            <persona>
                <datospersonales>
                    <dato id="nombre">'.$_POST['nombre'].'</dato>
                    <dato id="apellidos">'.$_POST['apellidos'].'</dato>
                </datospersonales>
                <cursos>
                    <mastermedia>
                        <curso class="mastermedia">'.$_POST['curso1'].'</curso>
                        <curso class="mastermedia">'.$_POST['curso2'].'</curso>
                    </mastermedia>
                </cursos>
            </persona>
        ';
        $miarchivo = fopen($_POST['nombre'].".xml", "w");
        fwrite($miarchivo, $xml);
        fclose($miarchivo);
    }

?>

<form action="?" method="POST">
    <input type="text" name="nombre" placeholder="dime tu nombre">
    <input type="text" name="apellidos" placeholder="dime tus apellidos">
    <input type="text" name="curso1" placeholder="dime tu curso 1">
    <input type="text" name="curso2" placeholder="dime tu curso2">
    <input type="submit">
</form>
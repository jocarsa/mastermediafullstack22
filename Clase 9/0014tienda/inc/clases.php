<?php
    class Producto{
        public function __construct($id, $unidades) {
            // Propiedades que solo se ven dentro de la clase
            $this->id = $id;
            $this->cantidad = $unidades;
            // Propiedades que vienen desde fuera y pueden volver fuera
        }
    }

?>
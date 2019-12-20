<?php
    class ControladorError extends PlantillaControlador{
        function __construct(){
            parent::__construct();
            $this->PlantillaVista->LlamarVista('Error/index');
        }
    }
?>
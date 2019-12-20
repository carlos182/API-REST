<?php
class PlantillaControlador{
    function __construct(){
        $this->PlantillaVista = new PlantillaVista();
    }
    function CrearModelo($modelo){
        $url = 'Modelos/'.$modelo.'Modelo.php';

        if (file_exists($url)){

            require_once $url;

            $NombreModelo = $modelo.'Modelo';
            $this->modelo = new $NombreModelo();
        }
    }
}
?>
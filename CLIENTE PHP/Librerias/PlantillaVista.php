<?php
class PlantillaVista{
    function __construct(){
    }
    function LlamarVista($nombre){
        require 'Vistas/' . $nombre . '.php';
    }
}
?>
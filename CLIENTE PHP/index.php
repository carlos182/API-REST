<?php
//Se instancia el archivo que tiene las configuraciones de la base de datos
require_once 'Librerias/BaseDeDatos.php';
//Se llama a las plantillas que se usaran
require_once 'Librerias/PlantillaControlador.php';
require_once 'Librerias/PlantillaModelo.php';
require_once 'Librerias/PlantillaVista.php';
//Se llama al archivo que tiene la configuracion del enrutamiento a los distintos controladores que se creen
require_once 'Librerias/ArchivoEnrutamiento.php';

//Se instancia el archivo de las constantes que se llamaran
require_once 'Configuracion/config.php';
//Instanciamos una clase del tipo enrutador
$Enrutador = new Enrutador();
?>
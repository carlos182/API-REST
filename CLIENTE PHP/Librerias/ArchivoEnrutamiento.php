<?php
require_once 'Controladores/Error.php';
class Enrutador {
    function __construct() {
        //esta clase recupera la direccion URL igresada y la divide en controlador/funcion/parametro


        //1.- Se verifica si se ha ingresado una URL, en caso se a verdadero se recupera la URL ingresada, en caso sea falso se le asigna el valor null
        $url = isset($_GET['url']) ? $_GET['url']: null;
        //2.- Se elimina los caracteres '/' de mas
        $url = rtrim($url, '/');
        //3.- se almacena las partes de la URL dentro de un array
        $url = explode('/',$url);

        //Verificamos si no existe URL ingresada, en caso sea verdadero, redicreecionamos a nuestra pagina de inicio que es Formulario.php
        if(empty($url[0])){
            $urlControlador = 'Controladores/Formulario.php';
            require_once $urlControlador;
            $Controlador = new Formulario();
            $Controlador->CrearModelo('Formulario');
            $Controlador->CrearVista();
            return false;
        }

        //4.- creamos la nueva url, llamando al controlador por su nombre
        $urlControlador = 'Controladores/' . $url[0] . '.php';

        //5.- verificamos que exista el archivo que contiene e controlador, segun el nombre ingresado en la URL
        if (file_exists($urlControlador)){
            //En caso exista el controlador, se lo llama
            require_once $urlControlador;
            $Controlador = new $url[0];
            $Controlador->CrearModelo($url[0]);

            $nparam = sizeof($url);
            if ($nparam > 1){
                if($nparam > 2){
                    $param = [];
                    for ($i = 2; $i<$nparam; $i++){
                        array_push($param, $url[$i]);
                    }
                    $Controlador->{$url[1]}($param);

                }
                else{
                        $Controlador->{$url[1]}();
                }
            }
            else{
                $Controlador->CrearVista();
            }
        }
        //En caso no se encuentre el controlador ingresado en eña URL, se llama a una pagina de error
        else {
            $Controlador = new ControladorError();
        }
    }
}
?>
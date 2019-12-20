<?php
    class Formulario extends PlantillaControlador{
        function __construct(){
            parent::__construct();
            $this->PlantillaVista->mensaje = "";
            //$this->PlantillaVista->LlamarVista('Formulario/index');
        }

        function CrearVista(){
            $this->PlantillaVista->LlamarVista('Formulario/index');
        }
        function RegistrarError(){
            $Id = 1;
            $CodigoError = $_POST['ddlCodigoError'];

            $date_array = getdate();             
            $formated_date  = "";
            $formated_date .= $date_array['mday'] . "/";
            $formated_date .= $date_array['mon'] . "/";
            $formated_date .= $date_array['year'];

            $FechaRegistro = $formated_date;
            $Usuario = $_POST['txtUsuario'];
            $Comentario = $_POST['txtComentario'];

            $mensaje = "";
            
            if($this->modelo->Insertar(['Id' => $Id,'CodigoError' => $CodigoError, 'FechaRegistro' => $FechaRegistro, 'Usuario' => $Usuario, 'Comentario' => $Comentario])){
                $mensaje = "Nuevo registro Insertado";
            }else{
                $mensaje = "Error al guardar el registro";
            }
            $this->PlantillaVista->mensaje = $mensaje;
            $this->CrearVista();
        }
    }
?>
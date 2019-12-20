<?php

class FormularioModelo extends PlantillaModelo{

    public function __construct(){
        parent::__construct();
    }
    public function LlamarAPIRest($method, $url, $data = false)
    {
        $curl = curl_init();

        switch ($method)
        {
            case "POST":
                curl_setopt($curl, CURLOPT_POST, 1);
                if ($data)
                    
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                    //curl_setopt($curl, CURLOPT_HTTPHEADER, array('Accept: application/json'));
                    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
                break;
            default:
                if ($data)
                    $url = sprintf("%s?%s", $url, http_build_query($data));
        }

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

        $result = curl_exec($curl);

        curl_close($curl);

        return $result;
    }

    public function Insertar($Datos){
        try{
            //$query = $this->db->conexion()->prepare('INSERT INTO errores (CodigoError, FechaRegistro, Usuario, Comentario) VALUES (:CodigoError, :FechaRegistro, :Usuario, :Comentario)');
            //$query->execute(['CodigoError' => $Datos['CodigoError'], 'FechaRegistro' => $Datos['FechaRegistro'], 'Usuario' => $Datos['Usuario'], 'Comentario' => $Datos['Comentario']]);
            $items = json_decode($this->LlamarAPIRest("POST","http://carlosmontenegro.azurewebsites.net/error/",json_encode($Datos)));
            //echo(json_encode($Datos));
            //echo($items);
            return true;
        }catch(PDOException $e){
            return false;
        }

    }
}
?>
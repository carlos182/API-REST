<?php

include_once 'Modelos/EntidadError.php';
class ConsultaModelo extends PlantillaModelo{

    public function __construct(){
        parent::__construct();
    }
    
/*Funcion para llamar al servico web API REST*/ 
public function LlamarAPIRest($method, $url, $data = false)
    {
        $curl = curl_init();

        switch ($method)
        {
            case "PUT":
                curl_setopt($curl, CURLOPT_PUT, 1);
                if ($data)
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                //curl_setopt($curl, CURLOPT_HTTPHEADER, array('Accept: application/json'));
                curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
                break;
            case "GET":
                curl_setopt($curl, CURLOPT_HTTPGET, 1);
            break;
            case "DELETE":
                curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
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

    public function Recuperar(){
        $items = [];
        try{
            
            /*
            $query = $this->db->conexion()->query("SELECT*FROM errores");

            while($row = $query->fetch()){
                $item = new EntidadError();
                $item->id = $row['Id'];
                $item->CodigoError = $row['CodigoError'];
                $item->FechaRegistro = $row['FechaRegistro'];
                $item->Usuario = $row['Usuario'];
                $item->Comentario = $row['Comentario'];

                array_push($items, $item);
            }
            */

            $items = json_decode($this->LlamarAPIRest("GET","http://carlosmontenegro.azurewebsites.net/error"));

            return $items;
        }catch(PDOException $e){
            return [];
        }
    }

    public function RecuperarId($_id){
        $item = new EntidadError();
        $array = [];
        $contador = 0;

        /*
        $query = $this->db->conexion()->prepare("SELECT*FROM errores WHERE Id = :id");
        */
        try{

            $Errores = json_decode($this->LlamarAPIRest("GET","http://carlosmontenegro.azurewebsites.net/error/" . $_id));

            foreach($Errores as $row)
            {   
                $array[$contador] = $row;
                $contador++; 
            }

            $item->_id = $array[0];
            $item->Id = $array[1];
            $item->CodigoError = $array[2];
            $item->FechaRegistro = $array[3];
            $item->Usuario = $array[4];
            $item->Comentario = $array[5];
  
            return $item;

        }catch(PDOException $e){
            return null;
        }
    }
    public function Actualizar($DatoS){
        //$query = $this->db->conexion()->prepare("UPDATE errores SET CodigoError = :CodigoError, FechaRegistro = :FechaRegistro, Usuario = :Usuario, Comentario = :Comentario WHERE -id = :_id");
        try{
            $items = json_decode($this->LlamarAPIRest("PUT","http://carlosmontenegro.azurewebsites.net/error/" . $Dato->_id,json_encode($Datos)));
            //$query->execute([
                //'_id' => $item['_id'],
                //'CodigoError' => $item['CodigoError'],
                //'FechaRegistro' => $item['FechaRegistro'],
                //'Usuario' => $item['Usuario'],
                //'Comentario' => $item['Comentario']
            //]);
            return true;

        }catch(PDOException $e){
            return false;
        }
    }
    
    public function Eliminar($_id){
        //$query = $this->db->conexion()->prepare("DELETE FROM errores WHERE _id=:_id");
        try{
            //$query->execute([
            //    '_id' => $_id,
            //]);
            $Errores = json_decode($this->LlamarAPIRest("DELETE","http://carlosmontenegro.azurewebsites.net/error/" . $_id));
            return true;

        }catch(PDOException $e){
            return false;
        }
    }
}
?>
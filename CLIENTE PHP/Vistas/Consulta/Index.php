<html>
<head>
</head>
<body>
<h1>MENU</h1>
    <ol>
        <li><a href="<?php echo constant('URL') . '/Consulta' ?>">Consulta</a></li>
        <li><a href="<?php echo constant('URL') . '/Formulario' ?>">Formulario</a></li>
    </ol>
    <h1>2.- SECCION CONSULTAS</h1>
    <div>
        <table width="60%">
            <thead>
                <tr>
                    <th>_id</th>
                    <th>ID</th>
                    <th>CODIGO ERROR</th>
                    <th>FECHA REGISTRO</th>
                    <th>USUARIO</th>
                    <th>COMENTARIO</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                    <?php
                        include_once 'Modelos/EntidadError.php';
                        foreach($this->Errores as $row){
                            $entidaderror = new EntidadError();
                            $entidaderror = $row;
                    ?>
                <tr>
                    <td><?php echo $entidaderror->_id?></td>
                    <td><?php echo $entidaderror->Id?></td>
                    <td><?php echo $entidaderror->CodigoError?></td>
                    <td><?php echo $entidaderror->FechaRegistro?></td>
                    <td><?php echo $entidaderror->Usuario?></td>
                    <td><?php echo $entidaderror->Comentario?></td>
                    <td><a href="<?php echo constant('URL') . '/Consulta/VerRegistro/' . $entidaderror->_id;?>">ACTUALIZAR</a></td>
                    <td><a href="<?php echo constant('URL') . '/Consulta/EliminarRegistro/' . $entidaderror->_id;?>">ELIMINAR</a></td>
                </tr>
                        <?php } ?>
            </tbody>
        </table>
    </div>
</body>
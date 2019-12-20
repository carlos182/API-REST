<html>
<head>
</head>
<body>
    <h1>MENU</h1>
    <ol>
        <li><a href="<?php echo constant('URL') . '/Consulta' ?>">Consulta</a></li>
        <li><a href="<?php echo constant('URL') . '/Formulario' ?>">Formulario</a></li>
    </ol>
    <h1>2.1.- DETALLE DE REGISTRO</h1>
    <div><?php echo $this->mensaje;?></div>
    <form action="<?php echo constant('URL') . '/Consulta/ActualizarRegistro'?>" method="POST">
        <label>_id: </label>
        <label><?php echo $this->EntidadError->_id;?></label><br>
        <label>ID: </label>
        <label><?php echo $this->EntidadError->Id;?></label><br>
        <label>CODIGO ERROR</label>
        <select name="ddlCodigoError">
            <option value="100" <?php if($this->EntidadError->CodigoError == 100){echo 'selected';}?>>Error 100</option> 
            <option value="200" <?php if($this->EntidadError->CodigoError == 200){echo 'selected';}?>>Error 200</option>
            <option value="300" <?php if($this->EntidadError->CodigoError == 300){echo 'selected';}?>>Error 300</option>
            <option value="400" <?php if($this->EntidadError->CodigoError == 400){echo 'selected';}?>>Error 400</option>
            <option value="500" <?php if($this->EntidadError->CodigoError == 500){echo 'selected';}?>>Error 500</option>
        </select><br>
        <label>USUARIO</label>
        <input type="text" name="txtUsuario" value="<?php echo $this->EntidadError->Usuario;?>"><br>
        <label>COMENTARIO</label>
        <input type="text" name="txtComentario" value="<?php echo $this->EntidadError->Comentario;?>"><br>
        <input type="submit" value="Actualizar Registro"><br>
    </form>
</body>
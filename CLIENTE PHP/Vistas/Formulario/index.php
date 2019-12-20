<html>
<head>
</head>
<body>
<h1>MENU</h1>
    <ol>
        <li><a href="<?php echo constant('URL') . '/Consulta' ?>">Consulta</a></li>
        <li><a href="<?php echo constant('URL') . '/Formulario' ?>">Formulario</a></li>
    </ol>
    <h1>1.- SECCION FORMULARIO</h1>
    <div><?php echo $this->mensaje;?></div>
    <form action="<?php echo constant('URL');?>/Formulario/RegistrarError" method="POST">
        <label>CODIGO ERROR</label>
        <select name="ddlCodigoError">
            <option value="100">Mensaje 100</option> 
            <option value="200">Mensaje 200</option>
            <option value="300">Mensaje 300</option>
            <option value="400">Mensaje 400</option>
            <option value="500">Mensaje 500</option>
        </select><br>
        <label>USUARIO</label>
        <input type="text" name="txtUsuario"><br>
        <label>COMENTARIO</label>
        <input type="text" name="txtComentario"><br>
        <input type="submit" value="Registrar Nuevo"><br>
    </form>
</body>
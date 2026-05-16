<?php
require_once "conex.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Paciente</title>
       <link rel="stylesheet" href="/src/main.css">
</head>
<body>
    <h2>Editar Paciente</h2>
    <form action="editar.php" method="post">
        <input type="hidden" name="id" value="<?php echo $fila['ID_Paciente']; ?>">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="<?php echo $fila['Nombre']; ?>"><br><br>
        <label for="apellido">Apellido:</label>
        <input type="text" id="apellido" name="apellido" value="<?php echo $fila['Apellido']; ?>"><br><br>
        <label for="cedula">Cedula:</label>
        <input type="text" id="cedula" name="cedula" value="<?php echo $fila['Cedula']; ?>"><br><br>
        <label for="sexo">Sexo:</label>
        <input type="text" id="sexo" name="sexo" value="<?php echo $fila['Sexo']; ?>"><br><br>
        <label for="correo">Correo:</label>
        <input type="email" id="correo" name="correo" value="<?php echo $fila['Correo']; ?>"><br><br>
        <label for="telefono">Telefono:</label>
        <input type="text" id="telefono" name="telefono" value="<?php echo $fila['Telefono']; ?>"><br><br>
        <label for="direccion">Direccion:</label>
        <input type="text" id="direccion" name="direccion" value="<?php echo $fila['Direccion']; ?>"><br><br>
        <label for="ciudad">Ciudad:</label>
        <input type="text" id="ciudad" name="ciudad" value="<?php echo $fila['Ciudad']; ?>"><br><br>
        <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
        <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" value="<?php echo $fila['Fecha_nacimiento']; ?>"><br><br>
        <input type="submit" value="Actualizar">

        <input value="editar" class=>
</body>
</html>
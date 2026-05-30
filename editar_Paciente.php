<?php
require_once "conex.php";

// validar que realmente exista un Id en la url
if (isset($_GET['ID_Paciente']) && !empty($_GET['ID_Paciente'])) {
    $ID_Paciente = $_GET['ID_Paciente'];
    
    // 3. consulta segura para traer solo a ese paciente (usando prepared statements)
    // cambia pacientes por el nombre exacto de tu <div
       
    $stmt = $conn->prepare("SELECT * FROM paciente WHERE ID_Paciente = ?");
    $stmt->bind_param("i", $ID_Paciente);
    $stmt->execute();
    $resultado = $stmt->get_result();

    // 4. verificar si el paciente existe
    if ($resultado->num_rows > 0) {
        $paciente= $resultado->fetch_assoc();
    } else {
        echo " <p class='text-red-500'>Paciente no encontrado.</p>";
        exit;
    }
} else {
    echo " <p class='text-red-500'>Acceso no valido. No se especifico un ID.</p>";
    exit;
}
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
    <form action="actualizar_paciente.php" method="post">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($paciente['ID_Paciente']); ?>">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="<?php echo htmlspecialchars($paciente['Nombre']); ?>"><br><br>
        <label for="apellido">Apellido:</label>
        <input type="text" id="apellido" name="apellido" value="<?php echo htmlspecialchars($paciente['Apellido']); ?>"><br><br>
        <label for="cedula">Cedula:</label>
        <input type="text" id="cedula" name="cedula" value="<?php echo htmlspecialchars($paciente['Cedula']); ?>"><br><br>
        <label for="sexo">Sexo:</label>
        <input type="text" id="sexo" name="sexo" value="<?php echo htmlspecialchars($paciente['Sexo']); ?>"><br><br>
        <label for="correo">Correo:</label>
        <input type="email" id="correo" name="correo" value="<?php echo htmlspecialchars($paciente['Correo']); ?>"><br><br>
        <label for="telefono">Telefono:</label>
        <input type="text" id="telefono" name="telefono" value="<?php echo htmlspecialchars($paciente['Telefono']); ?>"><br><br>
        <label for="direccion">Direccion:</label>
        <input type="text" id="direccion" name="direccion" value="<?php echo htmlspecialchars($paciente['Direccion']); ?>"><br><br>
        <label for="ciudad">Ciudad:</label>
        <input type="text" id="ciudad" name="ciudad" value="<?php echo htmlspecialchars($paciente['Ciudad']); ?>"><br><br>
        <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
        <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" value="<?php echo htmlspecialchars($paciente['Fecha_nacimiento']); ?>"><br><br>
        <input type="submit" value="Actualizar">

        <input value="editar" class=>
</form>
</body>
</html>
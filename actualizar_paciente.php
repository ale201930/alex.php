<?php
require_once "conex.php";

// 2. Verificar que los datos hayan sido enviados por el método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // 3. Capturar y limpiar los datos del formulario
    $id               = isset($_POST['id']) ? trim($_POST['id']) : null;
    $nombre           = isset($_POST['nombre']) ? trim($_POST['nombre']) : null;
    $apellido         = isset($_POST['apellido']) ? trim($_POST['apellido']) : null;
    $cedula           = isset($_POST['cedula']) ? trim($_POST['cedula']) : null;
    $sexo             = isset($_POST['sexo']) ? trim($_POST['sexo']) : null;
    $correo           = isset($_POST['correo']) ? trim($_POST['correo']) : null;
    $telefono         = isset($_POST['telefono']) ? trim($_POST['telefono']) : null;
    $direccion       = isset($_POST['direccion']) ? trim($_POST['direccion']) : null;
    $ciudad           = isset($_POST['ciudad']) ? trim($_POST['ciudad']) : null;
    $fecha_nacimiento = isset($_POST['fecha_nacimiento']) ? trim($_POST['fecha_nacimiento']) : null;

    // Verificar que los campos obligatorios no estén vacíos
    if (!empty($id) && !empty($nombre)) {
        
        $sql = "UPDATE paciente SET Nombre = ?, Apellido = ?, Cedula = ?, Sexo = ?, Correo = ?, Telefono = ?, Direccion = ?, Ciudad = ?, Fecha_nacimiento = ? WHERE ID_Paciente = ?";
        $stmt = $conn->prepare($sql);

        // Pasamos los parámetros (9 strings 's' y 1 entero 'i' para el ID)
        $stmt->bind_param("sssssssssi", $nombre, $apellido, $cedula, $sexo, $correo, $telefono, $direccion, $ciudad, $fecha_nacimiento, $id);
        
        if ($stmt->execute()) {
            $stmt->close();
            $conn->close();
            header("Location: paciente.php?mensaje=Paciente actualizado exitosamente");
            exit;
        } else {
            echo "Error al actualizar el paciente: " . $stmt->error;
        }
        
        $stmt->close();
        
    } else {
        echo "Por favor, completa todos los campos obligatorios (ID y Nombre).";
    }

    $conn->close();

} else {
    echo "Acceso no válido. Se esperaba una petición POST.";
}
?>
<?php
require_once "conex.php";

// 2. Verificar que los datos hayan sido enviados por el método POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // 3. Capturar y limpiar los datos del formulario
    $id               = isset($_POST['id']) ? trim($_POST['id']) : null;
    if (empty($id)) {
        
    
    $sql = "DELETE FROM paciente WHERE ID_Paciente = ?";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("i", $id);
        
        if ($stmt->execute()) {
            $stmt->close();
            $conn->close();
            header("Location: paciente.php?mensaje=Paciente eliminado exitosamente");
            exit;
        } else {
            echo "Error al eliminar el paciente: " . $stmt->error;
        }
        
        $stmt->close();
    } else {
        echo "Error al preparar la consulta: " . $conn->error;
    }

    } else {
        echo "Error: ID paciente no valido o vacio .";
    }
    $conn->close();
} else {
    header("Location: paciente.php");
    exit();
}

?>
<?php
require_once "conex.php";

// 1. Cambiamos a GET porque el ID viaja por la URL desde el enlace
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    
    // 2. Capturamos 'ID_Paciente' (que es el nombre que usas en el enlace de la tabla)
    $id = isset($_GET['ID_Paciente']) ? trim($_GET['ID_Paciente']) : null;
    
    // 3. CORRECCIÓN: Si el ID NO está vacío, procedemos a borrar
    if (!empty($id)) {
        
        $sql = "DELETE FROM paciente WHERE ID_Paciente = ?";

        if ($stmt = $conn->prepare($sql)) {
            // "i" asume que tu ID_Paciente es un entero. Si es texto (ej. una cédula), cámbialo por "s"
            $stmt->bind_param("i", $id); 
            
            if ($stmt->execute()) {
                $stmt->close();
                $conn->close();
                // Redirigimos pasando el parámetro 'eliminado' para que tu alerta en paciente.php lo reconozca
                header("Location: paciente.php?mensaje=eliminado");
                exit;
            } else {
                echo "Error al eliminar el paciente: " . $stmt->error;
            }
            
            $stmt->close();
        } else {
            echo "Error al preparar la consulta: " . $conn->error;
        }

    } else {
        echo "Error: ID de paciente no válido o vacío.";
    }
    
    $conn->close();
} else {
    // Si intentan entrar de otra forma, directo al listado
    header("Location: paciente.php");
    exit();
}
?>
<?php
require_once "conex.php";

// validar que realmente exista un Id en la url
if (isset($_GET['ID_Paciente']) && !empty($_GET['ID_Paciente'])) {
    $ID_Paciente = $_GET['ID_Paciente'];
    
    $stmt = $conn->prepare("SELECT * FROM paciente WHERE ID_Paciente = ?");
    $stmt->bind_param("i", $ID_Paciente);
    $stmt->execute();
    $resultado = $stmt->get_result();

    // verificar si el paciente existe
    if ($resultado->num_rows > 0) {
        $paciente= $resultado->fetch_assoc();
    } else {
        echo "<div class='min-h-screen flex items-center justify-center bg-gray-50'><p class='text-red-500 font-bold bg-red-100 p-4 rounded-lg shadow'>Paciente no encontrado.</p></div>";
        exit;
    }
} else {
    echo "<div class='min-h-screen flex items-center justify-center bg-gray-50'><p class='text-red-500 font-bold bg-red-100 p-4 rounded-lg shadow'>Acceso no válido. No se especificó un ID.</p></div>";
    exit;
}
?>
    
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Paciente</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="src/main.css">
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center p-4 sm:p-6 lg:p-8">

    <div class="max-w-3xl w-full bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-200">
        <div class="bg-indigo-600 px-6 py-4 sm:px-8">
            <h2 class="text-xl sm:text-2xl font-bold text-white flex items-center gap-2">
                ✏️ Editar Expediente del Paciente
            </h2>
            <p class="text-indigo-200 text-sm mt-1">Modifica los campos necesarios y guarda los cambios.</p>
        </div>

        <form action="actualizar_paciente.php" method="post" class="p-6 sm:p-8 space-y-6">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($paciente['ID_Paciente']); ?>">

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                
                <div class="flex flex-col gap-1">
                    <label for="nombre" class="text-sm font-semibold text-gray-700">Nombre</label>
                    <input type="text" id="nombre" name="nombre" 
                           value="<?php echo htmlspecialchars($paciente['Nombre']); ?>"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition-all text-gray-800">
                </div>

                <div class="flex flex-col gap-1">
                    <label for="apellido" class="text-sm font-semibold text-gray-700">Apellido</label>
                    <input type="text" id="apellido" name="apellido" 
                           value="<?php echo htmlspecialchars($paciente['Apellido']); ?>"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition-all text-gray-800">
                </div>

                <div class="flex flex-col gap-1">
                    <label for="cedula" class="text-sm font-semibold text-gray-700">Cédula</label>
                    <input type="text" id="cedula" name="cedula" 
                           value="<?php echo htmlspecialchars($paciente['Cedula']); ?>"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition-all text-gray-800">
                </div>

                <div class="flex flex-col gap-1">
                    <label for="sexo" class="text-sm font-semibold text-gray-700">Sexo</label>
                    <input type="text" id="sexo" name="sexo" 
                           value="<?php echo htmlspecialchars($paciente['Sexo']); ?>"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition-all text-gray-800">
                </div>

                <div class="flex flex-col gap-1">
                    <label for="correo" class="text-sm font-semibold text-gray-700">Correo Electrónico</label>
                    <input type="email" id="correo" name="correo" 
                           value="<?php echo htmlspecialchars($paciente['Correo']); ?>"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition-all text-gray-800">
                </div>

                <div class="flex flex-col gap-1">
                    <label for="telefono" class="text-sm font-semibold text-gray-700">Teléfono</label>
                    <input type="text" id="telefono" name="telefono" 
                           value="<?php echo htmlspecialchars($paciente['Telefono']); ?>"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition-all text-gray-800">
                </div>

                <div class="flex flex-col gap-1">
                    <label for="ciudad" class="text-sm font-semibold text-gray-700">Ciudad</label>
                    <input type="text" id="ciudad" name="ciudad" 
                           value="<?php echo htmlspecialchars($paciente['Ciudad']); ?>"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition-all text-gray-800">
                </div>

                <div class="flex flex-col gap-1">
                    <label for="fecha_nacimiento" class="text-sm font-semibold text-gray-700">Fecha de Nacimiento</label>
                    <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" 
                           value="<?php echo htmlspecialchars($paciente['Fecha_nacimiento']); ?>"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition-all text-gray-800">
                </div>

                <div class="flex flex-col gap-1 md:col-span-2">
                    <label for="direccion" class="text-sm font-semibold text-gray-700">Dirección Completa</label>
                    <input type="text" id="direccion" name="direccion" 
                           value="<?php echo htmlspecialchars($paciente['Direccion']); ?>"
                           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 outline-none transition-all text-gray-800">
                </div>

            </div>

            <div class="flex flex-col sm:flex-row justify-end items-center gap-3 pt-4 border-t border-gray-100">
        
                <button type="submit" 
                        class="w-full sm:w-auto px-6 py-2.5 text-sm font-medium text-white bg-indigo-600 rounded-lg hover:bg-indigo-700 focus:ring-4 focus:outline-none focus:ring-indigo-300 shadow-md hover:shadow-lg transition-all">
                    Actualizar Datos
                </button>
            </div>
        </form>
    </div>

</body>
</html>
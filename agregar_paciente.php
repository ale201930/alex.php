<?php
require_once "conex.php";

$mensaje = "";
$tipo_mensaje = "";

// Procesar el formulario SOLO cuando se envía por POST y no esté vacío
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST)) {
    // Recibir y limpiar los datos asegurando que si vienen null o no existen, sean un string vacío ""
    $nombre           = mysqli_real_escape_string($conn, $_POST['nombre'] ?? '');
    $apellido         = mysqli_real_escape_string($conn, $_POST['apellido'] ?? '');
    $cedula           = mysqli_real_escape_string($conn, $_POST['cedula'] ?? '');
    $sexo             = mysqli_real_escape_string($conn, $_POST['sexo'] ?? '');
    $correo           = mysqli_real_escape_string($conn, $_POST['correo'] ?? '');
    $telefono         = mysqli_real_escape_string($conn, $_POST['telefono'] ?? '');
    $direccion        = mysqli_real_escape_string($conn, $_POST['direccion'] ?? '');
    $ciudad           = mysqli_real_escape_string($conn, $_POST['ciudad'] ?? '');
    $fecha_nacimiento = mysqli_real_escape_string($conn, $_POST['fecha_nacimiento'] ?? '');

    // Validación mínima: Verificar que los campos obligatorios no estén vacíos
    if (empty($nombre) || empty($apellido) || empty($cedula) || empty($sexo) || empty($fecha_nacimiento)) {
        $mensaje = "Error: Por favor, rellena todos los campos obligatorios.";
        $tipo_mensaje = "error";
    } else {
        // Verificar si la cédula ya existe para evitar duplicados
        $check_sql = "SELECT Cedula FROM paciente WHERE Cedula = '$cedula'";
        $check_res = $conn->query($check_sql);

        if (mysqli_num_rows($check_res) > 0) {
            $mensaje = "Error: Ya existe un paciente registrado con esa cédula.";
            $tipo_mensaje = "error";
        } else {
            // Insertar en la base de datos
            $sql = "INSERT INTO paciente (Nombre, Apellido, Cedula, Sexo, Correo, Telefono, Direccion, Ciudad, Fecha_nacimiento) 
                    VALUES ('$nombre', '$apellido', '$cedula', '$sexo', '$correo', '$telefono', '$direccion', '$ciudad', '$fecha_nacimiento')";

            if ($conn->query($sql) === TRUE) {
                // CORRECCIÓN: Redireccionar al nombre correcto del archivo (paciente.php)
                header("Location: paciente.php?mensaje=agregado"); 
                exit();
            } else {
                $mensaje = "Error al registrar al paciente: " . $conn->error;
                $tipo_mensaje = "error";
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Paciente</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen p-4 sm:p-8">

    <div class="max-w-3xl mx-auto bg-white rounded-xl shadow-md border border-gray-200 overflow-hidden">
        
        <div class="bg-slate-800 px-6 py-5 flex justify-between items-center">
            <div>
                <h1 class="text-xl font-bold text-white flex items-center gap-2">
                    ➕ Nuevo Registro de Paciente
                </h1>
                <p class="text-slate-400 text-sm mt-0.5">Introduce los datos para el expediente médico</p>
            </div>
            <a href="paciente.php" class="text-slate-400 hover:text-white text-sm font-medium transition-colors">
                ⬅️ Volver al listado
            </a>
        </div>

        <?php if ($mensaje !== "" && $tipo_mensaje === "error"): ?>
            <div class="m-6 p-4 bg-red-100 border border-red-200 text-red-700 rounded-lg text-sm">
                <?php echo $mensaje; ?>
            </div>
        <?php endif; ?>

        <form action="agregar_paciente.php" method="POST" class="p-6 space-y-6">
            
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Nombre</label>
                    <input type="text" name="nombre" required class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Apellido</label>
                    <input type="text" name="apellido" required class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Cédula</label>
                    <input type="text" name="cedula" required class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm font-mono focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Sexo</label>
                    <select name="sexo" required class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500">
                        <option value="" disabled selected>Selecciona una opción</option>
                        <option value="M">Masculino</option>
                        <option value="F">Femenino</option>
                    </select>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Correo Electrónico</label>
                    <input type="email" name="correo" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Teléfono</label>
                    <input type="text" name="telefono" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm font-mono focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Ciudad</label>
                    <input type="text" name="ciudad" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Fecha de Nacimiento</label>
                    <input type="date" name="fecha_nacimiento" required class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm font-mono focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500">
                </div>
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-700 uppercase tracking-wider mb-2">Dirección de Habitación</label>
                <textarea name="direccion" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500"></textarea>
            </div>

            <hr class="border-gray-200">

            <div class="flex justify-end gap-3">
                <a href="paciente.php" class="px-4 py-2 border border-gray-300 text-gray-700 rounded-lg text-sm font-semibold hover:bg-gray-50 transition-colors">
                    Cancelar
                </a>
                <button type="submit" class="px-5 py-2 bg-blue-600 hover:bg-blue-500 text-white rounded-lg text-sm font-semibold shadow-sm transition-colors">
                    Guardar Paciente
                </button>
            </div>
        </form>
    </div>

</body>
</html>
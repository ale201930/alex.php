<?php
require_once "conex.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pacientes</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen p-4 sm:p-8">

 <?php if (isset($_GET['mensaje']) && $_GET['mensaje'] === 'eliminado'): ?>
    <div class="mb-4 p-4 bg-green-100 border border-green-200 text-green-700 rounded shadow-sm">
        Paciente eliminado exitosamente.
    </div>
 <?php endif; ?>

 <?php if (isset($_GET['mensaje']) && $_GET['mensaje'] === 'agregado'): ?>
    <div class="mb-4 p-4 bg-green-100 border border-green-200 text-green-700 rounded shadow-sm">
        Paciente registrado exitosamente.
    </div>
 <?php endif; ?>

    <div class="max-w-7xl mx-auto bg-white rounded-xl shadow-md border border-gray-200 overflow-hidden">
        
        <div class="bg-slate-800 px-6 py-5 flex flex-col sm:flex-row justify-between items-center gap-4">
            <div>
                <h1 class="text-xl font-bold text-white flex items-center gap-2">
                    👥 Control de Pacientes
                </h1>
                <p class="text-slate-400 text-sm mt-0.5">Listado general de registros médicos en el sistema</p>
            </div>
            
            <div>
                <a href="agregar_paciente.php" 
                   class="inline-flex items-center gap-2 bg-emerald-600 hover:bg-emerald-500 text-white px-4 py-2.5 rounded-lg font-semibold text-sm shadow-sm transition-all duration-150 hover:shadow-emerald-900/20 tracking-wide">
                    ➕ Agregar Paciente
                </a>
            </div>
        </div>

        <?php
        $sql = "SELECT * FROM paciente";
        $resultado = $conn->query($sql);
        
        if (mysqli_num_rows($resultado) > 0) {
        ?>
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse whitespace-nowrap">
                    <thead class="bg-slate-50 border-b border-gray-200 text-xs font-bold text-slate-700 uppercase tracking-wider">
                        <tr>
                            <th class="px-6 py-4">Nombre</th>
                            <th class="px-6 py-4">Apellido</th>
                            <th class="px-6 py-4">Cédula</th>
                            <th class="px-6 py-4 text-center">Sexo</th>
                            <th class="px-6 py-4">Correo</th>
                            <th class="px-6 py-4">Teléfono</th>
                            <th class="px-6 py-4">Dirección</th>
                            <th class="px-6 py-4">Ciudad</th>
                            <th class="px-6 py-4 text-center">F. Nacimiento</th>
                            <th class="px-6 py-4 text-center">Acciones</th>
                        </tr>
                    </thead>
                    
                    <tbody class="divide-y divide-gray-200 text-sm text-gray-600">
                    <?php
                    while($fila = mysqli_fetch_assoc($resultado)){
                    ?>
                        <tr class="hover:bg-slate-50/80 transition-colors duration-150 odd:bg-white even:bg-slate-50/40">
                            <td class="px-6 py-4 font-medium text-slate-900"><?php echo htmlspecialchars($fila["Nombre"]); ?></td>
                            <td class="px-6 py-4 font-medium text-slate-900"><?php echo htmlspecialchars($fila["Apellido"]); ?></td>
                            <td class="px-6 py-4 font-mono text-xs bg-slate-100/50 px-2 py-1 rounded text-center inline-block mt-3 ml-6"><?php echo htmlspecialchars($fila["Cedula"]); ?></td>
                            <td class="px-6 py-4 text-center">
                                <span class="px-2.5 py-1 rounded-full text-xs font-semibold <?php echo ($fila['Sexo'] == 'M' || $fila['Sexo'] == 'Masculino') ? 'bg-blue-100 text-blue-700' : 'bg-pink-100 text-pink-700'; ?>">
                                    <?php echo htmlspecialchars($fila["Sexo"]); ?>
                                </span>
                            </td>
                            <td class="px-6 py-4 text-gray-500"><?php echo htmlspecialchars($fila["Correo"]); ?></td>
                            <td class="px-6 py-4 text-gray-500 font-mono text-xs"><?php echo htmlspecialchars($fila["Telefono"]); ?></td>
                            <td class="px-6 py-4 max-w-xs truncate text-gray-500" title="<?php echo htmlspecialchars($fila["Direccion"]); ?>">
                                <?php echo htmlspecialchars($fila["Direccion"]); ?>
                            </td>
                            <td class="px-6 py-4 text-gray-500"><?php echo htmlspecialchars($fila["Ciudad"]); ?></td>
                            <td class="px-6 py-4 text-center text-gray-500 font-mono text-xs"><?php echo htmlspecialchars($fila["Fecha_nacimiento"]); ?></td>
                            
                            <td class="px-6 py-4 text-center space-x-2">
                                <a href="editar_Paciente.php?ID_Paciente=<?php echo $fila['ID_Paciente']; ?>" 
                                   class="inline-flex items-center gap-1 bg-blue-50 text-blue-600 hover:bg-blue-100 px-3 py-1.5 rounded-md font-medium text-xs transition-all border border-blue-200">
                                    ✏️ Editar
                                </a>
                                <a href="eliminar.php?ID_Paciente=<?php echo $fila['ID_Paciente']; ?>" 
                                   class="inline-flex items-center gap-1 bg-red-50 text-red-600 hover:bg-red-100 px-3 py-1.5 rounded-md font-medium text-xs transition-all border border-red-200"
                                   onclick="return confirm('¿Seguro que deseas eliminar este paciente?');">
                                    🗑️ Eliminar
                                </a>
                            </td>
                        </tr>
                    <?php
                    } 
                    ?>
                    </tbody>
                </table>
            </div>
        <?php
        } else {
        ?>
            <div class="p-12 text-center">
                <span class="text-4xl">📂</span>
                <p class="text-gray-500 mt-2 font-medium">No hay registros de pacientes disponibles en este momento.</p>
            </div>
        <?php
        }   
        mysqli_close($conn);
        ?>
    </div>

</body>
</html>
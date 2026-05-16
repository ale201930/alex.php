<?php
require_once "conex.php";
?>

<doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pacientes</title>
      <link rel="stylesheet" href="/src/main.css">
</head>
<body>
    <?php
    $sql = "SELECT * FROM paciente";
    $resultado = $conn->query($sql);
    if (mysqli_num_rows($resultado) > 0) {
        ?>
 <table class="table-fixedn text-center mt-3 w-full border-collapse border border-gray-300  dark:border-gray-600">
  <thead>
    <tr>
      <th class="px-6 py-3 font-bold">Nombre</th>
        <th class="px-6 py-3 font-bold">Apellido</th>
        <th class="px-6 py-3 font-bold">Cedula</th>
        <th class="px-6 py-3 font-bold">Sexo</th>
        <th class="px-6 py-3 font-bold">Correo</th>
        <th class="px-6 py-3 font-bold">Telefono</th>
        <th class="px-6 py-3 font-bold">Direccion</th>
        <th class="px-6 py-3 font-bold">Ciudad</th>
        <th class="px-6 py-3 font-bold text-center">Fecha de Nacimiento</th>
        <th class="px-6 py-3 font-bold text-center">editar</th>
        <th class="px-6 py-3 font-bold">Eliminar</th>
    </tr>
  </thead>

<?php
while($fila = mysqli_fetch_assoc($resultado)){
    ?>
    <tr>
        <td class="border border-gray-300 px-6 py-3"><?php echo $fila["Nombre"]; ?></td>
        <td class="border border-gray-300 px-6 py-3"><?php echo $fila["Apellido"]; ?></td>
        <td class="border border-gray-300 px-6 py-3"><?php echo $fila["Cedula"]; ?></td>
        <td class="border border-gray-300 px-6 py-3"><?php echo $fila["Sexo"]; ?></td>
        <td class="border border-gray-300 px-6 py-3"><?php echo $fila["Correo"]; ?></td>
        <td class="border border-gray-300 px-6 py-3"><?php echo $fila["Telefono"]; ?></td>
        <td class="border border-gray-300 px-6 py-3"><?php echo $fila["Direccion"]; ?></td>
        <td class="border border-gray-300 px-6 py-3"><?php echo $fila["Ciudad"]; ?></td>
        <td class="border border-gray-300 px-6 py-3 text-center"><?php echo $fila["Fecha_nacimiento"]; ?></td>
        <td class="border border-gray-300 px-6 py-3 text-center"><a href="editar_Paciente.php?id=<?php echo $fila['ID_Paciente']; ?>" class="text-blue-500 hover:text-blue-700">Editar</a></td>
        <td class="border border-gray-300 px-6 py-3"><a href="eliminar.php?id=<?php echo $fila['ID_Paciente']; ?>" class="text-red-500 hover:text-red-700">Eliminar</a></td>
    <?php
    echo $fila["Nombre"];  } ?>

<?php
    } else{
        echo "no hay registros";
}   ?>

    <?php
    mysqli_close($conn);
    ?>


</body>
</html>
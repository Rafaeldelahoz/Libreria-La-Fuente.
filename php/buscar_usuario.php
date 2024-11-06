<?php
// Conectar a la base de datos
require "./conexion.php";

if ($conexion->connect_error) {
    echo '<script>alert("conexion exitosa")</script>';
    die("Error de conexión: " . $conexion->connect_error);
}

if ($conexion->connect_error) {
    echo '<script>alert("conexion fallida")</script>';
    die("Error de conexión: " . $conexion->connect_error);
}

// Verificar que se haya enviado la cédula desde el formulario
if (isset($_POST['cedula'])) {
    // Escapar el valor de cédula para evitar inyecciones SQL
    $cedula = $conexion->real_escape_string($_POST['cedula']);
    
    // Realizar la consulta
    $query = "SELECT * FROM persona WHERE cc_persona = '$cedula'";
    $resultado = $conexion->query($query);

    // Verificar si se encontró un usuario con esa cédula
    if ($resultado->num_rows > 0) {
        $usuario = $resultado->fetch_assoc();
        echo json_encode(['success' => true, 'nombre' => $usuario['nombre'],'apellido' => $usuario['apellido'], 'telefono' => $usuario['teléfono'],'fnac' => $usuario['f_nac'], 'email' => $usuario['email'],'gsanguineo' => $usuario['g_sanguíneo'] ]);
    } else {
        echo json_encode(['success' => false]);
    }
}
$conexion->close();
?>

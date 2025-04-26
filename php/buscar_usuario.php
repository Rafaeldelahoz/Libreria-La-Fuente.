<?php
// Conectar a la base de datos
require "./conexion.php";

if ($conexion->connect_error) {
    echo '<script>alert("conexion exitosa")</script>';
    die("Error de conexión: " . $conexion->connect_error);
}


// Verificar que se haya enviado la cédula desde el formulario
if (isset($_POST['cedula'])) {
    // Escapar el valor de cédula para evitar inyecciones SQL
    $cedula = $conexion->real_escape_string($_POST['cedula']);
    
    // Realizar la consulta
    $query = "SELECT * FROM persona 
    JOIN usuarios on persona.cc_persona = usuarios.cc_persona 
    JOIN dirección on persona.cc_persona = dirección.cc_persona
    JOIN empleado on persona.cc_persona = empleado.cc_persona
    WHERE persona.cc_persona = '$cedula' ";
    $resultado = $conexion->query($query);

    // Verificar si se encontró un usuario con esa cédula
    if ($resultado->num_rows > 0) {
        $usuario = $resultado->fetch_assoc();
        echo json_encode(['success' => true, 
        'nombre' => $usuario['nombre'],             'apellido' => $usuario['apellido'],
        'telefono' => $usuario['teléfono'],         'fnac' => $usuario['f_nac'],
        'email' => $usuario['email'],               'gsanguineo' => $usuario['g_sanguíneo'] ,
        'rol' => $usuario['rol'],                   'usuario' => $usuario['usuario'],
        'contrasena' => $usuario['contraseña'],     'pais' => $usuario['país'],
        'departamento' => $usuario['departamento'], 'ciudad' => $usuario['ciudad'],
        'barrio' => $usuario['barrio'],             'direccion' => $usuario['nombre_vía'],
        'residencia'=>$usuario['numero_residencia'],'postal' => $usuario['codigo_postal'],
        'salario' => $usuario['salario']
        ]);
    } else {
        echo json_encode(['success' => false]);
    }
}
$conexion->close();
?>

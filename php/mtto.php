<?php 
// Habilitar la visualización de errores para debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);
// conexion a DB
require "./conexion.php";

$cedula = $_POST['cedula'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$telefono = $_POST['telefono'];
$correo = $_POST['email'];
$fenac=$_POST['fenac'];
$gs=$_POST['gsanguineo'];
$rol=$_POST['rol'];
$usuario=$_POST['usuario'];
$contrasena=sha1($_POST['contrasena']);
$pais=$_POST['pais'];
$departamento=$_POST['departamento'];
$ciudad=$_POST['ciudad'];
$barrio=$_POST['barrio'];
$direccion=$_POST['direccion'];
$residencia=$_POST['residencia'];
$cpostal=$_POST['cpostal'];
$salario=$_POST['salario'];


if(isset($_POST['limpiar'])){
    header ("location: ./4.Admin_emp.php") ;
}
if($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST['crear_usuario'])){
    $conexion->begin_transaction();

    try{
        
        $stmt1 = $conexion->prepare("INSERT INTO persona (cc_persona, nombre, apellido, teléfono, email, f_nac, g_sanguíneo) 
                                     VALUES (?, ?, ?, ?, ?, ?, ?)");
        
        $stmt1->bind_param(
            "issssss",
            $cedula,
            $nombre,
            $apellido,
            $telefono,
            $correo,
            $fenac,
            $gs
        );
        if (!$stmt1->execute()) {
            throw new Exception("Error al insertar en la tabla persona: " . $stmt1->error);
        }

        $stmt2 = $conexion->prepare("INSERT INTO usuarios (cc_persona, rol, usuario, contraseña) 
                                     VALUES (?, ?, ?, ?)");
        
        $stmt2->bind_param(
            "isss",
            $cedula,
            $rol,
            $usuario,
            $contrasena
        );
        if (!$stmt2->execute()) {
            throw new Exception("Error al insertar en la tabla usuarios: " . $stmt2->error);
        }
        
        $stmt3 = $conexion->prepare("INSERT INTO dirección (cc_persona, país, departamento, ciudad, barrio, nombre_vía, numero_residencia, codigo_postal) 
                                     VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt3->bind_param(
            "isssssss",
            $cedula,
            $pais,
            $departamento,
            $ciudad,
            $barrio,
            $direccion,
            $residencia,
            $cpostal
        );
        if (!$stmt3->execute()) {
            throw new Exception("Error al insertar en la tabla dirección: " . $stmt3->error);
        }

        $stmt4 = $conexion->prepare("INSERT INTO empleado (cc_persona, cargo, salario) 
                                     VALUES (?, ?, ?)");
        
        $stmt4->bind_param(
            "isd",
            $cedula,
            $rol,
            $salario
            
        );
        if (!$stmt4->execute()) {
            throw new Exception("Error al insertar en la tabla usuarios: " . $stmt2->error);
        }

        $conexion->commit();
        $_SESSION['registro_exitoso'] == true;
        header("Location: ../users/4.Admin_em.php");
        exit;

    }catch (Exception $e) {
        // Revertir cambios en caso de error
        $conexion->rollback();
        echo "Error: " . $e->getMessage();
    }
   
        
}


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['modificar_usuario'])) {
    
    $conexion->begin_transaction();
    try {
        // Preparar la consulta SQL para actualizar los datos del usuario
        $stmt1 = $conexion->prepare("
            UPDATE persona 
            SET nombre = ?, apellido = ?,teléfono = ?, email = ?,  f_nac = ?, g_sanguíneo = ?
            WHERE cc_persona = ?
        ");
        $stmt1->bind_param("ssssssi", $nombre, $apellido,$telefono, $correo, $fenac,$gs, $cedula);

        // Ejecutar la consulta
        if ($stmt1->execute()) {
            // Si la actualización es exitosa, redirigir con un mensaje de éxito
            
        } else {
            echo "Error al actualizar tabla persona.";
        }

        
        $stmt2 = $conexion->prepare("
            UPDATE dirección 
            SET país = ?, departamento = ?, ciudad = ?, barrio = ?, nombre_vía= ?, numero_residencia= ?, codigo_postal= ?
            WHERE cc_persona = ?
        ");
        $stmt2->bind_param("sssssssi", $pais, $departamento, $ciudad, $barrio,$direccion,$residencia,$cpostal, $cedula);

        if ($stmt2->execute()) {
            // Si la actualización es exitosa, redirigir con un mensaje de éxito
           
            
        } else {
            echo "Error al actualizar tabla dirección.";
        }

        $stmt3 = $conexion->prepare("
            UPDATE usuarios
            SET usuario=?, contraseña=?, rol=? 
            WHERE cc_persona = ?
        ");
        $stmt3->bind_param("sssi", $usuario, $contrasena, $rol,  $cedula);

        if ($stmt3->execute()) {
            // Si la actualización es exitosa, redirigir con un mensaje de éxito
            
        } else {
            echo "Error al actualizar tabla usuario.";
        }

        $stmt4 = $conexion->prepare("
            UPDATE empleado
            SET cargo=?, salario=?
            WHERE cc_persona = ?
        ");
        $stmt4->bind_param("sdi", $cargo, $salario, $cedula);

        if ($stmt4->execute()) {
            // Si la actualización es exitosa, redirigir con un mensaje de éxito
            
        } else {
            echo "Error al actualizar tabla usuario.";
        }

        $conexion->commit();
        
        header("Location: ../users/4.Admin_em.php");
        exit;
        
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['eliminar_usuario'])) {
    
    // Iniciar la transacción
    $conexion->begin_transaction();

    try {
        // Eliminar registros en la tabla usuarios
        $stmt1 = $conexion->prepare("DELETE FROM usuarios WHERE cc_persona = ?");
        $stmt1->bind_param("i", $cedula);
        $stmt1->execute();

        // Eliminar registros en la tabla dirección
        $stmt2 = $conexion->prepare("DELETE FROM dirección WHERE cc_persona = ?");
        $stmt2->bind_param("i", $cedula);
        $stmt2->execute();

        // Eliminar registros en la tabla persona
        $stmt3 = $conexion->prepare("DELETE FROM persona WHERE cc_persona = ?");
        $stmt3->bind_param("i", $cedula);
        $stmt3->execute();

        $stmt4 = $conexion->prepare("DELETE FROM empleado WHERE cc_persona = ?");
        $stmt4->bind_param("i", $cedula);
        $stmt4->execute();

        // Confirmar los cambios
        $conexion->commit();

        // Redirigir a la misma página con un mensaje de éxito
        $_SESSION['usuario_eliminado'] = true;
        header("Location: ../users/4.Admin_em.php");
        exit;

    } catch (Exception $e) {
        // Si algo falla, revertir los cambios
        $conexion->rollback();
        echo "Error: " . $e->getMessage();
    }
}




?>
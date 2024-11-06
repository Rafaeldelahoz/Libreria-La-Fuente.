<?php
session_start();
require "./conexion.php";
$user=$_POST['usuario'];
$contrasena=sha1($_POST['password']);
$validar_login=mysqli_query( $conexion,"SELECT * FROM usuarios WHERE usuario='$user' and contraseña ='$contrasena'");

if(mysqli_num_rows($validar_login)>0){
    $_SESSION['usuario']=$user;
    header("location: ../users/1.perfil.php");
    exit;
}else{
    echo '
    <script>alert("acceso denegado,por favor verifique los datos")
    window.location="../index/index.php";
    </script>;
    
    ';
    exit;
}
?>
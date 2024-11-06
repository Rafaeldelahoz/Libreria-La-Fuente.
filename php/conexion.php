<?php 
/* 
1mero se crea variable 
2do   se    realiza conexion(servidor-usuario-contraseña-base de datos)    */
$conexion = mysqli_connect("localhost","root","","libreria_la_fuente");

    /* 
parte de pruba de base de datos  

if($conexion){
    echo '<script>alert("conexion exitosa")</script>';
}else{
    echo '<script>alert("conexion fallida")</script>';
} 
    */
?>
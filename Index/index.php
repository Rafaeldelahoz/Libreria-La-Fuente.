<?php

require "../php/conexion.php";
/*
if($_POST){
    //capturamos en variables de php los campos diligenciados llamados name
    $usuario=$_POST['usuario'];
    $contrasena=$_POST['password'];
    // realizamos la consulta a la BD para confirmar que existe 
    // creamos variable hacemos la sentencia y condicionamos que el name sea igual a la variable guardada
    $sql="SELECT id_usuario,rol,usuario,contraseña,cc_persona FROM usuarios WHERE usuario='$usuario' ";
    //guardamos en una variable la consulta
    $resultado = $mysqli->query($sql);
    // en otra variable el booleano de esa consulta
    $num = $resultado->num_rows;

    if($num > 0 ){
        //traer los resultados de la consulta en otra variable (ahi no entendi)
        $row = $resultado->fetch_assoc();
        //traemos la contraseña de la BD
        $pass_bd = $row['contraseña'];
        //pasanos la contraseña en cifrado con otra variable
        $pass_c = sha1($contrasena);

        if($pass_bd == $pass_c){
            $_SESSION['id']=$row['cc_persona'];
            $_SESSION['usuario']=$row['usuario'];
            $_SESSION['rol']=$row['rol'];
            //header("location: ../users/1.perfil.php");            
            
        }else{echo '<script>window.location="./index/index.php";alert("La contraseña no coincide")</script>';}

    }else{
        
        echo '<script>window.location="./index/index.php";alert("No existe usuario")</script>';
    }
}*/

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="Autor" content="Rafael De la Hoz">
    <meta name="description" content="Proyecto de librería la fuente: desarrollar una landing con SGO">
    <title>Librería La Fuente</title>
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <header>
        
        <div class="logo"><img src="../images/logo.png" alt="Logo" class="logo"><!--- --></div>
        
        <!--- Barra de navegación -->
        
        <nav>
            <ul>
                <li><a href="#home">Inicio</a></li>
                <li><a href="#nosotros">Nosotros</a></li>
                <li><a href="#contact">Contacto</a></li>
                <li><a href="#Login"><button class="logueo">Login</button></a></li>
            </ul>
        </nav>

    </header>
    <main id="home">
        <form method="POST" action="../php/login.php<?php /*echo $_SERVER=['PHP_SELF'];*/ ?>" class="home" id="Login"> <!-- (../php/login.php) esto es del action otra forma-->
            <div class="access">
                <h2 class="ing">Acceso a SGO</h2>
                <i>Sus credenciales deben estar registradas <br>previamene con el adminnistrador</i>
                <input type="text" placeholder=" ingrese usuario" required class="acceso" name="usuario">
                <input type="password" placeholder=" ingrese Contraseña" required class="acceso" name="password">
                <button type="submit" class="LA" id="btn_iniciar_sesion">Ingresar</button>
                <i>Al hacer clic en "ingresar", acepta nuestros <a href="#"> <br> Términos de servicio</a> y <a href="#">Política de privacidad.</a></i>
                <strong>Solo para personal autorizado</strong>
            </div>
        </form>

        <section class="nosotros" id="nosotros">
            <div class="qs">
                <h2>¿Quienes somos?</h2>
                <div class="qs2">
                    <p class="qs3">
                        Bienvenidos a ésta librería, su fuente confiable de conocimiento y cultura en la ciudad. 
                        Desde nuestra fundación, nos hemos comprometido a proporcionar a nuestros clientes una amplia selección de libros, 
                        un ambiente acogedor y un servicio excepcional. Somos más que una librería; somos un espacio donde las historias cobran vida 
                        y las mentes se expanden. 
                        <br><br>
                        Contamos con una gran variedad de productos para el entretenimiento, educación e información. 
                        Nuestros clientes y trabajadores formamos una gran familia aportando un gran esfuerzo por mantenernos como la mejor 
                        opción en el mercado.
                     </p>
                     <img src="../images/img2.png" alt="work group" class="img2">
                </div>
              
            </div>

            <div class="nh">
                <h2>Nuestra historia</h2>
             <p>
                Librería La Fuente nació de la pasión por la literatura donde se  quería crear un lugar donde los lectores de todas las 
                edades y gustos pudieran encontrar su próxima gran lectura. Con años de experiencia en el sector editorial, nuestro equipo 
                ha trabajado incansablemente para construir una librería que refleje nuestra dedicación al conocimiento y al servicio al cliente.
             </p>
            </div>
        </section>
        <img src="../images/Img3.png" alt="books" class="img3">

        
        <section id="contact" class="contact">

            <form action="">
                <fieldset class="field">
                    <legend><h2>Contáctanos</h2></legend>
                    
                    <div class="inline-form">
                        <div class="lista"><Label for="name">Nombre</Label>
                            <input type="text" name="nombre" placeholder="ingrese nombre" required class="place-form1">
                        </div>
                        <div class="lista"><label for="last name">Apellido</label>
                            <input type="text" name="apellido" placeholder="ingrese apellido" required class="place-form1">
                        </div>
                    </div>

                    <div class="block-form">
                        <label for="e-mail">Correo electrónico</label>
                        <input type="text" name="email" placeholder="ingrese e-mail" required class="place-form2">
                        <label for="mensaje">Tu mensaje</label>
                        <div class="place"><textarea type="text" name="email" placeholder="ingrese su mensaje" required class="place-form2" id="sms"></textarea></div>
                        <a href=""><button class="enviar" id="env">Enviar</button></a>
                    </div>
                </fieldset>
            </form>

            <div class="content"><img src="../images/img4.jpg" alt="contacto" class="img4"></div>
        </section>
    </main>

    <footer>
        <di class="logo">
            <img src="../images/logo.png" alt="Logo" >
            <div class="redes">
                <a href="" class="face"><i class="fa-brands fa-facebook"></i></a>
                <a href="" class="linked"><i class="fa-brands fa-linkedin-in"></i></a>
                <a href="" class="youtb"><i class="fa-brands fa-youtube"></i></a>
                <a href="" class="inst"><i class="fa-brands fa-instagram"></i></a>
            </div>
        </di>
        <p class="pie">
            <div>Dirección: Calle Principal 123 #14-15, Barranquilla, Colombia. <br>Teléfono: +123 456 7890. <br>Correo Electrónico: contacto@librerialafuente.com</div>
            <div> Políticas de Privacidad. <br>Términos y Condiciones. <br>Políticas de Devolución. </div>
            <div>N° de identificación fiscal: 123456789. <br>Registro mercantil: 987654321. <br> &copy;2024 Librería La Fuente. Todos los derechos reservados.</div>
            </p>
    </footer>
    <script src="scripts.js"></script>
</body>
</html>

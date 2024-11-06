<?php
session_start();
if(!isset($_SESSION['usuario'])){
  echo '<script>alert("acceso denegado,por favor inicie sesión")
    window.location="../index";
    </script>;'; session_destroy(); die();
}

?>

<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="Autor" content="Rafael De la Hoz">
    <meta name="description" content="Proyecto de librería la fuente: desarrollar una landing con SGO">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" integrity="sha384-dpuaG1suU0eT09tx5plTaGMLBsfDLzUCCUXOY2j/LSvXYuG6Bqs43ALlhIqAJVRb" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css"> 
    <link rel="stylesheet" href="./admin.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
    <title>Dashboard</title>
  </head>
  <body>

    <div class="container d-flex position-fixed" style="padding-left: 0px;">
      <nav>
        <div id="sidebar" class="bg-primary">
          <div class="logo">
            <a class="nav-link fw-bold d-flex flex-column align-content-center flex-wrap p-2 border-bottom " href="#">
              <img src="../images/User1.jpg" alt="user photo" class="ing-fluid rounded-circle avatar m-2 border border-2 display display-flex">
              Admin
            </a>
          </div>
          <div class="menu">
            <ul style="list-style: none; padding:0;">
              <li><a href="./1.perfil.php" class="d-block text-light p-3"><i class="icon ion-md-person m-2 lead"></i>Perfil</a></li>
              <li><a href="./2.bandeja.php" class="d-block text-light p-3"><i class="icon ion-md-notifications m-2 lead"></i>Notificaciones</a></li>
            
              <li class="active">
                <a href="#EmpSubmenu" class="d-block text-light p-3 dropdown-toggle" data-bs-toggle="collapse" aria-expanded="false" role="button" aria-controls="collapseExample">
                  <i class="icon ion-md-briefcase m-2 lead"></i>Jornadas
                </a>
                <ul class="collapse list-unstyled" id="EmpSubmenu">
                  <li><a href="./3.jornada.php" class="d-block text-light p-1 m-1">Panel propio</a></li>
                  <li><a href="./4.Admin_em.php" class="d-block text-light p-1 m-1">panel empleados</a></li>
                </ul>
              </li>
            
              <li class="active">
                  <a href="#datosSubmenu" class="d-block text-light p-3 dropdown-toggle" data-bs-toggle="collapse" aria-expanded="false" role="button" aria-controls="collapseExample">
                    <i class="icon ion-md-stats m-2 lead"></i>Datos
                  </a>
                <ul class="collapse list-unstyled" id="datosSubmenu">
                  <li><a href="./5.Admin_price.php" class="d-block text-light p-1 m-1">panel precios</a></li>
                  <li><a href="./6.inventario.php" class="d-block text-light p-1 m-1">Inventario</a></li>
                </ul>
              </li>
              <li><a href="../php/cerrar_login.php" class="cerrar badge d-block text-light text-center p-3 " style="position: absolute; bottom: 0; margin-bottom: 5px; margin-left: 22px;">Cerrar sesión<i class="icon ion-md-exit m-2 lead"></i></a></li>
            </ul>
          </div>
        </div>
      </nav>
    </div>
    <div class="content">
      <section>
        <div class="container">
          <div class="forma">
            <form action="" class="">
              <fieldset>
                <div class="cente">
                  <legend class="text-black"><h2 class="ed">Editar Perfil</h2></legend>
                    <div class="edit d-flex"> 
                      <img src="../images/User1.jpg" alt="user photo" class="ing-fluid rounded-circle avatar m-2 border border-2">
                        <div class="align-content-center m-2">
                          <h6 class="text-black">Helena Hills</h6>
                            <a href="#" class="link-secondary">Cambiar foto</a>
                        </div>
                    </div>
                </div>
                <div class="formu d-block col-lg-6">
                  <div class="row">
                    <div class="one col-lg-6 d-flex flex-column">
                      <Label for="name" class="labe">Nombre</Label>
                      <input type="text" name="nombre" placeholder="Maria" required class="place-form1"> 
                      <label for="" class="labe">Cedula</label>
                      <input type="number" name="cedula" placeholder="123456789" required class="place-form1">                   
                       
                    </div>                   
                    <div class="two col-lg-6 d-flex flex-column">
                      <label for="last name" class="labe">Apellido</label>
                        <input type="text" name="apellido" placeholder="Hills" required class="place-form1">
                      <label for="" class="labe">Contacto</label>
                      <input type="contact" name="telefono" placeholder="3005006060" required class="place-form1">
                    </div>
                  </div>
                  <div class="three d-flex flex-column">
                    <label for="e-mail" class="labe">Correo electrónico</label>
                    <input type="text" name="email" placeholder="MariaHilss@correo.com" required class="place-form2">
                    <label for="date" class="labe">Fecha de nacimiento</label>
                    <input type="date" name="date" required class="place-form2" id="sms"></input>
                    <label for="direccion" class="labe">Dirección</label>
                    <input type="text" name="direccion" placeholder="Avenida siempreviva 123" required class="place-form2">
                  </div>
                    <button type="submit" class="enviar p-2 bg-primary text-light rounded-pill border-0">Guardar cambios</button>
                </div>
              </fieldset>
            </form>
          </div>
        </div>
      </section>
    </div>
    
    
    

    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    
  </body>
</html>
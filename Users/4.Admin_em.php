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
    <link rel="stylesheet" href="admin.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
    <title>Dashboard</title>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.2/css/dataTables.dataTables.css" />
    <script src="https://cdn.datatables.net/2.1.2/js/dataTables.js"></script>
  </head>
    <script>
      $(document).ready( function () {
          $('#myTable').DataTable(
            {
              "language": {
                "url": "//cdn.datatables.net/plug-ins/2.1.2/i18n/es-MX.json"
              }
            }
          );
      } );
      $(document).ready( function () {
          $('#Table').DataTable(
            {
              "language": {
                "url": "//cdn.datatables.net/plug-ins/2.1.2/i18n/es-MX.json"
              }
            }
          );
      } );
    </script>
  <body>
    <div class="d-flex position-fixed">
        <div id="sidebar" class="bg-primary">
            <div class="logo">
              <a class="nav-link fw-bold d-flex flex-column align-content-center flex-wrap p-2 border-bottom " href="#">
                <img src="../images/User1.jpg" alt="user photo" class="ing-fluid rounded-circle avatar m-2 border border-2 display display-flex">
                Admin
              </a>
            </div>
            <div class="menu">
              <a href="./1.perfil.php" class="d-block text-light p-3"><i class="icon ion-md-person m-2 lead"></i>Perfil</a>
              <a href="./2.bandeja.php" class="d-block text-light p-3"><i class="icon ion-md-notifications m-2 lead"></i>Notificaciones</a>
              
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
              <a href="../php/cerrar_login.php" class="badge d-block text-light text-center p-3 " style="position: absolute; bottom: 0; margin-bottom: 5px; margin-left: 22px;">Cerrar sesión<i class="icon ion-md-exit m-2 lead"></i></a>
            </div>
        </div>
    </div>
    <div class="content">
      <section>
        <div class="container">
          <h2 class="m-5 text-black">Registro empleados</h2>
          <form method="POST" action="" class="">
            <fieldset>
              <div class="d-block border border-black container p-3">
                  <section class="d-flex " style="">
                    <div class="row">
                      <div class="on col-lg-5"><!-- columna -->
                        <Label for="name" class="labe">Nombre</Label>
                        <input type="text" name="nombre" id="nombre" placeholder="Maria" required class="place-form">
                        <label for="e-mail" class="labe">Correo electrónico</label>
                        <input type="text" name="email" id="email" placeholder="MariaHilss@correo.com" required class="place-form">
                        <label for="country" class="labe">País</label>
                        <input type="text" name="pais" id="pais" placeholder="Colombia" required class="place-form">
                        <label for="user" class="labe">Usuario</label>
                        <input type="text" name="usuario" id="usuario" placeholder="#" required class="place-form">
                      </div>                   
                      <div class="tw col-lg-5"><!-- columna -->
                        <label for="last name" class="labe">Apellido</label>
                        <input type="text" name="apellido" id="apellido" placeholder="Hills" required class="place-form">
                        <label for="date" class="labe">Fecha de nacimiento</label>
                        <input type="date" name="fecha" id="fenac" required class="place-form" id="sms" style="width: 215px;"></input>
                        <label for="region" class="labe">Departamento</label>
                        <input type="text" name="departamento" id="departamento" placeholder="Atlántico" required class="place-form">
                        <label for="password" class="labe">Contraseña</label>
                        <input type="password" name="contrasena" id="contrasena" placeholder="#" required class="place-form">
                      </div>
                    </div>
                    <div class="row " style="margin-left:-80px;">
                        <div class="col-lg-5"><!-- columna -->
                          <label for="" class="labe">Cedula</label>
                          <div style="display:flex"><input type="number" id="cedula" name="cedula" placeholder="123456789" required class="place-form"><button type="button" id="buscarLupa" style="border:0; background:none;"><i class="icon ion-md-search lead"></i></button></div>
                          <label for="direccion" class="labe">Dirección</label>
                          <input type="text" name="direccion" id="direccion" placeholder="Avenida siempreviva 123" required class="place-form">
                          <label for="city" class="labe">ciudad</label>
                          <input type="text" name="ciudad" id="ciudad" placeholder="Barranquilla" required class="place-form">
                          <label for="direccion" class="labe">G. Sanguineo</label>
                          <input type="text" name="gsanguineo" id="gsanguineo" placeholder="Avenida siempreviva 123" required class="place-form">
                          
                        </div>
                      
                        <div class="col-lg-5" style="margin-left:30px;"><!-- columna -->
                          <label for="" class="labe">Contacto</label>
                          <input type="contact" name="telefono" id="telefono" placeholder="3005006060" required class="place-form">
                          <label for="direccion" class="labe">n° residencia</label>
                          <input type="text" name="numerorec" id="numerorec" placeholder="Avenida siempreviva 123" required class="place-form">
                          <label for="direccion" class="labe">Barrio</label>
                          <input type="text" name="barrio" id="barrio" placeholder="Avenida siempreviva 123" required class="place-form">
                          <label for="direccion" class="labe">Código postal</label>
                          <input type="text" name="cpostal" id="cpostal" placeholder="Avenida siempreviva 123" required class="place-form">

                        </div>
                    </div>  
                  </section>              
                  <section style="margin-left: 30px; margin-top:30px;">
                    <button type="submit" class="envia p-2 bg-primary text-light rounded-pill border-0">Crear usuario</button>
                    <button type="submit" class="envia p-2 bg-primary text-light rounded-pill border-0">Modificar usuario</button>
                    <button type="submit" class="envia p-2 bg-primary text-light rounded-pill border-0">Eliminar usuario</button>
                  </section>
              </div>
            </fieldset>
          </form>
        </div>

        <div class="container text-black">
            <h2 class="m-5">Panel empleados</h2>
            <div class="container border border-black">
                <table id="Table" class="display m-2 border">
                    <thead>
                        <tr>
                          <th><i class="icon ion-md-calendar"></i> Empleado</th>
                          <th><i class="icon ion-md-alarm"></i> Rol</th>
                          <th><i class="icon ion-md-list"></i> N°. Ausencias</th>
                          <th><i class="icon ion-md-list"></i> Hr. Laboradas</th>
                          <th><i class="icon ion-md-list"></i> Mes </th>
                          <th><i class="icon ion-md-link"></i> Novedades Pendientes</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>(Nombre)</td>
                            <td>Caja</td>
                            <td>Sin registrar</td>
                            <td>HH:MIN</td>
                            <td>MM</td>
                            <td><a href="#"><i class="icon ion-md-checkmark"></i></a></td>
                        </tr>
                        <tr>
                          <td>(Nombre)</td>
                          <td>Almacen</td>
                          <td>Sin registrar</td>
                          <td>HH:MIN</td>
                          <td>MM</td>
                          <td><a href="#"><i class="icon ion-md-checkmark"></i></a></td>
                       </tr>
                        <tr>
                          <td>(Nombre)</td>
                          <td>Almacen</td>
                          <td>1</td>
                          <td>HH:MIN</td>
                          <td>MM</td>
                          <td><i class="icon ion-md-alert"></i></td>
                        </tr>                          
                    </tbody>
                    
                  </table>
            </div>
        </div>

        <div class="container text-black">
          <h2 class="m-5">Registro del empleado (Seleccionado  ⬆)</h2>
          <div class="container border border-black">
            <table id="myTable" class="display m-2">
                <thead>
                    <tr>                  
                      <th><i class="icon ion-md-calendar"></i> Fecha</th>
                      <th><i class="icon ion-md-alarm"></i> Horas laboradas</th>
                      <th><i class="icon ion-md-list"></i> N°. Descansos</th>
                      <th><i class="icon ion-md-list"></i> Hr. Inicio</th>
                      <th><i class="icon ion-md-list"></i> Hr. Fin</th>
                      <th><i class="icon ion-md-link"></i> Novedades</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>DD/MM/AAAA</td>
                        <td>HH:MM:SS</td>
                        <td>1</td>
                        <td>HH:MIN</td>
                        <td>HH:MIN</td>
                        <td><a href="#"><i class="icon ion-md-checkmark"></i></a></td>
                    </tr>
                    <tr>
                      <td>DD/MM/AAAA</td>
                      <td>HH:MM:SS</td>
                      <td>1</td>
                      <td>HH:MIN</td>
                      <td>HH:MIN</td>
                      <td><a href="#"><i class="icon ion-md-checkmark"></i></a></td>
                   </tr>
                    <tr>
                      <td>DD/MM/AAAA</td>
                      <td>HH:MM:SS</td>
                      <td>Sin registrar</td>
                      <td>HH:MIN</td>
                      <td>HH:MIN</td>
                      <td><i class="icon ion-md-alert"></i></td>
                    </tr>                          
                </tbody>                
              </table>
          </div>          
        </div>
        
        <div class="container text-black">
            <h2 class="m-5">Ausencias (Seleccionado  ⬆)</h2>
            <div class="container border border-black p-4 mb-5">
                <div class="row">
                    <div class="col-lg-1 mt-2"><i class="icon ion-md-calendar"></i> Fecha</div>
                    <div class="col-lg-3"><button class="border-0 p-2 bg-primary rounded-pill text-light"> Aceptar/rechazar novedad</button></div>
                </div>
                <textarea name="" id="" class="mt-2"></textarea>
                <a href="" class="d-block"><i class="icon ion-md-document"></i> #</a>
            </div>
        </div>
      </section>
    </div>
    
    
    

    <script src="/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {
            $('#buscarLupa').click(function() {
                let cedula = $('#cedula').val();
                if(cedula) {
                    $.ajax({
                        url: '../php/buscar_usuario.php',
                        type: 'POST',
                        data: { cedula: cedula },
                        dataType: 'json',
                        success: function(data) {
                            if (data.success) {
                                $('#nombre').val(data.nombre);
                                $('#apellido').val(data.apellido);
                                $('#telefono').val(data.telefono);
                                $('#email').val(data.email);
                                $('#fenac').val(data.fnac);
                                $('#gsanguineo').val(data.gsanguineo);              
                            } else {
                                alert("Usuario no encontrado.");
                            }
                        }
                    });
                } else {
                    alert("Por favor ingresa una cédula.");
                }
            });
        });
    </script>
    
  </body>
</html>
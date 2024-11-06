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
    <link rel="stylesheet" href="Admin.css">
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
        <div class="container text-black">
          <h2 class="m-5">Panel de gestión</h2>
          <div class="">
            <div class="wysiwyg">

            <main>
                <section id="resulta" role="timer" aria-live="polite" aria-atomic="true">
                    <span class="tiempo">00</span><span class="medida"> s</span>
                </section>

                <section id="navegacion">
                    <nav aria-label="Botonera">
                        <button id="inicia" title="Iniciar">
                            <i class="bi bi-play-fill"></i>
                            <span class="sr">Iniciar</span>
                        </button>
                        <button id="contin" title="Continuar">
                            <i class="bi bi-play"></i>
                            <span class="sr">Continuar</span>
                        </button>
                        <button id="parate" title="Parar">
                            <i class="bi bi-pause-fill"></i>
                            <span class="sr">Parar</span>
                        </button>
                        <button id="cuenta" title="Contar 10" class="espacio">
                            <i class="bi bi-stopwatch"></i>
                            <span class="sr">Contar 10</span>
                        </button>
                        <div id="grBotones">
                            <button id="guarda" title="Guardar">
                                <i class="bi bi-plus-lg"></i>
                                <span class="sr">Guardar</span>
                            </button>
                            <button id="histor" title="Historial">
                                <i class="bi bi-list-ol"></i>
                                <span class="sr">Historial</span>
                            </button>
                            <button id="borrar" title="Borrar">
                                <i class="bi bi-x-lg"></i>
                                <span class="sr">Borrar</span>
                            </button>
                        </div>
                    </nav>
                </section>
                
                <section id="listado" role="region" aria-live="polite"></section>
            </main>
          </div>
          

        </div>
        <div class="container text-black">
          <h2 class="m-5">Registro Matutino</h2>
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
                      <td>Sin registrar</td>
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
                    <td>1</td>
                    <td>HH:MIN</td>
                    <td>HH:MIN</td>
                    <td><i class="icon ion-md-alert"></i></td>
                  </tr>                          
              </tbody>
              
            </table>
          </div>
        </div>
      </section>
    </div>
    
    
    

    <script src="/script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    
  </body>
</html>
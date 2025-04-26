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
        <div class="forma p-3">
          <form action="" class=""></form>
            <fieldset>
              <legend class="text-center text-black mt-5 m-5"><h2>Inventario</h2></legend>
              <div class="inv col-lg-6 container border border-black">
                <div class="row">
                  <div class="d-flex flex-column col-lg-4">
                      <Label for="name" class="labe">Producto: </Label>
                      <input type="text" name="nombre" placeholder="Seleccione..." required class="place-form1"> 
                      <label for="e-mail" class="labe">Título</label>
                  <input type="text" name="email" placeholder="..." required class="place-form2">
                  </div>
                  <div class="one col-lg-4 d-flex flex-column">
                    <Label for="name" class="labe">ISQN:</Label>
                    <input type="text" name="nombre" placeholder="..." required class="place-form1"> 
                    <label for="" class="labe">Autor</label>
                    <input type="number" name="cedula" placeholder="..." required class="place-form1">                   
                     
                  </div>                   
                  <div class="two col-lg-4 d-flex flex-column">
                    <label for="last name" class="labe">Categoría</label>
                      <input type="text" name="apellido" placeholder="Seleccione..." required class="place-form1">
                    <label for="" class="labe">Editorial</label>
                    <input type="contact" name="telefono" placeholder="..." required class="place-form1">
                  </div>
                </div>
                <div class="three col-lg-4 d-flex flex-column">
                  
                  <label for="date" class="labe">U. Bodega.</label>
                  <input type="text" name="date" required class="place-form2" id="sms"></input>
                </div>
                  <button type="submit" class="envia p-2 bg-primary text-light rounded-pill border-0 mt-4 mb-2">Guardar cambios</button>
                  <button type="submit" class="envia p-2 bg-primary text-light rounded-pill border-0 mt-4 mb-2">Modificar cambios</button>
                  <a href="" class="text-black m-3 rounded pill"><i class="icon ion-md-add"></i> añadir similar</a>
              </div>
            </fieldset>
      </div>

        <div class="container text-black">
          <h2 class="text-center m-5">Registros recientes</h2>
          <div class="container border border-black">
            <table id="myTable" class="display">
              <thead>
                  <tr>
                    <th><i class="icon ion-md-calendar"></i> Fecha ingreso</th>
                    <th><i class="icon ion-md-list"></i> ISQN</th>
                    <th><i class="icon ion-md-list"></i> Autor</th>
                    <th><i class="icon ion-md-list"></i> Título</th>
                    <th><i class="icon ion-md-list"></i> Categoría</th>
                    <th><i class="icon ion-md-list"></i> Editorial</th>
                    <th><i class="icon ion-md-list"></i> Cantidad</th>
                    <th><i class="icon ion-md-list"></i> U. Bodega</th>
                  </tr>
              </thead>
              <tbody>
                  <tr>
                      <td>DD/MM/AAAA</td>
                      <td>ISSN 0317-8471</td>
                      <td>(Nombre)</td>
                      <td>(Nombre)</td>
                      <td>Literatura</td>
                      <td>Empresa</td>
                      <td>50</td>
                      <td>A3ES14</td>
                  </tr>
                  <tr>
                      <td>DD/MM/AAAA</td>
                      <td>ISSN 0317-8471</td>
                      <td>(Nombre)</td>
                      <td>(Nombre)</td>
                      <td>Literatura</td>
                      <td>Empresa</td>
                      <td>50</td>
                      <td>A3ES14</td>
                 </tr>
                  <tr>
                      <td>DD/MM/AAAA</td>
                      <td>ISSN 0317-8471</td>
                      <td>(Nombre)</td>
                      <td>(Nombre)</td>
                      <td>Literatura</td>
                      <td>Empresa</td>
                      <td>50</td>
                      <td>A3ES14</td>
                  </tr>                          
              </tbody>
              
            </table>
          </div>
        </div>
      </section>
    </div>
    
    
    

    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    
  </body>
</html>
<?php
//print_r($_SESSION);

    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

//print_r($_SESSION);
if(!isset($_SESSION['tipo'])){
    $mensaje="Es necesacio iniciar sesecion";
    header('Location:../../../../index.php?mensaje=' . $mensaje);
    exit();
    /*comontar los prin.re despues de que funciones*/ 
}

?>
  <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="#">I.A</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
        <a class="nav-link" href="../../../back-end/controladores/usuarios_controlador.php?opcion=5">cerrar sesion</a>
      </li>
    </ul>
  </nav>

  <div class="container-fluid">
    <div class="row">
      <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
        <div class="sidebar-sticky pt-3">
          <ul class="nav flex-column">


            <li class="nav-item">
              <a class="nav-link active" href="../guardias/index.php">
                <span data-feather="home"></span>
                Guardias<span class="sr-only">(current)</span>
              </a>
            </li>

            <?php
               /*!=distindo de == igual a */ 
               if($_SESSION['tipo']=="admin"){
                ?>

            <li class="nav-item">
              <a class="nav-link"  href="../productos/index.php">
                <span data-feather="file"></span>
                Productos
              </a>
            </li>

            <?php
               }
            ?>
            
            <li class="nav-item">
              <a class="nav-link" href="../ventas/index.php">
                <span data-feather="users"></span>
                ventas
              </a>
            </li>
            
            <?php
               /*!=distindo de == igual a */ 
               if($_SESSION['tipo']!="perso"){
                ?>
            <li class="nav-item">
              <a class="nav-link" href="../servicios/index.php">
                <span data-feather="bar-chart-2"></span>

                   servicios         
                       </a>
                       </li>

                       <?php
               }
            ?>


                       <?php
               /*!=distindo de == igual a */ 
               if($_SESSION['tipo']=="perso"){
                ?>
                       <li class="nav-item">
              <a class="nav-link" href="../Alarmas/index.php">
                <span data-feather="users"></span>
                Alarmas
              </a>
            </li>

            <?php
               }
            ?>

<?php
               /*!=distindo de == igual a */ 
               if($_SESSION['tipo']!="perso"){
                ?>
                       <li class="nav-item">
              <a class="nav-link" href="../usuarios/index.php">
                <span data-feather="users"></span>
                Usuarios
              </a>
            </li>

            <?php
               }
            ?>




              <li class="nav-item">
              <a class="nav-link" href="../../publico/seciones/index.php">
                <span data-feather="users"></span>
                Paguina de inicio 
              </a>
            </li>
            
          </ul>
        </div>
      </nav>
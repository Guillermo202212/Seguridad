<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
  <h5 class="my-0 mr-md-auto font-weight-normal">Seguridad</h5>
  <nav class="my-2 my-md-0 mr-md-3">
    <a class="p-2 text-dark" href="index.php">compra</a>
    <a class="p-2 text-dark" href="../index.php">inicio</a>
    <a class="p-2 text-dark" href="nostrarcarrito.php">carrito (<?php
    echo (empty($_SESSION['carrito']))?0:count($_SESSION['carrito']);
    ?>)</a>
   
  </nav>
  <a class="btn btn-outline-primary" href="../../../../back-end/controladores/servivios_controlador.php?opcion=5">cerrar</a>
</div>



<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
  <h1 class="display-4" >seguridad</h1>
  <p class="lead"></p>
</div>
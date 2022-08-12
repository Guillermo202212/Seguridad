<?php

if (isset($_REQUEST['borrar']) && isset($_REQUEST['editar']) && isset($_REQUEST['crear']))





?>

<h2>REGISTRO DE DATOS </h2>
<form action="../../../back-end/controladores/Alarmas_controladores.php" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
  <input type="hidden" name="opcion" value="1">
  <div class="form-row">

    <div class="col-md-2 mb-3">
      <label for="validationCustom01">id</label>
      <input type="number" class="form-control" name="id" id="validationCustom01" readonly>
      <div class="valid-feedback">
      ¡Se ve bien!      </div>
    </div>


    <div class="col-md-2 mb-3">
      <label for="validationCustom04">tipo</label>
      <select class="custom-select" id="validationCustom02" name="tipo" required>
        <option selected disabled value="">eliga</option>
        <option>Alarma tipo 1</option>
        <option>Alarma tipo 2</option>
        <option>Alarma tipo 3</option>

      </select>
      <div class="invalid-feedback">
      ¡Se ve bien!      </div>
    </div>


  </div>



  <div class="col-md-2 mb-3">
      <label for="validationCustom04">Area</label>
      <select class="custom-select" id="validationCustom02" name="Area" required>
        <option selected disabled value="">eliga</option>
        <option>Zona A</option>
        <option>Zona B</option>   
        <option>Zona C</option>
        <option>Zona D</option>


      </select>
      <div class="invalid-feedback">
      ¡Se ve bien!      </div>
    </div>


  <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
      <label class="form-check-label" for="invalidCheck">
      Debe estar de acuerdo antes de enviar.    </label>
      <div class="invalid-feedback">
      </div>
    </div>
  </div>
  <button class="btn btn-primary" type="submit">Enviar</button>
</form>

<?php



?>
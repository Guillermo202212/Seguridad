<?php
if (isset($_REQUEST['id']) && isset($_REQUEST['borrar'])) {
  $Alarmas->id = $_REQUEST['id'];
  $resultado = $Alarmas->obtener_id();
  $Al = $resultado[0];

?>

  <h2>MOSTRAR DATOS </h2>
  <form action="../../../back-end/controladores/Alarmas_controladores.php" method="post" class="needs-validation" novalidate>
    <input type="hidden" name="opcion" value="3">
    <div class="form-row">


      <div class="col-md-2 mb-3">
        <label for="validationCustom01">id</label>
        <input type="number" class="form-control" name="id" id="validationCustom01" value="<?php echo $Al->id  ?>" readonly>
        <div class="valid-feedback">
        ¡Se ve bien!        </div>
      </div>



      <div class="col-md-2 mb-3">
      <label for="validationCustom04">tipo</label>
      <select class="custom-select" id="validationCustom02" name="tipo" value="<?php echo $Al->tipo  ?>" disabled>
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
      <select class="custom-select" id="validationCustom02" name="Area" value="<?php echo $Al->Area  ?>" disabled>
        <option selected disabled value="">eliga</option>
        <option>Zona A</option>
        <option>Zona B</option>   
        <option>Zona C</option>
        <option>Zona D</option>


      </select>
      <div class="invalid-feedback">
      ¡Se ve bien!      </div>
    </div>

     

      
    </div>


    <button class="btn btn-primary" type="submit">Enviar</button>
  </form>

<?php
}
?>
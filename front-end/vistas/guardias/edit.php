<?php
if (isset($_REQUEST['id']) && isset($_REQUEST['editar'])) {
  $guardias->id = $_REQUEST['id'];
  $resultado = $guardias->obtener_id();
  $gua = $resultado[0];

?>

  <h2>EDIATAR DATOS</h2>
  <form action="../../../back-end/controladores/guardias_comtrolador.php" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
    <input type="hidden" name="opcion" value="2">
    <div class="form-row">


      <div class="col-md-2 mb-3">
        <label for="validationCustom01">id</label>
        <input type="number" class="form-control" name="id" id="validationCustom01" value="<?php echo $gua->id  ?>" readonly>
        <div class="valid-feedback">
        ¡Se ve bien!        </div>
      </div>
      <div class="col-md-3 mb-3">
        <label for="validationCustom02">apellidos</label>
        <input type="text" class="form-control" name="apellidos" id="validationCustom02" maxlength="20" pattern="[A-Za-z]{1,20}" value="<?php echo $gua->apellidos  ?>" required>
        <div class="valid-feedback">
        ¡Se ve bien!        </div>
      </div>
    </div>
    <div class="form-row">
      <div class="col-md-3 mb-3">
        <label for="validationCustom03">nombres</label>
        <input type="text" class="form-control" id="validationCustom02" name="nombres" maxlength="20" value="<?php echo $gua->nombres  ?>" required>
        <div class="invalid-feedback">
        ¡Se ve bien!        </div>
      </div>
      <div class="col-md-2 mb-3">
        <label for="validationCustom04">genero</label>
        <select class="custom-select" id="validationCustom02" name="genero" value="<?php echo $gua->genero  ?>" required>
          <option selected disabled value="">eliga</option>
          <option>HOMBRE</option>
          <option>MUGER</option>
        </select>
        <div class="invalid-feedback">
        ¡Se ve bien!        </div>
      </div>

      <div class="col-md-2 mb-3">
        <label for="validationCustom04">estatus</label>
        <select class="custom-select" id="validationCustom02" name="estatus" value="<?php echo $gua->estatus  ?>" required>
          <option selected disabled value="">eliga</option>
          <option>Activo</option>
          <option>Inactivo</option>
        </select>
        <div class="invalid-feedback">
        ¡Se ve bien!        </div>
      </div>

      <div class="col-md-2 mb-3">
        <input type="hidden" name="foto_actual" value="<?php echo $gua->foto  ?>" >
        <img src="../../back-end/images/guardias/<?php echo $gua->foto  ?>" alt="foto de personnal" width="150" height="150">
        <label for="validationCustom03"><?php echo $gua->foto  ?> </label>
        <input type="file" name="foto" accept="image/*" class="form-control" id="validationCustom02">
        <div class="valid-feedback">
        ¡Se ve bien!        </div>
      </div>
    </div>


    </div>
     <div class="col-md-2 mb-3">
      <label for="validationCustom01">telefono</label>
      <input type="number" class="form-control" name="telefono" id="validationCustom01" value="<?php echo $gua->telefono  ?>"required>
      <div class="valid-feedback">
      ¡Se ve bien!      </div>
  
    </div> 



    <button class="btn btn-primary" type="submit">Enviar</button>
  </form>

<?php
}
?>
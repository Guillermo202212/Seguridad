<?php

//print_r($registros);
if(isset($_GET['mensaje'])){
?>
   <div class="alert alert-info alert-dismissible fade show" role="alert">
     <strong> <?php  echo $_GET['mensaje'];   ?> </strong> 
     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
       <span aria-hidden="true">&times;</span>
     </button>
   </div>
<?php
   
}
?>

  <div class="table-responsive">
    <table class="table table-striped table-sm">
      <thead>
        <tr>

          <th>ID</th>
          <th>Apellidos</th>
          <th>Nombres</th>
          <th>Genero</th>
          <th>Estatus</th>
          <th>Telefono</th>

          <th>Foto</th>
          <th>Editar</th>
          <th>Borrar</th>

        </tr>
      </thead>
      <tbody>

        <?php
        $resultado = $guardias->obtener_too();

        foreach ($resultado as $gua) {


        ?>
          <tr>
            <td> <?php echo $gua->id ?> </td>
            <td> <?php echo $gua->apellidos ?> </td>
            <td><?php echo $gua->nombres ?> </td>
            <td><?php echo $gua->genero ?> </td>
            <td><?php echo $gua->estatus ?></td>
            <td><?php echo $gua->telefono ?></td>

            <td><img src="../../../back-end/images/guardias/<?php echo $gua->foto ?>" alt="foto de guardias" width="150" height="150"></td>
            <td> <a href="index.php?editar&id= <?php echo $gua->id ?>"> Editar </a> </td>
            <td><a href="index.php?borrar&id= <?php echo $gua->id ?>"> Borrar </a></td>
          </tr>
        <?php

        }
        ?>



      </tbody>
    </table>
  </div>
  </main>
  </div>
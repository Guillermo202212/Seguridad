<?php

//print_r($registros);
if(isset($_GET['mensaje'])){
?>
   <div class="alert alert-danger alert-dismissible fade show" role="alert"> 
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
          <th>tipo</th>
          <th>Area</th>
          <th>fecha</th>
          <th>Borrar</th>

        </tr>
      </thead>
      <tbody>

        <?php
        $resultado = $Alarmas->obtener_too();

        foreach ($resultado as $Al) {


        ?>
          <tr>
            <td> <?php echo $Al->id ?> </td>
            <td> <?php echo $Al->tipo ?> </td>
            <td><?php echo $Al->Area ?> </td>
            <td><?php echo $Al->fecha ?> </td>

        <td><a href="index.php?borrar&id= <?php echo $Al->id ?>"> Borrar </a></td>
          </tr>
        <?php

        }
        ?>



      </tbody>
    </table>
  </div>
  </main>
  </div>
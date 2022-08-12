
<?php
include_once '../../../../back-end/modelos/config_db.php';
include 'carrito.php';



?>

<?php
include 'templade/link.php';
include 'templade/navar.php';


?>





<div class="container">

 
<br> 
<?php

if($mensaje!=""){
?>
  <div class="alert alert-success" >

  <?php echo $mensaje;?>
    <a   href="nostrarcarrito.php"> ver  ...carrito </a>
  </div>
  <?php
}
?>

<?php

include_once "../../../../back-end/modelos/servicios.php";

$servicios = new servicios;
$resultado = $servicios->obtener_too();
//print_r($resultado);


?>

<?php foreach($resultado as $pro){

?>

<div class="card-deck mb-3 text-center">
    <div class="card mb-4 shadow-sm">
      <div class="card-header">
        <h4 class="my-0 font-weight-normal"> </h4>
      </div>
      <div class="card-body">

        <h1 class="card-title pricing-card-title">$<?php echo $pro->precio ?> <small class="text-muted">/USD</small></h1>
        <ul class="list-unstyled mt-3 mb-4">
        <li><img src="../../../../back-end/images/servicios/<?php echo $pro->foto ?>" alt="foto del producto" width="300" height="300" 
        title="<?php echo $pro->nombre ?>"
        data-toggle="popover"
        data-trigger="hover"
        data-content="<?php echo $pro->descripcion ?>"></li>
        <li><?php echo $pro->nombre ?></li>
          <li></li>
        </ul>


<form action="" method="post">
  <input type="hidden" name="id" id="id" value="<?php echo openssl_encrypt($pro->id,COD,KEY) ?>">
  <input type="hidden" name="nombre" id="nombre" value="<?php echo openssl_encrypt($pro->nombre,COD,KEY) ?>">
  <input type="hidden" name="precio" id="precio" value="<?php echo openssl_encrypt($pro->precio,COD,KEY)?>">
  <input type="hidden" name="cantidad" id="cantidad" value="<?php echo openssl_encrypt(1,COD,KEY) ?>">
  
<button type="submit" class="btn btn-lg btn-block btn-outline-primary"  
 name="btnAccion" value="agregar">Comprar</button>


</form>

</div>
  </div>
  </div>

      

    <?php
}
?>

</div>
  </div>
  </div>


    
    <?php
    include 'templade/footer.php';

?>






<script>


$(function () {
  $('[data-toggle="popover"]').popover()
});


</script>

    
 

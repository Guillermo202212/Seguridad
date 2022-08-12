<?php
include 'carrito.php';

?>

<?php
include 'templade/link.php';
include 'templade/navar.php';


?>

<br>
<h3>Lista del carrito </h3>
<?PHP  if(!empty($_SESSION['carrito'])){?>
<table class="table table-light table-bordered">
    <tbody>
        <tr>
            <th width="40%" >descripcion</th>
            <th width="15%" class="text-center"> cantidad</th>
            <th width="20%"  class="text-center"> precio</th>
            <th width="20%"  class="text-center">total</th>
            <th width="5%" >--</th>
        </tr>
<?php $total=0;?>
<?php foreach ($_SESSION ['carrito'] as $indice=> $pro) {
    
?>
        <tr>
         <td width="40%"> <?php echo $pro['nombre'];?></td>
         <td width="15%"  class="text-center"><?php echo $pro['cantidad']; ?></td>
         <td width="20%"  class="text-center"><?php echo $pro['precio']; ?></td>
         <td width="20%"  class="text-center"><?php echo number_format($pro['precio']*$pro['cantidad'],2); ?></td>
         <td width="5%">
<form action="" method="post">
  <input type="hidden" name="id" id="id" value="<?php echo ($pro['id']) ?>">

<button class="btn btn-danger" type="submit" name="btnAccion" value="Eliminar">Eliminar</button>
</form> </td>        
        </tr>

        <?php $total=$total+($pro['precio']*$pro['cantidad']);?>

        <?php }?>

<tr>
    <td colspan="3" align="right" ><h3>Total</h3></td>
    <td align="right"> <h3>$<?php echo number_format($total,2)?></h3></td>
    <td></td>
</tr>


<tr>
<td colspan="5"> 
 <form action="pagar.php" method="post">
 <div class="alert alert-success" role="alert">
 <div class="form-group">
    <label for="my-input">correo de contacto:</label>
    <input id="email" name="email" class="form-control" type="email" placeholder="prorfavo escrive tu correo  " required>
     </div>
     <small id="emailHelp" class="form-text text-muted">
        los productos de enviaran a este correo
     </small>
</div>  
<button class="btn btn-primary btn-lg btn-block  " type="submit" value="proceder"
name="btnAccion"
>proceder a pagar >></button>
  </form>
</td>
</tr>

    </tbody>
</table>
<?PHP  } else{?>

<div class="alert alert-success" role="alert">
    No hay productos en el carrito
</div>

    <?PHP
      } 
    ?>

<?php
    include 'templade/footer.php';

?>
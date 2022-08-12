<?php
include_once '../../../../back-end/modelos/config_db.php';
include 'carrito.php';
//include_once '../../../back-end/modelos/ventas.php';
include_once '../../../../back-end/modelos/crud.php';


?>

<?php
include 'templade/link.php';
include 'templade/navar.php';


?>




<?php
if($_POST){
    $total=0;
    $Sid=session_id();
    $correo=$_POST['email'];
   // $fecha='NOW()';
   // $correo='us1@gmial.com';

    foreach($_SESSION ['carrito'] as $indice=> $pro){

        $total=$total+($pro['precio']*$pro['cantidad']);
        
 

    }


    $conexion = new  config_db();
    
    $con = $conexion->get_con();
   /* $stmt = $con->prepare("INSERT INTO ventas ( claveTransaccion, paypalDatos,fecha,correo,total,estatus)
    VALUES ('25154587fg','ewrefwefewf',04/08/2022 ,'eduado@gmail.com', 1005.35 ,'pendiente')");*/

    $stmt = $con->prepare("INSERT INTO ventas ( claveTransaccion, fecha, paypalDatos, estatus,total , correo)
  VALUES ( :claveTransaccion,  getdate() ,'' , 'pendiente' , :total , :correo)");
    $stmt->bindParam(':claveTransaccion',$Sid);
    //$stmt->bindParam(':fecha',$fecha);
    //$stmt->bindParam(':paypalDatos', $this->paypalDatos);
   // $stmt->bindParam(':estatus', $this->estatus);
    $stmt->bindParam(':total',$total);
    $stmt->bindParam(':correo',$correo);
    
    //ejecucar query
    $stmt->execute();
     
    $idventa=$con->lastInsertId();


    foreach($_SESSION ['carrito'] as $indice=> $pro){

      $conexion = new  config_db();
    
      $con = $conexion->get_con();

      $stmt = $con->prepare("INSERT INTO Detallesventas (idventa,idproducto,preciounitario,cantidad,descargado)VALUES 
      (:idventa,:idproducto,:preciounitario,:cantidad, '0' )");

$stmt->bindParam(':idventa',$idventa);
$stmt->bindParam(':idproducto',$pro['id']);
$stmt->bindParam(':preciounitario',$pro['precio']);
$stmt->bindParam(':cantidad',$pro['cantidad']);
//$stmt->bindParam(':descargado',$descargado);

//ejecucar query
$stmt->execute();
  
  }






  
   // echo "<h3> ".$total."</h3>";

}
?>
<div class="jumbotron" class="text-center">
  <h1 class="display-4"> ¡Paso final!</h1>
  <hr class="my-4">

  <p class="lead">Estas a punto de pagas con paypal la cantidad de:
    <h4> $<?php echo number_format($total,2);  ?></h4>

</p>
  <p>Los boletos los podras descargas una vez se procese el pago  </p></br>
  <strong>Nota:No es necesario imprimir cuidemos el planeta</strong>
  <strong>(Para dudas y aclaraciones en : 33 17 06 17 43)</strong>
</div>




<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>
  <body>
    <!-- Replace "test" with your own sandbox Business account app client ID -->
    <script src="https://www.paypal.com/sdk/js?client-id=test&currency=USD"></script>
    <!-- Set up a container element for the button -->
    <div id="paypal-button-container"></div>
    <script>
      paypal.Buttons({
        // Sets up the transaction when a payment button is clicked
        createOrder: (data, actions) => {
          return actions.order.create({
            purchase_units: [{
              amount: {
                value: '77.44' // Can also reference a variable or function
              }
            }]
          });
        },
        // Finalize the transaction after payer approval
        onApprove: (data, actions) => {
          return actions.order.capture().then(function(orderData) {
            // Successful capture! For dev/demo purposes:
            console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
            const transaction = orderData.purchase_units[0].payments.captures[0];
            alert(`Transaction ${transaction.status}: ${transaction.id}\n\nSee console for all available details`);
            // When ready to go live, remove the alert and show a success message within this page. For example:
            // const element = document.getElementById('paypal-button-container');
            // element.innerHTML = '<h3>Thank you for your payment!</h3>';
            // Or go to another URL:  actions.redirect('thank_you.html');
          });
        }
      }).render('#paypal-button-container');
    </script>
  </body>
</html>




<?php
    include 'templade/footer.php';

?>
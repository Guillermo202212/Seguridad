<?php




//print_r($_SESSION);
session_start();
//print_r($_SESSION);
if(!isset($_SESSION['tipo'])){
    $mensaje="Es necesacio iniciar sesion";
    header('Location:../../../../index.php?mensaje=' . $mensaje);
    exit();

}


/*rescricion para que solo en admin pueda ver esta parte*/ 
if($_SESSION['tipo']!="admin"){
    $mensaje="No tienes autorizacion para entrar en este sitio";
    header('Location:../dashboard/index.php?mensaje=' . $mensaje);
    exit();
}




include_once "../../../back-end/modelos/guardias.php";

$guardias = new guardias;
$resultado = $guardias->obtener_too();
//print_r($resultado);
?>



<?php
include_once "../dashboard/head.php"

?>

<?php
include_once "../dashboard/navabar.php"

?>

<?php
include_once "../dashboard/main.php"

?>



<?php
include_once "../dashboard/scrip.php"

?>






<?php


include "create.php";

include "data.php";

include "edit.php";

include "show.php";

?>










</div>


</div>
</main>
</div>
</div>





</body>

</html>
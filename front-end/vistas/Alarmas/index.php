<?php






include_once "../../../back-end/modelos/Alarmas.php";

$Alarmas = new Alarmas;
$resultado = $Alarmas->obtener_too();
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


include "show.php";

?>










</div>


</div>
</main>
</div>
</div>





</body>

</html>
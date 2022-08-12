<?php
require_once "../modelos/Alarmas.php";

print_r($_POST);
//echo "BR";
//print_r($_FILES);

if (isset($_REQUEST['opcion'])) {
    $opcion = $_REQUEST['opcion'];
    switch ($opcion) {
        case 1: //crear


            if (
                isset($_REQUEST['Area']) 
                && isset($_REQUEST['tipo'])
            ) {
                

                $Alarmas = new Alarmas ();
                $Alarmas->Area = $_REQUEST['Area'];
                $Alarmas->tipo = $_REQUEST['tipo'];


                $resultado = $Alarmas->crear();
                $mensaje = "";

                if ($resultado == 1) {

                    echo $mensaje = "Se notifico a las autoridades adecuadas";
                    header('Location: ../../front-end/vistas/Alarmas/index.php?mensaje=' . $mensaje);
                    exit();
                } else if ($resultado == 0) {
                    //despues de insertar
                    echo  $mensaje = "no fue posible ";
                }
            } else {
                echo $mensaje = "faltan datos por enviar";
            }
            break;

        case 2: //actualizar


            if (
                isset($_REQUEST['id']) && isset($_REQUEST['Area']) && isset($_REQUEST['fecha'])
                && isset($_REQUEST['tipo']) 
            ) {

                $Alarmas = new Alarmas();
                $Alarmas->id = $_REQUEST['id'];
                $Alarmas->Area = $_REQUEST['Area'];
                $Alarmas->fecha = $_REQUEST['fecha'];
                $Alarmas->tipo = $_REQUEST['tipo'];


                $resultado = $Alarmas->actulizar();
                $mensaje = "";
               

                if ($resultado == 1) {
                    echo $mensaje = "actualizacion  exitosa";
                    header('Location: ../../front-end/vistas/Alertas/index.php?mensaje=' . $mensaje);
                    exit();
                } else if ($resultado == 0) {
                    //despues de insertar
                    echo  $mensaje = "no fue posible actualizar  ";
                }
            } else {
                echo $mensaje = "faltan datos por enviar";
            }


            break;
        case 3: ///borrar


            if (
                isset($_REQUEST['id'])
            ) {

                $Alarmas = new Alarmas();
                $Alarmas->id = $_REQUEST['id'];


                $resultado = $Alarmas->borrar();
                $mensaje = "";

                if ($resultado == 1) {
                    echo $mensaje = "borrado exitosa";
                    header('Location: ../../front-end/vistas/Alarmas/index.php?mensaje=' . $mensaje);
                    exit();
                } else if ($resultado == 0) {
                    //despues de insertar
                    echo  $mensaje = "no fue posible borrar  ";
                }
            } else {
                echo $mensaje = "faltan datos por enviar";
            }




            break;

        }
} else {
    echo "falta la variable opcion";
}
?>
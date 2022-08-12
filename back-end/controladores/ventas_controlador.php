<?php
require_once "../modelos/ventas.php";

print_r($_POST);
//echo "BR";
//print_r($_FILES);

if (isset($_REQUEST['opcion'])) {
    $opcion = $_REQUEST['opcion'];
    switch ($opcion) {
        case 1: //crear


            if (
                isset($_REQUEST['correo']) && isset($_REQUEST['fecha'])
                && isset($_REQUEST['claveTransaccion']) && isset($_REQUEST['total']) && isset($_REQUEST['estatus'])
                && isset($_REQUEST['paypalDatos'])
            ) {
                

                $ventas = new ventas ();
                $ventas->correo = $_REQUEST['correo'];
                $ventas->fecha = $_REQUEST['fecha'];
                $ventas->claveTransaccion = $_REQUEST['claveTransaccion'];
                $ventas->total = $_REQUEST['total'];
                $ventas->estatus = $_REQUEST['estatus'];
                $ventas->paypalDatos = $_REQUEST['paypalDatos'];


                $resultado = $ventas->crear();
                $mensaje = "";

                if ($resultado == 1) {

                    echo $mensaje = "inserccion exitosa";
                    header('Location: ../../front-end/vistas/ventas/index.php?mensaje=' . $mensaje);
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
                isset($_REQUEST['id']) && isset($_REQUEST['correo']) && isset($_REQUEST['fecha'])
                && isset($_REQUEST['claveTransaccion'])  && isset($_REQUEST['estatus']) && isset($_REQUEST['total'])
                && isset($_REQUEST['paypalDatos'])
            ) {

                $ventas = new ventas();
                $ventas->id = $_REQUEST['id'];
                $ventas->correo = $_REQUEST['correo'];
                $ventas->fecha = $_REQUEST['fecha'];
                $ventas->claveTransaccion = $_REQUEST['claveTransaccion'];
                $ventas->paypalDatos = $_REQUEST['paypalDatos'];
                $ventas->estatus = $_REQUEST['estatus'];
                $ventas->total = $_REQUEST['total'];


                $resultado = $ventas->actulizar();
                $mensaje = "";
               

                if ($resultado == 1) {
                    echo $mensaje = "actualizacion  exitosa";
                    header('Location: ../../front-end/vistas/ventas/index.php?mensaje=' . $mensaje);
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

                $ventas = new ventas();
                $ventas->id = $_REQUEST['id'];


                $resultado = $ventas->borrar();
                $mensaje = "";

                if ($resultado == 1) {
                    echo $mensaje = "borrado exitosa";
                    header('Location: ../../front-end/vistas/ventas/index.php?mensaje=' . $mensaje);
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
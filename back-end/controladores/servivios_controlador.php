<?php
require_once "../modelos/servicios.php";

print_r($_POST);
//echo "BR";
//print_r($_FILES);

if (isset($_REQUEST['opcion'])) {
    $opcion = $_REQUEST['opcion'];
    include_once "file_upload3.php";
    switch ($opcion) {
        case 1: //crear


            if (
                isset($_REQUEST['precio']) && isset($_REQUEST['descripcion'])
                && isset($_REQUEST['nombre']) && isset($_FILES['foto']) 
            ) {
                
$servicios = new servicios();
$servicios->precio = $_REQUEST['precio'];
$servicios->descripcion = $_REQUEST['descripcion'];
$servicios->nombre = $_REQUEST['nombre'];
$servicios->foto = $_FILES['foto']['name'];



                $resultado =$servicios->crear();
                $mensaje = "";

                if ($resultado == 1) {
                    // Check if $uploadOk is set to 0 by an error
                    if ($uploadOk == 0) {
                        echo "Sorry, your file was not uploaded.";
                        // if everything is ok, try to upload file
                    } else {
                        if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
                        echo "The file " . htmlspecialchars(basename($_FILES["foto"]["name"])) . " has been uploaded.";
                    } else {
        echo "Sorry, there was an error uploading your file.";
                           }
}
                    echo $mensaje = "inserccion exitosa";
                    header('Location: ../../front-end/vistas/servicios/index.php?mensaje=' . $mensaje);
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
                isset($_REQUEST['id']) && isset($_REQUEST['precio']) && isset($_REQUEST['descripcion'])
                && isset($_REQUEST['nombre'])   || isset($_FILES['foto'])
            ) {
$servicios = new servicios();
$servicios->id = $_REQUEST['id'];
$servicios->precio = $_REQUEST['precio'];
$servicios->descripcion = $_REQUEST['descripcion'];
$servicios->nombre = $_REQUEST['nombre'];

                if($_FILES['foto']['error']==0){
                   $servicios->foto=$_FILES['foto']['name'];
                }else{
                   $servicios->foto=$_FILES['foto_actual'];
                }$servicios->foto = $_FILES['foto']['name'];

                $resultado =$servicios->actulizar();
                $mensaje = "";
                if ($uploadOk == 0) {
                    echo "Sorry, your file was not uploaded.";
                    // if everything is ok, try to upload file
                } else {
                    if(unlink("../images/servicios".$_REQUEST['foto_actual'])){
                        echo "la foto ha sido removida";
                    }
                    if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
                        echo "The file " . htmlspecialchars(basename($_FILES["foto"]["name"])) . " has been uploaded.";
                    } else {
                         
                        echo $mensaje="Sorry, there was an error uploading your file.";
                    }
                }

                if ($resultado == 1) {
                    echo $mensaje = "actualizacion  exitosa";
                    header('Location:   ../../front-end/vistas/servicios/index.php?mensaje=' . $mensaje);
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
    
                    $servicios = new servicios();
                    $servicios->id = $_REQUEST['id'];
    
    
                    $resultado = $servicios->borrar();
                    $mensaje = "";
    
                    if ($resultado == 1) {
                        echo $mensaje = "Borrado exitosa";
                        header('Location: ../../front-end/vistas/servicios/index.php?mensaje=' . $mensaje);
                        exit();
                    } else if ($resultado == 0) {
                        //despues de insertar
                        echo  $mensaje = "no fue posible borrar  ";
                    }
                } else {
                    echo $mensaje = "faltan datos por enviar";
                }
    
    
    
    
                break;


                case 5://logout
      session_start();
        session_unset();
        session_destroy();
        $mensaje="sesion terminada";
        header('Location: ../../front-end/publico/seciones/index.php?mensaje='. $mensaje);
        exit();
        
                    break;
        

        }




    } else {
        echo "falta la variable opcion";
    }
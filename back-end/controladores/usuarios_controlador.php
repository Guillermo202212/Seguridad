<?php
require_once "../modelos/usuarios.php";

print_r($_POST);
//echo "BR";
//print_r($_FILES);

if (isset($_REQUEST['opcion'])) {
    $opcion = $_REQUEST['opcion'];
    include_once "file_upload4.php";
    switch ($opcion) {
        case 1: //crear


            if (
                isset($_REQUEST['email']) && isset($_REQUEST['passw'])
                && isset($_REQUEST['nombre']) && isset($_FILES['foto']) && isset($_REQUEST['estatus'])
                && isset($_REQUEST['tipo'])



            ) {
                

                $usuarios = new usuarios();
                $usuarios->email = $_REQUEST['email'];
                $usuarios->passw = $_REQUEST['passw'];
                $usuarios->nombre = $_REQUEST['nombre'];
                $usuarios->foto = $_FILES['foto']['name'];
                $usuarios->estatus = $_REQUEST['estatus'];
                $usuarios->tipo = $_REQUEST['tipo'];


                $resultado = $usuarios->crear();
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
                    header('Location: ../../front-end/vistas/usuarios/index.php?mensaje=' . $mensaje);
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
                isset($_REQUEST['id']) && isset($_REQUEST['email']) && isset($_REQUEST['passw'])
                && isset($_REQUEST['nombre'])  && isset($_REQUEST['estatus']) || isset($_FILES['foto'])
                && isset($_REQUEST['tipo'])
            ) {

                $usuarios = new usuarios();
                $usuarios->id = $_REQUEST['id'];
                $usuarios->email = $_REQUEST['email'];
                $usuarios->passw = $_REQUEST['passw'];
                $usuarios->nombre = $_REQUEST['nombre'];
                $usuarios->tipo = $_REQUEST['tipo'];

                if($_FILES['foto']['error']==0){
                    $usuarios->foto=$_FILES['foto']['name'];
                }else{
                    $usuarios->foto=$_FILES['foto_actual'];
                }
                $usuarios->foto = $_FILES['foto']['name'];
                $usuarios->estatus = $_REQUEST['estatus'];

                $resultado = $usuarios->actulizar();
                $mensaje = "";
                if ($uploadOk == 0) {
                    echo "Sorry, your file was not uploaded.";
                    // if everything is ok, try to upload file
                } else {
                    if(unlink("../images/usuarios".$_REQUEST['foto_actual'])){
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
                    header('Location: ../../front-end/vistas/usuarios/index.php?mensaje=' . $mensaje);
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

                $usuarios = new usuarios();
                $usuarios->id = $_REQUEST['id'];


                $resultado = $usuarios->borrar();
                $mensaje = "";

                if ($resultado == 1) {
                    echo $mensaje = "borrado exitosa";
                    header('Location: ../../front-end/vistas/usuarios/index.php?mensaje=' . $mensaje);
                    exit();
                } else if ($resultado == 0) {
                    //despues de insertar
                    echo  $mensaje = "no fue posible borrar  ";
                }
            } else {
                echo $mensaje = "faltan datos por enviar";
            }




            break;

        case 4://login
            if (
                isset($_REQUEST['email'] ) && isset($_REQUEST['passw'] )
            ) {

                $usuarios = new usuarios();
                $usuarios->email = $_REQUEST['email'];
                $usuarios->passw = $_REQUEST['passw'];


                $resultado = $usuarios->acceso();
                $mensaje = "";

                print_r($resultado);

                if(empty($resultado)){
                     $mensaje = "no  se encontro este usuario ";
                    header('Location: ../../index.php?mensaje='. $mensaje);
                    exit();
           
                }else{
                    session_start();
$us=$resultado[0];
$_SESSION['id']=$us->id;
$_SESSION['nombre']=$us->nombre;
$_SESSION['email']=$us->email;
$_SESSION['tipo']=$us->tipo;
$_SESSION['foto']=$us->foto;
$_SESSION['estatus']=$us->estatus;



                  $mensaje = "";
                    header('Location: ../../front-end/vistas/dashboard/index.php?mensaje=' . $mensaje);
                    exit();
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
            header('Location: ../../index.php?mensaje='. $mensaje);
            exit();

            break;

        default: echo  "no vale opcion 1,2,3";
    }
} else {
    echo "falta la variable opcion";
}
?>
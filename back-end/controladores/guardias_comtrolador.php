<?php
require_once "../modelos/guardias.php";

print_r($_POST);
echo "BR";
print_r($_FILES);

if (isset($_REQUEST['opcion'])) {
    $opcion = $_REQUEST['opcion'];
    include_once "file_upload.php";
    switch ($opcion) {
        case 1: //crear


            if (
                isset($_REQUEST['nombres']) && isset($_REQUEST['apellidos'])
                && isset($_REQUEST['genero']) && isset($_FILES['foto']) && isset($_REQUEST['telefono'])
                 && isset($_REQUEST['estatus'])
            ) {
                

                $guardias = new guardias();
                $guardias->nombres = $_REQUEST['nombres'];
                $guardias->apellidos = $_REQUEST['apellidos'];
                $guardias->genero = $_REQUEST['genero'];
                $guardias->foto = $_FILES['foto']['name'];
                $guardias->telefono = $_REQUEST['telefono'];
                $guardias->estatus = $_REQUEST['estatus'];

                $resultado = $guardias->crear();
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
                    echo $mensaje = "Inserccion exitosa";
                    header('Location: ../../front-end/vistas/guardias/index.php?mensaje=' . $mensaje);
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
                isset($_REQUEST['id']) && isset($_REQUEST['nombres']) && isset($_REQUEST['apellidos'])
                && isset($_REQUEST['genero'])  && isset($_REQUEST['estatus']) || isset($_FILES['foto'])
                && isset($_REQUEST['telefono'])
            ) {

                $guardias = new guardias();
                $guardias->id = $_REQUEST['id'];
                $guardias->nombres = $_REQUEST['nombres'];
                $guardias->apellidos = $_REQUEST['apellidos'];
                $guardias->genero = $_REQUEST['genero'];
                if($_FILES['foto']['error']==0){
                    $guardias->foto=$_FILES['foto']['name'];
                }else{
                    $guardias->foto=$_FILES['foto_actual'];
                }
                $guardias->foto = $_FILES['foto']['name'];
                $guardias->estatus = $_REQUEST['estatus'];
                $guardias->telefono = $_REQUEST['telefono'];


                $resultado = $guardias->actulizar();
                $mensaje = "";
                if ($uploadOk == 0) {
                    echo "Sorry, your file was not uploaded.";
                    // if everything is ok, try to upload file
                } else {
                    if(unlink("../images/guardias".$_REQUEST['foto_actual'])){
                        echo "la foto ha sido removida";
                    }
                    if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
                        echo "The file " . htmlspecialchars(basename($_FILES["foto"]["name"])) . " has been uploaded.";
                    } else {
                         
                        echo $mensaje="Sorry, there was an error uploading your file.";
                    }
                }

                if ($resultado == 1) {
                    echo $mensaje = "Actualizacion  exitosa";
                    header('Location: ../../front-end/vistas/guardias/index.php?mensaje=' . $mensaje);
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

                $guardias = new guardias();
                $guardias->id = $_REQUEST['id'];


                $resultado = $guardias->borrar();
                $mensaje = "";

                if ($resultado == 1) {
                    echo $mensaje = "Borrado exitosa";
                    header('Location: ../../front-end/vistas/guardias/index.php?mensaje=' . $mensaje);
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

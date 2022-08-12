<?php
require_once "../modelos/productos.php";

print_r($_POST);
echo "BR";
print_r($_FILES);

if (isset($_REQUEST['opcion'])) {
    $opcion = $_REQUEST['opcion'];
    include_once "file_upload2.php";
    switch ($opcion) {
        case 1: //crear


            if (
                isset($_REQUEST['nombre']) && isset($_REQUEST['costo'])
                 && isset($_FILES['foto']) 
            ) {
                

                $productos = new productos();
                $productos->nombre = $_REQUEST['nombre'];
                $productos->costo = $_REQUEST['costo'];
                $productos->foto = $_FILES['foto']['name'];
            

                $resultado = $productos->crear();
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
                    header('Location: ../../front-end/vistas/productos/index.php?mensaje=' . $mensaje);
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
                isset($_REQUEST['id']) && isset($_REQUEST['nombre']) && isset($_REQUEST['costo'])
                 || isset($_FILES['foto'])
              
            ) {

                $productos = new productos();
                $productos->id = $_REQUEST['id'];
                $productos->nombre = $_REQUEST['nombre'];
                $productos->costo = $_REQUEST['costo'];
                if($_FILES['foto']['error']==0){
                    $productos->foto=$_FILES['foto']['name'];
                }else{
                    $productos->foto=$_FILES['foto_actual'];
                }
                $productos->foto = $_FILES['foto']['name'];
             


                $resultado = $productos->actulizar();
                $mensaje = "";
                if ($uploadOk == 0) {
                    echo "Sorry, your file was not uploaded.";
                    // if everything is ok, try to upload file
                } else {
                    if(unlink("../images/productos".$_REQUEST['foto_actual'])){
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
                    header('Location: ../../front-end/vistas/productos/index.php?mensaje=' . $mensaje);
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

                $productos = new productos();
                $productos->id = $_REQUEST['id'];


                $resultado = $productos->borrar();
                $mensaje = "";

                if ($resultado == 1) {
                    echo $mensaje = "Borrado exitosa";
                    header('Location: ../../front-end/vistas/productos/index.php?mensaje=' . $mensaje);
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

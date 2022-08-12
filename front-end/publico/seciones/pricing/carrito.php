<?php
session_start();
$mensaje=""; 

if(isset($_POST['btnAccion'])){
    
switch($_POST['btnAccion']){
    case 'agregar':

        if(is_numeric( openssl_decrypt($_POST['id'] ,COD , KEY ))){
            $id=openssl_decrypt($_POST['id'] ,COD , KEY );
            $mensaje.="ok id correcto".$id. "</br>";
        }else{
            $mensaje.=" id incorrecto".$id . "</br>";
        }

        if(is_string( openssl_decrypt($_POST['nombre'] ,COD , KEY ))){
            $nombre=openssl_decrypt($_POST['nombre'] ,COD , KEY );
            $mensaje.="ok nombre correcto".$nombre. "</br>";
        }else{
            $mensaje.=" nombre incorrecto".$nombre . "</br>";
        }

        if(is_numeric( openssl_decrypt($_POST['precio'] ,COD , KEY ))){
            $precio=openssl_decrypt($_POST['precio'] ,COD , KEY );
            $mensaje.="ok precio correcto".$precio . "</br>";
        }else{
            $mensaje.=" precio incorrecto".$precio. "</br>";
        }

        if(is_numeric( openssl_decrypt($_POST['cantidad'] ,COD , KEY ))){
            $cantidad=openssl_decrypt($_POST['cantidad'] ,COD , KEY );
            $mensaje.="ok cantidad correcto".$cantidad. "</br>";
        }else{
            $mensaje.=" cantidad incorrecto".$cantidad;
        }

        if(!isset($_SESSION['carrito'])){
            $pro=array(
                'id'=>$id,
                'nombre'=>$nombre,
                'precio'=>$precio,
                'cantidad'=>$cantidad

            );
            $_SESSION['carrito'] [0]=$pro;
            $mensaje="agregado al carriro";


        }else{
            $idpro=array_column($_SESSION['carrito'],"id");

            if(in_array($id,$idpro)){
                echo"<script>alert('el producto ya ha sido agregado al carrito');</script>";
                $mensaje="";

            }else{
                $numpro=count($_SESSION['carrito']);

                $pro=array(
                    'id'=>$id,
                    'nombre'=>$nombre,
                    'precio'=>$precio,
                    'cantidad'=>$cantidad
    
                );
                $_SESSION['carrito'] [$numpro]=$pro;
                $mensaje="agregado al carriro";

            }
            
        }

    break;



    case 'Eliminar':
        if(is_numeric( $_POST['id'] )){
            $id=$_POST['id'] ;
    
            foreach($_SESSION ['carrito'] as $indice=> $pro){
    
                if($pro['id']==$id){
                    unset($_SESSION['carrito'] [$indice] );
                    echo "<script>alert('Elemento borrado') </script>";
    
                }
    
            }
    
    
    
        }else{
            $mensaje.=" id incorrecto".$id . "</br>";
        }
    
        break;




}




}
?>
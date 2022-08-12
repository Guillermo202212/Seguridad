<?php
require_once "crud.php";
require_once "config_db.php";


class ventas implements CRUD
{

  public $id;
  public $claveTransaccion;
  public $fecha;
  public $paypalDatos;
  public $correo;
  public $estatus;
  public $total;
  
 
  private $conexion;

  public function crear()
  {
   
    $this->conexion = new  config_db();

    $con = $this->conexion->get_con();
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
    if ($stmt->execute()) {
      return 1;
    } else {
    return 0;
    }
  }


  public function actulizar()
  {

    $this->conexion = new  config_db();

    $conn = $this->conexion->get_con();

    $stmt = $conn->prepare("UPDATE ventas SET paypalDatos=:paypalDatos, claveTransaccion=:claveTransaccion, 
    fecha=:fecha , total=:total , estatus=:estatus ,correo=:correo
     WHERE id=:id ");
    $stmt->bindParam(':id', $this->id);
    $stmt->bindParam(':paypalDatos', $this->paypalDatoss);
    $stmt->bindParam(':claveTransaccion', $this->claveTransaccion);
    $stmt->bindParam(':fecha', $this->fecha);
    $stmt->bindParam(':estatus', $this->estatus);
    $stmt->bindParam(':total', $this->total);
    $stmt->bindParam(':correo', $this->correo);


    //ejecucar query
    if ($stmt->execute()) {
      return 1;
    } else {
      return 0;
    }
  }

  public function borrar()
  {

    $this->conexion = new  config_db();

    $conn = $this->conexion->get_con();

    $stmt = $conn->prepare("DELETE FROM ventas WHERE id=:id ");
    $stmt->bindParam(':id', $this->id);


    //ejecucar query
    if ($stmt->execute()) {
      return 1;
    } else {
      return 0;
    }
  }


  public function obtener_id()
  {

    $this->conexion = new  config_db();

    $conn = $this->conexion->get_con();

    $stmt = $conn->prepare("SELECT * FROM ventas WHERE id=:id");
    $stmt->bindParam(':id', $this->id);
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt->execute();
    return $stmt->fetchAll();
  }

  public function obtener_too()
  {
    $this->conexion = new  config_db();

    $conn = $this->conexion->get_con();

    $stmt = $conn->prepare("SELECT * FROM ventas");

    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt->execute();
    return $stmt->fetchAll();
  }




  public function obtener_por_campo()
  {
  }

  public function acceso(){

    $this->conexion = new  config_db();

    $conn = $this->conexion->get_con();

    $stmt = $conn->prepare("SELECT * FROM ventas WHERE correo=:correo 
    and estatus='activo'");
    $stmt->bindParam(':correo', $this->correo);
    $stmt->bindParam(':fecha', $this->fecha);
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt->execute();
    return $stmt->fetchAll();

  }
}
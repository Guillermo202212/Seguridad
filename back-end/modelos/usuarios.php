<?php
require_once "crud.php";
require_once "config_db.php";

class usuarios implements CRUD
{

  public $id;
  public $nombre;
  public $email;
  public $passw;
  public $tipo;
  public $estatus;
  public $foto;
  
 
  private $conexion;

  public function crear()
  {

    $this->conexion = new  config_db();

    $conn = $this->conexion->get_con();

    $stmt = $conn->prepare("INSERT INTO usuarios ( email, passw, nombre, estatus,foto,tipo )
  VALUES ( :email, :passw, :nombre, :estatus , :foto, :tipo )");
    $stmt->bindParam(':email', $this->email);
    $stmt->bindParam(':passw', $this->passw);
    $stmt->bindParam(':nombre', $this->nombre);
    $stmt->bindParam(':estatus', $this->estatus);
    $stmt->bindParam(':foto', $this->foto);
    $stmt->bindParam(':tipo', $this->tipo);

    


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

    $stmt = $conn->prepare("UPDATE usuarios SET nombre=:nombre, email=:email, 
    passw=:passw , foto=:foto , estatus=:estatus ,tipo=:tipo
     WHERE id=:id ");
    $stmt->bindParam(':id', $this->id);
    $stmt->bindParam(':nombre', $this->nombre);
    $stmt->bindParam(':passw', $this->passw);
    $stmt->bindParam(':email', $this->email);
    $stmt->bindParam(':foto', $this->foto);
    $stmt->bindParam(':estatus', $this->estatus);
    $stmt->bindParam(':tipo', $this->tipo);


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

    $stmt = $conn->prepare("DELETE FROM usuarios WHERE id=:id ");
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

    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE id=:id");
    $stmt->bindParam(':id', $this->id);
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt->execute();
    return $stmt->fetchAll();
  }

  public function obtener_too()
  {

    $this->conexion = new  config_db();

    $conn = $this->conexion->get_con();

    $stmt = $conn->prepare("SELECT * FROM usuarios");

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

    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE email=:email and passw=:passw
    and estatus='activo'");
    $stmt->bindParam(':email', $this->email);
    $stmt->bindParam(':passw', $this->passw);
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt->execute();
    return $stmt->fetchAll();

  }
}
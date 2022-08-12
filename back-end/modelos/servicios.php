<?php
require_once "crud.php";
require_once "config_db.php";

class servicios implements CRUD
{

  public $id;
  public $nombre;
  public $precio;
  public $descripcion;
  public $foto;
  private $conexion;

  public function crear()
  {

    $this->conexion = new  config_db();

    $conn = $this->conexion->get_con();

    $stmt = $conn->prepare("INSERT INTO servicios ( nombre, precio, descripcion, foto )
  VALUES ( :nombre, :precio, :descripcion, :foto  )");
    $stmt->bindParam(':nombre', $this->nombre);
    $stmt->bindParam(':precio', $this->precio);
    $stmt->bindParam(':descripcion', $this->descripcion);
    $stmt->bindParam(':foto', $this->foto);


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

    $stmt = $conn->prepare("UPDATE servicios SET nombre=:nombre, precio=:precio, 
    descripcion=:descripcion , foto=:foto 
     WHERE id=:id ");
    $stmt->bindParam(':id', $this->id);
    $stmt->bindParam(':nombre', $this->nombre);
    $stmt->bindParam(':precio', $this->precio);
    $stmt->bindParam(':descripcion', $this->descripcion);
    $stmt->bindParam(':foto', $this->foto);

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

    $stmt = $conn->prepare("DELETE FROM servicios WHERE id=:id ");
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

    $stmt = $conn->prepare("SELECT * FROM servicios WHERE id=:id");
    $stmt->bindParam(':id', $this->id);
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt->execute();
    return $stmt->fetchAll();
  }

  public function obtener_too()
  {

    $this->conexion = new  config_db();

    $conn = $this->conexion->get_con();

    $stmt = $conn->prepare("SELECT * FROM servicios");

    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt->execute();
    return $stmt->fetchAll();
  }




  public function obtener_por_campo()
  {
  }
}

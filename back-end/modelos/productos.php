<?php
require_once "crud.php";
require_once "config_db.php";

class productos implements CRUD
{

  public $id;
  public $nombre;
  public $costo;
  public $foto;


  private $conexion;

  public function crear()
  {

    $this->conexion = new  config_db();

    $conn = $this->conexion->get_con();

    $stmt = $conn->prepare("INSERT INTO productos ( nombre,costo ,foto )
  VALUES ( :nombre, :costo , :foto)");
    $stmt->bindParam(':nombre', $this->nombre);
    $stmt->bindParam(':costo', $this->costo);
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

    $stmt = $conn->prepare("UPDATE productos SET nombre=:nombre, costo=:costo,
     foto=:foto
     WHERE id=:id ");
    $stmt->bindParam(':id', $this->id);
    $stmt->bindParam(':nombre', $this->nombre);
    $stmt->bindParam(':costo', $this->costo);
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

    $stmt = $conn->prepare("DELETE FROM productos WHERE id=:id ");
    $stmt->bindParam(':id', $this->id_producto);


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

    $stmt = $conn->prepare("SELECT * FROM productos WHERE id=:id");
    $stmt->bindParam(':id', $this->id);
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt->execute();
    return $stmt->fetchAll();
  }

  public function obtener_too()
  {

    $this->conexion = new  config_db();

    $conn = $this->conexion->get_con();

    $stmt = $conn->prepare("SELECT * FROM productos");

    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt->execute();
    return $stmt->fetchAll();
  }




  public function obtener_por_campo()
  {
  }
}

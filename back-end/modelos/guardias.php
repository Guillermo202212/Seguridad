<?php
require_once "crud.php";
require_once "config_db.php";

class guardias implements CRUD
{

  public $id;
  public $nombres;
  public $apellidos;
  public $foto;
  public $genero;
  public $estatus;
  public $telefono;

  private $conexion;

  public function crear()
  {

    $this->conexion = new  config_db();

    $conn = $this->conexion->get_con();

    $stmt = $conn->prepare("INSERT INTO guardias ( nombres, apellidos, genero, foto,estatus,telefono )
  VALUES ( :nombres, :apellidos, :genero, :foto , :estatus, :telefono )");
    $stmt->bindParam(':nombres', $this->nombres);
    $stmt->bindParam(':apellidos', $this->apellidos);
    $stmt->bindParam(':genero', $this->genero);
    $stmt->bindParam(':foto', $this->foto);
    $stmt->bindParam(':estatus', $this->estatus);
    $stmt->bindParam(':telefono', $this->telefono);



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

    $stmt = $conn->prepare("UPDATE guardias SET nombres=:nombres, apellidos=:apellidos, 
    genero=:genero , foto=:foto , estatus=:estatus , telefono=:telefono
     WHERE id=:id ");
    $stmt->bindParam(':id', $this->id);
    $stmt->bindParam(':nombres', $this->nombres);
    $stmt->bindParam(':apellidos', $this->apellidos);
    $stmt->bindParam(':genero', $this->genero);
    $stmt->bindParam(':foto', $this->foto);
    $stmt->bindParam(':estatus', $this->estatus);
    $stmt->bindParam(':telefono', $this->telefono);


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

    $stmt = $conn->prepare("DELETE FROM guardias WHERE id=:id ");
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

    $stmt = $conn->prepare("SELECT * FROM guardias WHERE id=:id");
    $stmt->bindParam(':id', $this->id);
    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt->execute();
    return $stmt->fetchAll();
  }

  public function obtener_too()
  {

    $this->conexion = new  config_db();

    $conn = $this->conexion->get_con();

    $stmt = $conn->prepare("SELECT * FROM guardias");

    $stmt->setFetchMode(PDO::FETCH_OBJ);
    $stmt->execute();
    return $stmt->fetchAll();
  }




  public function obtener_por_campo()
  {
  }
}

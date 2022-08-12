
<?php
define("KEY","develoteca");
define("COD","AES-128-ECB");

?>

<?php

class config_db
{
 /* private $servername = "localhost";
  private $username = "root";
  private $password = "";*/
  private $con = null;



  public function __construct()
  {
    try {
      //$this->con = new PDO("mysql:host=$this->servername;dbname=seguridad", $this->username, $this->password);
     $this->con = new PDO("sqlsrv:Server=DESKTOP-28PSMIG\SQLEXPRESS,1433;Database=seguridad", 'sa', 'abc');

      // set the PDO error mode to exception
      $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      echo "Connected successfully";
    } catch (PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
    }
  }


  public function get_con()
  {
    return $this->con;
  }
}

<?php
class BD extends PDO {

    private $host='localhost';
    private $bd='riesgocero';
    private $password='123456';
    private $user='root';
    private $repConexion;
    private $errorconexion;
    private $conexion; // Se guarda la conexion

   public function __construct(){  

    $conexionstring = "mysql:host=".$this->host.";dbname=".$this->bd.";charset=utf8";

      try { 

        //$this->conexion = new PDO($conexionstring,$this->user,$this->password);
        
       $this->conexion = parent::__construct($conexionstring,$this->user,$this->password);//ejecutamos la conexión
        
         //echo "conexion exitosa riesgo cero";
         $this->repconexion = true;
         $this->errorconexion = "";
        }

        catch (PDOException $e) {
           //echo "error en:".$e;  
           $this->errorconexion = "error en:" . $e;
           echo $this->errorconexion;
      
         }// fin del catch }// fin del constructor
      }// fin del constructor


      public function getRepConexion(){
          return  $this->repconexion; 
      }
      public function getErrorConexion() { //metodo que nos devuelve el mensaje de error si no llega a darse la conexion
        return $this->errorconexion;
      }
      public function getConexion(){

          return $this->conexion;
      }

  }// fin de la clase


?>
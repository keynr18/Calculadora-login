<?php 

require_once 'claseconexion.php';

	class Paises extends BD {

		//atributos
		private $idm;
		private $nombre;
		private $taza;
		private $preciodolar;
		private $nombremoneda;
		//metodos
		
		public function __construct(){

			$this->conexion = parent:: __construct();
		}

		// metodos para cargar los atributos de los datos insertados en el formulario

    public function setId($id){

			$this->idm = $id;
		}

		public function setNombre($nombre){

			$this->nombre = $nombre;
		}

		public function setNombremoneda($nombremoneda){

			$this->nombremoneda = $nombremoneda;
		}

		public function setTaza($taza){

			$this->taza = $taza;
			
		}

		public function setPrecio($precio){

			$this->preciodolar = $precio;
		}

		//  funcion para registrar un nuevo pais

		public function Registrarpais(){
 			$strSql = 'INSERT INTO paises (nombrepais,taza,preciodolar,nombremoneda) VALUES (:nombrepais,:taza,:preciodolar,:nombremoneda)';

     		$respuestaArreglo = '';  

      		try {
      
		        $strExec = BD::prepare($strSql); 
		        $strExec->bindValue(':nombrepais', $this->nombre);
		        $strExec->bindValue(':taza', $this->taza);
		        $strExec->bindValue(':preciodolar', $this->preciodolar); 
		        $strExec->bindValue(':nombremoneda', $this->nombremoneda);
		        $strExec->execute(); 
		        $respuestaArreglo = $strExec->fetchAll(); //retornamos todos los datos de la ejecucion
		        $respuestaArreglo += ['estatus' => true];
		        
		        return $respuestaArreglo;
		    } 

		    catch (PDOException $e) { //si hay un error en la instruccion sql entramos en el catch
		        $errorReturn = ['estatus' => false];
		        $errorReturn += ['info' => "error sql:{$e}"];
		        return $errorReturn; //retornamos el contenido de esa variable
		    }

   }// fin del metodo Registrar

// mostrar lista de paises
 public function consultarlistadepaises(){

            $strSql = 'SELECT id,nombrepais FROM paises';
            $respuestaArreglo = '';
  
            try {
              $strExec = BD::prepare($strSql);
              $strExec->execute();
               $strExec->setFetchMode(PDO::FETCH_ASSOC);
              $respuestaArreglo = $strExec->fetchAll(PDO::FETCH_ASSOC); //retornamos todos los datos de la ejecucion
              //$respuestaArreglo += ['estatus' => true];
            return $respuestaArreglo;
  
            } catch (PDOException $e) { //si hay un error en la instruccion sql entramos en el catch
              $errorReturn = ['estatus' => false];
              $errorReturn += ['info' => "error sql:{$e}"];
              return $errorReturn; //retornamos el contenido de esa variable
            }// fin del catch
  
 }// fin de mostrar lista


// metodo para traer valores de paises

public function valorespaises($id){
	
			$idpais=$id;

	      $strSql = "SELECT taza,preciodolar,nombremoneda,nombrepais,id FROM paises where id='$idpais'";
	      $respuestaArreglo = '';

	      try {
	        $strExec = BD::prepare($strSql);
	        $strExec->execute();
	         $strExec->setFetchMode(PDO::FETCH_ASSOC);
	        $respuestaArreglo = $strExec->fetchAll(PDO::FETCH_ASSOC); //retornamos todos los datos de la ejecucion
	      return $respuestaArreglo;

	      } catch (PDOException $e) { //si hay un error en la instruccion sql entramos en el catch
	        $errorReturn = ['estatus' => false];
	        $errorReturn += ['info' => "error sql:{$e}"];
	        return $errorReturn; //retornamos el contenido de esa variable
	      }// fin del catch

        }// fin del metodo para traer valores de paises



// funcion para modificr valores de los paises

public function modificarvalores(){

			//$idp = $id;

 			$strSql = "UPDATE paises SET taza=:taza,preciodolar=:preciodolar where id = $this->idm";
     		$respuestaArreglo = '';  

      		try {
      
		        $strExec = BD::prepare($strSql); 
		        $strExec->bindValue(':taza', $this->taza);
		        $strExec->bindValue(':preciodolar', $this->preciodolar);
		        $strExec->execute(); 
		        $respuestaArreglo = $strExec->fetchAll(); //retornamos todos los datos de la ejecucion
		        $respuestaArreglo += ['estatus' => true];
		        return $respuestaArreglo;
		    } 

		    catch (PDOException $e) { //si hay un error en la instruccion sql entramos en el catch
		        $errorReturn = ['estatus' => false];
		        $errorReturn += ['info' => "error sql:{$e}"];
		        return $errorReturn; //retornamos el contenido de esa variable
		    }

}// fin del metodo modificar valores



// funcion para eliminar los paises

public function eliminarpais($id){

	$pais = $id;

	$consulta = "DELETE from paises where id = '$pais'";
	try {

		$eliminarpais = BD::prepare($consulta);
		$eliminarpais->execute();
		//$eliminarpais +=  ['estatus' => true];
		return $eliminarpais;

	} catch (Exception $e) {

		$erroreliminar = "se produjo un error en ".$e;
		return $erroreliminar;
		
	}
} // fin de la funcion eliminar pais


}//fin de la clas
 ?>
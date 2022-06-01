<?php

  require_once '../Modelo/clasepais.php';

if ($_POST) {

   $nombre = $_POST['datos']['pais'];
   $nombremoneda = $_POST['datos']['nombremoneda'];
   $taza = $_POST['datos']['taza'];
   $precio = $_POST['datos']['precio'];
  
    $objpaises = new Paises();
    $objpaises->setNombre($nombre);
    $objpaises->setNombremoneda($nombremoneda);
    $objpaises->setTaza($taza);
    $objpaises->setPrecio($precio);
    
    $resultado = $objpaises->Registrarpais();
    
    if ($resultado) {
      echo "Pais registrado correctamente, refresque la pagina para ver los cambios";
    }else{
      echo "Operacion no realizada";
    }
}

?>
<?php

  require_once '../Modelo/clasepais.php';

if ($_POST) {

   $id = $_POST['datos']['id'];
   $taza = $_POST['datos']['taza'];
   $precio = $_POST['datos']['precio'];

    $objpaises = new Paises();
    $objpaises->setId($id);
    $objpaises->setTaza($taza);
    $objpaises->setPrecio($precio);
    
    $resultado = $objpaises->modificarvalores();
    
    if ($resultado) {
      echo "Datos actualizados correctamente";
    }else{
      echo "Operacion no realizada";
    }
}

?>
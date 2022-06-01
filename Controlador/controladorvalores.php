<?php

  require_once '../Modelo/clasepais.php';

if($_POST)
{
  $id = $_POST['id'];

 $objpaises = new Paises();
 $resultado = $objpaises->valorespaises($id);

 $json = array();
foreach($resultado as $valores)
 {
   
    $json[] = array(
      'taza' => $valores['taza'],
      'precio' => $valores['preciodolar'],
      'namemoneda' => $valores['nombremoneda'],
      'pais' => $valores['nombrepais'],
      'id' => $valores['id']
    );
 }

  $jsonstring = json_encode($json);
  echo $jsonstring;    
}

?>
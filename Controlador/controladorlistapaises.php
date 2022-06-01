<?php

  require_once '../Modelo/clasepais.php';

 $objpaises = new Paises();
 $resultado = $objpaises->consultarlistadepaises();

 /*foreach($resultado as $valores)
 {
    //print_r($valores["id"]);
   echo "estos son los paises: "." ".$valores['nombrepais']."<br>";
 }*/

 $json = array();
foreach($resultado as $valores)
 {
    $json[] = array(
      'paises' => $valores['nombrepais'],
      'id' => $valores['id']
    );
 }

  $jsonstring = json_encode($json);
  
  echo $jsonstring;
?>
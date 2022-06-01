<?php

  require_once '../Modelo/clasepais.php';

if ($_POST) {

   $id = $_POST['id'];

    $objpaises = new Paises();
    $resultado = $objpaises->eliminarpais($id);

    if ($resultado) {
      echo "Pais eliminado correctamente, debe refrescar la pagina para ver los cambios";
    }else{
      echo "Operacion no realizada";
    }
}

?>
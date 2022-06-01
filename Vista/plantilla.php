<?php 
    require_once 'Vista/modulos/head.php';
 ?>
<body>
<!-- formulario de session para los administradores de inamujer--> 
   <?php

      require_once 'Controlador/vistaControlador.php';

      $plantilla = new vistaControlador();

      $vista = $plantilla->obtenerVistaControlador();

      if($vista == 'session'):
        require_once 'Vista/contenido/session.php';
      else:

          session_start(['name'=>'RC']);
          require_once $vista;
    ?>
    <!-- fin del contenedor del formulario de iniciar sesion-->

<?php endif; ?>

<?php 

  require_once 'Vista/modulos/footer.php';
 ?>
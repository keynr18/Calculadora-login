<?php

	class vistaModelo{
		protected function optenerVistaModelo($url){
			if (is_file("Vista/contenido/".$url.".php")) {

				 $contenido = "Vista/contenido/".$url.".php";

			}else if(is_file("Controlador/".$url.".php")){

				$contenido = "Controlador/".$url.".php";
			}
			else if(!is_file("Vista/".$url.".php") && !is_file("Controlador/".$url.".php")){

				$contenido = "session";
 
			}
		  
			return $contenido;
		}
	}
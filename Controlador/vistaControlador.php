<?php

	require_once 'Modelo/vistaModelo.php';

	class vistaControlador extends vistaModelo{

		public function obtenerPlantillaControlador(){
			return require_once 'Vista/principal.php';
		}

		public function obtenerVistaControlador(){
			
			if(isset($_GET['url'])){
				$url = $_GET['url']; //explode("/",$_GET['url']);
				$respuesta = self::optenerVistaModelo($url);
			}else{
				$respuesta = 'session';
			} 
  
			return $respuesta;
		}	
	}
<?php namespace Core\Routing;
	class Response {
		public function __construct(){
			//
		}

		/**
		* Crea un response tipo JSON
		*
		* @param Associative Array
		*/
		public function json($arreglo = null){
			header('Content-Type: application/json');
			echo json_encode($arreglo);
		}
	}

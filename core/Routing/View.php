<?php namespace Core\Routing;
	class View {
		public function __construct($viewName, $data = null){
			include (__DIR__ . '/../../App/Views/' .$viewName.'.php');
		}

		public function with($data){
			//$this->$param = $param;
			//include (__DIR__ . '/../../App/Views/' .$viewName.'.php');
		}
	}

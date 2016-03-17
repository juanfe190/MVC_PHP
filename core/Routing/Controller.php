<?php 

namespace Core\Routing;

use Core\Routing\Request;

class Controller {

	protected function response(){
		return new Response();
	}

	/**
	* Muestra view a usuario
	*
	* @param String view filename
	* @param ANY Datos a pasar al views
	*/
	protected function view($filename, $data){
		return new View($filename, $data);
	}
}	

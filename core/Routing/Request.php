<?php 

namespace Core\Routing;
class Request {

	public function get($key){
		//
	}

	/**
	* Revisa que exista un metodo post, 
	* y que el input dado tambien exista
	*
	* @param String key
	*/
	public static function input($key){
		if(sizeof($_POST)<=0) die('Post no definido');
		else if(!isset($_POST[$key])) die('El input '.$key.' no existe');

		return $_POST[$key];
	}

	public static function all(){
		if(sizeof($_POST)<=0) die('Post no definido');
		return $_POST;
	}
}
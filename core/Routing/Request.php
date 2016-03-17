<?php 

namespace Core\Routing;

class Request {

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

	/**
	* Devuelve array con los elementos del POST
	*
	**/
	public static function all(){
		if(sizeof($_POST)<=0) die('Post no definido');
		return $_POST;
	}

	/**
	* Evalua si el request es JSON
	*
	**/
	public static function isJson(){
		$headers = getallheaders();
		foreach ($headers as $key => $value) {
			if($key == 'Content-Type' && strpos($value, 'application/json')!==false) return true;
		}
		return false;
	}

	/**
	* Devuelve assoc array con los elementos JSON
	*
	**/
	public static function getJson(){
		$raw = file_get_contents('php://input');
		return json_decode($raw, true);
	}
}
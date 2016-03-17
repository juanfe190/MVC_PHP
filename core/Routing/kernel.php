<?php 

namespace Core\Routing;
class Kernel {
	public static function HandleRoute($url){
		// Separa ruta en: [1]Controller, [2]Method, [3...]Params
		$url = explode('/', $url);

		$controller = isset($url[1])? $url[1]: null;
		$method = isset($url[2])? $url[2]: 'index';
		$params = isset($url[3])? array_slice($url, 3): null;

		$controllerClass = '\\App\\Controllers\\' . $controller;
		
		// REVISA QUE EL CONTROLLER EXISTA
		if(class_exists($controllerClass)) $controllerClass = new $controllerClass();
		else die('Controller inexistente');

		//PARAMETROS
		if($params !==null) return call_user_func_array([$controllerClass, $method], $params);
		else return $controllerClass->$method();
		
	}
}
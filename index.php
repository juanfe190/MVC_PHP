<?php
	header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Access-Control-Allow-Origin');
	header('Access-Control-Allow-Origin: *'); 
	/**
	* Class autoloader 
	*/
	require __DIR__ . '/vendor/autoload.php';

	/**
	* Requests Handler
	*/
	$url = $_SERVER['REQUEST_URI'];
	$kernel = Core\Routing\Kernel::HandleRoute($url);


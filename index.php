<?php

	/**
	* Class autoloader 
	*/
	require __DIR__ . '/vendor/autoload.php';

	/**
	* Requests Handler
	*/
	$url = $_SERVER['REQUEST_URI'];
	$kernel = Core\Routing\Kernel::HandleRoute($url);


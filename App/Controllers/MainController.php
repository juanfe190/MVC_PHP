<?php 

namespace App\Controllers;

use Core\Routing\Controller;
use Core\Routing\Request;
use App\Models\Empleado;

class MainController extends Controller{ 
	public function index(){
		return $this->view('main', ['name'=>'Felix', 'LastName'=>'Vasquez']);
	}

	public function database(){
		$empleados = new Empleado;
		$empleados->store(['nombre'=>'Felix', 'apellido'=>'vasquez']);
		
		return $this->response()->json($empleados->all());
	}
} 
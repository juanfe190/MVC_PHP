<?php 

namespace App\Controllers;

use Core\Routing\Controller;
use Core\Routing\Request;
use App\Models\Employees;

class MainController extends Controller{ 
	public function index(){
		return $this->view('main', ['name'=>'Felix', 'LastName'=>'Vasquez']);
	}

	public function database(){
		$employee = new Employees;
		$employee = $employee->where('gender', 'M');
		return $this->response()->json($employee);
	}
} 
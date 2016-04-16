<?php

namespace App\Models;

use Core\Database\Model;

class Empleado extends Model{
	protected $tableName='jefe';
	protected $fillable=['nombre', 'apellido'];
}
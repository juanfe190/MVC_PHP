<?php

namespace Core\Database;

use Core\Database\Drivers\MySQL;

class Model{
	protected $tableName;
	protected $fillable;

	protected $primaryKey;

	/**
	* Realiza un SELECT de la tabla
	*
	* @param String column name
	* @param String value row value
	*
	**/
	public function where($key, $value){
		return MySQL::where($key, $value, $this->tableName);
	}

	/**
	* Devuelve todos los elementos de la tabla
	*
	**/
	public function all(){
		return MySQL::all($this->tableName);
	}
}
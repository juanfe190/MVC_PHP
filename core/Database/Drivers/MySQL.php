<?php

namespace Core\Database\Drivers;


class MySQL{
	private static $db;

	/**
	* Conecta a la base de datos de MYSQL, utiliza la configuracion
	* de config.php
	*/
	private function connect(){
		include_once (__DIR__ . '/../../config.php');
		$mysqlCFG =$database['mysql'];
		self::$db = new \mysqli($mysqlCFG['host'],
							   $mysqlCFG['user'],
							   $mysqlCFG['password'],
							   $mysqlCFG['dbname']);

		if(self::$db->connect_errno > 0){
		    die('Imposible conectar a la base de datos');
		}
	}

	/**
	* Realiza un SELECT de la BD
	*
	* @param String column name
	* @param String value row value
	* @param String table name
	*
	**/
	public static function where($key, $value, $tbName){
		self::connect();
			if($statement = self::$db->prepare("SELECT * FROM ".$tbName." where ".$key." = ?")){
				$statement->bind_param('s', $value);
				$statement->execute();
				
				$result = $statement->get_result();
				$allRows = [];
				while($row  = $result->fetch_array(MYSQLI_ASSOC)){
					array_push($allRows, $row);
				}
				
				$statement->close();
			}else die('Error al crear statement');
			
		self::$db->close();
		return $allRows;
	}

	/**
	* Devuelve todos los elementos de una tabla
	* 
	* @param String table name
	*
	**/
	public static function all($tbName){
		self::connect();

			if($statement = self::$db->prepare("SELECT * FROM ".$tbName)){
				$statement->execute();
				
				$result = $statement->get_result();
				$allRows = [];
				while($row  = $result->fetch_array(MYSQLI_ASSOC)){
					array_push($allRows, $row);
				}
				
				$statement->close();
			}else die('Error al crear statement');
			
		self::$db->close();
		return $allRows;
	}
}
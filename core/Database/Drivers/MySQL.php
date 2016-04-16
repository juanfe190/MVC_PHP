<?php

namespace Core\Database\Drivers;


class MySQL{
	private static $db;

	/**
	* Conecta a la base de datos de MYSQL, utiliza la configuracion
	* de config.php
	*/
	private function connect(){
		require (__DIR__ . '/../../config.php');
		$mysqlCFG =$database['mysql'];
		
		if(!self::$db){
			$connectionString = "mysql:host=$mysqlCFG[host];dbname=$mysqlCFG[dbname]";
			try{
				self::$db = new \PDO($connectionString, $mysqlCFG['user'], $mysqlCFG['password']);
				self::$db->setAttribute( \PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
			}catch(\PDOException $e){
				die("Ocurrio un error al conectar con la base de datos: $e->getMessage()");
			}
		}
		
	}

	/**
	* Realiza un SELECT de la BD
	*
	* @param String column name
	* @param String row value
	* @param String table name
	*
	**/
	public static function where($key, $value, $tbName){
		self::connect();
		try{
			$statement = self::$db->prepare("SELECT * from $tbName WHERE $key=$variables");
			$statement->execute(['value'=>$value]);
			$statement->setFetchMode(\PDO::FETCH_ASSOC);

			$result = $statement->fetchAll();
		}catch(\PDOException $e){
			die("Error al crear statement: $e->getMessage()");
		}
		return $result;
	}

	/**
	* Devuelve todos los elementos de una tabla
	* 
	* @param String table name
	*
	**/
	public static function all($tbName){
		self::connect();
		try{
			$statement = self::$db->prepare("SELECT * from $tbName");
			$statement->execute();
			$statement->setFetchMode(\PDO::FETCH_ASSOC);

			$result = $statement->fetchAll();
		}catch(\PDOException $e){
			die("Error al crear statement: $e->getMessage()");
		}
		return $result;
	}

	/**
	* Inserta valores en la base de datos
	*
	* @param Assoc_array valores a insertar
	* @param String table name
	* @param Array columnas en las que se va a insertar
	*/
	public static function store($values, $tbName, $fillable){
		self::connect();
		$columns = implode(",", $fillable);
		$variables =':' . implode(",:", $fillable);

		try{
			$statement = self::$db->prepare("INSERT INTO $tbName($columns) VALUES($variables)");
			$statement->execute($values);
		}catch(\PDOException $e){
			die("Error al crear statement: $e->getMessage()");
		}
	}
}
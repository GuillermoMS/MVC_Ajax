<?php

	abstract class Abs_Conn {
		// Variales para la conexion con base de datos
		private static $codeBD="utf8";
		private static $serverBD="localhost";
		private static $userBD="guillermo";
		private static $passBD="123456789";
		protected $nameBD="mvc";
		private static $opcionesBD;
		protected $query;
		protected $rows = array();
		private $conexionBD;
		
		// Conexion a base de datos
		protected function conexion(){
			try{
				// Opciones de la conexion a la base de datos
				self::$opcionesBD = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES ".self::$codeBD);
				// Conexion a la base de datos PDO
				$this->conexionBD = new PDO('mysql:host='.self::$serverBD.';dbname='.$this->nameBD,self::$userBD,self::$passBD,self::$opcionesBD);
			}catch(Exception $e){
				die($e->getMessage(). "\n");	
			}
			return $this->conexionBD;
		}
		
		// Desconexion a base de datos
		private function desconexion(){
			// PDO utiliza null para cerrar la conexion
			$this->conexionBD=null;
		}
		
		// Devuelve un array con los datos solicitados. 
		protected function results_query(){
			// abre conexion a base de datos
			$this->conexion();
			// realiza la consulta
			$result = $this->conexionBD->query($this->query);
			// array con datos
			while ($this->rows[] = $result->fetch());
			// cierra la consulta
			$result = null;
			// cierra la conexion a base de datos
			$this->desconexion();
		}
		
		// Metodos abstractos para implementar en clases hijas
		abstract protected function getPc($ip);
		abstract protected function getAllPc();
		abstract protected function getGraph();	
	}


?>
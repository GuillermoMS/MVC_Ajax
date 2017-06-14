<?php
	// llama al archivo conf.php (constante con ruta).
	require_once('C:/xampp/htdocs/php/Sistemas2/conf.php');
	// llama al archivo abs_conn.php con clase abstracta.
	require_once(PATH.'/model/abs_conn.php');
	
	// Clase ordenador con herencia de Abs_Conn
	class Ordenador extends Abs_Conn{
		
		// constructor con el nombre de la base de datos.
		public function __construct(){
			$this->nameBD = 'mvc';
		}
		
		// Devuelve los datos de un ordenador con un ip determianda
		public function getPc($ip){
			$this->query="SELECT * FROM ORDENADORES WHERE IP='".$ip."'";
			$this->results_query();
			return $this->rows;	
		}
		
		// Devuelve todos los datos de todos los ordenadores ordeando por ID ascendente
		public function getAllPc(){
			$this->query="SELECT * FROM ORDENADORES ORDER BY ID ASC ";
			$this->results_query();
			return $this->rows;			
		}
		
		// Devuelve todos los datos de todos los ordenadores
		public function getGraph(){
			$this->query="SELECT * FROM ORDENADORES";
			$this->results_query();
			return $this->rows;		
		}		
	}
?>
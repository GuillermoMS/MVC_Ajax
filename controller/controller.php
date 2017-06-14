<?php
// llama al archivos 
require_once("C:/xampp/htdocs/php/Sistemas2/conf.php");
require_once(PATH."/model/model.php");
require_once(PATH."/view/view.php");

// Nuevo objeto Ordenador
$ordenadores= new Ordenador();

// Inicializa la variable $view 
if(isset($_GET['view'])){
	$view = $_GET['view'];
}else{
	$view='';	
}

// Switch que llama al modelo y a la vista segun la variable $view
switch($view){
	
	case 'listar':
		// Array con los datos (llamada al modelo) 
		$matrizOrdenadores=$ordenadores->getAllPc();
		// Funcion de la vista a la que se le pasa la vista y los datos (llamada a la vista)
		get_view($view,$matrizOrdenadores);
	break;
	
	case 'buscar': 
		// Se inicializa ip o se le asigna el valor de $_GET['ip']
		if(isset($_GET['ip'])){
			$ip = $_GET['ip'];
			// Array con los datos pasandole una IP (llamada al modelo) 
			$matrizOrdenadores=$ordenadores->getPc($ip);
			get_view($view,$matrizOrdenadores);
		}
	break;
		
	case 'grafica': 
		$matrizOrdenadores=$ordenadores->getGraph();
		get_view($view,$matrizOrdenadores);
	break;
}

?>
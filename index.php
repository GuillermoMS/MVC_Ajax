<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Gestion de ordenadores</title>
        <link rel="stylesheet" href="css/style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <!-- controlador js -->
		<script src="js/controller.js"></script>
        <?php
			// Llama al controlador que este a su vez llamara al modelo y la vista.
        	require_once("controller/controller.php");
		?>
    </head>
    <body>
        <div>
            <h2 id="titulo">Gestion de Ornadores</h2>
        </div>
        	<nav>
            	<ul>
            		<li id="buscar">Buscar Ordenador</li>
        			<li id="listar">Listar Ordenadores</li>
        			<li id="grafica">Grafica Ordenadores</li>
            	</ul>
            </nav>
            
		<!-- Contenido segun las vistas -->
        <div id="cont-btn">
        	<h2 class="title">Introduce la IP de un ordenador</h2>
            <div id="cont-text">
                <label for="name">IP: </label>
                <input type="text" id="ip">
            </div>
            <input type="button" id="btnBuscar" value="Buscar">
            <div id="error"></div>
        </div>
        <div id="cont"></div>
    </body>
</html>
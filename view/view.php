<?php
	// Funcion que se le pasan la vista y los datos a mostrar.
	function get_view($view,$data){
		
		// switch que muestra una vista u otra
		switch($view){
			
			case 'listar': 
				echo('
				<h2 class="title">Lista de ordenadores</h2>
				<div id="cont-list">
				<table>
				  <tr>
					<td>ID</td>
					<td>IP</td>
					<td>MAC</td>
					<td>NAME</td>
					<td>HALL</td>
				  </tr>');
				 // recorre los datos y los imprime
				foreach($data as $registro){
					echo("<tr>
						<td>".$registro["id"]."</td>
						<td>".$registro["ip"]."</td>
						<td>".$registro["mac"]."</td>
						<td>".$registro["nombre"]."</td>
						<td>".$registro["sala"]."</td>
					</tr>");
				}
				echo('</table></div>');
			break;
			
			case 'buscar':
				// si no hay datos muestra solo el boton y la caja de texto. 
				if($data[0]==''){
					echo('<div id="cont-list">
						<table>
							<tr>
								<td>ID</td>
								<td>IP</td>
								<td>MAC</td>
								<td>NAME</td>
								<td>HALL</td>
							</tr>
						 </table>
						 </div>');
					
				// si hay datos muestra el boton, la caja de texto y recorre los datos y los imprime
				}else{
					echo('<div id="cont-list">
						<table>
							<tr>
								<td>ID</td>
								<td>IP</td>
								<td>MAC</td>
								<td>NAME</td>
								<td>HALL</td>
							</tr>');
							
					foreach($data as $registro){
						echo("<tr>
							<td>".$registro["id"]."</td>
							<td>".$registro["ip"]."</td>
							<td>".$registro["mac"]."</td>
							<td>".$registro["nombre"]."</td>
							<td>".$registro["sala"]."</td>
						</tr>");
					}
					echo('</table></div>');
				}
			break;
				
			case 'grafica':
				// inizializ las variables
				$nSala1=0;
				$nSala2=0;
				$nSala3=0;
				$nSala4=0;
				$nSala5=0;
				$multiplicador=20;
				
				// recorre los datos y por cada sala que se repita aumenta su contador en +1
				foreach($data as $registro){
					if($registro["sala"]=='1'){
						$nSala1++;
					}
					
					if($registro["sala"]=='2'){
						$nSala2++;
					}
					
					if($registro["sala"]=='3'){
						$nSala3++;
					}
					
					if($registro["sala"]=='4'){
						$nSala4++;
					}
					
					if($registro["sala"]=='5'){
						$nSala5++;
					}
				}
				// Imprime los datos.
				echo("
					<h2 class='title'>Grafica de salas</h2>
					<div id='cont-graf'>
					
						<div class='sala'>
							<div id='sala1' style='height:".$nSala1*$multiplicador."px'></div>
							<span>".$nSala1."</span>
							<div><p>Sala 1</p></div>
						</div>
						
						<div class='sala'>
							<div id='sala2' style='height:".$nSala2*$multiplicador."px'></div>
							<span>".$nSala2."</span>
							<div><p>Sala 2</p></div>
						</div>
						
						<div class='sala'>						
							<div id='sala3' style='height:".$nSala3*$multiplicador."px'></div>
							<span>".$nSala3."</span>
							<div><p>Sala 3</p></div>
						</div>
						
						<div class='sala'>
							<div id='sala4' style='height:".$nSala4*$multiplicador."px'></div>
							<span>".$nSala4."</span>
							<div><p>Sala 4</p></div>
						</div>
						
						<div class='sala'>
							<div  id='sala5' style='height:".$nSala5*$multiplicador."px'></div>
							<span>".$nSala5."</span>
							<div><p>Sala 5</p></div>
						</div>
						
					</div>"
				);
			break;
		}
	}
?>

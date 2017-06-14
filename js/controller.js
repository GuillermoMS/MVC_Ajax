$('document').ready(function() {
	var view,firstView,ip;
	
	// Evento click para el menu
    $('nav > ul li').on('click',menu);
	// Evento click a #btnBuscar
	$('#btnBuscar').on('click',busqueda);
	
	// Añade al primer li la clase menuSeleccionado
	$('nav > ul li').first().addClass('menuSeleccionado');
	// Recoge el valor del atributo id del primer id
	firstView = $('nav > ul li').first().attr('id');
	getView(firstView);
	
	// Cambia de color al li clickeado y pasa a ajax (funcion getView) la vista a mostrar
	function menu(){
    	$('nav > ul li').removeClass('menuSeleccionado');
		$(this).addClass('menuSeleccionado');
		view = $(this).attr('id');
		//ip = $('#ip').val();
		if(view!=='buscar'){
			$('#cont-btn').hide();
		}else{
			$('#cont-btn').show();
		}
		getView(view);
	}
	
	function busqueda(){
		var patron = new RegExp('^([0-9]{1,3}).([0-9]{1,3}).([0-9]{1,3}).([0-9]{1,3})$');
		ip = $('#ip').val();
		if(ip===''){
			$('#error').html('<h3 class="error">Ingrese una IP</h3>');
		}else if(ip.search(patron)){
			$('#error').html('<h3 class="error">Ingrese una IP con formato correcto</h3>');
			$('#error').show();
		}else if(!ip.search(patron)){
			$('#error').html('<h3 class="notError">Encontrado</h3>');
			getView('buscar',ip);
		}
		$('#ip').val('').focus();
	}
	
	// Funcion con ajax que carga el controlador con la vista de desada en '#cont'
	function getView(view,ip)
	{
		$.ajax({
		  url: '/php/Sistemas2/controller/controller.php',
		  data: 'view='+view+'&ip='+ip,
		  success: function(response)
		  	{
				$('#cont').html(response);
			},
		  dataType: 'html'
		});
	}
		
	
});
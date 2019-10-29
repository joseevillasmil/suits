<script>
	/*
	*	Funciones pertinentes para las llamadas ajax
	*	Primero los enlaces
	*/
	var $host = document.URL;
	function ajaxInit()
	{
		/*
		* Reset all events set
		*/
		
		$('a.ajax').unbind();
		$('form.ajax').unbind();
		
		$('a.ajax').click(function(event){
				
				event.preventDefault();
				
				//Descomponemos
				var $url = $(this).attr('href');
				
			
				//Llamada Ajax.
				$.get( $url, function( response ) {

						cargarPrincipal(response);
						ajaxInit();
					});
			
				//This resource is only needed for see the actual status in the URL
				//No Needed.
				//var $ajaxUrl = $host + "#!/" + $(this).data('name');
				//window.location.href= $ajaxUrl;
		});

	/*
	*	Formularios Ajax
	*/
		
		$('form.ajax').on('submit', function(event){
					
					
					
					//Descomponemos
					var $url = $(this).attr('action');
					var $ajaxUrl = $host + "#!/" + $(this).data('name');
					var $method = $(this).attr('method');

					// Llamada Ajax
					$.ajax({
						url     : $url,
						type    : $method,
						data    : $(this).serialize(),
						success : function( response ) {

									cargarPrincipal(response);
									ajaxInit();
								}
					});

					
					event.preventDefault();
			});
	}

	// Funcion de cargar a la informacion en la principal
	function cargarPrincipal($data)
	{
		
		if("alert" in $data)
		{
				$.notify({
					// options
					message: $data.alert.message 
				},{
					// settings
					type: $data.alert.type,
					delay: 3000,
					placement: {
						from: "bottom",
						align: "right"
						},
			});	

		}
		
		// Si exige una redireccion la ejecutamos.
		if("location" in $data)
		{
			window.location.href= $data.location;
		}
		
		if("html" in $data)
		{
			// En caso de que venga un HTML para ser mostrado.
			$('.modal-backdrop').remove();
			$("#principal").html($data.html);
			$("#main-content").css({
			    height: $("#principal").height()
			});
			
		}
		
		$('.modal').modal('hide');
	}
	
	// Impedimos multiples clicks
	
	$(".btn").click(function(e){
		
		// I made it this way to see it cross browser
		// form hate to disable buttons on submit :)
		//This is the same to disable
		if($(this).hasClass( "disabled" ))
			{
				event.preventDefault();
				return false;
			}
		// keep working
			$(this).addClass('disabled');
			$(this).addClass('disabledTimer');
			setTimeout( function() {
				$('.disabledTimer').removeClass('disabled');
				$('.disabledTimer').removeClass('disabledTimer');
			} , 1000)
			
			return true;
	});
	
	
	// Inicializamos las funciones Ajax.
	ajaxInit();
	


	</script>
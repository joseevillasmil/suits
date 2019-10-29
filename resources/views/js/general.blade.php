<script>

	/*
	*	Funciones pertinentes para las llamadas ajax
	*	Primero los enlaces
	*/
	
	function ajaxInit($target = "#principal")
	{
		/*
		* Reset all events set
		*/
		
		$('.ajax').unbind();
		
		$('a.ajax').click(function(event){
				
				event.preventDefault();
				
				//Descomponemos
				var $url = $(this).attr('href');
				
			
				//Llamada Ajax.
				$.get( $url, function( response ) {

						cargarPrincipal(response);
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
					
					var $method = $(this).attr('method');

					// Llamada Ajax
					$.ajax({
						url     : $url,
						type    : $method,
						data    : $(this).serialize(),
						success : function( response ) {

									cargarPrincipal(response);
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
			// We can send a target file trough the ajax call.
				var $target = "#principal";
				
				if("target" in $data)
				{
					$target = $data.target;
				}
				
				
				
				$($target).html($data.html);
			
			
			
			ajaxInit(); //--> Init ajax calls
			onloadCall($target); //--> Reload all ajax onload calls into the $target.
			
		}
		
		if("noClose" in $data)
			{
				
			}else
			{
				$('body').removeClass('modal-open').css("padding", "0");
				$('.modal-backdrop').remove();
				$('.modal').modal('hide');
			}
		
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
	


function onloadCall($target = "#principal")	
{
	// foreach ONLOAD documents
	$( ".onload", $target ).each(function() {
	
		if($target != $(this).attr('id') )
		{
			$.get( $(this).data('url'), function( response ) {
					$(response.target).html(response.html);
					ajaxInit($target);
				});
		}
			
		
	});
}

	// Inicializamos las funciones Ajax.
	ajaxInit();
	onloadCall();
	
	</script>

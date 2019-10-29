<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Sistema de gestion de asistencias</title>
	<link href="{{asset('css/entypo.css')}}" rel="stylesheet">
	<link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet">
	<link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{asset('css/mouldifi-core.css')}}" rel="stylesheet">
	<link href="{{asset('css/mouldifi-forms.css')}}" rel="stylesheet">
	
	<link href="{{asset('css/plugins/scrollbar/perfect-scrollbar.css')}}" rel="stylesheet">



</head>
<body class="login-page" style="background:#044660 !important">
	<div class="login-container" id="principal">
		@yield('principal')
	</div>
</body>

<script src="{{asset('js/jquery.min.js?2')}}"></script>
	<script src="{{asset('js/bootstrap.min.js')}}"></script>
	<script src="{{asset('js/plugins/css3-animate-it-plugin/css3-animate-it.js')}}"></script>
	<script src="{{asset('js/bootstrap-notify.min.js')}}"></script>
	<script src="{{asset('js/respond.min.js')}}"></script>
	<script src="{{asset('js/html5shiv.min.js')}}"></script>
	@include('js/general')
</html>

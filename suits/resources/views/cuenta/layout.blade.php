<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Sistema de Operaciones</title>
	<link href="{{asset('css/entypo.css')}}" rel="stylesheet">
	<link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet">
	<link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{asset('css/clevex-core.css')}}" rel="stylesheet">
	<link href="{{asset('css/clevex-forms.css')}}" rel="stylesheet">
	<link href="{{asset('css/plugins/scrollbar/perfect-scrollbar.css')}}" rel="stylesheet">



</head>
<body class="login-page">
	<div class="login-container" id="principal">
		@yield('principal')
	</div>
	<!--Load JQuery-->
	<script src="{{asset('js/jquery.min.js')}}"></script>
	<script src="{{asset('js/bootstrap.min.js')}}"></script>
	<script src="{{asset('js/bootstrap-notify.min.js')}}"></script>
	@include('js/general')
</body>
</html>

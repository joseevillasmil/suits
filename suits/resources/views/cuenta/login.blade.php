@extends('cuenta/layout')
@section('principal')
   
    <div class="login-branding">
			<a href="index.html"><img src="{{asset('images/logo.png')}}" alt="Clevex" title="Clevex"></a>
		</div>
		<div class="login-content">
			<h2 align="center"><strong>Bienvenido!</strong></h2>
			<form method="post" action="{{route('postLogin')}}" class="ajax">
			
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			
				<div class="form-group">
					<input name="email" type="email" require="" placeholder="Correo electronico" class="form-control">
				</div>
				<div class="form-group">
					<input name="password" type="password" required="" placeholder="Clave de acceso" class="form-control">
				</div>
				
				<div class="form-group">
					<button class="btn btn-primary btn-block">Entrar</button>
				</div>
				<p class="text-center">
					<a href="{{route('signIn')}}" >Regisrarme!</a></p>
			</form>
        </div>
@stop

@extends('cuenta/layout')
@section('principal')
   
    <div class="login-branding">
			<a href="index.html"><img src="{{asset('images/logo.png')}}" alt="Clevex" title="Clevex"></a>
		</div>
		<div class="login-content">
			<h2 align="center"><strong>Nuevo Usuario <i class="fa fa-user-plus"></i></strong></h2>
			<form method="post" action="{{route('postSignIn')}}" class="ajax">
			
			<input type="hidden" name="_token" value="{{ csrf_token() }}" >
			
				<div class="form-group">
					<input type="text" placeholder="Nombre" name="name" class="form-control" required="">
				</div>
				<div class="form-group">
					<input type="text" placeholder="Apellido" name="lastname" class="form-control" required="">
				</div>
				<div class="form-group">
					<input type="email" placeholder="Correo" name="email" class="form-control" required="">
				</div>
				<div class="form-group">
					<input type="password" placeholder="Clave" name="password" class="form-control" required="">
				</div>
				<div class="form-group">
					<input type="password" placeholder="Confirme su clave" name="password2" class="form-control" required="">
				</div>
				<div class="form-group form-action">
					<button type="submit" class="btn btn-primary btn-block">Registrar</button>
				</div>
				<p class="text-center">
					<a href="{{route('login')}}">Ya tengo una cuenta!</a></p>
			</form>
        </div>
@stop

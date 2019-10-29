<form  class="ajax" action="{{route('get-coord', $place->id)}}">
	<div class="form-group">
		<label>Direccion</label>
				<div class="col-sm-10">
				
					<input type="text" name="address" class="form-control" required="" value="{{ \Request::get('address') }}" />
				</div>
			
			<div class="col-sm-2">
		
				<button type="submit" class="btn btn-primary btn-block">
					<i class="fa fa-map-marker"></i>
				</button>
			</div>
	</div>
</form>
<br>
<form class="ajax" method="post" action="{{route('edit-place', $place->id)}}">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	<div class="col-sm-12">
		<div class="form-group">
			<label>Latitud</label>
			<input type="text" name="latitude" class="form-control" required="" value="{{ $place->latitude }}" />
		</div>
		
		<div class="form-group">
			<label>Longitud</label>
			<input type="text" name="longitude" class="form-control" required="" value="{{ $place->longitude }}" />
		</div>
		
		<button type="submit" class="btn btn-primary btn-block">
			<i class="fa fa-save"></i> Editar ubicación
		</button>
	</div>
</form>
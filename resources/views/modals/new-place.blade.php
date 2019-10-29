	<?php $id = uniqid(); ?>
	<div id="modal-new-place" class="modal fade" tabindex="-1" role="dialog">
		  <div class="modal-dialog">
		 
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h4 class="modal-title">Nueva ubicación</h4>
		      </div>
		      <div class="modal-body">
		      
		      <form  class="ajax form-inline" action="{{route('get-coord', $id)}}" >
				<div class="form-group" >
					<input type="text" name="address" class="form-control" required="" value="" style="width:300px !important;" />
				</div>			
				<div class="form-group" >	
							<button type="submit" class="btn btn-primary">
								<i class="fa fa-map-marker"></i> Buscar coordenadas
							</button>
				</div>
			</form>
		      
		       	<form class="ajax" method="post" action="{{route('new-place', $id)}}" id="form-new-place-{{$id}}">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div class="row" id="place-coord-{{$id}}">
						<div class="form-group col-md-6">
							<label>Latitud</label>
							<input type="text" name="latitude" class="form-control" required="" value="" />
						</div>
						
						<div class="form-group col-md-6">
							<label>Longitud</label>
							<input type="text" name="longitude" class="form-control" required="" value="" />
						</div>
					</div>	
					
					<div class="form-group">
							<label>Nombre</label>
							<input type="text" name="name" class="form-control" required="" value="" />
					</div>
				</form>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
		        <button onclick="$('#form-new-place-{{$id}}').submit()" type="button" class="btn btn-primary"><i class="fa fa-plus"></i> Guardar</button>
		      </div>
		    </div>
		</div>
	</div>
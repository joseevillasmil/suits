<div id="modal-add-account" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Nueva cuenta</h4>
      </div>
      <div class="modal-body">
       	<form method="post" action="{{ route('new-account') }}" class="ajax"  >
		<input type="hidden" name="_token" value="{{ csrf_token() }}" />
			<div class="form-group">
				<label>Nombre</label>
				<input type="text" name="name" class="form-control" maxlength="45"required="">
			</div>
			
			<div class="form-group">
				<label>Descripción</label>
				<textarea name="description" class="form-control" required=""></textarea>
			</div>
			
			<div class="form-group">
				<label>Tipo de cuenta</label>
				<select name="type" class="form-control">
					<option value="checking">Corriente (Movimiento frecuente)</option>
					<option value="saving">Ahorro (Poco movimiento)</option>
				</select>
			</div>
			
			<div class="form-group">
				<label>Moneda de la cuenta</label>
				<select name="currency_id" class="form-control">
					@foreach($currencys as $currency)
						<option value="{{ $currency->id }}">{{$currency->name}}</option>
					@endforeach
				</select>
			</div>
			
			<div class="form-group">
				<button type="submit" class="btn btn-success">
					<i class="save"></i> Guardar
				</button>
			</div>
		</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Volver</button>
      </div>
    </div>

  </div>
</div>
<?php $id = uniqid(); ?>

<div class="panel panel-default">
<div class="panel-heading clearfix">
	Chequeos del usuario
	<ul class="panel-tool-options"> 
		 <li><a class="ajax" data-rel="reload" href="{{ route('history', 1) }}"><i class="icon-arrows-ccw"></i></a></li>
	</ul>
	<div class="col-md-6 pull-right">
	
	<form class="ajax" action="{{ route('history', 1) }}">
		<div class="form-group col-md-4 ">
			<label>Desde</label>
				<div class="input-group date"> 
					<input type="text" class="form-control date-{{$id}}" name="from" value="{{\Request::input('from')}}" > 
					<span class="input-group-addon"><i class="fa fa-calendar"></i></span> 
				</div>
		</div>

		<div class="form-group col-md-4">
			<label>Hasta</label>
			<div class="input-group date"> 
				<input type="text" class="form-control date-{{$id}}" name="to" value="{{\Request::input('to')}}"> 
				<span class="input-group-addon"><i class="fa fa-calendar"></i></span> 
			</div>
		</div>
		<div class="form-group col-md-4"><br>
			<button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
		</div>
	</form>
	
	</div>
</div>
	<div class="panel-body">
		<div class="table-responsive">
			 <table class="table table-striped">
					<thead>
						<th>Empleado</th>
						<th>Lugar</th>
						<th>Fecha</th>
						<th>Chequeos</th>
					</thead>
					
					<tbody>
						@foreach($checks as $check)
							<tr>
								<td>
									{{ $check->employee->name }} {{ $check->employee->lastname }}
								</td>
								<td>
									@if($check->employee)
										{{ $check->employee->company  ?  $check->employee->company->name : 'Sin información' }}
									@endif
								</td>
								<td>
									{{ $check->day->format('d/m/Y') }}
								</td>
								<td>
									@if(!empty($check->checks))
										@foreach($check->checks as $item)
											<label class="label label-info">{{$item}}</label>  
										@endforeach
									@endif
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
		  </div>
	   </div>
  </div>

	{!! $links !!}
	
	<script>
		$('.date-{{$id}}').datepicker({
			keyboardNavigation: false,
			forceParse: false,
			todayHighlight: true,
			format: 'dd/mm/yyyy'
		});

	</script>
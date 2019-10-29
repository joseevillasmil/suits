<div class="panel panel-default">
<div class="panel-heading clearfix">
	<ul class="panel-tool-options"> 
		 <li><a class="ajax" data-rel="reload" href="{{ route('checks', 1) }}"><i class="icon-arrows-ccw"></i></a></li>
	</ul>
</div>
	<div class="panel-body">
		<div class="table-responsive">
			 <table class="table table-striped">
					<thead>
						<th>Empleado</th>
						<th>Lugar</th>
						<th>Fecha</th>
						<th>Hora</th>
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
									{{ $check->created_at->format('d/m/Y') }}
								</td>
								<td>
									{{ $check->created_at->format('H:i') }}
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
		  </div>
	   </div>
  </div>

	{!! $links !!}
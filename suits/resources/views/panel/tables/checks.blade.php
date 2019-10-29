<table class="table table-bordered">
	<thead>
		<th>Empleado</th>
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
					{{ $check->created_at->format('d/m/Y') }}
				</td>
				<td>
					{{ $check->created_at->format('H:i') }}
				</td>
			</tr>
		@endforeach
	</tbody>
</table>
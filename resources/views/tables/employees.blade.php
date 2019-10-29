<div class="panel panel-default">
<div class="panel-heading clearfix">
	Empleados Registrados
	<ul class="panel-tool-options">
		 <li><a class="ajax" data-rel="reload" href="{{ route('employees') }}"><i class="icon-arrows-ccw"></i></a></li>
	</ul>
</div>
	<div class="panel-body">
		<div class="table-responsive">
			 <table class="table table-striped">
				<thead>
					<th class="no-sort" style="width:50px;"></th>
					<th>Nombre</th>
					<th>Apellido</th>
					<th>Correo</th>
				</thead>
				
				<tbody>
					@foreach($employees as $employee)
						<tr>
							<td>
								<img src="{{asset('images/user-generic.png') }}" class="img-circle" style="height:30px" alt="{{ $employee->email}}" >
							</td>
							<td>
								<a class="ajax" href="{{ route('employee-detail', $employee->id) }}">{{ $employee->name }}</a>
							</td>
							<td>
								<a class="ajax" href="{{ route('employee-detail', $employee->id) }}">{{ $employee->lastname }}</a>
							</td>
							<td>
								<a class="ajax" href="{{ route('employee-detail', $employee->id) }}">{{ $employee->email }}</a>
							</td>
						</tr>
					@endforeach 
				</tbody>
			</table>
		  </div>
	   </div>
  </div>
	{!! $links !!}
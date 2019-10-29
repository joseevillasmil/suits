<div class="row">
		<div class="col-sm-9">
			
			<div class="onload" data-url="{{ route('get-checks-month-graph') }}" id="checks-month-graphs"></div>
		</div>	
		
		<div class="col-sm-3">
			<div class="panel minimal panel-default animated fadeInUp go">
				<div class="panel-heading clearfix"> 
					<div class="panel-title">Empleados activos</div> 
					<ul class="panel-tool-options"> 
						<li class="dropdown">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#" aria-expanded="false"><i class="icon-cog"></i></a>
							
						 </li>
					</ul>  
				</div> 
				<!-- panel body --> 
				<div class="panel-body"> 
					<div class="stack-order">
						<h1 class="no-margins">
							{{ $company->employees->count() }}
							<i class="fa fa-users text-info pull-right"></i>
						</h1>
					</div>
					
				</div> 
			</div>
			
			<div class="panel minimal panel-default animated fadeInUp go">
				<div class="panel-heading clearfix"> 
					<div class="panel-title">Total de chequeos</div> 
					<ul class="panel-tool-options"> 
						<li class="dropdown">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#" aria-expanded="false"><i class="icon-cog"></i></a>
							
						 </li>
					</ul>  
				</div> 
				<!-- panel body --> 
				<div class="panel-body"> 
					<div class="stack-order">
						<h1 class="no-margins">
						{{ $company->checks->count() }}
							<i class="fa fa-check text-info pull-right"></i>
						</h1>
					</div>
					
				</div> 
			</div>
			
		</div>	
		
		
		
	</div> 
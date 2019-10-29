<button class="btn btn-primary" data-toggle="modal" data-target="#modal-new-place">
	<i class="fa fa-plus"></i> Nueva Ubicación
</button> 
<hr>
<div class="row">
	@foreach($places as $place)
		<div class="col-sm-4">
		
			<div class="panel panel-info animated fadeInUp go">
				<div class="panel-heading clearfix"> 
					<div class="panel-title">{{ $place->name }}</div> 
					<ul class="panel-tool-options"> 
						<li class="dropdown">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#" aria-expanded="false"><i class="fa fa-refresh"></i></a>
							
						 </li>
					</ul>  
				</div> 
				<!-- panel body --> 
				<div class="panel-body"> 
					<div id="qr-code-{{$place->id}}" >
						<p><img class='img-responsive img-thumbnail center-block ' style="max-height: 170px" src='{{ asset($place->qr) }}' ></p>
						
					</div>
					<button class="btn btn-primary btn-block" data-toggle="modal" data-target="#modal-edit-place-{{$place->id}}"><i class="fa fa-edit"></i> Modificar ubiación</button>
				</div> 
			</div>
			
		
		</div>
		
	@endforeach
</div>

@include('modals/edit-places')
@include('modals/new-place')

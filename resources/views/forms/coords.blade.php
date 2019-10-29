<?php $id = uniqid(); ?>
<div id="map-{{$id}}" style="height:150px"></div>
<div class="form-group col-md-6">
	<label>Latitud</label>
	<input type="text" name="latitude" class="form-control" required="" value="{{ $latitude }}" />
</div>

<div class="form-group col-md-6">
	<label>Longitud</label>
	<input type="text" name="longitude" class="form-control" required="" value="{{ $longitude }}" />
</div>


<script>
//Google map api
	var map;
      function initMap{{$id}}() {
        map{{$id}} = new google.maps.Map(document.getElementById('map-{{$id}}'), {
          center: { lat: {{ $latitude }}, lng: {{ $longitude }} },
          zoom: 14
        });
     	
        
        var marker{{$id}} = new google.maps.Marker({
                 icon: 'https://maps.google.com/mapfiles/ms/icons/green-dot.png',
         
                   position: {lat: {{ $latitude }}, lng: {{ $longitude }} },
          map: map{{$id}},
          title: "Ubicación"
        });
        

              
      }
      
      
        
      initMap{{$id}}();
</script>

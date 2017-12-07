@extends('layout.base')

@section('title', 'Map')

@section('morehead')
  <link rel="stylesheet" href="/css/leaflet.css">
  <script src="/js/leaflet.js" charset="utf-8"></script>
  <script src='https://api.mapbox.com/mapbox.js/plugins/leaflet-fullscreen/v1.0.1/Leaflet.fullscreen.min.js'></script>
  <link href='https://api.mapbox.com/mapbox.js/plugins/leaflet-fullscreen/v1.0.1/leaflet.fullscreen.css' rel='stylesheet' />

  <style>
		html, body {
			height: 100%;
			margin: 0;
		}

    .navbar{
      margin-bottom: 0;
    }

    .body_container{
      margin: 0px 50px 0px 0px;
      padding-left: 0px;
      padding-right: 0px;
    }

		#map {
      margin: 0;
			width: 100%;
		}
	</style>

	<style>body { padding: 0; margin: 0; } #map { height: 100%; width: 100vw; }</style>

  <script>
  $(function() {
      var map = L.map('map',
      {
        fullscreenControl: true
      }
      ).fitWorld();

      L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
        maxZoom: 18,
        id: 'mapbox.streets'
      }).addTo(map);

      function onLocationFound(e) {
        var radius = e.accuracy / 2;

        L.marker(e.latlng).addTo(map)
          .bindPopup("You are within " + radius + " meters from this point").openPopup();

        L.circle(e.latlng, radius).addTo(map);
      }

      function onLocationError(e) {
        alert(e.message);
      }

      map.on('locationfound', onLocationFound);
      map.on('locationerror', onLocationError);

      map.locate({setView: true, maxZoom: 16});

    });
  </script>
@endsection

@section('content')
  <div id='map'></div>
@endsection

@section('footer')

@endsection

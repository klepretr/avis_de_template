@extends('layouts.base')

@section('title', 'Map')

@section('morehead')
  <link rel="stylesheet" href="/css/leaflet.css">
  <link rel="stylesheet" href="/css/style.css">
  <script src="/js/leaflet.js" charset="utf-8"></script>
  <script src='https://api.mapbox.com/mapbox.js/plugins/leaflet-fullscreen/v1.0.1/Leaflet.fullscreen.min.js'></script>
  <link href='https://api.mapbox.com/mapbox.js/plugins/leaflet-fullscreen/v1.0.1/leaflet.fullscreen.css' rel='stylesheet' />
  <script src="https://momentjs.com/downloads/moment-with-locales.js" charset="utf-8"></script>

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
      var popupHTML = `
          <div class="popup_content">
            :content
            <br><span class="popup_content_time">:time</span>
          </div>
          <div class="popup_votes">
            <a href="#upvote" id="upvote_:id" value=":id"><img src="/css/images/upvote.png"></a><span class="popup_votes_num">(:upvote)</span>
            <a href="#downvote" id="downvote_:id" value=":id"><img src="/css/images/downvote.png"></a><span class="popup_votes_num">(:downvote)</span>
          </div>
      `;

      var incidentIcons = L.Icon.extend({
        options: {
          iconSize:     [25, 25],
          popupAnchor:  [0, -10]
        }
      })

      var map = L.map('map',
      {
        fullscreenControl: true
      }
      ).fitWorld();

      L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
        maxZoom: 18,
        id: 'mapbox.streets'
      }).addTo(map);

      map.on('locationfound', function(e){
        $.ajax({
          url: "mapl?lat="+e.latitude+"&lnt="+e.longitude+"&km=200",
          success: function(incidents){
                    for (var i = 0; i < incidents.length; i++) {
                      var popup;
                      L .marker(
                                L.latLng(incidents[i].latitude, incidents[i].longitude),
                                {icon: new incidentIcons({iconUrl: '/css/images/makers/'+incidents[i].label+'.png'})}
                               )
                        .addTo(map)
                        .bindPopup(
                          popup = L.popup().setContent(popupHTML  .replace(":content", "Type : "+incidents[i].human_label)
                                                          .replace(":time", "L'heure")
                                                          .replace(":upvote", incidents[i].valid)
                                                          .replace(":downvote", incidents[i].over)
                                                          .replace(":id", incidents[i].id)
                                                          .replace(":id", incidents[i].id)
                                                          .replace(":id", incidents[i].id)
                                                          .replace(":id", incidents[i].id)
                                              )
                        );
                    }
                  }
        });

        var radius = e.accuracy / 2;

        L.circle(e.latlng, radius).addTo(map);
      });

      map.on('locationerror', function(e){
        alert(e.message);
      });

      map.on('load', function(){

      });

      map.on('popupopen', function(e){
        $('[id^=upvote_]').on('click', function(e){
          var nb = e.currentTarget.nextElementSibling.innerHTML;
          nb = parseInt(nb.replace("\(","").replace("\)",""));
          var nb = "\("+ ++nb + "\)";
          e.currentTarget.nextElementSibling.innerHTML = nb;

          var id = e.currentTarget.attributes[2].nodeValue;
          $.get('votes?id_incident='+id+'&vote=1');
        });
        $('[id^=downvote_]').on('click', function(e){
          var nb = e.currentTarget.nextElementSibling.innerHTML;
          nb = parseInt(nb.replace("\(","").replace("\)",""));
          var nb = "\("+ ++nb + "\)";
          e.currentTarget.nextElementSibling.innerHTML = nb;

          var id = e.currentTarget.attributes[2].nodeValue;
          $.get('votes?id_incident='+id+'&vote=-1');
        });
      });

      map.locate({setView: true, maxZoom: 16});

    });
  </script>
@endsection

@section('content')
  <div id='map'></div>
@endsection

@section('footer')

@endsection

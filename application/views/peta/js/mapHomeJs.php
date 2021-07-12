<link rel="stylesheet" type="text/css" href="<?= base_url('assets/js/leaflet-search/dist/leaflet-search.min.css') ?>">
<link rel="stylesheet" type="text/css" href="<?= base_url('assets/js/leaflet.fullscreen/Control.FullScreen.css') ?>">
<!-- Make sure you put this AFTER Leaflet's CSS -->
<script src="https://unpkg.com/leaflet@1.3.4/dist/leaflet.js" integrity="sha512-nMMmRyTVoLYqjP9hrbed9S+FzjZHW5gY1TWCHA5ckwXZBadntCNs8kEqAWdrb9O7rxbCaA4lKTIWjDXZxflOcA==" crossorigin=""></script>
<script src="<?= base_url('assets/js/leaflet-panel-layers-master/src/leaflet-panel-layers.js') ?>"></script>
<script src="<?= base_url('assets/js/leaflet.ajax.js') ?>"></script>
<script src="<?= base_url('assets/js/leaflet-color-markers-master/js/leaflet-color-markers.js') ?>"></script>
<script src="<?= base_url('assets/js/leaflet-search/dist/leaflet-search.src.js') ?>"></script>
<script src="<?= base_url('assets/js/leaflet.fullscreen/Control.FullScreen.js') ?>"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD2_2yIhDqsCkb9hylIf7ioJt6K1mNyUAw" async defer></script>
<script src="<?= base_url('assets/js/Leaflet.GoogleMutant.js') ?>"></script>
<script src="<?= site_url('api/data/kecamatan') ?>"></script>

<script type="text/javascript">

	//console.log(dataPipa);
	var map = L.map('map').setView([-6.913817542952389, 109.630418631378419], 12);
	// // create fullscreen control
	// var fsControl = L.control.fullscreen();
	// // add fullscreen control to the map
	// map.addControl(fsControl);
	// // detect fullscreen toggling
	// map.on('enterFullscreen', function() {
	// 	if (window.console) window.console.log('enterFullscreen');
	// });
	// map.on('exitFullscreen', function() {
	// 	if (window.console) window.console.log('exitFullscreen');
	// });
	var layersKecamatan = [];
	var Layer = L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token={accessToken}', {
		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, <a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		maxZoom: 20,
		id: 'mapbox.streets',
		accessToken: 'pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw'
	});
	var sateliteMutant = L.gridLayer.googleMutant({
		maxZoom: 20,
		type: 'satellite'
	});
	var roadMutant = L.gridLayer.googleMutant({
		maxZoom: 20,
		type: 'roadmap'
	});
	var hybridMutant = L.gridLayer.googleMutant({
		maxZoom: 20,
		type: 'hybrid'
	});
	map.addLayer(Layer);

	// pengaturan legend
	function iconByName(name) {
		return '<i class="icon" style="background-color:' + name + ';border-radius:50%"></i>';
	}
	var baseLayers = [{
			name: "OpenStreetMap",
			layer: Layer
		},
		{
			name: "Satelite Google",
			layer: sateliteMutant
		},
		{
			name: "Roadmap Google",
			layer: roadMutant
		},
		{
			name: "Hybrid Google",
			layer: hybridMutant
		},
	];

	// pengaturan untuk layer kecamatan
	
	{
		function getColorKecamatan(D_kd_kec) {
			for (i = 0; i < dataKecamatan.length; i++) {
				var data = dataKecamatan[i];
				if (data.kd_kecamatan == D_kd_kec) {
					return data.warna_kecamatan;
				}
			}
		}
		var highlight = {
		'fillColor': 'white',
		'weight': 2,
		'opacity': 1
	};

		function popUpsz(f, l) {
			
			var html = '';
			if (f.properties) {
			 	l.on('click', function (e) {
				// stateLayer.setStyle(style);
				  l.setStyle(highlight);
				  //alert(f.properties.D_nm_kec);
				//or
				//alert(f.properties.D_kd_kec);
				//'<a href="http://some-url-to-call?mktid=' + f.properties.D_kd_kec + '">' + f.properties.D_nm_kec + '</a>'
				//"<a href='" + feature.properties.profile + "'>Town Profile</a>"
				//window.location.replace('desaid?mktid=' + f.properties.D_kd_kec);
				window.location.replace('desakel?iddesa=' + f.properties.D_kd_kec);
			});
				l.bindTooltip(f.properties['D_nm_kec'], {
					permanent: true,
					direction: "center",
					className: "no-background"
				});
			}
		}
		
		for (i = 0; i < dataKecamatan.length; i++) {
			var data = dataKecamatan[i];
			var layer = {
				name: data.nm_kecamatan,
				icon: iconByName(data.warna_kecamatan),
				layer: new L.GeoJSON.AJAX(["assets/unggah/geojson/" + data.geojson_kecamatan], {
					onEachFeature: popUpsz,
					style: function(feature) {
						
						var D_kd_kec = feature.properties.D_kd_kec;
						return {
							"color": getColorKecamatan(D_kd_kec),
							"weight": 3,
							"opacity": 30
						}
					},
				
				}).addTo(map)
			}
			
			layersKecamatan.push(layer);
			
		/*	var stateLayer = L.geoJson(null, {
			onEachFeature: popUpsz,
			 layer: new L.GeoJSON.AJAX(["assets/unggah/geojson/" + data.geojson_kecamatan], {
					onEachFeature: popUpsz,
					style: function(feature) {
						
						var D_kd_kec = feature.properties.D_kd_kec;
						return {
							"color": getColorKecamatan(D_kd_kec),
							"weight": 3,
							"opacity": 30
						}
					},
				
				})
				});
 var geojson = new L.GeoJSON.AJAX(["assets/unggah/geojson/" + data.geojson_kecamatan], function(data) {
				stateLayer.addData(data);
			}).addTo(map)
		layersKecamatan.push(layer);*/
		}
		
		
	}
	// end pengaturan untuk layer kecamatan

	// registrasikan untuk panel layer
	var overLayers = [
		{
			group: "Layer Kecamatan",
			layers: layersKecamatan
		}
	];
	var panelLayers = new L.Control.PanelLayers(baseLayers, overLayers, {
		collapsibleGroups: true,
		collapsed: true
	});

	map.addControl(panelLayers);
	// end registrasikan untuk panel layer
</script>
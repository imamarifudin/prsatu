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
 <script src="<?= site_url('api/data/pipa') ?>"></script>
<script src="<?= site_url('api/data/bangunan') ?>"></script>
<script src="<?= site_url('api/data/cakupan') ?>"></script>
<script src="<?= site_url('api/data/kecamatan') ?>"></script>
<script src="<?= site_url('api/data/air/marker') ?>"></script>
<script type="text/javascript">
	//console.log(dataPipa);
	
	var map = L.map('map').setView([-6.913817542952389, 109.630418631378419], 17);
	// create fullscreen control
	var fsControl = L.control.fullscreen();
	// add fullscreen control to the map
	map.addControl(fsControl);
	// detect fullscreen toggling
	map.on('enterFullscreen', function() {
		if (window.console) window.console.log('enterFullscreen');
	});
	map.on('exitFullscreen', function() {
		if (window.console) window.console.log('exitFullscreen');
	});
	// var layersPipa = [];
	 var layersBangunan = [];
	// var layersCakupan = [];
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
		/*{
			name: "OpenCycleMap",
			layer: L.tileLayer('https://tile.thunderforest.com/cycle/{z}/{x}/{y}.png?apikey=8e44a0b4363f484d8226e65d6cc43bfd')
		},
		{
			name: "Transport",
			layer: L.tileLayer('https://tile.thunderforest.com/transport/{z}/{x}/{y}.png?apikey=8e44a0b4363f484d8226e65d6cc43bfd')
		},
		{
			name: "Landscape",
			layer: L.tileLayer('https://tile.thunderforest.com/landscape/{z}/{x}/{y}.png?apikey=8e44a0b4363f484d8226e65d6cc43bfd')
		},
		{
			name: "Outdoors",
			layer: L.tileLayer('https://tile.thunderforest.com/outdoors/{z}/{x}/{y}.png?apikey=8e44a0b4363f484d8226e65d6cc43bfd')
		},
		{
			name: "Transport Dart",
			layer: L.tileLayer('https://tile.thunderforest.com/transport-dark/{z}/{x}/{y}.png?apikey=8e44a0b4363f484d8226e65d6cc43bfd')
		},
		{
			name: "Spinal Map",
			layer: L.tileLayer('https://tile.thunderforest.com/spinal-map/{z}/{x}/{y}.png?apikey=8e44a0b4363f484d8226e65d6cc43bfd')
		},
		{
			name: "Pioneer",
			layer: L.tileLayer('https://tile.thunderforest.com/pioneer/{z}/{x}/{y}.png?apikey=8e44a0b4363f484d8226e65d6cc43bfd')
		},
		{
			name: "Mobile Atlas",
			layer: L.tileLayer('https://tile.thunderforest.com/mobile-atlas/{z}/{x}/{y}.png?apikey=8e44a0b4363f484d8226e65d6cc43bfd')
		},
		{
			name: "Neighbourhood",
			layer: L.tileLayer('https://tile.thunderforest.com/neighbourhood/{z}/{x}/{y}.png?apikey=8e44a0b4363f484d8226e65d6cc43bfd')
		},*/
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


	// // pengaturan untuk layer bangunan
	 {
	 	function getColorBangunan() {
	 		for (i = 0; i < dataBangunan.length; i++) {
	 			var data = dataBangunan[i];
	 			//if (data.kd_bangunan == KODE) {
	 			//	return data.warna_bangunan;
	 			//}
	 		}
	 	}

	 	function popUp(f, l) {
	 		var html = '';
	 		if (f.properties) {
	 			html += '<table>';
	 			html += '<tr>';
	 			html += '<td>Tipe</td>';
	 			html += '<td>:</td>';
	 			html += '<td>' + f.properties['TIPE'] + '</td>';
	 			html += '</tr>';
	 			html += '<tr>';
	 			html += '<td>Bangunan</td>';
	 			html += '<td>:</td>';
	 			html += '<td>' + f.properties['d_nop'] + '</td>';
	 			html += '</tr>';
	 			html += '</table>';
	 			l.bindPopup(html);
	 		}
	 	}

	 	for (i = 0; i < dataBangunan.length; i++) {
	 		var data = dataBangunan[i];
	 		var layer = {
	 			name: data.nm_bangunan,
	 			icon: iconByName(data.warna_bangunan),
	 			layer: new L.GeoJSON.AJAX(["assets/unggah/geojson/" + data.geojson_bangunan], {
	 				onEachFeature: popUp,
	 				style: function(feature) {
	 				//	var KODE = feature.properties.KODE;
	 					return {
	 				//		"color": getColorBangunan(KODE),
	 						"weight": 1.5,
	 						"opacity": 1,
	 					}
	 				},
	 			}).addTo(map)
	 		}
	 		layersBangunan.push(layer);
	 	}
	 }
	// end pengaturan untuk layer bangunan

	// // pengaturan untuk layer pipa
	// {
	// 	function getColorPipa(KODE) {
	// 		for (i = 0; i < dataPipa.length; i++) {
	// 			var data = dataPipa[i];
	// 			if (data.kd_pipa == KODE) {
	// 				return data.warna_pipa;
	// 			}
	// 		}
	// 	}

	// 	function popUp(f, l) {
	// 		var html = '';
	// 		if (f.properties) {
	// 			html += '<table>';
	// 			html += '<tr>';
	// 			html += '<td>Diameter</td>';
	// 			html += '<td>:</td>';
	// 			html += '<td>' + f.properties['DIAMETER'] + '</td>';
	// 			html += '</tr>';
	// 			html += '<tr>';
	// 			html += '<td>Jenis</td>';
	// 			html += '<td>:</td>';
	// 			html += '<td>' + f.properties['JENIS'] + '</td>';
	// 			html += '</tr>';
	// 			html += '</table>';
	// 			l.bindPopup(html);
	// 		}
	// 	}

	// 	for (i = 0; i < dataPipa.length; i++) {
	// 		var data = dataPipa[i];
	// 		var layer = {
	// 			name: data.dia_pipa,
	// 			icon: iconByName(data.warna_pipa),
	// 			layer: new L.GeoJSON.AJAX(["assets/unggah/geojson/" + data.geojson_pipa], {
	// 				onEachFeature: popUp,
	// 				style: function(feature) {
	// 					var KODE = feature.properties.KODE;
	// 					return {
	// 						"color": getColorPipa(KODE),
	// 						"weight": 3,
	// 						"opacity": 1
	// 					}
	// 				},
	// 			}).addTo(map)
	// 		}
	// 		layersPipa.push(layer);
	// 	}
	// }
	// // end pengaturan untuk layer pipa

	// // pengaturan untuk layer cakupan
	// {
	// 	function getColorCakupan(KODE) {
	// 		for (i = 0; i < dataCakupan.length; i++) {
	// 			var data = dataCakupan[i];
	// 			if (data.kd_cakupan == KODE) {
	// 				return data.warna_cakupan;
	// 			}
	// 		}
	// 	}

	// 	function popUp(f, l) {
	// 		var html = '';
	// 		if (f.properties) {
	// 			html += '<table>';
	// 			html += '<tr>';
	// 			html += '<td>Penduduk</td>';
	// 			html += '<td>:</td>';
	// 			html += '<td>' + f.properties['PENDUDUK'] + '</td>';
	// 			html += '</tr>';
	// 			html += '<tr>';
	// 			html += '<td>Pelanggan / Rencana SL</td>';
	// 			html += '<td>:</td>';
	// 			html += '<td>' + f.properties['PELANGGAN'] + '</td>';
	// 			html += '</tr>';
	// 			html += '<tr>';
	// 			html += '<td>Cakupan Teknis</td>';
	// 			html += '<td>:</td>';
	// 			html += '<td>' + f.properties['CAKUPANTEKNIS'] + '</td>';
	// 			html += '</tr>';
	// 			html += '</table>';
	// 			l.bindPopup(html);
	// 			l.bindTooltip(f.properties['KELURAHAN'], {
	// 				permanent: true,
	// 				direction: "center",
	// 				className: "no-background"
	// 			});
	// 		}
	// 	}

	// 	for (i = 0; i < dataCakupan.length; i++) {
	// 		var data = dataCakupan[i];
	// 		var layer = {
	// 			name: data.nm_cakupan,
	// 			icon: iconByName(data.warna_cakupan),
	// 			layer: new L.GeoJSON.AJAX(["assets/unggah/geojson/" + data.geojson_cakupan], {
	// 				onEachFeature: popUp,
	// 				style: function(feature) {
	// 					var KODE = feature.properties.KODE;
	// 					return {
	// 						"color": getColorCakupan(KODE),
	// 						"weight": 3,
	// 						"opacity": 30
	// 					}
	// 				},
	// 			}).addTo(map)
	// 		}
	// 		layersCakupan.push(layer);
	// 	}
	// }
	// // end pengaturan untuk layer cakupan	

	 // pengaturan untuk layer kecamatan
	 {
	 	function getColorKecamatan(KODE) {
	 		for (i = 0; i < dataKecamatan.length; i++) {
	 			var data = dataKecamatan[i];
	 			if (data.kd_kecamatan == KODE) {
	 				return data.warna_kecamatan;
	 			}
	 		}
	 	}

	 	function popUp(f, l) {
	 		var html = '';
	 		if (f.properties) {
	 			html += '<table>';
	 			html += '<tr>';
	 			html += '<td>Provinsi</td>';
	 			html += '<td>:</td>';
	 			html += '<td>' + f.properties['PROVINSI'] + '</td>';
	 			html += '</tr>';
	 			html += '<tr>';
	 			html += '<td>Kecamatan</td>';
	 			html += '<td>:</td>';
	 			html += '<td>' + f.properties['KECAMATAN'] + '</td>';
	 			html += '</tr>';
	 			html += '<tr>';
	 			html += '<td>Kelurahan</td>';
	 			html += '<td>:</td>';
	 			html += '<td>' + f.properties['KELURAHAN'] + '</td>';
	 			html += '</tr>';
	 			html += '</table>';
	 			l.bindPopup(html);
	 			l.bindTooltip(f.properties['KELURAHAN'], {
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
	 				onEachFeature: popUp,
	 				style: function(feature) {
	 					var KODE = feature.properties.KODE;
	 					return {
	 						"color": getColorKecamatan(KODE),
	 						"weight": 3,
	 						"opacity": 30
	 					}
	 				},
	 			}).addTo(map)
	 		}
	 		layersKecamatan.push(layer);
	 	}
	 }
	 // end pengaturan untuk layer kecamatan

	// air
	var layersAirPoint = L.geoJSON(airPoint, {
		pointToLayer: function(feature, latlng) {
			// console.log(feature)
			return L.marker(latlng, {
				icon: new L.icon({
					iconUrl: feature.properties.icon,
					iconSize: [38, 45]
				})
			});
		},
		onEachFeature: function(feature, layer) {
			if (feature.properties && feature.properties.name) {
				layer.bindPopup(feature.properties.popUp);
			}
		}
	}).addTo(map);
	// akhir dari air

	// pencarian air
	var poiLayers = L.layerGroup([
		layersAirPoint
	]);
	L.control.search({
		layer: poiLayers,
		initial: false,
		propertyName: 'name',
		buildTip: function(text, val) {
			// var jenis = val.layer.feature.properties.jenis;
			// return '<a href="#" class="'+jenis+'">'+text+'<b>'+jenis+'</b></a>';
			return '<a href="#" >' + text + '</a>';
		},
		marker: {
			icon: "",
			circle: {
				radius: 20,
				color: '#f32',
				opacity: 1,
				weight: 5
			}
		}
	}).addTo(map);
	// end pencarian Air

	// registrasikan untuk panel layer
	var overLayers = [/*{
			group: "Titik Air",
			layers: [{
				name: "Semua Titik",
				icon: iconByName("#009"),
				layer: layersAirPoint
			}]
		},*/
		// {
		// 	group: "Layer Pipa",
		// 	layers: layersPipa
		// },
		 {
		 	group: "Layer Bangunan",
		 	layers: layersBangunan
		 },
		// {
		// 	group: "Layer Cakupan",
		// 	layers: layersCakupan
		// },
		// {
		// 	group: "Layer Kecamatan",
		// 	layers: layersKecamatan
		// },
	];

	var panelLayers = new L.Control.PanelLayers(baseLayers, overLayers, {
		collapsibleGroups: true,
		collapsed: true
	});

	map.addControl(panelLayers);
	// end registrasikan untuk panel layer
</script>
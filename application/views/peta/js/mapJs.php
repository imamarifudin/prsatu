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
<script src="<?= site_url('api/data/desa') ?>"></script>
<script src="<?= site_url('api/data/blok') ?>"></script>
<script src="<?= site_url('api/data/kecamatan') ?>"></script>
<script src="<?= site_url('api/data/air/marker') ?>"></script>

<script type="text/javascript">

	//console.log(dataPipa);
	var map = L.map('map').setView([-6.913817542952389, 109.630418631378419], 17);
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
	var layersPipa = [];
	var layersBangunan = [];
	var layersCakupan = [];
	var layersKecamatan = [];
	var layersDesa = [];
	var layersBlok = [];
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

{

		function getColorBangunan(d_nop) {
			for (i = 0; i < dataBangunan.length; i++) {
				var data = dataBangunan[i];
				if (data.kd_bangunan = d_nop.substring(0,10)) {
					return data.warna_bangunan;
				}
			}
		}
	var highlight = {
		'fillColor': 'yellow',
		'weight': 2,
		'opacity': 1
	};
	
		function popUp(f, l) {
			var html = '';
			if (f.properties) {
			l.on('click', function (e) {
					l.setStyle(highlight);
				  jQuery(function($){
				  $(document).ajaxSend(function() {
					$("#overlay").fadeIn(100);　
				  });
				  $.ajax({
					dataType: "json",
					
					//url: "http://127.0.0.1/gispbb/assets/unggah/geojson/3326150007 - Copy.geojson",
					url: "https://simpelpbb.pekalongankab.go.id/cek/pelayanan.php?nop="+e.target.feature.properties.d_nop,
					success: function (data) {
							 $("#iframeloading").hide();
							 var len = data.length;
							for(var i=0; i<len; i++){
							
								$('[name="nop"]').val(data[i].nop);
								$('[name="alamat_op"]').val(data[i].alamat_op);
								$('[name="luas_bumi_sppt"]').val(data[i].luas_bumi_sppt);
								$('[name="jns_bumi"]').val(data[i].jns_bumi);
								$('[name="njop_bumi_sppt"]').val(data[i].njop_bumi_sppt);
								$('[name="kd_znt"]').val(data[i].kd_znt);
								$('[name="njop_bng_sppt"]').val(data[i].njop_bng_sppt);
								$('[name="total_njop"]').val(data[i].total_njop);
								$('[name="jml_bng"]').val(data[i].jml_bng);
								
								$('[name="alamat"]').val(data[i].alamat);
								$('[name="nama"]').val(data[i].nama);
								$('[name="status_hak"]').val(data[i].status_hak);
								$('[name="pekerjaan_wp"]').val(data[i].pekerjaan_wp);
								$('[name="npwp"]').val(data[i].npwp);
								$('[name="nop"]').val(data[i].nop);
								$('[name="nop"]').val(data[i].nop);
								$('.modal-body').html(data);
								$('#verifyModal').modal('show');
					}
					},
					error: function(data){
						   alert("Koneksi Tidak Stabil");
							location.reload();
					}
				 }).done(function() {
				  setTimeout(function(){
					$("#overlay").fadeOut(100);
				  },100);
				});
	
				  <!--end onclick-->
			});
			});
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
						var d_nops = feature.properties.d_nop.substring(0,10);
						return {
							"color": getColorBangunan(d_nops),
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


	// pengaturan untuk layer pipa
	{
		function getColorPipa(KODE) {
			for (i = 0; i < dataPipa.length; i++) {
				var data = dataPipa[i];
				if (data.kd_pipa == KODE) {
					return data.warna_pipa;
				}
			}
		}

		function popUp(f, l) {
			var html = '';
			if (f.properties) {
				html += '<table>';
				html += '<tr>';
				html += '<td>Diameter</td>';
				html += '<td>:</td>';
				html += '<td>' + f.properties['DIAMETER'] + '</td>';
				html += '</tr>';
				html += '<tr>';
				html += '<td>Jenis</td>';
				html += '<td>:</td>';
				html += '<td>' + f.properties['JENIS'] + '</td>';
				html += '</tr>';
				html += '</table>';
				l.bindPopup(html);
			}
		}

		for (i = 0; i < dataPipa.length; i++) {
			var data = dataPipa[i];
			var layer = {
				name: data.dia_pipa,
				icon: iconByName(data.warna_pipa),
				layer: new L.GeoJSON.AJAX(["assets/unggah/geojson/" + data.geojson_pipa], {
					onEachFeature: popUp,
					style: function(feature) {
						var KODE = feature.properties.KODE;
						return {
							"color": getColorPipa(KODE),
							"weight": 3,
							"opacity": 1
						}
					},
				}).addTo(map)
			}
			layersPipa.push(layer);
		}
	}
	// end pengaturan untuk layer pipa

	// pengaturan untuk layer cakupan
	{
		function getColorCakupan(KODE) {
			for (i = 0; i < dataCakupan.length; i++) {
				var data = dataCakupan[i];
				if (data.kd_cakupan == KODE) {
					return data.warna_cakupan;
				}
			}
		}

		function popUp(f, l) {
			var html = '';
			if (f.properties) {
				html += '<table>';
				html += '<tr>';
				html += '<td>Penduduk</td>';
				html += '<td>:</td>';
				html += '<td>' + f.properties['PENDUDUK'] + '</td>';
				html += '</tr>';
				html += '<tr>';
				html += '<td>Pelanggan / Rencana SL</td>';
				html += '<td>:</td>';
				html += '<td>' + f.properties['PELANGGAN'] + '</td>';
				html += '</tr>';
				html += '<tr>';
				html += '<td>Cakupan Teknis</td>';
				html += '<td>:</td>';
				html += '<td>' + f.properties['CAKUPANTEKNIS'] + '</td>';
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

		for (i = 0; i < dataCakupan.length; i++) {
			var data = dataCakupan[i];
			var layer = {
				name: data.nm_cakupan,
				icon: iconByName(data.warna_cakupan),
				layer: new L.GeoJSON.AJAX(["assets/unggah/geojson/" + data.geojson_cakupan], {
					onEachFeature: popUp,
					style: function(feature) {
						var KODE = feature.properties.KODE;
						return {
							"color": getColorCakupan(KODE),
							"weight": 3,
							"opacity": 30
						}
					},
				}).addTo(map)
			}
			layersCakupan.push(layer);
		}
	}
	// end pengaturan untuk layer cakupan	

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

		function popUp(f, l) {
			var html = '';
			if (f.properties) {
				/*html += '<table>';
				html += '<tr>';
				html += '<td>Provinsi</td>';
				html += '<td>:</td>';
				html += '<td>JAWA TENGAH</td>';
				html += '</tr>';
				html += '<tr>';
				html += '<td>Kecamatan</td>';
				html += '<td>:</td>';
				html += '<td>' + f.properties['D_nm_kec'] + '</td>';
				html += '</tr>';
				html += '<tr>';
				html += '<td>Kelurahan</td>';
				html += '<td>:</td>';
				html += '<td>' + f.properties['KELURAHAN'] + '</td>';
				html += '</tr>';
				html += '</table>';*/
				//l.bindPopup(html);
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
					onEachFeature: popUp,
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
		}
	}
	// end pengaturan untuk layer kecamatan
// pengaturan untuk layer desa
	{
		function getColorDesa(D_kd_kel) {
			for (i = 0; i < dataDesa.length; i++) {
				var data = dataDesa[i];
				if (data.kd_desa == D_kd_kel) {
					return data.warna_desa;
				}
			}
		}

		function popUp(f, l) {
			var html = '';
			if (f.properties) {
			/*	html += '<table>';
				html += '<tr>';
				html += '<td>Provinsi</td>';
				html += '<td>:</td>';
				html += '<td>JAWA TENGAH</td>';
				html += '</tr>';
				html += '<tr>';
				html += '<td>Desa</td>';
				html += '<td>:</td>';
				html += '<td>' + f.properties['D_nm_kec'] + '</td>';
				html += '</tr>';
				html += '<tr>';
				html += '<td>Kelurahan</td>';
				html += '<td>:</td>';
				html += '<td>' + f.properties['KELURAHAN'] + '</td>';
				html += '</tr>';
				html += '</table>';
				l.bindPopup(html);*/
				l.bindTooltip(f.properties['D_nm_kel'], {
					permanent: true,
					direction: "center",
					className: "no-background"
				});
			}
		}

		for (i = 0; i < dataDesa.length; i++) {
			var data = dataDesa[i];
			var layer = {
				name: data.nm_desa,
				icon: iconByName(data.warna_desa),
				layer: new L.GeoJSON.AJAX(["assets/unggah/geojson/" + data.geojson_desa], {
					onEachFeature: popUp,
					style: function(feature) {
						var D_kd_kel = feature.properties.D_kd_kel;
						return {
							"color": getColorDesa(D_kd_kel),
							"weight": 3,
							"opacity": 30
						}
					},
				}).addTo(map)
			}
			layersDesa.push(layer);
		}
	}
	// end pengaturan untuk layer desa

// pengaturan untuk layer blok

	{
		function getColorBlok(d_blok) {
			for (i = 0; i < dataBlok.length; i++) {
				var data = dataBlok[i];
				if (data.kd_blok == d_blok) {
					return data.warna_blok;
				}
			}
		}

		function popUp(f, l) {
			var html = '';
			if (f.properties) {
				/*html += '<table>';
				html += '<tr>';
				html += '<td>Provinsi</td>';
				html += '<td>:</td>';
				html += '<td>JAWA TENGAH</td>';
				html += '</tr>';
				html += '<tr>';
				html += '<td>Blok</td>';
				html += '<td>:</td>';
				html += '<td>' + f.properties['D_nm_kec'] + '</td>';
				html += '</tr>';
				html += '<tr>';
				html += '<td>Kelurahan</td>';
				html += '<td>:</td>';
				html += '<td>' + f.properties['KELURAHAN'] + '</td>';
				html += '</tr>';
				html += '</table>';
				l.bindPopup(html);*/
				l.bindTooltip(f.properties['d_blok'].substring(10), {
					permanent: true,
					direction: "center",
					className: "no-background"
				});
			}
		}

		for (i = 0; i < dataBlok.length; i++) {
			var data = dataBlok[i];
			var layer = {
				name: data.nm_blok,
				icon: iconByName(data.warna_blok),
				layer: new L.GeoJSON.AJAX(["assets/unggah/geojson/" + data.geojson_blok], {
					onEachFeature: popUp,
					style: function(feature) {
						var d_blok = feature.properties.d_blok;
						return {
							"color": getColorBlok(d_blok),
							"weight": 3,
							"opacity": 30
						}
					},
				}).addTo(map)
			}
			layersBlok.push(layer);
		}
	}
	
	// end pengaturan untuk layer blok

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
		/*marker: {
			icon: "",
			circle: {
				radius: 20,
				color: '#f32',
				opacity: 1,
				weight: 5
			}
		}*/
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
		{
			group: "Layer Pipa",
			layers: layersPipa
		},
		{
			group: "Layer Bangunan",
			layers: layersBangunan
		},
		{
			group: "Layer Cakupan",
			layers: layersCakupan
		},
		{
			group: "Layer Kecamatan",
			layers: layersKecamatan
		},
		{
			group: "Layer Desa",
			layers: layersDesa
		},
		{
			group: "Layer Blok",
			layers: layersBlok
		},
	];
	var panelLayers = new L.Control.PanelLayers(baseLayers, overLayers, {
		collapsibleGroups: true,
		collapsed: true
	});

	map.addControl(panelLayers);
	// end registrasikan untuk panel layer
</script>
<!-- Bootstrap modal -->
<style type="text/css">
<!--
.style1 {color: #FFFFFF}
-->
#overlay{	
  position: fixed;
  top: 0;
  z-index: 100;
  width: 100%;
  height:100%;
  display: none;
  background: rgba(0,0,0,0.6);
}
.cv-spinner {
  height: 100%;
  display: flex;
  justify-content: center;
  align-items: center;  
}
.spinner {
  width: 40px;
  height: 40px;
  border: 4px #ddd solid;
  border-top: 4px #2e93e6 solid;
  border-radius: 50%;
  animation: sp-anime 0.8s infinite linear;
}
@keyframes sp-anime {
  100% { 
    transform: rotate(360deg); 
  }
}
.is-hide{
  display:none;
}
</style>
<div id="overlay">
  <div class="cv-spinner">
    <span class="spinner"></span>
  </div>
</div>
 
<div class="modal fade bd-example-modal-lg"id="verifyModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header navbar-dark bg-dark">
        <h2 class="style1">Detail Objek Pajak</h2>
      </div>
	  



<nav class="navbar navbar-dark bg-primary">
  <div class="nav nav-tabs" id="nav-tab" role="tablist" align="center">
    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Informasi Objek Pajak</a>
    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Informasi Bangunan Objek Pajak</a>
   <!-- <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Contact</a>-->
  </div>
</nav>
<div class="tab-content" id="nav-tabContent">
  <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
  <table width="100%" border="0">
  <tr>
    <td colspan="4"><label class="control-label ">
      <div align="center">OBJEK PAJAK </div>
    </label></td>
    </tr>
  <tr>
    <td><label class="control-label ">NOP</label></td>
    <td><input name="nop" id="nop" placeholder="NOP" readonly=""  type="text" /></td>
    <td colspan="2">&nbsp;</td>
    </tr>
  <tr>
    <td><label class="control-label ">Letak OP</label></td>
    <td colspan="3"><input name="alamat_op" width="100%" id="alamat_op" placeholder="LETAK OP" readonly=""  type="text" /></td>
    </tr>
  <tr>
    <td><label class="control-label ">Luas Tanah </label></td>
    <td><input name="luas_bumi_sppt" id="luas_bumi_sppt" placeholder="LUAS TANAH" readonly=""  type="text" /></td>
    <td><label class="control-label ">Kode ZNT</label></td>
    <td><input name="kd_znt" id="kd_znt" placeholder="ZNT" readonly=""  type="text" /></td>
  </tr>
  <tr>
    <td><label class="control-label ">Jenis Tanah </label></td>
    <td><input name="jns_bumi" id="jns_bumi" placeholder="JENIS TANAH" readonly=""  type="text" /></td>
    <td><label class="control-label ">Jml Bangunan</label></td>
    <td><input name="jml_bng" id="jml_bng" placeholder="JUMLAH BANGUNAN" readonly=""  type="text" /></td>
  </tr>
  <tr>
    <td><label class="control-label ">NJOP Bumi
</label></td>
    <td><input name="njop_bumi_sppt" id="njop_bumi_sppt" placeholder="NJOP BUMI" readonly=""  type="text" /></td>
    <td><label class="control-label ">NJOP Bangunan</label></td>
    <td><input name="njop_bng_sppt" id="njop_bng_sppt" placeholder="NJOP BANGUNAN" readonly=""  type="text" /></td>
  </tr>
  <tr>
    <td><label class="control-label ">Total NJOP
</label></td>
    <td><input name="total_njop" id="total_njop" placeholder="TOTAL NJOP" readonly=""  type="text" /></td>
    <td colspan="2">&nbsp;</td>
    </tr>
  <tr>
    <td colspan="4"><label class="control-label ">
      <div align="center">WAJIB PAJAK </div>
    </label></td>
    </tr>
  <tr>
    <td><label class="control-label ">Nama Wajib Pajak</label></td>
    <td><input name="nama" id="nama" placeholder="NAMA WAJIB PAJAK" readonly=""  type="text" /></td>
    <td><label class="control-label ">Status</label></td>
    <td><input name="status_hak" id="status_hak" placeholder="STATUS PEMILIK" readonly=""  type="text" /></td>
  </tr>
  <tr>
    <td><label class="control-label ">Pekerjaan</label></td>
    <td><input name="pekerjaan_wp" id="pekerjaan_wp" placeholder="PEKERJAAN WAJIB PAJAK" readonly=""  type="text" /></td>
    <td><label class="control-label ">NPWP</label></td>
    <td><input name="npwp" id="npwp" placeholder="NPWP" readonly=""  type="text" /></td>
  </tr>
  <tr>
    <td><label class="control-label ">Alamat</label></td>
    <td><input name="alamat" id="alamat" placeholder="ALAMAT WAJIB PAJAK" readonly=""  type="text" /></td>
    <td colspan="2">&nbsp;</td>
    </tr>
</table>
</div>
  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">...</div>
  <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">...</div>
</div>
      <div class="modal-footer">

         <button style="outline: none;" type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><small style="color: navy; font-size: 15px;"><b>Close</b></small></span>
        </button>


      </div>
    </div>
  </div>
</div>

<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
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
<script src="<?= site_url('api/data/blk/blok?id='.$this->input->get('id')) ?>"></script>
<script src="<?= site_url('api/data/bng/bng?id='.$this->input->get('id')) ?>"></script>

<script type="text/javascript">
	var map = L.map('map').setView([-6.913817542952389, 109.630418631378419], 15);
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
	var layersBangunan = [];
	var layersDesa = [];
	var layersBlok = [];
	var arr = [];
	var arr1 = [];
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

	// pengaturan untuk layer bangunan
	{
	
		function getColorBangunan(d_nop) {
			for (i = 0; i < dataBangunan.length; i++) {
				var data = dataBangunan[i];
				if (data.kd_bangunan = d_nop.substring(0,10)) {
					return data.warna_bangunan;
				}
			}
		}
		
		// Set style function that sets fill color property
		function style(feature) {
			return {
				fillColor: 'green', 
				fillOpacity: 0.5,  
				weight: 2,
				opacity: 1,
				color: '#ffffff',
				dashArray: '3'
			};
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
			//  layer.setStyle(style); //resets layer colors
                l.setStyle(highlight);  //highlights selected.
				  jQuery(function($){
				  $(document).ajaxSend(function() {
					$("#overlay").fadeIn(100);　
				  });
				  $.ajax({
					dataType: "json",
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

// pengaturan untuk layer blok

	{
		function getColorBlok(d_blok) {
			for (i = 0; i < dataBlok.length; i++) {
				var data = dataBlok[i];
				if (data.kd_blok== d_blok.substring(0,10)) {
					return data.warna_blok;
				}
			}
		}

		function popUp(f, l) {
			var html = '';
			if (f.properties) {
//				l.bindPopup(html);
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
							"opacity": 0
						}
					},
				}).addTo(map)
			}
			layersBlok.push(layer);
		}
	}
	
	// end pengaturan untuk layer blok

	// registrasikan untuk panel layer
	var overLayers = [
		{
			group: "Layer Bangunan",
			layers: layersBangunan
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
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header navbar-dark bg-dark">
        <div align="center"><h2 class="style1">Detail Objek Pajak</h2></div>
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
  <table class="table"width="100%">
  <thead class="thead-light">
    <tr>
      <th colspan="5" scope="col"><div align="center">OBJEK PAJAK </div></th>
      </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">&nbsp;</th>
      <td><label class="control-label ">NOP</label></td>
      <td colspan="3"><input name="nop" id="nop" placeholder="NOP" readonly=""  type="text" /></td>
      </tr>
    <tr>
      <th scope="row">&nbsp;</th>
      <td><span class="control-label ">Letak OP</span></td>
      <td colspan="23"><input name="alamat_op" width="100%" id="alamat_op" placeholder="LETAK OP" readonly=""  type="text" /></td>
      </tr>
    <tr>
      <th scope="row">&nbsp;</th>
      <td><span class="control-label ">Luas Tanah </span></td>
      <td><input name="luas_bumi_sppt" id="luas_bumi_sppt" placeholder="LUAS TANAH" readonly=""  type="text" /></td>
      <td><label class="control-label ">Kode ZNT</label></td>
	   <td><input name="kd_znt" id="kd_znt" placeholder="ZNT" readonly=""  type="text" /></td>
    </tr>
    <tr>
      <th scope="row">&nbsp;</th>
      <td><span class="control-label ">Jenis Tanah </span></td>
      <td><input name="jns_bumi" id="jns_bumi" placeholder="JENIS TANAH" readonly=""  type="text" /></td>
      <td><label class="control-label ">Jml Bangunan</label></td>
      <td><input name="jml_bng" id="jml_bng" placeholder="JUMLAH BANGUNAN" readonly=""  type="text" /></td>
    </tr>
    <tr>
      <th scope="row">&nbsp;</th>
      <td><span class="control-label ">NJOP Bumi </span></td>
      <td><input name="njop_bumi_sppt" id="njop_bumi_sppt" placeholder="NJOP BUMI" readonly=""  type="text" /></td>
      <td><label class="control-label ">NJOP Bangunan</label></td>
      <td><input name="njop_bng_sppt" id="njop_bng_sppt" placeholder="NJOP BANGUNAN" readonly=""  type="text" /></td>
    </tr>
    <tr>
      <th scope="row">&nbsp;</th>
      <td><label class="control-label ">Total NJOP </label></td>
      <td colspan="3"><input name="total_njop" id="total_njop" placeholder="TOTAL NJOP" readonly=""  type="text" /></td>
      </tr>
  </tbody>
</table>

<table class="table" width="100%">
  <thead class="thead-light">
    <tr>
      <th colspan="5" scope="col"><div align="center">WAJIB PAJAK </div></th>
      </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">&nbsp;</th>
      <td><span class="control-label ">Nama Wajib Pajak</span></td>
      <td><input name="nama" id="nama" placeholder="NAMA WAJIB PAJAK" readonly=""  type="text" /></td>
      <td><span class="control-label ">Status</span></td>
	  <td><input name="status_hak" id="status_hak" placeholder="STATUS PEMILIK" readonly=""  type="text" /></td>
    </tr>
    <tr>
      <th scope="row">&nbsp;</th>
      <td><span class="control-label ">Pekerjaan</span></td>
      <td><input name="pekerjaan_wp" id="pekerjaan_wp" placeholder="PEKERJAAN WAJIB PAJAK" readonly=""  type="text" /></td>
      <td><span class="control-label ">NPWP</span></td>
	  <td><input name="npwp" id="npwp" placeholder="NPWP" readonly=""  type="text" /></td>
    </tr>
    <tr>
      <th scope="row">&nbsp;</th>
      <td><span class="control-label ">Alamat</span></td>
      <td colspan="3"><input name="alamat" id="alamat" placeholder="ALAMAT WAJIB PAJAK" readonly=""  type="text" /></td>
      </tr>
  </tbody>
</table>
  </div>
  <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">...</div>
  <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">...</div>
</div>
      <div class="modal-footer">
<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>

      </div>
    </div>
  </div>
</div>
var map, featureList, boroughSearch = [], desaSearch = [], sigpbbSearch = [];

$(window).resize(function() {
  sizeLayerControl();
});

$(document).on("click", ".feature-row", function(e) {
  $(document).off("mouseout", ".feature-row", clearHighlight);
  sidebarClick(parseInt($(this).attr("id"), 10));
});

if ( !("ontouchstart" in window) ) {
  $(document).on("mouseover", ".feature-row", function(e) {
    highlight.clearLayers().addLayer(L.circleMarker([$(this).attr("lat"), $(this).attr("lng")], highlightStyle));
  });
}

$(document).on("mouseout", ".feature-row", clearHighlight);

$("#about-btn").click(function() {
  $("#aboutModal").modal("show");
  $(".navbar-collapse.in").collapse("hide");
  return false;
});

$("#full-extent-btn").click(function() {
  map.fitBounds(boroughs.getBounds());
  $(".navbar-collapse.in").collapse("hide");
  return false;
});

$("#full-extent-btn").click(function() {
  map.fitBounds(desa.getBounds());
  $(".navbar-collapse.in").collapse("hide");
  return false;
});

//cari koordinat
$("#find-coordinate-btn").click(function() {
  $("#findCoordinateModal").modal("show");
  $(".navbar-collapse.in").collapse("hide");
  return false;
});

$("#legend-btn").click(function() {
  $("#legendModal").modal("show");
  $(".navbar-collapse.in").collapse("hide");
  return false;
});

$("#login-btn").click(function() {
  $("#loginModal").modal("show");
  $(".navbar-collapse.in").collapse("hide");
  return false;
});

$("#list-btn").click(function() {
  animateSidebar();
  return false;
});

$("#nav-btn").click(function() {
  $(".navbar-collapse").collapse("toggle");
  return false;
});

$("#sidebar-toggle-btn").click(function() {
  animateSidebar();
  return false;
});

$("#sidebar-hide-btn").click(function() {
  animateSidebar();
  return false;
});

function animateSidebar() {
  $("#sidebar").animate({
    width: "toggle"
  }, 350, function() {
    map.invalidateSize();
  });
}

function sizeLayerControl() {
  $(".leaflet-control-layers").css("max-height", $("#map").height() - 50);
}

function clearHighlight() {
  highlight.clearLayers();
}

function sidebarClick(id) {
  var layer = markerClusters.getLayer(id);
  map.setView([layer.getLatLng().lat, layer.getLatLng().lng], 17);
  layer.fire("click");
  /* Hide sidebar and go to the map on small screens */
  if (document.body.clientWidth <= 767) {
    $("#sidebar").hide();
    map.invalidateSize();
  }
}

function syncSidebar() {
  /* Empty sidebar features */
  $("#feature-list tbody").empty();
  /* Loop through objekpajak layer and add only features which are in the map bounds */
  objekpajak.eachLayer(function (layer) {
    if (map.hasLayer(objekpajakLayer)) {
      if (map.getBounds().contains(layer.getLatLng())) {
          $("#feature-list tbody").append('<tr class="feature-row" id="' + L.stamp(layer) + '" lat="' + layer.getLatLng().lat + '" lng="' + layer.getLatLng().lng + '"><td style="vertical-align: middle;"><img width="16" height="18" src="assets/img/'+layer.feature.properties.JPG+'""></td><td class="feature-name">' + layer.feature.properties.Nama + '</td><td style="vertical-align: middle;"><i class="fa fa-chevron-right pull-right"></i></td></tr>');

      }
    }

  });

  /* Update list.js featureList */
  featureList = new List("features", {
    valueNames: ["feature-name"]
  });
  featureList.sort("feature-name", {
    order: "asc"
  });
}

/* Basemap Layers */
var cartoLight = L.tileLayer("http://{s}.tile.osm.org/{z}/{x}/{y}.png", {
  maxZoom: 19,
  attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, &copy; <a href="https://cartodb.com/attributions">CartoDB</a>'
});
var usgsImagery = L.layerGroup([L.tileLayer("http://basemap.nationalmap.gov/arcgis/rest/services/USGSImageryOnly/MapServer/tile/{z}/{y}/{x}", {
  maxZoom: 15,
}), L.tileLayer.wms("http://raster.nationalmap.gov/arcgis/services/Orthoimagery/USGS_EROS_Ortho_SCALE/ImageServer/WMSServer?", {
  minZoom: 16,
  maxZoom: 19,
  layers: "0",
  format: 'image/jpeg',
  transparent: true,
  attribution: "Aerial Imagery courtesy USGS"
})]);
var googleStreets = L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}',{
    maxZoom: 20,
    subdomains:['mt0','mt1','mt2','mt3']
});

var googleHybrid = L.tileLayer('http://{s}.google.com/vt/lyrs=s,h&x={x}&y={y}&z={z}',{
    maxZoom: 20,
    subdomains:['mt0','mt1','mt2','mt3']
});

var googleSat = L.tileLayer('http://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}',{
    maxZoom: 20,
    subdomains:['mt0','mt1','mt2','mt3']
});

//tutup baselayer

/* Overlay Layers */
var highlight = L.geoJson(null);
var highlightStyle = {
  stroke: false,
  fillColor: "#00FFFF",
  fillOpacity: 0.7,
  radius: 10
};

//ADMIN COLOR
//menampung variabel warna kecamatan
var kecColors={
"KANDANGSERANG":"#CEF6D8",
"BUARAN":"#F8E0E0",
"WIRADESA": "#CED8F6",
"TIRTO" : "#F6CEE3",
"WONOKERTO" : "#CEF6EC",
"KARANGDADAP" : "#F2F5A9",
"PANINGGARAN" : "#ECCEF5",
"LEBAKBARANG" : "#A9F5D0",
"PETUNGKRIYONO":"#CEF6D8",
"TALUN":"#F8E0E0",
"DORO": "#CED8F6",
"KARANGANYAR" : "#F6CEE3",
"KAJEN" : "#CEF6EC",
"KESESI" : "#F2F5A9",
"SRAGI" : "#ECCEF5",
"SIWALAN" : "#A9F5D0",
"KEDUNGWUNI":"#CEF6D8",
"WONOPRINGGO":"#F8E0E0",
"BOJONG": "#CED8F6"
};

function style_kecamatan(feature) {
  return {
    opacity: 10,
    color: 'rgba(0,0,0,0.1)',
    dashArray: '',
    lineCap: 'butt',
    lineJoin: 'miter',
    weight: 3.0, 
    fillOpacity: 1,
    fillColor: kecColors[feature.properties['Kecamatan']]
  };
}
function style_desa(feature) {
  return {
    opacity: 50,
    color: 'rgba(0,0,0,0.1)',
    dashArray: '',
    lineCap: 'butt',
    lineJoin: 'miter',
    weight: 3.0, 
    fillOpacity: 1,
   // fillColor: kecColors[feature.properties['Kecamatan']]
  };
}

var boroughs = L.geoJson(null, {
  style: style_kecamatan,
  onEachFeature: function (feature, layer) {
    if (feature.properties) {
      var content = "<table class='table table-striped table-bordered table-condensed'>" 
    + "<tr><th>Kecamatan</th><td>" + feature.properties.Kecamatan + "</td></tr>" 
   //  + "<tr><th>Kecamatan</th><td>" + feature.properties.Kelurahan + "</td></tr>" 
   // + "<tr><th>Luas</th><td>" + feature.properties.LuasHa + " ha<sup>2</sup></td></tr>" 
    + "<tr><th>Kota</th><td> Kabupaten Pekalongan</td></tr>" 
    + "<table>";
      layer.on({
        click: function (e) {
          $("#feature-title").html(feature.properties.Kelurahan);
          $("#feature-info").html(content);
          $("#featureModal").modal("show");

        }
      });
        layer.on({
      mouseover: function (e) {
        var layer = e.target;
        layer.setStyle({
          weight: 2,
          color: "#00FFFF",
        //  fillColor:'rgba(120,200,96,60.0)',
         // fillOpacity:0.1,
          opacity: 1
        });
        if (!L.Browser.ie && !L.Browser.opera) {
         // layer.bringToFront();
        }
      },
      mouseout: function (e) {
        boroughs.resetStyle(e.target);
      }
    });

     
  }
    boroughSearch.push({
      name: layer.feature.properties.BoroName,
      source: "Boroughs",
      id: L.stamp(layer),
      bounds: layer.getBounds()
    });
  }
});
$.getJSON("data/boroughs.geojson", function (data) {
  boroughs.addData(data);
});

var desa = L.geoJson(null, {
  style: style_desa,
  onEachFeature: function (feature, layer) {
    if (feature.properties) {
      var content = "<table class='table table-striped table-bordered table-condensed'>" 
      + "<tr><th>Desa</th><td>" + feature.properties.NAME_4 + "</td></tr>" 
	  + "<tr><th>Kecamatan</th><td>" + feature.properties.NAME_3 + "</td></tr>" 
   // + "<tr><th>Luas</th><td>" + feature.properties.LuasHa + " ha<sup>2</sup></td></tr>" 
    + "<tr><th>Kota</th><td> Kabupaten Pekalongan</td></tr>" 
    + "<table>";
      layer.on({
        click: function (e) {
          $("#feature-title").html(feature.properties.NAME_4);
          $("#feature-info").html(content);
          $("#featureModal").modal("show");

        }
      });
        layer.on({
      mouseover: function (e) {
        var layer = e.target;
        layer.setStyle({
          weight: 2,
          color: "#00FFFF",
        //  fillColor:'rgba(120,200,96,60.0)',
         // fillOpacity:0.1,
          opacity: 1
        });
        if (!L.Browser.ie && !L.Browser.opera) {
         // layer.bringToFront();
        }
      },
      mouseout: function (e) {
        desa.resetStyle(e.target);
      }
    });

     
  }
    desaSearch.push({
      name: layer.feature.properties.BoroName,
      source: "desa",
      id: L.stamp(layer),
      bounds: layer.getBounds()
    });
  }
});
$.getJSON("data/desa.geojson", function (data) {
  desa.addData(data);
});


var subwayLines = L.geoJson(null, {
  style: function (feature) {
      return {
        color: "red",
        weight: 1,
        opacity: 1
      };
  },
  onEachFeature: function (feature, layer) {
    if (feature.properties) {
      var content = "<table class='table table-striped table-bordered table-condensed'>" + "<tr><th>Nama Ruas</th><td>" + feature.properties.Nama_C + 
      "</td></tr>" + "<tr><th>GSB</th><td>" + feature.properties.GSB + "</td></tr>" + "<tr><th>GSP</th><td>" + feature.properties.GSP + "</td></tr>" +"<table>";
      layer.on({
        click: function (e) {
          $("#feature-title").html(feature.properties.Nama_C);
          $("#feature-info").html(content);
          $("#featureModal").modal("show");

        }
      });
    }
    layer.on({
      mouseover: function (e) {
        var layer = e.target;
        layer.setStyle({
          weight: 3,
          color: "#00FFFF",
          opacity: 1
        });
        if (!L.Browser.ie && !L.Browser.opera) {
          layer.bringToFront();
        }
      },
      mouseout: function (e) {
        subwayLines.resetStyle(e.target);
      }
    });
  }
});
$.getJSON("data/jaringan_jalan.geojson", function (data) {
  subwayLines.addData(data);
});

/* Single marker cluster layer to hold all clusters */
var markerClusters = new L.MarkerClusterGroup({
  spiderfyOnMaxZoom: true,
  showCoverageOnHover: false,
  zoomToBoundsOnClick: true,
  disableClusteringAtZoom: 16
});

/* Empty layer placeholder to add to layer control for listening when to add/remove theaters to markerClusters layer */
var objekpajakLayer = L.geoJson(null);
var objekpajak = L.geoJson(null, {
  pointToLayer: function (feature, latlng) {
    return L.marker(latlng, {
      icon: L.icon({
        iconUrl: "assets/img/"+feature.properties.JPG,
        iconSize: [24, 28],
        iconAnchor: [12, 28],
        popupAnchor: [0, -25]
      }),
      title: feature.properties.Nama,
      riseOnHover: true
    });
  },
 onEachFeature: function (feature, layer) {
  if (feature.properties) {
      var content = "<table class='table table-striped table-bordered table-condensed'>" 
      + "<tr><th>NAMA</th><td>" + feature.properties.Nama + "</td></tr>"
      + "<tr><th>JENIS</th><td>" + feature.properties.Jenis + "</td></tr>" 
      + "<tr><th>KETERANGAN</th><td>" + feature.properties.Sejarah + "</td></tr>" 
      + "<tr><th>Gambar</th><td>  <img src='assets/img/"+ feature.properties.FOTO +"'  width=70%></a></td></tr>" + "<table>";
      layer.on({
        click: function (e) {
          $("#feature-title").html(feature.properties.Nama);
          $("#feature-info").html(content);
          $("#featureModal").modal("show");
          highlight.clearLayers().addLayer(L.circleMarker([feature.geometry.coordinates[1], feature.geometry.coordinates[0]], highlightStyle));
           var posisi = L.latLng(feature.geometry.coordinates[1],feature.geometry.coordinates[0]);
        // console.log(feature.geometry.coordinates[1] +' dan ' + feature.geometry.coordinates[0]);
       // map.panTo(posisi,{animate:true});
       map.setView(posisi, 18);
        }
      });
      $("#feature-list tbody").append('<tr class="feature-row" id="' + L.stamp(layer) + '" lat="' + layer.getLatLng().lat + '" lng="' + layer.getLatLng().lng + '"><td style="vertical-align: middle;"><img width="16" height="18" src="assets/img/theater.png"></td><td class="feature-name">' + layer.feature.properties.Nama + '</td><td style="vertical-align: middle;"><i class="fa fa-chevron-right pull-right"></i></td></tr>');
      sigpbbSearch.push({
        name: layer.feature.properties.Nama,
        source: "objekpajak",
        id: L.stamp(layer),
        lat: layer.feature.geometry.coordinates[1],
        lng: layer.feature.geometry.coordinates[0]
      });
    }
  }
});
$.getJSON("data/objekpajak.geojson", function (data) {
  objekpajak.addData(data);
  map.addLayer(objekpajakLayer);
});



map = L.map("map", {
  zoom: 10,
  center: [-7.031408, 109.566040],
  layers: [googleStreets, boroughs, desa, markerClusters, highlight],
  zoomControl: false,
  attributionControl: false
});

/* Layer control listeners that allow for a single markerClusters layer */
map.on("overlayadd", function(e) {
  if (e.layer === objekpajakLayer) {
    markerClusters.addLayer(objekpajak);
    syncSidebar();
  }
 
});

map.on("overlayremove", function(e) {
  if (e.layer === objekpajakLayer) {
    markerClusters.removeLayer(objekpajak);
    syncSidebar();
  }
 
});


/* Filter sidebar feature list to only show features in current map bounds */
map.on("moveend", function (e) {
  syncSidebar();
});

/* Clear feature highlight when map is clicked */
map.on("click", function(e) {
  highlight.clearLayers();
});

/* Attribution control */
function updateAttribution(e) {
  $.each(map._layers, function(index, layer) {
    if (layer.getAttribution) {
      $("#attribution").html((layer.getAttribution()));
    }
  });
}
map.on("layeradd", updateAttribution);
map.on("layerremove", updateAttribution);

var attributionControl = L.control({
  position: "bottomright"
});
attributionControl.onAdd = function (map) {
  var div = L.DomUtil.create("div", "leaflet-control-attribution");
  div.innerHTML = "<span class='hidden-xs'></span><a href='#' onclick='$(\"#attributionModal\").modal(\"show\"); return false;'>Attribution</a>";
  return div;
};
map.addControl(attributionControl);

//fungsi tombol zoomextend ketika di click
 $("#tombol-zoomExtent").click(function() {
   map.fitBounds(boroughs.getBounds());
//   //$(".navbar-collapse.in").collapse("hide");
   return false;
 });
  $("#tombol-zoomExtent").click(function() {
   map.fitBounds(desa.getBounds());
//   //$(".navbar-collapse.in").collapse("hide");
   return false;
 });

var zoomControl = L.control.zoom({
  position: "bottomright"
}).addTo(map);

/* GPS enabled geolocation control set to follow the user's location */
var locateControl = L.control.locate({
  position: "bottomright",
  drawCircle: true,
  follow: true,
  setView: true,
  keepCurrentZoomLevel: true,
  markerStyle: {
    weight: 1,
    opacity: 0.8,
    fillOpacity: 0.8
  },
  circleStyle: {
    weight: 1,
    clickable: false
  },
  icon: "fa fa-location-arrow",
  metric: false,
  strings: {
    title: "My location",
    popup: "You are within {distance} {unit} from this point",
    outsideMapBoundsMsg: "You seem located outside the boundaries of the map"
  },
  locateOptions: {
    maxZoom: 18,
    watch: true,
    enableHighAccuracy: true,
    maximumAge: 10000,
    timeout: 10000
  }
}).addTo(map);

/* tampilkan skala peta */
var scaleControl =  L.control.scale().addTo(map);


/* Larger screens get expanded layer control and visible sidebar */
if (document.body.clientWidth <= 767) {
  var isCollapsed = true;
} else {
  var isCollapsed = false;
}

var baseLayers = {
  "Aerial Imagery": usgsImagery,
  "Google Streets":googleStreets,
  "Google Satellite":googleSat
};

var groupedOverlays = {
   "Layer": {
    "Objek Pajak":objekpajakLayer,
    "Jaringan Jalan": subwayLines,
    "Kecamatan / Kelurahan": boroughs,
	"Desa": desa

   
  }
};

var layerControl = L.control.groupedLayers(baseLayers, groupedOverlays, {
  collapsed: isCollapsed
}).addTo(map);

/* Highlight search box text on click */
$("#searchbox").click(function () {
  $(this).select();
});

/* Prevent hitting enter from refreshing the page */
$("#searchbox").keypress(function (e) {
  if (e.which == 13) {
    e.preventDefault();
  }
});

$("#featureModal").on("hidden.bs.modal", function (e) {
  $(document).on("mouseout", ".feature-row", clearHighlight);
});

/* Typeahead search functionality */
$(document).one("ajaxStop", function () {
  $("#loading").hide();
  sizeLayerControl();
  /* Fit map to boroughs bounds */
  map.fitBounds(boroughs.getBounds());
  featureList = new List("features", {valueNames: ["feature-name"]});
  featureList.sort("feature-name", {order:"asc"});

  var boroughsBH = new Bloodhound({
    name: "Boroughs",
    datumTokenizer: function (d) {
      return Bloodhound.tokenizers.whitespace(d.name);
    },
    queryTokenizer: Bloodhound.tokenizers.whitespace,
    local: boroughSearch,
    limit: 10
  });

var desaBH = new Bloodhound({
    name: "desa",
    datumTokenizer: function (d) {
      return Bloodhound.tokenizers.whitespace(d.name);
    },
    queryTokenizer: Bloodhound.tokenizers.whitespace,
    local: desaSearch,
    limit: 10
  });

  var objekpajakBH = new Bloodhound({
    name: "objekpajak",
    datumTokenizer: function (d) {
      return Bloodhound.tokenizers.whitespace(d.name);
    },
    queryTokenizer: Bloodhound.tokenizers.whitespace,
    local: sigpbbSearch,
    limit: 10
  });

  

  var geonamesBH = new Bloodhound({
    name: "GeoNames",
    datumTokenizer: function (d) {
      return Bloodhound.tokenizers.whitespace(d.name);
    },
    queryTokenizer: Bloodhound.tokenizers.whitespace,
    remote: {
      url: "http://api.geonames.org/searchJSON?username=bootleaf&featureClass=P&maxRows=5&countryCode=US&name_startsWith=%QUERY",
      filter: function (data) {
        return $.map(data.geonames, function (result) {
          return {
            name: result.name + ", " + result.adminCode1,
            lat: result.lat,
            lng: result.lng,
            source: "GeoNames"
          };
        });
      },
      ajax: {
        beforeSend: function (jqXhr, settings) {
          settings.url += "&east=" + map.getBounds().getEast() + "&west=" + map.getBounds().getWest() + "&north=" + map.getBounds().getNorth() + "&south=" + map.getBounds().getSouth();
          $("#searchicon").removeClass("fa-search").addClass("fa-refresh fa-spin");
        },
        complete: function (jqXHR, status) {
          $('#searchicon').removeClass("fa-refresh fa-spin").addClass("fa-search");
        }
      }
    },
    limit: 10
  });
  boroughsBH.initialize();
  desaBH.initialize();
  objekpajakBH.initialize();
  geonamesBH.initialize();

  /* instantiate the typeahead UI */
  $("#searchbox").typeahead({
    minLength: 3,
    highlight: true,
    hint: false
  }, {
    name: "Boroughs",
    displayKey: "name",
    source: boroughsBH.ttAdapter(),
    templates: {
      header: "<h4 class='typeahead-header'>Boroughs</h4>"
    }
  }, {
	 name: "desa",
    displayKey: "name",
    source: desaBH.ttAdapter(),
    templates: {
      header: "<h4 class='typeahead-header'>desa</h4>"
    }
  }, {
    name: "objekpajak",
    displayKey: "name",
    source: objekpajakBH.ttAdapter(),
    templates: {
      header: "<h4 class='typeahead-header'><img src='assets/img/theater.png' width='24' height='28'>&nbsp;Objek Pajak</h4>",
      suggestion: Handlebars.compile(["{{name}}<br>&nbsp;<small>{{address}}</small>"].join(""))
    }
  }, {
    name: "GeoNames",
    displayKey: "name",
    source: geonamesBH.ttAdapter(),
    templates: {
      header: "<h4 class='typeahead-header'><img src='assets/img/globe.png' width='25' height='25'>&nbsp;GeoNames</h4>"
    }
  }).on("typeahead:selected", function (obj, datum) {
    if (datum.source === "Boroughs") {
      map.fitBounds(datum.bounds);
    }
	if (datum.source === "desa") {
      map.fitBounds(datum.bounds);
    }
    if (datum.source === "objekpajak") {
      if (!map.hasLayer(objekpajakLayer)) {
        map.addLayer(objekpajakLayer);
      }
      map.setView([datum.lat, datum.lng], 17);
      if (map._layers[datum.id]) {
        map._layers[datum.id].fire("click");
      }
    }
    
    if (datum.source === "GeoNames") {
      map.setView([datum.lat, datum.lng], 14);
    }
    if ($(".navbar-collapse").height() > 50) {
      $(".navbar-collapse").collapse("hide");
    }
  }).on("typeahead:opened", function () {
    $(".navbar-collapse.in").css("max-height", $(document).height() - $(".navbar-header").height());
    $(".navbar-collapse.in").css("height", $(document).height() - $(".navbar-header").height());
  }).on("typeahead:closed", function () {
    $(".navbar-collapse.in").css("max-height", "");
    $(".navbar-collapse.in").css("height", "");
  });
  $(".twitter-typeahead").css("position", "static");
  $(".twitter-typeahead").css("display", "block");
});

// Leaflet patch to make layer control scrollable on touch browsers
var container = $(".leaflet-control-layers")[0];
if (!L.Browser.touch) {
  L.DomEvent
  .disableClickPropagation(container)
  .disableScrollPropagation(container);
} else {
  L.DomEvent.disableClickPropagation(container);
}

/* Menampilkan Logo Dinas */
var container = $(".leaflet-control-layers")[0];
if (!L.Browser.touch) {
  L.DomEvent
  .disableClickPropagation(container)
  .disableScrollPropagation(container);
} else {
  L.DomEvent.disableClickPropagation(container);
}
L.Control.Watermark = L.Control.extend({
		onAdd: function(map) {
			var img = L.DomUtil.create('img');
			img.src = 'assets/img/welcome2.png';
			img.style.width = '100px';
			return img;
		},
		onRemove: function(map) {
		}
	});
	L.control.watermark = function(opts) {
		return new L.Control.Watermark(opts);
	}
L.control.watermark({ position: 'topleft' }).addTo(map);

L.control.betterscale().addTo(map);

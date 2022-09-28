

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.0/dist/leaflet.css" />
<link rel="stylesheet" href="leaflet-search.css" />
<link rel="stylesheet" href="style12.css" />
<style>
.leaflet-marker-icon {
	color: #fff;
	font-size: 16px;
	line-height: 16px;
	text-align: center;
	vertical-align: middle;
	box-shadow: 2px 1px 4px rgba(0,0,0,0.3);
	border-radius: 8px;
	border:1px solid #fff;
}
.search-tip b {
	color: #fff;
}
.green.search-tip b,
.green.leaflet-marker-icon {
	background: #green
}
.orange.search-tip b,
.orange.leaflet-marker-icon {
	background: #orange
}
.red.search-tip b,
.red.leaflet-marker-icon {
	background: #red
}
.search-tip {
	white-space: nowrap;
}
.search-tip b {
	display: inline-block;
	clear: left;
	float: right;
	padding: 0 4px;
	margin-left: 4px;
}
</style>
</head>

<body>
<h3><a href="../"><big>◄</big> Leaflet.Control.Search</a></h3>

<h4>Multiple Layers Example: <em>search markers in multiple layers</em></h4>
<div id="map"></div>

<script src="https://unpkg.com/leaflet@1.3.0/dist/leaflet.js"></script>
<script src="leaflet-search.js"></script>
<script src="starting_pois.json"></script>
<script>

	var map = L.map('map', {
			zoom: 14,
			center: new L.latLng(38.246639, 21.734573),
			layers: L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png')
		}),
		geojsonOpts = {
			pointToLayer: function(feature, latlng) {
				return L.marker(latlng, {
					icon: L.divIcon({
						className: feature.properties.amenity,
						iconSize: L.point(16, 16),
						html: feature.properties.amenity[0].toUpperCase(),
					})
				}).bindPopup(feature.properties.amenity+'<br><b>'+feature.properties.name+'</b>');
			}
		};

	var poiLayers = L.layerGroup([
		L.geoJson(green, geojsonOpts),
		L.geoJson(orange, geojsonOpts),
		L.geoJson(red, geojsonOpts)
	])
	.addTo(map);

	L.control.search({
		layer: poisLayers,
		initial: false,
		propertyName: 'name',
		buildTip: function(text, val) {
			var type = val.layer.feature.properties.amenity;
			return '<a href="#" class="'+type+'">'+text+'<b>'+type+'</b></a>';
		}
	})
	.addTo(map);


</script>

</body>
</html>

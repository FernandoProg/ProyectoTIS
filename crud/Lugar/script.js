
    let latitud = document.querySelector("#latitudLugar");
    let longitud = document.querySelector("#longitudLugar");

	let mymap = L.map('map').setView([51.505, -0.09], 13);

	L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
		maxZoom: 18,
		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
			'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		id: 'mapbox/streets-v11',
		tileSize: 512,
		zoomOffset: -1
    }).addTo(mymap);

	
	let popup = L.popup();

	function onMapClick(e) {
		popup
			.setLatLng(e.latlng)
			.setContent("Haz clickeado aquí")
			.openOn(mymap);
            latitud.value = e.latlng['lat'].toString().slice(0,7);
            longitud.value = e.latlng['lng'].toString().slice(0,7);
	}

    var greenIcon = L.icon({
        iconUrl: 'busMarker.png',
    
        iconSize:     [38, 50], // size of the icon
        // shadowSize:   [50, 64], // size of the shadow
        iconAnchor:   [22, 94], // point of the icon which will correspond to marker's location
        shadowAnchor: [4, 62],  // the same for the shadow
        popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
    });
    L.marker([51.5, -0.09], {icon: greenIcon}).addTo(mymap);

	mymap.on('click', onMapClick);


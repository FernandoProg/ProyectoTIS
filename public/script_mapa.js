console.log("ke pasa");
let map = L.map("map").setView([-26.3441113, -70.615], 15);

let tiles = L.tileLayer(
  "https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw",
  {
    maxZoom: 18,
    id: "mapbox/streets-v11",
    tileSize: 512,
    zoomOffset: -1,
  }
).addTo(map);

let popup = L.popup();

function onMapClick(e) {
  popup.setLatLng(e.latlng).setContent("Dirección seleccionada ").openOn(map);
  geocodeReverse(e.latlng["lat"], e.latlng["lng"]);
}

map.on("click", onMapClick);

let nombreLugar = document.getElementsByClassName("nombreLugar");
let latitudLugar = document.getElementsByClassName("latitudLugar");
let longitudLugar = document.getElementsByClassName("longitudLugar");
let categoriaLugar = document.getElementsByClassName("categoriaLugar");

// console.log(categoriaLugar[2].value);
// console.log(parseFloat(latitudLugar[0].value));
// console.log(parseFloat(longitudLugar[0].value));
colores = {
  "Lugar de trámite": "yellow",
  "Lugar de pago": "orange",
  "Lugar recreativo": "green",
  "Lugar de emergencia": "red",
  "Local comercial": "magenta",
  Salud: "navy",
  Correo: "aqua",
  Transporte: "grey",
  Educación: "brown",
};

for (let i = 0; i < nombreLugar.length; i++) {
  var circle = L.circle(
    [parseFloat(latitudLugar[i].value), parseFloat(longitudLugar[i].value)],
    {
      color: colores[categoriaLugar[i].value],

      fillOpacity: 0.5,
      radius: 25,
    }
  ).addTo(map);

  circle.bindPopup(nombreLugar[i].value);
}

//LLamando la funcion de geolocalizacion
let formularioDireccion = document.getElementById("formularioDireccion");
formularioDireccion.addEventListener("submit", geocode);

function geocode(e) {
  e.preventDefault();
  let direccionIngresada = document.getElementById("direccionIngresada").value;
  axios
    .get("https://api.mymappi.com/v2/geocoding/direct", {
      params: {
        q: direccionIngresada,
        apikey: "47334f19-6cf9-4386-8fa9-68a69cdaee60",
      },
    })
    .then(function (response) {
      //direccion formateada
      console.log(response);
      if (response.data.data[0].country == "Chile") {
        var popup = L.popup()
          .setLatLng([response.data.data[0].lat, response.data.data[0].lon])
          .setContent(response.data.data[0].normalized_query)
          .openOn(map);

        map.setView([response.data.data[0].lat, response.data.data[0].lon], 15);
      } else {
        alert("La dirección ingresada está fuera del país.");
      }
    })
    .catch(function (error) {
      console.log(error);
    });
}
function geocodeReverse(latitud, longitud) {
  let direccionIngresada = document.getElementById("direccionIngresada");
  axios
    .get("https://api.mymappi.com/v2/geocoding/reverse", {
      params: {
        apikey: "47334f19-6cf9-4386-8fa9-68a69cdaee60",
        lat: latitud,
        lon: longitud,
      },
    })
    .then(function (response) {
      console.log(response);
      direccionIngresada.value =
        response.data.data.address.name +
        ", " +
        response.data.data.address.suburb +
        ", " +
        response.data.data.address.city +
        ", " +
        response.data.data.address.country;
    })
    .catch(function (error) {});
}

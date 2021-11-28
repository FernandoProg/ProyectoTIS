let map = L.map("map").setView([51.505, -0.09], 13);

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
  popup.setLatLng(e.latlng).setContent("Haz clickeado aquí ").openOn(map);
}

map.on("click", onMapClick);

let nombreLugar = document.getElementsByClassName("nombreLugar");
let latitudLugar = document.getElementsByClassName("latitudLugar");
let longitudLugar = document.getElementsByClassName("longitudLugar");
let categoriaLugar = document.getElementsByClassName("categoriaLugar");

console.log(categoriaLugar[0].value);
console.log(parseFloat(latitudLugar[0].value));
console.log(parseFloat(longitudLugar[0].value));

for (let i = 0; i < nombreLugar.length; i++) {
  var circle = L.circle(
    [parseFloat(latitudLugar[0].value), parseFloat(longitudLugar[0].value)],
    {
      color: "red",
      fillColor: "#f03",
      fillOpacity: 0.5,
      radius: 5000,
    }
  ).addTo(map);

  circle.bindPopup(nombreLugar[i].value);
}

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
  popup.setLatLng(e.latlng).setContent("Haz clickeado aquí ").openOn(map);
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

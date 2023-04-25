<script>
//pasamos la colección gpss en json para que pueda ser leido por javascript
const gps = @json($gpss);
// var obj = JSON.parse(txt);
//Variable del mapa que vamos a mostrar
var map = L.map('map').setView([37.182214, -3.600884], 12);

L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 17
})

.addTo(map);

for (let i=gps.length - 1; i >= 0; i--) { 
console.log(gps[i].url);
//Coordenadas del json de gpss
L.marker([(gps[i].gps1), (gps[i].gps2)], {draggable: false}).addTo(map)
.bindPopup("<a href='"+gps[i].url+"')>"+gps[i].lugar+"</a>");
}
</script>





window.onload = function(){
var stuur = document.getElementById("stuur");

 stuur.onclick = function() {
  var invoer = document.getElementById("tafel").value;
var div = document.getElementById("tafelVan");
  
// for loop voor de tafel van 10
for (let i = 1; i <= 10; i++){
  // maal 10 : 
  var resultaat = i * invoer;
  // schrijven naar de div
  div.innerHTML += i + " x " + invoer + "is = " + resultaat + "<br>";
 }
}
}
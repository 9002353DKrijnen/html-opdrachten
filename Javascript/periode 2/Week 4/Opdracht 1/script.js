// div aanroepen

var div = document.getElementById("tafelVanTien");

// for loop voor de tafel van 10
for (let i = 1; i <= 10; i++){
  // maal 10 : 
  var resultaat = i * 10;
  // schrijven naar de div
  div.innerHTML += i + " x 10 = " + resultaat + "<br>";
}
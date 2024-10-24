var Budget = 100;
var product = 60;
 
var ResultP = document.getElementById("saldo")
 
if (Budget >= product) {
  ResultP.innerHTML = "U heeft genoeg geld!"
  ResultP.style.color = "green";
}
else {
  ResultP.innerHTML = "Helaas, te weinig geld"
  ResultP.style.color = "red";
}
// Opdracht 3
function Startanimatie(){
 setTimeout(function(){
document.getElementById("animation").style.animation = "JsAnimatielinks 1s infinite";
 }, 0);   
 setTimeout(function(){
 document.getElementById("animation").style.animation = "JSanimatierechts 1s infinite";
 }, 1000);
}
// Op herhaling 
setInterval(Startanimatie, 2000)

// Functie om willekeurige kleur te genereren
function getRandomColor() {
  const letters = '0123456789ABCDEF';
  let color = '#';
  for (let i = 0; i < 6; i++) {
    color += letters[Math.floor(Math.random() * 16)];
  }
  return color;
}
// aanroepen 
document.getElementById("animation").addEventListener('click', function() {
    this.style.backgroundColor = getRandomColor();
  });



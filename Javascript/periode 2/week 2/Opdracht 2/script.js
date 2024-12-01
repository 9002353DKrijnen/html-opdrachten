// Opdracht 2, de animatie duurt 4 seconden, ik had eerst klakkeloos timeout() neergezet zonder opening dus ja.....
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
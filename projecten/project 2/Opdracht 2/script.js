window.onload = function() {

var btn = document.getElementById("btn");
var form = document.querySelector(".loginForm");
btn.onclick = function(){
    event.preventDefault();
    var username = form.userid.value;
    var password = form.pwd.value;
 if (username === "admin" && password === "admin") {
    window.location.href = "./overzicht.html"; 
        return true; 
    } else {
        alert("Onjuiste gebruikersnaam of wachtwoord");
        return false; 
    }
}
}
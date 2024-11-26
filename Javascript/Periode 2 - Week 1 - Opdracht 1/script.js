window.onload = function(){
    var btn = document.getElementById("button");
    var modal = document.getElementsByClassName("cookiewall")[0];
    var background = document.getElementsByClassName("background")[0];
   btn.onclick = function(){
    modal.style.display = "none"; 
    background.style.display = "none"; 
   }



}


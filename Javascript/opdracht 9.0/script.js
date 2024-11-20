window.onload = function() {
    var modal = document.getElementById("myModal");
    var btn = document.getElementById("coockieknop");
    var span = document.getElementById("close");
    var verifyButton = document.getElementById("verifyButton");
    
    modal.style.display = "block";
    
    verifyButton.onclick = function() {
        var age = document.getElementById("verify").value;

        if (age >= 18) {
            modal.style.display = "none";  
        } else {
            window.location.href = "./rooie.html";  
        }
    };


    btn.onclick = function() {
        modal.style.display = "block";  
    };


    span.onclick = function() {
        modal.style.display = "none";  // 
    };
};

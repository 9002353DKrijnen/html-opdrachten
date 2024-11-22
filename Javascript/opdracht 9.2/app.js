
var emojiClosed = document.querySelector(".emoji.closed.active");
var emojiOpen = document.querySelector(".emoji.open");

    emojiClosed.onclick = function() {
        emojiClosed.style.display = "none";  
        emojiOpen.style.display = "block";  
    }

    emojiOpen.onclick = function() {
        emojiOpen.style.display = "none";   
        emojiClosed.style.display = "block"; 
    }


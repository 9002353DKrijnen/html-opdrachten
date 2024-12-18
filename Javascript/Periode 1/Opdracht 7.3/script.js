let counter = 0;

function increaseCounter() {
    counter++;  

    if (counter > 10) {
        counter = 0;  
    }

    document.getElementById("counter").innerHTML = counter;
}
var isAangepast = false;
function kleur_aanpassen() {
    var HeadingToAdjust = document.getElementById("h1");
    if (!isAangepast) {
        HeadingToAdjust.style.color = 'red';
        HeadingToAdjust.innerHTML = 'Inhoud aangepast!';
        isAangepast = true;
    } else {
        HeadingToAdjust.style.color = 'black';
        HeadingToAdjust.innerHTML = 'Dit is mijn eerste Javascript opdracht';
        isAangepast = false;
    }
}

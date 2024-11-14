function keer() {
    const num1 = parseFloat(document.getElementById("num1").value);
    const num2 = parseFloat(document.getElementById("num2").value);
    const result = num1 * num2;
    document.getElementById("result").innerText = "Resultaat: " + result;
}
function delen() {
    const num1 = parseFloat(document.getElementById("num1").value);
    const num2 = parseFloat(document.getElementById("num2").value);
    if (num2 !== 0) {
        const result = num1 / num2;
        document.getElementById("result").innerText = "Resultaat: " + result;
    } else {
        document.getElementById("result").innerText = "Kan niet door 0 delen";
    }
}
function plus() {
    const num1 = parseFloat(document.getElementById("num1").value);
    const num2 = parseFloat(document.getElementById("num2").value);
    const result = num1 + num2;
    document.getElementById("result").innerText = "Resultaat: " + result;
}

function min() {
    const num1 = parseFloat(document.getElementById("num1").value);
    const num2 = parseFloat(document.getElementById("num2").value);
    const result = num1 - num2;
    document.getElementById("result").innerText = "Resultaat: " + result;
}

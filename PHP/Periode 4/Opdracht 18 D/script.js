
// function add( variabel, can be 0-9, or a unique character like +.-/* etc)
function add(value) {

    // import the output
    let output = document.getElementById("output");

    // add numbers or unique characters to output
    output.value += value;

}
// function clear the output
function ac() {


    // import output 
    let output = document.getElementById("output");

    // set output to empty
    output.value = '';
}// uitrekenen
function calculate() {
    let result;

    // import round if checked
    let roundOption = document.getElementById("round");

    // import output
    let output = document.getElementById("output");

    // if there's no input there will be an alert
    if (output.value == '') {
        alert("Voer een waarde in svp");
        return;
    }
    // calculate result, userinput
    result = eval(output.value);

    if (roundOption.checked) {
        // round if checked   after we have done the calculation ;)
        result = Math.round(result);

    }


    output.value +=  " = " + result;
    // insert result into databse with xhttp


    // we will asign a variabel to xhttp request, with a new request

    let xhttp = new XMLHttpRequest();

    // set form to post, url to local location, true for async (otherwise server will keep waiting for reponse)
    xhttp.open("POST", "insert.php", true);


    // set server like a HTML form
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    // send all the data to the server so it can insert it into the database
    // encodeURIComponent() will encode special characters llike & to &''amp'';
    xhttp.send("result=" + encodeURIComponent(result));
    xhttp.onload = function () {
console.log("Raw response:", xhttp.responseText);
    }

}

function sqrt() {
    let output = document.getElementById("output");
    

    output.value = Math.sqrt(output.value);
}

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

    // calculate result, userinput
    result = eval(output.value);

    if (roundOption.checked) {
        // round if checked   after we have done the calculation ;)
        result = Math.round(result);

    }


        output.value = result;



}

function sqrt() {
    let output = document.getElementById("output");

    output.value = Math.sqrt(output.value);
}

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
}
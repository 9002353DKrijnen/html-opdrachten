var cat = {
    name: "Coots",
    age: "3",
    breed: "mix",
    meow: function () { alert(`Meeeoowwww`); },
    owner: { name: "Henny", state: "Noord-Brabant" }
}

// get the cat's name 
let catName = cat.name;

// get cat's owner
let catOwner = cat.owner.name;


//show a message 

alert(`${catOwner} has a cute cat named ${catName}`);

// make request

let request = new XMLHttpRequest;


// open request


request.open("get", "https://hplussport.com/api/products/");

// When  loaded do something with the response

request.onload = function () {
    let response = request.response;
    let parsedData = JSON.parse(response);
    console.log(parsedData);

}

// run the request 
request.send();



/*  fetch() method */

fetch('https://hplussport.com/api/products/')
    .then(
        function (response){
            return response.json();
        })
        .then(
            function(respData){
                console.log(respData);
            }
        )
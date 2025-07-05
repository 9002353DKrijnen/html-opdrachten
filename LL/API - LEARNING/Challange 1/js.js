var cat = {
    name: "Coots",
    age: "3",
    breed:"mix",
    meow: function() {alert(`Meeeoowwww`);},
    owner: {name: "Henny", state: "Noord-Brabant"}
}

// get the cat's name 
let catName = cat.name;

// get cat's owner
let catOwner =  cat.owner.name;


//show a message 

alert(`${catOwner} has a cute cat named ${catName}`);
/*
    index.js: A component of the front end UI: calls rater-api.php and returns insurance quote or error value

    Author: Tyler Hargreaves
    Updated on: 12/13/19

*/

function submit(){
    var name = document.getElementById("name").value;
    var amt = document.getElementById("amt").value;

    //Set up POST parameters
    const url = "rater-api.php";
    var params = {
        method:"POST",
        body:JSON.stringify({
            "name": name,
            "amt": parseInt(amt)
        })
    }

    //ES5 fetch API: sends parameters to URL, returns output and updates DOM in promise.
    fetch(url, params)
        .then(
            response => response.text() 
        ).then( //Update DOM
            val => {
                out = JSON.parse(val);

                if (out.error != "None"){
                    document.getElementById("output").innerHTML = out.error;
                }
                else{
                    document.getElementById("output").innerHTML = `Hello ${out.name}, your insurance quote is ${out.quote}.`;
                }

            }
        );
    
    
}



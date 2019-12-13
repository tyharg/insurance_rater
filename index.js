function submit(){
    var name = document.getElementById("name").value;
    var amt = document.getElementById("amt").value;


    const url = "rater-api.php";
    var params = {
        method:"POST",
        body:JSON.stringify({
            "name": name,
            "amt": parseInt(amt)
        })
    }

    fetch(url, params)
        .then(
            response => response.text() // .json(), etc.
            // same as function(response) {return response.text();}
        ).then(
            val => {
                out = JSON.parse(val);

                if (out.error != "None"){
                    document.getElementById("output").innerHTML = out.error;
                }
                else{
                    document.getElementById("output").innerHTML = `Hello ${out.name}, your insurance quote is ${out.quote}`;
                }

            }
        );
    
    
}



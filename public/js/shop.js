

function onJsonOkDb(json) {
    console.log(json);
    if (json.success) { // success=== true
        console.log(json.success);
    } else {
        console.log("no");
    }
}

function onResponse(response) {
    console.log(response);
    return response.json();

}


function onClick(event) {
    console.log("cliccato");
    console.log(this.value);
    fetch("add-to-cart/" + encodeURIComponent(this.value)).then(onResponse).then(onJsonOkDb);
    this.textContent = "Aggiunto al carrello!!";
    //wait for 2 seconds and then change the text back
    setTimeout(function () {
        this.textContent = "Acquista!";
    }
        .bind(this), 1000);
}



const consoleButt = document.querySelectorAll('.btn');
for (const but of consoleButt) {
    but.addEventListener("click", onClick);

}

console.log("shop.js Loaded");

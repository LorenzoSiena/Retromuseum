
function onRemoveFromCart(json) {
    console.log(json);
    if (json.success) { // success=== true
        console.log(json.success);
    } else {
        console.log("Error removing from cart");
    }
}

function onUpdateCart(json) {
    console.log(json);
    if (json.success) { // success=== true
        console.log(json.success);
    } else {
        console.log("Error removing from cart");
    }
}

function onResponse(response) {
    console.log(response);
    return response.json();
}






function onClickRemove(event) {
    const product = event.target.parentNode.parentNode;
    const pid = product.dataset.id;
    console.log("Cliccato remove");
    console.log(this.value);
    console.log("Mio padre è ");
    console.log(product.dataset.id);

    //FUNZIONA! :D
    fetch('remove-from-cart', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
            "X-CSRF-Token": document.querySelector('input[name=_token]').value
        },
        body: JSON.stringify({
            id: pid
        })
    }).then(onResponse).then(onRemoveFromCart);
        product.remove();
        calcolaTot();
    if(document.querySelectorAll('.product').length === 0) {
        document.querySelector('.bottom').textContent = '';
        document.querySelector('.title-cart').textContent = 'Il tuo carrello è vuoto';

    }
}
function onChangeUpdate(event) {

    console.log("Cambiato valore in");
    const newQuantita = event.target.value;
    const product = event.target.parentNode.parentNode;
    const pid = product.dataset.id;
    console.log(newQuantita);
    console.log("Mio padre è ");
    console.log(product);
    console.log("id del prodotto è ");
    console.log(pid);
    product.querySelector(".product-line-price").textContent = (newQuantita * parseFloat(product.querySelector(".product-price").textContent)).toFixed(2) + "€";


    //FUNZIONA! :D
    fetch('update-cart', {
        method: 'PATCH',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
            "X-CSRF-Token": document.querySelector('input[name=_token]').value
        },
        body: JSON.stringify({
            id: pid,
            quantity: newQuantita
        })
    }).then(onResponse).then(onRemoveFromCart);calcolaTot();

    if(document.querySelectorAll('.product').length === 0) {
        document.querySelector('.bottom').textContent = '';
        document.querySelector('.title-cart').textContent = 'Il tuo carrello è vuoto';
    }
}
function calcolaTot() {
    const priceProduct = document.querySelectorAll('.product-line-price');

    let tot = 0;

    for (const x of priceProduct) {
        console.log(x.textContent);
        // prezzo per la quantità!
        tot += parseFloat(x.textContent);

    }
    subTotale.textContent = (tot * (1 - 0.22)).toFixed(2) + "€";
    iva.textContent = (tot * 0.22).toFixed(2) + "€";
    Totale.textContent = (tot + 10).toFixed(2) + "€";

}

const inputButton = document.querySelectorAll('.product-quantity-input');
const RemoveButton = document.querySelectorAll('.product-removal-button');
const subTotale = document.getElementById('cart-subtotal');
const iva = document.getElementById('cart-tax');
const Totale = document.getElementById('cart-total');

const products = document.querySelectorAll('.product');

//const orderButton = document.getElementById('order');






for (const inp of inputButton) {
    inp.addEventListener('change', onChangeUpdate);
    console.log(inp.parentNode.parentNode);
}


for (const rem of RemoveButton) {
    rem.addEventListener("click", onClickRemove);
    console.log(rem.parentNode.parentNode);

}
//orderButton.addEventListener("click",onClickBuy);

console.log("cart.js loaded");

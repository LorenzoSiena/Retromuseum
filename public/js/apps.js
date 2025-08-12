
function onClickRestore(event){
    const h1=document.querySelector("body > header > h1");
    const menX=document.querySelector("body > header > div.containerMobile");
    menX.remove();
    h1.classList.remove('hidden');


    menu.removeEventListener("click",onClickRestore );
    menu.addEventListener("click", onClickOpenMenu);
}

function onClickOpenMenu(event){
    console.log('cliccato menu!');
    const headz= document.querySelector('header');
    const listMenu = document.createElement('div');

    const h1=document.querySelector("body > header > h1");

    const vetrina = document.createElement('div');

    const carrello = document.createElement('div');

    const about = document.createElement('div');

    const login = document.createElement('div');

    const sped = document.createElement('div');

    const v=document.createElement('a');
    const c=document.createElement('a');
    const a=document.createElement('a');
    const s=document.createElement('a');

    listMenu.appendChild(vetrina);
    listMenu.appendChild(carrello);

    let loginOUT ;

    if(document.querySelector("#links > div > form")===null){
        loginOUT = document.querySelector("#links > div > a");
    }
    else{
     loginOUT = document.querySelector("#links > div > form"); //se esiste logout
     s.href="http://localhost:8000/shipping";
     listMenu.appendChild(sped);
    }
    const clone = loginOUT.cloneNode(true);














    v.href="http://localhost:8000/home";
    a.href="http://localhost:8000/aboutUs";
    c.href="http://localhost:8000/cart";


    h1.classList.add('hidden');

    // h1.innerHTML=""; //-> display : none;


    listMenu.classList.add('containerMobile');

    vetrina.classList.add('itemMobile');
    v.classList.add('vetrina_button');

    carrello.classList.add('itemMobile');
    c.classList.add('carrello_button');

    about.classList.add('itemMobile');
    a.classList.add('about_button');

    sped.classList.add('itemMobile');
    s.classList.add('sped_button');
    clone.classList.add('logSpecialMobile');
    v.textContent="Vetrina";
    c.textContent="Carrello";
    a.textContent="AboutUs";
    s.textContent="Spedizioni";

    headz.appendChild(listMenu);
    vetrina.appendChild(v);
    carrello.appendChild(c);
    about.appendChild(a);
    sped.appendChild(s);


    login.appendChild(clone);



    //listMenu.appendChild(sped);    XXXXXXXXXXXXXXXXXXxxx

    listMenu.appendChild(about);
    listMenu.appendChild(login);
    menu.removeEventListener("click", onClickOpenMenu);
    menu.addEventListener("click", onClickRestore);

}

const menu = document.getElementById('menu');

menu.addEventListener("click", onClickOpenMenu);
console.log('shop.js Loaded');

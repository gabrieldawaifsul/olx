const nome = document.getElementById("name");
const owner = document.getElementById("owner");
const desc = document.getElementById("description");
const price = document.getElementById("price");
const amount = document.getElementById("amount");
const id = null;

const itemGeneric = {
    "name": "listagem",
    "owner": "usuario",
    "desc": "lorem ipsum dolor sit amet",
    "price": 100,
    "amount": 3
}

function init(item){
    nome.innerHTML = item.name;
    owner.innerHTML = item.owner;
    desc.innerHTML = item.desc;
    price.innerHTML = item.price;
    amount.innerHTML = item.amount;
}

init(itemGeneric);


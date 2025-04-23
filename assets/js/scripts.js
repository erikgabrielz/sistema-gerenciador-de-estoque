const BASE_URL = "http://localhost:8080";

var userLogged = false;

let cookies = document.cookie.split('; ')

if(cookies.indexOf("user-logged")){
    cookies.map(item => {
        if(item.slice(0, -2) == "user-logged"){
            userLogged = item.slice(-1) == 1; 
        }
    })
}


document.body.onload = () => {    
    if(window.location.href == `${BASE_URL}/` || window.location.href == `${BASE_URL}/home`){
        fetch(`${BASE_URL}/home/getStock`, {
            headers: {
                'Accept': 'application/json'
            }
        })
        .then(response => {
            if (!response.ok) { // Verifica se a resposta foi bem-sucedida
                throw new Error(`Erro: ${response.status}`);
            }
    
            return response.json(); // Converte a resposta para JSON
        })
        .then(data => {
            let items = document.querySelector("#home-items");
            let searchInput = document.querySelector("#search");
            // Função para renderizar os itens conforme o filtro
            if(data.status == 204){
                document.getElementById('item-title').innerHTML = data.data;
                return;
            }
            
            const renderItems = (filteredList) => {
                items.innerHTML = "";
                filteredList.forEach(item => {            
                    items.innerHTML += `
                    <div class="item flex center justify">
                        <div class="item-desc">
                            <h3 class="item-title">${item.category} ${item.product}</h3>
                            <p>Marca: ${item.brand}</p>
                            <p>Fornecedor: ${item.supplier}</p>
                            <p>Aro: ${item.extra}</p>
                            <p>Qualidade: ${item.type}</p>
                            ${item.quantity > 0 ? `Quantidade: ${item.quantity}` : `<span style="color: red;">Indisponível no estoque</span>`}
                            ${item.quantity > 0 ? `<p>Valor: R$ ${item.price}</p>` : ""}
                        </div>
                        ${userLogged ? `<div class="item-action">
                            <a href="${BASE_URL}/home/edit/${item.id}"><button class="button"><img class="icon" src="${BASE_URL}/assets/media/edit.png" /></button></a>
                            <button onclick="confirmAlert('delete', ${item.id}, '${item.category}', '${item.product}')" class="button"><img class="icon" src="${BASE_URL}/assets/media/trash.png" /></button>
                            ${item.quantity > 0 ? `<button onclick="confirmAlert('sell', ${item.id}, '${item.category}', '${item.product}')" class="button"><img class="icon" src="${BASE_URL}/assets/media/sell.png" /></button>` : ``}
                        </div>` : ""}
                    </div>
                    `;
                });
            };
    
            // Renderizar os itens inicialmente
            renderItems(data);
    
            // Adicionar evento de busca dinâmica
            searchInput.addEventListener("input", () => {
                const searchTerms = searchInput.value.toLowerCase().split(' '); // Divide a entrada por espaços
            
                const filteredList = data.filter(item => 
                    searchTerms.every(term => // Verifica se todos os termos se aplicam ao item
                        item.product.toLowerCase().includes(term) ||
                        item.category.toLowerCase().includes(term) ||
                        item.brand.toLowerCase().includes(term) ||
                        item.extra.toLowerCase().includes(term) ||
                        item.type.toLowerCase().includes(term)
                    )
                );
            
                renderItems(filteredList);
            });
        })
        .catch(error => {
            console.error('Erro na requisição:', error)
        }); // Captura e exibe erros
    }
}

function confirmAlert(action, id, category, name){
    let alert;

    if(action == "delete"){

        alert = window.confirm(`Tem certeza que deseja excluir o item: ${category} ${name}?`);

        if(alert){
            window.location.href = `${BASE_URL}/home/delete/${id}`;
        }
    }

    if(action == "sell"){
        alert = window.confirm(`Tem certeza que deseja vender um item de: ${category} ${name}?`)
        if(alert){
            window.location.href = `${BASE_URL}/home/sell/${id}`;
        }
    }
}

if(window.location.href == `${BASE_URL}/` || window.location.href == `${BASE_URL}/home`){
    const dotsElement = document.getElementById('loading');
    let dots = '';
    setInterval(() => {
        dots = dots.length < 3 ? dots + '.' : '';
        dotsElement.textContent = dots;
    }, 200); // Atualiza a cada 500ms
}


let msg = document.querySelector(".alert-msg");

if(msg){
    setInterval(() => {
        msg.style.display = "none"; 
    }, 5000)
}

if(window.location.href == `${BASE_URL}/home/add`){
    function formatarValor(valor) {
        if (!valor) return "R$ 0,00";
    
        let numero = parseFloat(valor.replace(/\D/g, "")) / 100; // Remove caracteres não numéricos e ajusta
        return numero.toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' });
    }
    
    document.getElementById("price").addEventListener("input", function (e) {
        e.target.value = formatarValor(e.target.value); // Aplica a formatação
    });
}
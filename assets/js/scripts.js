const BASE_URL = "http://localhost";

document.body.onload = () => {    
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
                        <h3 class="item-title">${item.category} ${item.name}</h3>
                        <p class="item-price">Marca: ${item.brand}</p>
                        <p class="item-price">Aro: ${item.extra}</p>
                        <p class="item-type">Qualidade: ${item.type}</p>
                        <p class="item-amount">Quantidade: ${item.quantity}</p>
                        <p class="item-price">Valor: R$ ${item.price}</p>
                    </div>
                    <div class="item-action">
                        <a href="${BASE_URL}/home/edit/${item.id}"><button class="button"><img class="icon" src="${BASE_URL}/assets/media/edit.png" /></button></a>
                        <button onclick="confirmAlert('delete', ${item.id}, '${item.category}', '${item.name}')" class="button"><img class="icon" src="${BASE_URL}/assets/media/trash.png" /></button>
                        <button onclick="confirmAlert('sell', ${item.id}, '${item.category}', '${item.name}')" class="button"><img class="icon" src="${BASE_URL}/assets/media/sell.png" /></button>
                    </div>
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
                    item.name.toLowerCase().includes(term) ||
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

const dotsElement = document.getElementById('loading');
let dots = '';
setInterval(() => {
    dots = dots.length < 3 ? dots + '.' : '';
    dotsElement.textContent = dots;
}, 200); // Atualiza a cada 500ms


let msg = document.querySelector("#msg-home");

if(msg){
    setInterval(() => {
        msg.style.display = "none"; 
    }, 5000)
}
if (window.location.href == `${BASE_URL}/clientes`) {
    fetch(`${BASE_URL}/clientes/getClients`, {
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'text/html; charset=utf8',
        }
    })
    .then(response => {
        if (!response.ok) { 
            throw new Error(`Erro: ${response.status}`);
        }
        return response.json();
    })
    .then(data => {

        console.log(data);

        let items = document.querySelector("#home-items");
        let searchInput = document.querySelector("#search");

        if (data.status == 204) {
            document.getElementById('item-title').innerHTML = data.data;
            return;
        }

        const renderItems = (filteredList) => {
            items.innerHTML = "";
            filteredList.forEach(item => {            
                items.innerHTML += `
                <div class="item flex center justify">
                    <div class="item-desc">
                        <h3 class="item-title">${item.name}</h3>
                        <p>CPF/CNPJ: ${item.cpf}</p>
                        <p>E-mail: ${item.email}</p>
                        <p>Contato: ${item.phone}</p>
                        <p>Dados de endereço:</p>
                        <p>Logradouro: ${item.street}, ${item.number} - ${item.district}</p>
                        <p>Cidade/UF: ${item.city}/${item.uf}</p>
                        <p>CEP: ${item.cep}</p>
                    </div>
                    ${userLogged ? `
                    <div class="item-action">
                        <a href="${BASE_URL}/home/edit/${item.id}"><button class="button"><img class="icon" src="${BASE_URL}/assets/media/edit.png" /></button></a>
                        <button onclick="confirmAlert('delete', 'client', ${item.id}, '${item.name}')" class="button"><img class="icon" src="${BASE_URL}/assets/media/trash.png" /></button>
                    </div>` : ""}
                </div>
                `;
            });
        };

        renderItems(data);

        searchInput.addEventListener("input", () => {
            const searchTerms = searchInput.value.toLowerCase().split(' ');

            const filteredList = data.filter(item => 
                searchTerms.every(term => 
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
        console.error('Erro na requisição:', error);
    });
}

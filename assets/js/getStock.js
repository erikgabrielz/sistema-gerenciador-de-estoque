document.body.onload = () => {    
    if (window.location.href == `${BASE_URL}/` || window.location.href == `${BASE_URL}/home`) {
        fetch(`${BASE_URL}/home/getStock`, {
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
                            <h3 class="item-title">${item.category} ${item.product}</h3>
                            <p>Marca: ${item.brand}</p>
                            ${item.supplier != "Não se aplica" ? `<p>Fornecedor: ${item.supplier}</p>` : ``}
                            ${item.extra != "Não se aplica" ? `<p>Aro: ${item.extra}</p>` : ``}
                            ${item.type != "Não se aplica" ? `<p>Qualidade: ${item.type}</p>` : ``}
                            ${item.quantity > 0 ? `<p>Quantidade: ${item.quantity}</p>` : `<span style="color: red;">Indisponível no estoque</span>`}
                            ${item.quantity > 0 ? `<p>Valor: R$ ${item.price.toFixed(2).replace(".", ",")}</p>` : ""}
                        </div>
                        ${userLogged ? `
                        <div class="item-action">
                            <a href="${BASE_URL}/home/edit/${item.id}"><button class="button"><img class="icon" src="${BASE_URL}/assets/media/edit.png" /></button></a>
                            <button onclick="confirmAlert('delete', ${item.id}, '${item.category}', '${item.product}')" class="button"><img class="icon" src="${BASE_URL}/assets/media/trash.png" /></button>
                            ${item.quantity > 0 ? `<button onclick="confirmAlert('sell', ${item.id}, '${item.category}', '${item.product}')" class="button"><img class="icon" src="${BASE_URL}/assets/media/sell.png" /></button>` : ``}
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
};
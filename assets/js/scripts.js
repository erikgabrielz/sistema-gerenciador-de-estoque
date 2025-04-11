document.body.onload = () => {    
    let list = [];
    fetch('http://localhost:8080/home/getStock')
    .then(response => {
        if (!response.ok) { // Verifica se a resposta foi bem-sucedida
        throw new Error(`Erro: ${response.status}`);
        }
        return response.json(); // Converte a resposta para JSON
    })
    .then(data => {
        let items = document.querySelector("#home-items")
        items.innerHTML = "";
        list = data;
        data.forEach(item => {            
            items.innerHTML += `
            <div class="item flex center justify">
                <div class="item-desc">
                    <h3 class="item-title">${item.category} ${item.name}</h3>
                    <p class="item-price">Aro: ${item.extra}</p>
                    <p class="item-type">Qualidade: ${item.type}</p>
                    <p class="item-amount">Quantidade: ${item.quantity}</p>
                    <p class="item-price">Valor: R$ ${item.price}</p>
                    
                </div>
                <div class="item-action">
                    <a href="#"><button class="button"><img class="icon" src="assets/media/edit.png" /></button></a>
                    <a href="#"><button class="button"><img class="icon" src="assets/media/trash.png" /></button></a>
                </div>
            </div>
        `
        });

    })
    .catch(error => {
        console.error('Erro na requisição:', error)
    }); // Captura e exibe erros
}
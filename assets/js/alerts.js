function confirmAlert(action, page, id, category, name) {
    let alert;

    if (action == "delete") {
        if(page == "home"){
            alert = window.confirm(`Tem certeza que deseja excluir o item: ${category} ${name}?`);
            if (alert) {
                window.location.href = `${BASE_URL}/home/delete/${id}`;
            }
        }
        if(page == "client"){
            alert = window.confirm(`Tem certeza que deseja excluir o cliente: ${category}?`);
            if (alert) {
                window.location.href = `${BASE_URL}/clientes/delete/${id}`;
            }
        }        
    }

    if (action == "sell") {
        alert = window.confirm(`Tem certeza que deseja vender um item de: ${category} ${name}?`);
        if (alert) {
            window.location.href = `${BASE_URL}/home/sell/${id}`;
        }
    }
}
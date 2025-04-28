function confirmAlert(action, id, category, name) {
    let alert;

    if (action == "delete") {
        alert = window.confirm(`Tem certeza que deseja excluir o item: ${category} ${name}?`);
        if (alert) {
            window.location.href = `${BASE_URL}/home/delete/${id}`;
        }
    }

    if (action == "sell") {
        alert = window.confirm(`Tem certeza que deseja vender um item de: ${category} ${name}?`);
        if (alert) {
            window.location.href = `${BASE_URL}/home/sell/${id}`;
        }
    }
}
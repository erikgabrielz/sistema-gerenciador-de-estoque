function formatarValor(valor) {
    if (!valor) return "R$ 0,00";
    let numero = parseFloat(valor.replace(/\D/g, "")) / 100;
    return numero.toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' });
}

const campoPreco = document.getElementById("price");

if (window.location.href == `${BASE_URL}/home/add` || window.location.href.indexOf(`${BASE_URL}/home/edit`) != -1) {
    input = document.getElementById("price");
    input.value = formatarValor(input.value);

    input.addEventListener("input", (e) =>{
        e.target.value = formatarValor(e.target.value)
    })
}




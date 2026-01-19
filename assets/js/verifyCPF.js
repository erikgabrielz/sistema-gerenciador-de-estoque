if(window.location.href == `${BASE_URL}/clientes/add`){
    let cpfInput = document.querySelector("#cpf");

    cpfInput.addEventListener("input", (event) => {
        
        let cpf = event.target.value

        if(cpf.length == 14 || cpf.length == 18){
            setTimeout(() => {
                
                fetch(`${BASE_URL}/clientes/verifyCPF/${cpf}`)
                .then(response => {
                    if (!response.ok) { 
                        throw new Error(`Erro: ${response.status}`);
                    }
                    return response.json();
                })
                .then(data => {
                    if(data.body == true){
                        cpfInput.style.border = `1px solid var(--font-color-error)`;
                        cpfInput.style.color = "var(--font-color-error)";
                        cpfInput.classList.add("invalid-placeholder");
                        document.querySelector(`#cpf-message`).textContent = "CPF/CNPJ já cadastrado na base de dados.";
                    }
                });
            }, 1000);
        }

    });
}

//CPF: 14 dígitos
//CNPJ: 18 dígitos
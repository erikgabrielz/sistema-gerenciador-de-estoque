if(window.location.href == `${BASE_URL}/clientes/add`){

    function validarCEP(input) {
        const valor = input.value.replace(/\D/g, ''); // Remove tudo que não for número
        input.value = valor.replace(/^(\d{5})(\d)/, '$1-$2'); // Insere o hífen após o quinto dígito
    }

    fetch(`https://servicodados.ibge.gov.br/api/v1/localidades/estados`)
    .then(response => {
        if (!response.ok) { 
            throw new Error(`Erro: ${response.status}`);
        }
        return response.json();
    })
    .then(data => {
        let uf = document.querySelector('#uf')
        data.forEach(element => {
            const newOption = document.createElement('option');

            // Define o texto e o valor da opção
            newOption.text = `${element.sigla} - ${element.nome}`;
            newOption.value = element.sigla;

            // Adiciona a opção ao select
            uf.appendChild(newOption);
        });
        
    }).catch(error => {
        console.error('Erro na requisição:', error);
    });

    function getCities(e){
        fetch(`https://servicodados.ibge.gov.br/api/v1/localidades/estados/${e.target.value}/municipios`)
        .then(response => {
            if(!response.ok){
                throw new Error(`Erro: ${response.status}`)
            }
            return response.json();
        })
        .then(data => {
            console.log(data);

            let cities = document.querySelector('#city');
            cities.options.length = 0;

            data.forEach(element => {
                const newOption = document.createElement('option');

                // Define o texto e o valor da opção
                newOption.text = element.nome;
                newOption.value = element.nome;

                // Adiciona a opção ao select
                cities.appendChild(newOption);
            });
        })
        .catch(error => {
            console.error('Erro na requisição:', error);
        })
    }
}


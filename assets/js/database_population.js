document.body.onload = () => {
    fetch(`https://servicodados.ibge.gov.br/api/v1/localidades/municipios`)
    .then(response => {
        if (!response.ok) { 
            throw new Error(`Erro: ${response.status}`);
        }
        return response.json();
    })
    .then(data => {

        fetch(`${BASE_URL}/state`)
        .then(response => {
            if (!response.ok) { 
                throw new Error(`Erro: ${response.status}`);
            }
            return response.json();
        }).then(response => {
        
            for(let i = 0; i < response.length; i++){
                data.forEach(element => {

                    //console.log(element.microrregiao)

                    if(element?.microrregiao?.mesorregiao){
                        if(element.microrregiao.mesorregiao.UF.sigla == response[i].acronym){
                        
                            setInterval(() => {
                               async function fetch(){
                                fetch(`${BASE_URL}/city/index/${element.nome}/${response[i].id}`, {
                                    method: 'POST', // Define o método como POST
                                    })
                                    .then(response => response.json()) // Converte a resposta para JSON
                                    .then(data => console.log(data)) // Exibe os dados no console
                                    .catch(error => console.error('Erro:', error)); // Captura erros
                                } 
                                fetch();
                            }, 1000)
                            
                        }
                    }
                });

            };

            
        }).catch(error => {
            console.error('Erro na requisição:', error);
        });
    
        

        
    }).catch(error => {
        console.error('Erro na requisição:', error);
    });
};

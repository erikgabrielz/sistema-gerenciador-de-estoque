fetch(`https://servicodados.ibge.gov.br/api/v1/localidades/estados`)
    .then(response => {
        if (!response.ok) { 
            throw new Error(`Erro: ${response.status}`);
        }
        return response.json();
    })
    .then(data => {

        data.forEach(element => {
            console.log(`${element.sigla} - ${element.nome}`)
        });
        
    }).catch(error => {
        console.error('Erro na requisição:', error);
    });
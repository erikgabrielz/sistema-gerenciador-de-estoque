document.body.onload = () => {
    fetch(`https://servicodados.ibge.gov.br/api/v1/localidades/municipios`)
    .then(response => {
        if (!response.ok) { 
            throw new Error(`Erro: ${response.status}`);
        }
        return response.json();
    })
    .then(data => {

        console.log(data)

        
    }).catch(error => {
        console.error('Erro na requisição:', error);
    });
};

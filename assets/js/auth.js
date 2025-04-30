var userLogged;
let cookies = document.cookie.split('; ').find(cookie => cookie.startsWith("token="));

if (cookies) {
    fetch(`${BASE_URL}/login/isLogged`, {
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
        userLogged = data;
    })
    .catch(error => {
        console.error('Erro na requisição:', error);
    });
}
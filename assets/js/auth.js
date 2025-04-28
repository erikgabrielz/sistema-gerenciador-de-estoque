var userLogged = false;
let cookies = document.cookie.split('; ');

if (cookies.indexOf("user-logged")) {
    cookies.map(item => {
        if (item.slice(0, -2) == "user-logged") {
            userLogged = item.slice(-1) == 1;
        }
    });
}
var email = document.querySelector("#email");
var password = document.querySelector("#password");
var confirmPassword = document.querySelector("#confirm-password");

function validateField(input) {
    const errorColor = "var(--font-color-error)";
    const color = "var(--font-color-1)";

    let isValid = false;

    if (input === email) {
        // Validação de e-mail
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (emailRegex.test(email.value)) {
            email.style.border = "";
            email.style.color = color;
            document.querySelector(`#${email.id}-message`).innerHTML = "";
            isValid = true;
        } else {
            email.style.border = `1px solid ${errorColor}`;
            email.style.color = errorColor;
            document.querySelector(`#${email.id}-message`).innerHTML = "E-mail inválido";
        }
    }

    if (input === password) {
        // Validação de senha
        if (password.value.length === 8) {
            password.style.border = "";
            password.style.color = color;
            document.querySelector(`#${password.id}-message`).innerHTML = "";
            isValid = true;
        } else {
            password.style.border = `1px solid ${errorColor}`;
            password.style.color = errorColor;
            document.querySelector(`#${password.id}-message`).innerHTML = "Campo senha precisa ter 8 caracteres";
        }
    }

    if (input === confirmPassword) {
        // Validação de confirmação de senha
        if (confirmPassword.value === password.value && confirmPassword.value.length === 8) {
            confirmPassword.style.border = "";
            confirmPassword.style.color = color;
            document.querySelector(`#${confirmPassword.id}-message`).innerHTML = "";
            isValid = true;
        } else if (confirmPassword.value !== password.value) {
            confirmPassword.style.border = `1px solid ${errorColor}`;
            confirmPassword.style.color = errorColor;
            document.querySelector(`#${confirmPassword.id}-message`).innerHTML = "As senhas não conferem";
        }
    }

    return isValid;
}

function addValidation(input) {
    input.addEventListener("input", () => validateField(input));
    input.addEventListener("blur", () => validateField(input));
    input.addEventListener("change", () => validateField(input));
}

if(window.location.href == `${BASE_URL}/configuracoes`){
    addValidation(email);
    addValidation(password);
    addValidation(confirmPassword);

    document.querySelector("#password-form").addEventListener("submit", (event) => {
        const isPassValid = validateField(password);
        const isConfirmPassValid = validateField(confirmPassword);
    
        if (!isPassValid || !isConfirmPassValid) {
            event.preventDefault();
        }
    });
    
    document.querySelector("#email-form").addEventListener("submit", (event) => {
        const isEmailValid = validateField(email);
    
        if (!isEmailValid) {
            event.preventDefault();
        }
    });
}
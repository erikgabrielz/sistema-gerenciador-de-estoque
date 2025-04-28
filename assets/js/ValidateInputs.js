// Selecionando os inputs das páginas
var user = document.querySelector("#user");
var email = document.querySelector("#email");
var password = document.querySelector("#password");
var confirmPassword = document.querySelector("#confirm-password");

function validateField(input) {
    const errorColor = "var(--font-color-error)";
    const color = "var(--font-color-1)";

    let isValid = false;

    if (input === email) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        isValid = emailRegex.test(email.value);
        updateFieldUI(email, isValid, "E-mail inválido");
    }

    if (input === password) {
        isValid = password.value.length === 8;
        updateFieldUI(password, isValid, "A senha deve conter 8 caracteres");
    }

    if (input === confirmPassword) {
        isValid = confirmPassword.value === password.value && confirmPassword.value.length === 8;
        updateFieldUI(confirmPassword, isValid, "As senhas não conferem");
    }

    if (input === user) {
        isValid = user.value.length != 0 && user.value.length == 4;
        updateFieldUI(user, isValid, "Nome de usuário precisa ter 4 letras");
    }

    // Ajustando cor do placeholder quando inválido
    updatePlaceholderStyle(input, isValid);

    return isValid;
}

function updateFieldUI(input, isValid, errorMessage) {
    if (isValid) {
        input.style.border = "";
        input.style.color = "var(--font-color-1)";
        input.classList.remove("invalid-placeholder");
        document.querySelector(`#${input.id}-message`).textContent = "";
    } else {
        input.style.border = `1px solid var(--font-color-error)`;
        input.style.color = "var(--font-color-error)";
        input.classList.add("invalid-placeholder");
        document.querySelector(`#${input.id}-message`).textContent = errorMessage;
    }
}

function updatePlaceholderStyle(input, isValid) {
    if (!isValid && input.value === "") {
        input.classList.add("invalid-placeholder");
    } else {
        input.classList.remove("invalid-placeholder");
    }
}

function addValidation(input) {
    input?.addEventListener("input", () => validateField(input));
    input?.addEventListener("blur", () => validateField(input));
    input?.addEventListener("change", () => validateField(input));
}

// Identificando página e aplicando validações específicas
if (window.location.href.includes("/login")) {
    addValidation(user);
    addValidation(password);
} else if (window.location.href.includes("/redefinir")) {
    addValidation(user);
    addValidation(email);
} else if (window.location.href.includes("/updatePassword")) {
    addValidation(password);
    addValidation(confirmPassword);
} else if (window.location.href.includes("/configuracoes")) {
    addValidation(email);
    addValidation(password);
    addValidation(confirmPassword);
}

// Gerenciando envio dos formulários
// Verifica se há pelo menos um formulário na página antes de adicionar o evento
const forms = document.querySelectorAll("form");

if (forms.length > 0) {
    forms.forEach(form => {
        form.addEventListener("submit", event => {
            let isValid = true;
            let formElement = event.target; // Pega o formulário correto

            formElement.querySelectorAll(".input").forEach(input => {
                let fieldValid = validateField(input);

                if (!fieldValid) {
                    isValid = false;
                }
            });

            // Verifica se o formulário tem o atributo "valid" definido como "true"
            if (formElement.getAttribute("valid") === "true") {
                if (!isValid) {
                    event.preventDefault(); // Bloqueia o envio caso algum campo seja inválido
                }
            }
        });
    });
}
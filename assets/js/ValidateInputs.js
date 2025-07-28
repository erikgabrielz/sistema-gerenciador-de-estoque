// Selecionando os inputs das páginas
var user = document.querySelector("#user");
var email = document.querySelector("#email");
var password = document.querySelector("#password");
var confirmPassword = document.querySelector("#confirm-password");

//client 
var cpf = document.querySelector("#cpf");
var input_name = document.querySelector("#name");
var phone = document.querySelector("#phone")

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

    if (input === cpf) {
        const cpfRegex = /^\d{3}\.\d{3}\.\d{3}-\d{2}$/;
        const cnpjRegex = /^\d{2}\.\d{3}\.\d{3}\/\d{4}-\d{2}$/;

        const isCpf = cpfRegex.test(cpf.value);
        const isCnpj = cnpjRegex.test(cpf.value);

        isValid = isCpf || isCnpj;

        let errorMessage = "CPF ou CNPJ inválido";
        if (!isValid) {
            errorMessage += " (ex: 123.456.789-00 ou 12.345.678/0001-95)";
        }
        updateFieldUI(cpf, isValid, errorMessage);
    }

    if (input === input_name) {
        isValid = input_name.value.trim().length > 0;
        updateFieldUI(input_name, isValid, "Preencha o nome do cliente.");
    }

    if (input === phone) {
        const phoneRegex = /^\(?\d{2}\)?\s?\d{4,5}-\d{4}/;
        isValid = phoneRegex.test(phone.value);
        updateFieldUI(phone, isValid, "Telefone inválido (ex: (11) 91234-5678)");
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
} else if(window.location.href.includes("/clientes")){
    addValidation(cpf);
    addValidation(input_name);
    addValidation(phone);
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
                const isRequired = input.hasAttribute("required-input");
                const value = input.value.trim();

                // Só valida se o campo é obrigatório ou se está preenchido
                if (isRequired) {
                    const fieldValid = validateField(input);

                    if (!fieldValid) {
                        isValid = false;
                    }

                    //para debug de input
                    //console.log(`${input.name || input.id} → válido: ${fieldValid}`);
                } else {
                    //console.log(`${input.name || input.id} → ignorado (opcional e vazio)`);
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
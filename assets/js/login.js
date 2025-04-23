let errorColor = "var(--font-color-error)";

function validateField(input, minLength, maxLength, message) {
    const { id, value } = input;
    const messageElement = document.querySelector(`#${id}-message`);

    let isValid = value.length >= minLength && value.length <= maxLength;

    input.style.border = isValid ? "none" : `1px solid ${errorColor}`;
    input.style.color = isValid ? "var(--font-color-1)" : errorColor;

    if (!isValid) {
        let addCSS = document.querySelector(`#${id}-placeholder-style`) || document.createElement('style');
        addCSS.id = `${id}-placeholder-style`;
        document.body.append(addCSS);
        addCSS.innerHTML = `#${id}::placeholder { color: ${errorColor}; }`;
        messageElement.innerHTML = message;
    } else {
        messageElement.innerHTML = "";
    }

    return isValid;
}

function addValidation(input, minLength, maxLength, message) {
    input.addEventListener("input", () => validateField(input, minLength, maxLength, message));
    input.addEventListener("blur", () => validateField(input, minLength, maxLength, message));
}

let userInput = document.querySelector("#user");
let passInput = document.querySelector("#pass");
addValidation(userInput, 4, 4, "Campo nome de usuário precisa ter 4 letras!");
addValidation(passInput, 8, 8, "Campo senha precisa ter 8 caracteres!");

document.querySelector("form").addEventListener("submit", (event) => {
    let isUserValid = validateField(userInput, 4, 4, "Campo nome de usuário precisa ter 4 letras!");
    let isPassValid = validateField(passInput, 8, 8, "Campo senha precisa ter 8 caracteres!");

    if (!isUserValid || !isPassValid) {
        event.preventDefault();
    }
});
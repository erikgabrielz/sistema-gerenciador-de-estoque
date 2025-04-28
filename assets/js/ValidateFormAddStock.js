const form = document.getElementById("form-items");

if (form) {
    form.addEventListener("submit", function(event) {
        let isValid = true;

        document.querySelectorAll("select.input").forEach(select => {
            const selectedValue = select.value;

            if (selectedValue === "0" || selectedValue.trim() === "") {
                isValid = false;
                select.style.border = "1px solid var(--font-color-error)";
                select.style.color = "var(--font-color-error)";
                select.classList.add("invalid-placeholder");
            }
        });

        const quantityInput = document.getElementById("quantity");
        const quantityValue = quantityInput.value.trim();

        if (quantityValue === "" || parseInt(quantityValue) <= 0) {
            isValid = false;
            quantityInput.style.border = "1px solid var(--font-color-error)";
            quantityInput.style.color = "var(--font-color-error)";
            quantityInput.classList.add("invalid-placeholder");
        }

        if (!isValid) {
            event.preventDefault();
        }
    });

    // Remover estilização ao interagir com o select
    document.querySelectorAll("select.input").forEach(select => {
        select.addEventListener("focus", function() {
            select.style.border = "";
            select.style.color = "";
        });
    });

    // Remover estilização ao interagir com o input de quantidade
    const quantityInput = document.getElementById("quantity");
    if (quantityInput) {
        quantityInput.addEventListener("focus", function() {
            quantityInput.style.border = "";
            quantityInput.style.color = "";
        });
    }
}
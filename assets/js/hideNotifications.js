let msg = document.querySelector(".alert-msg");

if (msg) {
    setInterval(() => {
        msg.style.display = "none";
    }, 5000);
}
document.addEventListener("DOMContentLoaded", () => {
    console.log("Sistema EEPD-BH carregado!");
    animarEntrada();
});

function animarEntrada() {
    const elementos = document.querySelectorAll(".animar");
    elementos.forEach(el => {
        el.style.opacity = 0;
        el.style.transform = "translateY(40px)";
        setTimeout(() => {
            el.style.transition = "0.8s";
            el.style.opacity = 1;
            el.style.transform = "translateY(0)";
        }, 200);
    });
}

function alerta(texto){
    alert("EEPD-BH: " + texto);
}
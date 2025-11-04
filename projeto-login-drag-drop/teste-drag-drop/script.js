// === TROCA DE IMAGEM DO PALHAÇO ===
const clownImage = document.getElementById("clownImage");
const welcomeButton = document.getElementById("welcomeButton");
const imgOriginal = "./assets/img/login-palhaco.png";
const imgHover = "./assets/img/login-palhaco-2.png";

clownImage.addEventListener("mouseover", () => clownImage.src = imgHover);
clownImage.addEventListener("mouseout", () => clownImage.src = imgOriginal);

// === ALERTAS ===
welcomeButton.addEventListener("click", () => {
    alert("Bem-vindo ao curso de Palhaço para Iniciantes! 🎪");
});

document.getElementById("loginForm").addEventListener("submit", (e) => {
    e.preventDefault();
    alert("Login realizado com sucesso! 🤡");
});

// === DRAG & DROP ELEMENTOS DE CIRCO ===
const circusItems = document.querySelectorAll(".circus-item");

circusItems.forEach(item => {
    let offsetX, offsetY;

    item.addEventListener("mousedown", (e) => {
        offsetX = e.clientX - item.getBoundingClientRect().left;
        offsetY = e.clientY - item.getBoundingClientRect().top;

        const onMouseMove = (e) => {
            item.style.left = `${e.clientX - offsetX}px`;
            item.style.top = `${e.clientY - offsetY}px`;
        };

        document.addEventListener("mousemove", onMouseMove);

        document.addEventListener("mouseup", () => {
            document.removeEventListener("mousemove", onMouseMove);
        }, { once: true });
    });
});

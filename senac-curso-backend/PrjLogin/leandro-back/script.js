// Seleção de elementos
const clownImage = document.getElementById("clownImage");
const welcomeButton = document.getElementById("welcomeButton");

const imgOriginal = "./assets/img/login-palhaco.png";
const imgHover = "./assets/img/login-palhaco-2.png";

// Trocar imagem ao passar o mouse
clownImage.addEventListener("mouseover", () => {
    clownImage.src = imgHover;
});

clownImage.addEventListener("mouseout", () => {
    clownImage.src = imgOriginal;
});

// Mensagem de boas-vindas
welcomeButton.addEventListener("click", () => {
    alert("Bem-vindo ao curso de Palhaço para Iniciantes! 🎪");
});

// Simulação de login
document.getElementById("loginForm").addEventListener("submit", (e) => {
    e.preventDefault();
    alert("Login realizado com sucesso! 🤡");
});

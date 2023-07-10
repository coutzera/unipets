const menuToggle = document.querySelector(".burger");
const linkMenu = document.querySelectorAll("a");

menuToggle.addEventListener('click', () => {
  document.body.classList.toggle('open')
});

linkMenu.forEach(link => {
  link.addEventListener('click', () => document.body.classList.toggle('open'))
});

// Obtém a referência da modal
var modal = document.getElementById("myModal");

// Obtém o elemento de fechar
var closeBtn = document.getElementsByClassName("close")[0];

// Exibe a modal ao carregar a página
window.onload = function() {
  modal.style.display = "block";
};

// Fecha a modal ao clicar no botão de fechar
closeBtn.onclick = function() {
  modal.style.display = "none";
};

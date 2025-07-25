// Acha a div com a classe modal
const modal = document.querySelector(".modal");

// Acha o botão de fechar
const buttonClose = document.querySelector(".closeModal");

// Adiciona o evento de click no botão de fechar
// Ao clicar, a modal deve ser escondida
buttonClose.addEventListener("click", () => {
  modal.style.display = "none";
});

// Acha o botão de abrir
const buttonOpen = document.querySelector("#openModal");

// Adiciona o evento de click no botão de abrir
// Ao clicar, a modal deve ser mostrada
buttonOpen.addEventListener("click", () => {
  modal.style.display = "block";
});

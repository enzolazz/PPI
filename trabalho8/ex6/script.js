// No load da página, adiciona os eventos de click aos botões
// Deixa a pagina de home como página ativa.
window.onload = function () {
  buttons = document.querySelectorAll("nav button");

  buttons.forEach(function (button) {
    button.addEventListener("click", changeTab);
  });

  openTab(0);
};

// Função que adiciona o evento de click aos botões
function changeTab(event) {
  // Acha o botão que se deseja configurar
  const addedButton = event.target;
  const buttonLi = addedButton.parentNode;

  // Cria um array com todos os possíveis botões de navegação a serem clicados
  // e acha o índice do botão clicado
  const nodes = Array.from(buttonLi.parentNode.children);
  const index = nodes.indexOf(buttonLi);

  openTab(index);
}

// Função que abre a aba correspondente ao botão clicado
function openTab(index) {
  // Se tiver uma aba ativa, remove a classe activeTab da section
  const activeTab = document.querySelector(".activeTab");
  if (activeTab) activeTab.classList.remove("activeTab");

  // Se tiver um botão ativo, remove a classe activeButton do botão
  const buttonActive = document.querySelector(".activeButton");
  if (buttonActive) buttonActive.classList.remove("activeButton");

  // Seleciona todas as seções dentro da classe tabs e já coloca a classe activeTab no index correspondente
  document.querySelectorAll(".tabs section")[index].classList.add("activeTab");

  // Seleciona todos os botões dentro da nav e já coloca a classe activeButton no index correspondente
  document.querySelectorAll("nav button")[index].classList.add("activeButton");
}

// Achar o campo de input para adicionar os itens à lista ordenada.
const inputField = document.querySelector("input");

// Adicionar um evento de keyup (alguma tecla foi clicada)
// e se a tecla for o Enter, adicionar o item (valor do input) à lista ordenada.
inputField.addEventListener("keyup", (e) => {
  if (e.key === "Enter") {
    // Criar os elementos necessários:
    const newItem = document.createElement("li");
    const newSpan = document.createElement("span");
    const newButton = document.createElement("button");

    // Configurar os elementos criados:
    newSpan.textContent = inputField.value;
    newButton.textContent = "❌";

    // Adicionar os elementos criados ao item da lista:
    newItem.appendChild(newSpan);
    newItem.appendChild(newButton);

    // Achar a lista ordenada e adicionar o novo item a ela:
    const orderedList = document.querySelector("ol");
    orderedList.appendChild(newItem);

    // Adicionar o evento de click ao botão para remover o item da lista:
    newButton.addEventListener("click", () => {
      orderedList.removeChild(newItem);
    });

    inputField.value = "";
  }
});

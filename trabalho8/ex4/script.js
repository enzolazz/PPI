// Define a ação de um usuário ao clicar no botão de submissão do formulário
document.forms.cadastro.onsubmit = validaForm;

function validaForm(e) {
  // Pega o formulário em questão
  let form = e.target;
  let formValido = true;

  // Acha os elementos de span que são irmãos dos seus respectivos inputs
  const spanUsuario = form.usuario.nextElementSibling;
  const spanSenha = form.senha.nextElementSibling;
  const spanEmail = form.email.nextElementSibling;

  // Define o texto como vazio (para evitar que o aviso fique mesmo após o usuário ter corrigido)
  spanUsuario.textContent = "";
  spanSenha.textContent = "";
  spanEmail.textContent = "";

  // Verifica se o usuário de fato inseriu todos os valores obrigatórios.
  if (form.usuario.value === "") {
    spanUsuario.textContent = "Usuário deve ser preenchido";
    formValido = false;
  }

  if (form.senha.value === "") {
    spanSenha.textContent = "A senha deve ser preenchida";
    formValido = false;
  }

  if (form.email.value === "") {
    spanEmail.textContent = "O email deve ser preenchido";
    formValido = false;
  }

  // Caso o usuário não tenha inserido todos os obrigatórios, previne a submissão do formulário.
  if (!formValido) e.preventDefault();
}

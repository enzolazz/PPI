<?php

require 'usuarios.php';

// coleta os dados do formulário
$email = $_POST['email'] ?? '';
$senha = password_hash($_POST['senha'] ?? '', PASSWORD_DEFAULT);

// cria um novo contato e acrescenta no arquivo de texto
$novoUsuario = new Usuario($email, $senha);
$novoUsuario->SalvaEmArquivo();

// redireciona o navegador para a página de listagem de contatos
header('location: listaUsuarios.php');

?>

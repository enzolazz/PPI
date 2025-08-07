<?php

require 'clientes.php';

// coleta os dados do formulário
$nome = $_POST['nome'] ?? '';
$email = $_POST['email'] ?? '';
$cpf = $_POST['cpf'] ?? '';
$hashSenha = password_hash($_POST['senha'] ?? '', PASSWORD_DEFAULT);
$cep = $_POST['cep'] ?? '';
$rua = $_POST['rua'] ?? '';
$bairro = $_POST['bairro'] ?? '';
$cidade = $_POST['cidade'] ?? '';
$estado = $_POST['estado'] ?? '';

// cria um novo contato e acrescenta no arquivo de texto
$novoCliente = new Cliente($nome, $email, $cpf, $hashSenha, $cep, $rua, $bairro, $cidade, $estado);
$novoCliente->SalvaEmArquivo();

// redireciona o navegador para a página de listagem de contatos
header('location: listaClientes.php');

?>

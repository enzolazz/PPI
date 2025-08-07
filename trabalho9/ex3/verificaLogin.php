<?php

// coleta os dados do formulário
$emailForm = $_POST['email'] ?? '';
$senhaForm = $_POST['senha'] ?? '';

$autenticado = false;

if (($arq = fopen("usuarios.txt", 'r')) !== false) {
  while (!feof($arq)) {
    $linha = trim(fgets($arq));
    if ($linha != '') {
      list($emailArq, $senhaHash) = array_pad(explode(';', $linha), 2, null);

      if ($emailForm === $emailArq && password_verify($senhaForm, $senhaHash)) {
          $autenticado = true;
          break;
      }
    }
  }
  fclose($arq);
}

// Redireciona conforme autenticação
if ($autenticado) {
    header('Location: sucesso.html');
    exit;
} else {
    header('Location: login.html?erro=1');
    exit;
}
?>


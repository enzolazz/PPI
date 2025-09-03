<?php

require 'conexaoMysql.php';
require 'sessionVerification.php';

session_start();
exitWhenNotLoggedIn();

// Aqui acontece a verificacao de CSRF. O if verifica se o token csrf_token foi passado via
// POST e garante que se foi passado, deve ser o valor armazenado no cookie da sessao, caso contrário,
// a operacao nao é permitida.
if (! isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
    exit('Operação não permitida.');
}

$pdo = mysqlConnect();
$email = $_POST['email'] ?? '';
$novaSenha = $_POST['novaSenha'] ?? '';
$senhaHash = password_hash($novaSenha, PASSWORD_DEFAULT);

try {
    $stmt = $pdo->prepare(
        <<<'SQL'
      UPDATE cliente
      SET senhaHash = ?
      WHERE email = ?
    SQL
    );
    $stmt->execute([$senhaHash, $email]);
    header('location: sucesso.html');
} catch (Exception $e) {
    exit('Falha inesperada: ' . $e->getMessage());
}

/*
  Quando o usuário está logado, o navegador guarda o cookie de sessao.
Se o usuário visitar uma página maliciosa, essa página pode disparar
automaticamente um formulário oculto via POST para o servidor. O navegador,
de forma automática, enviará o cookie de sessão junto com essa requisicao POST falsa.
Dessa forma, o servidor acha que foi o usuário que enviou uma requisicao via POST.

Exemplo de ataque:
    <form action="https://enzola.great-site.net/altera-senha.php" method="POST">
        <input type="hidden" name="email" value="vitima@email.com">
        <input type="hidden" name="novaSenha" value="senha_invasor123">
    </form>
    <script>document.forms[0].submit();</script>

O código acima poderia estar em qualquer site externo.
Se a vítima estiver logada no sistema, o navegador enviará
automaticamente o cookie de sessao válido junto com esse POST.
*/

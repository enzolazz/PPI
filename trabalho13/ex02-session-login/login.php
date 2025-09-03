<?php

require 'conexaoMysql.php';

// Define a classe de LoginResult
class LoginResult
{
    public $success;
    public $newLocation;

    public function __construct($success, $newLocation)
    {
        $this->success = $success;
        $this->newLocation = $newLocation;
    }
}

// funcao que checa as credenciais do usuário
function checkUserCredentials($pdo, $email, $senha)
{
    $sql = <<<'SQL'
    SELECT senhaHash
    FROM cliente
    WHERE email = ?
    SQL;

    try {
        // É necessário utilizar prepared statements por incluir
        // parâmetros informados pelo usuário
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$email]);
        $senhaHash = $stmt->fetchColumn();

        if (! $senhaHash) {
            return false;
        } // a consulta não retornou nenhum resultado (email não encontrado)

        if (! password_verify($senha, $senhaHash)) {
            return false;
        } // email e/ou senha incorreta

        // email e senha corretos
        return true;
    } catch (Exception $e) {
        exit('Falha inesperada: ' . $e->getMessage());
    }
}

// recebe dados do form via POST
$email = $_POST['email'] ?? '';
$senha = $_POST['senha'] ?? '';

$pdo = mysqlConnect();
if (checkUserCredentials($pdo, $email, $senha)) {
    // Define o parâmetro 'httponly' para o cookie de sessão, para que o cookie
    // possa ser acessado apenas pelo navegador nas requisições http (e não por código JavaScript).
    // Aumenta a segurança evitando que o cookie de sessão seja roubado por eventual
    // código JavaScript proveniente de ataq. X S S.
    $cookieParams = session_get_cookie_params();
    $cookieParams['httponly'] = true;
    session_set_cookie_params($cookieParams);

    // Inicia sessao, setando os devidos parâmetros necessários para tratar a sessao do usuário
    session_start();
    $_SESSION['loggedIn'] = true;
    $_SESSION['user'] = $email;
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));

    // Retorna sucesso com o local de redirect
    $response = new LoginResult(true, 'home.php');
} else {
    // Retorna falso
    $response = new LoginResult(false, '');
}

// Devolve o JSON para a chamada
header('Content-Type: application/json; charset=utf-8');
echo json_encode($response);

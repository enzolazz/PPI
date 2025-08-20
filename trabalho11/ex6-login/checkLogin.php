<?php

class LoginResult
{
    public $isAuthorized;  // Indica se o login foi autorizado
    public $newLocation;   // Página para redirecionamento em caso de sucesso

    public function __construct($isAuthorized, $newLocation)
    {
        $this->isAuthorized = $isAuthorized;
        $this->newLocation = $newLocation;
    }
}

// Obtém os valores enviados via POST
$email = $_POST['email'] ?? '';
$senha = $_POST['senha'] ?? '';

// Verifica se email e senha são os esperados
if ($email == 'fulano@mail.com' && $senha == '123456') {
    // Login válido: cria objeto de sucesso
    $loginResult = new LoginResult(true, 'home.html');
} else { // Login inválido: cria objeto de falha
    $loginResult = new LoginResult(false, '');
}

// Define cabeçalho da resposta como JSON
header('Content-type: application/json');

// Retorna o objeto convertido em JSON para o JavaScript
echo json_encode($loginResult);

/*
  Casos:
1) Quando é inserido o e-mail 'fulano@mail.com' e a senha '123':
   - O formulário não é enviado da forma tradicional
   - O servidor retorna isAuthorized = false
   - Portanto não há redirecionamento

2) Quando é inserido o e-mail 'fulano@mail.com' e a senha '123456':
   - O formulário também não é enviado da forma tradicional
   - O servidor retorna isAuthorized = true e newLocation = 'home.html'
   - O navegador faz o redirecionamento para 'home.html'
*/

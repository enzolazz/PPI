<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <!-- 1: Tag de responsividade -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Página Dinâmica - Listagem de Contatos - Segura</title>

  <!-- 2: Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>

  <div class="container">

    <h3>Contatos Carregados do Arquivo <i>clientes.txt</i></h3>

    <table class="table table-striped">
      <thead>
        <tr>
          <th>Nome</th>
          <th>E-mail</th>
          <th>CPF</th>
          <th>Hash da Senha</th>
          <th>Rua</th>
          <th>CEP</th>
          <th>Bairro</th>
          <th>Cidade</th>
          <th>Estado</th>
        </tr>
      </thead>

      <tbody>
        <?php
        require "clientes.php";
        $arrayClientes = carregaClientesDeArquivo();
        foreach ($arrayClientes as $cliente) {
          $nome = htmlspecialchars($cliente->nome);
          $email = htmlspecialchars($cliente->email);
          $cpf = htmlspecialchars($cliente->cpf);
          $hashSenha = htmlspecialchars($cliente->hashSenha);
          $cep = htmlspecialchars($cliente->cep);
          $rua = htmlspecialchars($cliente->rua);
          $bairro = htmlspecialchars($cliente->bairro);
          $cidade = htmlspecialchars($cliente->cidade);
          $estado = htmlspecialchars($cliente->estado);
          echo <<<HTML
            <tr>
              <td>$nome</td>
              <td>$email</td>
              <td>$cpf</td>
              <td>$hashSenha</td>
              <td>$cep</td>
              <td>$rua</td>
              <td>$bairro</td>
              <td>$cidade</td>
              <td>$estado</td>
            </tr>
          HTML;
        }
        ?>
      </tbody>
    </table>
    <a href="index.html">Voltar à página inicial</a>
  </div>

</body>

</html>

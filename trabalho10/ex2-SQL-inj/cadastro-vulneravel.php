<?php

require '../conexaoMysql.php';
$pdo = mysqlConnect();

$nome = $_POST['nome'] ?? '';
$telefone = $_POST['telefone'] ?? '';

/*
  // O valor digitado pelo usuário é colocado diretamente
  // dentro do comando SQL sem nenhum tipo de filtragem ou tratamento.
  // Isso significa que, se o usuário incluir caracteres que façam parte
  // da linguagem SQL, eles serão interpretados pelo banco de dados como
  // parte do comando original, podendo alterar a consulta de forma não prevista.
try {

    $sql = <<<SQL
  INSERT INTO aluno (nome, telefone)
  VALUES ('{$nome}', '{$telefone}');
  SQL;

    // Aqui, o banco confia totalmente no conteúdo fornecido pelo usuário,
    // não distinguindo quais partes foram definidas pelo programador e quais
    // vieram do formulário.
    $pdo->exec($sql);

    header('location: mostra-alunos.php');
    exit();
} catch (Exception $e) {
    exit('Falha ao cadastrar os dados: ' . $e->getMessage());
}
*/

try {
    $sql = <<<'SQL'
  INSERT INTO aluno (nome, telefone)
  VALUES (?, ?)
  SQL;

    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nome, $telefone]);

    header('location: mostra-alunos.php');
    exit();
} catch (Exception $e) {
    exit('Falha ao cadastrar os dados: ' . $e->getMessage());
}

<?php

require 'conexaoMysql.php';
$pdo = mysqlConnect();

$modelo = $_GET['modelo'] ?? '';

try {
    $sql = <<<'SQL'
      SELECT modelo, ano, cor, quilometragem
      FROM veiculo
      WHERE modelo = ?
      ORDER BY ano
    SQL;

    $stmt = $pdo->prepare($sql);
    $stmt->execute([$modelo]);

    $veiculos = $stmt->fetchAll(PDO::FETCH_OBJ);

    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($veiculos);

} catch (Exception $e) {
    exit('Falha inesperada: ' . $e->getMessage());
}

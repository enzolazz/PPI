<?php

require 'conexaoMysql.php';
$pdo = mysqlConnect();

try {
    $sql = <<<'SQL'
      SELECT DISTINCT marca
      FROM veiculo
    SQL;

    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    $arrayMarcas = $stmt->fetchAll(PDO::FETCH_COLUMN);
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($arrayMarcas);
} catch (Exception $e) {
    exit('Falha inesperada: ' . $e->getMessage());
}

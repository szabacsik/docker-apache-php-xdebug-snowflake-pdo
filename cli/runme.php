<?php
require_once __DIR__ . '/../src/bootstrap.php';
/** @var PDO $pdo */
$pdo = \App\Registry::get('pdo');
$sql = "select current_timestamp(4);";
$statement = $pdo->query($sql);
echo json_encode($statement->fetchAll(PDO::FETCH_ASSOC), JSON_PRETTY_PRINT) . PHP_EOL;

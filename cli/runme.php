<?php
require_once __DIR__ . '/../src/bootstrap.php';
/** @var PDO $pdo */
$pdo = \App\Registry::get('pdo');
$sql = "select CURRENT_TIMESTAMP(4) as created_at, randstr(20, random()) as message;";
$statement = $pdo->query($sql);
$statement->execute();
//echo json_encode($statement->fetchAll(PDO::FETCH_ASSOC), JSON_PRETTY_PRINT) . PHP_EOL;
$statement->setFetchMode(PDO::FETCH_CLASS, \App\Domain\Models\Example::class);
$example = $statement->fetch();
echo $example->getDateTime()->format('Y-m-d H:i:s.u') . ': ' . $example->getMessage() . PHP_EOL;


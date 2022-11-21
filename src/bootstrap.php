<?php
require_once __DIR__ . '/../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();
$accountId = $_ENV['SNOWFLAKE_ACCOUNTID'];
$region = $_ENV['SNOWFLAKE_REGION'];
$warehouse = $_ENV['SNOWFLAKE_WAREHOUSE'];
$database = $_ENV['SNOWFLAKE_DATABASE'];
$schema = $_ENV['SNOWFLAKE_SCHEMA'];
$username = $_ENV['SNOWFLAKE_USERNAME'];
$password = $_ENV['SNOWFLAKE_PASSWORD'];
$dsn = "snowflake:account=$accountId;region=$region;warehouse=$warehouse;database=$database;schema=$schema";
$pdo = new PDO($dsn, $username, $password);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
App\Registry::set('pdo', $pdo);

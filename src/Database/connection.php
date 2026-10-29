<?php

declare(strict_types=1);

$host = getenv('DB_HOST') ?: 'localhost';
$port = (int) (getenv('DB_PORT') ?: 3306);
$database = getenv('DB_NAME') ?: 'crud_clientes';
$user = getenv('DB_USER') ?: 'root';
$password = getenv('DB_PASSWORD') ?: '';

$mysqli = new mysqli($host, $user, $password, $database, $port);

if ($mysqli->connect_errno) {
    die('Falha na conexão com o banco de dados');
}

$mysqli->set_charset('utf8mb4');

<?php 

$host = getenv('DB_HOST') ?: 'localhost';
$port = (int) (getenv('DB_PORT') ?: 3306);
$db = getenv('DB_NAME') ?: 'crud_clientes';
$user = getenv('DB_USER') ?: 'root';
$pass = getenv('DB_PASSWORD') ?: '';

$mysqli = new mysqli($host, $user, $pass, $db, $port);
if($mysqli->connect_errno) {
    die("Falha na conexão com o banco de dados");
}

$mysqli->set_charset('utf8mb4');

function formatar_data($data){
    return implode('/', array_reverse(explode('-', $data)));
}

function formatar_telefone($telefone){
    $ddd = substr ($telefone, 0, 2);
    $parte1 = substr ($telefone, 2, 5);
    $parte2 = substr ($telefone, 7);
    return "($ddd) $parte1-$parte2";
}

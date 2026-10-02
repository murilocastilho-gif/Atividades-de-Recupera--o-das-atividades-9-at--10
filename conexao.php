<?php
$host = 'localhost';
$db   = 'mercado_estoque';
$user = 'root';
$pass = '';

$mysqli = new mysqli($host, $user, $pass, $db);

if ($mysqli->connect_error) {
    die("Erro de conexão: " . $mysqli->connect_error);
}

$mysqli->set_charset("utf8mb4");
?>
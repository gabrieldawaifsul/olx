<?php
    $host = "localhost";
    $usuario = getenv('MYSQL_USERNAME');
    $senha = getenv('MYSQL_PASSWORD');
    $banco = getenv('MYSQL_DATABASE');
    $conn = new mysqli($host, $usuario, $senha, $banco);
    if ($conn->connect_error) {
        die("Falha na conexão: " . $conn->connect_error);
    }
?>
<?php
// config.php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "product_db";

// Cria a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    // Se houver erro, exibe o erro e para a execução do script
    die("Connection failed: " . $conn->connect_error);
}
?>

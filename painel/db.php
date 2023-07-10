<?php
// Conexão com o banco de dados
$dbHost = 'localhost';
$dbName = 'unipets';
$dbUser = 'tavzera';
$dbPass = '#H9&r5*B6!2015';

try {
  // Criação da conexão PDO
  $conn = new PDO("mysql:host=$dbHost;dbname=$dbName;charset=utf8", $dbUser, $dbPass);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  echo "Erro na conexão com o banco de dados: " . $e->getMessage();
  exit();
}

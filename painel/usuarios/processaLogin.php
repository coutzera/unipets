<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// Conexão com o banco de dados
require_once('../db.php');
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Verifica se a conexão foi estabelecida com sucesso
if ($conn) {
  // Recebe os dados do formulário
  $email = $_POST['users_mail'];
  $password = $_POST['users_pass'];

  // Consulta para verificar se o e-mail e a senha correspondem a um usuário válido
  $query = "SELECT * FROM user WHERE user_mail = :email AND user_pass = :password";
  $stmt = $conn->prepare($query);
  $stmt->bindParam(':email', $email);
  $stmt->bindParam(':password', $password);
  $stmt->execute();

  if ($stmt->rowCount() == 1) {
    session_start();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $_SESSION['user_id'] = $row['user_id'];
    $_SESSION['user_nivel'] = $row['user_nivel'];
    $_SESSION['loggedin'] = true;
    // Redireciona de volta para a página listarUser.php exibindo um toast de sucesso
    header("Location: ../index.php");
    exit();
  } else {
    // Redireciona de volta para a página listarUser.php exibindo um toast de erro
    header("Location: index.php?error=true");
    exit();
  }
}
?>

<?php
require_once('../db.php');
// Verifica se a conexão foi estabelecida com sucesso
if ($conn) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Recebe os dados do formulário
        $userId = $_POST['user_id'];
        $userName = $_POST['user_name'];
        $userEmail = $_POST['user_mail'];
        $userNivel = $_POST['user_nivel'];
        $userStatus = $_POST['user_status'];

        // Atualiza os dados do usuário no banco de dados
        $query = "UPDATE user SET user_name = :userName, user_mail = :userEmail, user_nivel = :userNivel, user_status = :userStatus WHERE user_id = :userId";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':userName', $userName);
        $stmt->bindParam(':userEmail', $userEmail);
        $stmt->bindParam(':userNivel', $userNivel);
        $stmt->bindParam(':userStatus', $userStatus);
        $stmt->bindParam(':userId', $userId);

        $result = $stmt->execute();

        if ($result) {
            // Redireciona de volta para a página listarUser.php exibindo um toast de sucesso
            header("Location: listarUser.php?update_success=1");
            exit();
        } else {
            // Redireciona de volta para a página listarUser.php exibindo um toast de erro
            header("Location: listarUser.php?update_error=1");
            exit();
        }
    }
}
// Redireciona de volta para a página listarUser.php se não houver parâmetro de ID
header("Location: listarUser.php");
exit;

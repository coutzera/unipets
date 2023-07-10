<?php
require_once('../db.php');
// Verifica se o parâmetro de ID foi passado
if (isset($_GET['id'])) {
    $userId = $_GET['id'];

    $query = "DELETE FROM user WHERE user_id = :userId";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':userId', $userId);

    if ($stmt->execute()) {
        header("Location: listarUser.php?delete_success=1");
        exit;
    } else {
        header("Location: listarUser.php?delete_error=1");
        exit;
    }
}
// Redireciona de volta para a página listarUser.php se não houver parâmetro de ID
header("Location: listarUser.php");
exit;
?>

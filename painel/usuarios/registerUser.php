<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once('../db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $user_name = $_POST['user_name'];
        $user_surname = $_POST['user_surname'];
        $user_mail = $_POST['user_mail'];
        $user_cpf = $_POST['user_cpf'];
        $user_pass = $_POST['user_pass'];

        if ($_FILES['user_avatar']['error'] === UPLOAD_ERR_OK) {
            $avatar_tmp_name = $_FILES['user_avatar']['tmp_name'];
            $avatar_extension = pathinfo($_FILES['user_avatar']['name'], PATHINFO_EXTENSION);
            $avatar_name = uniqid() . '.' . $avatar_extension;
            $avatar_path = '../assets/img/avatars/' . $avatar_name;
            move_uploaded_file($avatar_tmp_name, $avatar_path);
        } else {
            $avatar_path = null;
        }

        $query = "INSERT INTO user (user_name, user_surname, user_mail, user_cpf, user_pass, user_nivel, user_avatar, user_status)
                  VALUES (:user_name, :user_surname, :user_mail, :user_cpf, :user_pass, 2, :avatar_path, 1)";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':user_name', $user_name);
        $stmt->bindParam(':user_surname', $user_surname);
        $stmt->bindParam(':user_mail', $user_mail);
        $stmt->bindParam(':user_cpf', $user_cpf);
        $stmt->bindParam(':user_pass', $user_pass);
        $stmt->bindParam(':avatar_path', $avatar_path);

        if ($stmt->execute()) {
            header("Location: register.php?register_success=true");
            exit();
        } else {
            header("Location: register.php?register_error=true");
            exit();
        }
    } catch (PDOException $e) {
        echo "Erro de conexão com o banco de dados: " . $e->getMessage();
    }
}
?>

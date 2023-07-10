<?php
require_once('../db.php');

// Verifica se o ID do pet foi fornecido
if (isset($_POST['pet_id'])) {
    $petId = $_POST['pet_id'];

    // Consulta SQL para recuperar o status atual do pet
    $statusQuery = "SELECT pet_status_liberado FROM pet_status WHERE pet_status_pet_id = :petId";
    $statusStatement = $conn->prepare($statusQuery);
    $statusStatement->bindParam(':petId', $petId, PDO::PARAM_INT);
    $statusStatement->execute();
    
    $statusRow = $statusStatement->fetch(PDO::FETCH_ASSOC);
    if ($statusRow) {
        $currentStatus = $statusRow['pet_status_liberado'];

        // Calcula o novo valor do status
        $newStatus = $currentStatus ? 0 : 1;

        // Atualiza o status do pet no banco de dados
        $updateQuery = "UPDATE pet_status SET pet_status_liberado = :newStatus WHERE pet_status_pet_id = :petId";
        $updateStatement = $conn->prepare($updateQuery);
        $updateStatement->bindParam(':newStatus', $newStatus, PDO::PARAM_INT);
        $updateStatement->bindParam(':petId', $petId, PDO::PARAM_INT);
        if ($updateStatement->execute()) {
            // Redireciona de volta à página de listagem de pets
            echo '<script>window.location.href = "listarPets.php";</script>';
            exit();
        } else {
            // Retorna uma resposta de erro
            echo 'Erro ao atualizar o status: ' . $conn->errorInfo()[2];
        }
    } else {
        // Retorna uma resposta de erro se o pet não for encontrado
        echo 'Pet não encontrado.';
    }
} else {
    // Retorna uma resposta de erro se o ID do pet não for fornecido
    echo 'ID do pet não fornecido.';
}
// Fechar a conexão com o banco de dados
$conn = null;
?>

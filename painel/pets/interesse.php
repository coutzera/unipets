<?php
require_once('../db.php');

// Exibir erros no PHP
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html>

<head>
  <title>Exemplo de Tabela com Modal - Pets</title>
  <!-- Adicione os links para os arquivos CSS do Bootstrap 5 -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
  <div class="container">
    <h1>Lista de Pets</h1>
    <table class="table">
      <thead>
        <tr>
          <th>Pet ID</th>
          <th>Pet Name</th>
          <th>Pet Raça</th>
          <th>Pet Espécie</th>
          <th>Pet Gênero</th>
          <th>Pet Porte</th>
        </tr>
      </thead>
      <tbody>
        <?php
        // Consulta SQL para obter os dados da tabela "pets"
        $sql = "SELECT p.*
        FROM pet_status ps
        JOIN pets p ON ps.pet_status_pet_id = p.pet_id
        WHERE ps.pet_status_liberado = 1 and ps.pet_status_situacao = 2";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $pets = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($pets as $pet) {
          echo '<tr>';
          echo '<td>' . $pet['pet_id'] . '</td>';
          echo '<td><a href="#" data-bs-toggle="modal" data-bs-target="#adoptionModal' . $pet['pet_id'] . '">' . $pet['pet_name'] . '</a></td>';
          echo '<td>' . $pet['pet_raca'] . '</td>';
          echo '<td>' . $pet['pet_especie'] . '</td>';
          echo '<td>' . $pet['pet_genero'] . '</td>';
          echo '<td>' . $pet['pet_porte'] . '</td>';
          echo '</tr>';
        }
        ?>
      </tbody>
    </table>

    <?php
    foreach ($pets as $pet) {
      // Consulta SQL para obter os dados relacionados da tabela "historico_adocao" com base no pet_id
      $sqlAdoption = "SELECT nome_adocao, telefone_adocao, cidade_adocao, cep_adocao FROM historico_adocao WHERE pet_id = :pet_id";
      $stmtAdoption = $conn->prepare($sqlAdoption);
      $stmtAdoption->bindParam(':pet_id', $pet['pet_id']);
      $stmtAdoption->execute();
      $adoptionData = $stmtAdoption->fetchAll(PDO::FETCH_ASSOC);

      // Modal para exibir as informações relacionadas da tabela "historico_adocao"
      echo '<div class="modal fade" id="adoptionModal' . $pet['pet_id'] . '" tabindex="-1" aria-labelledby="adoptionModalLabel' . $pet['pet_id'] . '" aria-hidden="true">';
      echo '<div class="modal-dialog">';
      echo '<div class="modal-content">';
      echo '<div class="modal-header">';
      echo '<h5 class="modal-title" id="adoptionModalLabel' . $pet['pet_id'] . '">Informações de Adoção</h5>';
      echo '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>';
      echo '</div>';
      echo '<div class="modal-body">';

      if ($adoptionData) {
        echo '<table class="table">';
        echo '<thead>';
        echo '<tr>';
        echo '<th>Nome de Adoção</th>';
        echo '<th>Telefone de Adoção</th>';
        echo '<th>Cidade de Adoção</th>';
        echo '<th>CEP de Adoção</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        foreach ($adoptionData as $adoption) {
          echo '<tr>';
          echo '<td>' . $adoption['nome_adocao'] . '</td>';
          echo '<td>' . $adoption['telefone_adocao'] . '</td>';
          echo '<td>' . $adoption['cidade_adocao'] . '</td>';
          echo '<td>' . $adoption['cep_adocao'] . '</td>';
          echo '</tr>';
        }
        echo '</tbody>';
        echo '</table>';
      } else {
        echo '<p>Nenhuma informação de adoção encontrada para este pet.</p>';
      }

      echo '</div>';
      echo '</div>';
      echo '</div>';
      echo '</div>';
    }
    ?>
  </div>

  <!-- Adicione os links para os arquivos JS do Bootstrap 5 -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
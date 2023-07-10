<?php
// Verificar se o ID do pet foi recebido
if (isset($_POST['pet_id'])) {
  $petId = $_POST['pet_id'];
  // Faça o que for necessário com o ID do pet recebido
  echo "ID do pet recebido: " . $petId;
} else {
  echo "ID do pet não foi recebido.";
}
?>

<?php
require_once('./painel/db.php');

// Exibir erros no PHP
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Obtém os valores do formulário
  $nomeAdocao = $_POST['nome_adocao'];
  $telefoneAdocao = $_POST['telefone_adocao'];
  $cidadeAdocao = $_POST['cidade_adocao'];
  $cepAdocao = $_POST['cep_docao'];
  $idPet = $_POST['id_pet'];

  // Insere os dados na tabela historico_adocao
  $sql_query = $conn->prepare("INSERT INTO historico_adocao (nome_adocao, telefone_adocao, cidade_adocao, cep_adocao, pet_id) VALUES (:nomeAdocao, :telefoneAdocao, :cidadeAdocao, :cepAdocao, :idPet)");

  // Executa a consulta
  $sql_query->execute(array(':nomeAdocao' => $nomeAdocao, ':telefoneAdocao' => $telefoneAdocao, ':cidadeAdocao' => $cidadeAdocao, ':cepAdocao' => $cepAdocao, ':idPet' => $idPet));

  // Redireciona para a página de sucesso
  header('Location: adocao_sucesso.php');
  exit;
}

// Obtém o ID do pet a partir da URL
$petId = $_GET['pet_id'];

// Prepara a consulta SQL para obter os dados do pet
$sql_query = $conn->prepare("SELECT * FROM pets WHERE pet_id = :petId");

// Executa a consulta
$sql_query->execute(array(':petId' => $petId));

// Verifica se há registros
if ($sql_query->rowCount() > 0) {
  // Obtém os dados do pet
  $pet = $sql_query->fetch(PDO::FETCH_ASSOC);
} else {
  // Redireciona caso não haja registro
  header('Location: adopt.php');
  exit;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="./painel/assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="./painel/assets/img/favicon.png">
  <title>
    UNIPETS - Concluir Adoção
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="./painel/assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="./painel/assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="./painel/assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="./painel/assets/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<body class="">
  <div class="container-fluid py-4">
    <div class="row">
      <div class="col-xl-7">
        <div class="card">
          <div class="card-header d-flex pb-0 p-3">
            <h3 class="my-auto"><?php echo $pet['pet_name']; ?></h3>
          </div>
          <div class="card-body p-3 mt-2">
            <div class="tab-content" id="v-pills-tabContent">
              <div class="tab-pane fade show position-relative active height-600 border-radius-lg" id="cam1" role="tabpanel" aria-labelledby="cam1" style='background-image: url("<?php echo $pet['pet_path']; ?>")' ; background-size:cover;">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-5 ms-auto mt-xl-0 mt-4">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-body p-3">
                <div class="row">
                  <div class="card-body">
                    <form id="formAdocao" name="formAdocao" action="#" method="POST">
                      <p class="text-uppercase text-sm">Informações do Pet</p>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Nome</label>
                            <input class="form-control" type="text" value="<?php echo $pet['pet_name']; ?>" onfocus="focused(this)" onfocusout="defocused(this)" readonly>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Raça</label>
                            <input class="form-control" type="text" value="<?php echo $pet['pet_raca']; ?>" onfocus="focused(this)" onfocusout="defocused(this)" readonly>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Genero</label>
                            <input class="form-control" type="text" value="<?php echo $pet['pet_genero'] == 1 ? 'Macho' : 'Femea'; ?>" onfocus="focused(this)" onfocusout="defocused(this)" readonly>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Especie</label>
                            <input class="form-control" type="text" value="<?php echo $pet['pet_especie']; ?>" onfocus="focused(this)" onfocusout="defocused(this)" readonly>
                          </div>
                        </div>
                      </div>
                      <hr class="horizontal dark">
                      <p class="text-uppercase text-sm">Contatos do Adotante</p>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Nome completo</label>
                            <input class="form-control" type="text" placeholder="Augusto Nunes Cury de Carvalho" onfocus="focused(this)" onfocusout="defocused(this)" id="nome_adocao" name="nome_adocao" required>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Telefone</label>
                            <input class="form-control" type="text" placeholder="(21) 98812-2313" onfocus="focused(this)" onfocusout="defocused(this)" id="telefone_adocao" name="telefone_adocao" required>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="example-text-input" class="form-control-label">Cidade</label>
                            <input class="form-control" type="text" placeholder="Rio de Janeiro" onfocus="focused(this)" onfocusout="defocused(this)" id="cidade_adocao" name="cidade_adocao" required>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="example-text-input" class="form-control-label">CEP</label>
                            <input class="form-control" type="text" placeholder="437300" onfocus="focused(this)" onfocusout="defocused(this)" id="cep_docao" name="cep_docao" required>
                            <input type="hidden" name="id_pet" value="<?php echo $petId; ?>">
                          </div>
                        </div>
                      </div>
                      <hr class="horizontal dark">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                            <button id="btnAdotar" class="btn btn-icon btn-3 btn-success" type="submit">
                              <span class="btn-inner--icon"><i class="ni ni-active-40"></i></span>
                              <span class="btn-inner--text">Adote-me</span>
                            </button>
                          </div>
                        </div>
                      </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      </form>
    </div>
    <hr class="horizontal dark my-5">
  </div>

  <!--   Core JS Files   -->
  <script src="./painel/assets/js/core/popper.min.js"></script>
  <script src="./painel/assets/js/core/bootstrap.min.js"></script>
  <script src="./painel/assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="./painel/assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="./painel/assets/js/argon-dashboard.min.js?v=2.0.4"></script>
</body>

</html>
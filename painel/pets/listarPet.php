<?php
// Verifica se o usuário está autenticado
session_start();
if (!isset($_SESSION['user_id']) && $_SESSION['user_nivel'] != 1) {
  header("Location: ./index.php");
  exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    Unipets - Dashboard
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Box Icons -->
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />
  <!-- JQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <script>
    $(document).ready(function() {
      // Função para exibir o modal de confirmação de exclusão
      function confirmDelete(userId) {
        $('#confirmDeleteModal').modal('show');

        // Ao clicar no botão "Delete" no modal de confirmação, redireciona para excluir o usuário
        $('#btnDelete').click(function() {
          window.location.href = "excluirUser.php?id=" + userId;
        });
      }
      // Código para exibir o modal de confirmação ao clicar no botão "Delete"
      $('.delete-btn').click(function() {
        var userId = $(this).data('user-id');
        confirmDelete(userId);
      });
    });
  </script>
</head>

<body class="g-sidenav-show   bg-gray-100">
  <div class="min-height-300 bg-primary position-absolute w-100"></div>
  <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/argon-dashboard/pages/dashboard.php " target="_blank">
        <img src="../assets/img/logo-ct-dark.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold">Unipets</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="../index.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class='bx bx-grid-alt bx-sm text-warning'></i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../usuarios/listarUser.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class='bx bx-group bx-sm text-warning'></i>
            </div>
            <span class="nav-link-text ms-1">Usuários</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="./listarPet.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class='bx bxs-dog bx-sm text-warning'></i>
            </div>
            <span class="nav-link-text ms-1">Pets</span>
          </a>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link " href="./virtual-reality.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class='bx bx-chat bx-sm text-warning'></i>
            </div>
            <span class="nav-link-text ms-1">Mensagens</span>
          </a>
        </li>
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Account pages</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="./profile.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class='bx bx-user bx-sm text-warning'></i>
            </div>
            <span class="nav-link-text ms-1">Profile</span>
          </a>
        </li> -->
        <li class="nav-item">
          <a class="nav-link " href="../logout.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class='bx bx-log-out bx-sm text-danger'></i>
            </div>
            <span class="nav-link-text ms-1">Logout</span>
          </a>
        </li>
      </ul>
    </div>
  </aside>
  <main class="main-content position-relative border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Lista</a></li>
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Pets</li>
          </ol>
          <h6 class="font-weight-bolder text-white mb-0">Pets</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <ul class="navbar-nav  justify-content-end">
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line bg-white"></i>
                  <i class="sidenav-toggler-line bg-white"></i>
                  <i class="sidenav-toggler-line bg-white"></i>
                </div>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Lista de Pets</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Pet</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Espécie</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Gênero</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Disponível no portal</th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    // Dados de conexão com o banco de dados
                    $dbHost = 'localhost';
                    $dbName = 'unipets';
                    $dbUser = 'tavzera';
                    $dbPass = '#H9&r5*B6!2015';

                    // Função para obter a descrição do status do usuário
                    function getUserStatus($genero)
                    {
                      if ($genero == 1) {
                        return "<span class='badge badge-sm bg-info'>Macho</span>";
                      } elseif ($genero == 2) {
                        return "<span class='badge badge-sm bg-danger'>Femea</span>";
                      } else {
                        return "<span class='badge badge-sm bg-secondary'>Desconhecido</span>";
                      }
                    }

                    // Conexão com o banco de dados
                    $conn = new PDO("mysql:host=$dbHost;dbname=$dbName;charset=utf8", $dbUser, $dbPass);

                    // Parâmetros de paginação
                    $itemsPerPage = 50;
                    $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
                    $offset = ($currentPage - 1) * $itemsPerPage;

                    // Verifica se a conexão foi estabelecida com sucesso
                    if ($conn) {
                      $sql = "SELECT pets.*, pet_status.*, user.*
                        FROM pets
                        INNER JOIN pet_status ON pets.pet_id = pet_status.pet_status_pet_id
                        INNER JOIN user ON user.user_id = pet_status.pet_status_user_id LIMIT $offset, $itemsPerPage";
                      // $sql = "SELECT * from pets LIMIT $offset, $itemsPerPage";
                      $stmt = $conn->prepare($sql);
                      $stmt->execute();
                      // Loop para exibir os usuários
                      while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        $pet_path = $row['pet_path'];
                        echo "<tr>";
                        echo "<td>";
                        echo "<div class='d-flex px-2 py-1'>";
                        echo "<div>";
                        echo "<img src='http://unipets.sytes.net/" . $row['pet_path'] . "' class='avatar avatar-sm me-3 ' alt='user1'>";
                        echo "</div>";
                        echo "<div class='d-flex flex-column justify-content-center'>";
                        echo "<h6 class='mb-0 text-sm'>" . $row['pet_name'] . "</h6>";
                        echo "<p class='text-xs text-secondary mb-0'>" . $row['pet_raca'] . "</p>";
                        echo "</div>";
                        echo "</div>";
                        echo "</td>";
                        echo "<td>";
                        echo "<p class='text-xs font-weight-bold mb-0'>" . $row['pet_especie'] . "</p>";
                        echo "</td>";
                        echo "<td class='align-middle text-center text-sm'>";
                        echo getUserStatus($row['pet_genero']);
                        echo "</td>";
                        echo "<td class='align-middle text-center'>";
                        echo "<span class='text-secondary text-xs font-weight-bold'>" . ($row['pet_status_liberado'] ? 'Sim' : 'Não') . "</span>";
                        echo "</td>";
                        echo "<td class='align-middle'>";
                        if ($row['pet_status_liberado']) {
                          echo '<i class="bx bx-user-x bx-md bx-tada-hover text-danger btn-status btn-tooltip" data-petid="' . $row['pet_id'] . '" data-bs-toggle="tooltip" data-bs-placement="top" title="Alterar Status do Pet" data-container="body" data-animation="true"></i>';
                        } else {
                          echo '<i class="bx bx-user-check bx-md bx-tada-hover text-success btn-status btn-tooltip" data-petid="' . $row['pet_id'] . '" data-bs-toggle="tooltip" data-bs-placement="top" title="Alterar Status do Pet" data-container="body" data-animation="true" data-petid="' . $row['pet_id'] . '"></i>';
                        }
                        echo " ";
                        echo '<i class="bx bx-mail-send bx-md bx-tada-hover text-info btn-enviar btn-tooltip" data-petid="' . $row['pet_id'] . '" data-bs-toggle="tooltip" data-bs-placement="top" title="Enviar para Telegram" data-container="body" data-animation="true" data-petid="' . $row['pet_id'] . '"></i>';
                        echo "</td>";
                        echo "</tr>";
                      }
                      // Consulta SQL para obter o total de registros na tabela
                      $totalSql = "SELECT COUNT(*) as total FROM pets";
                      $totalStmt = $conn->prepare($totalSql);
                      $totalStmt->execute();
                      $total = $totalStmt->fetch(PDO::FETCH_ASSOC)['total'];

                      // Calcula o número total de páginas
                      $totalPages = ceil($total / $itemsPerPage);

                      // Exibe a navegação da paginação
                      echo "<nav aria-label='Page navigation example'>";
                      echo "<ul class='pagination justify-content-end'>";
                      for ($i = 1; $i <= $totalPages; $i++) {
                        echo '<li class="page-item' . ($i == $currentPage ? ' active' : '') . '">';
                        echo '<a class="page-link" href="?page=' . $i . '">' . $i . '</a>';
                        echo '</li>';
                      }
                      // Fecha a conexão com o banco de dados
                      $conn = null;
                    }
                    ?>
                  </tbody>
                </table>
              </div>
              <script>
                $(document).ready(function() {
                  // Manipula o clique nos botões de status
                  $('.btn-status').click(function() {
                    var petId = $(this).data('petid');
                    var btn = $(this);

                    // Faz a requisição AJAX para atualizar o status
                    $.ajax({
                      url: 'update_status.php',
                      method: 'POST',
                      data: {
                        pet_id: petId
                      },
                      success: function(response) {
                        // Atualiza o texto do botão e a classe de estilo
                        if (btn.hasClass('btn-success')) {
                          window.location.href = "listarPet.php";
                        } else {
                          window.location.href = "listarPet.php";
                        }
                      },
                      error: function() {
                        alert('Erro ao atualizar o status do pet.');
                      }
                    });
                  });
                });
              </script>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <script>
    $(document).ready(function() {
      // Manipula o clique no botão de enviar
      $('.btn-enviar').click(function() {
        var petId = $(this).data('petid');
        var btn = $(this);

        // Faz a requisição AJAX para enviar as informações do pet para o Telegram
        $.ajax({
          url: "http://" + document.location.hostname + "/envia-photo.php",
          method: 'POST',
          data: {
            pet_id: petId
          },
          success: function(response) {
            alert('Mensagem enviada para o Telegram com sucesso.');
          },
          error: function() {
            alert('Erro ao enviar a mensagem para o Telegram.');
          }
        });
      });
    });
  </script>

  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
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
  <script src="../assets/js/argon-dashboard.min.js?v=2.0.4"></script>
</body>

</html>
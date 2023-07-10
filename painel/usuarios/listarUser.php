<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Verifica se o usuário está autenticado
session_start();
if (!isset($_SESSION['user_id']) && $_SESSION['user_nivel'] != 1) {
  header("Location: ./index.php");
  exit();
}
require_once('../db.php');
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
<div class="divisor"></div>
  <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="./index.php">
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
          <a class="nav-link active" href="./listarUser.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class='bx bx-group bx-sm text-warning'></i>
            </div>
            <span class="nav-link-text ms-1">Usuários</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="../pets/listarPet.php">
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
          <a class="nav-link " href="./logout.php">
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
            <li class="breadcrumb-item text-sm text-white active" aria-current="page">Usuários</li>
          </ol>
          <h6 class="font-weight-bolder text-white mb-0">Usuários</h6>
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
              <h6>Lista de Usuários</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Usuário</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nível</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Data de Criação</th>
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php


                    // Função para obter a descrição do status do usuário
                    function getUserStatus($status)
                    {
                      if ($status == 1) {
                        return "<span class='badge badge-sm bg-info'>Aguardando aprovação</span>";
                      } elseif ($status == 2) {
                        return "<span class='badge badge-sm bg-warning'>Bloqueado</span>";
                      } elseif ($status == 3) {
                        return "<span class='badge badge-sm bg-success'>Ativo</span>";
                      } elseif ($status == 4) {
                        return "<span class='badge badge-sm bg-danger'>Inativo</span>";
                      } else {
                        return "<span class='badge badge-sm bg-secondary'>Desconhecido</span>";
                      }
                    }
                    // Parâmetros de paginação
                    $itemsPerPage = 5;
                    $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
                    $offset = ($currentPage - 1) * $itemsPerPage;

                    // Consulta SQL
                    $sql = "SELECT u.*, n.nivel_id, n.nivel_descricao
                                FROM user u
                                INNER JOIN nivel n ON u.user_nivel = n.nivel_id LIMIT :offset, :itemsPerPage";

                    $stmt = $conn->prepare($sql);
                    $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
                    $stmt->bindParam(':itemsPerPage', $itemsPerPage, PDO::PARAM_INT);
                    $stmt->execute();

                    // Loop para exibir os usuários
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                      echo "<tr>";
                      echo "<td>";
                      echo "<div class='d-flex px-2 py-1'>";
                      echo "<div>";
                      echo "<img src='" . $row['user_avatar'] . "' class='avatar avatar-sm me-3' alt='user1'>";
                      echo "</div>";
                      echo "<div class='d-flex flex-column justify-content-center'>";
                      echo "<h6 class='mb-0 text-sm'>" . $row['user_name'] . "</h6>";
                      echo "<p class='text-xs text-secondary mb-0'>" . $row['user_mail'] . "</p>";
                      echo "</div>";
                      echo "</div>";
                      echo "</td>";
                      echo "<td>";
                      echo "<p class='text-xs font-weight-bold mb-0'>" . $row['nivel_descricao'] . "</p>";
                      echo "<p class='text-xs text-secondary mb-0'>Unipets</p>";
                      echo "</td>";
                      echo "<td class='align-middle text-center text-sm'>";
                      echo getUserStatus($row['user_status']);
                      echo "</td>";
                      echo "<td class='align-middle text-center'>";
                      echo "<span class='text-secondary text-xs font-weight-bold'>23/04/18</span>";
                      echo "</td>";
                      echo "<td class='align-middle'>";
                      echo "<i class='bx bx-user-check bx-sm bx-tada-hover text-primary'></i>";
                      echo " ";
                      echo "<i class='bx bx-edit-alt bx-sm bx-tada-hover text-success edit-btn' data-bs-toggle='modal' data-bs-target='#exampleModalSignUp' data-user-id='" . $row['user_id'] . "' data-user-name='" . $row['user_name'] . "' data-user-mail='" . $row['user_mail'] . "' data-user-pass='" . $row['user_pass'] . "' data-user-nivel='" . $row['nivel_id'] . "' data-user-status='" . $row['user_status'] . "'></i>";
                      echo " ";
                      echo "<i class='bx bx-trash-alt bx-sm bx-tada-hover text-danger delete-btn' data-bs-toggle='modal' data-bs-target='#modal-notification' data-user-id='" . $row['user_id'] . "'></i>";
                      echo "</td>";
                      echo "</tr>";
                    }
                    // Consulta SQL para obter o total de registros na tabela
                    $totalSql = "SELECT COUNT(*) as total FROM user";
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
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Modal Atualizar Usuário -->
      <div class="modal fade" id="exampleModalSignUp" tabindex="-1" 'role="dialog" aria-labelledby="exampleModalSignTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
          <div class="modal-content">
            <div class="modal-body p-0">
              <div class="card card-plain">
                <div class="card-header pb-0 text-left">
                  <h3 class="font-weight-bolder text-primary text-gradient">Atualizar Usuário</h3>
                  <p class="mb-0">Editar informações do usuário</p>
                </div>
                <div class="card-body pb-3">
                  <form role="form text-left" action="atualizaUser.php" method="POST">
                    <input type="hidden" name="user_id" id="user_id">
                    <label>Name</label>
                    <div class="input-group mb-3">
                      <input type="text" class="form-control" placeholder="Name" aria-label="Name" aria-describedby="name-addon" id="edit_user_name" name="user_name" required>
                    </div>
                    <label>Email</label>
                    <div class="input-group mb-3">
                      <input type="email" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="email-addon" id="edit_user_mail" name="user_mail" required>
                    </div>
                    <label>Password</label>
                    <div class="input-group mb-3">
                      <input type="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="password-addon" id="edit_user_pass" name="user_pass" required>
                    </div>
                    <label>Nível de acesso</label>
                    <div class="input-group mb-3">
                      <select class="form-control" name="user_nivel" id="choices-button" placeholder="Departure">
                        <?php
                        require_once('../db.php');
                        // Verifica se a conexão foi estabelecida com sucesso
                        if ($conn) {
                          // Consulta para obter os níveis
                          $query = "SELECT nivel_id, nivel_descricao FROM nivel";
                          $stmt = $conn->query($query);

                          // Loop para exibir os níveis como opções do campo de seleção
                          while ($nivel = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            echo "<option value='" . $nivel['nivel_id'] . "'>" . $nivel['nivel_descricao'] . "</option>";
                          }
                        }
                        ?>
                      </select>
                    </div>
                    <label>Status</label>
                    <div class="input-group mb-3">
                      <select class="form-control" name="user_status" id="edit_user_status" placeholder="Departure">
                        <option value="1">Aguardando aprovação</option>
                        <option value="2">Bloqueado</option>
                        <option value="3">Ativo</option>
                        <option value="4">Inativo</option>
                        <option value="5">Desconhecido</option>
                      </select>
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn bg-gradient-primary btn-lg btn-rounded w-60 mt-2 mb-0">Salvar</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <script>
        $(document).ready(function() {
          $('.edit-btn').click(function() { 
            var userId=$(this).data('user-id'); 
            var userName=$(this).data('user-name'); 
            var userEmail=$(this).data('user-mail'); 
            var userPass=$(this).data('user-pass'); 
            var userNivel=$(this).data('user-nivel'); 
            var userStatus=$(this).data('user-status'); 
            $('#user_id').val(userId); 
            $('#edit_user_name').val(userName); 
            $('#edit_user_mail').val(userEmail); 
            $('#edit_user_pass').val(userPass); 
            $('#choices-button').val(userNivel); 
            $('#edit_user_status').val(userStatus); 
            }); 
            }); </script>
      </div>
  </main>

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
  <!-- Modal de Confirmação de Exclusão -->
  <div class="col-md-4">
    <div class="modal fade" id="modal-notification" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
      <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h6 class="modal-title" id="modal-title-notification">Tela de exclusão de usuário</h6>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="py-3 text-center">
              <i class="ni ni-single-02 ni-3x"></i>
              <h4 class="text-gradient text-danger mt-4">Você tem certeza que deseja excluir este usuário?!</h4>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-success" id="btnDelete">Sim, excluir!</button>
            <button type="button" class="btn btn-danger text-white ml-auto" data-bs-dismiss="modal">Cancelar</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Se houver parâmetro de exclusão bem-sucedida, exibir toast de sucesso -->
  <?php
  if (isset($_GET['delete_success'])) {
    echo '<script>$(document).ready(function() { $(".toast-delete-success").toast("show"); });</script>';
  }
  ?>

  <!-- Se houver parâmetro de erro de exclusão, exibir toast de erro -->
  <?php
  if (isset($_GET['delete_error'])) {
    echo '<script>$(document).ready(function() { $(".toast-delete-error").toast("show"); });</script>';
  }
  ?>

  <!-- Toast de sucesso -->
  <div class="toast toast-delete-success position-fixed bg-success text-white" style="top: 10px; right: 10px" role="alert" aria-live="assertive" aria-atomic="true" data-delay="5000">
    <div class="toast-body">
      Usuário deletado com sucesso.
    </div>
  </div>

  <!-- Toast de erro -->
  <div class="toast toast-delete-error position-fixed bg-danger text-white" style="top: 10px; right: 10px" role="alert" aria-live="assertive" aria-atomic="true" data-delay="5000">
    <div class="toast-body">
      Erro ao deletar usuário.
    </div>
  </div>

  <!-- Se houver parâmetro de atualização bem-sucedida, exibir toast de sucesso -->
  <?php
  if (isset($_GET['update_success'])) {
    echo '<script>$(document).ready(function() { $(".toast-update-success").toast("show"); });</script>';
  }
  ?>

  <!-- Se houver parâmetro de erro de atualização, exibir toast de erro -->
  <?php
  if (isset($_GET['update_error'])) {
    echo '<script>$(document).ready(function() { $(".toast-update-error").toast("show"); });</script>';
  }
  ?>

  <!-- Toast de sucesso -->
  <div class="toast toast-update-success position-fixed bg-success text-white" style="top: 10px; right: 10px" role="alert" aria-live="assertive" aria-atomic="true" data-delay="5000">
    <div class="toast-body">
      Usuário atualizado com sucesso.
    </div>
  </div>

  <!-- Toast de erro -->
  <div class="toast toast-update-error position-fixed bg-danger text-white" style="top: 10px; right: 10px" role="alert" aria-live="assertive" aria-atomic="true" data-delay="5000">
    <div class="toast-body">
      Erro ao atualizar o usuário.
    </div>
  </div>

  <!-- Inicializa os toasts do Bootstrap -->
  <script>
    $(document).ready(function() {
      $('.toast').toast();
    });
  </script>
</body>

</html>
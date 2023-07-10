<?php
session_start();

// Verifica se o usuário já está logado
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
  header("Location: ../index.php"); // Redireciona para a dashboard
  exit;
}
// Se o usuário não estiver logado, ele permanecerá na página de login
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    Unipets - Painel Administrativo
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />
  <link id="pagestyle" href="../assets/css/toast.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body class="">
  <main class="main-content  mt-0">
    <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg" style="background-image: url('../assets/img/background-register.png'); background-position: top;">
    </div>
    <div class="container">
      <div class="row mt-lg-n10 mt-md-n11 mt-n10 justify-content-center">
        <div class="col">
          <div class="card">
            <div class="formularioCadastro">
              <div class="card-header pb-0">
                <div class="d-flex align-items-center">
                  <p class="mb-0 fs-3">Cadastre-se</p>
                </div>
                <div class="d-flex align-items-center retornoCad"></div>
              </div>
              <div class="card-body">
                <form name="formCadastro" id="formCadastro" action="registerUser.php" method="POST" enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Nome</label>
                        <input class="form-control" type="text" placeholder="Ex.: Hudson" name="user_name" id="user_name">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Sobrenome</label>
                        <input class="form-control" type="text" placeholder="Ex.: Coutinho" name="user_surname" id="user_surname">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="example-text-input" class="form-control-label">CPF</label>
                        <input class="form-control" type="text" placeholder="Ex.: 111.222.333-44 (sem pontuação)" name="user_cpf" id="user_cpf" maxlength="14">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="example-text-input" class="form-control-label">E-mail</label>
                        <input class="form-control" type="email" placeholder="Ex.: hudsoncoutinho@souunisuam.com.br" name="user_mail" id="user_mail">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Senha</label>
                        <input class="form-control" type="password" placeholder="********" name="user_pass" id="user_pass">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Avatar</label>
                        <input type="file" class="form-control" id="user_avatar" name="user_avatar">
                      </div>
                    </div>
                    <div class="text-center">
                      <button type="submit" class="btn bg-primary w-100 my-4 mb-2">Cadastrar</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <!-- Toast de sucesso -->
  <div class="toast toast-success position-fixed bg-success text-white" style="top: 10px; right: 10px" role="alert" aria-live="assertive" aria-atomic="true" data-delay="5000">
    <div class="toast-body">
      Usuário registrado com sucesso.
    </div>
  </div>

  <!-- Toast de erro -->
  <div class="toast toast-error position-fixed bg-danger text-white" style="top: 10px; right: 10px" role="alert" aria-live="assertive" aria-atomic="true" data-delay="5000">
    <div class="toast-body">
      Erro ao cadastrar o usuário.
    </div>
  </div>

  <script>
    $(document).ready(function() {
      <?php
      if (isset($_GET['register_success'])) {
        echo '$(".toast-success").toast("show");';
      } elseif (isset($_GET['register_error'])) {
        echo '$(".toast-error").toast("show");';
      }
      ?>
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
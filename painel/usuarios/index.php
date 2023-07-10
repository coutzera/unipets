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
</head>

<body class="">
  <main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-100">
        <div class="container">
          <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
              <div class="card card-plain">
                <div class="formularioLogin">
                  <div class="resultadoForm"></div>
                  <div class="card-header pb-0 text-start">
                    <h4 class="font-weight-bolder">Entrar</h4>
                    <p class="mb-0">Entre com suas credenciais</p>
                  </div>
                  <form name="formLogin" id="formLogin" action="processaLogin.php" method="POST">
                    <div class="card-body">
                      <div class="mb-3">
                        <input type="email" class="form-control form-control-lg" placeholder="Email" aria-label="Email" id="users_mail" name="users_mail">
                      </div>
                      <div class="mb-0">
                        <input type="password" class="form-control form-control-lg" placeholder="Password" aria-label="Password" id="users_pass" name="users_pass">
                      </div>
                      <div class="text-center">
                        <button type="submit" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Entrar</button>
                      </div>
                      <!-- <div class="text-center mt-3">
                        <a href="recuperar-senha">Esqueci minha senha</a>
                      </div> -->
                    </div>
                  </form>
                  <!-- <div class="card-footer text-center pt-0 px-lg-2 px-1">
                    <p class="mb-4 text-sm mx-auto">
                      Ainda não se juntou aos petlovers?
                      <a href="register.php" class="text-primary">Junte-se agora</a>
                    </p>
                  </div> -->
                  <div class="mb-3">
                    <input class="form-control" type="hidden" name="g-recaptcha-response" id="g-recaptcha-response">
                  </div>
                </div>
              </div>
            </div>
            <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 end-0 text-center justify-content-center flex-column">
              <div class="position-relative  h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center overflow-hidden" style="background-image: url('../assets/img/background-login.jpg');
          background-size: cover;">
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  <?php
  if (isset($_GET['error'])) {
    echo '<script>
                    window.onload = function() {
                        var toastElList = [].slice.call(document.querySelectorAll(".toast"));
                        var toastList = toastElList.map(function(toastEl) {
                            return new bootstrap.Toast(toastEl);
                        });
                        toastList.forEach(function(toast) {
                            toast.show();
                        });
                    };
                </script>';
  }
  ?>
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
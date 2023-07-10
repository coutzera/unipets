<?php
require_once('./painel/db.php');

// Exibir erros no PHP
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <title>UniPets - Animais Amigáveis</title>
  <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="./painel/assets/css/style.css">
  <link rel="stylesheet" href="./painel/assets/css/card.css">
  <link rel="shortcut icon" href="./painel/assets/img/favicon.png" type="image/x-icon">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Quicksand">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</head>

<body>
  <header>
    <nav class="navbar">
      <img src="./painel/assets/img/logo.png" alt="" width="180px">
      <div class="menu-items">
        <div class="menu menu-left">
          <div class="align-icons">
            <img src="./painel/assets/img/icons/home.svg" alt="" class="icons">
            <a href="index.php#home" class="nav-link">Início</a>
          </div>
          <div class="align-icons">
            <img src="./painel/assets/img/icons/about.svg" alt="" class="icons">
            <a href="index.php#about" class="nav-link">Quem somos</a>
          </div>
          <div class="align-icons">
            <img src="./painel/assets/img/icons/about.svg" alt="" class="icons">
            <a href="index.php#services" class="nav-link">Serviços</a>
          </div>
          <div class="align-icons">
            <img src="./painel/assets/img/icons/faq.svg" alt="" class="icons">
            <a href="./faq.php" class="nav-link">Faq</a>
          </div>
        </div>
        <div class="menu menu-right z-index-1">
          <a href="./perdido.php" class="nav-link">Perdido</a>
          <a href="./register.php" class="nav-link">Cadastro Pet</a>
        </div>
      </div>
      <img class="burger" src="./painel/assets/img/icons/menu.svg" alt="">
    </nav>
  </header>
  <main>
    <div class="banner">
      <img src="./painel/assets/img/adocao.png" alt="">
    </div>
    <h1 class="title-section">Animais Disponíveis</h1>
    <section id="inicio">
      <div class="wrapper-cards">
        <?php

        // Prepare a consulta SQL
        $sql_query = $conn->prepare("SELECT p.*
        FROM pet_status ps
        JOIN pets p ON ps.pet_status_pet_id = p.pet_id
        WHERE ps.pet_status_liberado = 1 and ps.pet_status_situacao = 2");
        // Execute a consulta
        $sql_query->execute();
        // Verifica se há registros
        if ($sql_query->rowCount() > 0) {
          // Exibe os registros
          while ($arquivo = $sql_query->fetch(PDO::FETCH_ASSOC)) {
        ?>
            <div class="card-adopt">
              <img src="http://unipets.sytes.net/<?php echo $arquivo['pet_path']; ?>" alt="<?php echo $arquivo['pet_file']; ?>" srcset="">
              <div class="text">
                <h1><?php echo $arquivo['pet_name']; ?></h1>
                <h3><?php echo $arquivo['pet_raca']; ?></h3>
                <a href="./adoption.php?pet_id=<?php echo $arquivo['pet_id']; ?>" class="btn btn-primary">Adote-me</a>
              </div>
            </div>
        <?php
          }
        } else {
          // Exibe mensagem caso não haja registros
          echo "<h1>Não há registros.</h1>";
        }
        ?>
      </div>
    </section>
    <section id="about">
    </section>
    <section id="services">

    </section>
  </main>
  <footer>
    <div class="container px-4">
      <div class="img">
        <img src="./painel/assets/img/favicon.png" alt="" srcset="">
      </div>
    </div>
  </footer>
  <script src="./painel/assets/js/main.js"></script>
</body>

</html>

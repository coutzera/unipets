<?php
// Exibir erros no PHP
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once('./painel/db.php');
if (isset($_FILES['arquivo'])) {
  $arquivo = $_FILES['arquivo'];
  $nome_pet = $_POST['nome_pet'];
  $raca_pet = $_POST['raca_pet'];
  $genero_pet = $_POST['genero_pet'];
  $especie_pet = $_POST['especie_pet'];
  $porte_pet = $_POST['porte_pet'];
  $situacao_pet = $_POST['situacao_pet'];
  $desc_pet = $_POST['desc_pet'];

  if ($arquivo['error'])
    die("Falha ao enviar arquivo");

  if ($arquivo['size'] > 2097152)
    die("Arquivo muito grande. Max 2mb");

  $pasta = "./painel/assets/img/images/";
  $nomeArquivo = $arquivo['name'];

  $novoNomeArquivo = uniqid();

  $extensao = strtolower(pathinfo($nomeArquivo, PATHINFO_EXTENSION));

  if ($extensao != "jpg" && $extensao != "png" && $extensao != "jpeg")
    die("Tipo de arquivo não aceito.");

  $path = $pasta . $novoNomeArquivo . "." . $extensao;
  $deu_certo = move_uploaded_file($arquivo["tmp_name"], $path);

  if ($deu_certo) {
  // Inserir o pet na tabela "pets"
  $sql = "INSERT INTO pets (pet_name, pet_raca, pet_especie, pet_genero, pet_porte, pet_file, pet_path) VALUES(:nome_pet, :raca_pet, :especie_pet, :genero_pet, :porte_pet, :nomeArquivo, :path)";
  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':nome_pet', $nome_pet);
  $stmt->bindParam(':raca_pet', $raca_pet);
  $stmt->bindParam(':especie_pet', $especie_pet);
  $stmt->bindParam(':genero_pet', $genero_pet);
  $stmt->bindParam(':porte_pet', $porte_pet);
  $stmt->bindParam(':nomeArquivo', $nomeArquivo);
  $stmt->bindParam(':path', $path);

  $petInsertSuccess = $stmt->execute();

  // Obter o ID do pet recém-inserido
  $petId = $conn->lastInsertId();

  if ($petInsertSuccess) {
      // Inserir o pet na tabela "pet_status"
      $userId = $_SESSION['user_id'] = 1;
      $status = 0; // pet_status_liberado = 0 (ainda não liberado)

      $sql = "INSERT INTO pet_status (pet_status_pet_id, pet_status_user_id, pet_status_date, pet_status_liberado, pet_status_situacao) VALUES(:pet_id, :user_id, NOW(), :status, :situacao)";
      $stmt = $conn->prepare($sql);
      $stmt->bindParam(':pet_id', $petId);
      $stmt->bindParam(':user_id', $userId);
      $stmt->bindParam(':status', $status);
      $stmt->bindParam(':situacao', $situacao_pet);

      $petStatusInsertSuccess = $stmt->execute();
      if ($petStatusInsertSuccess) {
        echo '
        <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md" role="alert">
          <div class="flex">
            <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
            <div>
              <p class="font-bold">Pet cadastrado com sucesso!</p>
            </div>
          </div>
        </div>
          ';
      } else {
        echo '
        <div class="bg-red-100 border-t-4 border-red-500 rounded-b text-red-900 px-4 py-3 shadow-md" role="alert">
          <div class="flex">
            <div class="py-1"><svg class="fill-current h-6 w-6 text-red-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
            <div>
              <p class="font-bold">Erro ao inserir o pet na tabela status!</p>
            </div>
          </div>
        </div>
          ';
      }
  } else {
    echo '
    <div class="bg-red-100 border-t-4 border-red-500 rounded-b text-red-900 px-4 py-3 shadow-md" role="alert">
      <div class="flex">
        <div class="py-1"><svg class="fill-current h-6 w-6 text-red-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
        <div>
          <p class="font-bold">Ocorreu algum erro!</p>
        </div>
      </div>
    </div>
      ';
  }
  }
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <title>UniPets - Animais Amigáveis</title>
  <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Quicksand">
  <link rel="stylesheet" href="./painel/assets/css/style.css">
  <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
  <link rel="shortcut icon" href="./painel/assets/img/favicon.png" type="image/x-icon">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
            <img src="./painel/assets/img/icons/contact.svg" alt="" class="icons">
            <a href="index.php#contact" class="nav-link">Contatos</a>
          </div>
          <div class="align-icons">
            <img src="./painel/assets/img/icons/faq.svg" alt="" class="icons">
            <a href="./faq.php" class="nav-link">Faq</a>
          </div>
        </div>
        <div class="menu menu-right">
          <a href="./adopt.php" class="nav-link">Adote</a>
          <a href="./register.php" class="nav-link">Cadastro Pet</a>
        </div>
      </div>
      <img class="burger" src="./painel/assets/img/icons/menu.svg" alt="">
    </nav>
  </header>
  <main>
    <section id="inicio">
      <div class="wrapper-group">
        <h1>Cadastre seu PET</h1><br>
        <form action="#" method="post" enctype="multipart/form-data">
          <div class="input-group">
            <div class="input-box">
              <label for="">Nome do Pet</label>
              <input type="text" name="nome_pet" id="name" placeholder="Digite o nome do pet" required spellcheck="false">
            </div>
            <div class="input-box">
              <label for="">Raça do Pet</label>
              <input type="text" name="raca_pet" id="" placeholder="Digite a Raça do Pet">
            </div>
          </div>
          <div class="input-group">
            <div class="input-box">
              <label for="">Espécie do Pet <span>(Ex.: cachorro, gato...)</span></label>
              <input type="text" name="especie_pet" id="" placeholder="Digite o nome do pet">
            </div>
            <div class="input-box">
              <label for="">Porte do pet</label>
              <div class="wrapper-options">
                <input type="radio" name="porte_pet" id="option-1" value="1">
                <input type="radio" name="porte_pet" id="option-2" value="2">
                <input type="radio" name="porte_pet" id="option-3" value="3">
                <label for="option-1" class="option option-1">
                  <div class="dot"></div>
                  <span>Pequena</span>
                </label>
                <label for="option-2" class="option option-2">
                  <div class="dot"></div>
                  <span>Média</span>
                </label>
                <label for="option-3" class="option option-3">
                  <div class="dot"></div>
                  <span>Grande</span>
                </label>
              </div>
            </div>
          </div>
          <div class="input-group">
            <div class="input-box">
              <label for="">Gênero do Pet</label>
              <div class="wrapper-options">
                <input type="radio" name="genero_pet" id="option-4" value="1">
                <input type="radio" name="genero_pet" id="option-5" value="2">
                <label for="option-4" class="option option-4">
                  <div class="dot"></div>
                  <span>Macho</span>
                </label>
                <label for="option-5" class="option option-5">
                  <div class="dot"></div>
                  <span>Fêmea</span>
                </label>
              </div>
            </div>
            <div class="input-box">
              <label for="">Situacao do Pet?</label>
              <div class="wrapper-options">
                <input type="radio" name="situacao_pet" id="option-6" value="1">
                <input type="radio" name="situacao_pet" id="option-7" value="2">
                <label for="option-6" class="option option-6">
                  <div class="dot"></div>
                  <span>Perdido</span>
                </label>
                <label for="option-7" class="option option-7">
                  <div class="dot"></div>
                  <span>Adoção</span>
                </label>
              </div>
            </div>
          </div>
          <div class="input-group">
            <div class="input-textarea">
              <label for="">Descrição sobre o Pet <span>(Ex.: cor, local do desaparecimento...)</span></label>
              <textarea name="desc_pet" id="" cols="30" rows="10"></textarea>
            </div>
          </div>
          <div class="input-group">
            <div class="input-file">
              <label for="">Imagem do Pet</label>
              <input type="file" name="arquivo" id="">
            </div>
          </div>
          <div class="input-group">
            <div class="input-button">
              <button>Cadastrar</button>
            </div>
          </div>
        </form>
      </div>
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
<!DOCTYPE html>
<html lang="pt-br">

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
  <link rel="stylesheet" href="./painel/assets/css/modal.css">
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
            <img src="./painel/assets/icons/home.svg" alt="" class="icons">
            <a href="index.php#home" class="nav-link">Início</a>
          </div>
          <div class="align-icons">
            <img src="./painel/assets/icons/about.svg" alt="" class="icons">
            <a href="index.php#about" class="nav-link">Quem somos</a>
          </div>
          <div class="align-icons">
            <img src="./painel/assets/icons/about.svg" alt="" class="icons">
            <a href="index.php#services" class="nav-link">Serviços</a>
          </div>          
          <div class="align-icons">
            <img src="./painel/assets/icons/faq.svg" alt="" class="icons">
            <a href="./faq.php" class="nav-link">Faq</a>
          </div>
        </div>
        <div class="menu menu-right z-index-1">
        <a href="./perdido.php" class="nav-link">Perdidos</a>
          <a href="./adopt.php" class="nav-link">Adote</a>
          <a href="./register.php" class="nav-link">Cadastro Pet</a>
        </div>
      </div>
      <img class="burger" src="./painel/assets/img/icons/menu.svg" alt="">
    </nav>
  </header>
  <main>
    <div class="wrapper-carrosel">
      <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active" data-bs-interval="10000">
		 <img src="./painel/assets/img/slide1.png" width="100px" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
            </div>
          </div>
          <div class="carousel-item" data-bs-interval="2000">
            <img src="./painel/assets/img/slide2.png" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">

            </div>
          </div>
          <div class="carousel-item">
            <img src="./painel/assets/img/slide3.png" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">

            </div>
          </div>
        </div>
	<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>
    <section id="about">
      <div class="container px-4">
        <div class="row gx-4 justify-content-center">
          <h1><b>Quem Somos</b></h1>
          <p>Somos uma plataforma de soluções que oferece serviços para encontrar animais de estimações que
            estejam desaparecidos.
            Nosso sistema conta com programa de adoção para aqueles que buscam por um amigo & companheiro de quatro
            patas. Buscando
            ajudar e facilitar de uma forma rápida e eficaz a sua vida.<br>

          <p>Lembre-se: Adotar também é um ato de amor.</p>

          <div id="box">Vantagens do Unipets:</div>

          </p>
          <ul>
            <li>Alcance de milhares de pessoas</li>
            <li>Maiores chances de encontrar seu pet</li>
            <li>Adote seu companheiro de quatro patas sem precisar sair de casa</li>
            <li>Fique por dentro de todas as notícias no mundo animal</li>
          </ul>
        </div>
      </div>
      <div class="shadow p-3 mb-5 bg-white rounded"><img src="./painel/assets/img/banner.png" class="img-fluid" alt="Imagem responsiva">
    </section>
    <section id="services">
      <div class="container px-4">
        <div class="row gx-4 justify-content-center">
          <h1><strong>Serviços</strong></h1>
          <h3>FindPets</h3>
          <p>Para se ter um sucesso na localização do seu pet, temos que agir logo. Concordamos que encontrar um
            animal estimação que esteja perdido, não é algo fácil. Normalmente, esses animais ficam assustados e
            acabam assumindo um comportamento de autopreservação ao ponto de percorrerem por longas distâncias e
            evitando o contato com quem tenta se aproximar ou pega-los </p>
          <br>
          <p>
            Por isso é muito importante que haja uma ação rápida na procura desses animais. Caso você não tenha
            pessoas ou recursos para procura-los, nós da UniPets estamos dispostos a ajuda-los. Conforme nosso serviço
            é contratado, passamos a ter todo controle da operação e metódos de busca.
          </p>
          <h3>Adoção Online</h3>
          <p>Você pode adotar ou apadrinhar um pet aqui na UniPets. Neste eato momento, em todo território nacional
            existem milhares de doguinhos ou gatinhos esperando um lar para chamar de seu. Sabemos que não há momento
            melhor do que presenciar aquela coisinha alegre depois de tanto carinho e cuidado. Já pensou que você pode
            mudar o destino desses animais?</p>
          <div class="wrapper-cards services-card">
            <div class="service">
              <img src="./painel/assets/img/encontrar.png" alt="" srcset="">
              <div class="text">
                <h2>Localize seu Pet</h2>
                <p>
                  Dispomos de uma área especialmente destinada à adoção, onde você poderá encontrar seu companheiro canino ou felino ideal para levar para casa.
                </p>
              </div>
            </div>
            <div class="service">
              <img src="./painel/assets/img/formulario.png" alt="" srcset="">
              <div class="text">
                <h2>Cadastro de Interesse</h2>
                <p>
                  Basta preencher o formulário de interesse fornecido e aguardar o contato da ONG/protetor em até 48 horas.
                </p>
              </div>
            </div>


            <div class="service">
              <img src="./painel/assets/img/aprovacao.png" alt="" srcset="">
              <div class="text">
                <h2>Processo de Avaliação</h2>
                <p>
                  A ONG/protetor responsável avaliará o perfil e cadastro do adotante para verificar se atende aos requisitos necessários.
                </p>
              </div>
            </div>

            <div class="service">
              <img src="./painel/assets/img/adocaocompleta.png" alt="" srcset="">
              <div class="text">
                <h2>Adoção Completa</h2>
                <p>
                  Se aprovado, você poderá levar seu animal de estimação para casa imediatamente!
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
      </div>
    </section>
  </main>
  <!-- Modal -->
  <div id="myModal" class="modal">
    <div class="modal-content">
      <span class="close">&times;</span>
      <p>Entre para o nosso grupo do telegram : <a href="http://t.me/Pshow_Bot">Clique aqui</a></p>
    </div>
  </div>
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

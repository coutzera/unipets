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
            <img src="./painel/assets/img/icons/contact.svg" alt="" class="icons">
            <a href="index.php#contact" class="nav-link">Contatos</a>
          </div>
          <div class="align-icons">
              <img src="./painel/assets/img/icons/faq.svg" alt="" class="icons">
              <a href="./faq.php" class="nav-link">Faq</a>
            </div>
        </div>
        <div class="menu menu-right">
        <a href="./perdido.php" class="nav-link">Perdidos</a>
          <a href="./adopt.php" class="nav-link">Adote</a>
          <a href="./register.php" class="nav-link">Cadastro Pet</a>
        </div>
      </div>
      <img class="burger" src="./painel/assets/img/icons/menu.svg" alt="">
    </nav>
  </header>
  <main>
    <h1 class="center">Perguntas Frequentes</h1>
    <details>
      <summary>Qual é o processo de adoção de um pet?</summary>
      <p>O processo de adoção de um pet geralmente envolve pesquisar organizações de adoção, visitar o abrigo ou organização, preencher um formulário de candidatura, passar por uma avaliação e assinar um contrato de adoção. É importante seguir as orientações da organização ou abrigo em relação aos cuidados veterinários e às recomendações de treinamento e socialização.</p>
    </details>
    <details>
      <summary>Como escolher o pet ideal para a minha família?</summary>
      <p>Ao escolher o pet ideal para sua família, leve em consideração o estilo de vida, as necessidades do animal, a compatibilidade com a família e outros animais de estimação, o tempo e recursos necessários para cuidar do animal, e as preferências da família.</p>
    </details>
    <details>
      <summary>Quais são as responsabilidades envolvidas na adoção de um pet?</summary>
      <p>As responsabilidades envolvidas na adoção de um pet incluem fornecer cuidados diários, como alimentação, água fresca e exercícios adequados, garantir a saúde do animal por meio de visitas regulares ao veterinário, oferecer treinamento e socialização, garantir um ambiente seguro e amoroso, e cumprir todas as leis e regulamentações locais relacionadas aos animais de estimação. Além disso, é preciso estar preparado para assumir um compromisso de longo prazo e fornecer cuidados contínuos e amorosos ao seu animal de estimação.</p>
    </details>
    <details>
      <summary>Qual é o custo médio de adoção de um pet?</summary>
      <p>O custo médio de adoção de um pet varia dependendo do local e da organização de onde você estiver adotando. Geralmente, a taxa de adoção inclui os custos de vacinação e castração do animal, além de uma contribuição para ajudar a cobrir os custos operacionais do abrigo ou organização. Em média, a taxa de adoção pode variar de algumas dezenas a algumas centenas de reais. Além da taxa de adoção, é preciso considerar os custos contínuos de cuidados com a saúde, alimentação e outros cuidados básicos.</p>
    </details>
    <details>
      <summary>Como introduzir um novo pet em casa com outros animais de estimação?</summary>
      <p>Para introduzir um novo pet em casa com outros animais de estimação, faça a introdução gradualmente, supervisione as interações, forneça espaço e recursos suficientes, considere o uso de feromônios sintéticos, mantenha uma rotina consistente e ofereça amor e atenção a todos os animais.</p>
    </details>
    <details>
      <summary>Qual é a melhor idade para adotar um pet?</summary>
      <p>A melhor idade para adotar um pet depende do tipo de animal e da preferência do adotante. Geralmente, cães e gatos podem ser adotados com segurança a partir de oito semanas de idade, mas animais mais velhos também podem se adaptar bem a novos lares. A idade ideal pode variar dependendo das necessidades e personalidade do animal e da capacidade do adotante em fornecer os cuidados necessários para cada idade.</p>
    </details>
    <details>
      <summary>Como lidar com problemas comportamentais em um pet adotado?</summary>
      <p>Para lidar com problemas comportamentais em um pet adotado, é importante identificar a causa raiz do comportamento e abordá-la por meio de técnicas de treinamento e modificação comportamental, como reforço positivo e negativo, dessensibilização, e contratação de um treinador profissional ou veterinário especializado em comportamento animal, se necessário. É importante ter paciência e consistência ao trabalhar com o animal e oferecer muito amor e apoio durante o processo.</p>
    </details>
    <details>
      <summary>Como treinar um pet adotado?</summary>
      <p>Para treinar um pet adotado, é importante ter paciência, consistência e utilizar técnicas de treinamento baseadas em reforço positivo, como recompensar comportamentos desejáveis e ignorar comportamentos indesejáveis. Comece com comandos básicos, como "senta" e "fica", e avance para comandos mais complexos à medida que o animal progride. Oferecer bastante exercício físico e mental, bem como socialização adequada, também é importante para o treinamento bem-sucedido do animal. Se necessário, considere a contratação de um treinador profissional para ajudá-lo com o treinamento do animal.</p>
    </details>
    </div>
  </main>
  <script src="./painel/assets/js/main.js"></script>
</body>

</html>
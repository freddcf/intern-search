<?php
  include "checkSession.php";
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/base.css">
  <link rel="stylesheet" href="css/main.css">
  <link rel="stylesheet" href="css/animations.css">
  <title>Intern Search</title>
</head>

<body>
  <div class="failed">Tamanho de tela não suportado!</div>
  <div class="container">
    <nav class="navigation">
      <div class="buttons">
        <a class="nav-btn active" href="index.php">
          <img src="img/home.svg" alt="home">
        </a>
        <a class="nav-btn" href="mural.php">
          <img src="img/mural.svg" alt="mural">
        </a>
        <?php if($userType == "empresa"){ echo '<a class="nav-btn" href="anunciar.php">
          <img src="img/anunciar.svg" alt="anunciar">
        </a>';} ?>
        <?php if($userType == "empresa"){ echo '<a class="nav-btn" href="registrosApl.php">
          <img src="img/logs.svg" alt="registros">
        </a>';} ?>
        <a class="nav-btn" href="userConfig.php">
          <img src="img/user.svg" alt="perfil">
        </a>
      </div>

      <div class="info">
        <a class="about-text" href="index.php">
          Sobre
        </a>
        <svg width="41" height="41" viewBox="0 0 41 41" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
              d="M34.0166 20.6835C35.893 18.8069 36.9471 16.2617 36.9471 13.6078C36.9471 10.954 35.893 8.40875 34.0166 6.53216C32.1402 4.65557 29.5952 3.60132 26.9416 3.60132C24.2879 3.60132 21.743 4.65557 19.8666 6.53216L8.61658 17.7833V31.9513H22.7832L34.0166 20.6835Z"
              stroke="" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M26.9499 13.6162L3.61658 36.9518" stroke="" stroke-width="3" stroke-linecap="round"
              stroke-linejoin="round" />
            <path d="M29.4499 25.2839H15.2832" stroke="" stroke-width="3" stroke-linecap="round"
              stroke-linejoin="round" />
            </svg>
      </div>
    </nav>


    <section class="section-content">
      <header class="header">
        <h1 class="heading01">
          <svg width="41" height="41" viewBox="0 0 41 41" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
              d="M34.0166 20.6835C35.893 18.8069 36.9471 16.2617 36.9471 13.6078C36.9471 10.954 35.893 8.40875 34.0166 6.53216C32.1402 4.65557 29.5952 3.60132 26.9416 3.60132C24.2879 3.60132 21.743 4.65557 19.8666 6.53216L8.61658 17.7833V31.9513H22.7832L34.0166 20.6835Z"
              stroke="" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
            <path d="M26.9499 13.6162L3.61658 36.9518" stroke="" stroke-width="3" stroke-linecap="round"
              stroke-linejoin="round" />
            <path d="M29.4499 25.2839H15.2832" stroke="" stroke-width="3" stroke-linecap="round"
              stroke-linejoin="round" />
          </svg>

          Intern Search
        </h1>
      </header>

      <main class="main-content">
        <div class="banner">
          <div class="banner-title">
            <img src="img/arrow.svg" alt="arrow-up">
            <h2 class="heading02">Aprimore a si mesmo com um estágio</h2>
          </div>
        </div>

        <div class="cards">
          <div class="card01">
            <h3 class="card-title">
            Atualizações
            </h3>
            <p class="card-text">
            Intern Search é uma empresa que propõe ofertas de estágio para todas as áreasn e idades, visando sempre o aprendizado e desenvolvimento pessoal e social dos candidato. Um estágio nunca esteve tão fácil para você como está aqui...
            </p>
          </div>
          <div class="card02">
            <h3 class="card-title">
            Atualizações futuras
            </h3>
            <p class="card-text">
              <a href="" class="upcoming">Ranking Empresarial</a>
              <a href="" class="upcoming">Ranking Salarial</a>
              <a href="" class="upcoming">Como aplicar para vagas</a>
              <a href="" class="upcoming">Como contatar empresas</a>
            </p>
          </div>
          <div class="card03">
            <h3 class="card-title">
              Procurar estágio
            </h3>
            <p class="card-text">
            Em nossa plataforma você estará sempre atualizado das melhores vagas no mercado de trabalho que um estagiário pode encontrar.
            </p>
            <a class="btn-mural" href="mural.php">Abrir Mural</a>
          </div>
        </div>
      </main>
    </section>
  </div>
  
</body>

</html>
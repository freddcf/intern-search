<?php
  include "checkSession.php";

  if($userType == "candidato"){
    header('Location: index.php');
  }
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/base.css">
  <link rel="stylesheet" href="css/anunciar.css">
  <title>Intern Search</title>
</head>

<body>
  <div class="failed">Tamanho de tela não suportado!</div>
  <div class="container">
    <nav class="navigation">
      <div class="buttons">
        <a class="nav-btn" href="index.php">
          <img src="img/home.svg" alt="home">
        </a>
        <a class="nav-btn" href="mural.php">
          <img src="img/mural.svg" alt="mural">
        </a>
        <a class="nav-btn active" href="anunciar.php">
          <img src="img/anunciar.svg" alt="anunciar">
        </a>
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

          Anunciar
        </h1>
      </header>

      <main class="main-content">
        <div class="announcement-box">
          <form action="anunciar-form.php" method="post">
            <div class="input-box">
              <p>
                Função:
              </p>
              <input type="text" name="funcao" id="" placeholder="Ex: Programador" required>
            </div>
            <div class="input-box">
              <p>
                Localização:
              </p>
              <div class="selectors">
                <select name="estados" id="estados" required>
                  <option value="" disabled selected>- Estados -</option>
                </select>
                <select name="municipios" id="municipios" required>
                  <option value="" disabled selected>- Municípios -</option>
                </select>
              </div>
            </div>
            <div class="input-box">
              <p>
                Descrição:
              </p>
              <textarea name="descricao" id="" placeholder="Ex: como é a jornada de trabalho" required></textarea>
            </div>
            <div class="input-box">
              <p>
                Período:
              </p>
              <input type="text" name="periodo" id="" placeholder="Ex: Integral" required>
            </div>
            <div class="input-box">
              <p>
                Salário em R$:
              </p>
              <input type="text" name="pagamento" id="pagamento" onkeyup="formatMoney()" placeholder="Ex: 1.200,00" required>
            </div>
            <div class="input-box">
              <p>
                Horário de entrada:
              </p>
              <input type="text" name="horaEntrada" id="" placeholder="Ex: Manhã" required>
            </div>
            <div class="input-box">
              <p>
                Nº de vagas:
              </p>
              <input type="number" name="numVagas" id="" placeholder="Ex: 5" required>
            </div>
            <button class="submitBtn" type="submit">Postar</button>
          </form>
        </div>

        <img src="img/anunciar-banner.png" alt="banner">

      </main>
    </section>
  </div>

  <script src="js/functionalities.js"></script>
  <script src="js/localizationApi.js"></script>
</body>

</html>
<?php
  include "checkSession.php";
  include "mural-form.php";
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/base.css">
  <link rel="stylesheet" href="../css/mural.css">
  <link rel="stylesheet" href="../css/animations.css">
  <title>Intern Search</title>
</head>

<body>
  <div class="failed">Tamanho de tela não suportado!</div>
  <div class="container">
    <nav class="navigation">
      <div class="buttons">
        <a class="nav-btn" href="index.php">
          <img src="../img/home.svg" alt="home">
        </a>
        <a class="nav-btn active" href="mural.php">
          <img src="../img/mural.svg" alt="mural">
        </a>
        <?php if($userType == "empresa"){ echo '<a class="nav-btn" href="anunciar.php">
          <img src="../img/anunciar.svg" alt="anunciar">
        </a>';} ?>
        <?php if($userType == "empresa"){ echo '<a class="nav-btn" href="registrosApl.php">
          <img src="../img/logs.svg" alt="registros">
        </a>';} ?>
        <a class="nav-btn" href="userConfig.php">
          <img src="../img/user.svg" alt="perfil">
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
          Mural
        </h1>
        <a class="reload" href="mural.php">
          <img src="../img/reload.svg" alt="reload">
          Atualizar Mural
        </a>
      </header>

      <main class="main-content">
        <div class="wrapper">
          <?php while($data = $result_anuncio->fetch(PDO::FETCH_ASSOC)){ ?>

            <div class="announcement" onclick=modalInfo(<?php echo $data['id']; ?>)>
              <div class="title"><?php echo $data['cargo']; ?></div>
              <div class="companyName"><?php echo $data['empresa']; ?></div>
              <div class="localization"><?php echo $data['localizacao']; ?></div>
              <div class="tags">
                <div class="tag work-time">
                  <img src="../img/work-time.svg" alt="">
                  <?php echo $data['jornada']; ?>
                </div>
                <div class="tag day-time">
                  <img src="../img/time.svg" alt="">
                  <?php echo $data['horaEntrada']; ?>
                </div>
                <div class="tag cash">
                  <img src="../img/cash.svg" alt="">
                  R$<?php echo $data['pagamento']; ?> por mês
                </div>
              </div>
              <p class="description"><?php echo $data['descricao']; ?></p>
              <div class="option">
                <img src="../img/send.svg" alt="">
                <span class="sendForm">
                Envie seu currículo em PDF
                </span>
              </div>
              <div class="option">
                <img src="../img/candidate.svg" alt="">
                <span class="candidatesNum">
                Contratando <?php echo $data['numVagas']; ?> candidatos
                </span>
              </div>
            </div>
                        
            <?php } ?>
        </div>


        <div class="modal hidden">
        <!-- <div class="modal"> -->
          <button class="close-modal">&times;</button>
          <div class="content">
          </div>
        </div>
        <div class="overlay hidden"></div>
        <!-- <div class="overlay"></div> -->
      </main>
    </section>
  </div>
  
  <script src="../js/modal.js"></script>
</body>

</html>
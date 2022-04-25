<?php
  include "checkSession.php";
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/base.css">
  <link rel="stylesheet" href="../css/userConfig.css">
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
        <a class="nav-btn" href="mural.php">
          <img src="../img/mural.svg" alt="mural">
        </a>
        <?php if($userType == "empresa"){ echo '<a class="nav-btn" href="anunciar.php">
          <img src="../img/anunciar.svg" alt="anunciar">
        </a>';} ?>
        <?php if($userType == "empresa"){ echo '<a class="nav-btn" href="registrosApl.php">
          <img src="../img/logs.svg" alt="registros">
        </a>';} ?>
        <a class="nav-btn active" href="userConfig.php">
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

          Configurar Perfil
        </h1>
        <a class="logout" href="endSession.php">Log Out</a>
      </header>

      <main class="main-content">
        <div class="dashboard">
          <div class="userInfo">
            <?php
              if($userType == "candidato") $tableSelection = "candidatos";
              if($userType == "empresa") $tableSelection = "empresas";

              $query_usuario  = "SELECT * FROM $tableSelection WHERE email = '$logado' LIMIT 1";
              $result_usuario = $conn->prepare($query_usuario);
              $result_usuario->execute();
            
              while ($data = $result_usuario->fetch(PDO::FETCH_ASSOC)){ ?>
              <div class="infoBox">
                <p class="infoTag"><?php echo "Nome" ?></p>
                <p class="infoValue"><?php echo $data['nome'] ?></p>
              </div>
              <div class="infoBox">
                <p class="infoTag"><?php echo "Email" ?></p>
                <p class="infoValue"><?php echo $data['email'] ?></p>
              </div>
              <div class="infoBox">
                <p class="infoTag"><?php echo "Senha" ?></p>
                <p class="infoValue"><?php
                for($i=0; $i < strlen($data['senha']); $i++)
                 echo "&#9679;";
                 ?></p>
              </div>
              <div class="infoBox">
                <p class="infoTag"><?php echo "Localização" ?></p>
                <p class="infoValue"><?php echo $data['localizacao'] ?></p>
              </div>
              <div class="infoBox">
                <p class="infoTag"><?php echo "Contato" ?></p>
                <p class="infoValue"><?php echo $data['contato'] ?></p>
              </div>
              
            <?php } ?>
            </div>
            <a href="userEdit.php">
              <button class="editP">Editar</button>
            </a>
        </div>
      </main>
    </section>
  </div>


</body>

</html>
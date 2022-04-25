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
  <link rel="stylesheet" href="css/registrosApl.css">
  <link rel="stylesheet" href="css/animations.css">
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
        <?php if($userType == "empresa"){ echo '<a class="nav-btn" href="anunciar.php">
          <img src="img/anunciar.svg" alt="anunciar">
        </a>';} ?>
        <a class="nav-btn active" href="registrosApl.php">
          <img src="img/logs.svg" alt="registros">
        </a>
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

          Registros de Aplicações
        </h1>
      </header>

      <main class="main-content">
        <div class="apl-box">
          <table class="content-table">
            <thead>
              <tr>
                <th>Candidato</th>
                <th>Cargo</th>
                <th>Arquivo</th>
                <th>Data de envio</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $query_sql_files  = "SELECT * FROM curriculo_upload WHERE empresa = '$nome'";
              $result_sql_files = $conn->query($query_sql_files);
              while($arquivo = $result_sql_files->fetch( PDO::FETCH_ASSOC )){
              ?>
              <tr>
                <td><?php echo $arquivo['candidato'] ?></td>
                <td><?php echo $arquivo['cargo'] ?></td>
                <td><a href="<?php echo $arquivo['path']; ?>" target="_blank" rel="noopener noreferrer"><?php echo $arquivo['nome']; ?></a></td>
                <td><?php echo date("d/m/Y H:i", strtotime($arquivo['data_upload'])); ?></td>
              </tr>
              <?php
              }
              ?>
            </tbody>
          </table>
        </div>
      </main>
    </section>
  </div>

  <script src="js/functionalities.js"></script>
</body>

</html>
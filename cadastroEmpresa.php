<?php
  $error = filter_input(INPUT_GET, 'error', FILTER_SANITIZE_NUMBER_INT);
  if($error == 5){
    echo "<script>alert('ERROR: Email já cadastrado');</script>";
  }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/base.css">
  <link rel="stylesheet" href="css/cadastro.css">
  <title>Intern Search</title>
</head>
<body>
  <div class="container">
    <div class="tela-cad">
      <form action="cadastroEmpresa-form.php" method="post" class="login">
        <h1 class="welcome">Cadastrar-se como recrutador</h1>
        <input type="text" name="nomeEmpresa" id="nomeEmpresa" placeholder="Nome da empresa">
        <input type="text" name="cnpj" id="cnpj" placeholder="CNPJ">
        <!-- <input type="text" name="localizacao" id="localizacao" placeholder="Cidade - Estado"> -->
        <div class="selectors">
          <select name="estados" id="estados" required>
            <option value="" disabled selected>- Estados -</option>
          </select>
          <select name="municipios" id="municipios" required>
            <option value="" disabled selected>- Municípios -</option>
          </select>
        </div>
        <input type="email" name="email" id="email" placeholder="Email">
        <input type="password" name="senha" id="senha" placeholder="Senha">
        <input type="tel" name="contato" id="contato" onkeyup="maskNum(event)" placeholder="Contato">
        <button type="submit" name="submit">Entrar</button>
      </form>
    </div>
    <div class="banner">
      <img src="img/cadastro.svg" alt="banner">
      <h2 class="brand">Intern Search</h2>
    </div>
  </div>

  <script src="js/functionalities.js"></script>
  <script src="js/localizationApi.js"></script>
</body>
</html>
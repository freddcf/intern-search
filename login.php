<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/login.css">
  <link rel="stylesheet" href="css/animations.css">
  <title>Intern Search</title>
</head>
<body>
  <div class="container">
    <div class="tela-cad">
      <form action="login-form.php" method="POST" class="login">
        <h1 class="welcome">Bem-vindo</h1>
        <input type="email" name="email" id="email" placeholder="Email">
        <input type="password" name="senha" id="senha" placeholder="Senha">

        <button type="submit" name="submit">Entrar</button>

      </form>
        <div class="createacc">
          <p>Novo aqui?</p>
          <p>Cadastre-se como <a href="cadastroCandidato.php" class="option">Candidato</a> ou <a href="cadastroEmpresa.php" class="option">Empresa/Recrutador</a></p>
        </div>
    </div>
    <div class="banner">
      <img src="img/login.svg" alt="banner">
      <h2 class="brand">Intern Search</h2>
    </div>
  </div>
</body>
</html>
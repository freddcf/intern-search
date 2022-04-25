<?php
  session_start();

  if(isset($_POST['submit']) && !empty($_POST['nomeEmpresa']) && !empty($_POST['cnpj']) && !empty($_POST['email']) && !empty($_POST['senha']) && !empty($_POST['estados']) && !empty($_POST['municipios']) && !empty($_POST['contato'])) {
    
    include "connect.php";
    $nomeEmpresa = $_POST['nomeEmpresa'];
    $cnpj = $_POST['cnpj'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $estado = $_POST['estados'];
    $municipio = $_POST['municipios'];
    $localizacao = $municipio . ", " . $estado;
    $contato = $_POST['contato'];

    $sqlC = "SELECT * FROM candidatos WHERE email = '$email'";
    $resultC = $conn->prepare($sqlC);
    $resultC->execute();
    $affectedC = $resultC->rowCount();

    $sqlE = "SELECT * FROM empresas WHERE email = '$email'";
    $resultE = $conn->prepare($sqlE);
    $resultE->execute();
    $affectedE = $resultE->rowCount();
    
    if ($affectedC > 0 || $affectedE > 0){
      $error = 5;
      header("Location: cadastroEmpresas.php?error=$error");
    } else {
      $sqlCad = "INSERT INTO empresas (nome, cnpj, email, senha, localizacao, contato) VALUES ('$nomeEmpresa','$cnpj', '$email','$senha','$localizacao','$contato')";
      $resultCad = $conn->prepare($sqlCad);
      $resultCad->execute();
      $affectedCad = $resultCad->rowCount();

      if ($affectedCad > 0){
        // echo 'Success: At least 1 row was affected.';
        $_SESSION['email'] = $email;
        $_SESSION['senha'] = $senha;
        $_SESSION['userType'] = "empresa";
        header('Location: index.php');
      } else {
        header('Location: cadastroEmpresa.php');
      }
    }

  } else {
    header('Location: cadastroEmpresa.php');
  }
  
?>
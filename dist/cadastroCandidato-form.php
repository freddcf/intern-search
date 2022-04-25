<?php
  session_start();

  if(isset($_POST['submit']) && !empty($_POST['nome']) && !empty($_POST['email']) && !empty($_POST['senha']) && !empty($_POST['estados']) && !empty($_POST['municipios']) && !empty($_POST['contato'])) {
    
    include "connect.php";
    $nome = $_POST['nome'];
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
      header("Location: cadastroCandidato.php?error=$error");
    } else {
      $sqlCad = "INSERT INTO candidatos (nome, email, senha, localizacao, contato) VALUES ('$nome','$email','$senha','$localizacao','$contato')";
      $resultCad = $conn->prepare($sqlCad);
      $resultCad->execute();
      $affectedCad = $resultCad->rowCount();

      if ($affectedCad > 0){
        // echo 'Success: At least 1 row was affected.';
        $_SESSION['email'] = $email;
        $_SESSION['senha'] = $senha;
        $_SESSION['userType'] = "candidato";
        header('Location: index.php');
      } else {
        header('Location: cadastroCandidato.php');
      }
    }

  } else {
    header('Location: cadastroCandidato.php');
  }
  
?>
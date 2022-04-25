<?php
  include "checkSession.php";

  if($userType == "candidato"){
    if(!empty($_POST['nome']) && !empty($_POST['email']) && !empty($_POST['senha']) && !empty($_POST['localizacao']) && !empty($_POST['contato'])) {
      $nome = $_POST['nome'];
      $email = $_POST['email'];
      $senha = $_POST['senha'];
      $localizacao = $_POST['localizacao'];
      $contato = $_POST['contato'];

      $sqlU = "UPDATE candidatos SET email = '$email', senha = '$senha', localizacao = '$localizacao', contato = '$contato' WHERE email = '$logado'";
      $resultU = $conn->prepare($sqlU);
      $resultU->execute();
      $affectedU = $resultU->rowCount();

      if($affectedU > 0){
        header('Location: userConfig.php');
      } else {
        header('Location: userEdit.php');
      }
    }
  } else if ($userType == "empresa"){
    if(!empty($_POST['nome']) && !empty($_POST['email']) && !empty($_POST['senha']) && !empty($_POST['localizacao']) && !empty($_POST['contato']) && !empty($_POST['cnpj'])) {
      $nome = $_POST['nome'];
      $email = $_POST['email'];
      $senha = $_POST['senha'];
      $localizacao = $_POST['localizacao'];
      $contato = $_POST['contato'];
      $cnpj = $_POST['cnpj'];

      $sqlU = "UPDATE empresas SET email = '$email', senha = '$senha', localizacao = '$localizacao', contato = '$contato', cnpj = '$cnpj' WHERE email = '$logado'";
      $resultU = $conn->prepare($sqlU);
      $resultU->execute();
      $affectedU = $resultU->rowCount();

      if($affectedU > 0){
        header('Location: userConfig.php');
      } else {
        header('Location: userEdit.php');
      }
    }
  }


?>
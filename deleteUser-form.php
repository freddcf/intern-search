<?php
  include "checkSession.php";

  if($userType == "candidato"){
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $localizacao = $_POST['localizacao'];
    $contato = $_POST['contato'];

    $sqlU = "DELETE FROM candidatos WHERE email = '$logado'";
    $resultU = $conn->prepare($sqlU);
    $resultU->execute();
    $affectedU = $resultU->rowCount();

    if($affectedU > 0){
      echo "<script>alert('Usuário deletado...');</script>";
      header('Location: endSession.php');
    } else {
      echo "<script>alert('ERROR: Usuário não pode ser deletado!');</script>";
      header('Location: userEdit.php');
    }
  } else if ($userType == "empresa"){
    $sqlU = "DELETE FROM empresas WHERE email = '$logado'";
    $resultU = $conn->prepare($sqlU);
    $resultU->execute();
    $affectedU = $resultU->rowCount();

    if($affectedU > 0){
      echo "<script>alert('Usuário deletado...');</script>";
      header('Location: endSession.php');
    } else {
      echo "<script>alert('ERROR: Usuário não pode ser deletado!');</script>";
      header('Location: userEdit.php');
    }
  }


?>
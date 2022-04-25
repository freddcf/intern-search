<?php
  include "connect.php";

  session_start();
  if((!isset($_SESSION['email']) == true) and (!isset($_SESSION['senha']) == true)){
    unset($_SESSION['email']);
    unset($_SESSION['senha']);
    header('Location: login.php');
  }
  $userType = $_SESSION['userType'];
  $logado = $_SESSION['email'];

  if($userType == "candidato"){
    $query_userOnline  = "SELECT * FROM candidatos WHERE email = '$logado' LIMIT 1";
    $result_userOnline  = $conn->prepare($query_userOnline);
    $result_userOnline->execute();

    while ($data = $result_userOnline->fetch(PDO::FETCH_ASSOC)){
      $nome = $data['nome'];
    }
    $_SESSION['nome'] = $nome;
    
  } else if($userType == "empresa"){
    $query_userOnline  = "SELECT * FROM empresas WHERE email = '$logado' LIMIT 1";
    $result_userOnline  = $conn->prepare($query_userOnline);
    $result_userOnline->execute();

    while ($data = $result_userOnline->fetch(PDO::FETCH_ASSOC)){
      $nome = $data['nome'];
    }
    $_SESSION['nome'] = $nome;
  }

?>
<?php
  session_start();

  if(isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['senha'])){
    include "connect.php";
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sqlC = "SELECT * FROM candidatos WHERE email = '$email' and senha = '$senha'";
    $resultC = $conn->prepare($sqlC);
    $resultC->execute();
    $affectedC = $resultC->rowCount();

    $sqlE = "SELECT * FROM empresas WHERE email = '$email' and senha = '$senha'";
    $resultE = $conn->prepare($sqlE);
    $resultE->execute();
    $affectedE = $resultE->rowCount();
    
    if ($affectedC > 0){
      // echo 'Success: At least 1 row was affected.';
      $_SESSION['email'] = $email;
      $_SESSION['senha'] = $senha;
      $_SESSION['userType'] = "candidato";
      header('Location: index.php');
    } else if ($affectedE > 0){
      // echo 'Success: At least 1 row was affected.';
      $_SESSION['email'] = $email;
      $_SESSION['senha'] = $senha;
      $_SESSION['userType'] = "empresa";
      header('Location: index.php');
    } else{
      // echo 'Failure: 0 rows were affected.';
      unset($_SESSION['email']);
      unset($_SESSION['senha']);
      header('Location: login.php');
    }

  } else {
    header('Location: login.php');
  }

?>
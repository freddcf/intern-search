<?php
include "connect.php";
$candidato = $_SESSION['nome'];

if (isset($_FILES['arquivo']) & isset($_POST['getEmpresa']) & isset($_POST['getCargo']))
{
  $arquivo = $_FILES['arquivo'];
  $empresa = $_POST['getEmpresa'];
  $cargo = $_POST['getCargo'];
  $pasta = "curriculos/";
  $nomeDoArquivo = $arquivo['name'];
  $novoNomeDoArquivo = uniqid();
  $extensao = strtolower(pathinfo($nomeDoArquivo, PATHINFO_EXTENSION));

  if ($arquivo['error']){
    echo "<script>alert('ERROR');</script>";
    header('Location: mural.php');
  }else if($arquivo['size'] > 10485760){
    echo "<script>alert('ERROR: Só podem ser enviados arquivos em PDF de até 10MB');</script>";
    header('Location: mural.php');
  }else if($extensao != "pdf") {
    echo "<script>alert('ERROR: Só podem ser enviados arquivos em PDF de até 10MB');</script>";
    header('Location: mural.php');
  } else {
    $path = $pasta . $novoNomeDoArquivo . "." . $extensao;
    $aprovado = move_uploaded_file($arquivo["tmp_name"], $path);

    if ($aprovado) {
      $query_check = "SELECT * FROM curriculo_upload WHERE nome = '$nomeDoArquivo' and empresa = '$empresa' and cargo = '$cargo' and candidato = '$candidato'";
      $result_check = $conn->prepare($query_check);
      $result_check->execute();
      $affectedCheckRows = $result_check->rowCount();

      
      if ($affectedCheckRows > 0){
        echo "<script>alert('Não é permitido reenvio de arquivos');</script>";
        header('Location: mural.php');
        echo "aaaaaaaaaaaaaaaa";
      } else {
        $query_file = "INSERT INTO curriculo_upload (nome, path, empresa, cargo, candidato) VALUES ('$nomeDoArquivo', '$path', '$empresa', '$cargo', '$candidato')";
        $result_file = $conn->prepare($query_file);
        $result_file->execute();
        if(!$result_file){
          header('Location: mural.php');
          echo "<script>alert('ERROR');</script>";
          exit;
        }
        echo "<script>alert('Arquivo enviado com sucesso');</script>";
      }
    } else {
      echo "<script>alert('Falha ao enviar arquivo');</script>";
    }
  }
}

$query_anuncio  = "SELECT * FROM anuncio";
$result_anuncio = $conn->query($query_anuncio);
?>
<?php
session_start();
include "connect.php";

$empresa = $_SESSION['nome'];

$funcao = isset($_POST['funcao']) ? $_POST['funcao'] : "";
$estado = isset($_POST['estados']) ? $_POST['estados'] : "";
$municipio = isset($_POST['municipios']) ? $_POST['municipios'] : "";
$localizacao = $municipio . ", " . $estado;
$descricao = isset($_POST['descricao']) ? $_POST['descricao'] : "";
$periodo = isset($_POST['periodo']) ? $_POST['periodo'] : "";
$pagamento = isset($_POST['pagamento']) ? $_POST['pagamento'] : "";
$horaEntrada = isset($_POST['horaEntrada']) ? $_POST['horaEntrada'] : "";
$numVagas = isset($_POST['numVagas']) ? $_POST['numVagas'] : "";

$query_anuncio = "INSERT INTO anuncio (cargo, empresa, localizacao, jornada, pagamento, horaEntrada, descricao, numVagas) VALUES ('$funcao','$empresa','$localizacao','$periodo','$pagamento','$horaEntrada','$descricao','$numVagas')";
$result_anuncio = $conn->prepare($query_anuncio);
$affected = $result_anuncio->execute();

if($affected > 0){
  header('Location: anunciar.php');
}


?>
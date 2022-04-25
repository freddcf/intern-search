<?php

include_once "connect.php";

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

if(!empty($id)){
  $query_usuario  = "SELECT * FROM anuncio WHERE id =:id LIMIT 1";
  $result_usuario  = $conn->prepare($query_usuario);
  $result_usuario->bindParam(':id', $id);
  $result_usuario->execute();

  $json_array = array();

  while ($data = $result_usuario->fetch(PDO::FETCH_ASSOC)){
    $json_array = $data;
  }

  $retorna = ['erro' => false, 'data' => $json_array];
  echo json_encode($retorna);
} 

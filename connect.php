<?php

$servername = "mysql:host=localhost;dbname=intern_search_db";
$username = "root";
$password = "";

// Create connection
try {
    $conn = new PDO($servername, $username, $password);
} catch (PDOException $ex) {
    echo 'Erro: '.$ex->getMessage();
}

?>
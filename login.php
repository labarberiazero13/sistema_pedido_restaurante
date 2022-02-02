<?php
    $email = $_POST['email'];
    $senha = $_POST ['senha'];

    $servername = "localhost";
    $username = "root";
    $password = "";

try {
  $conn = new PDO("mysql:host=$servername;dbname=sistema", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Conectado com sucesso";
} catch(PDOException $e) {
  echo "Falha na conexão" . $e->getMessage();
}

?>
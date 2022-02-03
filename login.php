<?php
    $email = $_POST['email'];
    $senha = $_POST ['senha'];
// conexao BD//
    $servername = "localhost";
    $username = "root";
    $password = "";

try {
  $conn = new PDO("mysql:host=$servername;dbname=sistema", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 // echo "Conectado com sucesso";
  $stmt = $conn->prepare("SELECT codigo FROM tbusuario WHERE email=:email AND senha=:senha);
  $stmt->execute();

  // set the resulting array to associative
  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
  foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
    echo $v;
  }
} catch(PDOException $e) {
  echo "Falha na conexão" . $e->getMessage();
}
$conn = null;
//verificar dados do banco de dados//

?>
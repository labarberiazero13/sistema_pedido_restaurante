<?php
    if (count($_POST) > 0) {
//pegando valores do formulário
    $email = $_POST['email'];
    $senha = $_POST ['senha'];
// conexao BD//
    $servername = "localhost";
    $username = "root";
    $password = "";

try {
  $conn = new PDO("mysql:host=$servername;dbname=sistema", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//echo "Conectado com sucesso";//

//verificando dados do usuário//
  $stmt = $conn->prepare("SELECT codigo FROM tbusuario WHERE email=:email AND senha=md5(:senha)");
  $stmt->bindParam(':email', $email, PDO::PARAM_STR);
  $stmt->bindParam(':senha', $senha, PDO::PARAM_STR);
  $stmt->execute();

  $result = $stmt->fetchALL();
  $qtd_usuarios = count($result);
  if($qtd_usuarios == 1){
    //TODO substituindo o redicionamento//
    $resultado["msg"] =  "Usuário encontrado!";
    $resultado["cod"] = 1;
  } else if ($qtd_usuarios == 0){
    $resultado["msg"] =  "E-mail e senha não conferem!";
    $resultado["cod"] = 0;
  }
  }
      catch(PDOException $e) {
        echo "Falha na conexão" . $e->getMessage();
    }
    $conn = null;
}  
   include("index.php");
?>
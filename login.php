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
  $consulta = $conn->prepare("SELECT codigo FROM tbusuario WHERE email=:email AND senha=md5(:senha)");
  $consulta->bindParam(':email', $email, PDO::PARAM_STR);
  $consulta->bindParam(':senha', $senha, PDO::PARAM_STR);
  $consulta->execute();

  $r = $consulta->fetchALL();
  $qtd_usuarios = count($r);
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
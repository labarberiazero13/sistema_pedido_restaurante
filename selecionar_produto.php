<?php

try{
    include("conexao_bd.php")
    //pegando os produtos no BD//
    $consulta = $conn->prepare("SELECT * FROM produtos");
    $consulta->execute();

    $produtos = $consulta->fetchALL();

}
catch(PDOException $e) {
   $resultado["msg"] = "Erro ao inserir no banco de dados:" . $e->getMessage();
   $resultado["cod"] = 0;
   $resultado["style"] = "alert-danger";
}
$conn = null;

?>
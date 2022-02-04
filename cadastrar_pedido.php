<?php
    if (count($_POST) > 0){
        //valores do formulário
        $nome = $_POST['nome_produto'];
        $qtd = $_POST['qtd_produto'];
        $obs = $_POST['obs_produto'];
        $preco = $_POST['preco_produto'];
        //codigo do usuário

try {
    include("conexao_bd.php");
//echo "Conectado com sucesso";//

//verificando dados do usuário//
    $sql = "INSERT INTO item_pedido 
    (cod_usuario, nome_produto, observacao, preco_und, quantidade) 
    VALUES (?,?,?,?,?)";
    $stmt= $conn->prepare($sql);
 //codigo do usuário
    $stmt->execute([null, $nome, $obs, $preco, $qtd]);

    $resultado["msg"] =  "Item inserido com sucesso!";
    $resultado["cod"] = 1;
    $resultado["style"] = "alert-success";
  
}
catch(PDOException $e) {
    $resultado["msg"] = "Inserção no banco de dados falhou:" . $e->getMessage();
    $resultado["cod"] = 0;
    $resultado["style"] = "alert-danger";
}
    $conn = null;
}
    include("pedidos.php");
?>
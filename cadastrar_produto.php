<?php
    if (count($_POST) > 0){
        //valores do formulário
        $nome = $_POST['nome_produto'];
        $categoria = $_POST['categoria_produto'];
        $valor = $_POST['valor_produto'];
        $foto = $_POST['foto_produto'];
        $info = $_POST['info_produto'];

    try {
        include("conexao_bd.php");
        
        
        //verificando dados do usuário//
        $sql = "INSERT INTO produtos 
        (nome, categoria, valor, foto, info_adicional, codigo_usuario) 
        VALUES (?,?,?,?,?,?)";
        $stmt= $conn->prepare($sql);
        //codigo do usuário
        $stmt->execute([$nome, $categoria, $valor, $foto, $info, null]);

         //pegando os produtos no BD//
        $consulta = $conn->prepare("SELECT * FROM produtos");
        $consulta->execute();

        $resultado["produtos"] = $consulta->fetchALL();
        echo "<pre>";
        print_r($resultado["produtos"]);
        echo "</pre>";
        exit;

        $resultado["msg"] =  "Item inserido com sucesso!";
        $resultado["cod"] = 1;
        $resultado["style"] = "alert-success";
          
    }
    catch(PDOException $e) {
        $resultado["msg"] = "Erro de banco de dados:" . $e->getMessage();
        $resultado["cod"] = 0;
        $resultado["style"] = "alert-danger";
    }
    $conn = null;
    }
   
    include("produtos.php");
?>
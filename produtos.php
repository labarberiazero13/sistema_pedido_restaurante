<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="./style/styleProduto.css">
    <title>Produto</title>
</head>
<body>
<div class="container">
    <form action="cadastrar_produto.php" method="POST">
    <h2>Pedidos</h2>
    <fieldset>            
            <br>
            <div class="form-group">
                <label for="nome_produto">Nome do produto:</label>
                <input type="text" required class="form-control" id="nome_produto" aria-describedby="nomeHelp" name="nome_produto" placeholder="Digite o produto">
            </div>
            <div class="form-group">
                <label for="categoria_produto">Categoria:</label>
                <input type="text" required class="form-control" id="categoria_produto" aria-describedby="nomeHelp" name="categoria_produto" placeholder="Digite a categoria do produto">
            </div>
            <div class="form-group">
                <label for="valor_produto">Valor unitátio (R$):</label>
                <input type="number" required step=".01" class="form-control" id="valor_produto" aria-describedby="nomeHelp" name="valor_produto" placeholder="Digite o valor do produto">
            </div>
            <div class="form-group">
                <label for="foto_produto">Foto:</label>
                <input type="file" class="form-control" name="foto_produto" id="foto_produto">
            </div>
            <div class="form-group">
                <label for="info_produto">Informações adicionais:</label>
                <input type="text" class="form-control" id="info_produto" aria-describedby="nomeHelp" name="info_produto" placeholder="Digite as informações do produto">
            </div>
    </fieldset> 
    <br>
    <button type="submit" class="btn btn-primary">Adicionar Produto</button>    
            <?php if( isset($resultado) ): ?>
                    <div class="alert <?=$resultado["style"]?>">
                        <?php echo $resultado["msg"]; ?> 
                    </div>
            <?php endif; ?>        
    </form>
    <br>
    <?php include("selecionar_produto.php"); ?>
    <table class="table">
        <tr>
            <td>Cód.</td>
            <td>Foto</td>
            <td>Nome</td>
            <td>Categoria</td>
            <td>Valor</td>
            <td>Info Adicional</td>
            <td>Data/Hora</td>
        </tr>
        <?php foreach($produtos as $p): ?>
        <tr>
            <td><?= $p["codigo"]; ?></td>
            <td><?= $p["foto"]; ?></td>
            <td><?= $p["nome"]; ?></td>
            <td><?= $p["categoria"]; ?></td>
            <td><?= $p["valor"]; ?></td>
            <td><?= $p["info_adicional"]; ?></td>
            <td><?= $p["data_hora"]; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>
<br><br><br><br><br><br><br><br><br><br>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</html>
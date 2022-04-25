<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Nutrientes</title>
    <?php include 'View/includes/css_config.php';?>
      <style>
        label, input { display: block;}
        body{background-color: #FFF1BD;}
        form{background-color: white;}
      </style>
    
</head>
<body>
    <header>
        <?php include 'View/includes/cabecalho_cadastro.php'?>
    </header>
    <br>
    <div class="container">
    <form class="border p-5" action="nutriente/save" method="post">
        <fieldset >
            <legend>Cadastro Nutrientes</legend>
            <div class="form-group">
                <label for="descricao">Descrição:</label>
                <input class="form-control" id="descricao" name="descricao" type="text" />
                <br>
                
                <label for="quantidade">Quantidade:</label>
                <input class="form-control" id="quantidade" name="quantidade" type="number" step="0.01" />
                <br>
                
                <label for="id_categoria_nutriente">Categoria do Nutriente: </label>
                <select name="id_categoria_nutriente" id="id_categoria_nutriente">
                    <?php foreach($model->lista_categoria as $categoria_nutriente): ?>
                        <option value="<?=$categoria_nutriente->id?>">
                            <?=$categoria_nutriente->descricao?>
                        </option>
                    <?php endforeach ?>
                </select>
                <br><br>

                <label for="id_alimento">Alimento: </label>
                <select name="id_alimento" id="id_alimento">
                    
                    <?php foreach($model->lista_alimentos as $alimento): ?>
                        <option value="<?=$alimento->id?>">
                            <?=$alimento->nome?>
                        </option>
                    <?php endforeach ?>
                </select>
                <br><br>

                
                <button type="submit" class="btn btn-primary mb-3">Cadastrar Nutriente</button>
            </div>
        </fieldset>            
    </form>
    </div>
  
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
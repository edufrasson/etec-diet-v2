<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Refeição Alimento Assoc</title>
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
    <form class="border p-5" action="/refeicao_alimento/save" method="post">
        <fieldset>
            <legend>Cadastro Refeição Alimento Assoc</legend>
            <div class="form-group">
                <label for="id_refeicao">Refeicao:</label>
                <select name="id_refeicao" id="id_refeicao">                    
                    <?php foreach($model->lista_refeicoes as $refeicoes): ?>
                        <option value="<?=$refeicoes->id?>">
                            <?=$refeicoes->descricao?>
                        </option>
                    <?php endforeach ?>
                </select>
                <br>  
                <label for="id_alimento">Alimento:</label>              
                <select name="id_alimento" id="id_alimento">                    
                    <?php foreach($model->lista_alimentos as $alimento): ?>
                        <option value="<?=$alimento->id?>">
                            <?=$alimento->nome?>
                        </option>
                    <?php endforeach ?>
                </select>
                
                <label for="quantidade">Quantidade:</label>
                <input class="form-control" id="quantidade" name="quantidade" type="number" min="1" />
                <br>               
                   
                <button type="submit" class="btn btn-primary mb-3">Cadastrar Refeicao Alimento Assoc</button>
            </div>
        </fieldset>            
    </form>
    </div>
  
    <?php include 'View/includes/js_config.php';?>
    
</body>
</html>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../View/includes/virtual-select/virtual-select.min.css">
    <title>Cadastro de Refeições</title>
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
    <form class="border p-5" action="/refeicao/save" method="post">
        <fieldset >
            <legend>Cadastro Refeições</legend>
            <div class="form-group">
                <label for="descricao">Descrição:</label>
                <input class="form-control" id="descricao" name="descricao" type="text" />
                <br>
                
                <label for="horario">Horario:</label>
                <select id="horario" name="horario">
                    <option value="Café da Manhã">Café da Manhã</option>
                    <option value="Almoço">Almoço</option>
                    <option value="Jantar">Jantar</option>
                    <option value="Café da Tarde">Café da Tarde</option>
                </select>
                <br>
                               
                <label for="id_dieta">Dieta: </label>
                <select name="id_dieta" id="id_dieta">
                   
                    <?php foreach($model->lista_dietas as $dietas): ?>
                        <option value="<?=$dietas->id?>">
                            <?=$dietas->descricao?>
                        </option>
                    <?php endforeach ?>
                </select>
                <br><br>   
                
                <label for="id_alimentos">Alimentos: </label>
                <select class="native-select" multiple search-bar="true"name="id_alimentos" id="id_alimentos">                   
                    <?php foreach($model->lista_alimentos as $alimentos): ?>
                        <option value="<?=$alimentos->id?>"><?= $alimentos->nome ?></option>
                    <?php endforeach ?>
                </select>
                <br><br>
                <button type="submit" class="btn btn-primary mb-3">Cadastrar Refeicao</button>
            </div>
        </fieldset>            
    </form>
    
    </div>
  
    <?php include 'View/includes/js_config.php';?>
    <script src="../../../View/includes/virtual-select/virutal-select.min.js"></script>
    <script>
        VirtualSelect.init({
            ele: '#id_alimentos'
        });         
       
    </script>
</body>
</html>
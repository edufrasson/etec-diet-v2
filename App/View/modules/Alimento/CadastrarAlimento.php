<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="View/css/forms.css">
    <title>Cadastro de Alimentos</title>
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
        <form class="border p-5" action="/alimento/save" method="post">
        <!--Action: rota ou arquivo que os dados serão enviados.
         o método de envio desses dados é definido no method (POST, GET)-->    
            <fieldset>
                <legend>Cadastro Alimentos</legend>
                <div class="form-group">
                    <label for="nome">Nome:</label>
                    <input class="form-control" id="nome" name="nome" type="text" />
                    <br>
                    
                    <label for="porcao">Porção:</label>
                    <input class="form-control" id="porcao" name="porcao" type="number" step="1" />
                    <br>

                    <label for="caloria">Quantidade de caloria:</label>
                    <input class="form-control" id="caloria" name="caloria" type="number" step="1" />
                    <br>
                    
                    <label for="id_categoria_alimento">Categoria do alimento: </label>
                    <select name="id_categoria_alimento" id="id_categoria_alimento">
                        
                        <?php foreach($model->lista_categorias as $categoria_alimento): ?>
                            <option value="<?=$categoria_alimento->id?>"><?=$categoria_alimento->descricao?></option>
                        <?php endforeach ?>
                    </select>
                    <br><br>
                    <hr class="hr">

                    <h4>Nutrientes</h4>

                    <label for="qnt_carboidrato">Carboidratos:</label>
                    <input class="form-control" id="qnt_carboidrato" name="qnt_carboidrato" type="number"/>
                    <br>

                    <label for="qnt_proteina">Proteínas:</label>
                    <input class="form-control" id="qnt_proteina" name="qnt_proteina" type="number"/>
                    <br>  
                    
                    <label for="qnt_lipideo">Lipídeos:</label>
                    <input class="form-control" id="qnt_lipideo" name="qnt_lipideo" type="number"/>
                    <br>

                    <label for="qnt_fibra">Fibras:</label>
                    <input class="form-control" id="qnt_fibra" name="qnt_fibra" type="number"/>
                    <br>

                    <button type="submit" class="btn btn-primary mb-3">Cadastrar Alimento</button>
                </div>
            </fieldset>            
        </form>
    </div>
  
    <?php include 'View/includes/js_config.php';?>
    
</body>
</html>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Pacientes</title>
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
    <form class="border p-5" action="paciente/save" method="post">
        <fieldset >
            <legend>Cadastro de Pacientes</legend>
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input class="form-control" id="nome" name="nome" type="text" />                
                <br>

                <label for="peso">Peso:</label>
                <input class="form-control" id="peso" name="peso" type="number" />                
                <br>

                <label for="altura">Altura:</label>
                <input class="form-control" id="altura" name="altura" type="number" step="0.01"/>                
                <br>

                <label for="sexo">Sexo:</label>
                <div class="form-check">
                <input value="M"class="form-check-input" id="masculino" name="sexo" type="radio">Masculino</input><br>
                <input value="F"class="form-check-input" id="masculino" name="sexo" type="radio">Feminino</input>           
                </div>                
                <br>

                <label for="data_nascimento">Data de Nascimento:</label>
                <input class="form-control" id="data_nascimento" name="data_nascimento" type="date" />                
                <br>

                <button type="submit" class="btn btn-primary mb-3">Cadastrar Paciente</button>
            </div>
        </fieldset>            
    </form>
    </div>
  
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
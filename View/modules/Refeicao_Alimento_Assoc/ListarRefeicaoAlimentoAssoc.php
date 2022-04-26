<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="View/css/listas.css">
    <link rel="stylesheet" href="View/css/assoc.css">
    <title>Lista de Refeições e Alimentos</title>
    <?php include 'View/includes/css_config.php' ?>
</head>
<body>
    <header>
        <?php include 'View/includes/cabecalho_view.php'?>
    </header>
    <main>
        <div class="container">
            <?php foreach($arr_refeicoes as $refeicao): ?>       
            <div class="card-refeicao">
                <div class="title-container flex">
                    <h3><?= $refeicao->descricao ?></h3>                    
                </div>
                <div class="content-container">
                    <table class="table">
                        <thead>
                            <th scope="col">Alimento</th>
                            <th scope="col">Quantidade</th>
                            <th scope="col"></th>
                        </thead>
                        <tbody>
                            <?php foreach($refeicao->lista_alimentos as $alimentos): ?>


                                <td><?=$alimentos['alimento'] ?></td>
                                <td><?=$alimentos['quantidade'] ?>g</td> 
                            <?php endforeach?>
                        </tbody>                        
                    </table>
                </div>
            </div>
            <?php endforeach?>
        </div>
    </main>
</body>
</html>
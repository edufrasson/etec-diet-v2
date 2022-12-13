<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="View/css/listas.css">
    <link rel="stylesheet" href="View/css/cards.css">
    <title>Lista de Refeições e Alimentos</title>
    <?php include 'View/includes/css_config.php' ?>
</head>
<body>
    <header>
        <?php include 'View/includes/cabecalho_view.php'?>
    </header>
    <main>
        <div class="container d-flex">
            <?php foreach($arr_refeicoes as $refeicao): ?>       
                <div class="card-refeicao">
                    <div class="title-container flex justify-content-between p-2">
                        <h6><?= $refeicao->descricao ?></h6>                    
                        <h6>kcal: <?= $refeicao->calorias_totais ?></h6>                    
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
                                    <tr>
                                        <td><?=$alimentos->alimento ?></td>
                                        <td><?=$alimentos->quantidade ?>g</td>
                                    </tr> 
                                <?php endforeach?>
                            </tbody>                        
                        </table>
                    </div>
                </div>
            <?php endforeach?>
        </div>
    </main>
    <?php include 'View/includes/js_config.php';?>
   
</body>
</html>
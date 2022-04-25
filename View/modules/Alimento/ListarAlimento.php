<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="View/css/listas.css">
    <title>Lista de Alimentos</title>
    <?php include 'View/includes/css_config.php' ?>
    
</head>
<body>
    <header>
        <?php include 'View/includes/cabecalho_view.php'?>
    </header>
    <main>
        <div class="container">       
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Porção</th>
                        <th scope="col">Caloria (kcal)</th>
                        <th scope="col">Categoria de Alimento</th>
                        <th scope="col">Ações </th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($arr_alimentos as $alimento): ?>
                    <tr>
                        <th scope="row"><?=$alimento->id?></th>
                        <td><?=$alimento->nome?></td>
                        <td><?=$alimento->porcao?></td>
                        <td><?=$alimento->caloria?></td>
                        <td><?=$alimento->categoria?></td>
                        <td class="actions">
                            <a href="/ver?id=<?= $alimento->id?>"> 
                                <i class='bx bx-edit '></i>
                            </a> 

                            <a href="/deletar?id=<?= $alimento->id?>"> 
                                <i class='bx bx-trash text-danger'></i>
                            </a> 
                        </td>
                    </tr>  
                <?php endforeach?>                 
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>
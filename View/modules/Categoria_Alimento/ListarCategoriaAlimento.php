<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="View/css/listas.css">
    <title>Lista de Categoria de Alimentos</title>
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
                        <th scope="col">Descrição</th>
                        <th scope="col">Ações</th>                         
                    </tr>
                </thead>
                <tbody>
                <?php foreach($arr_categoria_alimentos as $categoria_alimento): ?>
                    <tr>
                        <th scope="row"><?=$categoria_alimento->id?></th>
                        <td><?=$categoria_alimento->descricao?></td>
                        <td class="actions">
                            <a href="/ver?id=<?= $categoria_alimento->id?>"> 
                                <i class='bx bx-edit '></i>
                            </a> 

                            <a href="/deletar?id=<?= $categoria_alimento->id?>"> 
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
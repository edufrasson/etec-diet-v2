<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="View/css/listas.css">
    <title>Lista de Alimentos</title>
    <?php include 'View/includes/css_config.php' ?>
    <style> 
        .modal-content{
             background-color:#146356 ;
        }

        .modal-body{
             background-color:white;
        }

        .modal-footer{
             background-color:white;
        }
    </style>
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
                        <th scope="col">Nutrientes</th>
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
                        <td>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop<?=$alimento->id?>">
                                Ver
                            </button>
                        </td>
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

            <?php foreach($arr_alimentos as $alimento): ?>
                <!-- Modal -->
                    <div class="modal fade" id="staticBackdrop<?=$alimento->id?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title text-white" id="staticBackdropLabel"> <?=$alimento->nome?></h5>
                                    <h6 class="modal-title text-white" id="staticBackdropLabel"> Porção: <?=$alimento->porcao?> gramas</h5>                                   
                                </div>
                                <div class="modal-body">
                                    <table class="table">
                                        <thead>
                                            <th>Carboidrato</th>
                                            <th>Proteina</th>
                                            <th>Gordura</th>
                                            <th>Fibra</th>
                                        </thead>
                                        <tbody>
                                            <?php foreach($alimento->lista_nutrientes as $nutriente):?>
                                                <tr>
                                                    <td><?= $nutriente->carboidrato?>g</td>
                                                    <td><?= $nutriente->proteina?>g</td>
                                                    <td><?= $nutriente->lipideo?>g</td>
                                                    <td><?= $nutriente->fibra?>g</td>
                                                </tr>    
                                            <?php endforeach?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Fechar</button>                                
                                </div>
                            </div>
                        </div>
                    </div>   
                <!-- /Modal -->          
            <?php endforeach?>  
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
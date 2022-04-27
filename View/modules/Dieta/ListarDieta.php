<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="View/css/listas.css">
    <title>Lista de Dietas</title>
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
                        <th scope="col">Data de Inicio</th>
                        <th scope="col">Data de Fim</th>
                        <th scope="col">Nome do Paciente</th>
                        <th scope="col">Ações </th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($arr_dietas as $dieta): ?>
                    <tr>
                        <th scope="row"><?=$dieta->id?></th>
                        <td><?=$dieta->descricao?></td>
                        <td><?=$dieta->data_inicio?></td>
                        <td><?=$dieta->data_fim?></td>
                        <td><?=$dieta->nome_paciente?></td>
                        <td class="actions">
                            <a href="/ver?id=<?= $dieta->id?>"> 
                                <i class='bx bx-edit '></i>
                            </a> 

                            <a href="/deletar?id=<?= $dieta->id?>"> 
                                <i class='bx bx-trash text-danger'></i>
                            </a> 
                        </td>
                    </tr>  
                <?php endforeach?>                 
                </tbody>
            </table>
        </div>
    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
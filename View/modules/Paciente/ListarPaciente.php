<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="View/css/listas.css">
    <title>Lista de Pacientes</title>
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
                        <th scope="col">Data de Nascimento</th>
                        <th scope="col">Peso</th>
                        <th scope="col">Altura</th>
                        <th scope="col">Sexo</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($arr_pacientes as $paciente): ?>
                    <tr>
                        <th scope="row"><?=$paciente->id?></th>
                        <td><?=$paciente->nome?></td>
                        <td><?=$paciente->data_nascimento?></td>
                        <td><?=$paciente->peso?></td>
                        <td><?=$paciente->altura?></td>
                        <td><?=$paciente->sexo?></td>
                        <td class="actions">
                            <a href="/ver?id=<?= $paciente->id?>"> 
                                <i class='bx bx-edit '></i>
                            </a> 

                            <a href="/deletar?id=<?= $paciente->id?>"> 
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
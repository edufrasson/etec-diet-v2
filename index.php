<?php

// Include

/**
 * Serve para transitar entre as camadas, você só conseguirá utilizar
 * um método de uma camada se você inclui-la no seu arquivo
 */

include 'Autoload.php';

$uri_parse = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);

// parse_url

/**
 * Função que recebe um parâmetro da uri (endereço completo) 
 * e o componente que você deseja, no caso, o PATH (caminho):
 * exemplo(arquivo.php, /rota)
 */

switch($uri_parse){   

    // Operador de Resolução de Escopo (::)
    /**
     * Acessa um método de uma classe
     */

    // Rotas para Categoria_Alimento 
    case '/categoria_alimento':
        CategoriaAlimentoController::index();
    break;

    case '/categoria_alimento/form';
        CategoriaAlimentoController::form();
    break;
    
    case '/categoria_alimento/save':
        CategoriaAlimentoController::save();
    break;
    
    // Rotas para Categoria_Nutriente
    case '/categoria_nutriente':
        CategoriaNutrienteController::index();
    break;

    case '/categoria_nutriente/form';
        CategoriaNutrienteController::form();
    break;
    
    case '/categoria_nutriente/save':
        CategoriaNutrienteController::save();
    break;  
    
    // Rotas para Paciente
    case '/paciente':
        PacienteController::index();
    break;

    case '/paciente/form':
        PacienteController::form();
    break;    
    
    case '/paciente/save':
        PacienteController::save();
    break;    

    // Rotas para Dieta
    case '/dieta':
        DietaController::index();
    break;

    case '/dieta/form':
        DietaController::form();
    break; 

    case '/dieta/save':
        DietaController::save();
    break;    

    // Rotas para Alimento 
    case '/alimento':
        AlimentoController::index();
    break;

    case '/alimento/form':
        AlimentoController::form();
    break; 

    case '/alimento/save':
        AlimentoController::save();
    break;
    // Rotas para Nutriente
    case '/nutriente':
        NutrienteController::index();
    break;

    case '/nutriente/form':
        NutrienteController::form();
    break; 

    case '/nutriente/save':
        NutrienteController::save();
    break;
    
    // Rotas para Refeicao
    case '/refeicao':
        RefeicaoController::index();
    break; 

    case '/refeicao/form':
        RefeicaoController::form();
    break;    

    case '/refeicao/save':
        RefeicaoController::save();
    break;
    
    // Rotas para Refeicao_Alimento_Assoc 
    case '/refeicao_alimento':
        RefeicaoAlimentoAssocController::index();
    break; 

    case '/refeicao_alimento/form':
        RefeicaoAlimentoAssocController::form();
    break;    

    case '/refeicao_alimento/save':
        RefeicaoAlimentoAssocController::save();
    break; 
    
    case '/cadastros':
        include 'View/cadastros.php';
    break;   

    case '/index':
        include 'View/visualizar.php';
    break;    
     
    default:        
        include 'View/home.php';
    break;
}

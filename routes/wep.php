<?php 
    require_once __DIR__ . '/../app/Http/controllers/HelpdeskController.php';
    require_once __DIR__ . '/../app/Http/Controllers/PortfolioController.php';
   // require_once __DIR__ . '/..';

   // listando em arrays as rotas que vamos criar.
     return[
        'GET' => [
            'portfolio' => [new PortfolioController(), 'index'],
            'helpdesk' => [new HelpdeskController(),'index'],
            'jogos' => [],
            'notas' => [],
            'idade' => []

        ],
        [
            'post' => [
                'helpdesk' => [new HelpdeskController(), '']
            ]        ]
     ];       
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
     
?>
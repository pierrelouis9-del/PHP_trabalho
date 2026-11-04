<?php
//require_once __DIR__ . '/../app/Http/controllers/HelpdeskController.php';
require __DIR__ . '/../app/Http/Controllers/PortfolioController.php';
require __DIR__ . "/../app/Http/Controllers/HelpdeskController.php";
require __DIR__ . "/../app/Http/Controllers/idadeController.php";
require __DIR__ . "/../app/Http/Controllers/jogosController.php";
require __DIR__ . "/../app/Http/Controllers/loginController.php";
require __DIR__ . "/../app/Http/Controllers/notasController.php";
require __DIR__ . "/../app/Http/Controllers/poo2Controller.php";
// require_once __DIR__ . '/..';

// listando em arrays as rotas que vamos criar.
return [
    'GET' => [
        'portfolio' => [new PortfolioController(), 'index'],
          'helpdesk' => [new HelpdeskController(),'index'],
          'jogos' => [new jogosController(),'index'],
          'notas' => [new notasController(),'index'],
          'idade' => [new idadeController(),'index'],
          'login' => [new loginController(),'index'],
          'poo2'  => [new pooController(),'index']   
    ],

   'POST' => [
      // 'helpdesk' => [new HelpdeskController(),'index'],
       'jogos' => [new jogosController(),'index'],
       'notas' => [new notasController(),'index'],
       'idade' => [new idadeController(),'index'],
       'login' => [new loginController(),'index'],
      // 'poo2'  => [new pooController(),'index']  
   ],
];
?>
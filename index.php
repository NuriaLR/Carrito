<?php

require_once 'autoload.php';
require_once 'Router.php';
require_once 'controller/AuthController.php';
require_once 'controller/IndexController.php';
require_once 'controller/JugueteController.php';
require_once 'controller/CarritoController.php';
require_once 'controller/TicketController.php';

session_start();

$route = new Router();
$route->get('/',[IndexController::class,'index'])

      ->get('/login', [AuthController::class, 'login'])
      ->get('/register', [AuthController::class, 'register'])
      ->post('/doRegister', [AuthController::class, 'doRegister'])
      ->post('/doLogin', [AuthController::class, 'doLogin'])
      ->get('/home', [AuthController::class, 'home'])
      ->get('/juguetes', [AuthController::class, 'juguete'])
      ->get('/logout', [AuthController::class, 'logout'])      

      ->get('/create',[JugueteController::class, 'create'])
      ->post('/save',[JugueteController::class, 'save'])
      ->get('/edit-producto',[JugueteController::class, 'edit'])
      ->post('/update-producto',[JugueteController::class, 'update'])
      ->get('/destroy-producto',[JugueteController::class, 'destroy'])
      
      ->get('/ver-carrito',[CarritoController::class, 'index'])
      ->post('/comprar-producto',[CarritoController::class, 'create'])
      ->get('/destroy-compras',[CarritoController::class, 'destroy'])

      
      ->get('/historial-productos',[TicketController::class, 'create'])
      ->get('/mis-compras',[TicketController::class, 'index'])
      ->get('/comprados',[TicketController::class, 'indexAdmin'])
      
      ->get ('/index-juguetes', [JugueteController::class, 'index']);

$route->resolver_ruta($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
?>
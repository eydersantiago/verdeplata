<?php 
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../includes/app.php';


use MVC\Router;
use Controllers\ArticuloController;
use Controllers\VendedorController;
use Controllers\PaginasController;
use Controllers\LoginController;

$router = new Router();

$router->get('/admin', [ArticuloController::class, 'index']);
$router->get('/articulos/crear', [ArticuloController::class, 'crear']);
$router->post('/articulos/crear', [ArticuloController::class, 'crear']);
$router->get('/articulos/actualizar', [ArticuloController::class, 'actualizar']);
$router->post('/articulos/actualizar', [ArticuloController::class, 'actualizar']);
$router->post('/articulos/eliminar', [ArticuloController::class, 'eliminar']);

$router->get('/vendedores', [VendedorController::class, 'index']);
$router->get('/vendedores/crear', [VendedorController::class, 'crear']);
$router->post('/vendedores/crear', [VendedorController::class, 'crear']);
$router->get('/vendedores/actualizar', [VendedorController::class, 'actualizar']);
$router->post('/vendedores/actualizar', [VendedorController::class, 'actualizar']);
$router->post('/vendedores/eliminar', [VendedorController::class, 'eliminar']);

$router->get('/', [PaginasController::class, 'index']);
$router->get('/nosotros', [PaginasController::class, 'nosotros']);
$router->get('/articulos', [PaginasController::class, 'articulos']);
$router->get('/articulo', [PaginasController::class, 'articulo']);
$router->get('/ubicanos', [PaginasController::class, 'ubicanos']);
$router->get('/entrada', [PaginasController::class, 'entrada']);
$router->get('/contacto', [PaginasController::class, 'contacto']);
$router->post('/contacto', [PaginasController::class, 'contacto']);

$router->get('/login', [LoginController::class, 'login']);
$router->post('/login', [LoginController::class, 'login']);
$router->get('/logout', [LoginController::class, 'logout']);


// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();
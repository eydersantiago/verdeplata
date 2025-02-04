<?php


//archivo que manda a llamar funciones, bd y clases
require 'funciones.php';
require 'config/database.php';
require __DIR__ . '/../vendor/autoload.php'; // Composer

use App\Articulo;   

$articulo = new Articulo;

var_dump($articulo);
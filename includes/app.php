<?php


use Model\ActiveRecord;
require __DIR__ . '/../vendor/autoload.php'; // Composer
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ );
$dotenv->safeLoad(); 

require 'funciones.php';
require 'config/database.php';


//conectarse a la bd
$db = conectarDB();



ActiveRecord::setDB($db);


// //archivo que manda a llamar funciones, bd y clases
// require 'funciones.php';
// require 'config/database.php';
// require __DIR__ . '/../vendor/autoload.php'; // Composer

// // En app.php, justo después de require __DIR__ . '/../vendor/autoload.php';
// if (!class_exists(\Composer\Autoload\ClassLoader::class)) {
//     echo "No se ha cargado el autoloader de Composer";
//     exit;
// }


// // Conectarnos a la base de datos
// $db = conectarDB();

// use Model\ActiveRecord;   //clase que se encarga de la bd

// ActiveRecord::setDB($db);

// //var_dump($db);

?>
<?php


define('TEMPLATES_URL', __DIR__ . '/templates');
define('FUNCIONES_URL', __DIR__ . 'funciones.php');
define('CARPETA_IMAGENES', __DIR__ . '/../imagenes/');

function incluirTemplate(string $nombre, bool $inicio = false) {
    include TEMPLATES_URL . "/{$nombre}.php";
}

// comprueba si el usuario esta autenticado
function estaAutenticado() : bool {
    session_start();

    $auth = $_SESSION['login'];

    if($auth) {
        return true;
    }
    return false;
}
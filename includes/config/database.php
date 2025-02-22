<?php 

function conectarDB() : mysqli {
    $db = new mysqli(
        $_ENV['DB_HOST'],
        $_ENV['DB_USER'], 
        $_ENV['DB_PASS'], 
        $_ENV['DB_NAME']
    );

    $db->set_charset('utf8');

    if(!$db) {
        echo "Error no se pudo conectar";
        echo "Errno de depuracion: " . mysqli_connect_errno();
        echo "Error de depuracion: " . mysqli_connect_error();
        exit;
    } 

    return $db;
    
}
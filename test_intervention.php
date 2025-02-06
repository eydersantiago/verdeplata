<?php
require __DIR__ . '/vendor/autoload.php';

use Intervention\Image\ImageManagerStatic as Image;

// 1. Verifiquemos si existe la clase:
var_dump(class_exists(Image::class));  // Debería mostrar bool(true)

// 2. Intentemos algo mínimo:
try {
    $image = Image::make(__DIR__ . '/ejemplo.jpg');
    echo "Se logró crear la imagen con Intervention Image\n";
} catch (\Exception $e) {
    echo "Error: " . $e->getMessage();
}

<?php 

namespace Controllers;

use MVC\Router;
use Model\Articulo;
use Model\Vendedor;
use Intervention\Image\ImageManagerStatic as Image;

class ArticuloController  {
    
    public static function index(Router $router) {
        $articulos = Articulo::all();
        $vendedores = Vendedor::all();

        // Muestra mensaje condicional
        $resultado = $_GET['resultado'] ?? null;

        $router->render('articulos/index', [
            'articulos' => $articulos,
            'vendedores' => $vendedores,
            'resultado' => $resultado
        ]);
    }

    public static function crear(Router $router) {

        $errores = Articulo::getErrores();
        $articulo = new Articulo;
        $vendedores = Vendedor::all();

        // Ejecutar el código después de que el usuario envia el formulario
        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            // Crear una nueva instancia con los datos del formulario
            $articulo = new Articulo($_POST['articulo']);

            // Generar un nombre único para la imagen
            $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";


            // Si se subió una imagen, asignar el nombre único al objeto
            if($_FILES['articulo']['tmp_name']['imagen']) {
                $articulo->setImagen($nombreImagen);
            }

            // Validar
            $errores = $articulo->validar();
            if(empty($errores)) {

                // Crear la carpeta para subir imagenes
                if(!is_dir(CARPETA_IMAGENES)) {
                    mkdir(CARPETA_IMAGENES);
                }

                // Guarda la imagen en el servidor
                $image->save(CARPETA_IMAGENES . $nombreImagen);

                // Guarda en la base de datos
                $resultado = $articulo->guardar();

                if($resultado) {
                    header('location: /articulos');
                }
            }
        }

        $router->render('articulos/crear', [
            'errores' => $errores,
            'articulo' => $articulo,
            'vendedores' => $vendedores
        ]);
    }

    public static function actualizar(Router $router) {

        $id = validarORedireccionar('/articulos');

        // Obtener los datos del artículo
        $articulo = Articulo::find($id);

        // Consultar para obtener los vendedores
        $vendedores = Vendedor::all();

        // Arreglo con mensajes de errores
        $errores = Articulo::getErrores();

        
        if($_SERVER['REQUEST_METHOD'] === 'POST') {

                // Asignar los atributos
                $args = $_POST['articulo'];

                $articulo->sincronizar($args);

                // Validación
                $errores = $articulo->validar();

                // Subida de archivos
                // Generar un nombre único
                $nombreImagen = md5( uniqid( rand(), true ) ) . ".jpg";

                if($_FILES['articulo']['tmp_name']['imagen']) {
                    $image = Image::make($_FILES['articulo']['tmp_name']['imagen'])->fit(1600,1200); //redimensionar la imagen, o 800*600
                    $articulo->setImagen($nombreImagen);
                }


                
                if(empty($errores)) {
                    // Almacenar la imagen
                    if($_FILES['articulo']['tmp_name']['imagen']) {
                        $image->save(CARPETA_IMAGENES . $nombreImagen);
                    }

                    // Guarda en la base de datos
                    $resultado = $articulo->guardar();

                    if($resultado) {
                        header('location: /articulos');
                    }
                }

        }

        $router->render('articulos/actualizar', [
            'articulo' => $articulo,
            'vendedores' => $vendedores,
            'errores' => $errores
        ]);
    }

    public static function eliminar(Router $router) {

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $tipo = $_POST['tipo'];

            // peticiones validas
            if(validarTipoContenido($tipo) ) {
                // Leer el id
                $id = $_POST['id'];
                $id = filter_var($id, FILTER_VALIDATE_INT);
    
                // encontrar y eliminar el articulo
                $articulo = Articulo::find($id);
                $resultado = $articulo->eliminar();

                // Redireccionar
                if($resultado) {
                    header('location: /articulos');
                }
            }
        }
    }

}
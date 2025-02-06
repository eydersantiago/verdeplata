<?php 
    // Importar las clases necesarias
    use App\Articulo;
    use App\Vendedor;
    //use Intervention\Image\ImageManagerStatic as Image;

    // Incluir el autoload de Composer y otros archivos necesarios
    require '../../includes/app.php';

    // Verificar autenticación
    estaAutenticado();


    //Crear el objeto
    $articulo = new Articulo;

    // Consultar para obtener los vendedores
    $vendedores = Vendedor::all();

    // Arreglo con mensajes de errores
    $errores = Articulo::getErrores();

   // Ejecutar el código después de que el usuario envia el formulario
  // Ejecutar el código después de que el usuario envía el formulario
    if($_SERVER['REQUEST_METHOD'] === 'POST') {

        // Crear una nueva instancia con los datos del formulario
        $articulo = new Articulo($_POST['articulo']);

        // Generar un nombre único para la imagen
        $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

        // Si se subió una imagen, asignar el nombre único al objeto
        if($_FILES['articulo']['tmp_name']['imagen']) {
            $articulo->setImagen($nombreImagen);
        }

        // Validar los datos del formulario
        $errores = $articulo->validar();

        if(empty($errores)) {
        
            // Crear la carpeta para subir imágenes si no existe
            if(!is_dir(CARPETA_IMAGENES)) {
                mkdir(CARPETA_IMAGENES);
            }

            // Si se subió una imagen, moverla a la carpeta destino
            if($_FILES['articulo']['tmp_name']['imagen']) {
                move_uploaded_file(
                    $_FILES['articulo']['tmp_name']['imagen'], 
                    CARPETA_IMAGENES . $nombreImagen
                );
            }
            
            var_dump($articulo);

            // Guarda en la base de datos
            $articulo->guardar();
        }
}


    incluirTemplate('header');
?>

<main class="contenedor seccion">
        <h1>Crear</h1>

        <a href="/admin" class="boton boton-verde">Regresar</a>

        <?php foreach($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
        <?php endforeach; ?>

        <form class="formulario" method="POST" action="/admin/articulos/crear.php" enctype="multipart/form-data">

            <?php include '../../includes/templates/formulario_articulos.php'; ?>

            <input type="submit" value="Crear Artículo" class="boton boton-verde">
        </form>
        
    </main>

<?php 
    incluirTemplate('footer');
?>
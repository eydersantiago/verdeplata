<?php 

    require '../../includes/app.php';
    use App\Articulo;
    use App\Vendedor;

    // Importar Intervention Image
    use Intervention\Image\ImageManagerStatic as Image;


    //accediendo a la variable de sesión del arreglo session
    estaAutenticado();

    // //limitar el acceso a ciertas páginas si no está autenticado
    // if(!$auth) {
    //     header('Location: /');
    // }

    // Validar la URL por ID válido
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if(!$id) {
        header('Location: /admin');
    }

    // // Base de datos
    // require '../../includes/config/database.php';
    // $db = conectarDB();

    // Obtener los datos de los artículos
    $articulo = Articulo::find($id);

    // Consultar para obtener los vendedores
    $vendedores = Vendedor::all();

    // Arreglo con mensajes de errores
    $errores = Articulo::getErrores();

    // Ejecutar el código después de que el usuario envia el formulario
    if($_SERVER['REQUEST_METHOD'] === 'POST') {

        //Asignar los atributos

        $args = $_POST['articulo'];

        $articulo->sincronizar($args);  

        //validación de los datos
        $errores = $articulo->validar();

        //subida de archivos y generación de nombre único
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

            $articulo->guardar();
        }
    }
    incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h1>Actualizar Artículo</h1>

        <a href="/admin" class="boton boton-verde">Regresar</a>

        <?php foreach($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
        <?php endforeach; ?>

        <form class="formulario" method="POST" enctype="multipart/form-data">

            <?php include '../../includes/templates/formulario_articulos.php'; ?>

            <input type="submit" value="Actualizar Artículo" class="boton boton-verde">
        </form>
        
    </main>

<?php 
    incluirTemplate('footer');
?> 
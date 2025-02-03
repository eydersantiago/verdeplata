<?php
    //importar la conexión
    require 'includes/config/database.php';
    $db = conectarDB();

    //obtener el id
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if(!$id) {
        header('Location: /');
    }

    //consultar para obtener los datos del articulo
    $query = "SELECT * FROM articulos WHERE id = {$id}";


    //obtener resultados
    $resultado = mysqli_query($db, $query);
    $articulo = mysqli_fetch_assoc($resultado);

    //si el id no existe
    if($resultado->num_rows === 0) {
        header('Location: /');
    }

    //esto es un tipo de -console.log- en php
    echo "<pre>";
    var_dump($query);
    echo "</pre>";

    require 'includes/funciones.php';
    incluirTemplate('header');

?>

    <main class="contenedor seccion contenido-centrado">

        <a href="#" class="boton boton-verde" onclick="window.history.back(); return false;">Regresar</a>


        <h1><?php echo $articulo['titulo'];?></h1>

        <img loading="lazy" src="/imagenes/<?php echo $articulo['imagen'] ?>" alt="anuncio">

        <div class="resumen-propiedad">
            <p class="precio">$<?php echo $articulo['precio']?></p>
            <p><?php echo $articulo['descripcion']?></p>

            <p>El tipo de artículo es: <?php echo $articulo['tipo']?></p>


    </main>

<?php
    //cerrar la conexión
    mysqli_close($db);

    incluirTemplate('footer');
?>
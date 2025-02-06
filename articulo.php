<?php
    //importar la conexión

    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);


    if(!$id) {
        header('Location: /');
    }

    require 'includes/app.php';

    $db = conectarDB();

    //consultar para obtener los datos del articulo
    $query = "SELECT * FROM articulos WHERE id = {$id}";


    //obtener resultados
    $resultado = mysqli_query($db, $query);


    //si el id no existe
    if(!$resultado->num_rows) {
        header('Location: /');
    } 
    
    $articulo = mysqli_fetch_assoc($resultado);


    //esto es un tipo de -console.log- en php
    echo "<pre>";
    var_dump($query);
    echo "</pre>";


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
<?php
    use App\Articulo;

    

    if($_SERVER['SCRIPT_NAME'] == '/articulos.php') {
        $articulos = Articulo::all(); //si estamos en la sección de artículos mostramos todos los artículos
    } else {
        $articulos = Articulo::get(3);
    }
?>

<div class="contenedor-anuncios">
    <?php foreach($articulos as $articulo): ?>
    <div class="anuncio">
    <img loading="lazy" src="/imagenes/<?php echo $articulo->imagen?>" alt="anuncio">
        <div class="contenido-anuncio">
            <!-- Contenido superior: título y descripción -->
            <div class="contenido-principal">
                <h3><?php echo $articulo->titulo?></h3>
                <p><?php echo $articulo->descripcion?></p>
            </div>
            
            <!-- Contenido inferior: precio y botón -->
            <div class="contenido-inferior">
                <p class="precio">$<?php echo $articulo->precio?></p>
                <a href="articulo.php?id=<?php echo $articulo->id; ?>" class="boton-amarillo-block">
                    Ver Artículo
                </a>
            </div>
        </div>
</div>

    <?php endforeach; ?>
</div>

<?php
    // Cerrar la conexión
    mysqli_close($db);
?>
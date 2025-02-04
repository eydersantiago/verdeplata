<?php
    // Importar la conexión
    $db = conectarDB();



    // Consultar en la base de datos
    $query = "SELECT * FROM articulos LIMIT $limite";

    // Obtener resultados
    $resultado = mysqli_query($db, $query);
?>

<div class="contenedor-anuncios">
    <?php while($articulo = mysqli_fetch_assoc($resultado)): ?>
    <div class="anuncio">
    <img loading="lazy" src="/imagenes/<?php echo $articulo['imagen'] ?>" alt="anuncio">
        <div class="contenido-anuncio">
            <!-- Contenido superior: título y descripción -->
            <div class="contenido-principal">
                <h3><?php echo $articulo['titulo']?></h3>
                <p><?php echo $articulo['descripcion']?></p>
            </div>
            
            <!-- Contenido inferior: precio y botón -->
            <div class="contenido-inferior">
                <p class="precio">$<?php echo $articulo['precio']?></p>
                <a href="articulo.php?id=<?php echo $articulo['id']; ?>" class="boton-amarillo-block">
                    Ver Artículo
                </a>
            </div>
        </div>
</div>

    <?php endwhile; ?>
</div>

<?php
    // Cerrar la conexión
    mysqli_close($db);
?>
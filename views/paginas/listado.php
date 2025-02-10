<div class="contenedor-anuncios">
    <?php foreach($articulos as $articulo): ?>
    <div class="anuncio">
    <img loading="lazy" src="/imagenes/<?php echo $articulo->imagen?>" alt="articulo">
        <div class="contenido-anuncio">
            <!-- Contenido superior: título y descripción -->
            <div class="contenido-principal">
                <h3><?php echo $articulo->titulo?></h3>
                <p><?php echo $articulo->descripcion?></p>
            </div>
            
            <!-- Contenido inferior: precio y botón -->
            <div class="contenido-inferior">
                <p class="precio">$<?php echo $articulo->precio?></p>
                <a href="articulo?id=<?php echo $articulo->id; ?>" class="boton-amarillo-block">
                    Ver Artículo
                </a>
            </div>
        </div>
</div>

    <?php endforeach; ?>
</div>
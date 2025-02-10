<main class="contenedor seccion contenido-centrado">

<a href="#" class="boton boton-verde" onclick="window.history.back(); return false;">Regresar</a>


<h1><?php echo $articulo->titulo;?></h1>

<img loading="lazy" src="/imagenes/<?php echo $articulo->imagen ?>" alt="anuncio">

<div class="resumen-propiedad">
    <p class="precio">$<?php echo $articulo->precio?></p>
    <p><?php echo $articulo->descripcion?></p>

    <p>El tipo de artículo es: <?php echo $articulo->tipo?></p>


</main>
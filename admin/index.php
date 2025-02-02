<?php 
    echo "<pre>";   
    var_dump($_GET);
    echo "</pre>";


    $resultado = $_GET['resultado'] ?? null;
    require '../includes/funciones.php';
    incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h1>Administrador de Verdeplata</h1>
        <?php if( intval( $resultado ) === 1): ?>
            <p class="alerta exito">Artículo Creado Correctamente</p>
        <?php elseif( intval( $resultado ) === 2 ): ?>
            <p class="alerta exito">Artículo Actualizado Correctamente</p>
        <?php elseif( intval( $resultado ) === 3 ): ?>
            <p class="alerta exito">Artículo Eliminado Correctamente</p>
        <?php endif; ?>

        <a href="/admin/articulos/crear.php" class="boton boton-verde">Nuevo Artículo</a>
    </main>

<?php 
    incluirTemplate('footer');
?>
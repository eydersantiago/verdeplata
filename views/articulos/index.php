<main class="contenedor seccion">
        <h1>Administrador de Verdeplata</h1>
        <?php 
            $mensaje = mostrarNotificacion( intval( $resultado) );
            if($mensaje) { ?>
                <p class="alerta exito"><?php echo s($mensaje); ?></p>
            <?php } 
        ?>

        <?php include __DIR__ . '/../navegacion.php'; ?>

        <h2>Artículos</h2>
        <table class="propiedades">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Titulo</th>
                        <th>Imagen</th>
                        <th>Precio</th>
                        <th>Tipo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody> <!-- Mostrar los Resultados -->
                    <?php foreach($articulos as $articulo): ?>
                    <tr>
                        <td><?php echo $articulo->id; ?></td>
                        <td><?php echo $articulo->titulo; ?></td>
                        <td> <img src="/imagenes/<?php echo $articulo->imagen; ?>" class="imagen-tabla"> </td>
                        <td>$ <?php echo $articulo->precio; ?></td>
                        <td><?php echo $articulo->tipo; ?></td>
                        <td>
                            <form method="POST" action="articulos/eliminar" class="w-100">

                                <input type="hidden" name="id" value="<?php echo $articulo->id; ?>">
                                <input type="hidden" name="tipo" value="articulo">
                                <input type="submit" class="boton-rojo-block" value="Eliminar">
                            </form>
                            
                            <a href="articulos/actualizar?id=<?php echo $articulo->id; ?>" class="boton-amarillo-block">Actualizar</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>


        <h2>Vendedores</h2>
        <table class="propiedades">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Teléfono</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody> <!-- Mostrar los Resultados -->
                <?php foreach( $vendedores as $vendedor ): ?>
                <tr>
                    <td><?php echo $vendedor->id; ?></td>
                    <td><?php echo $vendedor->nombre . " " . $vendedor->apellido; ?></td>
                    <td>$ <?php echo $vendedor->telefono; ?></td>
                    <td>
                        <form method="POST" action="vendedor/eliminar" class="w-100">
                            <input type="hidden" name="id" value="<?php echo $vendedor->id; ?>">
                            <input type="hidden" name="tipo" value="vendedor">
                            <input type="submit" class="boton-rojo-block" value="Eliminar">
                        </form>
                        
                        <a href="vendedores/actualizar?id=<?php echo $vendedor->id; ?>" class="boton-amarillo-block">Actualizar</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
</main>

<?php 

    require '../includes/app.php';
    estaAutenticado();

    use App\Articulo;
    use App\Vendedor;

    // Implementar un método para obtener todas las propiedades
    $articulos = Articulo::all();
    $vendedores = Vendedor::all();

    // Muestra mensaje condicional
    $resultado = $_GET['resultado'] ?? null;

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $tipo = $_POST['tipo'];

        // peticiones validas
        if(validarTipoContenido($tipo) ) {
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);

            // Comparar para saber que eliminar
            if($tipo === 'vendedor') {
                $vendedor = Vendedor::find($id);
                $vendedor->eliminar();
            } else if($tipo === 'articulo') {
                $articulo = Articulo::find($id);
                $articulo->eliminar();
            }
        }
        
    }

    incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h1>Administrador de Verdeplata</h1>
        <?php 
            $mensaje = mostrarNotificacion( intval( $resultado) );
            if($mensaje) { ?>
                <p class="alerta exito"><?php echo s($mensaje); ?></p>
            <?php } 
        ?>

        <a href="/admin/articulos/crear.php" class="boton boton-verde">Nuevo Artículo</a>
        <a href="/admin/vendedores/crear.php" class="boton boton-amarillo">Nuevo Vendedor</a>

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
                            <form method="POST" class="w-100">

                                <input type="hidden" name="id" value="<?php echo $articulo->id; ?>">
                                <input type="hidden" name="tipo" value="articulo">

                                <input type="submit" class="boton-rojo-block" value="Eliminar">
                            </form>
                            
                            <a href="/admin/articulos/actualizar.php?id=<?php echo $articulo->id; ?>" class="boton-amarillo-block">Actualizar</a>
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
                        <form method="POST" class="w-100">
                            <input type="hidden" name="id" value="<?php echo $vendedor->id; ?>">
                            <input type="hidden" name="tipo" value="vendedor">
                            <input type="submit" class="boton-rojo-block" value="Eliminar">
                        </form>
                        
                        <a href="admin/vendedores/actualizar.php?id=<?php echo $vendedor->id; ?>" class="boton-amarillo-block">Actualizar</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>

<?php 
    incluirTemplate('footer');
?>
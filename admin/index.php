<?php 

    require '../includes/funciones.php';

    //accediendo a la variable de sesión del arreglo session
    $auth = estaAutenticado();

    //limitar el acceso a ciertas páginas si no está autenticado
    if(!$auth) {
        header('Location: /');
    }

    // echo "<pre>";   
    // var_dump($_SESSION);
    // echo "</pre>";

    // Importar la conexión
    require '../includes/config/database.php';

    $db = conectarDB();

    // Escribir el Query
    $query = "SELECT * FROM articulos";

    // Consultar la BD 
    $resultadoConsulta = mysqli_query($db, $query);
    

    // Muestra mensaje condicional
    $resultado = $_GET['resultado'] ?? null;


    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if($id) {

            // Eliminar el archivo
            $query = "SELECT imagen FROM articulos WHERE id = {$id}";

            $resultado = mysqli_query($db, $query);
            $propiedad = mysqli_fetch_assoc($resultado);
            
            unlink('../imagenes/' . $propiedad['imagen']);
    
            // Eliminar el artículo
            $query = "DELETE FROM articulos WHERE id = {$id}";
            $resultado = mysqli_query($db, $query);

            if($resultado) {
                header('location: /admin?resultado=3');
            }
        }

        
    }

    
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
                    <?php while( $articulo = mysqli_fetch_assoc($resultadoConsulta)): ?> <!-- mysqli_fetch_assoc() trae un arreglo de la consulta. Lo demás hace que el código itere mientras que hay resultados en la bd-->
                    <tr>
                        <td><?php echo $articulo['id']; ?></td>
                        <td><?php echo $articulo['titulo']; ?></td>
                        <td> <img src="/imagenes/<?php echo $articulo['imagen']; ?>" class="imagen-tabla"> </td>
                        <td>$ <?php echo $articulo['precio']; ?></td>
                        <td><?php echo $articulo['tipo']; ?></td>
                        <td>
                            <form method="POST" class="w-100">

                                <input type="hidden" name="id" value="<?php echo $articulo['id']; ?>">

                                <input type="submit" class="boton-rojo-block" value="Eliminar">
                            </form>
                            
                            <a href="/admin/articulos/actualizar.php?id=<?php echo $articulo['id']; ?>" class="boton-amarillo-block">Actualizar</a>
                        </td>
                        
                    </tr>
                    <?php endwhile; ?>
                </tbody>
        </table>
    </main>

<?php 
    incluirTemplate('footer');
?>
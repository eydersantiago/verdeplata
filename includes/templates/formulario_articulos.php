<fieldset>
    <legend>Información General</legend>

    <label for="titulo">Título:</label>
    <!-- Ajustar a articulo[titulo] -->
    <input 
        type="text" 
        id="titulo" 
        name="articulo[titulo]" 
        placeholder="Título del Artículo" 
        value="<?php echo s($articulo->titulo); ?>"
    >

    <label for="precio">Precio:</label>
    <!-- Ajustar a articulo[precio] -->
    <input 
        type="number" 
        id="precio" 
        name="articulo[precio]" 
        placeholder="Precio del Artículo" 
        value="<?php echo s($articulo->precio); ?>"
    >

    <label for="imagen">Imagen:</label>
    <!-- Esto ya está bien, pues va en articulo[imagen] -->
    <input 
        type="file" 
        id="imagen" 
        accept="image/jpeg, image/png" 
        name="articulo[imagen]"
    >

    <?php if($articulo->imagen) { ?>
        <img src="/imagenes/<?php echo $articulo->imagen ?>" class="imagen-small">
    <?php }?>

    <label for="descripcion">Descripción:</label>
    <!-- Ajustar a articulo[descripcion] -->
    <textarea id="descripcion" name="articulo[descripcion]"><?php echo s($articulo->descripcion); ?></textarea>
</fieldset>

<fieldset>
    <legend>Información de Artículo</legend>

    <label for="tipo">Tipo:</label>
    <!-- Ajustar a articulo[tipo] -->
    <input 
        type="text" 
        id="tipo" 
        name="articulo[tipo]" 
        placeholder="Tipo de Artículo" 
        value="<?php echo s($articulo->tipo); ?>"
    >
</fieldset>

<fieldset>
    <legend>Vendedor</legend>
    <!-- Esto ya está bien, pues va en articulo[vendedor_id] -->
    <select name="articulo[vendedor_id]" id="nombre_vendedor">
        <option value="">-- Seleccione --</option>
        <?php foreach($vendedores as $vendedor) { ?>
            <option  
                <?php echo $articulo->vendedor_id === $vendedor->id ? 'selected' : '' ?>  
                value="<?php echo s($vendedor->id); ?>"
            > 
                <?php echo s($vendedor->nombre) . " " . s($vendedor->apellido); ?>
            </option>
        <?php } ?>
    </select>
</fieldset>

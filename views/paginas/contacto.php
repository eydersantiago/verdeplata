<main class="contenedor seccion">
    <h1>Contacto</h1>

    <?php if($mensaje) { ?>
        <p class="alerta exito"><?php echo $mensaje; ?></p>
    <?php } ?>
    <picture>
        <source srcset="build/img/destacada4.webp" type="image/webp">
        <source srcset="build/img/destacada3.jpg" type="image/jpeg">
        <img loading="lazy" src="build/img/destacada3.jpg" alt="Imagen Contacto">
    </picture>

    <h2>Llene el formulario de Contacto</h2>

    <form class="formulario" method="POST" action="/contacto">
        <fieldset>
            <legend>Información Personal</legend>

            <label for="nombre">Nombre</label>
            <input type="text" placeholder="Tu Nombre" id="nombre" name="contacto[nombre]" required>

            <label for="email">Email</label>
            <input type="text" placeholder="Tu Email" id="email" name="contacto[email]" required>

            <label for="telefono">Teléfono</label>
            <input type="text" placeholder="Tu número de teléfono" id="nombre" name="contacto[telefono]" required>

            <label for="mensaje">Mensaje:</label>
            <textarea id="mensaje" name="contacto[mensaje]" required></textarea>

        </fieldset>

        <fieldset>
            <legend>Información a solicitar</legend>

            <label for="opciones">Escoge tu plan:</label>
            <select id="opciones" name="contacto[opciones]">
                <option value="" disabled selected>-- Seleccione --</option>
                <option value="Estadia">Estadía</option>
                <option value="Avistamiento_aves">Avistamiento de aves</option>
                <option value="Guia">Guía turística</option>
                <option value="Estadia_mas_guia">Estadía más guía</option>

            </select>

            <label for="presupuesto">Precio o Presupuesto</label>
            <input type="number" placeholder="Tu Precio o Presupuesto" id="presupuesto" name="contacto[presupuesto]">

        </fieldset>

        <fieldset>
            <legend>Información sobre el</legend>

            <p>Cómo desea ser contactado</p>

            <div class="forma-contacto">
                <label for="contactar-telefono">Teléfono</label>
                <input name="contacto[contacto]" type="radio" value="telefono" id="contactar-telefono" >

                <label for="contactar-email">E-mail</label>
                <input name="contacto[contacto]" type="radio" value="email" id="contactar-email" >
            </div>

            <!-- <div id="contacto"></div> -->

            <p>Si eligió ser contactado por teléfono, elija la fecha y la hora</p>
            <label for="fecha">Fecha:</label>
            <input type="date" id="fecha" name="contacto[fecha]">

            <label for="hora">Hora:</label>
            <input type="time" id="hora" min="06:00" max="21:00" name="contacto[hora]">


        </fieldset>

        <input type="submit" value="Enviar" class="boton-verde">
    </form>
</main>
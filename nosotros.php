<?php
    require 'includes/funciones.php';
    incluirTemplate('header'); 
?>



    <main class="contenedor seccion">
        <h1>Conoce sobre Nosotros</h1>

        <div class="contenido-nosotros">
            <div class="imagen">
                <picture>
                    <!-- <source srcset="build/img/nosotros.webp" type="image/webp"> -->
                    <source srcset="build/img/sobre_nosotros.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/sobre_nosotros.jpg" alt="Sobre Nosotros">
                </picture>
            </div>

            <div class="texto-nosotros">
                <blockquote>
                    Fundada en 2021
                </blockquote>

                <p>Verdeplata es una empresa dedica al ecoturismo, hospedaje, mirador de aves y venta de artesanías. <br>
                    Clientes de todo el mundo nos visitan para disfrutar de la naturaleza y la tranquilidad que ofrecemos. <br>
                    Nuestro personal está altamente capacitado para ofrecer el mejor servicio a nuestros clientes. <br>
                </p>

                <p>En nuestro mirador Verdeplata hay hasta 12 especies de colibrí, "otras cosas que llamen la atención". <br>
                    Oswaldo Suarez González, fundador de Verdeplata, ha sido reconocido por su labor en la conservación de la naturaleza. <br>
                </p>
            </div>
        </div>
    </main>

    <section class="contenedor seccion">
        <h1>Más Sobre Nosotros</h1>

        <div class="iconos-nosotros">
            <div class="icono">
                <img src="build/img/icono_sostenibilidad.svg" alt="Icono Sostenibilidad" loading="lazy">
                <h3>Sostenibilidad</h3>
                <p>Implementamos prácticas ecológicas para preservar la naturaleza y garantizar un impacto positivo en nuestro entorno.</p>
            </div>            
            <div class="icono">
                <img src="build/img/icono2.svg" alt="Icono Precio" loading="lazy">
                <h3>Precio</h3>
                <p>Ofrecemos tarifas competitivas sin comprometer la calidad de nuestros servicios y experiencias.</p>
            </div>
            <div class="icono">
                <img src="build/img/icono_experiencia_unica.svg" alt="Icono Tiempo" loading="lazy">
                <h3>Experiencia única</h3>
                <p>Ofrecemos actividades personalizadas que te conectan profundamente con la naturaleza y la cultura local.</p>
            </div>
        </div>
    </section>

    <?php incluirTemplate('footer');  ?>
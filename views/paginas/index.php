<main class="container section">
    <h2>Más sobre nosotros</h2>

    <?php include "iconos.php" ?>

</main>

<section class="container">
    <h2>Casas y aptos a la venta</h2>
    <?php
    include 'listado.php'
    ?>
    <!-- ads-container -->
    <div class="align-right">
        <a href="/propiedades" class="btnSmall btnSmall--green">Ver todas</a>
    </div>
</section>

<section class="contact-img">
    <h2>Encuentra la casa de tus sueños</h2>
    <p>Llena el formulario de contacto y un asesor se pondrá en contacto contigo.</p>
    <a href="contacto.php" class="btnSmall btnSmall--yellow">Contactanos</a>
</section>

<div class="container blog-test-section">

    <section class="blog">
        <h3 class="blog__title">Nuestro blog</h3>

        <article class="blog-entry">
            <div class="image">
                <picture>
                    <source srcset="./build/img/blog1.webp" type="image/webp">
                    <source srcset="./build/img/blog1.jpg" type="image/jpeg">
                    <img loading="lazy" src="./build/img/blog1.jpg" alt="blog post">
                </picture>
            </div>

            <div class="content">
                <a href="/entrada">
                    <h4>Terraza en el techo de tu casa</h4>
                    <p>Escrito el <span class="text-yellow">20/10/2024</span>| Por: <span class="text-yellow">
                            Admin</span> </p>
                    <p>Construye una terraza en el techo de tu casa ahorrando dinero en materiales y mano de obra.
                    </p>
                </a>
            </div>
        </article>

        <article class="blog-entry">
            <div class="image">
                <picture>
                    <source srcset="./build/img/blog2.webp" type="image/webp">
                    <source srcset="./build/img/blog2.jpg" type="image/jpeg">
                    <img loading="lazy" src="./build/img/blog2.jpg" alt="blog post">
                </picture>
            </div>

            <div class="content">
                <a href="/entrada">
                    <h4>Guia para la decoración de tu casa</h4>
                    <p>Escrito el <span class="text-yellow">20/10/2024</span> | Por: <span class="text-yellow">
                            Admin</span>
                    </p>
                    <p>Ahorra espacio en tu hogar y aprende a combinar muebles y colores para decorar tu hogar.
                    </p>
                </a>
            </div>
        </article>
    </section>

    <section class="testimonials">
        <h3>Testimoniales</h3>

        <div class="testimonial">
            <blockquote>
                El personal fue muy amable y recibí una gran atención. La propiedad cumplió con todas mis
                expectativas.
            </blockquote>
            <p>- Toni Perez</p>
        </div>
    </section>

</div>
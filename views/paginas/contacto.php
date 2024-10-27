<main class="container section">
    <h2>Contactanos</h2>
    <?php
    if ($message): ?>
        <div class="alert success"><?php echo stzr($message); ?></div>
    <?php
    endif;
    ?>

    <picture>
        <source srcset="./build/img/destacada3.webp" type="image/webp">
        <source srcset="./build/img/destacada3.jpg" type="image/jpeg">
        <img loading="lazy" src="./build/img/destacada3.jpg" alt="imagen contacto">
    </picture>

    <h2>LLene el formulario de contacto</h2>

    <form class="form" method="POST">

        <fieldset>
            <legend>Información</legend>

            <div>
                <label for="nombre">Nombre</label>
                <input type="text" placeholder="Tu nombre" id="nombre" name="contacto[nombre]" maxlength="50" required>
            </div>


            <div>
                <label for="mensaje">Mensaje</label>
                <textarea name="contacto[mensaje]" id="mensaje" placeholder="Cuentanos un poco.." maxlength="300" required></textarea>
            </div>
        </fieldset>

        <fieldset>
            <legend>Información sobre la propiedad</legend>

            <div>
                <label for="opciones">Vende o compra:</label>
                <select name="contacto[tipo]" id="opciones" required>
                    <option selected disabled> --Seleccione-- </option>
                    <option value="compra">Compra</option>
                    <option value="venta">Venta</option>
                </select>
            </div>

            <div>
                <label for="presupuesto">Precio o Presupuesto</label>
                <input type="number" placeholder="Tu precio o presupuesto" id="presupuesto" name="contacto[precio]" required maxlength="20">
            </div>
        </fieldset>

        <fieldset>
            <legend>Contacto</legend>
            <p>Como desea ser contactado?</p>

            <div class="contact-method">
                <label for="contact-email">E-mail:</label>
                <input type="radio" value="e-mail" id="contact-email" name="contacto[contactar]" checked>

                <label for="contact-telefono">Telefono:</label>
                <input type="radio" value="telefono" id="contact-telefono" name="contacto[contactar]">

                <div id="defaultContact">
                    <label for="email">E-mail</label>
                    <input type="email" placeholder="Tu E-mail" id="email" name="contacto[email]" maxlength="50" required>
                </div>

            </div>


            <input type="submit" value="Enviar" class="btnSmall btnSmall--green">

        </fieldset>
    </form>

</main>
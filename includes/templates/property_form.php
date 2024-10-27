<fieldset>
    <legend>Información general</legend>

    <label for="titulo">Titulo</label>
    <input type="text" id="titulo" name="propiedad[titulo]" placeholder="Titulo de la propiedad" value="<?php echo stzr($propiedad->titulo) ?>">

    <label for="precio">Precio</label>
    <input type="number" id="precio" name="propiedad[precio]" placeholder="Precio de la propiedad" value="<?php echo stzr($propiedad->precio) ?>">

    <label for="imagen">Imagen</label>
    <input type="file" id="imagen" accept="image/jpeg, image/png" name="propiedad[imagen]">

    <?php if ($propiedad->imagen): ?>
        <img src="/images/<?php echo $propiedad->imagen ?>" alt="property current image" class="form-img--small">
    <?php endif ?>

    <label for="descripcion">Descripción</label>
    <textarea name="propiedad[descripcion]" id="descripcion" placeholder="Describe la propiedad"><?php echo stzr($propiedad->descripcion) ?></textarea>

</fieldset>

<fieldset>
    <legend>Información de la propiedad</legend>

    <label for="habitaciones">Habitaciones</label>
    <input type="number" id="habitaciones" name="propiedad[habitaciones]" placeholder="EJ: 5" min="1" max="10" value="<?php echo stzr($propiedad->habitaciones) ?>">

    <label for="wc">Baños</label>
    <input type="number" id="wc" name="propiedad[wc]" placeholder="EJ: 2" min="1" max="10" value="<?php echo stzr($propiedad->wc) ?>">

    <label for="estacionamiento">Estacionamiento</label>
    <input type="number" id="estacionamiento" name="propiedad[estacionamiento]" placeholder="EJ: 2" min="1" max="10" value="<?php echo stzr($propiedad->estacionamiento) ?>">
</fieldset>

<fieldset>
    <legend>Vendedor</legend>
    <select name="propiedad[vendedorId]">
        <option disabled selected>--Elija vendedor--</option>
        <?php
        foreach ($vendedores as $vendedor): ?>
            <option <?php echo stzr($propiedad->vendedorId) === $vendedor->id ? "selected" : ""; ?> value="<?php echo stzr($vendedor->id); ?>">
                <?php echo stzr($vendedor->nombre . " " . $vendedor->apellido);
                ?>
            </option>
        <?php
        endforeach;
        ?>

    </select>
</fieldset>
<fieldset>
    <legend>Información del vendedor(a)</legend>

    <label for="nombre">Nombre</label>
    <input type="text" id="nombre" name="vendedor[nombre]" placeholder="Nombre de lvendedor(a)" maxlength="50" value="<?php echo stzr($vendedor->nombre) ?>">

    <label for="apellido">Apellido</label>
    <input type="text" id="apellido" name="vendedor[apellido]" placeholder="Apellido del vendedor(a)" maxlength="50" value="<?php echo stzr($vendedor->apellido) ?>">
</fieldset>

<fieldset>
    <legend>Información de contacto</legend>

    <label for="telefono">Telefono</label>
    <input type="tel" id="telefono" name="vendedor[telefono]" placeholder="Telefono del vendedor(a)" maxlength="10" value="<?php echo stzr($vendedor->telefono) ?>">
</fieldset>
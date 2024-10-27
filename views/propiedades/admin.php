<?php
$result = isset($_GET["result"]) ? $_GET["result"] : false;
?>

<main class="container section">
    <h2>Administrador de bienesraices</h2>

    <?php
    if ($result) {
        $message = showNotification($result);
        if ($message): ?>
            <div class="alert success"><?php echo stzr($message); ?></div>
    <?php
        endif;
    }
    ?>

    <a href="/propiedades/crear" class="btnSmall btnSmall--green">Crear propiedad</a>

    <a href="/vendedores/crear" class="btnSmall btnSmall--yellow">Crear vendedor</a>

    <h2>Propiedades</h2>

    <div class="table-container">
        <table class="properties">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Titulo</th>
                    <th>Imagen</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody><!-- show query results -->
                <?php foreach ($propiedades as $propiedad): ?>
                    <tr>
                        <td><?php echo $propiedad->id; ?></td>
                        <td><?php echo $propiedad->titulo; ?></td>
                        <td><img src="/images/<?php echo $propiedad->imagen; ?>" class="table-img" alt="property image"></td>
                        <td><?php echo $propiedad->precio; ?></td>
                        <td>
                            <form method="POST" action="propiedades/eliminar">
                                <input type="hidden" name="id" value=<?php echo $propiedad->id; ?>>
                                <input type="hidden" name="type" value="property">
                                <input type="submit" class="btnLarge btnLarge--red" value="Eliminar">
                            </form>
                            <a href="/propiedades/actualizar?id=<?php echo $propiedad->id; ?>" class=" btnLarge btnLarge--blue">Actualizar</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>

        </table>
    </div>

    <h2>Vendedores</h2>

    <div class="table-container">
        <table class="properties">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Telefono</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody><!-- show query results -->
                <?php foreach ($vendedores as $vendedor): ?>
                    <tr>
                        <td><?php echo $vendedor->id; ?></td>
                        <td><?php echo $vendedor->nombre . " " . $vendedor->apellido ?></td>
                        <td><?php echo $vendedor->telefono; ?></td>
                        <td>
                            <form method="POST" action="vendedores/eliminar">
                                <input type="hidden" name="id" value=<?php echo $vendedor->id; ?>>
                                <input type="hidden" name="type" value="seller">
                                <input type="submit" class="btnLarge btnLarge--red" value="Eliminar">
                            </form>
                            <a href="vendedores/actualizar?id=<?php echo $vendedor->id; ?>" class=" btnLarge btnLarge--blue">Actualizar</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>

        </table>
    </div>
</main>
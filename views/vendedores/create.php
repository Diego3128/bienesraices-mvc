<main class="container section">
    <h2>Crear un nuevo vendedor</h2>
    <a href="/admin" class="btnSmall btnSmall--green">Volver</a>

    <?php
    if (!empty($errors)):
        foreach ($errors as $error) : ?>
            <div class="alert error"> <?php echo $error; ?></div>
    <?php endforeach;
    endif;
    ?>

    <form action="/vendedores/crear" method="post" class="form">

        <?php include __DIR__ .  "/form.php"; ?>

        <input type="submit" value="Crear vendedor" class="btnSmall btnSmall--green">
    </form>
</main>
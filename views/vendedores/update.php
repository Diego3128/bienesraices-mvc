<main class="container section">
    <h2>Actualizar vendedor</h2>
    <a href="/admin" class="btnSmall btnSmall--green">Volver</a>

    <?php
    if (!empty($errors)):
        foreach ($errors as $error) : ?>
            <div class="alert error"> <?php echo $error; ?></div>
    <?php endforeach;
    endif;
    ?>

    <form method="post" class="form" enctype="multipart/form-data">

        <?php include __DIR__ .  "/form.php"; ?>

        <input type="submit" value="Actualizar vendedor" class="btnSmall btnSmall--green">

    </form>
</main>
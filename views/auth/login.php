<main class="container section">
    <h2>Iniciar Sesion</h2>

    <?php if (!empty($errors)): ?>
        <?php foreach ($errors as $e): ?>
            <div class="alert error"><?php echo $e ?></div>
        <?php endforeach; ?>
    <?php endif; ?>

    <form action="/login" class="form" method="POST">
        <fieldset>
            <legend>Credenciales</legend>

            <div>
                <label for="email">E-mail</label>
                <input type="email" placeholder="Tu E-mail" id="email" name="user[email]" required>
            </div>

            <div>
                <label for="password">Contraseña</label>
                <input type="password" placeholder="Tu contraseña" id="password" name="user[password]" required>
            </div>

            <input type="submit" value="Ingresar" class="btnSmall btnSmall--yellow">

        </fieldset>

    </form>
</main>
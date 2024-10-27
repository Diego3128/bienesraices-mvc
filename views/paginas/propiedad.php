<main class="container section centered-content">
    <h2><?php echo stzr($propiedad->titulo); ?></h2>

    <picture>
        <img loading="lazy" src="/images/<?php echo stzr($propiedad->imagen); ?>" alt="Propiedad anuncio">
    </picture>

    <div class="house-description">
        <p class="card__price"><span class="dollar">$</span> <?php echo stzr($propiedad->precio); ?></p>
        <ul class="characteristics__icons">

            <li>
                <img src="./build/img/icono_wc.svg" alt="restroom icon">
                <p><?php echo stzr($propiedad->wc); ?></p>
            </li>

            <li>
                <img src="./build/img/icono_estacionamiento.svg" alt="parking lot icon">
                <p><?php echo stzr($propiedad->estacionamiento); ?></p>
            </li>

            <li>
                <img src="./build/img/icono_dormitorio.svg" alt="room icon">
                <p><?php echo stzr($propiedad->habitaciones); ?></p>
            </li>

        </ul>
        <p><?php echo stzr($propiedad->descripcion); ?></p>

    </div>
</main>
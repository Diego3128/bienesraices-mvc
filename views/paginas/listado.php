<div class="ads-container">
    <?php foreach ($propiedades as $propiedad): ?>
        <div class="card">
            <picture>
                <img loading="lazy" src="/images/<?php echo stzr($propiedad->imagen) ?>" alt="Propiedad anuncio">
            </picture>

            <div class="card__details">
                <h3 class="card__title"><?php echo stzr($propiedad->titulo) ?></h3>
                <p class="card__description"><?php echo stzr($propiedad->descripcion) ?></p>
                <p class="card__price"><span class="dollar">$</span> <?php echo stzr($propiedad->precio) ?></p>

                <ul class="card__icons">

                    <li>
                        <img src="./build/img/icono_wc.svg" alt="restroom icon">
                        <p><?php echo stzr($propiedad->wc) ?></p>
                    </li>

                    <li>
                        <img src="./build/img/icono_estacionamiento.svg" alt="parking lot icon">
                        <p><?php echo stzr($propiedad->estacionamiento) ?></p>
                    </li>

                    <li>
                        <img src="./build/img/icono_dormitorio.svg" alt="room icon">
                        <p><?php echo stzr($propiedad->habitaciones) ?></p>
                    </li>

                </ul>

                <!-- card__icons -->
            </div>
            <!-- card__details -->
            <a href="/propiedad?id=<?php echo stzr($propiedad->id) ?>" class="btnLarge btnLarge--yellow">Ver propiedad</a>
        </div>
        <!-- card -->
    <?php endforeach  ?>

</div>
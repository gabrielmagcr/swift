
<section class="sm-prodhero">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-6 col-12 col-xs-12 sm-prodhero--info">
                    <div class="sm-prodhero--breadcrumb">
                    <ol>
                        <li><a href="/tips-recipes">Recipes</a></li>
                        <li><?php the_title(); ?></li>
                    </ol>
                </div>
                <h1><?php the_title(); ?></h1>
                <p><?= the_field('description'); ?></p>
                <form class="sm-prodhero--wtb" action="/products" method="GET">
                    <button class="btn btn-outline-red" type="submit">Find your Protein</button>
                </form>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-12 col-xs-12 sm-prodhero--img">
                <figure>
                    <img src="<?= the_field("image"); ?>" alt="<?php the_title(); ?> in packaging">
                </figure>
            </div>
        </div>
    </div>
</section>
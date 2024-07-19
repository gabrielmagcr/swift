<script>
    var activeTip = <?php print get_the_ID(); ?>;
</script>
<?php get_header(); ?>
<style>
    .made-with {
        background: #EBEBEB;
        display: flex;
        align-items: center;
        justify-content: space-evenly;
        text-align: center;
        font-size: 20px;
        margin-top: -1px;
    }

    .made-with img {
        width: 50%;
    }

    .made-with-span {
        background: #FFAA2B;
        width: 100%;
        display: block;
        padding: 5px 10px;
        color: white;
        margin: 15px 0 16px 0;
    } 
    .badgebar-section{
        background: #FFAA2B;
        padding: 15px 0;
    }
    .tips-badgebar{
        display: flex;
    flex-wrap: wrap;
    justify-content: center;
    align-items: center;
    gap: 25px;
    }
    .badgebar{
        display: flex;
        gap: 10px;
    }
    .badgebar h3{
        margin: 0;
    }
    .badgebar img{
        width: 50px;
    }
    @media (min-width:1023px) {
        .badgebar img{
        width: 75px;
    }
    }
</style>
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
                <?php $made_with = get_field('made_with');
                if ($made_with) : ?>

                    <span class="made-with-span">MADE WITH:</span>
                    <?php foreach ($made_with as $post) :
                        setup_postdata($post); ?>
                        <a href="<?php the_permalink(); ?>">
                            <div class="made-with">
                                <span><?php the_title(); ?></span>
                                <?php
                                $product_image = get_field('product_image');
                                if ($product_image) : ?>
                                    <img src="<?= $product_image; ?>" alt="<?php the_title(); ?>" />
                                <?php endif; ?>
                            </div>
                        </a>
                    <?php endforeach; ?>
                    <?php wp_reset_postdata(); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<section class="badgebar-section">
    <?php 
        $number_of_ingredients= get_field('number_of_ingredients');
        $preparation_time= get_field('preparation_time');
        $amount_of_time= get_field('amount_of_time');
        $servings=get_field('servings');
    ?>
    
        <div class="tips-badgebar">
            <div class="badgebar tips-ingredients">
            <span><?php echo $number_of_ingredients; ?></span><h3> INGREDIENTS</h3>
            </div>
            <div class="badgebar tips-time">
                <img src='/wp-content/uploads/2024/07/Vector.svg'><span><?php echo $preparation_time; ?></span><h3><?php echo $amount_of_time ?></h3>
            </div>
            <div class="badgebar tips-servings">
                <img src='/wp-content/uploads/2024/07/Group.svg'><span><?php echo $servings; ?></span><h3>SERVINGS</h3>
            </div>
            <div class="badgebar tips-cooking-style">
                <!-- agregar todos los tipos de coccion -->
                <img src='/wp-content/uploads/2024/07/oven.svg'>
            </div>
        </div>
   
</section>
<!-- /#tips-recipes-wrap -->
<?php get_footer(); ?>
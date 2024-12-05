<!DOCTYPE html>
<script>
    var activeTip = <?php print get_the_ID(); ?>;
</script>
<?php get_header(); ?>


<section class="sm-prodhero recipe-hero" itemscope itemtype="http://schema.org/Recipe">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-6 col-12 col-xs-12 sm-prodhero--info recipes-info">
                <div class="sm-prodhero--breadcrumb">
                    <ol>
                        <li><a href="/tips-recipes">Recipes</a></li>
                        <li><?php the_title(); ?></li>
                    </ol>
                </div>
                <h1 itemprop="name" class="p-name recipe-title"><?php the_title(); ?></h1>
                <p class="p-summary" itemprop="description"><?= the_field('description'); ?></p>
                <form class="sm-prodhero--wtb" action="/products" method="GET">
                    <button class="btn btn-outline-red" type="submit">Find your Protein</button>
                </form>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-12 col-xs-12 sm-prodhero--img recipe-img">
                <figure>
                    <img class="u-photo" itemprop="image" src="<?= the_field("image"); ?>" alt="<?php the_title(); ?> in packaging">
                    <div class="image-source">
                        <?php if ($imageSource = get_field('image_source')): ?>
                            <?php echo $imageSource; ?>
                        <?php endif; ?>
                    </div>
                </figure>
                <?php $made_with = get_field('made_with');
                if ($made_with) :
                    $count = count($made_with);
                    $single_made_with = $count === 1 ? 'single-made-with' : '';
                ?>

                    <span class="made-with-title">MADE WITH:</span>
                    <div class="made-with-container <?php echo $single_made_with; ?>">
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
                    </div>

                    <?php wp_reset_postdata(); ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<section class="badgebar-section">
    <?php
    $number_of_ingredients = get_field('number_of_ingredients');
    $preparation_time = get_field('preparation_time');
    $amount_of_time = get_field('amount_of_time');
    $servings = get_field('servings');
    ?>

    <div class="tips-badgebar">
        <div class="badgebar tips-ingredients">
            <span><?php echo $number_of_ingredients; ?></span>
            <h3> INGREDIENTS</h3>
        </div>
        <div class="badgebar tips-time">
            <img alt="swiftMeats Time" src='/wp-content/uploads/2024/07/Vector.svg'><span><?php echo $preparation_time; ?></span>
        </div>
        <div class="badgebar tips-servings">
            <img alt="swiftMeats Serving" src='/wp-content/uploads/2024/07/Group.svg'><span itemprop="recipeYield"><?php echo $servings; ?></span>
            <h3>SERVINGS</h3>
        </div>
        <div class="badgebar tips-cooking-style">
            <?php
            $cooking_style = get_field('cooking_style');
            $img_cooking = '';
            switch ($cooking_style) {
                case 'skillet':
                    $img_cooking = '/assets/img/tips/Skillet.svg';
                    break;
                case 'oven':
                    $img_cooking = '/assets/img/tips/Oven.svg';
                    break;
                case 'grill':
                    $img_cooking = '/assets/img/tips/Grill.svg';
                    break;
                case 'smoker':
                    $img_cooking = '/assets/img/tips/Smoker.svg';
                    break;
                case 'multicooker':
                    $img_cooking = '/assets/img/tips/Multicooker.svg';
                    break;
                case 'sous vide':
                    $img_cooking = '/assets/img/tips/SousVide.svg';
                    break;
                default:
                    $img_cooking = '/assets/img/tips/Fryer.svg';
                    break;
            }
            ?>
            <img src='<?php echo esc_url(get_template_directory_uri() . '/' . $img_cooking); ?>' alt='Cooking style image'>
        </div>
    </div>

</section>

<section class="tips-instructions">
    <div class="tips-i-left-section recipe-ingredients">
        <?php echo get_field('content'); ?>
        <?php if ($recipeSource = get_field('recipe_source')): ?>
            <div class="recipe-source"><?php echo $recipeSource; ?></div>
        <?php endif; ?>
    </div>

    <div class="tips-i-right-section">

        <h5>SPREAD THE PASTA</h5>
        <p>Why keep this culinary masterpiece to yourself? Share the recipe on social media and let the world join in the fun of twirling spaghetti like pros and savoring the juicy, flavorful meatballs. It's a surefire way to spread joy, laughter, and deliciousness across the world!</p>

        <div class="share-icons-container">
            <div id="hide-icons">
                <a class="share-pin-link share-icons" target="_blank" href="http://pinterest.com/pin/create/button/?url=<?php echo get_permalink(); ?>&media=<?php echo get_field('image'); ?>&title=<?php echo urlencode(get_the_title()); ?>">
                    <img src="/wp-content/uploads/2024/07/Social-Pinterest-Streamline-Streamline-3.0-1.svg" alt="pinterest">
                </a>
                <a href="mailto:?subject=Hey check this recipe! &amp;body=Here is the recipe : <?php echo get_permalink(); ?>" class="share-icons">
                    <img src="/wp-content/uploads/2024/07/Email-Action-Unread-Streamline-Streamline-3.0-1.svg" alt="Share by email">
                </a>
                <button onclick="window.print()" class="share-icons"><img src="/wp-content/uploads/2024/07/Print-Text-Streamline-Streamline-3.0-1.svg" alt="Print this recipe"></button>
            </div>
            <!--
            <div id="sharebtn">
                <button class="share-icons">
                    <img src="/wp-content/uploads/2024/07/Layer_1.svg" alt="Share">
                </button>
            </div>
        -->
        </div>


    </div>
    </div>


</section>
<?php
/* Next level section -------------- */

if (have_rows('product_page_next_level')) : ?>
    <section id="product-next-level">
        <div class="container product-next-level-container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-12 col-xs-12">
                    <h3 class="sm-nextlevel-heading">Take your Meal to the Next Level</h3>
                </div>
                <!-- /.col-xl-12 col-lg-12 col-md-12 col-12 col-xs-12 -->
            </div>
            <!-- /.row -->
            <div class="row recipes-next-level">
    <?php while (have_rows('product_page_next_level')) : the_row(); ?>
        <?php
        $item_id = get_sub_field('recipe_video');
        $item = get_post($item_id);
        $type = $item->type;
        $thaimage = wp_get_attachment_image_src($item->image, 'full');

        $image = $thaimage != "" ? $thaimage[0] : get_template_directory_uri() . "/assets/img/tips/recipe-ex.jpg";
        $item_link = get_permalink($item_id);
        ?>
        <div class="col-xl-4 col-lg-4 col-md-4 col-12 col-xs-12 product-other-item " data-toggle="modal" data-target="#tip-<?= $item_id; ?>">
            <div class="sm-nextlevel-item">
                <a href="<?= esc_url($item_link); ?>">
                    <figure>
                        <img src="<?= esc_url($image); ?>" alt="<?= esc_attr($item->post_title); ?>">
                    </figure>
                    <div class="sm-nextlevel-item--body">
                        <h3><?= esc_html($item->post_title); ?></h3>
                    </div>
                </a>
            </div>
        </div>
    <?php endwhile; ?>
</div>

        <a href="/tips-recipes" class="view-more-recipes-btn"><button class="blue-btn">VIEW MORE RECIPES</button></a>

        <!-- /.container -->
    </section>
    <!-- /#product-next-level -->
<?php endif; ?>

<script>
    const sharebtn = document.getElementById('sharebtn');
    const hideIcons = document.getElementById('hide-icons');

    sharebtn.addEventListener('click', function() {
        if (hideIcons.style.display === 'none') {
            hideIcons.style.display = 'flex';

        } else {
            hideIcons.style.display = 'none';
        }
    });
</script>

<!-- /#tips-recipes-wrap -->
<?php
get_template_part('parts/pre-footer-ctas');
get_footer();
?>
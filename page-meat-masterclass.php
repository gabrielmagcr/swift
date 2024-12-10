<?php

/* 
 Template Name: page-meat-masterclass
 */

$active_page = get_query_var('mmc');
switch ($active_page) {
    case 'tips':
    case 'methods':
    case '':
        break;
    default:
        mmc_show_not_found();
}

function is_mmc_active($slug)
{
    global $active_page;
    return $slug == $active_page;
}

// left side: svg number
// right side: meat cuts taxonomy slug
$meat_cuts_taxonomy_map = [
    'beef' => [
        '1' => 'chuck',
        '2' => 'brisket',
        '3' => 'shank',
        '4' => 'ribs',
        '5' => 'plate',
        '6' => 'short-loin',
        '7' => 'flank',
        '8' => 'top-bottom-sirloin',
        '9' => 'tenderloin',
        '10' => 'sirloin',
        '11' => 'round',
    ],
    'pork' => [
        '1' => 'leg',
        '2' => 'loin',
        '3' => 'butt',
        '4' => 'picnic',
        '5' => 'side',
    ]
];

function get_cut_slug($meat, $cut_id)
{
    global $meat_cuts_taxonomy_map;
    return $meat_cuts_taxonomy_map[$meat][$cut_id];
}

function get_cut_id($meat, $cut_slug)
{
    global $meat_cuts_taxonomy_map;
    foreach ($meat_cuts_taxonomy_map[$meat] as $id => $slug) {
        if ($slug == $cut_slug) return $id;
    }
}

function mmc_check_product($meat, $cut)
{
    if (!$cut || get_sub_field('meat_type') != $meat || $cut != get_sub_field('meat_cut')) {
        return false;
    }

    return true;
}

function render_cut_products($meat, $cut_id)
{ ?>
    <?php $term = get_term_by('slug', get_cut_slug($meat, $cut_id), 'meat_cuts'); ?>

    <div class="text-white row mmc-product-tabs">
        <div class="col-12 col-md-6">
            <h3 class="h4 text-gold">Cuts From The <?php print_r($term->name); ?></h3>
            <div class="mmc-product-links">
                <?php $i = 1;
                while (have_rows('meat_cuts')): the_row(); ?>
                    <?php if (!mmc_check_product($meat, $term)) continue; ?>

                    <a class="text-white mmc-product-link" href="#" data-meat="<?php print $meat; ?>" data-cut-number="<?php print $cut_id; ?>" data-product-index="<?php print $i; ?>"><?php print get_sub_field('product_name'); ?></a>
                <?php $i++;
                endwhile; ?>
            </div>
        </div>
        <div class="col-12 col-md-6">
            <?php $i = 1;
            while (have_rows('meat_cuts')): the_row(); ?>
                <?php if (!mmc_check_product($meat, $term)) continue; ?>
                <?php
                // Get the image ID from the custom field.
                $product_image_id = get_sub_field('product_image');
                // Retrieve the image URL and alt text.
                $image_url = wp_get_attachment_url($product_image_id);
                $image_alt = get_post_meta($product_image_id, '_wp_attachment_image_alt', true) ?: 'Meat Masterclass SwiftMeats';
                ?>

                <div class="mmc-product-tab" data-meat="<?php print esc_attr($meat); ?>" data-cut-number="<?php print esc_attr($cut_id); ?>" data-product-index="<?php print esc_attr($i); ?>">
                    <div class="mmc-product-tab-inner">
                        <img src="<?php print esc_url($image_url); ?>" alt="<?php print esc_attr($image_alt); ?>" />
                    </div>
                    <?php if ($link = get_sub_field('linked_product')): ?>
                        <div class="text-center mt-4">
                            <a href="<?php print esc_url($link); ?>" class="btn btn-gold">View Product</a>
                        </div>
                    <?php endif; ?>
                </div>
            <?php $i++;
            endwhile; ?>
        </div>

    </div>
<?php
}

get_header();


?>

<!-- /#masterclass-hero -->
<?php get_template_part('components/blocks'); ?>
<section id="know-your-cuts">
    <div class="mmc-page-nav container container-meat">
        <div class="mmc-page-nav-item <?php print is_mmc_active('') ? 'active' : ''; ?>">
            <a class="stretched-link mmc-stretched-link " href="<?php print get_the_permalink(); ?>"></a>
            <div class="mmc-page-nav-item--text">Get to Know<br><span>The Basics</span></div>
            <div class="mmc-page-nav-item--bg" style="background: url('<?= get_template_directory_uri(); ?>/assets/img/mmc/Get-to-know2024.webp') no-repeat center / cover;"></div>
        </div>

        <div class="mmc-page-nav-item <?php print is_mmc_active('methods') ? 'active' : ''; ?>">
            <a class="stretched-link mmc-stretched-link" href="<?php print get_the_permalink(); ?>/methods"></a>
            <div class="mmc-page-nav-item--text">Cooking Methods To<br><span>Up Your Game</span></div>
            <div class="mmc-page-nav-item--bg" style="background: url('<?= get_template_directory_uri(); ?>/assets/img/mmc/Cooking-Methods2024.webp') no-repeat center / cover;"></div>
        </div>

        <div class="mmc-page-nav-item <?php print is_mmc_active('tips') ? 'active' : ''; ?>">
            <a class="stretched-link mmc-stretched-link" href="/tips-recipes"></a>
            <div class="mmc-page-nav-item--text">Recipes For<br><span>Any Occasion</span></div>
            <div class="mmc-page-nav-item--bg" style="background: url('<?= get_template_directory_uri(); ?>/assets/img/mmc/Recipes2024.webp') no-repeat center / cover;"></div>
        </div>
        <!-- /.col-12 -->
    </div>
    <div class="main-carousel" data-flickity='{ "prevNextButtons": false }'>
        <div id="carrousel-cell-1" class="carousel-cell <?php print is_mmc_active('tips') ? 'c-active' : ''; ?>" style="background: url('<?= get_template_directory_uri(); ?>/assets/img/mmc/Get-to-know2024.webp') no-repeat center / cover;">
            <a class="stretched-link mmc-stretched-link" href="<?php print get_the_permalink(); ?>"></a>
            <div class="mmc-page-nav-item--text">Get to Know <br><span>The Basics</span></div>
        </div>
        <div id="carrousel-cell-2" class="carousel-cell <?php print is_mmc_active('tips') ? 'c-active' : ''; ?>" style="background: url('<?= get_template_directory_uri(); ?>/assets/img/mmc/Cooking-Methods2024.webp') no-repeat center / cover;">
            <a class="stretched-link mmc-stretched-link" href="<?php print get_the_permalink(); ?>methods"></a>
            <div class="mmc-page-nav-item--text">Cooking Methods To <br><span>Up Your Game</span></div>

        </div>
        <div id="carrousel-cell-3" class="carousel-cell" style="background: url('<?= get_template_directory_uri(); ?>/assets/img/mmc/Recipes2024.webp') no-repeat center / cover;">
            <a class="stretched-link mmc-stretched-link" href="/tips-recipes"></a>
            <div class="mmc-page-nav-item--text">Recipes For <br><span>Any Occasion</span></div>
        </div>
        ...
    </div>

    </div>

    <?php if ($active_page == ''): ?>
        <div class="container">
            <div class="row mb-4">
                <div class="col-12">
                    <h1 class="text-white">Know your Cuts</h1>
                </div>
                <!-- /.col-12 -->
            </div>
            <!-- /.row -->

            <div class="row">
                <div class="col-lg-6 the-pig">
                    <?php get_template_part('inc/pig', 'svg'); ?>
                </div>
                <div class="col-lg-6 the-cow">
                    <?php get_template_part('inc/cow', 'svg'); ?>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-md-9 mx-auto">

                    <div id="pcut-1" class="cut-item cuts-shown">
                        <h4>1. Leg</h4>
                        <p>Ham comes from the hind leg and has usually either been cured or smoked prior to purchase. Fresh, uncured ham is a melt-in-your-mouth treat when it's cooked low and slow. There's a slew of other bone-in and boneless options, from specialty cuts like prosciutto and serrano to both the popular city ham and its saltier, chewier cousin, country ham. No matter how you slice it, ham makes a tasty meal. </p>

                        <?php render_cut_products('pork', 1); ?>
                    </div>
                    <!-- /.cut-item -->

                    <div id="pcut-2" class="cut-item">
                        <h4>2. Loin</h4>
                        <p>One of the most tender and lean cuts of pork, the loin is cut right from the back. At the meat counter, you will find it sliced wide and flat, and sold both as boneless and bone-in. Best grilled or roasted, pork loin is an easy way to get a juicy, tasty cut of meat for dinner any night of the week. Try it in chops, as a roast or tenderloin, or as country style ribs. </p>

                        <?php render_cut_products('pork', 2); ?>
                    </div>
                    <!-- /.cut-item -->
                    <div id="pcut-3" class="cut-item">
                        <h4>3. Butt</h4>
                        <p>Pork butt, also called the Boston butt or the shoulder butt, actually comes from the front shoulder. Often thicker and marbled with fat throughout, this cut is a little more substantial than the pork picnic, which it's often confused with. Try pulled pork with the butt because it holds up well when slow cooked and delivers meat that falls off the bone. Other cuts you'll find from the pork butt include the boneless blade roast, bone-in blade roast, blade steak, and country-style ribs.</p>

                        <?php render_cut_products('pork', 3); ?>
                    </div>
                    <!-- /.cut-item -->
                    <div id="pcut-4" class="cut-item">
                        <h4>4. Picnic</h4>
                        <p>Pork picnic goes by several names: shoulder picnic, pork shoulder, picnic shoulder, picnic ham, even picnic hocks. They are all variations on basically the same cut. The picnic is not to be confused with the pork butt, a thicker cut that is higher up the shoulder. Whatever you call it, pork picnic is great roasted, slow cooked, or smoked, and sliced like ham. </p>

                        <?php render_cut_products('pork', 4); ?>
                    </div>
                    <!-- /.cut-item -->
                    <div id="pcut-5" class="cut-item">
                        <h4>5. Side</h4>
                        <p>The side consists of two basic parts: the belly and the ribs. If you are going for great taste, bet on pork belly. This nostalgic and versatile cut is packed with flavor-adding fat. This is where bacon comes from after it has been cured and salted, but it can also be cooked fresh, either braised or roasted. Whether it's the centerpiece of your dish, or used a key ingredient or decadent appetizer, bellies are extremely versatile and flavorful, making any occasion special. </p>
                        <p>Pork Ribs come in all sorts of shapes and sizes, and each is tasty in their own way. Backribs come from the blade section of the loin and are the smallest and most tender of the rib cuts. Spareribs, to include St Louis style sparerib, come from the belly section, with larger bones surrounded by more fat and flavor. A little less meaty than other cuts, their bigger size helps bring bigger taste. Whichever kind you go for, cook with a dry or wet rub to enhance the flavor. </p>

                        <?php render_cut_products('pork', 5); ?>
                    </div>

                    <div id="beef-1" class="cut-item">
                        <h4>1. Chuck</h4>
                        <p>The chuck primal comes from the shoulder area and yields cuts known for their rich, beefy flavor. Packed with muscle, chuck requires a little longer cook time, but it's high fat content and affordable price make it a tasty and accessible option. Available in a variety of roasts, chuck is traditionally braised or turned into ground beef, but the recent rise in popularity of flat iron steak has brought a new audience and appreciation for this humble cut. </p>

                        <?php render_cut_products('beef', 1); ?>
                    </div>
                    <!-- /.cut-item -->

                    <div id="beef-2" class="cut-item">
                        <h4>2. Brisket</h4>
                        <p>The brisket primal comes from the animal's breast area and is the perfect cut to cook low and slow. Braising, smoking and roasting are all good ways to make sure your brisket comes out tender and juicy. Try it in a long-simmering roasting pot, a slow cooker, or smoked all day. </p>

                        <?php render_cut_products('beef', 2); ?>
                    </div>
                    <!-- /.cut-item -->
                    <div id="beef-3" class="cut-item">
                        <h4>3. Shank</h4>
                        <p>The primal cut known as the shank is a portion of the animal's leg &ndash; and as such, it's pretty packed with muscle and tendon. To get it tender, braise the meat low and slow, like in an osso buco, a traditional Italian dish made with cross-cut shanks, vegetables and broth.</p>

                        <?php render_cut_products('beef', 3); ?>
                    </div>
                    <!-- /.cut-item -->
                    <div id="beef-4" class="cut-item">
                        <h4>4. Ribs</h4>
                        <p>The rib primal is situated under the front section of the backbone and is packed with some of the most popular beef cuts. The ribeye steak and the prime rib roast both come from this tender and flavorful primal. </p>

                        <?php render_cut_products('beef', 4); ?>
                    </div>
                    <!-- /.cut-item -->
                    <div id="beef-5" class="cut-item">
                        <h4>5. Plate</h4>
                        <p>Right under the ribs is the plate primal cut, sometimes referred to as short plate or long plate, depending on, well, its length. It's a somewhat fatty area, making the short ribs and skirt steaks cut from this part of the animal tender and flavorful. For a quick and delicious entrée, make fajitas with inside skirt steak. In minutes, cooks of every skill level can make a simple, tasty meal. </p>

                        <?php render_cut_products('beef', 5); ?>
                    </div>
                    <!-- /.cut-item -->
                    <div id="beef-6" class="cut-item">
                        <h4>6. Short Loin</h4>
                        <p>Directly under the backbone is the loin primal cut, home to some of the most tender and desirable cuts of meat. It's where you find the tenderloin, strip steak, T-bone steak and porterhouse steak. Each of these cuts is great cooked on the dry heat of the grill or broiled. For a rich and smoothly textured piece of beef, you can't go wrong with the short loin. </p>

                        <?php render_cut_products('beef', 6); ?>
                    </div>
                    <!-- /.cut-item -->
                    <div id="beef-7" class="cut-item">
                        <h4>7. Flank</h4>
                        <p>Located just below the loin, the flank primal is a delicious, affordable alternative cut. Flank steak is best when marinated and then grilled quickly at a high temperature. When serving, make sure to slice against the grain to ensure the most tender eating experience. </p>

                        <?php render_cut_products('beef', 7); ?>
                    </div>
                    <!-- /.cut-item -->
                    <div id="beef-8" class="cut-item">
                        <h4>8. Top Sirloin</h4>
                        <p>A versatile and flavorful cut, the Top Sirloin Steak is best for grilling. It can be cut and served as a steak or cut into smaller portions for kabobs. The Top Sirloin Steak carries an intense depth of flavor similar to a roast but cooks easy and quick like a steak. Top Sirloin Steaks are easy to prepare and are generally more affordable than other cuts which gained it the reputation as the "weeknight steak."</p>
                        <h4>Bottom Sirloin</h4>
                        <p>Known for leaner cuts of meat like the Tri-Tip and Sirloin Bavette, cuts from the Bottom Sirloin are best for roasting or grilling. This cut is often ground up to make burgers or thinly sliced for fajitas and barbecue. </p>

                        <?php render_cut_products('beef', 8); ?>
                    </div>
                    <!-- /.cut-item -->
                    <div id="beef-9" class="cut-item">
                        <h4>9. Tenderloin</h4>
                        <p>Found within the loin, beef tenderloin is among the most tender cuts of beef. Extending from the short loin into the sirloin, the filet mignon and chateaubriand come from the tenderloin cut. Due to the tenderness of the meat, beef tenderloin is great when cooked using dry-heat methods such as grilling or broiling. </p>

                        <?php render_cut_products('beef', 9); ?>
                    </div>
                    <!-- /.cut-item -->
                    <div id="beef-10" class="cut-item">
                        <h4>10. Sirloin</h4>
                        <p>The sirloin primal hosts a variety of cuts, but it's first separated into the top sirloin and bottom sirloin. From this primal, you'll find cuts that are great for roasting or grilling like the tri-tip and sirloin bavette. For a delicious, juicy meal with any sirloin, marinate before cooking to retain moisture and add a kick of flavor. </p>

                        <?php render_cut_products('beef', 10); ?>
                    </div>
                    <!-- /.cut-item -->
                    <div id="beef-11" class="cut-item">
                        <h4>11. Round</h4>
                        <p>If you want a roast, choose the round primal cut. The round is made up of the rump and hind legs of the animal. It is lean, inexpensive and delicious when slowly roasted. Round roasts are typically divided into three main sections: the top round, bottom round and the knuckle, also known as the sirloin tip. No matter which cut you land on, set some time aside to bring the natural flavors into a juicy, rich dish. </p>

                        <?php render_cut_products('beef', 11); ?>
                    </div>
                </div>
            </div>
        </div>

    <?php elseif ($active_page == 'methods'): ?>
        <script>
            window.addEventListener('load', function() {

                const slider = document.querySelector('.flickity-slider');

                if (slider) {
                    slider.style.transform = 'translateX(-54.11%)';
                    console.log('translate')

                }

                const carouselCells = document.querySelectorAll('.carousel-cell');
                const dots = document.querySelectorAll('.dot');


                if (carouselCells.length >= 2) {
                    carouselCells[0].classList.remove('is-selected');
                    dots[0].classList.remove('is-selected');

                    carouselCells[1].classList.add('is-selected');
                    dots[1].classList.add('is-selected');
                }

            });
        </script>
        <section class="">
            <div class="container container-meat cooking-methods">
                <div class="left-section">
                    <div class="row">
                        <div class="col-12">
                            <div class="mmc-page-nav-item--text mmc-page-nav-pick-span">Pick your<br><span>Prep</span></div>
                            <div class="game-nav mmc-game-nav">
                                <div class="mmc-gn-item active" data-method="sear" data-target=".hm-sear">
                                    <div class="inner">Sear</div>
                                    <!-- /.inner -->
                                </div>
                                <!-- /.gn-item -->
                                <div class="mmc-gn-item" data-method="roast" data-target=".hm-roast">
                                    <div class="inner">Roast</div>
                                </div>
                                <!-- /.gn-item -->
                                <div class="mmc-gn-item" data-method="grill" data-target=".hm-grill">
                                    <div class="inner">Grill</div>
                                </div>
                                <!-- /.gn-item -->
                                <div class="mmc-gn-item" data-method="smoke" data-target=".hm-smoke">
                                    <div class="inner">Smoke</div>
                                </div>
                                <!-- /.gn-item -->
                                <div class="mmc-gn-item" data-method="braise" data-target=".hm-braise">
                                    <div class="inner">Braise</div>
                                </div>
                                <!-- /.gn-item -->
                                <div class="mmc-gn-item" data-method="sous-vide" data-target=".hm-sv">
                                    <div class="inner">Sous Vide</div>
                                </div>
                                <!-- /.gn-item -->
                                <div class="mmc-gn-item" data-method="quick-p" data-target=".hm-quick-p">
                                    <div class="inner">Quick Prep</div>
                                </div>
                                <!-- /.gn-item -->
                            </div>
                            <!-- /.game-nav -->
                        </div>
                        <!-- /.col-12 -->
                    </div>
                </div>
                <div class="right-section">
                    <div class="hm-sear mmc-game-nav-content gn-open">
                        <div class="row">
                            <div class="col-12 col-md-10 mx-auto">
                                <div class="mmc-page-nav-item--text mmc-page-art-of">
                                    <div class="mmc-page-art-of-title">THE ART OF<br><span>SEARING</span></div>
                                    <p>While it doesn't take long to make a good sear, the results will go a long way and speak for themselves. Searing builds a textured crust that surrounds the inner, tender delicacy within. It locks in flavor with a caramelized crust and brings a professional edge to whatever you're making. If a recipe ever says searing is an optional step &ndash; trust us &ndash; sear the meat. The difference a good sear can make is palatable.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="hm-roast mmc-game-nav-content">
                        <div class="row">
                            <div class="col-12 col-md-10 mx-auto">
                                <div class="mmc-page-nav-item--text mmc-page-art-of">
                                    <div class="mmc-page-art-of-title">THE ART OF<br><span>ROAST</span></div>
                                    <p>While it may not seem like one would come from the other, if you're looking to create tender, juicy flavors from the inside-out, look no further than dry heat. Well, a dry-heat cooking style known as roasting. This style of cooking really allows the protein to take center stage and uses simple ingredients to pack a flavorful punch. The best part? No matter what protein you use, you'll create a showstopping meal that will bring everyone together.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="hm-grill mmc-game-nav-content">
                        <div class="row">
                            <div class="col-12 col-md-10 mx-auto">
                                <div class="mmc-page-nav-item--text mmc-page-art-of">
                                    <div class="mmc-page-art-of-title"> THE ART OF<br><span>GRILL</span></div>
                                    <p>Let's face it, grilling isn't a cooking technique, it's a national pastime. In fact, it's a whole culture. And knowing your grill, having the right tools, and using quality meat can turn a simple grill out into a whole get together. A clean grill at the start of every session can yield results every backyard griller dreams of. So crack one open and fire 'em up. </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="hm-smoke mmc-game-nav-content">
                        <div class="row">
                            <div class="col-12 col-md-10 mx-auto">
                                <div class="mmc-page-nav-item--text mmc-page-art-of">
                                    <div class="mmc-page-art-of-title"> THE ART OF<br><span>SMOKING</span></div>
                                    <p>The art of smoking is one that requires time and patience. But what you're rewarded with is a full-bodied, smoky-flavored scrumptious piece of heaven that'll have everyone gathering around. But before you run to throw your protein on the rack, be sure to flavorize it with plenty of marinades, sauces or rubs. Leave it on its back to cook through, but keep an eye on the temperature and ventilation while you sit back and crack open a cold one. </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="hm-braise mmc-game-nav-content">
                        <div class="row">
                            <div class="col-12 col-md-10 mx-auto">
                                <div class="mmc-page-nav-item--text mmc-page-art-of">
                                    <div class="mmc-page-art-of-title"> THE ART OF<br><span>BRAISE</span></div>
                                    <p>Braising meat is the art of fall-off-the-bone indulgence. This style of cooking is for those who like their flavor bold from letting the seasonings soak into the meat over time. Because this longer cooking method produces meat that is more tender and delectable as time goes on, it also makes it harder to overcook. Meaning it is especially helpful when cooking tougher cuts of meat like short ribs, brisket, pork shoulder (pulled pork), chuck roast (pot roast). </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="hm-sv mmc-game-nav-content">
                        <div class="row">
                            <div class="col-12 col-md-10 mx-auto">
                                <div class="mmc-page-nav-item--text mmc-page-art-of">
                                    <div class="mmc-page-art-of-title"> THE ART OF<br><span>SOUS VIDE</span></div>
                                    <p>If precision is your name, then sous vide is your game. Pronounced like "Sue-Veed," this slow cooking method dials into exact temperatures, down to the half degree. Using a vacuum-sealed bag, you can and should cook multiple pieces of meat all at once and surround them with aromatics and seasonings. This allows for maximum flavor to penetrate your proteins as they cook. </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="hm-quick-p mmc-game-nav-content">
                        <div class="row">
                            <div class="col-12 col-md-10 mx-auto">
                                <div class="mmc-page-nav-item--text mmc-page-art-of">
                                    <div class="mmc-page-art-of-title">THE ART OF<br><span>QUICK PREP</span></div>
                                    <p>Ready to eat and ideal for those who prefer to spend their time and energy exploring new flavors and food combinations, Quick Prep requires little, if any, cooking effort. And with Swift constantly bringing new products to the table, you’ll always have fresh, innovative options that help you think—and snack—outside the box. </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="hm-sear mmc-game-nav-content mmc-game-nav-content-cards gn-open">
                        <div class="container padded">
                            <div class="row">
                                <div class="col-12 col-md-6 mb-4">
                                    <img alt="SwiftMeats Sear" src="<?= get_template_directory_uri(); ?>/assets/img/mmc/mmc-sear-1-v2.png" style="width: 100%;" />
                                </div>
                                <div class="col-12 col-md-6 mb-4">
                                    <img alt="SwiftMeats Sear" src="<?= get_template_directory_uri(); ?>/assets/img/mmc/mmc-sear-2-v2.png" style="width: 100%;" />
                                </div>
                                <div class="col-12 col-md-6 mb-4 mb-md-0">
                                    <img alt="SwiftMeats Sear" src="<?= get_template_directory_uri(); ?>/assets/img/mmc/mmc-sear-3-v2.png" style="width: 100%;" />
                                </div>
                                <div class="col-12 col-md-6 mb-4 mb-md-0">
                                    <img alt="SwiftMeats Sear" src="<?= get_template_directory_uri(); ?>/assets/img/mmc/mmc-sear-4-v2.png" style="width: 100%;" />
                                </div>
                            </div>
                        </div>

                        <div class="py-5 px-5">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12 col-md-10 mx-auto">
                                        <h2 class="mmc-game-nav-cooking-process">Cooking Process <br>
                                            <span>for Searing</span>
                                        </h2>

                                        <ol class="mmc-ordered-list text-blue mt-4">
                                            <li><span>Searing isn't just for steaks &ndash; it's also great for burgers, pork chops, chicken, fish and even eggplant for vegetarians.</span></li>
                                            <li><span>Using a cast-iron pan, or any pan that retains heat, is best since they can withstand high heat.</span></li>
                                            <li><span>Before searing, allow your choice cut to come to room temperature, so meat cooks evenly.</span></li>
                                            <li><span>Season your meat well to set it up for a delectable crust. Be aware, too much seasoning could cause scorching.</span></li>
                                            <li><span>For a crunchy sear, get your pan HOT! Like over 500&deg;F. This is why having a heavy-duty pan is important.</span></li>
                                            <li><span>Once the pan is hot, lay your cut down flat. You want to hear a furious crackle as it hits your pan. That's how you
                                                    know it's piping hot.</span></li>
                                            <li><span>Place a steak weight, smaller pan or metal plate on top to flatten out the meat and get all the corners down.</span></li>
                                            <li><span>Don't forget to lay the meat on its thin sides for a few seconds to connect the crust you're creating on both sides.</span></li>
                                            <li><span>Once cooked to your liking, remove the meat from the pan and DO NOT CUT IT. Allow it to rest for five minutes or else all the delicious juices you locked in with your sear will flood your plate.</span></li>
                                            <li><span>Once rested, plate that baby and cut through that beautiful, caramelized crust for a juicy, flavorful meal.</span></li>

                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="hm-roast mmc-game-nav-content mmc-game-nav-content-cards">
                        <div class="container padded">
                            <div class="row">
                                <div class="col-12 col-md-6 mb-4">
                                    <img alt="SwiftMeats Roasts" src="<?= get_template_directory_uri(); ?>/assets/img/mmc/mmc-roast-1-v2.png" style="width: 100%;" />
                                </div>
                                <div class="col-12 col-md-6 mb-4">
                                    <img alt="SwiftMeats Roasts" src="<?= get_template_directory_uri(); ?>/assets/img/mmc/mmc-roast-2-v2.png" style="width: 100%;" />
                                </div>
                                <div class="col-12 col-md-6 mb-4 mb-md-0">
                                    <img alt="SwiftMeats Roasts" src="<?= get_template_directory_uri(); ?>/assets/img/mmc/mmc-roast-3-v2.png" style="width: 100%;" />
                                </div>
                                <div class="col-12 col-md-6 mb-4 mb-md-0">
                                    <img alt="SwiftMeats Roasts" src="<?= get_template_directory_uri(); ?>/assets/img/mmc/mmc-roast-4-v2.png" style="width: 100%;" />
                                </div>
                            </div>
                        </div>

                        <div class="py-5 px-5">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12 col-md-10 mx-auto">
                                        <h2 class="mmc-game-nav-cooking-process">Cooking Process <br>
                                            <span>for Roasting</span>
                                        </h2>

                                        <ol class="mmc-ordered-list text-blue mt-4">
                                            <li><span>Take your meat out of the fridge at least 2 hours prior to cooking to help control doneness and cook evenly.</span></li>
                                            <li><span>Preheat your oven for at least 20 min. so that your meat starts cooking at the proper temperature from the beginning.</span></li>
                                            <li><span>Place meat into a wide roasting pan or baking tray so it has room for circulation. </span></li>
                                            <li><span>Using a rack inside your pan helps, create flow and helps the meat cook thoroughly and evenly. </span></li>
                                            <li><span>Tying up your roast helps make the meat the same thickness throughout so it cooks evenly. You can always ask your butcher for help and some meats come pre-tied for your convenience.</span></li>
                                            <li><span>Cover the meat in oil or butter to help the salt and pepper stick to it as it is dry-cooked.</span></li>
                                            <li><span>Place the tied roast into the oven and let that baby marinate in the heat. Some recipes call for low and slow, while others cook high and fast. </span></li>
                                            <li><span>Remember, every time you open the oven, you lose 50ºF. So don't peek!</span></li>
                                            <li><span>When the timer goes off, test the meat's internal temperature to make sure it has reached the desired doneness. Be sure to test the meatiest part of the roast. Bones will affect the accuracy of the temperature reading.</span></li>
                                            <li><span>Let that roasted bad boy rest for about 10-15 minutes before you dig in and devour. </span></li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="hm-grill mmc-game-nav-content mmc-game-nav-content-cards">
                        <div class="container padded">
                            <div class="row">
                                <div class="col-12 col-md-6 mb-4">
                                    <img alt="SwiftMeats Grill" src="<?= get_template_directory_uri(); ?>/assets/img/mmc/mmc-grill-1-v2.png" style="width: 100%;" />
                                </div>
                                <div class="col-12 col-md-6 mb-4">
                                    <img alt="SwiftMeats Grill" src="<?= get_template_directory_uri(); ?>/assets/img/mmc/mmc-grill-2-v2.png" style="width: 100%;" />
                                </div>
                                <div class="col-12 col-md-6 mb-4 mb-md-0">
                                    <img alt="SwiftMeats Grill" src="<?= get_template_directory_uri(); ?>/assets/img/mmc/mmc-grill-3-v2.png" style="width: 100%;" />
                                </div>
                                <div class="col-12 col-md-6 mb-4 mb-md-0">
                                    <img alt="SwiftMeats Grill" src="<?= get_template_directory_uri(); ?>/assets/img/mmc/mmc-grill-4-v2.png" style="width: 100%;" />
                                </div>
                            </div>
                        </div>

                        <div class="py-5 px-5">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12 col-md-10 mx-auto">
                                        <h2 class="mmc-game-nav-cooking-process">Cooking Process <br>
                                            <span>for Grilling</span>
                                        </h2>

                                        <ol class="mmc-ordered-list text-blue mt-4">
                                            <li><span>Pat your cuts dry with a paper towel or lint-free kitchen towel. Moisture can hold back the perfect caramelized sear. </span></li>
                                            <li><span>Salt and pepper your meats so the salt can bring the moisture to the surface of your cut.</span></li>
                                            <li><span>Slap it on the grill and leave it to sit in the flames a few minutes to get those beautiful grill marks. </span></li>
                                            <li><span> Once the browning, or "fond," is formed, flip it over to cook it through evenly. </span></li>
                                            <li><span>After the meat is cooked through, let it rest. A cooled exterior helps retain the juices and flavors on the inside.</span></li>
                                            <li><span>You've let it rest for 5-10 minutes &ndash; 20 minutes for the thicket, cuts &ndash; and now it's time to eat! </span></li>
                                            <li><span>Slice against the grain and admire your grilled-to-perfection handiwork.</span></li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="hm-smoke mmc-game-nav-content mmc-game-nav-content-cards">
                        <div class="container padded">
                            <div class="row">
                                <div class="col-12 col-md-6 mb-4">
                                    <img alt="SwiftMeats Smoke" src="<?= get_template_directory_uri(); ?>/assets/img/mmc/mmc-smoke-1-v2.png" style="width: 100%;" />
                                </div>
                                <div class="col-12 col-md-6 mb-4">
                                    <img alt="SwiftMeats Smoke" src="<?= get_template_directory_uri(); ?>/assets/img/mmc/mmc-smoke-2-v2.png" style="width: 100%;" />
                                </div>
                                <div class="col-12 col-md-6 mb-4 mb-md-0">
                                    <img alt="SwiftMeats Smoke" src="<?= get_template_directory_uri(); ?>/assets/img/mmc/mmc-smoke-3-v2.png" style="width: 100%;" />
                                </div>
                                <div class="col-12 col-md-6 mb-4 mb-md-0">
                                    <img alt="SwiftMeats Smoke" src="<?= get_template_directory_uri(); ?>/assets/img/mmc/mmc-smoke-4-v2.png" style="width: 100%;" />
                                </div>
                            </div>
                        </div>

                        <div class="py-5 px-5">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12 col-md-10 mx-auto">
                                        <h2 class="mmc-game-nav-cooking-process">Cooking Process <br>
                                            <span>for Smoking</span>
                                        </h2>

                                        <ol class="mmc-ordered-list text-blue mt-4">
                                            <li><span>Choose your meat-smoking timeline &ndash; a few hours, an afternoon or an all-day affair. </span></li>
                                            <li><span>Use the right wood. Wood pellets and pellet smokers are easy to use and great for beginners. Wood chips bring the flavor. And wood chunks really bring the flavor and the whole neighborhood. Also note, soaked wood lasts longer, but drier wood creates a sharper smoke flavor. </span></li>
                                            <li><span>Use indirect heat to cook, averaging between 200-250F to produce a juicy piece of meat.</span></li>
                                            <li><span>When it comes to flavor, use plenty of marinades, sauces or rubs &ndash; oh my!</span></li>
                                            <li><span>Place your protein on the rack and leave it be. Keep an eye on the temperature, but there's no need to flip the meat. </span></li>
                                            <li><span>The right ventilation makes all the difference. You want enough to keep the wood burning, but not so much where you lose smoke and flavor. </span></li>
                                            <li><span>A Bluetooth or infrared thermometer will help ensure you cook your meat to the perfect internal temperature. </span></li>
                                            <li><span>Remember when we said leave the meat alone? We mean it. Checking the meat obsessively will result in a major flavor loss. </span></li>
                                            <li><span>A good sign of a well-smoked meat? The infamous "smoke ring." </span></li>
                                            <li><span>Enjoy the deliciously burnt-ended, crusted fruits of your labor.</span></li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="hm-braise mmc-game-nav-content mmc-game-nav-content-cards">
                        <div class="container padded">
                            <div class="row">
                                <div class="col-12 col-md-6 mb-4">
                                    <img alt="SwiftMeats Braise" src="<?= get_template_directory_uri(); ?>/assets/img/mmc/mmc-braise-1-v2.png" style="width: 100%;" />
                                </div>
                                <div class="col-12 col-md-6 mb-4">
                                    <img alt="SwiftMeats Braise" src="<?= get_template_directory_uri(); ?>/assets/img/mmc/mmc-braise-2-v2.png" style="width: 100%;" />
                                </div>
                                <div class="col-12 col-md-6 mb-4 mb-md-0">
                                    <img alt="SwiftMeats Braise" src="<?= get_template_directory_uri(); ?>/assets/img/mmc/mmc-braise-3-v2.png" style="width: 100%;" />
                                </div>
                                <div class="col-12 col-md-6 mb-4 mb-md-0">
                                    <img alt="SwiftMeats Braise" src="<?= get_template_directory_uri(); ?>/assets/img/mmc/mmc-braise-4-v2.png" style="width: 100%;" />
                                </div>
                            </div>
                        </div>

                        <div class="py-5 px-5">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12 col-md-10 mx-auto">
                                        <h2 class="mmc-game-nav-cooking-process">Cooking Process <br>
                                            <span>for Braising</span>
                                        </h2>

                                        <ol class="mmc-ordered-list text-blue mt-4">
                                            <li><span>Sear your meat on all sides to seal in moisture and flavor with a carmelized and textured crust. </span></li>
                                            <li><span>Remove meat from your searing pan and add in aromatics such as garlic, onion, and herbs or spices to build flavor.</span></li>
                                            <li><span>Brazen aromatics intensify the flavor of your meat and your braising liquid.</span></li>
                                            <li><span>Deglaze your pan with your braising liquid, scraping up any brown bits, or "fond," from the bottom of the pan. Brown bits = big flavor. </span></li>
                                            <li><span>Bring your braising liquid to a boil, add your meat back in, and cover to cook to perfection.</span></li>
                                            <li><span>Some use the stove and others use an oven, but everyone gets the tenderness they sought to achieve.</span></li>
                                            <li><span>Depending on your type of meat, braising can range from 45 minutes to 8 hours.</span></li>
                                            <li><span>Remember, tending to your liquid levels periodically will promise you a worthwhile result.</span></li>
                                            <li><span>Using two forks or a low-speed hand mixer, shred your meat to release the savory goodness.</span></li>
                                            <li><span>Enjoy the flavors of your labor.</span></li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="hm-sv mmc-game-nav-content mmc-game-nav-content-cards">
                        <div class="container padded">
                            <div class="row">
                                <div class="col-12 col-md-6 mb-4">
                                    <img alt="SwiftMeats Sous Vide" src="<?= get_template_directory_uri(); ?>/assets/img/mmc/mmc-sv-1-v2.png" style="width: 100%;" />
                                </div>
                                <div class="col-12 col-md-6 mb-4">
                                    <img alt="SwiftMeats Sous Vide" src="<?= get_template_directory_uri(); ?>/assets/img/mmc/mmc-sv-2-v2.png" style="width: 100%;" />
                                </div>
                                <div class="col-12 col-md-6 mb-4 mb-md-0">
                                    <img alt="SwiftMeats Sous Vide" src="<?= get_template_directory_uri(); ?>/assets/img/mmc/mmc-sv-3-v2.png" style="width: 100%;" />
                                </div>
                                <div class="col-12 col-md-6 mb-4 mb-md-0">
                                    <img alt="SwiftMeats Sous Vide" src="<?= get_template_directory_uri(); ?>/assets/img/mmc/mmc-sv-4-v2.png" style="width: 100%;" />
                                </div>
                            </div>
                        </div>

                        <div class="py-5 px-5">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12 col-md-10 mx-auto">
                                        <h2 class="mmc-game-nav-cooking-process">Cooking Process <br>
                                            <span>for Sous Vide</span>
                                        </h2>

                                        <ol class="mmc-ordered-list text-blue mt-4">
                                            <li><span>Season your protein of choice for your sous vide, and season it well with a generous amount of salt, favorite herbs, spices or pastes. </span></li>
                                            <li><span>Secure your protein with your aromatics into a food-grade vacuum sealing bag.</span></li>
                                            <li><span>Seal the deal with your vacuum sealer to lock in all that delicious seasoning.</span></li>
                                            <li><span>Set your water's temperature and start the timer to begin cooking your soon-to-be-stunning meal. </span></li>
                                            <li><span>Once the water has reached the desired temperature, drop in your sealed bags and let the sous vide machine work its magic.</span></li>
                                            <li><span>When your meat reaches the temperature you set, take it out to rest and soak up any last bit of seasoning. About 15-20 minutes.</span></li>
                                            <li><span>Some meats are delicious as is, while others benefit from a little searing to lock in robust flavors. Be sure to dry your meat thoroughly before searing.</span></li>
                                            <li><span>Sear your creation in a searing-hot pan on all sides to create that *chef's kiss* seasoned crust on the outside.</span></li>
                                            <li><span>Searing should be a quick process (1-2 minutes) as your protein is already cooked from the sous vide.</span></li>
                                            <li><span>Relish in your delectable efforts.</span></li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="hm-quick-p mmc-game-nav-content mmc-game-nav-content-cards">
                        <div class="container padded">
                            <div class="row">
                                <div class="col-12 col-md-6 mb-4">
                                    <img alt="SwiftMeats Quick Preparation" src="<?= get_template_directory_uri(); ?>/assets/img/mmc/mmc-quick-p-1-v2.png" style="width: 100%;" />
                                </div>
                                <div class="col-12 col-md-6 mb-4">
                                    <img alt="SwiftMeats Quick Preparation" src="<?= get_template_directory_uri(); ?>/assets/img/mmc/mmc-quick-p-2-v2.png" style="width: 100%;" />
                                </div>
                                <div class="col-12 col-md-6 mb-4 mb-md-0">
                                    <img alt="SwiftMeats Quick Preparation" src="<?= get_template_directory_uri(); ?>/assets/img/mmc/mmc-quick-p-3-v2.png" style="width: 100%;" />
                                </div>
                                <div class="col-12 col-md-6 mb-4 mb-md-0">
                                    <img alt="SwiftMeats Quick Preparation" src="<?= get_template_directory_uri(); ?>/assets/img/mmc/mmc-quick-p-4-v2.png" style="width: 100%;" />
                                </div>
                            </div>
                        </div>

                        <div class="py-5 px-5">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12 col-md-10 mx-auto">
                                        <h2 class="mmc-game-nav-cooking-process">Cooking Process <br>
                                            <span>for Quick Prep</span>
                                        </h2>

                                        <ol class="mmc-ordered-list text-blue mt-4">
                                            <li><span>Pull your meat out of the package and enjoy!</span></li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="#know-your-cuts"><button class="mmc-gn-item active back-to-top-meat">BACK TO TOP</button></a>
                </div>
        </section>


        </div>




    <?php elseif ($active_page == 'tips'): ?>
        <div class="container">
            <?php if (have_rows('recipe_tabs')): ?>
                <div class="d-flex mb-5 mmc-recipe-tabs">
                    <?php while (have_rows('recipe_tabs')): the_row(); ?>
                        <a href="#" data-target="#recipes-<?php print sanitize_title(get_sub_field('tab_name')); ?>" class="btn gold-btn flex-grow-1 mx-2 <?php if (get_row_index() == 1) {
                                                                                                                                                                print 'active';
                                                                                                                                                            } ?>"><?php print get_sub_field('tab_name'); ?></a>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>

            <?php if (have_rows('recipe_tabs')): ?>
                <?php while (have_rows('recipe_tabs')): the_row(); ?>
                    <div class="mmc-recipe-tabs-content <?php if (get_row_index() == 1) {
                                                            print 'active';
                                                        } ?>" id="recipes-<?php print sanitize_title(get_sub_field('tab_name')); ?>">
                        <?php get_template_part('inc/tips', 'meatmasterclass'); ?>
                    </div>
                <?php endwhile; ?>

            <?php endif; ?>
        </div>
    <?php endif; ?>

    <script>
        var activeTip = <?php print isset($_GET['tip']) ? $_GET['tip'] : 'null'; ?>;
    </script>
    <!-- /.row -->
    <!-- /.container -->
</section>
<!-- /#know-your-cuts -->

<?php get_footer(); ?>
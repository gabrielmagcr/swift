<?php
    /* 
 Template Name: page-tailgate-with-swift
 */
get_header(); ?>

<img src="<?php print get_template_directory_uri(); ?>/assets/img/tailgate/hero.jpg" style="width: 100%;" class="d-none d-md-block" alt="Tailgates Come Together With Swift. From the stadium to your backyard, game time means coming together with good friends, good times, and Swift on the grill." />
<img src="<?php print get_template_directory_uri(); ?>/assets/img/tailgate/hero-mobile.jpg" style="width: 100%;" class="d-md-none" alt="Tailgates Come Together With Swift. From the stadium to your backyard, game time means coming together with good friends, good times, and Swift on the grill." />

<section class="bg-white py-5">

    <div class="tws-container">

        <h2 class="text-trend-four text-center">Tailgate with Swift <br class="d-none d-md-block" />at a Stadium Near You</h2>
        <p class="text-center">Click a ticket below to learn more</p>

        <div class="tws-tickets">
        <?php if(have_rows('tickets')): ?>
        <?php while(have_rows('tickets')): the_row(); ?>
            <div class="tws-ticket" data-toggle="modal" data-target="#ticket-<?php print get_row_index(); ?>" style="--team-a-color: <?php print get_sub_field('team_a_color'); ?>; --team-b-color: <?php print get_sub_field('team_b_color'); ?>">
                <div class="tws-ticket--content">
                    <div class="tws-ticket--title"><?php print get_sub_field('title'); ?></div>
                    <div class="tws-ticket--content-center text-default">
                        <div class="mb-2"><?php print get_sub_field('date'); ?> <?php if(get_sub_field('time')): ?>&bull; <?php print get_sub_field('time'); endif; ?></div>
                        <div><?php print get_sub_field('location'); ?></div>
                    </div>
                    <div class="text-default"><?php print get_sub_field('additional_info'); ?></div>
                    <!-- <div class="mt-2 pl-3">Learn More</div> -->
                </div>
                <div class="ticket-bg d-none d-md-block"><?php require 'assets/img/tailgate/ticket.svg'; ?></div>
                <div class="ticket-bg d-md-none"><?php require 'assets/img/tailgate/ticket-tall.svg'; ?></div>
            </div>
        <?php endwhile; ?>
        <?php endif; ?>
        </div>
    </div>

</section>

<?php if(have_rows('tickets')): ?>
<?php while(have_rows('tickets')): the_row(); ?>
<div class="modal fade tips-modal tws-modal" tabindex="-1" role="dialog" id="ticket-<?php print get_row_index(); ?>" data-id="<?php print get_row_index(); ?>" data-title="<?php print get_sub_field('title'); ?>">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><img src="<?=get_template_directory_uri();?>/assets/img/tailgate/close-gold.svg" alt="Close button"></span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <h2 class="text-center text-trend-four text-white mb-4"><?php print get_sub_field('title'); ?></h2>
                    <div class="row align-items-center justify-content-center mb-4">
                        <div class="col-12 col-md-5">
                            <div class="mb-2">Date: <span class="text-default"><?php print get_sub_field('date'); ?></span></div>
                            
                            <?php if(get_sub_field('time')): ?>
                            <div class="mb-2">Time: <span class="text-default"><?php print get_sub_field('time'); ?></span></div>
                            <?php endif; ?>
                            
                            <div>Place: <a href="<?php print get_sub_field('directions_url'); ?>" target="_blank"><span class="text-default text-white text-decoration-none"><?php print get_sub_field('location'); ?></span></a></div>
                        </div>
                        <div class="col-12 col-md-5 mt-4 mt-md-0">
                            <img alt="<?php print get_sub_field('title'); ?>" src="<?php print get_sub_field('image')['url']; ?>" style="max-width: 100%;width: 100%;" />
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-10">
                            <div>Details:</div>
                            <div class="text-default text-white"><?php print get_sub_field('full_details'); ?></div>
                        </div>
                    </div>
                    
                    <?php if(have_rows('influencers')): ?>
                    <h2 class="text-center text-trend-four text-white mt-4">With Special Guests</h2>
                    <?php while(have_rows('influencers')): the_row(); ?>
                    <div class="row mt-4">
                        <div class="col-12 col-md-4 mb-4 mb-md-0">
                            <div class="tws-photo mx-auto">
                                <div class="inner" style="background: url('<?php print get_sub_field('photo')['url']; ?>') no-repeat center / cover;"></div>
                            </div>
                        </div>
                        <div class="col-12 col-md-8">
                            <div class="mb-3"><span class="text-gold"><?php print get_sub_field('name'); ?>:</span> <strong class="text-default"><?php print get_sub_field('handle'); ?></strong></div>
                            <div class="text-default"><?php print get_sub_field('biography'); ?></div>
                        </div>
                    </div>
                    <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endwhile; ?>
<?php endif; ?>

<section class="bg-primary py-5" style="background: url('<?php print get_template_directory_uri(); ?>/assets/img/tailgate/texture-jersey.jpg') no-repeat center / cover;">

    <div class="container">

        <h2 class="text-trend-four text-white text-center">Enter Our Backyard <br />Tailgate Sweepstakes</h2>
        <p class="text-default text-white text-center my-4">How would you like to kickoff tailgating season with a $25,000 backyard makeover? You will if you win our epic tailgate sweepstakes. Enter by following Swift on Instagram. We're <a class="text-white text-decoration-underline" href="https://instagr.am/Swift__Meats" target="_blank">@Swift__Meats</a>. Then like or comment on our pinned post between 9/1/2022 and 10/15/2022. Winners will be notified by an Instagram direct message.</p>
        <div class="d-flex justify-content-center"><a href="/wp-content/uploads/2022/09/Swift-Meats-Sweepstakes_Official-Rules_8.31.22.pdf" target="_blank" class="btn btn-gold px-5">View Sweepstakes Rules</a></div>


        <div class="row mt-4">
            <div class="col-12 col-md-4 text-center">
                <img src="<?php print get_template_directory_uri(); ?>/assets/img/tailgate/sweep-1.png" style="max-width: 100%;" alt="$25k Backyard Makeover" />
                <p class="mt-4 text-white">Grand Prize: $25,000 Backyard Makeover</p>
            </div>
            <div class="col-12 col-md-4 text-center">
                <img src="<?php print get_template_directory_uri(); ?>/assets/img/tailgate/sweep-2.png" style="max-width: 100%;" alt="Nexgrill Oakford Pellet Grill + $100 Swift Meat Bundle" />
                <p class="mt-4 text-white">Five First Prizes: Nexgrill Oakford Pellet Grill and $100 Swift Meat Bundle</p>
            </div>
            <div class="col-12 col-md-4 text-center">
                <img src="<?php print get_template_directory_uri(); ?>/assets/img/tailgate/sweep-3.png" style="max-width: 100%;" alt="$100 Swift Meat Bundle" />
                <p class="mt-4 text-white">Ten Second Prizes: Swift Meat Bundle</p>
            </div>
        </div>
    </div>
    

</section>



<section class="bg-white py-5 position-relative" style="padding-bottom: 10rem!important;background: url('<?php print get_template_directory_uri(); ?>/assets/img/tailgate/texture-carts.jpg') no-repeat center / cover;">
    <a href="/store-locator" class="stretched-link"></a>
    <div class="tws-container">

        <div class="h2 text-trend-four text-primary text-center">Find Swift At A Store Near You</div>
        <div class="text-center my-3"><img src="<?php print get_template_directory_uri(); ?>/assets/img/tailgate/logos.png" alt="Costco, Food Lion, Winn Dixie" style="max-height: 100px;max-width: 100%;" /></div>
        <div class="text-center"><span class="btn btn-primary px-5">See Additional Retailers</span></div>
    </div>

</section>

<section class="container-fluid">
    <div class="row">
        <div class="col-12 col-md-6 py-5 text-center d-flex align-items-center position-relative" style="min-height: 400px;">
            <div style="max-width: 600px;margin: 0 0 0 auto;">
                <a href="/products" class="stretched-link"></a>
                <h2 class="text-trend-four text-white mb-4">Pick The Products You Want To Grill</h2>
                <span class="btn btn-primary bg-red px-5">Learn More</span>
            </div>
        </div>
        <div class="col-12 col-md-6 py-5 bg-red text-center d-flex align-items-center position-relative" style="min-height: 400px;">
            <div style="max-width: 600px;margin: 0 auto 0 0;">
                <a href="/tips-recipes" class="stretched-link"></a>
                <h2 class="text-trend-four text-white mb-4">Find Recipes To Fire Up Your Tailgate</h2>
                <span class="btn btn-primary px-5">Learn More</span>
            </div>
        </div>
    </div>
</section>

<script>
var activeTicket = <?php print isset($_GET['ticket']) ? $_GET['ticket'] : 'null'; ?>
</script>

<?php get_footer(); ?>
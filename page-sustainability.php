<?php
    /* 
 Template Name: page-sustainability
 */
get_header();?>
<section id="sustain-hero">
    <div id="sustain-trigger" class="vid-btn"></div>
    <video poster="/wp-content/uploads/2021/04/Screen-Shot-2021-04-14-at-2.47.20-PM.png" preload="none" controls>
        <source src="https://2b55b1bc4dda0a8f7d27-4bc354aaf4dd039e32ab4999a2f8c0b0.ssl.cf1.rackcdn.com/Sustainability/SWIF2101_Swift_FamilyFuture_30s_YouTube_4_13_21%20(1).mp4" type="video/mp4">
        
        <source src="https://2b55b1bc4dda0a8f7d27-4bc354aaf4dd039e32ab4999a2f8c0b0.ssl.cf1.rackcdn.com/Sustainability/SWIF2101_Swift_FamilyFuture_30s_YouTube_4_13_21%20(1).webm" type="video/webm">
        Your browser does not support the video tag.
    </video>
    <h1 class="hideh1">A Future for Every Family</h1>
</section>
<!-- /#sustain-hero -->
<section id="sustain-environment">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <?= the_field('environmental_headline');?>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
</section>
<!-- /#sustain-environment -->
<section id="sustain-items">
    <div class="action-item open" style="background-image: url(<?= the_field('cow_bg_img');?>);">
        <div class="wrap">
            <div>
                <?= the_field('the_cow_content');?>
                <?php if(get_field('cow_link')) { ?>
                    <a href="<?= the_field('cow_link');?>">Take a Virtual Tour</a>
                <?php } ?>
            </div>
            <img src="<?=get_template_directory_uri();?>/assets/img/sustain/big-pig-icon.png" alt="Cow">
        </div>
        <!-- /.wrap -->
    </div>
    <!-- /#mc-butchter.action-item -->
    <div class="action-item" style="background-image: url(<?= the_field('pig_bg_img');?>);">
        <div class="wrap">
            <div>
                <?= the_field('the_pig_content');?>
                <?php if(get_field('pig_link')) { ?>
                    <a href="<?= the_field('pig_link');?>">Take a Virtual Tour</a>
                <?php } ?>
            </div>
            <img src="<?=get_template_directory_uri();?>/assets/img/sustain/big-cow-icon.png" alt="Pig">
        </div>
        <!-- /.wrap -->
    </div>
    <!-- /#mc-cook.action-item -->
</section>
<!-- /#masterclass-hero -->
<div class="clearfix"></div>
<?php if( have_rows('content_sections') ): ?>
<section id="content-sections">
    <div class="container sections-carousel">
        <?php while( have_rows('content_sections') ): the_row(); ?>

            <div class="row sections-cell">
                <div class="col-xl-6 col-lg-6 col-md-6 col-12 col-xs-12 cs-imagewrap">
                    <video width="100%" height="auto" poster="<?= the_sub_field('image');?>" controls>
                        <source src="<?= the_sub_field('video_mp4');?>" type="video/mp4">
                        Your browser does not support the video tag.
                        <source src="<?= the_sub_field('video_webm');?>" type="video/webm">
                        Your browser does not support the video tag.
                    </video>
                </div>
                <!-- /.col-xl-6 col-lg-6 col-md-6 col-12 col-xs-12 cs-imagewrap -->
                <div class="col-xl-6 col-lg-6 col-md-6 col-12 col-xs-12 cs-textwrap">
                    <div>
                        <?= the_sub_field('title');?>
                        <?= the_sub_field('content');?>
                        <?php if(get_sub_field('link')) { ?>
                            <a href="<?= the_sub_field('link');?>" class="learn-more"><?= the_sub_field('link_text');?></a>
                        <?php } ?>
                        <!-- <h4 class="coming-soon">Check Back for New Information</h4> -->
                    </div>
                </div>
                <!-- /.col-xl-6 col-lg-6 col-md-6 col-12 col-xs-12 cs-textwrap -->
            </div>
            <!-- /.row -->
        <?php endwhile; ?>
    </div>
    <!-- /.container -->
</section>
<!-- /#content-sections -->
<?php endif; ?>
<section id="real-people">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3 class="real-people-ir">Real People Making Real Progress</h3>
            </div>
            <div class="clearfix"></div>
            <div class="col-xl-4 col-lg-4 col-md-4 col-12 col-xs-12">
                <div class="people-box">
                    <div class="panel">

                    </div>
                    <!-- /.top -->
                </div>
                <!-- /.people-box -->
            </div>
            <!-- /.col-xl-4 col-lg-4 col-md-4 col-12 col-xs-12 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
</section>
<!-- /#real-people -->
<section id="round-table">
    <div class="container roundtable-carousel">
        <?php while( have_rows('round_table_videos') ): the_row(); ?>
            <div class="row roundtable-cell">
                <div class="col-xl-6 col-lg-6 col-md-6 col-12 col-xs-12">
                    <div>
                        <h3 class="round-table-ir">Round the Table with Kevin Gillespie</h3>
                        <?= the_sub_field('content');?>
                        <?php if(get_sub_field('link')) { ?>
                            <a href="<?= the_sub_field('link');?>" class="learn-more"><?= the_sub_field('link_text');?></a>
                        <?php } ?>
                    </div>
                </div>
                <!-- /.col-xl-6 col-lg-6 col-md-6 col-12 col-xs-12 cs-textwrap -->
                <div class="col-xl-6 col-lg-6 col-md-6 col-12 col-xs-12">
                    <video width="100%" height="auto" poster="<?= the_sub_field('image');?>" preload="auto" controls>
                        <source src="<?= the_sub_field('video_mp4');?>" type="video/mp4">
                        Your browser does not support the video tag.
                        <source src="<?= the_sub_field('video_webm');?>" type="video/webm">
                        Your browser does not support the video tag.
                    </video>
                </div>
                <!-- /.col-xl-6 col-lg-6 col-md-6 col-12 col-xs-12 cs-imagewrap -->
            </div>
            <!-- /.row -->
        <?php endwhile; ?>
    </div>
    <!-- /.container -->
</section>
<!-- /#round-table -->
<section id="progress">
    <div class="container">
        <div class="row">
            <div class="col-12 animal-welfare">
                <h3>Progress &amp; Goals</h3>
                <h5>Animal Welfare</h5>
            </div>
            <div class="col-4">
                <img src="<?= get_template_directory_uri();?>/assets/img/sustain/bottom-pig.png" alt="Pig">
                <h4 class="aw-title"><?= the_field('aw_cow_title');?></h4>
                <p><?= the_field('aw_cow_content');?></p>
            </div>
            <div class="col-4 mid-col">
                <img src="<?= get_template_directory_uri();?>/assets/img/sustain/bottom-cow.png" alt="Pig">
                <h4 class="aw-title"><?= the_field('aw_pig_title');?></h4>
                <p><?= the_field('aw_pig_content');?></p>
            </div>
            <div class="col-4">
                <img class="stats-ico" src="<?= get_template_directory_uri();?>/assets/img/sustain/bottom-clipboard.png" alt="Pig">
                <h4 class="aw-title"><?= the_field('scores_title');?></h4>
                <p><?= the_field('scores_content');?></p>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
</section>
<!-- /#progress -->
<section id="environment">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3>Environmental Progress Since 2015</h3>
            </div>
            <div class="clearfix"></div>
            <?php if( have_rows('environment_boxes') ): ?>
                <?php $i=1; ?>
                <?php while( have_rows('environment_boxes') ): the_row(); ?>
                    <div class="col-12 new-icon-box">
                        <div class="inner">
                            <img src="<?= the_sub_field('box_icon');?>" alt="<?= the_sub_field('box_content');?>">
                            <div class="icon-text">
                                <h4><?= the_sub_field('box_title');?></h4>
                                <p><?= the_sub_field('box_content');?></p>
                            </div>
                            <!-- /.icon-text -->
                        </div>
                        <!-- /.inner -->
                    </div>
                    <!-- /.col-12 new-icon-box -->
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
</section>
<!-- /#environment -->
<section id="additional-progress">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3>Additional Progress from our Facilities</h3>
            </div>
            <div class="clearfix"></div>
            <?php if( have_rows('fip_boxes') ): ?>
                <?php while( have_rows('fip_boxes') ): the_row(); ?>
                    <div class="col-lg-6 col-md-6 col-12 flip-card">
                        <div class="inner" style="background-image: url(<?=the_sub_field('background_image');?>);">
                            <div class="flip-card-inner">
                                <div class="front">
                                        <div><?=the_sub_field('top_text');?></div>
                                        <img src="<?=get_template_directory_uri();?>/assets/img/sustain/flip-icon.png" alt="">
                                        <div><?=the_sub_field('bottom_text');?></div>
                                </div>
                                <!-- /.flip-card-front -->
                                <div class="back">
                                    <div><?=the_sub_field('back_text');?></div>
                                </div>
                                <!-- /.flip-card-back -->
                            </div>
                            <!-- /.flip-card-inner -->
                        </div>
                        <!-- /.inner -->
                    </div>
                    <!-- /.col-lg-6 col-md-6 col-12 flipcard -->
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
</section>
<style>
    .hideh1{
        width: 0px;
        height: 0px;
    }
</style>
<!-- /#additional-progress -->
<?php get_footer();?>
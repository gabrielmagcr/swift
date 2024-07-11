<?php get_header();?>
<section id="masterclass-hero">
    <div id="mc-butcher" class="action-item open">
        <div class="overlay"></div>
        <div class="vid-btn" data-toggle="modal" data-target="#butcher-vid-modal"></div>
        <!-- /.vid-btn -->
        <div class="wrap">
            <h2><span>The</span><br> Butcher</h2>
        </div>
        <!-- /.wrap -->
    </div>
    <!-- /#mc-butchter.action-item -->
    <div id="mc-cook" class="action-item">
        <div class="overlay"></div>
        <div class="vid-btn" data-toggle="modal" data-target="#cook-vid-modal"></div>
        <div class="wrap">
            <h2><span>The</span><br> Cook</h2>
        </div>
        <!-- /.wrap -->
    </div>
    <!-- /#mc-cook.action-item -->
</section>
<!-- /#masterclass-hero -->

<section id="know-your-cuts">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Know your cuts of pork</h2>
            </div>
            <!-- /.col-12 -->
        </div>
        <!-- /.row -->
        <div class="clearfix"></div>
        <div class="row cell-reverse">
            <div class="col-lg-7 cut-desc">
                <div id="pcut-1" class="cut-item cuts-shown">
                    <h4>1 - Leg</h4>
                    <p>Ham comes from the hind leg and has usually either been cured or smoked prior to purchase. Fresh, uncured ham is a melt-in-your-mouth treat when it’s cooked low and slow. There’s a slew of other bone-in and boneless options, from specialty cuts like prosciutto and serrano to both the popular city ham and its saltier, chewier cousin, country ham. No matter how you slice it, ham makes a tasty meal. </p>
                    <!-- <a href="#" class="cuts-lm">Learn More</a> /.gold-btn -->
                </div>
                <!-- /.cut-item -->

                <div id="pcut-2" class="cut-item">
                    <h4>2 - Loin</h4>
                    <p>One of the most tender and lean cuts of pork, the loin is cut right from the back. At the meat counter, you will find it sliced wide and flat, and sold both as boneless and bone-in. Best grilled or roasted, pork loin is an easy way to get a juicy, tasty cut of meat for dinner any night of the week. Try it in chops, as a roast or tenderloin, or as country style ribs.  </p>
                    <!-- <a href="#" class="cuts-lm">Learn More</a> /.gold-btn -->
                </div>
                <!-- /.cut-item -->
                <div id="pcut-3" class="cut-item">
                    <h4>3 - Butt</h4>
                    <p>Pork butt, also called the Boston butt or the shoulder butt, actually comes from the front shoulder. Often thicker and marbled with fat throughout, this cut is a little more substantial than the pork picnic, which it’s often confused with. Try pulled pork with the butt because it holds up well when slow cooked and delivers meat that falls off the bone. Other cuts you’ll find from the pork butt include the boneless blade roast, bone-in blade roast, blade steak, and country-style ribs.</p>
                    <!-- <a href="#" class="cuts-lm">Learn More</a> /.gold-btn -->
                </div>
                <!-- /.cut-item -->
                <div id="pcut-4" class="cut-item">
                    <h4>4 - Picnic</h4>
                    <p>Pork picnic goes by several names: shoulder picnic, pork shoulder, picnic shoulder, picnic ham, even picnic hocks. They are all variations on basically the same cut. The picnic is not to be confused with the pork butt, a thicker cut that is higher up the shoulder. Whatever you call it, pork picnic is great roasted, slow cooked, or smoked, and sliced like ham. </p>
                    <!-- <a href="#" class="cuts-lm">Learn More</a> /.gold-btn -->
                </div>
                <!-- /.cut-item -->
                <div id="pcut-5" class="cut-item">
                    <h4>5 - Side</h4>
                    <p>The side consists of two basic parts: the belly and the ribs. If you are going for great taste, bet on pork belly. This nostalgic and versatile cut is packed with flavor-adding fat. This is where bacon comes from after it has been cured and salted, but it can also be cooked fresh, either braised or roasted. Whether it’s the centerpiece of your dish, or used a key ingredient or decadent appetizer, bellies are extremely versatile and flavorful, making any occasion special. </p>
                    <p>Pork Ribs come in all sorts of shapes and sizes, and each is tasty in their own way. Backribs come from the blade section of the loin and are the smallest and most tender of the rib cuts. Spareribs, to include St Louis style spareribs, come from the belly section, with larger bones surrounded by more fat and flavor. A little less meaty than other cuts, their bigger size helps bring bigger taste. Whichever kind you go for, cook with a dry or wet rub to enhance the flavor. </p>
                    <!-- <a href="#" class="cuts-lm">Learn More</a> /.gold-btn -->
                </div>
                <!-- /.cut-item -->
            </div>
            <!-- /.col-lg-7 -->
            <div class="col-lg-5 the-pig">
                <?php get_template_part('inc/pig', 'svg'); ?>
            </div>
            <!-- /.col-lg-5 the-pig -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
</section>
<!-- /#know-your-cuts -->
<?php get_template_part('inc/beef', 'cuts');?>

<section id="cut-of-the-month">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-12 col-xs-12 col-md-6 com-img">
                <img src="<?= the_field('cut_of_the_month_image');?>" alt="<?= the_field('cut_of_the_month');?>">
            </div>
            <!-- /.col-lg-3 com-img -->
            <div class="col-lg-8 col-md-6 col-12 col-xs-12 com-content">
                <h3>Butcher's Cut of The Month</h3>
                <h4>Why it's great:</h4>
                <?= the_field('why_its_great');?>
                <h4>How to Prepare:</h4>
                <?= the_field('how_to_prepare');?>
                <!--
                <a href="#" class="cuts-lm">Learn More</a>-->
            </div>
            <!-- /.col-lg-9 com-content -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
</section>
<!-- /#cut-of-the-month -->
<section id="next-level">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3>Take your meal to the next level</h3>
            </div>
            <!-- /.col-12 -->
            <div class="clearfix"></div>
            <div class="col-lg-4 nl-item">
                <div class="tip-top">
                    <div class="tip-box">
                        <span>Tip<span>#1</span></span>
                    </div>
                    <!-- /.tip-box -->
                </div>
                <!-- /.tip-top -->
                <div class="tip-content">
                    <h4><?= the_field('tip_1_title');?></h4>
                    <?= the_field('tip_1_content');?>
                </div>
                <!-- /.tip-content -->
            </div>
            <!-- /.col-lg-4 nl-item -->

            <div class="col-lg-4 nl-item">
                <div class="tip-top">
                    <div class="tip-box">
                        <span>Tip<span>#2</span></span>
                    </div>
                    <!-- /.tip-box -->
                </div>
                <!-- /.tip-top -->
                <div class="tip-content">
                    <h4><?= the_field('tip_2_title');?></h4>
                    <?= the_field('tip_2_content');?>
                </div>
                <!-- /.tip-content -->
            </div>
            <!-- /.col-lg-4 nl-item -->

            <div class="col-lg-4 nl-item">
                <div class="tip-top">
                    <div class="tip-box">
                        <span>Tip<span>#3</span></span>
                    </div>
                    <!-- /.tip-box -->
                </div>
                <!-- /.tip-top -->
                <div class="tip-content">
                    <h4><?= the_field('tip_3_title');?></h4>
                    <?= the_field('tip_3_content');?>
                </div>
                <!-- /.tip-content -->
            </div>
            <!-- /.col-lg-4 nl-item -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
</section>
<!-- /#next-level -->
<?php get_template_part('inc/butcher', 'vid-modal');?>
<?php get_footer();?>
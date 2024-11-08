<?php
    /* 
 Template Name: page-lowes
 */    
get_header();?>
<section id="lowes-hero">
    <div class="hh-content">
        <h2>Let's Cook Up A </h2>
        <h1>Get-Together</h1>
    </div>
    <!-- /.container -->
</section>

<section id="tips-recipes-wrap" class="tips-lowes bg-primary">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-white">These Recipes <br />Were Made For Beef Lovers</h1>
                <div class="clearfix"></div>
            </div>
        </div>
        <!-- /.row -->
        <div class="clearfix"></div>
        <div id="tips-content-wrap" class="row grid">
            <?php get_template_part('inc/tips', 'selected'); ?>
        </div>
        <!-- /#tips-content-wrap.row -->
    </div>
    <!-- /.container -->
</section>


<section id="lowes-grilling">
    <div class="container">
        <div class="row">
            <h2 class="text-white heading-grill-texture">Grilling 101</h2>
        </div>

        <div class="grilling-tips">
            <div class="row align-items-stretch">
                <div class="col-12 col-md-6 d-flex align-items-stretch flex-column">
                    <div class="grilling-tip mb-4 mb-md-0">
                        <div class="grilling-tip-title">
                            <span>Tip</span> <span>#</span><span>1</span>
                        </div>
                        <div class="grilling-tip-inner">
                            <h3>A little oil goes a <div class="text-trend-four" style="font-size: 2.7rem;">long way</div></h3>

                            <p>to prevent food from sticking. Spray it on cold or lightly  brush grates when the grill is hot. Use an oil with a high smoke point such as peanut or canola oil.</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 d-flex align-items-stretch flex-column">
                    <div class="grilling-tip">
                        <div class="grilling-tip-title">
                            <span>Tip</span> <span>#</span><span>2</span>
                        </div>
                        <div class="grilling-tip-inner">
                            <h3 class="text-rosewood" style="font-size: 2.4rem;">Wait 10-15 Minutes</h3>

                            <p>after starting your grill to preheat your grates and ensure you have a pure flame free of lighter fluid.</p>
                        </div>
                    </div>
                    <div class="grilling-tip">
                        <div class="grilling-tip-title">
                            <span>Tip</span> <span>#</span><span>3</span>
                        </div>
                        <div class="grilling-tip-inner">
                            <h3 class="text-rosewood">After Placing Raw Meats <div class="text-trend-one" style="font-size: 2.2rem;">On The Grill,</div></h3>

                            <p>after starting your grill to preheat your grates and ensure you have a pure flame free of lighter fluid.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-12">
                <div class="grilling-tip">
                        <div class="grilling-tip-title">
                            <span>Tip</span> <span>#</span><span>4</span>
                        </div>
                        <div class="grilling-tip-inner">
                            <h3>No Fancy Cleaning Tools? <div class="text-trend-one" style="font-size: 2.4rem;">No Problem.</div></h3>

                            <p>Run an onion half up and down the rungs - the acidity can cut through grease and grime.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row my-5">
                <div class="col-12">
                    <div class="d-flex">
                        <a href="#" class="btn gold-btn">Learn More About Swift</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- /#tips-recipes-wrap -->
<?php get_footer();?>

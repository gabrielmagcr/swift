<div class="container">
    <div class="row">
        <?php while (have_rows('cards')) : the_row(); $image = get_sub_field('card_image');  $modal_type = get_sub_field('modal_type'); $modal_disabled = $modal_type == 'disabled'; ?>
            <div class="col-12 col-md-6 d-flex align-items-stretch mb-4">
                <div class="card card-style--1" <?php if(!$modal_disabled): ?>data-toggle="modal" data-target="#modal-<?php print get_row_index(); ?>"<?php endif; ?>>
                    <div class="card-img" style="background: url('<?php print $image ? $image['url'] : ''; ?>') no-repeat center / cover;">

                    </div>
                    <div class="card-body">
                        <h3><?php print get_sub_field('card_title'); ?></h3>
                        <div class="text-default"><strong><?php print get_sub_field('card_subtext'); ?></strong></div>

                        <div class="mt-2 <?php if(get_sub_field('button_type') == 'button') print 'd-flex align-items-center'; ?>">
                            <div class="text-default"><?php print get_sub_field('card_text'); ?></div>

                            <?php if(!$modal_disabled): ?>
                            <?php if (get_sub_field('button_type') == 'button') : ?>
                                <div class="mt-2 btn btn-outline-white ml-3"><?php print get_sub_field('button_text'); ?></div>
                            <?php else : ?>
                                <div class="mt-2"><?php print get_sub_field('button_text'); ?></div>
                            <?php endif; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

            </div>
        <?php endwhile; ?>
    </div>
</div>


<?php while (have_rows('cards')) : the_row(); $modal_type = get_sub_field('modal_type'); ?>
<?php if($modal_type != 'disabled'): ?>
<div class="modal fade" tabindex="-1" role="dialog" id="modal-<?php print get_row_index(); ?>" data-id="<?php print get_row_index(); ?>" data-title="<?php print get_sub_field('title'); ?>">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><img src="<?=get_template_directory_uri();?>/assets/img/tailgate/close-gold.svg" alt="Close button"></span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row" style="align-items: center;">
                        <?php if($modal_type == 'content_image'): ?>
                        <div class="col-6">
                            <?php print get_sub_field('modal_side_content'); ?>
                        </div>
                        <div class="col-6">
                            <?php if($image = get_sub_field('modal_image')): ?>
                            <img src="<?php print $image['url']; ?>" class="w-100" />
                            <?php endif; ?>
                        </div>
                        <div class="col-12 mt-4">
                            <?php print get_sub_field('modal_content'); ?>
                        </div>
                        <?php elseif($modal_type == 'content_only'): ?>
                        <div class="col-12">
                            <div class="modal-content-wrap">
                                <?php print get_sub_field('modal_content'); ?>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>
<?php endwhile; ?>
<?php
/**
 * The template for displaying all single posts and attachments
 *
 *
 */

get_header(); ?>
<div class="single-post">
    <?php if ( have_posts() ) : 
        while ( have_posts() ) : the_post();
    ?>
        <div class="col-md-12">
            <div class="col-md-10">
                <div class="job-datails">
                <h2 class="text-center"><?=the_title();?></h2>
                <div class="job-img text-center">
                    <img src="<?=get_the_post_thumbnail_url();?>" class="img-thumbnail"  alt="">
                </div>
                <p><?=the_content();?></p>
                <?= the_post_navigation(
					array(
						'next_text' => '<span class="screen-reader-text">' . __( 'Next post:', 'mytheme' ) . '</span> ',
						'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'mytheme' ) . '</span>'	
					)
                );?>
                <?php if ( 'jobs' == get_post_type() ) {?>
                <div class="text-center">
                    <button type="button" class="btn btn-applay btn-lg">Applay</button>
                </div>
                <?php } ?>
                </div>
            </div>
        </div>
    <?php endwhile; ?>
        
    <?php endif; ?>

</div>
<?php get_footer();?>
<?php
get_header()?>

<div class="archive">
<?php if ( have_posts() ) : ?>
<?php
	// Start the Loop.
	while ( have_posts() ) :the_post();?>
                <?=the_title();?>
                <?=the_content();?>

    <?php endwhile;?>
<?php endif;?>
</div>
<?=get_footer();?>
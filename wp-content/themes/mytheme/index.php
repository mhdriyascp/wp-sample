<?php
/**
 * Mytheme index
 */
get_header(); ?>

<div class="index container">
    <?php if ( have_posts() ) : 
        while ( have_posts() ) : the_post();
    ?>  
       <a href="<?=get_permalink()?>"><h2><?=the_title();?></h2></a>
        <p><?=the_content();?></p> 
        
        <?php endwhile; ?>
    <?php endif; ?>
</div>

<?php get_footer();?>

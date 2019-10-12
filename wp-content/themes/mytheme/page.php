<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 */

get_header(); ?>

<div class="page">
<?php if ( have_posts() ) : 
        while ( have_posts() ) : the_post();
    ?>  
        <h2><?=the_title();?></h2>
        <p><?=the_content();?></p>
        
        <?php endwhile; ?>
    <?php endif; ?>
</div>


<?php get_footer(); ?>
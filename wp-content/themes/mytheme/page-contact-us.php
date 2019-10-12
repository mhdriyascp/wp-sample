<?php
/**
 *  Template Name: Contact Us
 * 
 */
get_header()?>
 <div class="contact-us container">
    <?php while ( have_posts() ) : the_post(); ?>
        <h2><?=get_the_title()?></h2>
        <p><?=get_the_content()?></p>
    <?php endwhile;?>
 </div>
 <?=get_footer();?>